<?php $__env->startSection('title', __('dashboard.add_trip')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card create-category-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper bg-primary">
                                <i class="fas fa-plane-departure text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h3 class="card-title mb-0"><?php echo e(__('dashboard.add_trip')); ?></h3>
                                <p class="text-muted mb-0"><?php echo e(__('dashboard.create_new_trip')); ?></p>
                            </div>
                        </div>
                        <div class="back-btn-wrapper">
                            <a href="<?php echo e(route('admin.trips.index')); ?>" class="back-btn">
                                <i class="fas fa-arrow-left"></i>
                                <span><?php echo e(__('dashboard.back')); ?></span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.trips.store')); ?>" method="POST" class="needs-validation" novalidate>
                            <?php echo csrf_field(); ?>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-group floating-label">
                                        <label for="title" class="form-label">
                                            <i class="fas fa-heading"></i>
                                            <?php echo e(__('dashboard.title')); ?>

                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <input type="text" name="title" id="title"
                                                class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                value="<?php echo e(old('title')); ?>" required
                                                placeholder="<?php echo e(__('dashboard.enter_trip_title')); ?>">
                                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group floating-label">
                                        <label for="description" class="form-label">
                                            <i class="fas fa-align-left"></i>
                                            <?php echo e(__('dashboard.description')); ?>

                                        </label>
                                        <div class="input-group textarea-group">
                                            <textarea name="description" id="description" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                rows="3" placeholder="<?php echo e(__('dashboard.enter_trip_description')); ?>"><?php echo e(old('description')); ?></textarea>
                                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group floating-label">
                                        <label for="start_date" class="form-label">
                                            <i class="fas fa-calendar-check"></i>
                                            <?php echo e(__('dashboard.start_date')); ?>

                                            <span class="text-danger">*</span>
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
                                                value="<?php echo e(old('start_date')); ?>" required>
                                            <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group floating-label">
                                        <label for="end_date" class="form-label">
                                            <i class="fas fa-calendar-times"></i>
                                            <?php echo e(__('dashboard.end_date')); ?>

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
                                            <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group floating-label">
                                        <label for="location" class="form-label">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <?php echo e(__('dashboard.location')); ?>

                                        </label>
                                        <div class="input-group">
                                            <input type="text" name="location" id="location"
                                                class="form-control <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                value="<?php echo e(old('location')); ?>"
                                                placeholder="<?php echo e(__('dashboard.enter_trip_location')); ?>">
                                            <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group floating-label">
                                        <label for="type" class="form-label">
                                            <i class="fas fa-suitcase-rolling"></i>
                                            <?php echo e(__('dashboard.type')); ?>

                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <select name="type" id="type"
                                                class="form-control <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                                <option value="" disabled <?php echo e(old('type') ? '' : 'selected'); ?>>
                                                    <?php echo e(__('dashboard.select_type')); ?></option>
                                                <option value="business" <?php echo e(old('type') == 'business' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('dashboard.business')); ?></option>
                                                <option value="leisure" <?php echo e(old('type') == 'leisure' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('dashboard.leisure')); ?></option>
                                                <option value="medical" <?php echo e(old('type') == 'medical' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('dashboard.medical')); ?></option>
                                                <option value="other" <?php echo e(old('type') == 'other' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('dashboard.other')); ?></option>
                                            </select>
                                            <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="col-md-6">
                                    <div class="form-group floating-label">
                                        <label for="budget_amount" class="form-label">
                                            <i class="fas fa-wallet"></i>
                                            <?php echo e(__('dashboard.budget_amount', ['fallback' => 'Budget Amount'])); ?>

                                            (<?php echo e(__('dashboard.optional')); ?>)
                                        </label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" min="0" name="budget_amount"
                                                id="budget_amount"
                                                class="form-control <?php $__errorArgs = ['budget_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                value="<?php echo e(old('budget_amount')); ?>" placeholder=" ">
                                            <?php $__errorArgs = ['budget_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="col-md-6">
                                    <div class="form-group floating-label">
                                        <label for="budget_currency" class="form-label">
                                            <i class="fas fa-coins"></i>
                                            <?php echo e(__('dashboard.budget_currency', ['fallback' => 'Budget Currency'])); ?>

                                            (<?php echo e(__('dashboard.optional')); ?>)
                                        </label>
                                        <div class="input-group">
                                            <select name="budget_currency" id="budget_currency"
                                                class="form-control <?php $__errorArgs = ['budget_currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                <option value="" <?php echo e(old('budget_currency') ? '' : 'selected'); ?>>
                                                    <?php echo e(__('dashboard.select_currency', ['fallback' => 'Select Currency'])); ?>

                                                </option>
                                                
                                                <option value="USD"
                                                    <?php echo e(old('budget_currency') == 'USD' ? 'selected' : ''); ?>>USD
                                                    (<?php echo e(__('dashboard.USD')); ?>)</option>
                                                <option value="SAR"
                                                    <?php echo e(old('budget_currency') == 'SAR' ? 'selected' : ''); ?>>SAR
                                                    (<?php echo e(__('dashboard.SAR')); ?>)</option>
                                                <option value="YER"
                                                    <?php echo e(old('budget_currency') == 'YER' ? 'selected' : ''); ?>>YER
                                                    (<?php echo e(__('dashboard.YER')); ?>)</option>
                                                <option value="INR"
                                                    <?php echo e(old('budget_currency') == 'INR' ? 'selected' : ''); ?>>INR
                                                    (<?php echo e(__('dashboard.INR')); ?>)</option>
                                                <option value="EGP"
                                                    <?php echo e(old('budget_currency') == 'EGP' ? 'selected' : ''); ?>>EGP
                                                    (<?php echo e(__('dashboard.EGP')); ?>)</option>
                                                <option value="JOD"
                                                    <?php echo e(old('budget_currency') == 'JOD' ? 'selected' : ''); ?>>JOD
                                                    (<?php echo e(__('dashboard.JOD')); ?>)</option>
                                                
                                            </select>
                                            <?php $__errorArgs = ['budget_currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="d-flex justify-content-center gap-3">
                                        <a href="<?php echo e(route('admin.trips.index')); ?>"
                                            class="btn btn-outline-secondary cancel-btn">
                                            <i class="fas fa-times me-2"></i> <?php echo e(__('dashboard.cancel')); ?>

                                        </a>
                                        <button type="submit" class="btn btn-primary save-btn">
                                            <i class="fas fa-save me-2"></i> <?php echo e(__('dashboard.create_trip')); ?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .create-category-card {
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
            background: linear-gradient(145deg, #ffffff, #f8f9fc);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            position: relative;
        }

        .create-category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 0.5rem;
            background: linear-gradient(90deg, #6a11cb, #2575fc, #6a11cb);
            background-size: 200% 100%;
            animation: gradient 3s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .create-category-card:hover {
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }

        .card-header {
            background: transparent;
            border-bottom: none;
            padding: 1.5rem 2rem;
        }

        .card-body {
            padding: 2rem;
            background: linear-gradient(145deg, #ffffff, #f8f9fc);
        }

        .icon-wrapper {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
        }

        .icon-wrapper i {
            font-size: 1.5rem;
            color: white;
            animation: float 3s ease-in-out infinite;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .icon-wrapper.bg-primary {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
        }

        .icon-wrapper::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
        }

        .form-group.floating-label {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-group.floating-label .form-label {
            position: absolute;
            top: -10px;
            right: 10px;
            background: white;
            padding: 0 10px;
            font-size: 14px;
            color: #6a11cb;
            font-weight: 600;
            z-index: 2;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            border-radius: 15px;
            box-shadow: 0 2px 4px rgba(106, 17, 203, 0.1);
            pointer-events: none;
            height: 20px;
            line-height: 20px;
        }

        .form-group.floating-label .form-label i {
            font-size: 14px;
            color: #6a11cb;
        }

        .form-group.floating-label .input-group {
            position: relative;
            border: 2px solid #e3e6f0;
            border-radius: 15px;
            transition: all 0.3s ease;
            background: white;
            height: 45px;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .form-group.floating-label .input-group:focus-within {
            border-color: #6a11cb;
            box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.15);
        }

        .form-group.floating-label .form-control {
            border: none;
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
            background: transparent;
            transition: all 0.3s ease;
            color: #2c3e50;
            width: 100%;
            height: 100%;
            border-radius: 13px;
            position: relative;
            z-index: 1;
            box-shadow: none !important;
            outline: none !important;
        }

        .form-group.floating-label .form-control:focus {
            box-shadow: none;
            background: transparent;
        }

        .form-group.floating-label .form-control::placeholder {
            color: #95a5a6;
            opacity: 0.7;
        }

        .form-group.floating-label .input-group textarea.form-control {
            height: auto;
            padding: 0.75rem 1rem;
        }

        .form-group.floating-label .input-group.textarea-group {
            height: auto;
        }

        .form-group.floating-label select.form-control {
            appearance: none;
            padding-right: 2.5rem;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%236a11cb' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
            cursor: pointer;
        }

        .is-invalid.form-control {
            border-color: #dc3545 !important;
        }

        .input-group:has(.is-invalid) {
            border-color: #dc3545;
        }

        .invalid-feedback {
            text-align: right;
            width: 100%;
            margin-top: 0.25rem;
            font-size: .875em;
            color: #dc3545;
            display: block !important;
            padding-right: 10px;
        }

        .form-group.floating-label:hover .input-group {
            border-color: #8b4cde;
        }

        .form-group.floating-label:hover .form-label {
            transform: translateY(-1px);
            box-shadow: 0 3px 5px rgba(106, 17, 203, 0.15);
        }

        .btn {
            padding: 0.75rem 1.5rem;
            font-size: 0.9rem;
            border-radius: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 600;
            letter-spacing: normal;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .btn:hover::before {
            transform: translateX(0);
        }

        .btn.cancel-btn {
            color: #858796;
            border: 2px solid #858796;
            background: transparent;
        }

        .btn.cancel-btn:hover {
            color: white;
            background: linear-gradient(135deg, #858796, #5a5c69);
            transform: translateY(-3px);
            box-shadow: 0 0.5rem 1rem rgba(133, 135, 150, 0.2);
            border-color: #5a5c69;
        }

        .btn.save-btn {
            color: white;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(106, 17, 203, 0.3);
        }

        .btn.save-btn:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            transform: translateY(-3px);
            box-shadow: 0 0.75rem 1.5rem rgba(106, 17, 203, 0.4);
        }

        .back-btn-wrapper {
            display: flex;
            align-items: center;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: #6a11cb;
            background: rgba(106, 17, 203, 0.1);
            border: none;
            border-radius: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
            box-shadow: 0 0.25rem 0.5rem rgba(106, 17, 203, 0.1);
        }

        .back-btn:hover {
            background: rgba(106, 17, 203, 0.2);
            color: #5e13bf;
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(106, 17, 203, 0.2);
        }

        .back-btn i {
            font-size: 1rem;
            transition: transform 0.3s ease;
        }

        .back-btn:hover i {
            transform: translateX(-3px);
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-5px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        @media (max-width: 768px) {
            .card-header {
                padding: 1rem;
            }

            .card-body {
                padding: 1.5rem;
            }

            .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }

            .d-flex.justify-content-center.gap-3 {
                flex-direction: column;
            }

            .icon-wrapper {
                width: 40px;
                height: 40px;
            }

            .icon-wrapper i {
                font-size: 1.25rem;
            }

            .back-btn {
                padding: 0.5rem 1rem;
                font-size: 0.8rem;
            }

            .back-btn i {
                font-size: 0.9rem;
            }

            .form-group.floating-label .form-label {
                font-size: 12px;
            }

            .form-group.floating-label .form-label i {
                font-size: 12px;
            }

            .form-group.floating-label .form-control {
                font-size: 0.85rem;
            }

            .d-flex.justify-content-center {
                flex-direction: column;
                gap: 0.5rem !important;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        document.querySelectorAll('.form-group.floating-label .form-control').forEach(input => {
            const label = input.closest('.form-group.floating-label').querySelector('.form-label');
            const inputGroup = input.closest('.input-group');

            const checkValue = () => {
                const hasValue = input.value && input.value !== '';
                const isFocused = input.matches(':focus');
                const isDateWithValue = input.type === 'date' && hasValue;
                const isSelectWithValue = input.tagName === 'SELECT' && hasValue;

                if (hasValue || isFocused || isDateWithValue || isSelectWithValue) {
                    if (inputGroup) inputGroup.classList.add('has-value');
                } else {
                    if (inputGroup) inputGroup.classList.remove('has-value');
                }
            };

            input.addEventListener('focus', checkValue);
            input.addEventListener('blur', checkValue);
            input.addEventListener('input', checkValue);
            if (input.tagName === 'SELECT') {
                input.addEventListener('change', checkValue);
            }

            checkValue();
        });

        document.querySelectorAll('textarea.form-control').forEach(textarea => {
            const inputGroup = textarea.closest('.input-group');
            if (inputGroup) {
                inputGroup.classList.add('textarea-group');
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\My_laravel\‏‏laravel_2025_trips\resources\views/admin/trips/create.blade.php ENDPATH**/ ?>