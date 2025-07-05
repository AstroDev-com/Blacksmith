<?php $__env->startSection('title', __('dashboard.financial_summary_period')); ?>

<?php $__env->startPush('styles'); ?>
    
    <style>
        .financial-summary-report-page .table-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.07);
            background-color: #fff;
            margin-bottom: 1.5rem;
            /* Increased margin */
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .financial-summary-report-page .table-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.75rem 2rem rgba(0, 0, 0, 0.1);
        }

        .financial-summary-report-page .table-card .card-header {
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

        .financial-summary-report-page .table-card .card-header h6 {
            color: #6a11cb;
            /* Purple header text */
        }

        .financial-summary-report-page .table-card .card-body {
            padding: 1.5rem;
        }

        /* Summary Section Styles */
        .financial-summary-report-page .summary-section {
            margin-bottom: 1.5rem;
            /* Consistent margin */
            padding-bottom: 1.5rem;
        }

        .financial-summary-report-page .summary-section:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .financial-summary-report-page .summary-section h5 {
            margin-bottom: 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #5a5c69;
            /* Subdued title color */
        }

        .financial-summary-report-page .summary-section h5 i {
            color: #adb5bd;
        }

        /* Summary Cards (by Currency) */
        .financial-summary-report-page .summary-section .card {
            border-radius: 0.75rem;
            box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.04);
            border: 1px solid transparent;
            transition: all 0.3s ease;
        }

        .financial-summary-report-page .summary-section .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08);
        }

        .financial-summary-report-page .summary-section .card .fw-bold {
            font-size: 0.8rem;
            text-transform: uppercase;
            opacity: 0.8;
        }

        .financial-summary-report-page .summary-section .card .fs-4 {
            font-size: 1.75rem !important;
            /* Larger font */
            font-weight: 600;
        }

        /* Detailed Transaction Table Styles */
        .financial-summary-report-page .report-table {
            width: 100%;
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0 0.4rem;
            /* Vertical spacing */
        }

        .financial-summary-report-page .report-table thead th {
            background: linear-gradient(135deg, #f8f9fc, #ffffff);
            color: #6a11cb;
            font-weight: 600;
            padding: 0.85rem 1rem;
            border: none;
            text-align: center;
            position: relative;
            font-size: 0.85rem;
            white-space: nowrap;
        }

        .financial-summary-report-page .report-table thead th::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 40%;
            height: 2px;
            background: linear-gradient(90deg, #6a11cb, #2575fc);
            border-radius: 1px;
        }

        .financial-summary-report-page .report-table thead tr th:first-child {
            border-top-left-radius: 0.75rem;
        }

        .financial-summary-report-page .report-table thead tr th:last-child {
            border-top-right-radius: 0.75rem;
        }

        .financial-summary-report-page .report-table tbody tr {
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 0.2rem 0.6rem rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
        }

        .financial-summary-report-page .report-table tbody tr:hover {
            transform: translateY(-2px) scale(1.005);
            box-shadow: 0 0.4rem 1rem rgba(0, 0, 0, 0.08);
            background-color: #fdfdff;
        }

        .financial-summary-report-page .report-table tbody td {
            padding: 0.7rem 1rem;
            border: none;
            border-bottom: 1px solid #eff2f7;
            vertical-align: middle;
            font-size: 0.9rem;
            text-align: center;
            line-height: 1.3;
        }

        .financial-summary-report-page .report-table tbody tr td:first-child {
            border-bottom-left-radius: 0.75rem;
            border-top-left-radius: 0.75rem;
        }

        .financial-summary-report-page .report-table tbody tr td:last-child {
            border-bottom-right-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
        }

        /* Align specific columns */
        .financial-summary-report-page .report-table td:nth-child(2),
        /* Trip */
        .financial-summary-report-page .report-table td:nth-child(5)

        /* Description */
            {
            text-align: start;
        }

        .financial-summary-report-page .report-table td:nth-child(6)

        /* Amount */
            {
            text-align: end;
        }

        .financial-summary-report-page .report-table .badge {
            font-size: 0.8rem;
            padding: 0.4em 0.7em;
        }

        .financial-summary-report-page .report-table a {
            color: var(--bs-primary);
            text-decoration: none;
            font-weight: 500;
        }

        .financial-summary-report-page .report-table a:hover {
            text-decoration: underline;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid financial-summary-report-page"> 

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2 no-print"> 
            <h1 class="h3 mb-0 text-gray-800"><?php echo e(__('dashboard.financial_summary_period')); ?></h1>
            <div class="d-flex gap-2">
                <button onclick="window.print()" class="btn btn-sm btn-outline-primary no-print">
                    <i class="fas fa-print me-1"></i> <?php echo e(__('dashboard.print')); ?>

                </button>
                <a href="<?php echo e(route('admin.reports.index')); ?>" class="btn btn-sm btn-outline-secondary shadow-sm">
                    <i class="fas fa-arrow-left fa-sm"></i> <?php echo e(__('dashboard.back_to_report_selection')); ?>

                </a>
            </div>
        </div>
        <p class="mb-4 no-print"><?php echo e(__('dashboard.report_period')); ?>: <strong><?php echo e($startDate->format('Y-m-d')); ?></strong>
            <?php echo e(__('dashboard.to')); ?> <strong><?php echo e($endDate->format('Y-m-d')); ?></strong></p>

        
        <nav aria-label="breadcrumb" class="no-print">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('dashboard.dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.reports.index')); ?>"><?php echo e(__('dashboard.reports')); ?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('dashboard.financial_summary_period')); ?></li>
            </ol>
        </nav>

        
        <div class="printable-header mb-3 text-center d-none d-print-block">
            <h4><?php echo e(__('dashboard.financial_summary_period')); ?></h4>
            <p><?php echo e(__('dashboard.report_period')); ?>: <?php echo e($startDate->format('d/m/Y')); ?> <?php echo e(__('dashboard.to')); ?>

                <?php echo e($endDate->format('d/m/Y')); ?></p>
        </div>

        <!-- Financial Summary Cards -->
        <div class="card table-card mb-4"> 
            <div class="card-header">
                <h6 class="m-0 font-weight-bold"><?php echo e(__('dashboard.summary_by_currency')); ?></h6>
            </div>
            <div class="card-body">
                <?php if(empty($summaryByCurrency)): ?>
                    <div class="alert alert-warning text-center m-0" role="alert"> 
                        <i class="fas fa-info-circle me-2"></i> <?php echo e(__('dashboard.no_transactions_found_period')); ?>

                    </div>
                <?php else: ?>
                    <?php $__currentLoopData = $summaryByCurrency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency => $summary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <section class="summary-section <?php echo e(!$loop->last ? 'border-bottom pb-3 mb-3' : ''); ?>">
                            
                            <h5><i class="fas fa-coins text-warning me-2"></i><?php echo e($currency); ?></h5>
                            <div class="row g-3"> 
                                <div class="col-lg-4 col-md-6">
                                    <div class="card card-body bg-success-subtle text-success-emphasis h-100">
                                        
                                        <div class="fw-bold"><?php echo e(__('dashboard.total_income')); ?></div>
                                        <div class="fs-4"><?php echo e(number_format($summary['income'], 2)); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card card-body bg-danger-subtle text-danger-emphasis h-100">
                                        
                                        <div class="fw-bold"><?php echo e(__('dashboard.total_expenses')); ?></div>
                                        <div class="fs-4"><?php echo e(number_format($summary['expense'], 2)); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div
                                        class="card card-body <?php echo e($summary['net'] >= 0 ? 'bg-primary-subtle text-primary-emphasis' : 'bg-warning-subtle text-warning-emphasis'); ?> h-100">
                                        
                                        <div class="fw-bold"><?php echo e(__('dashboard.net_total')); ?></div>
                                        <div class="fs-4"><?php echo e(number_format($summary['net'], 2)); ?></div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                <?php endif; ?>
            </div>
        </div>

        <!-- Detailed Transactions Table -->
        <div class="card table-card mb-4"> 
            <div class="card-header">
                <h6 class="m-0 font-weight-bold"><?php echo e(__('dashboard.detailed_transactions')); ?></h6>
            </div>
            <div class="card-body p-0"> 
                <?php if($transactions->isEmpty()): ?>
                    <div class="alert alert-warning text-center m-3" role="alert">
                        <i class="fas fa-info-circle me-2"></i> <?php echo e(__('dashboard.no_transactions_found_period')); ?>

                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        
                        <table class="table table-hover report-table mb-0">
                            <thead class="thead-light"> 
                                <tr>
                                    <th><?php echo e(__('dashboard.date')); ?></th>
                                    <th><?php echo e(__('dashboard.trip')); ?></th>
                                    <th><?php echo e(__('dashboard.type')); ?></th>
                                    <th><?php echo e(__('dashboard.category')); ?></th>
                                    <th><?php echo e(__('dashboard.description')); ?></th>
                                    <th class="text-end"><?php echo e(__('dashboard.amount')); ?></th>
                                    <th><?php echo e(__('dashboard.currency')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($transaction->transaction_date->format('Y-m-d')); ?></td>
                                        <td>
                                            <?php if($transaction->trip): ?>
                                                <a
                                                    href="<?php echo e(route('admin.trips.show', $transaction->trip)); ?>"><?php echo e(Str::limit($transaction->trip->title, 25)); ?></a>
                                            <?php else: ?>
                                                <?php echo e(__('dashboard.trip_deleted', ['fallback' => 'Trip Deleted'])); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($transaction->type == 'income'): ?>
                                                
                                                <span class="badge bg-success-soft"><?php echo e(__('dashboard.income')); ?></span>
                                            <?php else: ?>
                                                <span class="badge bg-danger-soft"><?php echo e(__('dashboard.expense')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($transaction->expenseCategory->name ?? '--'); ?></td>
                                        <td><?php echo e($transaction->description); ?></td>
                                        <td
                                            class="text-end fw-bold <?php echo e($transaction->type == 'income' ? 'text-success' : 'text-danger'); ?>">
                                            <?php echo e(($transaction->type == 'income' ? '+' : '-') . number_format($transaction->amount, 2)); ?>

                                        </td>
                                        <td><?php echo e($transaction->currency); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\My_laravel\‏‏laravel_2025_trips\resources\views/admin/reports/types/financial_summary.blade.php ENDPATH**/ ?>