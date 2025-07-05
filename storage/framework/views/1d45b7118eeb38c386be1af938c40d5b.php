<?php $__env->startSection('title', __('dashboard.reports')); ?>

<?php $__env->startPush('styles'); ?>
    
    <style>
        .report-selection-page .statistics-card,
        /* Renamed .table-card for clarity */
        .report-selection-page .filter-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.07);
            background-color: #fff;
            margin-bottom: 1.5rem;
            /* Added margin */
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .report-selection-page .statistics-card:hover,
        /* Renamed */
        .report-selection-page .filter-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.75rem 2rem rgba(0, 0, 0, 0.1);
        }

        .report-selection-page .statistics-card .card-header,
        /* Renamed */
        .report-selection-page .filter-card .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            border-radius: 1rem 1rem 0 0;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .report-selection-page .statistics-card .card-header h6 {
            color: #6a11cb;
            /* Purple header text */
        }

        .report-selection-page .statistics-card .card-body {
            padding: 1.5rem;
        }

        /* Floating Label Styles for the Form */
        .report-selection-page .form-group.floating-label {
            position: relative;
            margin-bottom: 1.5rem;
            /* Spacing between fields */
        }

        .report-selection-page .form-group.floating-label .form-label {
            position: absolute;
            top: -10px;
            /* Position above the input group */
            <?php echo e(app()->isLocale('ar') ? 'right' : 'left'); ?>: 10px;
            /* Adjust based on locale */
            background: white;
            /* Background to cover border */
            padding: 0 10px;
            font-size: 14px;
            color: #6a11cb;
            /* Label color */
            font-weight: 600;
            z-index: 2;
            transition: all 0.3s ease;
            display: inline-flex;
            /* Use inline-flex for icon alignment */
            align-items: center;
            gap: 5px;
            border-radius: 15px;
            /* Rounded label */
            box-shadow: 0 2px 4px rgba(106, 17, 203, 0.1);
            pointer-events: none;
            height: 20px;
            line-height: 20px;
        }

        .report-selection-page .form-group.floating-label .form-label i {
            font-size: 14px;
            color: #6a11cb;
        }

        .report-selection-page .form-group.floating-label .input-group {
            position: relative;
            border: 2px solid #e3e6f0;
            /* Default border */
            border-radius: 15px;
            /* Rounded border */
            transition: all 0.3s ease;
            background: white;
            height: 45px;
            /* Fixed height */
            display: flex;
            align-items: center;
            overflow: hidden;
            /* Hide overflowing parts */
        }

        .report-selection-page .form-group.floating-label .input-group:focus-within {
            border-color: #6a11cb;
            /* Highlight border on focus */
            box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.15);
        }

        .report-selection-page .form-group.floating-label .form-control,
        .report-selection-page .form-group.floating-label .form-select {
            border: none;
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
            background: transparent;
            transition: all 0.3s ease;
            color: #2c3e50;
            width: 100%;
            height: 100%;
            border-radius: 13px;
            /* Slightly smaller inner radius */
            position: relative;
            z-index: 1;
            box-shadow: none !important;
            outline: none !important;
            padding-top: 0.8rem;
            /* Make space for label */
        }

        /* Remove top padding for date input which doesn't need placeholder float */
        .report-selection-page .form-group.floating-label input[type="date"].form-control {
            padding-top: 0.6rem;
        }

        .report-selection-page .form-group.floating-label .form-select {
            appearance: none;
            padding-right: 2.5rem;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%236a11cb' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: <?php echo e(app()->isLocale('ar') ? 'left' : 'right'); ?> 0.75rem center;
            background-size: 16px 12px;
            cursor: pointer;
        }

        .report-selection-page .form-group.floating-label:hover .input-group {
            border-color: #8b4cde;
            /* Hover border color */
        }

        .report-selection-page .form-group.floating-label:hover .form-label {
            transform: translateY(-2px);
            /* Slight lift on hover */
            box-shadow: 0 4px 6px rgba(106, 17, 203, 0.15);
        }

        /* Submit Button Style */
        .report-selection-page .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 1rem;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: none;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 0.5rem 1rem rgba(106, 17, 203, 0.2);
        }

        .report-selection-page .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.75rem 1.5rem rgba(106, 17, 203, 0.3);
            background: linear-gradient(135deg, #5e13bf, #1e63d1);
        }

        /* Adjust date range group when visible */
        .report-selection-page #dateRangeGroup {
            margin-bottom: 1.5rem;
            /* Add margin when visible */
        }

        .report-selection-page #dateRangeGroup .form-group {
            margin-bottom: 0;
            /* Remove bottom margin inside the row */
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid report-selection-page"> 

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo e(__('dashboard.reports')); ?></h1>
        </div>

        
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('dashboard.dashboard')); ?></a>
                </li> 
                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('dashboard.reports')); ?></li>
            </ol>
        </nav>

        <div class="card statistics-card mb-4"> 
            <div class="card-header">
                <h6 class="m-0 font-weight-bold"><?php echo e(__('dashboard.generate_report')); ?></h6>
            </div>
            <div class="card-body report-selection-form">
                <p class="text-muted mb-4"><?php echo e(__('dashboard.select_report_criteria')); ?></p> 

                <form method="GET" action="<?php echo e(route('admin.reports.show')); ?>">
                    <?php echo csrf_field(); ?>

                    
                    <div class="form-group floating-label" id="tripSelectionGroup">
                        <label for="trip_id" class="form-label">
                            <i class="fas fa-route"></i> 
                            <?php echo e(__('dashboard.select_trip')); ?>

                            
                        </label>
                        <div class="input-group">
                            <select name="trip_id" id="trip_id"
                                class="form-select <?php $__errorArgs = ['trip_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"> 
                                <option value=""> </option> 
                                <?php $__currentLoopData = $trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($trip->id); ?>"
                                        <?php echo e(old('trip_id') == $trip->id ? 'selected' : ''); ?>>
                                        <?php echo e($trip->title); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <?php $__errorArgs = ['trip_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback d-block" role="alert"><strong><?php echo e($message); ?></strong></span>
                            
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div class="form-group floating-label">
                        <label for="report_type" class="form-label">
                            <i class="fas fa-file-contract"></i> 
                            <?php echo e(__('dashboard.select_report_type')); ?> <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <select name="report_type" id="report_type"
                                class="form-select <?php $__errorArgs = ['report_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                
                                <option value=""> </option> 
                                <option value="transactions" <?php echo e(old('report_type') == 'transactions' ? 'selected' : ''); ?>>
                                    <?php echo e(__('dashboard.transactions_report')); ?></option>
                                <option value="documents" <?php echo e(old('report_type') == 'documents' ? 'selected' : ''); ?>>
                                    <?php echo e(__('dashboard.documents_list')); ?></option>
                                <option value="photos" <?php echo e(old('report_type') == 'photos' ? 'selected' : ''); ?>>
                                    <?php echo e(__('dashboard.photo_gallery')); ?></option>
                                <option value="impressions" <?php echo e(old('report_type') == 'impressions' ? 'selected' : ''); ?>>
                                    <?php echo e(__('dashboard.impressions_list')); ?></option>
                                <option value="summary" <?php echo e(old('report_type') == 'summary' ? 'selected' : ''); ?>>
                                    <?php echo e(__('dashboard.trip_summary')); ?></option>
                                <option value="financial_summary"
                                    <?php echo e(old('report_type') == 'financial_summary' ? 'selected' : ''); ?>>
                                    <?php echo e(__('dashboard.financial_summary_period')); ?></option>
                            </select>
                        </div>
                        <?php $__errorArgs = ['report_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback d-block" role="alert"><strong><?php echo e($message); ?></strong></span>
                            
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div class="row g-3" id="dateRangeGroup" style="display: none;">
                        <div class="col-md-6">
                            <div class="form-group floating-label">
                                <label for="start_date" class="form-label">
                                    <i class="fas fa-calendar-day"></i> 
                                    <?php echo e(__('dashboard.start_date')); ?> <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="date" name="start_date" id="start_date"
                                        class="form-control <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('start_date')); ?>">
                                </div>
                                <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback d-block"
                                        role="alert"><strong><?php echo e($message); ?></strong></span> 
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group floating-label">
                                <label for="end_date" class="form-label">
                                    <i class="fas fa-calendar-week"></i> 
                                    <?php echo e(__('dashboard.end_date')); ?> <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="date" name="end_date" id="end_date"
                                        class="form-control <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('end_date')); ?>">
                                </div>
                                <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback d-block"
                                        role="alert"><strong><?php echo e($message); ?></strong></span> 
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    

                    <div class="text-center"> 
                        <button type="submit" class="btn btn-primary mt-3 px-5"> 
                            <i class="fas fa-paper-plane me-1"></i> 
                            <?php echo e(__('dashboard.generate_report')); ?>

                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const reportTypeSelect = document.getElementById('report_type');
            const dateRangeGroup = document.getElementById('dateRangeGroup');
            const tripSelectionGroup = document.getElementById('tripSelectionGroup');
            const tripSelect = document.getElementById('trip_id');
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');

            function toggleReportInputs() {
                const isFinancialSummary = reportTypeSelect.value === 'financial_summary';

                dateRangeGroup.style.display = isFinancialSummary ? 'flex' : 'none';
                tripSelectionGroup.style.display = isFinancialSummary ? 'none' : 'block';

                // Adjust required attributes
                if (tripSelect) tripSelect.required = !isFinancialSummary;
                if (startDateInput) startDateInput.required = isFinancialSummary;
                if (endDateInput) endDateInput.required = isFinancialSummary;

                // Ensure labels float correctly on load/toggle
                if (!isFinancialSummary && tripSelect) {
                    checkSelectValue(tripSelect);
                }
                checkSelectValue(reportTypeSelect);
                if (isFinancialSummary) {
                    // No need to check date inputs usually as they don't use :placeholder-shown logic
                }
            }

            // Helper function to add/remove class for floating label on selects
            function checkSelectValue(selectElement) {
                const inputGroup = selectElement.closest('.input-group');
                if (!inputGroup) return;
                if (selectElement.value && selectElement.value !== "") {
                    inputGroup.classList.add('has-value'); // Add class if has value
                } else {
                    inputGroup.classList.remove('has-value'); // Remove class if empty
                }
            }

            // Add event listener for selects to handle floating label
            [tripSelect, reportTypeSelect].forEach(sel => {
                if (sel) {
                    sel.addEventListener('change', () => checkSelectValue(sel));
                }
            });

            if (reportTypeSelect) {
                reportTypeSelect.addEventListener('change', toggleReportInputs);
                // Initial check
                toggleReportInputs();
            }

            // Add focus/blur listeners to input groups for visual feedback
            document.querySelectorAll('.report-selection-page .input-group').forEach(group => {
                const input = group.querySelector('.form-control, .form-select');
                if (input) {
                    input.addEventListener('focus', () => group.classList.add('is-focused'));
                    input.addEventListener('blur', () => group.classList.remove('is-focused'));
                }
            });

        });
    </script>
    
    <style>
        .report-selection-page .input-group.is-focused {
            border-color: #6a11cb;
            box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.15);
        }

        /* Style for floating label when select has value */
        .report-selection-page .input-group.has-value select {
            /* Optional: Adjust styles if needed when value selected */
        }

        /* Make sure validation messages are block */
        .invalid-feedback {
            display: none;
            /* Hide by default */
            width: 100%;
            margin-top: 0.25rem;
            font-size: .875em;
            color: #dc3545;
        }

        .form-control.is-invalid~.invalid-feedback,
        .form-select.is-invalid~.invalid-feedback {
            display: block;
        }

        /* Adjust spacing for validation */
        .form-group.floating-label .invalid-feedback {
            margin-top: 2px;
            /* Reduce margin below input group */
            padding: 0 1rem;
            /* Align with input padding */
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\My_laravel\‏‏laravel_2025_trips\resources\views/admin/reports/index.blade.php ENDPATH**/ ?>