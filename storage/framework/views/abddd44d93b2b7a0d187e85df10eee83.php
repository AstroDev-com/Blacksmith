<?php $__env->startSection('title', __('dashboard.impressions_report') . ' - ' . $trip->title); ?>

<?php $__env->startPush('styles'); ?>
    
    <style>
        .impressions-report-page .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.07);
            background-color: #fff;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .impressions-report-page .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.75rem 2rem rgba(0, 0, 0, 0.1);
        }

        .impressions-report-page .card .card-header {
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

        .impressions-report-page .card .card-header h6 {
            color: #6a11cb;
        }

        .impressions-report-page .card .card-body {
            padding: 1.5rem;
        }

        /* Impression Item Styles (Adapted from show.blade.php) */
        .impression-item {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #eee;
            transition: background-color 0.2s ease;
            border-radius: 0.5rem;
            padding: 1rem;
        }

        .impression-item:last-child {
            margin-bottom: 0;
            padding-bottom: 1rem;
            /* Adjusted padding */
            border-bottom: none;
        }

        .impression-item:hover {
            background-color: #f8f9fa;
        }

        .impression-avatar {
            flex-shrink: 0;
        }

        .impression-avatar img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e3e6f0;
        }

        .impression-placeholder-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background-color: #6a11cb;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1rem;
            border: 2px solid #e3e6f0;
        }

        .impression-content {
            flex-grow: 1;
        }

        .impression-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.3rem;
        }

        .impression-user {
            font-weight: 600;
            color: #5a5c69;
        }

        .impression-timestamp {
            font-size: 0.8rem;
            color: #858796;
        }

        .impression-text {
            font-size: 0.95rem;
            color: #666;
            line-height: 1.5;
            white-space: pre-wrap;
            /* Preserve line breaks */
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid impressions-report-page"> 

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2 no-print">
            <h1 class="h3 mb-0 text-gray-800"><?php echo e(__('dashboard.impressions_report')); ?></h1>
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
                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('dashboard.impressions_report')); ?> -
                    <?php echo e($trip->title); ?></li>
            </ol>
        </nav>

        
        <div class="printable-header mb-3 text-center d-none d-print-block">
            <h4><?php echo e(__('dashboard.impressions_report')); ?></h4>
            <p><?php echo e(__('dashboard.report_for_trip')); ?>: <?php echo e($trip->title); ?></p>
        </div>

        <!-- Impressions List -->
        
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold"><?php echo e(__('dashboard.impressions')); ?></h6>
            </div>
            <div class="card-body">
                <?php $__empty_1 = true; $__currentLoopData = $impressions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $impression): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="impression-item">
                        <div class="impression-avatar no-print">
                            <?php if($impression->user && $impression->user->avatar): ?>
                                <img src="<?php echo e(asset('storage/' . $impression->user->avatar)); ?>"
                                    alt="<?php echo e($impression->user->name); ?>'s avatar">
                            <?php else: ?>
                                
                                <div class="impression-placeholder-avatar">
                                    <?php echo e(strtoupper(substr($impression->user->name ?? 'U', 0, 1))); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="impression-content">
                            <div class="impression-header">
                                <span
                                    class="impression-user"><?php echo e($impression->user->name ?? __('dashboard.unknown_user')); ?></span>
                                <span class="impression-timestamp"><?php echo e($impression->created_at->diffForHumans()); ?></span>
                            </div>
                            <p class="impression-text"><?php echo e($impression->content); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-comment-slash fa-2x mb-2"></i>
                        <p><?php echo e(__('dashboard.no_impressions_found_for_trip')); ?></p>
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
            border: none !important;
            box-shadow: none !important;
        }

        .card-header,
        .breadcrumb {
            display: none !important;
        }

        /* Hide card header and breadcrumbs */
        .card-body {
            padding: 0 !important;
        }

        .impression-item {
            border-bottom: 1px solid #ccc !important;
            padding: 0.5cm 0;
            margin-bottom: 0.5cm;
            page-break-inside: avoid;
            background-color: transparent !important;
            border-radius: 0;
        }

        .impression-item:last-child {
            border-bottom: none !important;
        }

        .impression-header {
            margin-bottom: 0.2cm;
        }

        .impression-user {
            font-weight: bold;
        }

        .impression-timestamp {
            font-size: 8pt;
            color: #555;
        }

        .impression-text {
            font-size: 10pt;
            line-height: 1.4;
            color: #000;
        }

        .printable-header {
            display: block !important;
        }

        @page {
            size: A4;
            margin: 1cm;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\My_laravel\‏‏laravel_2025_trips\resources\views/admin/reports/types/impressions.blade.php ENDPATH**/ ?>