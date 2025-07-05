<?php $__env->startSection('title', __('dashboard.trip_summary_report') . ' - ' . $trip->title); ?>

<?php $__env->startPush('styles'); ?>
    
    <style>
        .summary-report-page .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.07);
            background-color: #fff;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .summary-report-page .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.75rem 2rem rgba(0, 0, 0, 0.1);
        }

        .summary-report-page .card .card-header {
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

        .summary-report-page .card .card-header h6 {
            color: #6a11cb;
        }

        .summary-report-page .card .card-body {
            padding: 1.5rem;
        }

        .summary-report-page .list-group-item {
            border-color: #eee;
            padding: 0.8rem 0;
            border-width: 0 0 1px 0;
            background: none;
        }

        .summary-report-page .list-group-item:last-child {
            border-bottom-width: 0;
        }

        .summary-report-page .list-group-item strong {
            color: #5a5c69;
            display: inline-block;
            min-width: 150px;
        }

        .summary-report-page .badge {
            font-size: 0.9rem;
        }

        /* Financial summary table styles (copied from transactions report) */
        .summary-report-page .report-table {
            width: 100%;
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0 0.4rem;
            /* Vertical spacing */
            margin-top: 1rem;
            /* Add space above table */
        }

        .summary-report-page .report-table thead th {
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

        .summary-report-page .report-table thead th::after {
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

        .summary-report-page .report-table thead tr th:first-child {
            border-top-left-radius: 0.75rem;
        }

        .summary-report-page .report-table thead tr th:last-child {
            border-top-right-radius: 0.75rem;
        }

        .summary-report-page .report-table tbody tr {
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 0.2rem 0.6rem rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
        }

        .summary-report-page .report-table tbody tr:hover {
            transform: translateY(-2px) scale(1.005);
            box-shadow: 0 0.4rem 1rem rgba(0, 0, 0, 0.08);
            background-color: #fdfdff;
        }

        .summary-report-page .report-table tbody td {
            padding: 0.7rem 1rem;
            border: none;
            border-bottom: 1px solid #eff2f7;
            vertical-align: middle;
            font-size: 0.9rem;
            text-align: center;
            line-height: 1.3;
        }

        .summary-report-page .report-table tbody tr td:first-child {
            border-bottom-left-radius: 0.75rem;
            border-top-left-radius: 0.75rem;
            text-align: end;
            /* Align currency to the right */
        }

        .summary-report-page .report-table tbody tr td:last-child {
            border-bottom-right-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
        }

        /* Specific alignment for financial table */
        .summary-report-page .report-table td:nth-child(2),
        /* Income */
        .summary-report-page .report-table td:nth-child(3),
        /* Expenses */
        .summary-report-page .report-table td:nth-child(4)

        /* Net */
            {
            text-align: end;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid summary-report-page"> 

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2 no-print">
            <h1 class="h3 mb-0 text-gray-800"><?php echo e(__('dashboard.trip_summary_report')); ?></h1>
            <div class="d-flex gap-2">
                <button onclick="window.print()" class="btn btn-sm btn-outline-primary no-print">
                    <i class="fas fa-print me-1"></i> <?php echo e(__('dashboard.print')); ?>

                </button>
                <a href="<?php echo e(route('admin.reports.index')); ?>" class="btn btn-sm btn-outline-secondary shadow-sm">
                    <i class="fas fa-arrow-left fa-sm"></i> <?php echo e(__('dashboard.back_to_report_selection')); ?>

                </a>
            </div>
        </div>
        <p class="mb-4 no-print"><?php echo e(__('dashboard.report_for_trip')); ?>: <strong><?php echo e($trip->title); ?></strong></p>

        
        <nav aria-label="breadcrumb" class="no-print">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('dashboard.dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.reports.index')); ?>"><?php echo e(__('dashboard.reports')); ?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('dashboard.trip_summary_report')); ?> -
                    <?php echo e($trip->title); ?></li>
            </ol>
        </nav>

        
        <div class="printable-header mb-3 text-center d-none d-print-block">
            <h4><?php echo e(__('dashboard.trip_summary_report')); ?></h4>
            <p><?php echo e(__('dashboard.report_for_trip')); ?>: <?php echo e($trip->title); ?></p>
        </div>

        <div class="row">
            
            <div class="col-lg-6">
                
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold"><?php echo e(__('dashboard.trip_details')); ?></h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong><?php echo e(__('dashboard.trip_title')); ?>:</strong>
                                <?php echo e($trip->title); ?></li>
                            <li class="list-group-item"><strong><?php echo e(__('dashboard.destination')); ?>:</strong>
                                <?php echo e($trip->destination); ?></li>
                            <li class="list-group-item"><strong><?php echo e(__('dashboard.start_date')); ?>:</strong>
                                <?php echo e($trip->start_date->format('d M Y')); ?></li>
                            <li class="list-group-item"><strong><?php echo e(__('dashboard.end_date')); ?>:</strong>
                                <?php echo e($trip->end_date->format('d M Y')); ?></li>
                            <li class="list-group-item"><strong><?php echo e(__('dashboard.status')); ?>:</strong> <span
                                    class="badge bg-<?php echo e($trip->status == 'completed' ? 'success' : ($trip->status == 'planned' ? 'info' : 'warning')); ?>"><?php echo e(__('dashboard.' . $trip->status)); ?></span>
                            </li>
                            <li class="list-group-item"><strong><?php echo e(__('dashboard.description')); ?>:</strong>
                                <?php echo e($trip->description ?? '--'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            
            <div class="col-lg-6">
                
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold"><?php echo e(__('dashboard.content_summary')); ?></h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-receipt me-2 text-primary"></i>
                                    <?php echo e(__('dashboard.transactions')); ?></span>
                                <span class="badge bg-primary rounded-pill"><?php echo e($counts['transactions']); ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-file-alt me-2 text-info"></i> <?php echo e(__('dashboard.documents')); ?></span>
                                <span class="badge bg-info rounded-pill"><?php echo e($counts['documents']); ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-images me-2 text-warning"></i> <?php echo e(__('dashboard.photos')); ?></span>
                                <span class="badge bg-warning rounded-pill"><?php echo e($counts['photos']); ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-comments me-2 text-success"></i>
                                    <?php echo e(__('dashboard.impressions')); ?></span>
                                <span class="badge bg-success rounded-pill"><?php echo e($counts['impressions']); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="card table-card shadow mb-4"> 
            <div class="card-header">
                <h6 class="m-0 font-weight-bold"><?php echo e(__('dashboard.financial_summary')); ?></h6>
            </div>
            <div class="card-body p-0"> 
                <?php if(!empty($financialSummary)): ?>
                    <div class="table-responsive">
                        
                        <table class="table report-table mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-end"><?php echo e(__('dashboard.currency')); ?></th>
                                    <th class="text-end"><?php echo e(__('dashboard.total_income')); ?></th>
                                    <th class="text-end"><?php echo e(__('dashboard.total_expenses')); ?></th>
                                    <th class="text-end"><?php echo e(__('dashboard.net_total')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $financialSummary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency => $summary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-end fw-bold"><?php echo e($currency); ?></td>
                                        <td class="text-end text-success"><?php echo e(number_format($summary['income'], 2)); ?></td>
                                        <td class="text-end text-danger"><?php echo e(number_format($summary['expense'], 2)); ?></td>
                                        <td
                                            class="text-end fw-bold <?php echo e($summary['net'] >= 0 ? 'text-primary' : 'text-warning'); ?>">
                                            <?php echo e(number_format($summary['net'], 2)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-info-circle me-2"></i>
                        <p><?php echo e(__('dashboard.no_financial_data_available')); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    
    <style media="print">
        /* Basic print styles */
        body {
            background-color: white !important;
            font-size: 10pt;
        }

        .no-print {
            display: none !important;
        }

        .container-fluid {
            padding: 0 !important;
            margin: 0 !important;
        }

        .card {
            border: 1px solid #ccc !important;
            box-shadow: none !important;
            margin-bottom: 1cm !important;
            page-break-inside: avoid;
            border-radius: 0 !important;
        }

        .card-header {
            background-color: #eee !important;
            padding: 0.5cm !important;
            border-bottom: 1px solid #ccc !important;
            border-radius: 0 !important;
        }

        .card-header h6 {
            color: #000 !important;
            font-weight: bold;
        }

        .card-body {
            padding: 0.5cm !important;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-lg-6 {
            width: 50%;
            padding: 0 0.5cm;
            box-sizing: border-box;
        }

        .list-group-item {
            padding: 0.2cm 0 !important;
            border-color: #ddd !important;
            font-size: 10pt;
        }

        .list-group-item strong {
            min-width: 100px;
        }

        .badge {
            border: 1px solid #ccc;
            padding: 2px 4px;
            font-size: 8pt;
            color: #000 !important;
            background: none !important;
        }

        .table-card .card-body {
            padding: 0 !important;
        }

        .table {
            width: 100% !important;
            border-collapse: collapse !important;
            margin-top: 0.5cm !important;
        }

        .table thead th,
        .table tbody td {
            border: 1px solid #ddd !important;
            padding: 4px 6px !important;
            background: white !important;
            color: #000 !important;
            text-align: right !important;
            /* Align numbers right */
            font-size: 9pt;
        }

        .table thead th {
            text-align: center !important;
            font-weight: bold;
            background-color: #f8f9fa !important;
        }

        .table thead th::after {
            display: none;
        }

        .table tbody td:first-child {
            text-align: left !important;
            font-weight: bold;
        }

        .printable-header {
            display: block !important;
        }

        @page {
            size: A4;
            margin: 1cm;
        }
    </style>
    
    <style>
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

        .bg-primary-soft {
            background-color: rgba(var(--bs-primary-rgb), 0.15) !important;
            color: var(--bs-primary-emphasis) !important;
            padding: 0.3em 0.6em;
            border-radius: 0.25rem;
        }

        .bg-info-soft {
            background-color: rgba(var(--bs-info-rgb), 0.15) !important;
            color: var(--bs-info-emphasis) !important;
            padding: 0.3em 0.6em;
            border-radius: 0.25rem;
        }

        .bg-warning-soft {
            background-color: rgba(var(--bs-warning-rgb), 0.15) !important;
            color: var(--bs-warning-emphasis) !important;
            padding: 0.3em 0.6em;
            border-radius: 0.25rem;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\My_laravel\‏‏laravel_2025_trips\resources\views/admin/reports/types/summary.blade.php ENDPATH**/ ?>