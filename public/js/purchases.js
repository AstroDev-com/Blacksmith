document.addEventListener('DOMContentLoaded', function() {
    // Get the add item button
    const addItemButton = document.getElementById('addItemButton');
    const itemsContainer = document.getElementById('items_container');
    const purchaseForm = document.getElementById('purchaseForm');
    // let itemCounter = document.querySelectorAll('.item-row').length; // Indexing will be dynamic

    // --- Helper Functions (Corrected) ---
    // Format WITH thousand separators, WITHOUT decimals (for display totals)
    const formatCurrency = (value) => {
        const number = parseFloat(value);
        return isNaN(number) ? '0' : Math.round(number).toLocaleString('en-US', { maximumFractionDigits: 0 });
    }

    // Format WITHOUT separators, WITHOUT decimals (for unit price/quantity inputs)
    const formatInteger = (value) => {
        const number = parseFloat(value);
        return isNaN(number) ? '0' : Math.round(number).toString();
    }

    // Parse numbers potentially containing commas
    const parseFormattedNumber = (stringValue) => {
        if (stringValue === null || stringValue === undefined) return 0;
        return parseFloat(String(stringValue).replace(/,/g, '')) || 0;
    }

    // Function to calculate row total
    function calculateRowTotal(row) {
        const quantityInput = row.querySelector('.quantity-input');
        const priceInput = row.querySelector('.price-input');
        const totalInput = row.querySelector('.total-input');

        if (!quantityInput || !priceInput || !totalInput) return 0; // Return 0 if inputs not found

        const quantity = parseInt(quantityInput.value) || 0;
        const price = parseFormattedNumber(priceInput.value); // Use parseFormattedNumber for price

        const total = quantity * price;
        totalInput.value = formatCurrency(total); // Use formatCurrency for display
        totalInput.setAttribute('dir', 'ltr'); // Ensure LTR
        return total;
    }

    // Function to calculate all totals
    function calculateTotals() {
        let subtotal = 0;
        itemsContainer.querySelectorAll('.item-row').forEach(row => {
            subtotal += calculateRowTotal(row); // Recalculate and sum the actual calculated row total
        });

        const taxInput = document.getElementById('tax');
        const discountInput = document.getElementById('discount');
        const subtotalElem = document.getElementById('subtotal');
        const grandTotalElem = document.getElementById('grand_total');

        const taxValue = parseFormattedNumber(taxInput ? taxInput.value : '0');
        const discountValue = parseFormattedNumber(discountInput ? discountInput.value : '0');

        const taxAmount = taxValue; // Tax is fixed amount
        let grandTotal = subtotal;
        grandTotal += taxAmount;
        grandTotal -= discountValue;
        grandTotal = Math.max(0, grandTotal);

        if (subtotalElem) {
            subtotalElem.value = formatCurrency(subtotal);
            subtotalElem.setAttribute('dir', 'ltr');
        }
        if (grandTotalElem) {
            grandTotalElem.value = formatCurrency(grandTotal);
            grandTotalElem.setAttribute('dir', 'ltr');
        }
    }

    // Function to handle product selection
    function handleProductSelection(select) {
        const row = select.closest('.item-row');
        const priceInput = row.querySelector('.price-input');
        if (!priceInput) return;

        const selectedOption = select.options[select.selectedIndex];
        if (selectedOption && selectedOption.dataset.price) {
            priceInput.value = formatInteger(selectedOption.dataset.price); // Use formatInteger
            priceInput.setAttribute('dir', 'ltr'); // Ensure LTR
        } else {
            priceInput.value = '';
            priceInput.setAttribute('dir', 'ltr');
        }
        calculateRowTotal(row);
        calculateTotals();
    }

    // Function to handle quantity/price changes
    function handleInputChange(input) {
        const row = input.closest('.item-row');
        input.setAttribute('dir', 'ltr'); // Ensure LTR while typing
        calculateRowTotal(row);
        calculateTotals();
    }

    // Function to remove a row
    function removeRow(button) {
        const row = button.closest('.item-row');
        if (itemsContainer.querySelectorAll('.item-row').length > 1) {
            row.remove();
            calculateTotals();
        } else {
            console.log("Cannot remove the last item row");
        }
    }

    // Function to initialize Select2 safely
    function initializeSelect2(element) {
        if (typeof $ === 'function' && $.fn.select2) {
            if ($(element).hasClass('select2-hidden-accessible')) {
                try { $(element).select2('destroy'); } catch (e) { console.warn("Error destroying Select2:", e); }
            }
            try {
                $(element).select2({
                    theme: 'bootstrap-5',
                    width: '100%'
                });
            } catch (e) {
                console.error("Error initializing Select2:", e, element);
            }
        } else {
            // console.error('jQuery or Select2 not loaded correctly.');
        }
    }

    // --- Event Delegation --- (More robust)
    if (itemsContainer) {
        itemsContainer.addEventListener('change', function(e) {
            if (e.target.matches('.product-select')) {
                handleProductSelection(e.target);
            }
        });

        itemsContainer.addEventListener('input', function(e) {
            if (e.target.matches('.quantity-input, .price-input')) {
                handleInputChange(e.target);
            }
        });

        itemsContainer.addEventListener('click', function(e) {
            const removeButton = e.target.closest('.remove-item');
            if (removeButton) {
                removeRow(removeButton);
            }
        });
    } else {
        console.error("Items container #items_container not found!");
    }

    // --- Add Item Button --- (More robust cloning and indexing)
    if (addItemButton) {
        addItemButton.addEventListener('click', function() {
            const itemRowTemplate = itemsContainer.querySelector('.item-row');
            if (!itemRowTemplate) {
                console.error("Cannot find item row template!");
                return;
            }
            const newRow = itemRowTemplate.cloneNode(true);

            // Find the highest current index to avoid collision after deletes
            let maxIndex = -1;
            itemsContainer.querySelectorAll('.item-row input[name^="products["]').forEach(input => {
                const match = input.name.match(/products\[(\d+)\]/);
                if (match && parseInt(match[1]) > maxIndex) {
                    maxIndex = parseInt(match[1]);
                }
            });
            const newIndex = maxIndex + 1;
            // console.log(`Adding new row with index: ${newIndex}`);

            // Update all input names and IDs, clear values, set dir
            newRow.querySelectorAll('input, select').forEach(input => {
                const currentId = input.id;
                const currentName = input.name;

                if (currentName) {
                    input.name = currentName.replace(/products\[\d+\]/, `products[${newIndex}]`);
                }
                if (currentId) {
                    input.id = currentId.replace(/_\d+$/, `_${newIndex}`);
                }

                // Clear values/state
                if (!input.readOnly && input.type !== 'hidden') {
                    if(input.tagName === 'SELECT') {
                        input.selectedIndex = 0;
                    } else {
                        input.value = '';
                    }
                }

                // Ensure LTR direction for relevant inputs
                if (input.matches('.quantity-input, .price-input, .total-input')) {
                    input.setAttribute('dir', 'ltr');
                }
                // Reset total specifically
                if (input.classList.contains('total-input')){
                    input.value = formatCurrency(0);
                }
                 // Make sure remove button is visible for new rows
                 if (input.classList.contains('remove-item')) {
                     input.style.display = 'inline-block';
                 }
            });

            // Update labels' `for` attribute
            newRow.querySelectorAll('label').forEach(label => {
                const forAttr = label.getAttribute('for');
                if (forAttr) {
                    label.setAttribute('for', forAttr.replace(/_\d+$/, `_${newIndex}`));
                }
            });

            // Ensure remove button is displayed and functional
            const removeButton = newRow.querySelector('.remove-item');
            if(removeButton) removeButton.style.display = 'inline-block'; // Show it

            // Initialize Select2 for the new row's product select
            const selectToInitialize = newRow.querySelector('.product-select');
            if (selectToInitialize) {
                initializeSelect2(selectToInitialize); // Handles destroy/re-init
            }

            // Add the new row to the container
            itemsContainer.appendChild(newRow);

            calculateTotals();
        });
    } else {
        console.error("Add item button #addItemButton not found!");
    }

    // --- Initializations ---
    // Initialize Select2 for existing rows
    if (itemsContainer){
        itemsContainer.querySelectorAll('.product-select').forEach(select => {
            initializeSelect2(select);
        });
    }

    // Add event listeners for tax and discount, ensure LTR
    const taxInput = document.getElementById('tax');
    const discountInput = document.getElementById('discount');

    if (taxInput) {
        taxInput.setAttribute('dir', 'ltr');
        taxInput.addEventListener('input', calculateTotals);
    } else {
        // console.error('Tax input element (id=tax) not found!');
    }

    if (discountInput) {
        discountInput.setAttribute('dir', 'ltr');
        discountInput.addEventListener('input', calculateTotals);
    } else {
        // console.error('Discount input element (id=discount) not found!');
    }

    // Ensure initial state for existing rows (LTR, formatting)
    if (itemsContainer) {
        itemsContainer.querySelectorAll('.item-row').forEach(row => {
            row.querySelector('.quantity-input')?.setAttribute('dir', 'ltr');
            const priceInput = row.querySelector('.price-input');
            if (priceInput) {
                priceInput.setAttribute('dir', 'ltr');
                // Reformat initial price if needed (might come from old())
                priceInput.value = formatInteger(priceInput.value);
            }
            const totalInput = row.querySelector('.total-input');
            if (totalInput) {
                totalInput.value = formatCurrency(parseFormattedNumber(totalInput.value)); // Format initial total
                totalInput.setAttribute('dir', 'ltr');
            }
            // Ensure remove button state is correct on load
            const removeButton = row.querySelector('.remove-item');
            if(removeButton && itemsContainer.querySelectorAll('.item-row').length === 1) {
                 removeButton.style.display = 'none';
            } else if (removeButton) {
                 removeButton.style.display = 'inline-block';
            }
        });
    }

    // Calculate initial totals
    calculateTotals();

    // Add form submission handler
    if (purchaseForm) {
        purchaseForm.addEventListener('submit', function(e) {
            if (!validatePurchaseForm()) {
                e.preventDefault(); // Prevent submission ONLY if our validation fails
                return;
            }
             // Clean values before submitting (remove formatting from totals/currency if needed)
             // Example: You might want to remove commas from totals before backend processing
             purchaseForm.querySelectorAll('.total-input, #subtotal, #grand_total').forEach(input => {
                 // const unformattedValue = parseFormattedNumber(input.value);
                 // You might create hidden fields to submit unformatted values if needed
                 // input.value = unformattedValue; // Or modify value directly if backend expects plain number
             });
            console.log("Form validation passed, submitting...");
        });
    } else {
        console.error("Purchase form #purchaseForm not found!");
    }

    // --- Validation --- (Improved with parseFormattedNumber and using Blade translation keys)
    // NOTE: Translation keys need to be passed from Blade or loaded via AJAX if used directly in JS
    // This example assumes translation keys are available globally or passed somehow.
    // Using hardcoded strings for now for simplicity as Blade keys won't work directly in .js file
    function validatePurchaseForm() {
        let isValid = true;
        const errorMessages = [];
        const errorContainer = document.createElement('div');
        errorContainer.className = 'alert alert-danger mt-3';
        errorContainer.innerHTML = '<h5 class="alert-heading">Errors Found</h5><ul class="mb-0"></ul>'; // Hardcoded error heading

        // Remove previous error messages & styles
        const existingErrors = purchaseForm?.querySelectorAll('.alert-danger');
        existingErrors?.forEach(error => error.remove());
        purchaseForm?.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        purchaseForm?.querySelectorAll('.input-group.is-invalid').forEach(el => el.classList.remove('is-invalid'));

        // Validate supplier
        const supplierId = document.getElementById('supplier_id');
        if (!supplierId || !supplierId.value) {
            errorMessages.push('Supplier must be selected.'); // Hardcoded message
            isValid = false;
            supplierId?.classList.add('is-invalid');
            supplierId?.closest('.input-group')?.classList.add('is-invalid');
        }

        // Validate items
        const items = itemsContainer.querySelectorAll('.item-row');
        if (items.length === 0) {
            errorMessages.push('At least one product item must be added.'); // Hardcoded message
            isValid = false;
        }

        items.forEach((row, index) => {
            const product = row.querySelector('.product-select');
            const quantity = row.querySelector('.quantity-input');
            const price = row.querySelector('.price-input');

            const productGroup = product?.closest('.input-group');
            const quantityGroup = quantity?.closest('.input-group');
            const priceGroup = price?.closest('.input-group');
            const rowNum = index + 1;

            if (!product || !product.value) {
                errorMessages.push(`Product must be selected - Row ${rowNum}`); // Hardcoded message
                isValid = false;
                product?.classList.add('is-invalid');
                productGroup?.classList.add('is-invalid');
            }

            const quantityValue = parseFormattedNumber(quantity?.value);
            if (!quantity || quantityValue <= 0) {
                errorMessages.push(`Quantity must be greater than 0 - Row ${rowNum}`); // Hardcoded message
                isValid = false;
                quantity?.classList.add('is-invalid');
                quantityGroup?.classList.add('is-invalid');
            }

            const priceValue = parseFormattedNumber(price?.value);
            if (!price || priceValue < 0) {
                errorMessages.push(`Unit price must be 0 or greater - Row ${rowNum}`); // Hardcoded message
                isValid = false;
                price?.classList.add('is-invalid');
                priceGroup?.classList.add('is-invalid');
            }
        });

        // Validate payment method
        const paymentMethod = document.getElementById('payment_method');
        const paymentMethodGroup = paymentMethod?.closest('.input-group');
        if (!paymentMethod || !paymentMethod.value) {
            errorMessages.push('Payment method must be selected.'); // Hardcoded message
            isValid = false;
            paymentMethod?.classList.add('is-invalid');
            paymentMethodGroup?.classList.add('is-invalid');
        }

        // Validate payment status
        const paymentStatus = document.getElementById('payment_status');
        const paymentStatusGroup = paymentStatus?.closest('.input-group');
        if (!paymentStatus || !paymentStatus.value) {
            errorMessages.push('Payment status must be selected.'); // Hardcoded message
            isValid = false;
            paymentStatus?.classList.add('is-invalid');
            paymentStatusGroup?.classList.add('is-invalid');
        }

        // Show error messages if any
        if (!isValid) {
            const errorList = errorContainer.querySelector('ul');
            errorMessages.forEach(message => {
                const li = document.createElement('li');
                li.textContent = message;
                errorList.appendChild(li);
            });
            purchaseForm?.insertBefore(errorContainer, purchaseForm.firstChild);
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        return isValid;
    }
});
