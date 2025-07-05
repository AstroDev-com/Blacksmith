<?php $__env->startSection('title', __('dashboard.documents_report') . ' - ' . $trip->title); ?>

<?php $__env->startPush('styles'); ?>
    
    <style>
        .documents-report-page .table-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.07);
            background-color: #fff;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .documents-report-page .table-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.75rem 2rem rgba(0, 0, 0, 0.1);
        }

        .documents-report-page .table-card .card-header {
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

        .documents-report-page .table-card .card-header h6 {
            color: #6a11cb;
        }

        .documents-report-page .table-card .card-body {
            padding: 0;
            /* Remove padding for table */
        }

        /* Document Table Styles */
        .documents-report-page .report-table {
            width: 100%;
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0 0.4rem;
            /* Vertical spacing */
        }

        .documents-report-page .report-table thead th {
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

        .documents-report-page .report-table thead th::after {
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

        .documents-report-page .report-table thead tr th:first-child {
            border-top-left-radius: 0.75rem;
        }

        .documents-report-page .report-table thead tr th:last-child {
            border-top-right-radius: 0.75rem;
        }

        .documents-report-page .report-table tbody tr {
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 0.2rem 0.6rem rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
        }

        .documents-report-page .report-table tbody tr:hover {
            transform: translateY(-2px) scale(1.005);
            box-shadow: 0 0.4rem 1rem rgba(0, 0, 0, 0.08);
            background-color: #fdfdff;
        }

        .documents-report-page .report-table tbody td {
            padding: 0.7rem 1rem;
            border: none;
            border-bottom: 1px solid #eff2f7;
            vertical-align: middle;
            font-size: 0.9rem;
            text-align: center;
            line-height: 1.3;
        }

        .documents-report-page .report-table tbody tr td:first-child {
            border-bottom-left-radius: 0.75rem;
            border-top-left-radius: 0.75rem;
        }

        .documents-report-page .report-table tbody tr td:last-child {
            border-bottom-right-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
        }

        /* Align specific columns */
        .documents-report-page .report-table td:nth-child(1)

        /* Filename */
            {
            text-align: start;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid documents-report-page"> 

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2 no-print">
            <h1 class="h3 mb-0 text-gray-800"><?php echo e(__('dashboard.documents_report')); ?></h1>
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
                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('dashboard.documents_report')); ?> -
                    <?php echo e($trip->title); ?></li>
            </ol>
        </nav>

        
        <div class="printable-header mb-3 text-center d-none d-print-block">
            <h4><?php echo e(__('dashboard.documents_report')); ?></h4>
            <p><?php echo e(__('dashboard.report_for_trip')); ?>: <?php echo e($trip->title); ?></p>
        </div>

        <!-- Documents Table -->
        <div class="card table-card shadow mb-4"> 
            <div class="card-header">
                <h6 class="m-0 font-weight-bold"><?php echo e(__('dashboard.documents')); ?></h6>
            </div>
            <div class="card-body p-0"> 
                <div class="table-responsive">
                    
                    <table class="table table-hover report-table mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th><?php echo e(__('dashboard.filename')); ?></th>
                                <th><?php echo e(__('dashboard.uploaded_at')); ?></th>
                                <th class="no-print"><?php echo e(__('dashboard.actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    // Extract filename for display and use raw path for URL generation
                                    $filename = basename($document->path);
                                    $encodedFilename = rawurlencode($filename); // Encode just the filename part
                                    $folderPath = dirname($document->path);
                                    $urlPath = ($folderPath === '.' ? '' : $folderPath . '/') . $encodedFilename;
                                ?>
                                <tr>
                                    <td>
                                        <i class="fas fa-file-alt me-2 text-secondary"></i> <?php echo e($filename); ?>

                                    </td>
                                    <td><?php echo e($document->created_at->format('Y-m-d H:i')); ?></td>
                                    <td class="no-print">
                                        
                                        <a href="<?php echo e(asset('storage/' . $urlPath)); ?>" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye me-1"></i> <?php echo e(__('dashboard.view')); ?>

                                        </a>
                                        
                                        <a href="<?php echo e(asset('storage/' . $urlPath)); ?>" download="<?php echo e($filename); ?>"
                                            class="btn btn-sm btn-outline-success">
                                            <i class="fas fa-download me-1"></i> <?php echo e(__('dashboard.download')); ?>

                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <?php echo e(__('dashboard.no_documents_found_for_trip')); ?>

                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
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

        .container-fluid,
        .card-body {
            padding: 0 !important;
            margin: 0 !important;
        }

        .table-card {
            border: none !important;
            box-shadow: none !important;
        }

        .table thead th,
        .table tbody td {
            border: 1px solid #ddd !important;
            padding: 4px 6px !important;
            background: white !important;
            color: #000 !important;
            text-align: center !important;
        }

        .table tbody td:first-child {
            text-align: left !important;
        }

        .table thead th:first-child {
            text-align: left !important;
        }

        .table {
            width: 100% !important;
            border-collapse: collapse !important;
        }

        .table thead th::after {
            display: none;
        }

        .table tbody tr {
            page-break-inside: avoid;
        }

        .printable-header {
            display: block !important;
        }

        a::after {
            content: none !important;
        }

        /* Don't show URLs after links */
        @page {
            size: A4;
            margin: 1cm;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\My_laravel\‏‏laravel_2025_trips\resources\views/admin/reports/types/documents.blade.php ENDPATH**/ ?>