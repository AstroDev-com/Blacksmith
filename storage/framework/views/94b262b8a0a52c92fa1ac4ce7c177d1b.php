<?php $__env->startSection('title', __('dashboard.trip_details') . ': ' . $trip->title); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">

        
        <div class="card shadow mb-1 create-category-card">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap py-3">
                <div class="d-flex align-items-center me-3 mb-2 mb-md-0">
                    <div class="icon-wrapper bg-primary me-3">
                        <i class="fas fa-info-circle text-white"></i>
                    </div>
                    <div>
                        <h3 class="card-title mb-0 h5"><?php echo e(__('dashboard.trip_details')); ?></h3>
                        <p class="text-muted mb-0 small"><?php echo e($trip->title); ?></p>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <a href="<?php echo e(route('admin.trips.report', $trip)); ?>" class="btn btn-sm btn-outline-primary back-btn">
                        <i class="fas fa-file-alt"></i>
                        <span><?php echo e(__('dashboard.view_report', ['fallback' => 'View Report'])); ?></span>
                    </a>
                    <a href="<?php echo e(route('admin.trips.edit', $trip)); ?>" class="btn btn-sm btn-outline-warning back-btn">
                        <i class="fas fa-edit"></i>
                        <span><?php echo e(__('dashboard.edit')); ?></span>
                    </a>
                    <a href="<?php echo e(route('admin.trips.index')); ?>" class="btn btn-sm btn-outline-secondary back-btn">
                        <i class="fas fa-arrow-left"></i>
                        <span><?php echo e(__('dashboard.back_to_list')); ?></span>
                    </a>
                </div>
            </div>
            <div class="card-body py-1 px-4">
                
                <dl class="trip-details-dl">
                    <div>
                        <dt><i class="fas fa-heading me-2"></i><?php echo e(__('dashboard.title')); ?></dt>
                        <dd><?php echo e($trip->title); ?></dd>
                    </div>
                    <div>
                        <dt><i class="fas fa-map-marker-alt me-2"></i><?php echo e(__('dashboard.location')); ?></dt>
                        <dd><?php echo e($trip->location ?? __('dashboard.not_provided')); ?></dd>
                    </div>
                    <div>
                        <dt><i class="fas fa-suitcase-rolling me-2"></i><?php echo e(__('dashboard.type')); ?></dt>
                        <dd><span class="badge bg-info"><?php echo e(__('dashboard.' . $trip->type)); ?></span></dd>
                    </div>
                    
                    <?php if($trip->budget_amount): ?>
                        <div>
                            <dt><i
                                    class="fas fa-wallet me-2 text-success"></i><?php echo e(__('dashboard.budget', ['fallback' => 'Budget'])); ?>

                            </dt>
                            <dd><?php echo e(number_format($trip->budget_amount, 2)); ?> <?php echo e($trip->budget_currency); ?></dd>
                        </div>
                    <?php endif; ?>
                    <div>
                        <dt><i class="fas fa-calendar-check me-2"></i><?php echo e(__('dashboard.start_date')); ?></dt>
                        <dd><?php echo e($trip->start_date ? $trip->start_date->format('Y-m-d') : '--'); ?>

                            <?php echo e($trip->start_date ? '(' . $trip->start_date->diffForHumans() . ')' : ''); ?></dd>
                    </div>
                    <div>
                        <dt><i class="fas fa-calendar-times me-2"></i><?php echo e(__('dashboard.end_date')); ?></dt>
                        <dd><?php echo e($trip->end_date ? $trip->end_date->format('Y-m-d') : '--'); ?>

                            <?php echo e($trip->end_date ? '(' . $trip->end_date->diffForHumans() . ')' : ''); ?></dd>
                    </div>
                    <div>
                        <dt><i class="fas fa-clock me-2"></i><?php echo e(__('dashboard.created_at')); ?></dt>
                        <dd><?php echo e($trip->created_at->format('Y-m-d H:i')); ?> (<?php echo e($trip->created_at->diffForHumans()); ?>)</dd>
                    </div>
                    <div>
                        <dt><i class="fas fa-history me-2"></i><?php echo e(__('dashboard.last_updated')); ?></dt>
                        <dd><?php echo e($trip->updated_at->format('Y-m-d H:i')); ?> (<?php echo e($trip->updated_at->diffForHumans()); ?>)</dd>
                    </div>
                    <div class="description-item">
                        <dt><i class="fas fa-align-left me-2"></i><?php echo e(__('dashboard.description')); ?></dt>
                        <dd><?php echo e($trip->description ?? __('dashboard.not_provided')); ?></dd>
                    </div>
                </dl>
            </div>
        </div>

        
        <div class="card shadow mb-1">
            <div class="card-header p-0">
                <ul class="nav nav-tabs nav-fill" id="tripTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="photos-tab" data-bs-toggle="tab"
                            data-bs-target="#photos-content" type="button" role="tab" aria-controls="photos-content"
                            aria-selected="true">
                            <i class="fas fa-images me-1"></i> <?php echo e(__('dashboard.photos')); ?>

                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="impressions-tab" data-bs-toggle="tab"
                            data-bs-target="#impressions-content" type="button" aria-controls="impressions-content"
                            aria-selected="false">
                            <i class="fas fa-comments me-1"></i> <?php echo e(__('dashboard.impressions')); ?>

                            <span class="badge rounded-pill bg-secondary ms-1"><?php echo e($trip->impressions->count()); ?></span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="transactions-tab" data-bs-toggle="tab"
                            data-bs-target="#transactions-content" type="button" aria-controls="transactions-content"
                            aria-selected="false">
                            <i class="fas fa-wallet me-1"></i>
                            <?php echo e(__('dashboard.transactions', ['fallback' => 'Transactions'])); ?>

                            <span class="badge rounded-pill bg-info ms-1"><?php echo e($trip->transactions->count()); ?></span>
                        </button>
                    </li>
                    
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents-content"
                            type="button" role="tab" aria-controls="documents-content" aria-selected="false">
                            <i class="fas fa-folder-open me-1"></i> <?php echo e(__('dashboard.documents')); ?>

                            <span class="badge rounded-pill bg-secondary ms-1"><?php echo e($trip->documents->count()); ?></span>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="tripTabsContent">
                    
                    <div class="tab-pane fade show active" id="photos-content" role="tabpanel" aria-labelledby="photos-tab">
                        <h5 class="mb-3"><i
                                class="fas fa-plus-circle me-2 text-success"></i><?php echo e(__('dashboard.add_new_photos')); ?></h5>
                        <form action="<?php echo e(route('admin.photos.store')); ?>" method="POST" enctype="multipart/form-data"
                            class="mb-4">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="trip_id" value="<?php echo e($trip->id); ?>">
                            <div class="input-group mb-2">
                                <input class="form-control form-control-lg" type="file" id="photos" name="photos[]"
                                    multiple required aria-label="<?php echo e(__('dashboard.add_new_photos')); ?>">
                                <button type="submit" class="btn btn-success"><i class="fas fa-upload me-1"></i>
                                    <?php echo e(__('dashboard.upload')); ?></button>
                            </div>
                            
                            <div class="form-text mb-2"><?php echo e(__('dashboard.allowed_formats')); ?>: jpg, png, gif, svg. Max
                                2MB.</div>
                            
                            <div id="imagePreviewContainer" class="mt-2 d-flex flex-wrap gap-2"></div>
                        </form>
                        <hr class="my-4">

                        <?php if($trip->photos->isEmpty()): ?>
                            <div class="alert alert-info text-center" role="alert">
                                <i class="fas fa-image me-2"></i> <?php echo e(__('dashboard.no_photos_added')); ?>

                            </div>
                        <?php else: ?>
                            <div class="row g-3">
                                <?php $__currentLoopData = $trip->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 position-relative photo-thumbnail-container">
                                        <a href="<?php echo e(asset('storage/' . $photo->path)); ?>" data-bs-toggle="modal"
                                            data-bs-target="#photoModal"
                                            data-bs-img-src="<?php echo e(asset('storage/' . $photo->path)); ?>">
                                            <img src="<?php echo e(asset('storage/' . $photo->path)); ?>"
                                                alt="Photo <?php echo e($loop->iteration); ?>"
                                                class="img-thumbnail img-fluid photo-thumb">
                                        </a>
                                        <form action="<?php echo e(route('admin.photos.destroy', $photo)); ?>" method="POST"
                                            class="position-absolute top-0 end-0 m-1 delete-photo-form"
                                            data-message="<?php echo e(__('dashboard.confirm_delete_photo')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger btn-circle"
                                                title="<?php echo e(__('dashboard.delete')); ?>"><i
                                                    class="fas fa-times"></i></button>
                                        </form>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    
                    <div class="tab-pane fade" id="impressions-content" role="tabpanel"
                        aria-labelledby="impressions-tab">
                        <h5 class="mb-3"><i
                                class="fas fa-plus-circle me-2 text-info"></i><?php echo e(__('dashboard.add_your_impression')); ?>

                        </h5>
                        <form action="<?php echo e(route('admin.impressions.store')); ?>" method="POST"
                            class="mb-4 add-impression-form">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="trip_id" value="<?php echo e($trip->id); ?>">
                            <div class="mb-3">
                                <label for="impression_text"
                                    class="form-label visually-hidden"><?php echo e(__('dashboard.add_your_impression')); ?></label>
                                <textarea name="text" id="impression_text" class="form-control" rows="3"
                                    placeholder="<?php echo e(__('dashboard.write_impression')); ?>" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-info"><i class="fas fa-plus me-1"></i>
                                <?php echo e(__('dashboard.add_impression')); ?></button>
                        </form>
                        <hr class="my-4">

                        <?php if($trip->impressions->isEmpty()): ?>
                            <div class="alert alert-info text-center" role="alert">
                                <i class="fas fa-comment-slash me-2"></i> <?php echo e(__('dashboard.no_impressions_added')); ?>

                            </div>
                        <?php else: ?>
                            <ul class="list-group list-group-flush">
                                <?php $__currentLoopData = $trip->impressions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $impression): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li
                                        class="list-group-item py-3 impression-item <?php echo e($loop->first ? 'border-top' : ''); ?>">
                                        <div class="d-flex align-items-start">
                                            
                                            <div class="flex-shrink-0 me-3">
                                                
                                                <?php if($impression->user && $impression->user->profile_image): ?>
                                                    <img src="<?php echo e(asset('storage/' . $impression->user->profile_image)); ?>"
                                                        
                                                        alt="<?php echo e($impression->user->name ?? 'User'); ?>"
                                                        class="rounded-circle" width="40" height="40"
                                                        style="object-fit: cover;">
                                                <?php else: ?>
                                                    
                                                    <span
                                                        class="avatar-placeholder rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                                                        style="width: 40px; height: 40px; font-size: 1rem;"
                                                        title="<?php echo e($impression->user->name ?? __('dashboard.anonymous')); ?>">
                                                        <?php echo e(strtoupper(substr($impression->user->name ?? 'A', 0, 1))); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>

                                            
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                    <h6 class="mb-0 fw-bold">
                                                        <?php echo e($impression->user->name ?? __('dashboard.anonymous')); ?>

                                                        <?php if($impression->user_id === Auth::id()): ?>
                                                            <span
                                                                class="badge bg-primary rounded-pill ms-2 fw-normal"><?php echo e(__('dashboard.you')); ?></span>
                                                        <?php endif; ?>
                                                    </h6>
                                                    <small
                                                        class="text-muted flex-shrink-0 ms-2"><?php echo e($impression->created_at->diffForHumans()); ?></small>
                                                </div>
                                                <p class="mb-0 text-body-secondary"><?php echo e($impression->text); ?></p>
                                            </div>

                                            
                                            <?php if($impression->user_id === Auth::id() || $trip->user_id === Auth::id()): ?>
                                                <form action="<?php echo e(route('admin.impressions.destroy', $impression)); ?>"
                                                    method="POST"
                                                    class="d-inline delete-impression-form ms-3 flex-shrink-0"
                                                    data-message="<?php echo e(__('dashboard.confirm_delete_impression')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit"
                                                        class="btn btn-sm btn-outline-danger border-0 p-1"
                                                        title="<?php echo e(__('dashboard.delete')); ?>"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    
                    <div class="tab-pane fade" id="transactions-content" role="tabpanel"
                        aria-labelledby="transactions-tab">
                        
                        <h5 class="mb-3">
                            <i
                                class="fas fa-plus-circle me-2 text-primary"></i><?php echo e(__('dashboard.add_new_transaction', ['fallback' => 'Add New Transaction'])); ?>

                        </h5>
                        <form action="<?php echo e(route('admin.trips.transactions.store', $trip)); ?>" method="POST"
                            class="mb-4 p-3 border rounded bg-light transaction-form-styled">
                            <?php echo csrf_field(); ?>
                            
                            <div class="row g-2 align-items-end"> 
                                
                                <div class="col-lg-auto col-md-2"> 
                                    <div class="form-group floating-label mb-0 h-100">
                                        <label for="transaction_type" class="form-label"><i
                                                class="fas fa-exchange-alt"></i>
                                            <?php echo e(__('dashboard.type', ['fallback' => 'Type'])); ?></label>
                                        <div class="input-group">
                                            <select class="form-control" id="transaction_type" name="type" required>
                                                <option value="expense" <?php echo e(old('type') == 'expense' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('dashboard.expense', ['fallback' => 'Expense'])); ?></option>
                                                <option value="income" <?php echo e(old('type') == 'income' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('dashboard.income', ['fallback' => 'Income'])); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-2 col-md-3" id="expenseCategoryGroup"
                                    style="display: <?php echo e(old('type', 'expense') == 'expense' ? 'block' : 'none'); ?>;">
                                    
                                    <div class="form-group floating-label mb-0 h-100">
                                        <label for="expense_category_id" class="form-label"><i class="fas fa-tag"></i>
                                            <?php echo e(__('dashboard.category', ['fallback' => 'Category'])); ?></label>
                                        <div class="input-group">
                                            <select class="form-control" id="expense_category_id"
                                                name="expense_category_id"
                                                <?php echo e(old('type', 'expense') == 'expense' ? 'required' : ''); ?>>
                                                <option value="" disabled
                                                    <?php echo e(old('expense_category_id') ? '' : 'selected'); ?>>
                                                    
                                                    <?php echo e(__('dashboard.select_category', ['fallback' => 'Select Category'])); ?>

                                                </option>
                                                <?php $__empty_1 = true; $__currentLoopData = $expenseCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    
                                                    <option value="<?php echo e($category->id); ?>"
                                                        <?php echo e(old('expense_category_id') == $category->id ? 'selected' : ''); ?>>
                                                        <?php echo e($category->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    
                                                    <option value="" disabled>
                                                        <?php echo e(__('dashboard.no_categories_available', ['fallback' => 'No categories available'])); ?>

                                                    </option>
                                                <?php endif; ?> 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg col-md-4"> 
                                    <div class="form-group floating-label mb-0 h-100">
                                        <label for="transaction_description" class="form-label"><i
                                                class="fas fa-pen"></i>
                                            <?php echo e(__('dashboard.description', ['fallback' => 'Description'])); ?></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="transaction_description"
                                                name="description" required value="<?php echo e(old('description')); ?>"
                                                placeholder=" ">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-auto col-md-2"> 
                                    <div class="form-group floating-label mb-0 h-100">
                                        <label for="transaction_amount" class="form-label"><i
                                                class="fas fa-dollar-sign"></i>
                                            <?php echo e(__('dashboard.amount', ['fallback' => 'Amount'])); ?></label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" min="0.01" class="form-control"
                                                id="transaction_amount" name="amount" required
                                                value="<?php echo e(old('amount')); ?>" placeholder=" ">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-2 col-md-2">
                                    <div class="form-group floating-label mb-0 h-100">
                                        <label for="transaction_date" class="form-label"><i
                                                class="fas fa-calendar-alt"></i>
                                            <?php echo e(__('dashboard.date', ['fallback' => 'Date'])); ?></label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" id="transaction_date"
                                                name="transaction_date" required
                                                value="<?php echo e(old('transaction_date', date('Y-m-d'))); ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-auto col-md-2"> 
                                    <div class="form-group floating-label mb-0 h-100">
                                        <label for="transaction_currency" class="form-label"><i class="fas fa-coins"></i>
                                            <?php echo e(__('dashboard.currency', ['fallback' => 'Currency'])); ?></label>
                                        <div class="input-group">
                                            <select class="form-control" id="transaction_currency" name="currency"
                                                required> 
                                                
                                                <?php
                                                    $commonCurrencies = ['USD', 'SAR', 'YER', 'INR', 'EGP', 'JOD'];
                                                    $defaultCurrency = old(
                                                        'currency',
                                                        $transactionsByCurrency->keys()->first() ?? 'USD',
                                                    );
                                                ?>
                                                <?php $__currentLoopData = $commonCurrencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currencyCode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($currencyCode); ?>"
                                                        <?php echo e($defaultCurrency == $currencyCode ? 'selected' : ''); ?>>
                                                        <?php echo e($currencyCode); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                                <?php if(!in_array(old('currency'), $commonCurrencies) && old('currency')): ?>
                                                    <option value="<?php echo e(old('currency')); ?>" selected><?php echo e(old('currency')); ?>

                                                    </option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg col-md-4"> 
                                    <div class="form-group floating-label mb-0 h-100">
                                        <label for="transaction_notes" class="form-label"><i
                                                class="fas fa-sticky-note"></i>
                                            <?php echo e(__('dashboard.notes', ['fallback' => 'Notes'])); ?></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="transaction_notes"
                                                name="notes" value="<?php echo e(old('notes')); ?>" placeholder=" ">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-auto col-md-2"> 
                                    <div class="filter-buttons h-100">
                                        <button type="submit" class="btn btn-primary btn-apply w-100"><i
                                                class="fas fa-plus me-1"></i>
                                            <?php echo e(__('dashboard.add', ['fallback' => 'Add'])); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4">

                        <?php
                            // Group transactions by currency
                            $transactionsByCurrency = $trip->transactions->groupBy('currency');
                        ?>

                        <?php if($transactionsByCurrency->isEmpty()): ?>
                            <div class="alert alert-info text-center" role="alert">
                                <i class="fas fa-wallet me-2"></i>
                                <?php echo e(__('dashboard.no_transactions_added', ['fallback' => 'No transactions added yet.'])); ?>

                            </div>
                        <?php else: ?>
                            
                            <?php $__currentLoopData = $transactionsByCurrency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency => $transactionsInCurrency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $totalIncome = $transactionsInCurrency->where('type', 'income')->sum('amount');
                                    $totalExpense = $transactionsInCurrency->where('type', 'expense')->sum('amount');
                                    $balance = $totalIncome - $totalExpense;
                                ?>

                                
                                <h5 class="mb-3">
                                    <i class="fas fa-calculator me-2 text-muted"></i>
                                    <?php echo e(__('dashboard.financial_summary', ['fallback' => 'Financial Summary'])); ?>

                                    (<?php echo e($currency); ?>)
                                </h5>
                                <div class="row mb-4 summary-row">
                                    <div class="col-md-4">
                                        <div class="summary-card bg-success-subtle text-success-emphasis">
                                            <div><?php echo e(__('dashboard.total_income', ['fallback' => 'Total Income'])); ?></div>
                                            <div class="amount"><?php echo e(number_format($totalIncome)); ?>

                                                <small><?php echo e($currency); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="summary-card bg-danger-subtle text-danger-emphasis">
                                            <div><?php echo e(__('dashboard.total_expense', ['fallback' => 'Total Expense'])); ?>

                                            </div>
                                            <div class="amount"><?php echo e(number_format($totalExpense)); ?>

                                                <small><?php echo e($currency); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div
                                            class="summary-card <?php echo e($balance >= 0 ? 'bg-primary-subtle text-primary-emphasis' : 'bg-warning-subtle text-warning-emphasis'); ?>">
                                            <div><?php echo e(__('dashboard.balance', ['fallback' => 'Balance'])); ?></div>
                                            <div class="amount"><?php echo e(number_format($balance)); ?>

                                                <small><?php echo e($currency); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <h5 class="mb-3">
                                    <i class="fas fa-list me-2 text-muted"></i>
                                    <?php echo e(__('dashboard.transactions_history', ['fallback' => 'Transactions History'])); ?>

                                    (<?php echo e($currency); ?>)
                                </h5>
                                <div class="table-responsive mb-4"> 
                                    <table class="table table-sm table-striped table-hover transaction-table">
                                        <thead class="table-light">
                                            <tr>
                                                <th><?php echo e(__('dashboard.date', ['fallback' => 'Date'])); ?></th>
                                                <th><?php echo e(__('dashboard.type', ['fallback' => 'Type'])); ?></th>
                                                <th><?php echo e(__('dashboard.category', ['fallback' => 'Category'])); ?></th>
                                                <th><?php echo e(__('dashboard.description', ['fallback' => 'Description'])); ?></th>
                                                <th class="text-end">
                                                    <?php echo e(__('dashboard.amount', ['fallback' => 'Amount'])); ?></th>
                                                <th><?php echo e(__('dashboard.notes', ['fallback' => 'Notes'])); ?></th>
                                                <th><?php echo e(__('dashboard.actions', ['fallback' => 'Actions'])); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $transactionsInCurrency->sortByDesc('transaction_date'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($transaction->transaction_date->format('Y-m-d')); ?></td>
                                                    <td>
                                                        <?php if($transaction->type == 'income'): ?>
                                                            <span
                                                                class="badge bg-success-soft"><?php echo e(__('dashboard.income', ['fallback' => 'Income'])); ?></span>
                                                        <?php else: ?>
                                                            <span
                                                                class="badge bg-danger-soft"><?php echo e(__('dashboard.expense', ['fallback' => 'Expense'])); ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($transaction->expenseCategory?->name ?? '--'); ?></td>
                                                    <td><?php echo e($transaction->description); ?></td>
                                                    <td
                                                        class="text-end <?php echo e($transaction->type == 'income' ? 'text-success' : 'text-danger'); ?>">
                                                        <?php echo e(($transaction->type == 'income' ? '+' : '-') . number_format($transaction->amount)); ?>

                                                        
                                                    </td>
                                                    <td><?php echo e($transaction->notes); ?></td>
                                                    <td>
                                                        <a href="<?php echo e(route('admin.transactions.edit', $transaction->id)); ?>"
                                                            class="btn btn-sm btn-outline-warning me-1"
                                                            title="<?php echo e(__('dashboard.edit')); ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form
                                                            action="<?php echo e(route('admin.transactions.destroy', $transaction->id)); ?>"
                                                            method="POST" class="d-inline delete-transaction-form"
                                                            data-message="<?php echo e(__('dashboard.confirm_delete_transaction', ['fallback' => 'Are you sure you want to delete this transaction?'])); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                                title="<?php echo e(__('dashboard.delete')); ?>">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if(!$loop->last): ?>
                                    <hr class="my-4">
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        
                        <?php if($trip->budget_amount && $trip->budget_currency): ?>
                            <?php
                                // Calculate total expenses ONLY in the budget currency
                                $totalExpensesInBudgetCurrency = $trip->transactions
                                    ->where('type', 'expense')
                                    ->where('currency', $trip->budget_currency)
                                    ->sum('amount');
                                $percentageUsed =
                                    $trip->budget_amount > 0
                                        ? ($totalExpensesInBudgetCurrency / $trip->budget_amount) * 100
                                        : 0;
                                $remainingBudget = $trip->budget_amount - $totalExpensesInBudgetCurrency;
                                $progressColor =
                                    $percentageUsed > 100
                                        ? 'bg-danger'
                                        : ($percentageUsed > 80
                                            ? 'bg-warning'
                                            : 'bg-success');
                            ?>
                            <hr class="my-4">
                            <div class="budget-progress-section mt-4 px-3">
                                <h5 class="mb-3">
                                    <i class="fas fa-chart-pie me-2 text-primary"></i>
                                    <?php echo e(__('dashboard.budget_status', ['fallback' => 'Budget Status'])); ?>

                                    (<?php echo e($trip->budget_currency); ?>)
                                </h5>
                                <div class="mb-2 d-flex justify-content-between">
                                    <span><?php echo e(__('dashboard.budget', ['fallback' => 'Budget'])); ?>:
                                        <?php echo e(number_format($trip->budget_amount)); ?></span>
                                    <span><?php echo e(__('dashboard.spent', ['fallback' => 'Spent'])); ?>:
                                        <?php echo e(number_format($totalExpensesInBudgetCurrency)); ?></span>
                                    <span>
                                        <?php if($remainingBudget >= 0): ?>
                                            <?php echo e(__('dashboard.remaining', ['fallback' => 'Remaining'])); ?>: <strong
                                                class="text-success"><?php echo e(number_format($remainingBudget)); ?></strong>
                                        <?php else: ?>
                                            <?php echo e(__('dashboard.overspent', ['fallback' => 'Overspent'])); ?>: <strong
                                                class="text-danger"><?php echo e(number_format(abs($remainingBudget))); ?></strong>
                                        <?php endif; ?>
                                    </span>
                                </div>
                                <div class="progress" style="height: 20px;">
                                    <div class="progress-bar <?php echo e($progressColor); ?>" role="progressbar"
                                        style="width: <?php echo e(min($percentageUsed, 100)); ?>%;" 
                                        aria-valuenow="<?php echo e($percentageUsed); ?>" aria-valuemin="0" aria-valuemax="100">
                                        <?php echo e(number_format($percentageUsed, 1)); ?>%
                                    </div>
                                </div>
                                <?php if($percentageUsed > 100): ?>
                                    <div class="text-danger small mt-1"><i
                                            class="fas fa-exclamation-triangle me-1"></i><?php echo e(__('dashboard.budget_exceeded', ['fallback' => 'Budget exceeded!'])); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    
                    <div class="tab-pane fade" id="documents-content" role="tabpanel" aria-labelledby="documents-tab">
                        
                        <h5 class="mb-3"><i
                                class="fas fa-plus-circle me-2 text-primary"></i><?php echo e(__('dashboard.upload_new_document', ['fallback' => 'Upload New Document'])); ?>

                        </h5>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', [App\Models\Document::class, $trip])): ?>
                            <div class="mb-4 p-3 border rounded bg-light-subtle">
                                <form action="<?php echo e(route('admin.documents.store', ['trip' => $trip->id])); ?>" method="POST"
                                    enctype="multipart/form-data"> 
                                    <?php echo csrf_field(); ?>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="document" name="document" required>
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-upload me-1"></i>
                                            <?php echo e(__('dashboard.upload', ['fallback' => 'Upload'])); ?>

                                        </button>
                                    </div>
                                    <?php $__errorArgs = ['document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger mt-1 small"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </form>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-secondary" role="alert">
                                <?php echo e(__('dashboard.cannot_upload_document', ['fallback' => 'You do not have permission to upload documents for this trip.'])); ?>

                            </div>
                        <?php endif; ?>
                        <hr class="my-4">

                        
                        <h5 class="mb-3"><i
                                class="fas fa-list me-2 text-muted"></i><?php echo e(__('dashboard.uploaded_documents', ['fallback' => 'Uploaded Documents'])); ?>

                        </h5>
                        <div class="documents-list">
                            <?php if($trip->documents->isNotEmpty()): ?>
                                <ul class="list-group list-group-flush">
                                    <?php $__currentLoopData = $trip->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap document-item">
                                            <div class="document-info me-3 mb-2 mb-md-0">
                                                <i
                                                    class="fas <?php echo e(\App\Helpers\FileHelper::getIconForMimeType($document->mime_type)); ?> me-2 text-secondary"></i>
                                                <a href="<?php echo e(Storage::url($document->path)); ?>" target="_blank"
                                                    class="fw-bold document-link"><?php echo e($document->name); ?></a>
                                                <span
                                                    class="text-muted small ms-2">(<?php echo e(\App\Helpers\FileHelper::formatBytes($document->size)); ?>)</span>
                                                <span class="text-muted small d-block d-md-inline ms-md-3">
                                                    <i class="far fa-calendar-alt me-1"></i>
                                                    <?php echo e($document->created_at->format('d M Y, H:i')); ?>

                                                </span>
                                                <span class="text-muted small d-block d-md-inline ms-md-3">
                                                    <i class="far fa-user me-1"></i>
                                                    <?php echo e($document->user->name ?? __('dashboard.unknown_user', ['fallback' => 'Unknown User'])); ?>

                                                </span>
                                            </div>
                                            
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $document)): ?>
                                                <form action="<?php echo e(route('admin.documents.destroy', $document)); ?>"
                                                    method="POST" class="delete-form delete-document-form"
                                                    data-message="<?php echo e(__('dashboard.confirm_delete_document', ['fallback' => 'Are you sure you want to delete this document?'])); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash-alt"></i> <span
                                                            class="d-none d-md-inline"><?php echo e(__('dashboard.delete', ['fallback' => 'Delete'])); ?></span>
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php else: ?>
                                <p class="text-muted text-center">
                                    <?php echo e(__('dashboard.no_documents_yet', ['fallback' => 'No documents uploaded yet.'])); ?>

                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="photoModalLabel"><?php echo e(__('dashboard.photo_preview')); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="" id="modalImage" class="img-fluid rounded" alt="Photo Preview">
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        /* Apply Cairo Font if not default */
        body {
            /* Assuming Cairo is loaded in master.blade.php */
            font-family: 'Cairo', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        /* General Card Styles */
        .create-category-card,
        .card.shadow {
            border: 1px solid #e3e6f0;
            border-radius: 0.5rem;
            box-shadow: 0 0.15rem 1rem rgba(0, 0, 0, 0.05) !important;
            /* Consistent subtle shadow */
            border-top: 3px solid var(--bs-primary);
            /* Consistent top border */
        }

        .create-category-card {
            margin-bottom: 1rem !important;
            /* Reduced margin below details card */
        }

        /* Header inside card */
        .create-category-card .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .icon-wrapper {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .icon-wrapper i {
            font-size: 1.1rem;
        }

        .icon-wrapper.bg-primary {
            background: var(--bs-primary);
        }

        /* Back Button Styles (Simplified & Consolidated) */
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.4rem 0.8rem;
            /* Adjusted padding */
            font-size: 0.8rem;
            /* Adjusted size */
            font-weight: 500;
            border-radius: 0.375rem;
            text-decoration: none;
            transition: all 0.2s ease;
            border: 1px solid transparent;
        }

        .back-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 0.1rem 0.4rem rgba(0, 0, 0, 0.1);
        }

        .btn-outline-primary.back-btn {
            color: var(--bs-primary);
            border-color: var(--bs-primary);
        }

        .btn-outline-primary.back-btn:hover {
            background-color: var(--bs-primary);
            color: var(--bs-white);
        }

        .btn-outline-warning.back-btn {
            color: var(--bs-warning);
            border-color: var(--bs-warning);
        }

        .btn-outline-warning.back-btn:hover {
            background-color: var(--bs-warning);
            color: var(--bs-dark);
        }

        .btn-outline-secondary.back-btn {
            color: var(--bs-secondary);
            border-color: var(--bs-secondary);
        }

        .btn-outline-secondary.back-btn:hover {
            background-color: var(--bs-secondary);
            color: var(--bs-white);
        }

        /* New Trip Details DL Styles */
        .trip-details-dl {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            /* Reduced minimum width */
            gap: 0.4rem 1rem;
            /* Reduced row gap significantly, kept column gap */
            padding: 0.5rem 0;
            /* Reduced vertical padding */
        }

        .trip-details-dl>div {
            /* Each dt/dd pair */
            background-color: #f8f9fc;
            padding: 0.5rem 0.8rem;
            /* Reduced padding */
            border-radius: 0.375rem;
            border-left: 3px solid #e3e6f0;
            transition: border-left-color 0.2s ease;
        }

        .trip-details-dl>div:hover {
            border-left-color: var(--bs-primary);
        }

        .trip-details-dl dt {
            font-weight: 600;
            color: var(--bs-gray-700);
            /* Darker label */
            font-size: 0.75rem;
            /* Slightly smaller label */
            margin-bottom: 0.1rem;
            /* Reduced margin below dt */
            display: flex;
            align-items: center;
            text-transform: uppercase;
        }

        .trip-details-dl dt i {
            color: var(--bs-primary);
            width: 16px;
            text-align: center;
            margin-right: 0.5rem;
            font-size: 0.9rem;
        }

        .trip-details-dl dd {
            color: var(--bs-gray-900);
            font-size: 0.95rem;
            margin-bottom: 0;
            /* Reset default margin */
            word-wrap: break-word;
        }

        .trip-details-dl dd .badge {
            font-size: 0.85rem;
            vertical-align: middle;
        }

        /* Description item styling (no longer spanning full width) */
        .trip-details-dl .description-item {
            background-color: #f8f9fc;
            border-left-color: #1cc88a;
            /* Different color for description */
        }

        .trip-details-dl .description-item:hover {
            border-left-color: #1cc88a;
        }

        /* Tab Styles Refined */
        .nav-tabs {
            border-bottom: 1px solid #dee2e6;
        }

        .nav-tabs .nav-item {
            margin-bottom: -1px;
            /* Overlap border */
        }

        .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-top-left-radius: 0.375rem;
            border-top-right-radius: 0.375rem;
            color: var(--bs-gray-600);
            padding: 0.8rem 1.25rem;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .nav-tabs .nav-link:hover,
        .nav-tabs .nav-link:focus {
            border-color: #e9ecef #e9ecef #dee2e6;
            isolation: isolate;
            color: var(--bs-primary);
        }

        .nav-tabs .nav-link.active,
        .nav-tabs .nav-item.show .nav-link {
            color: var(--bs-primary);
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
            font-weight: 600;
        }

        .tab-content {
            padding-top: 1.5rem;
        }

        /* Photos Tab Content */
        #photos-content h5 {
            font-weight: 500;
            color: var(--bs-success);
        }

        #photos-content .input-group .form-control {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        #photos-content .input-group .btn {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        #imagePreviewContainer img {
            border: 1px solid #dee2e6;
            padding: 2px;
        }

        .photo-thumb {
            object-fit: contain;
            width: 100%;
            height: 100%;
            max-width: 100%;
            max-height: 100%;
            display: block;
        }

        .photo-thumbnail-container .delete-photo-form {
            opacity: 0;
            transition: opacity 0.2s ease-in-out;
        }

        .photo-thumbnail-container:hover .delete-photo-form {
            opacity: 1;
        }

        .btn-circle {
            /* Keep delete button style */
            width: 28px;
            height: 28px;
            padding: 0;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }

        /* Impressions Tab Content */
        #impressions-content h5 {
            font-weight: 500;
            color: var(--bs-info);
        }

        #impressions-content .add-impression-form textarea {
            resize: vertical;
        }

        #impressions-content .list-group-flush {
            border-top: 1px solid #dee2e6;
            /* Add separator if needed */
        }

        #impressions-content .list-group-item {
            background-color: #fff;
            border-bottom: 1px solid #e3e6f0 !important;
            /* Ensure bottom border */
            padding: 1rem 0.5rem;
            /* Adjusted padding */
            transition: background-color 0.15s ease-in-out;
        }

        #impressions-content .list-group-item:last-child {
            border-bottom: 0 !important;
        }

        #impressions-content .list-group-item:hover {
            background-color: #f8f9fc;
        }

        .avatar-placeholder {
            /* Style for avatar */
            width: 40px;
            height: 40px;
            font-size: 1rem;
            background-color: var(--bs-secondary);
            color: white;
        }

        #impressions-content .impression-item h6 {
            font-size: 0.95rem;
        }

        #impressions-content .impression-item p {
            font-size: 0.9rem;
            color: var(--bs-gray-700);
        }

        #impressions-content .impression-item small {
            font-size: 0.8rem;
        }

        .delete-impression-form button {
            color: var(--bs-danger);
        }

        .delete-impression-form button:hover {
            background-color: var(--bs-danger);
            color: white;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .create-category-card .card-header {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 0.8rem;
            }

            .trip-details-dl {
                grid-template-columns: 1fr;
                /* Single column on smaller screens */
                gap: 0.5rem;
            }

            .trip-details-dl>div {
                padding: 0.6rem 0.8rem;
            }

            .trip-details-dl .description-item {
                grid-column: auto;
            }

            /* Reset span */
            .photo-thumbnail-container>a {
                height: 140px;
                /* Adjust height for this breakpoint */
            }
        }

        @media (max-width: 576px) {
            .back-btn {
                padding: 0.3rem 0.6rem;
                font-size: 0.75rem;
            }

            .nav-tabs .nav-link {
                padding: 0.7rem 0.8rem;
                font-size: 0.9rem;
            }

            .photo-thumbnail-container>a {
                height: 110px;
                /* Adjust height for this breakpoint */
            }

            #impressions-content .list-group-item {
                padding: 0.8rem 0.25rem;
            }
        }

        /* Style for the image inside the photo modal */
        #modalImage {
            max-width: 100%;
            /* Keep from img-fluid (scales width) */
            height: auto;
            /* Keep from img-fluid (adjusts height proportionally) */
            object-fit: contain;
            /* Ensure the whole image is visible, letterboxed if needed */
            display: block;
            /* Ensure block display */
            margin-left: auto;
            /* Center horizontally */
            margin-right: auto;
            /* Center horizontally */
        }

        /* Ensure modal body allows scrolling if image is too tall */
        #photoModal .modal-body {
            overflow-y: auto;
            /* Allow vertical scroll */
            max-height: 85vh;
            /* Limit max height of the body */
            padding: 1rem;
            /* Ensure padding is present */
        }

        /* Transaction Tab Specific Styles */
        /* Financial Summary Cards - Inspired by index page */
        .summary-row .summary-card {
            padding: 1rem;
            border-radius: 0.75rem;
            /* Slightly larger radius */
            margin-bottom: 1rem;
            text-align: center;
            border: 1px solid transparent;
            transition: all 0.3s ease;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.04);
        }

        .summary-row .summary-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08);
        }

        /* Override Bootstrap subtle backgrounds for more control if needed */
        .summary-card.bg-success-subtle {
            background-color: #e1fcef !important;
            border-color: #a6e9d5;
            color: #0a5c3a !important;
        }

        .summary-card.bg-danger-subtle {
            background-color: #fce1e3 !important;
            border-color: #f5b0b7;
            color: #842029 !important;
        }

        .summary-card.bg-primary-subtle {
            background-color: #ddeafd !important;
            border-color: #a9cdfa;
            color: #052c65 !important;
        }

        .summary-card.bg-warning-subtle {
            background-color: #fff3cd !important;
            border-color: #ffe69c;
            color: #664d03 !important;
        }

        .summary-row .summary-card .amount {
            font-size: 1.6rem;
            /* Slightly larger */
            font-weight: 600;
            margin-top: 0.35rem;
            display: block;
            /* Ensure it takes full width */
        }

        .summary-row .summary-card .amount small {
            font-size: 0.9rem;
            font-weight: 500;
            opacity: 0.8;
        }

        /* Transaction Table Styles - Inspired by index page */
        .transaction-table {
            width: 100%;
            margin-bottom: 1rem;
            /* Add some margin */
            border-collapse: separate;
            /* Use separate for rounded corners */
            border-spacing: 0 0.5rem;
            /* Vertical spacing between rows */
        }

        .transaction-table thead th {
            background: linear-gradient(135deg, #f8f9fc, #ffffff);
            /* Header gradient */
            color: var(--bs-primary);
            /* Use primary color */
            font-weight: 600;
            padding: 0.75rem 0.8rem;
            border: none;
            font-size: 0.85rem;
            text-align: center;
            position: relative;
        }

        .transaction-table thead th:first-child {
            border-top-left-radius: 0.5rem;
        }

        .transaction-table thead th:last-child {
            border-top-right-radius: 0.5rem;
        }

        .transaction-table tbody tr {
            background: white;
            border-radius: 0.5rem;
            /* Rounded rows */
            box-shadow: 0 0.2rem 0.6rem rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
        }

        .transaction-table tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.4rem 0.8rem rgba(0, 0, 0, 0.07);
        }

        .transaction-table td {
            padding: 0.7rem 0.8rem;
            /* Consistent padding */
            border: none;
            vertical-align: middle;
            font-size: 0.9rem;
            text-align: center;
            /* Center align most cells */
        }

        .transaction-table td:nth-child(3),
        /* Description */
        .transaction-table td:nth-child(5) {
            /* Notes */
            text-align: start;
            /* Align text columns left */
        }

        .transaction-table td:nth-child(4) {
            /* Amount */
            text-align: end;
            /* Align amount right */
            font-weight: 500;
        }

        .transaction-table tbody tr td:first-child {
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }

        .transaction-table tbody tr td:last-child {
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }

        /* Softer Badge Styles - Reusing definitions */
        .bg-success-soft {
            background-color: rgba(var(--bs-success-rgb), 0.15) !important;
            color: var(--bs-success-emphasis) !important;
            padding: 0.3em 0.6em;
            border-radius: 0.25rem;
        }

        .bg-danger-soft {
            background-color: rgba(var(--bs-danger-rgb), 0.15) !important;
            color: var(--bs-danger-emphasis) !important;
            padding: 0.3em 0.6em;
            border-radius: 0.25rem;
        }

        /* Add Transaction Form - Floating Label Styles */
        .transaction-form-styled .form-group.floating-label {
            position: relative;
            margin-bottom: 0;
            width: 100%;
            height: 100%;
        }

        .transaction-form-styled .form-group.floating-label .form-label {
            position: absolute;
            top: -10px;
            <?php echo e(app()->isLocale('ar') ? 'right' : 'left'); ?>: 10px;
            background: var(--bs-light);
            padding: 0 8px;
            font-size: 12px;
            color: var(--bs-primary);
            font-weight: 600;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            border-radius: 15px;
            /* Match filter label radius */
            pointer-events: none;
            height: 20px;
            line-height: 20px;
            transition: all 0.2s ease-out;
            white-space: nowrap;
            box-shadow: 0 1px 3px rgba(var(--bs-primary-rgb), 0.1);
            /* Match filter label shadow */
        }

        .transaction-form-styled .form-group.floating-label .form-label i {
            font-size: 11px;
        }

        .transaction-form-styled .input-group {
            position: relative;
            border: 2px solid #e3e6f0;
            /* Match filter border */
            border-radius: 15px;
            /* Match filter radius */
            transition: all 0.2s ease;
            background: white;
            height: 100%;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .transaction-form-styled .input-group:focus-within {
            border-color: var(--bs-primary);
            box-shadow: 0 0 0 0.2rem rgba(var(--bs-primary-rgb), 0.15);
        }

        .transaction-form-styled .form-group.floating-label .form-control,
        .transaction-form-styled .form-group.floating-label .form-select {
            border: none;
            padding: 0.6rem 1rem;
            /* Adjusted padding */
            font-size: 0.9rem;
            background: transparent;
            transition: all 0.3s ease;
            color: #212529;
            width: 100%;
            height: 100%;
            border-radius: 13px;
            /* Inner radius */
            position: relative;
            z-index: 1;
            box-shadow: none !important;
            outline: none !important;
            padding-top: 0.8rem;
            /* Reduced top padding for label */
        }

        /* Remove top padding adjustment for date input */
        .transaction-form-styled .form-group.floating-label input[type="date"].form-control {
            padding-top: 0.6rem;
        }

        /* Adjust label position based on input state (no changes needed here usually) */
        .transaction-form-styled .form-group.floating-label .form-control:focus~.form-label,
        .transaction-form-styled .form-group.floating-label .form-control:not(:placeholder-shown):not([type="date"])~.form-label,
        .transaction-form-styled .form-group.floating-label .form-select:valid~.form-label {
            /* Styles for floated label - already positioned by top: -10px */
            /* Example: font-size: 11px; color: var(--bs-primary); */
        }

        .transaction-form-styled .form-group.floating-label .form-select {
            appearance: none;
            padding-right: 2.5rem;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%236a11cb' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            /* Match filter select arrow */
            background-repeat: no-repeat;
            background-position: <?php echo e(app()->isLocale('ar') ? 'left' : 'right'); ?> 0.75rem center;
            background-size: 16px 12px;
            cursor: pointer;
        }

        /* Style for the add button container/button */
        .transaction-form-styled .filter-buttons {
            display: flex;
            align-items: stretch;
        }

        .transaction-form-styled .filter-buttons .btn {
            flex: 1;
            height: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            /* Match filter radius */
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            text-transform: none;
            letter-spacing: normal;
            border: 2px solid var(--bs-primary);
            background: var(--bs-primary);
            color: white;
            box-shadow: none;
        }

        .transaction-form-styled .filter-buttons .btn:hover {
            background: var(--bs-primary-dark);
            border-color: var(--bs-primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 0.25rem 0.5rem rgba(var(--bs-primary-rgb), 0.2);
        }

        /* Responsive Adjustments */
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function setupDeleteConfirmation(selector, defaultMessageKey) {
                const deleteForms = document.querySelectorAll(selector);
                const title = '<?php echo e(__('dashboard.are_you_sure')); ?>';
                const confirmButtonText = '<?php echo e(__('dashboard.yes_delete')); ?>';
                const cancelButtonText = '<?php echo e(__('dashboard.cancel')); ?>';
                const defaultMessage =
                    `<?php echo e(__('${defaultMessageKey}', ['fallback' => 'Are you sure?'])); ?>`; // Fetch fallback dynamically

                deleteForms.forEach(form => {
                    form.addEventListener('submit', function(event) {
                        event.preventDefault();
                        const message = form.getAttribute('data-message') || defaultMessage;
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                title: title,
                                text: message,
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#dc3545',
                                cancelButtonColor: '#6c757d',
                                confirmButtonText: confirmButtonText,
                                cancelButtonText: cancelButtonText,
                                reverseButtons: true,
                                customClass: { // Optional: Ensure modal fits smaller screens
                                    popup: 'swal2-popup-responsive'
                                }
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    form.submit();
                                }
                            });
                        } else if (confirm(message)) {
                            form.submit();
                        }
                    });
                });
            }

            setupDeleteConfirmation('.delete-photo-form', '<?php echo e(__('dashboard.confirm_delete_photo')); ?>');
            setupDeleteConfirmation('.delete-impression-form', '<?php echo e(__('dashboard.confirm_delete_impression')); ?>');
            setupDeleteConfirmation('.delete-transaction-form',
                '<?php echo e(__('dashboard.confirm_delete_transaction')); ?>');
            setupDeleteConfirmation('.delete-document-form', '<?php echo e(__('dashboard.confirm_delete_document')); ?>');

            // Script for Photo Modal
            var photoModal = document.getElementById('photoModal');
            if (photoModal) {
                photoModal.addEventListener('show.bs.modal', function(event) {
                    var button = event.relatedTarget; // Button that triggered the modal
                    var imgSrc = button.getAttribute(
                        'data-bs-img-src'); // Extract info from data-* attributes
                    var modalImage = photoModal.querySelector('#modalImage');
                    modalImage.src = imgSrc; // Update the modal's content.
                });
                // Clear image src when modal is hidden to prevent flashing old image
                photoModal.addEventListener('hidden.bs.modal', function(event) {
                    var modalImage = photoModal.querySelector('#modalImage');
                    modalImage.src = "";
                });
            }

            // Script for Image Preview before Upload
            const photoInput = document.getElementById('photos');
            const previewContainer = document.getElementById('imagePreviewContainer');

            if (photoInput && previewContainer) {
                photoInput.addEventListener('change', function(event) {
                    previewContainer.innerHTML = ''; // Clear previous previews
                    const files = event.target.files;

                    if (files.length > 10) {
                        // Optional: Limit number of previews
                        alert('<?php echo e(__('dashboard.too_many_files_preview', ['count' => 10])); ?>');
                        // Clear the input field if needed
                        // event.target.value = null;
                        return;
                    }

                    Array.from(files).forEach(file => {
                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                const img = document.createElement('img');
                                img.src = e.target.result;
                                img.classList.add('img-thumbnail');
                                img.style.height = '80px'; // Adjust preview size as needed
                                img.style.width = 'auto';
                                img.style.objectFit = 'cover';
                                previewContainer.appendChild(img);
                            }

                            reader.readAsDataURL(file);
                        }
                    });
                });
            }

            // Script for handling Impression Form Submission via AJAX
            const impressionForm = document.querySelector('.add-impression-form');
            const impressionTextInput = document.getElementById('impression_text');
            const impressionsList = document.querySelector('#impressions-content ul.list-group');
            const noImpressionsMessage = document.querySelector(
                '#impressions-content .alert-info');
            const impressionsTabBadge = document.querySelector('#impressions-tab .badge');

            if (impressionForm && impressionTextInput && impressionsList) {
                impressionForm.addEventListener('submit', function(event) {
                    event.preventDefault();

                    const formData = new FormData(impressionForm);
                    const submitButton = impressionForm.querySelector('button[type="submit"]');
                    const originalButtonHtml = submitButton.innerHTML;
                    submitButton.disabled = true;
                    submitButton.innerHTML =
                        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo e(__('dashboard.loading', ['fallback' => 'Loading...'])); ?>`;

                    fetch(impressionForm.action, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]') ?
                                    document
                                    .querySelector('meta[name="csrf-token"]').getAttribute('content') :
                                    '',
                                'Accept': 'application/json',
                            },
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log("Received data after impression submission:",
                                data); // Log received data
                            if (data.success && data.impression) { // Ensure impression data exists
                                try { // Start try block for UI updates
                                    // Display success popup
                                    if (typeof Swal !== 'undefined') {
                                        Swal.fire({
                                            icon: 'success',
                                            title: data.message ||
                                                '<?php echo e(__('dashboard.impression_added_success')); ?>',
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                    }

                                    // --- BEGIN: Add new impression to UI ---
                                    const newImpression = data.impression;
                                    const newElement = document.createElement('li');
                                    newElement.classList.add('list-group-item', 'py-3',
                                        'impression-item');
                                    // Add border-top if it's now the first item (or handle existing items)
                                    if (!impressionsList.querySelector('.impression-item')) {
                                        newElement.classList.add('border-top');
                                    }

                                    // Determine if current user is the author
                                    // Note: This assumes Auth::id() is available globally or passed correctly
                                    // A safer way might be to compare newImpression.user.id with a known user ID
                                    const isCurrentUserAuthor = newImpression.user.id ===
                                        <?php echo e(Auth::id() ?? 'null'); ?>;
                                    const isTripOwner =
                                        <?php echo e($trip->user_id === Auth::id() ? 'true' : 'false'); ?>;

                                    // Construct inner HTML dynamically
                                    newElement.innerHTML = `
                                        <div class="d-flex align-items-start">
                                            <div class="flex-shrink-0 me-3">
                                                <span class="avatar-placeholder rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; font-size: 1rem;">
                                                    ${newImpression.user.avatar_placeholder || '?'}
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                    <h6 class="mb-0 fw-bold">
                                                        ${newImpression.user.name || '<?php echo e(__('dashboard.anonymous')); ?>'}
                                                        ${isCurrentUserAuthor ? '<span class="badge bg-primary rounded-pill ms-2 fw-normal"><?php echo e(__('dashboard.you')); ?></span>' : ''}
                                                    </h6>
                                                    <small class="text-muted flex-shrink-0 ms-2">${newImpression.created_at_human || '<?php echo e(__('dashboard.just_now')); ?>'}</small>
                                                </div>
                                                <p class="mb-0 text-body-secondary">${escapeHtml(newImpression.text || '')}</p>
                                            </div>
                                            ${ (isCurrentUserAuthor || isTripOwner) && newImpression.delete_url ? `
                                                                                                                                                                    <form action="${newImpression.delete_url}" method="POST" class="d-inline delete-impression-form ms-3 flex-shrink-0" data-message="<?php echo e(__('dashboard.confirm_delete_impression')); ?>">
                                                                                                                                                                        <?php echo csrf_field(); ?>
                                                                                                                                                                        <?php echo method_field('DELETE'); ?>
                                                                                                                                                                        <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}">
                                                                                                                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                                                                                                                        <button type="submit" class="btn btn-sm btn-outline-danger border-0 p-1" title="<?php echo e(__('dashboard.delete')); ?>"><i class="fas fa-trash"></i></button>
                                                                                                                                                                    </form>
                                                                                                                                                                    ` : '' }
                                        </div>
                                    `;

                                    // Add delete confirmation listener to the new form if it exists
                                    const newDeleteForm = newElement.querySelector(
                                        '.delete-impression-form');
                                    if (newDeleteForm) {
                                        addDeleteConfirmationListener(newDeleteForm,
                                            '<?php echo e(__('dashboard.confirm_delete_impression')); ?>');
                                    }

                                    // Prepend the new element to the list
                                    impressionsList.prepend(newElement);

                                    // Clear the textarea
                                    impressionTextInput.value = '';

                                    // Increment badge count
                                    if (impressionsTabBadge) {
                                        impressionsTabBadge.textContent = parseInt(impressionsTabBadge
                                            .textContent || '0') + 1;
                                    }

                                    // Remove 'no impressions' message if it exists
                                    if (noImpressionsMessage) {
                                        noImpressionsMessage.style.display = 'none';
                                    }
                                    // --- END: Add new impression to UI ---

                                } catch (uiError) {
                                    console.error("Error updating UI after adding impression:",
                                        uiError);
                                    // Display an error indicating UI update failure
                                    displayError(
                                        '<?php echo e(__('dashboard.impression_added_ui_error', ['fallback' => 'Impression saved, but failed to update the list.'])); ?>'
                                    );
                                }
                            } else {
                                // Display error from server response
                                console.error("Server indicated failure:", data.message);
                                displayError(data.message ||
                                    '<?php echo e(__('dashboard.impression_add_error')); ?>');
                            }
                        })
                        .catch(error => {
                            console.error('Error submitting impression:', error);
                            let errorMessage =
                                '<?php echo e(__('dashboard.network_error', ['fallback' => 'A network error occurred. Please try again.'])); ?>';

                            // Attempt to parse error response if it exists
                            if (error instanceof Response && error.headers.get('content-type')
                                ?.includes('application/json')) {
                                error.json().then(data => {
                                    if (data && data.message) {
                                        errorMessage = data
                                            .message; // Use server-provided error message
                                    }
                                    displayError(errorMessage);
                                }).catch(() => displayError(
                                    errorMessage)); // Fallback if JSON parsing fails
                            } else if (error.message) {
                                // For network errors or other generic errors
                                errorMessage = error.message;
                                displayError(errorMessage);
                            } else {
                                displayError(errorMessage); // Default network error
                            }
                        })
                        .finally(() => {
                            submitButton.disabled = false;
                            submitButton.innerHTML = originalButtonHtml;
                        });
                });
            }

            // Helper function to escape HTML (important for security)
            function escapeHtml(unsafe) {
                if (!unsafe) return '';
                return unsafe
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;")
                    .replace(/'/g, "&#039;");
            }

            // Refactored delete confirmation logic into a function
            function addDeleteConfirmationListener(form, messageKey) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); // Prevent the default form submission
                    const defaultMessage = '<?php echo e(__('dashboard.confirm_action')); ?>';
                    const title = '<?php echo e(__('dashboard.are_you_sure')); ?>';
                    const confirmButtonText = '<?php echo e(__('dashboard.confirm_delete_button')); ?>';
                    const cancelButtonText = '<?php echo e(__('dashboard.cancel_button')); ?>';

                    // Use data-message attribute if available, otherwise use the key to translate (or default)
                    const message = form.getAttribute('data-message') || defaultMessage;

                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            title: title,
                            text: message,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#dc3545',
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: confirmButtonText,
                            cancelButtonText: cancelButtonText,
                            reverseButtons: true,
                            customClass: {
                                popup: 'swal2-popup-responsive'
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit(); // Submit the form if confirmed
                            }
                        });
                    } else if (confirm(message)) { // Fallback confirmation
                        form.submit();
                    }
                });
            }

            // Function to set up delete confirmations for multiple forms
            function setupDeleteConfirmation(selector, messageKey) {
                document.querySelectorAll(selector).forEach(form => {
                    addDeleteConfirmationListener(form, messageKey);
                });
            }

            // Initial setup for existing delete forms
            setupDeleteConfirmation('.delete-photo-form', '<?php echo e(__('dashboard.confirm_delete_photo')); ?>');
            setupDeleteConfirmation('.delete-impression-form', '<?php echo e(__('dashboard.confirm_delete_impression')); ?>');
            setupDeleteConfirmation('.delete-transaction-form',
                '<?php echo e(__('dashboard.confirm_delete_transaction')); ?>');
            setupDeleteConfirmation('.delete-document-form', '<?php echo e(__('dashboard.confirm_delete_document')); ?>');

            // Script for Photo Modal
            var photoModal = document.getElementById('photoModal');
            if (photoModal) {
                photoModal.addEventListener('show.bs.modal', function(event) {
                    var button = event.relatedTarget; // Button that triggered the modal
                    var imgSrc = button.getAttribute(
                        'data-bs-img-src'); // Extract info from data-* attributes
                    var modalImage = photoModal.querySelector('#modalImage');
                    modalImage.src = imgSrc; // Update the modal's content.
                });
                // Clear image src when modal is hidden to prevent flashing old image
                photoModal.addEventListener('hidden.bs.modal', function(event) {
                    var modalImage = photoModal.querySelector('#modalImage');
                    modalImage.src = "";
                });
            }
        });

        function displaySuccess(message) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'success',
                    title: '<?php echo e(__('dashboard.success')); ?>',
                    text: message,
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                alert('Success: ' + message);
            }
        }

        function displayError(message) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'error',
                    title: '<?php echo e(__('dashboard.error')); ?>',
                    text: message
                });
            } else {
                alert('Error: ' + message);
            }
        }
    </script>
    
    <style>
        .swal2-popup-responsive {
            width: auto !important;
            max-width: 90%;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\My_laravel\‏‏laravel_2025_trips\resources\views/admin/trips/show.blade.php ENDPATH**/ ?>