document.addEventListener('DOMContentLoaded', function() {
    // Get the add item button
    const addItemButton = document.getElementById('addItemButton');
    const itemsContainer = document.getElementById('items_container');
    const saleForm = document.getElementById('saleForm');
    let itemCounter = document.querySelectorAll('.item-row').length; // Start counter based on existing rows

    // Store the HTML template for a new row
    const itemRowTemplate = document.querySelector('.item-row').cloneNode(true);
    // Optional: Remove initial values from template if needed, or clear them later
    itemRowTemplate.querySelector('.product-select').selectedIndex = 0;
    itemRowTemplate.querySelector('.quantity-input').value = '';
    itemRowTemplate.querySelector('.price-input').value = ''; // This is now selling_price
    itemRowTemplate.querySelector('.original-price-input').value = ''; // This is now original_price (readonly)
    itemRowTemplate.querySelector('.total-input').value = '';
    itemRowTemplate.querySelector('.remove-item').style.display = 'block'; // Ensure remove button is visible in template

    // Function to format numbers in English
    function formatNumber(number) {
        let str = number.toString();
        const arabicNumbers = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        for (let i = 0; i < 10; i++) {
            str = str.replaceAll(arabicNumbers[i], i);
        }
        str = str.replace(/\.?0+$/, '');
        return str.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Function to parse number safely
    function parseNumber(value) {
        if (!value) return 0;
        const cleanValue = value.toString().replace(/[^\d.-]/g, '');
        const number = parseFloat(cleanValue);
        return isNaN(number) ? 0 : number;
    }

    // Function to calculate row total
    function calculateRowTotal(row) {
        const quantity = parseNumber(row.querySelector('.quantity-input').value);
        // Read from the editable selling price input
        const price = parseNumber(row.querySelector('.price-input').value);
        const total = quantity * price;
        const formattedTotal = formatNumber(total.toFixed(2));
        row.querySelector('.total-input').value = formattedTotal;
        console.log(`Row Total Calculated: ${formattedTotal}`);
        return total;
    }

    // Function to calculate all totals
    function calculateTotals() {
        let subtotal = 0;

        document.querySelectorAll('.item-row').forEach(row => {
            subtotal += calculateRowTotal(row);
        });

        const tax = parseNumber(document.getElementById('tax').value);
        const discount = parseNumber(document.getElementById('discount').value);

        const taxAmount = subtotal * (tax / 100);
        const grandTotal = subtotal + taxAmount - discount;

        document.getElementById('subtotal').value = formatNumber(subtotal.toFixed(2));
        // document.getElementById('grand_total').value = formatNumber(grandTotal.toFixed(2)); // Temporarily commented out
        document.getElementById('grand_total').value = grandTotal.toFixed(2); // Display raw number for debugging

        console.log(`Subtotal: ${subtotal}, Tax: ${tax}, Discount: ${discount}, Grand Total: ${grandTotal}`);
    }

    // Function to handle product selection
    function handleProductSelection(select) {
        const row = select.closest('.item-row');
        const sellingPriceInput = row.querySelector('.price-input'); // Editable selling price
        const originalPriceInput = row.querySelector('.original-price-input'); // Readonly original price
        const selectedOption = select.options[select.selectedIndex];

        // --- Debugging Start ---
        console.log('Selected Option:', selectedOption);
        console.log('Data Price Attribute:', selectedOption.dataset.price);
        console.log('Original Price Input Element:', originalPriceInput);
        console.log('Selling Price Input Element:', sellingPriceInput);
        // --- Debugging End ---

        if (selectedOption && selectedOption.dataset.price) {
            const originalPrice = selectedOption.dataset.price;
            // Set both readonly original price and initial editable selling price
            originalPriceInput.value = originalPrice;
            sellingPriceInput.value = originalPrice;
            console.log(`Product Selected: ${selectedOption.text}, Original Price Set To: ${originalPrice}`); // Modified log
            calculateRowTotal(row);
            calculateTotals();
        } else {
            // --- Debugging Start ---
            console.log('Condition not met: Either no option selected or no data-price');
            // Clear fields if no valid product is selected
            originalPriceInput.value = '';
            sellingPriceInput.value = '';
            calculateRowTotal(row); // Recalculate with empty price
            calculateTotals();
            // --- Debugging End ---
        }
    }

    // Function to handle quantity/price changes
    function handleInputChange(input) {
        const row = input.closest('.item-row');
        console.log(`Input Changed: ${input.name}, Value: ${input.value}`);
        // Only recalculate if quantity or selling price changes
        if (input.matches('.quantity-input') || input.matches('.price-input')) {
            calculateRowTotal(row);
            calculateTotals();
        }
    }

    // Function to remove a row
    function removeRow(button) {
        const row = button.closest('.item-row');
        if (document.querySelectorAll('.item-row').length > 1) {
            row.remove();
            console.log('Row Removed');
            calculateTotals();
        }
    }

    // Function to initialize Select2 safely
    function initializeSelect2(selector) {
        if (typeof $ === 'function' && $.fn.select2) {
            $(selector).select2({
                theme: 'bootstrap-5',
                width: '100%'
            });
            console.log('Select2 initialized for:', selector);
        } else {
            console.error('jQuery or Select2 not loaded correctly.');
        }
    }

    // Event delegation for all dynamic elements
    // itemsContainer.addEventListener('change', function(e) { // Replaced with jQuery Select2 event
    //     if (e.target.matches('.product-select')) {
    //         handleProductSelection(e.target);
    //     }
    // });

    // Use jQuery to handle Select2 event delegation
    $(itemsContainer).on('select2:select', '.product-select', function (e) {
        console.log('Select2 select event triggered for:', e.target);
        handleProductSelection(e.target);
    });

    itemsContainer.addEventListener('input', function(e) {
        if (e.target.matches('.quantity-input, .price-input')) {
            handleInputChange(e.target);
        }
    });

    itemsContainer.addEventListener('click', function(e) {
        // Use closest to handle clicks inside the button (like on the icon)
        const removeButton = e.target.closest('.remove-item');
        if (removeButton) {
            removeRow(removeButton);
        }
    });

    // Add click event listener to the button (Refactored)
    addItemButton.addEventListener('click', function() {
        // Create a new row from the template
        const newRow = itemRowTemplate.cloneNode(true);
        const newIndex = itemCounter++; // Increment counter for unique IDs/names

        // Update all input names and IDs in the new row
        newRow.querySelectorAll('input, select').forEach(input => {
            if (input.name) {
                input.name = input.name.replace(/\[\d+\]/g, `[${newIndex}]`);
            }
            if (input.id) {
                input.id = input.id.replace(/_\d+/g, `_${newIndex}`);
            }
            // Clear values again just in case template wasn't fully cleared
            if (!input.readOnly && input.type !== 'hidden') {
                if(input.tagName === 'SELECT') input.selectedIndex = 0;
                else input.value = '';
            }
        });

        // Update labels' for attribute
        newRow.querySelectorAll('label').forEach(label => {
            const forAttr = label.getAttribute('for');
            if (forAttr) {
                label.setAttribute('for', forAttr.replace(/_\d+/g, `_${newIndex}`));
            }
        });

        // Destroy any potential Select2 instance on the cloned template's select
        const selectToInitialize = newRow.querySelector('.product-select');
        if (typeof $ === 'function' && $.fn.select2 && $(selectToInitialize).hasClass('select2-hidden-accessible')) {
             $(selectToInitialize).select2('destroy');
        }

        // Add the new row to the container
        itemsContainer.appendChild(newRow);

        // Initialize Select2 for the new row's select element
        if (selectToInitialize) {
            initializeSelect2(selectToInitialize);
        }

        // Calculate totals after adding a new row
        calculateTotals();

        console.log(`New Row Added with index: ${newIndex}`);
    });

    // Initialize Select2 for existing rows on page load
    document.querySelectorAll('.product-select').forEach(select => {
        initializeSelect2(select);
    });

    // Add event listeners for tax and discount
    const taxInput = document.getElementById('tax');
    const discountInput = document.getElementById('discount');

    if (taxInput) {
        console.log('Tax input element found, attaching listener.'); // Debug log
        taxInput.addEventListener('input', function() { // Wrap in function for logging
            console.log('Tax input event triggered.'); // Debug log
            calculateTotals();
        });
    } else {
        console.error('Tax input element (id=tax) not found!'); // Debug log
    }

    if (discountInput) {
        console.log('Discount input element found, attaching listener.'); // Debug log
        discountInput.addEventListener('input', function() { // Wrap in function for logging
             console.log('Discount input event triggered.'); // Debug log
            calculateTotals();
        });
    } else {
         console.error('Discount input element (id=discount) not found!'); // Debug log
    }

    // Calculate initial totals
    calculateTotals();

    // Add form submission handler
    if (saleForm) {
        saleForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Validate form
            if (!validateForm()) {
                return;
            }

            // Submit form
            this.submit();
        });
    }

    // Function to validate form
    function validateForm() {
        let isValid = true;
        const errorMessages = [];
        const errorContainer = document.createElement('div');
        errorContainer.className = 'alert alert-danger';
        errorContainer.innerHTML = '<h5 class="alert-heading">حدثت الأخطاء التالية:</h5><ul class="mb-0"></ul>';

        // Validate customer
        const customerId = document.getElementById('customer_id');
        if (!customerId.value) {
            errorMessages.push('يجب اختيار العميل');
            isValid = false;
            customerId.classList.add('is-invalid');
        } else {
            customerId.classList.remove('is-invalid');
        }

        // Validate items
        const items = document.querySelectorAll('.item-row');
        if (items.length === 0) {
            errorMessages.push('يجب إضافة منتج واحد على الأقل');
            isValid = false;
        }

        items.forEach((row, index) => {
            const product = row.querySelector('.product-select');
            const quantity = row.querySelector('.quantity-input');
            // Validate the editable selling price input
            const price = row.querySelector('.price-input');

            if (!product.value) {
                errorMessages.push(`يجب اختيار المنتج في الصف ${index + 1}`);
                isValid = false;
                product.classList.add('is-invalid');
            } else {
                product.classList.remove('is-invalid');
            }

            if (!quantity.value || quantity.value < 1) {
                errorMessages.push(`يجب تحديد كمية صحيحة في الصف ${index + 1}`);
                isValid = false;
                quantity.classList.add('is-invalid');
            } else {
                quantity.classList.remove('is-invalid');
            }

            // Validate the editable selling price input
            if (!price.value || price.value < 0) {
                errorMessages.push(`يجب تحديد سعر بيع صحيح في الصف ${index + 1}`);
                isValid = false;
                price.classList.add('is-invalid');
            } else {
                price.classList.remove('is-invalid');
            }
        });

        // Validate payment method
        const paymentMethod = document.getElementById('payment_method');
        if (!paymentMethod.value) {
            errorMessages.push('يجب اختيار طريقة الدفع');
            isValid = false;
            paymentMethod.classList.add('is-invalid');
        } else {
            paymentMethod.classList.remove('is-invalid');
        }

        // Validate payment status
        const paymentStatus = document.getElementById('payment_status');
        if (!paymentStatus.value) {
            errorMessages.push('يجب اختيار حالة الدفع');
            isValid = false;
            paymentStatus.classList.add('is-invalid');
        } else {
            paymentStatus.classList.remove('is-invalid');
        }

        // Show error messages if any
        if (!isValid) {
            // Remove any existing error messages
            const existingErrors = document.querySelectorAll('.alert-danger');
            existingErrors.forEach(error => error.remove());

            // Create and show new error messages
            const errorList = errorContainer.querySelector('ul');
            errorMessages.forEach(message => {
                const li = document.createElement('li');
                li.textContent = message;
                errorList.appendChild(li);
            });

            // Insert error messages at the top of the form
            const form = document.getElementById('saleForm');
            form.insertBefore(errorContainer, form.firstChild);

            // Scroll to the top of the form
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        return isValid;
    }

    // Add styles for the delete button
    const style = document.createElement('style');
    style.textContent = `
        .remove-item {
            width: 30px;
            height: 30px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 0.8rem;
        }

        .remove-item i {
            font-size: 0.8rem;
        }

        .remove-item:hover {
            transform: scale(1.1);
        }
    `;
    document.head.appendChild(style);
});
