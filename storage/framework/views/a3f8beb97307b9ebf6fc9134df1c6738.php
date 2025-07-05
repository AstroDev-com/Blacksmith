<?php $__env->startSection('title', __('dashboard.photos_report') . ' - ' . $trip->title); ?>

<?php $__env->startPush('styles'); ?>
    
    <style>
        .photos-report-page .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.07);
            background-color: #fff;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .photos-report-page .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.75rem 2rem rgba(0, 0, 0, 0.1);
        }

        .photos-report-page .card .card-header {
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

        .photos-report-page .card .card-header h6 {
            color: #6a11cb;
        }

        /* Photo Gallery Styles (Adapted from show.blade.php) */
        .photo-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem;
            padding: 1.5rem;
        }

        .photo-thumb-container {
            position: relative;
            overflow: hidden;
            border-radius: 0.75rem;
            box-shadow: 0 0.2rem 0.6rem rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            aspect-ratio: 1 / 1;
            /* Make them square */
            cursor: pointer;
            background-color: #f8f9fa;
        }

        .photo-thumb-container:hover {
            transform: scale(1.05);
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
        }

        .photo-thumb {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Changed to cover */
            transition: transform 0.3s ease;
        }

        /* Photo Modal Styles (Adapted from show.blade.php) */
        #photoModal .modal-content {
            border-radius: 0.75rem;
            border: none;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15);
        }

        #photoModal .modal-body {
            padding: 0;
            overflow: hidden;
        }

        #photoModal .modal-header {
            border-bottom: none;
            padding: 0.75rem 1rem;
            background-color: #f8f9fa;
        }

        #photoModal .modal-title {
            font-size: 1rem;
            color: #495057;
        }

        #photoModal img {
            display: block;
            width: 100%;
            height: auto;
            max-height: 80vh;
            object-fit: contain;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid photos-report-page"> 

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2 no-print">
            <h1 class="h3 mb-0 text-gray-800"><?php echo e(__('dashboard.photos_report')); ?></h1>
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
                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('dashboard.photos_report')); ?> -
                    <?php echo e($trip->title); ?></li>
            </ol>
        </nav>

        
        <div class="printable-header mb-3 text-center d-none d-print-block">
            <h4><?php echo e(__('dashboard.photos_report')); ?></h4>
            <p><?php echo e(__('dashboard.report_for_trip')); ?>: <?php echo e($trip->title); ?></p>
        </div>

        <!-- Photos Grid -->
        
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold"><?php echo e(__('dashboard.photos')); ?></h6>
            </div>
            <div class="card-body">
                <?php if($photos->count() > 0): ?>
                    <div class="photo-gallery">
                        <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                // Prepare path and filename (copied from documents report)
                                $filename = basename($photo->path);
                                $encodedFilename = rawurlencode($filename);
                                $folderPath = dirname($photo->path);
                                $urlPath = ($folderPath === '.' ? '' : $folderPath . '/') . $encodedFilename;
                            ?>
                            <div class="photo-thumb-container" data-bs-toggle="modal" data-bs-target="#photoModal"
                                data-photo-src="<?php echo e(asset('storage/' . $urlPath)); ?>"
                                data-photo-caption="<?php echo e($filename); ?>">
                                <img src="<?php echo e(asset('storage/' . $urlPath)); ?>" alt="Photo for <?php echo e($trip->title); ?>"
                                    class="photo-thumb">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-image fa-2x mb-2"></i>
                        <p><?php echo e(__('dashboard.no_photos_found_for_trip')); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Photo Modal (Adapted from show.blade.php) -->
        <div class="modal fade no-print" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="photoModalLabel"><?php echo e(__('dashboard.photo_preview')); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <img id="modalPhotoImg" src="" alt="Photo Preview" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    
    <script>
        const photoModal = document.getElementById('photoModal');
        if (photoModal) {
            photoModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget;
                const photoSrc = button.getAttribute('data-photo-src');
                const photoCaption = button.getAttribute('data-photo-caption') ||
                    '<?php echo e(__('dashboard.photo_preview')); ?>'; // Default caption

                const modalTitle = photoModal.querySelector('.modal-title');
                const modalImage = photoModal.querySelector('#modalPhotoImg');

                modalTitle.textContent = photoCaption;
                modalImage.src = photoSrc;
                modalImage.alt = photoCaption;
            });
            // Clear image when modal is hidden to prevent brief display of old image
            photoModal.addEventListener('hidden.bs.modal', event => {
                const modalImage = photoModal.querySelector('#modalPhotoImg');
                modalImage.src = '';
                modalImage.alt = '';
            });
        }
    </script>

    
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

        .photo-gallery {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            /* Arrange photos in 4 columns for printing */
            gap: 0.5cm;
            padding: 0;
        }

        .photo-thumb-container {
            border: 1px solid #ccc;
            padding: 2px;
            page-break-inside: avoid;
            box-shadow: none;
            border-radius: 0;
            aspect-ratio: 1 / 1;
        }

        .photo-thumb {
            width: 100%;
            height: 100%;
            object-fit: contain;
            /* Use contain for printing to avoid cropping */
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

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\My_laravel\‏‏laravel_2025_trips\resources\views/admin/reports/types/photos.blade.php ENDPATH**/ ?>