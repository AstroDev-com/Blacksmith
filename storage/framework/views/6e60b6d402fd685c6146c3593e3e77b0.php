<?php $__env->startSection('title', __('dashboard.trip_report', ['fallback' => 'Trip Report']) . ': ' . $trip->title); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        /* General Body & Container */
        body {
            background-color: #f8f9fc;
            /* Even lighter background */
            font-family: 'Cairo', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            color: #5a5c69;
            /* Default text color */
        }

        .report-container {
            background-color: #fff;
            padding: 2rem;
            /* Slightly reduced padding */
            border-radius: 0.6rem;
            /* Slightly smaller radius */
            box-shadow: 0 0.3rem 1rem rgba(0, 0, 0, 0.06);
            /* Lighter shadow */
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
            border-top: 4px solid #e3e6f0;
            /* Lighter, thinner top border */
        }

        /* Report Header */
        .report-header {
            border-bottom: 1px solid #e3e6f0;
            padding-bottom: 1.25rem;
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .report-title {
            font-size: 1.75rem;
            /* Reduced title size */
            font-weight: 600;
            /* Slightly less bold */
            color: #3a3b45;
        }

        /* Section Titles */
        .section-title {
            font-size: 1.4rem;
            /* Reduced size */
            font-weight: 500;
            /* Medium weight */
            color: #4e73df;
            margin-bottom: 1.5rem;
            padding-bottom: 0.6rem;
            border-bottom: 1px solid #e3e6f0;
            /* Standard border */
            display: flex;
            align-items: center;
            gap: 0.6rem;
            /* Slightly reduced gap */
        }

        .section-title i {
            color: #858796;
            font-size: 1.2rem;
            /* Reduced icon size */
        }

        /* Details Grid */
        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            /* Reduced minimum width */
            gap: 1.25rem;
            /* Reduced gap */
            margin-bottom: 2rem;
        }

        .detail-block {
            background-color: #fff;
            /* White background */
            padding: 1rem;
            /* Reduced padding */
            border-radius: 0.4rem;
            /* Smaller radius */
            border: 1px solid #e3e6f0;
            /* Subtle border */
            /* border-left: 3px solid #b8c0d1; */
            /* Lighter, thinner accent */
            transition: box-shadow 0.2s ease-in-out;
            position: relative;
            overflow: hidden;
        }

        .detail-block::before {
            /* Subtle top highlight instead of left border */
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #e3e6f0;
            transition: background-color 0.2s ease;
        }

        .detail-block:hover::before {
            background-color: #4e73df;
            /* Highlight on hover */
        }

        .detail-block:hover {
            box-shadow: 0 0.2rem 0.8rem rgba(0, 0, 0, 0.05);
            transform: none;
            /* Removed transform */
        }

        .detail-block dt {
            font-weight: 600;
            /* Medium bold label */
            color: #6e707e;
            /* Grey label color */
            margin-bottom: 0.3rem;
            font-size: 0.75rem;
            /* Smaller label */
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
        }

        .detail-block dt i {
            margin-right: 0.5rem;
            color: #adb5bd;
            /* Lighter icon */
            width: 14px;
            text-align: center;
            font-size: 0.85rem;
        }

        .detail-block dd {
            margin-bottom: 0;
            color: #3a3b45;
            /* Darker text */
            font-size: 0.95rem;
            /* Slightly smaller value text */
            font-weight: 400;
        }

        .detail-block .badge {
            font-size: 0.8rem;
            padding: 0.3em 0.6em;
            font-weight: 500;
        }

        .detail-block.col-span-full {
            grid-column: 1 / -1;
            /* border-left-color: #1cc88a; */
        }

        .detail-block.col-span-full::before {
            background-color: #1cc88a;
            /* Green highlight for description */
        }

        /* Photo Gallery */
        .photo-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            /* Adjusted minimum */
            gap: 1rem;
            /* Standard gap */
            margin-bottom: 2rem;
        }

        .photo-item a {
            display: block;
            overflow: hidden;
            border-radius: 0.4rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            transition: box-shadow 0.2s ease;
            border: 1px solid #e3e6f0;
        }

        .photo-item a:hover {
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.08);
        }

        .photo-item img {
            width: 100%;
            height: 130px;
            /* Adjusted height */
            object-fit: cover;
            border-radius: 0;
            /* Remove radius from image itself */
            border: none;
            transition: transform 0.25s ease;
            display: block;
        }

        .photo-item a:hover img {
            transform: scale(1.05);
            /* Subtle zoom */
        }

        /* Impressions List */
        .impressions-list {
            margin-top: 1rem;
        }

        .impressions-list .list-group-item {
            border: 1px solid #e3e6f0;
            /* Standard border */
            border-radius: 0.4rem;
            margin-bottom: 0.75rem;
            /* Reduced space */
            background-color: #fff;
            /* White background */
            padding: 1rem;
            /* Reduced padding */
            /* border-left: 3px solid #36b9cc; */
            /* Removed left border */
            transition: border-color 0.2s ease, background-color 0.2s ease;
            position: relative;
            /* For potential future pseudo-elements */
        }

        .impressions-list .list-group-item:hover {
            background-color: #f8f9fc;
            border-color: #d1d3e2;
        }

        .impressions-list .list-group-item:last-child {
            margin-bottom: 0;
        }

        .impression-author {
            font-weight: 600;
            color: #3a3b45;
            font-size: 0.9rem;
        }

        .impression-date {
            font-size: 0.75rem;
            color: #858796;
        }

        .impressions-list p {
            font-size: 0.9rem;
            color: #5a5c69;
            line-height: 1.55;
            margin-top: 0.25rem;
        }

        /* Print Styles - Adjusting based on new non-print styles */
        @media print {
            body {
                background-color: #fff !important;
            }

            body * {
                visibility: hidden;
            }

            .no-print,
            .no-print * {
                display: none !important;
            }

            .report-container,
            .report-container * {
                visibility: visible;
                color: #000 !important;
                /* Ensure black text for print */
            }

            .report-container {
                position: relative;
                /* Changed from absolute */
                width: 100%;
                box-shadow: none !important;
                border-radius: 0 !important;
                border: none !important;
                padding: 0 !important;
                /* Remove padding for print */
                margin: 0 !important;
            }

            .report-container::before {
                display: none;
            }

            /* Hide pseudo elements */

            .report-header {
                border-bottom: 1px solid #aaa;
                margin-bottom: 1.5rem;
                padding-bottom: 1rem;
            }

            .report-title {
                font-size: 1.6rem;
                font-weight: 600;
            }

            .section-title {
                border-bottom: 1px solid #ccc;
                font-size: 1.2rem;
                margin-bottom: 1rem;
                padding-bottom: 0.5rem;
                color: #000 !important;
            }

            .section-title i {
                display: none;
            }

            /* Hide icons */

            .details-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.8rem;
                margin-bottom: 1.5rem;
            }

            .detail-block {
                background-color: #fff !important;
                border: 1px solid #ccc !important;
                padding: 0.6rem;
                box-shadow: none !important;
                transform: none !important;
                border-radius: 0 !important;
            }

            .detail-block::before {
                display: none;
            }

            .detail-block dt {
                font-size: 0.7rem;
                color: #333 !important;
            }

            .detail-block dt i {
                display: none;
            }

            .detail-block dd {
                font-size: 0.85rem;
                color: #000 !important;
            }

            .detail-block .badge {
                border: 1px solid #ccc;
                color: #000 !important;
                background: #fff !important;
                font-size: 0.7rem;
                padding: 0.1em 0.4em;
            }

            /* Simple badge for print */

            .photo-gallery {
                grid-template-columns: repeat(4, 1fr);
                /* Maybe more columns for print */
                gap: 0.5rem;
                margin-bottom: 1.5rem;
            }

            .photo-item a {
                box-shadow: none !important;
                border: 1px solid #ccc !important;
                border-radius: 0 !important;
            }

            .photo-item img {
                height: auto;
                max-width: 100%;
                box-shadow: none !important;
                border: none !important;
                transform: none !important;
            }

            .impressions-list .list-group-item {
                background-color: #fff !important;
                border: 1px solid #ccc !important;
                padding: 0.6rem;
                margin-bottom: 0.4rem;
                border-radius: 0 !important;
                page-break-inside: avoid;
            }

            .impression-author {
                font-size: 0.8rem;
                color: #000 !important;
            }

            .impression-date {
                font-size: 0.7rem;
                color: #333 !important;
            }

            .impressions-list p {
                font-size: 0.85rem;
                color: #000 !important;
                line-height: 1.4;
                margin-top: 0.1rem;
            }

            a {
                text-decoration: none !important;
                color: #000 !important;
            }
        }

        /* Styles for Transaction Section in Report */
        .summary-row .summary-card {
            padding: 0.8rem;
            border-radius: 0.4rem;
            margin-bottom: 1rem;
            text-align: center;
            border: 1px solid #eee;
            background-color: #f8f9fc;
        }

        .summary-row .summary-card .amount {
            font-size: 1.3rem;
            font-weight: 600;
            margin-top: 0.2rem;
        }

        .summary-row .summary-card .amount small {
            font-size: 0.8rem;
            opacity: 0.7;
        }

        /* Use existing badge styles if defined, otherwise define basic ones */
        .badge.bg-success-soft {
            background-color: rgba(var(--bs-success-rgb), 0.1);
            color: var(--bs-success-emphasis);
            padding: .3em .5em;
            font-size: 0.8rem;
        }

        .badge.bg-danger-soft {
            background-color: rgba(var(--bs-danger-rgb), 0.1);
            color: var(--bs-danger-emphasis);
            padding: .3em .5em;
            font-size: 0.8rem;
        }

        .transaction-report-table {
            font-size: 0.9rem;
        }

        .transaction-report-table th,
        .transaction-report-table td {
            padding: 0.5rem 0.6rem;
            vertical-align: middle;
        }

        .transaction-report-table thead th {
            background-color: #f8f9fc;
            font-weight: 600;
        }

        /* Documents Section Styles */
        .documents-list .list-group-item {
            border: 1px solid #e3e6f0;
            border-radius: 0.4rem;
            margin-bottom: 0.75rem;
            padding: 0.8rem 1rem;
            /* Adjust padding */
            transition: background-color 0.2s ease, border-color 0.2s ease;
        }

        .documents-list .list-group-item:hover {
            background-color: #f8f9fc;
            border-color: #d1d3e2;
        }

        .document-info {
            flex-grow: 1;
            min-width: 0;
            /* Allow flex item to shrink */
        }

        .document-link {
            color: #4e73df;
            /* Primary link color */
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .document-link:hover {
            color: #2e59d9;
            /* Darker shade on hover */
            text-decoration: underline;
        }

        .document-info .text-muted {
            font-size: 0.8rem;
        }

        .document-info i.fas {
            width: 18px;
            /* Ensure icon width consistency */
            text-align: center;
        }

        .documents-list .delete-form .btn-outline-danger {
            padding: 0.2rem 0.5rem;
            font-size: 0.8rem;
        }

        .documents-list .delete-form .btn-outline-danger:hover {
            background-color: var(--bs-danger);
            color: #fff;
        }

        /* Style the upload form container */
        .bg-light-subtle {
            background-color: #f8f9fc !important;
            /* Match body background */
            border-color: #e3e6f0 !important;
        }

        /* Print adjustments for documents */
        @media print {
            .documents-list .list-group-item {
                border: 1px solid #ccc !important;
                padding: 0.5rem;
                margin-bottom: 0.3rem;
            }

            .documents-list .delete-form {
                display: none;
                /* Hide delete button in print */
            }

            .document-info i.fas {
                color: #666 !important;
                /* Lighter icon color for print */
            }

            .document-link {
                color: #000 !important;
                text-decoration: none !important;
            }

            .bg-light-subtle {
                display: none;
                /* Hide upload form in print */
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="report-container">
            <div class="report-header">
                <h1 class="report-title"><?php echo e(__('dashboard.trip_report', ['fallback' => 'Trip Report'])); ?></h1>
                <div class="d-flex gap-2">
                    <a href="<?php echo e(route('admin.trips.index')); ?>" class="btn btn-outline-secondary no-print">
                        <i class="fas fa-arrow-left me-1"></i>
                        <?php echo e(__('dashboard.back_to_list', ['fallback' => 'Back to List'])); ?>

                    </a>
                    <button class="btn btn-primary no-print" onclick="window.print();">
                        <i class="fas fa-print me-1"></i> <?php echo e(__('dashboard.print', ['fallback' => 'Print'])); ?>

                    </button>
                </div>
            </div>

            
            <section class="mb-4">
                <div class="details-grid">
                    <div class="detail-block">
                        <dt><i class="fas fa-heading"></i><?php echo e(__('dashboard.title')); ?></dt>
                        <dd><?php echo e($trip->title); ?></dd>
                    </div>
                    <div class="detail-block">
                        <dt><i class="fas fa-map-marker-alt"></i><?php echo e(__('dashboard.location')); ?></dt>
                        <dd><?php echo e($trip->location ?? __('dashboard.not_provided')); ?></dd>
                    </div>
                    <div class="detail-block">
                        <dt><i class="fas fa-suitcase-rolling"></i><?php echo e(__('dashboard.type')); ?></dt>
                        <dd><span class="badge bg-info"><?php echo e(__('dashboard.' . $trip->type)); ?></span></dd>
                    </div>
                    
                    <?php if($trip->budget_amount): ?>
                        <div class="detail-block">
                            <dt><i
                                    class="fas fa-wallet text-success"></i><?php echo e(__('dashboard.budget', ['fallback' => 'Budget'])); ?>

                            </dt>
                            <dd><?php echo e(number_format($trip->budget_amount, 2)); ?> <?php echo e($trip->budget_currency); ?></dd>
                        </div>
                    <?php endif; ?>
                    <div class="detail-block">
                        <dt><i class="fas fa-calendar-check"></i><?php echo e(__('dashboard.start_date')); ?></dt>
                        <dd><?php echo e($trip->start_date ? $trip->start_date->format('Y-m-d') : '--'); ?></dd>
                    </div>
                    <div class="detail-block">
                        <dt><i class="fas fa-calendar-times"></i><?php echo e(__('dashboard.end_date')); ?></dt>
                        <dd><?php echo e($trip->end_date ? $trip->end_date->format('Y-m-d') : '--'); ?></dd>
                    </div>
                    <div class="detail-block">
                        <dt><i class="fas fa-user"></i><?php echo e(__('dashboard.created_by')); ?></dt>
                        <dd><?php echo e($trip->user->name ?? __('dashboard.not_available')); ?></dd>
                    </div>
                    <div class="detail-block col-span-full"> 
                        <dt><i class="fas fa-align-left"></i><?php echo e(__('dashboard.description')); ?></dt>
                        <dd><?php echo e($trip->description ?? __('dashboard.not_provided')); ?></dd>
                    </div>
                </div>
            </section>

            
            <section class="mb-4">
                <h2 class="section-title"><i class="fas fa-images"></i><?php echo e(__('dashboard.photos')); ?>

                    (<?php echo e($trip->photos->count()); ?>)</h2>
                <?php if($trip->photos->isEmpty()): ?>
                    <div class="alert alert-light text-center" role="alert">
                        <?php echo e(__('dashboard.no_photos_added')); ?>

                    </div>
                <?php else: ?>
                    <div class="photo-gallery">
                        <?php $__currentLoopData = $trip->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="photo-item">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#photoReportModal"
                                    data-bs-img-src="<?php echo e(asset('storage/' . $photo->path)); ?>">
                                    <img src="<?php echo e(asset('storage/' . $photo->path)); ?>" alt="Photo <?php echo e($loop->iteration); ?>">
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </section>

            
            <section>
                <h2 class="section-title"><i class="fas fa-comments"></i><?php echo e(__('dashboard.impressions')); ?>

                    (<?php echo e($trip->impressions->count()); ?>)</h2>
                <?php if($trip->impressions->isEmpty()): ?>
                    <div class="alert alert-light text-center" role="alert">
                        <?php echo e(__('dashboard.no_impressions_added')); ?>

                    </div>
                <?php else: ?>
                    <ul class="list-group list-group-flush impressions-list">
                        <?php $__currentLoopData = $trip->impressions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $impression): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item">
                                <div class="d-flex w-100 justify-content-between mb-1">
                                    <h5 class="mb-1 impression-author">
                                        <?php echo e($impression->user->name ?? __('dashboard.anonymous')); ?></h5>
                                    <small class="impression-date"><?php echo e($impression->created_at->diffForHumans()); ?></small>
                                </div>
                                <p class="mb-1"><?php echo e($impression->text); ?></p>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
            </section>

            
            <section class="mt-4">
                <h2 class="section-title"><i
                        class="fas fa-wallet"></i><?php echo e(__('dashboard.transactions', ['fallback' => 'Transactions'])); ?></h2>

                <?php
                    // Group transactions by currency
                    $transactionsByCurrency = $trip->transactions->groupBy('currency');
                ?>

                <?php if($transactionsByCurrency->isEmpty()): ?>
                    <div class="alert alert-light text-center" role="alert">
                        <?php echo e(__('dashboard.no_transactions_added', ['fallback' => 'No transactions added yet.'])); ?>

                    </div>
                <?php else: ?>
                    
                    <?php $__currentLoopData = $transactionsByCurrency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency => $transactionsInCurrency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $totalIncome = $transactionsInCurrency->where('type', 'income')->sum('amount');
                            $totalExpense = $transactionsInCurrency->where('type', 'expense')->sum('amount');
                            $balance = $totalIncome - $totalExpense;

                            // Budget check for this specific currency
                            $budgetMatchesCurrency = $trip->budget_amount && $trip->budget_currency == $currency;
                            $percentageUsed = 0;
                            if ($budgetMatchesCurrency && $trip->budget_amount > 0) {
                                $percentageUsed = ($totalExpense / $trip->budget_amount) * 100;
                            }
                        ?>

                        
                        <div style="position: relative;"> 
                            <h4 class="mb-3 mt-4" style="font-weight: 500; color: #5a5c69;">
                                <i
                                    class="fas fa-coins me-2 text-warning"></i><?php echo e(__('dashboard.summary_for', ['fallback' => 'Summary for'])); ?>

                                <?php echo e($currency); ?>

                                
                                <?php if($budgetMatchesCurrency): ?>
                                    <span
                                        class="badge bg-success-soft ms-2"><?php echo e(__('dashboard.budget', ['fallback' => 'Budget'])); ?>:
                                        <?php echo e(number_format($trip->budget_amount, 2)); ?></span>
                                <?php endif; ?>
                            </h4>

                            
                            <?php if($budgetMatchesCurrency): ?>
                                <div class="progress mb-3" style="height: 8px;">
                                    <div class="progress-bar <?php echo e($percentageUsed > 100 ? 'bg-danger' : ($percentageUsed > 80 ? 'bg-warning' : 'bg-success')); ?>"
                                        role="progressbar" style="width: <?php echo e(min($percentageUsed, 100)); ?>%;"
                                        aria-valuenow="<?php echo e($percentageUsed); ?>" aria-valuemin="0" aria-valuemax="100"
                                        title="<?php echo e(number_format($percentageUsed, 1)); ?>% <?php echo e(__('dashboard.of_budget_used', ['fallback' => 'of budget used'])); ?>">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

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
                                    <div><?php echo e(__('dashboard.total_expense', ['fallback' => 'Total Expense'])); ?></div>
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

                        
                        <h5 class="mb-3" style="font-size: 1.1rem; font-weight: 500;">
                            <?php echo e(__('dashboard.transactions_in', ['fallback' => 'Transactions in'])); ?> <?php echo e($currency); ?>

                        </h5>
                        <div class="table-responsive mb-4"> 
                            <table class="table table-sm table-bordered transaction-report-table">
                                <thead class="table-light">
                                    <tr>
                                        <th><?php echo e(__('dashboard.date', ['fallback' => 'Date'])); ?></th>
                                        <th><?php echo e(__('dashboard.type', ['fallback' => 'Type'])); ?></th>
                                        <th><?php echo e(__('dashboard.category', ['fallback' => 'Category'])); ?></th>
                                        <th><?php echo e(__('dashboard.description', ['fallback' => 'Description'])); ?></th>
                                        <th class="text-end"><?php echo e(__('dashboard.amount', ['fallback' => 'Amount'])); ?></th>
                                        <th><?php echo e(__('dashboard.notes', ['fallback' => 'Notes'])); ?></th>
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
                                                <?php echo e(($transaction->type == 'income' ? '+' : '-') . number_format($transaction->amount, 2)); ?>

                                                
                                            </td>
                                            <td><?php echo e($transaction->notes); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </section>

            
            <hr class="my-4">
            <h4 class="section-title"><i class="fas fa-folder-open"></i>
                <?php echo e(__('dashboard.documents', ['fallback' => 'Documents'])); ?></h4>

            
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
                                    <form action="<?php echo e(route('admin.documents.destroy', $document)); ?>" method="POST"
                                        class="delete-form"
                                        onsubmit="return confirm('<?php echo e(__('dashboard.confirm_delete_document', ['fallback' => 'Are you sure you want to delete this document?'])); ?>');">
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
                        <?php echo e(__('dashboard.no_documents_yet', ['fallback' => 'No documents uploaded yet.'])); ?></p>
                <?php endif; ?>
            </div>
            

        </div>
    </div>

    
    <div class="modal fade" id="photoReportModal" tabindex="-1" aria-labelledby="photoReportModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="photoReportModalLabel">
                        <?php echo e(__('dashboard.photo_preview', ['fallback' => 'Photo Preview'])); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="" id="modalReportImage" class="img-fluid rounded" alt="Report Photo Preview"
                        style="max-height: 80vh;">
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var photoModal = document.getElementById('photoReportModal');
            if (photoModal) {
                photoModal.addEventListener('show.bs.modal', function(event) {
                    // Button that triggered the modal
                    var triggerElement = event.relatedTarget;
                    // Extract image source from data-bs-img-src attribute
                    var imgSrc = triggerElement.getAttribute('data-bs-img-src');
                    // Update the modal's image source
                    var modalImage = photoModal.querySelector('#modalReportImage');
                    modalImage.src = imgSrc;
                });
                // Clear image src when modal is hidden to prevent flashing old image
                photoModal.addEventListener('hidden.bs.modal', function() {
                    var modalImage = photoModal.querySelector('#modalReportImage');
                    modalImage.src = "";
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\My_laravel\‏‏laravel_2025_trips\resources\views/admin/trips/report.blade.php ENDPATH**/ ?>