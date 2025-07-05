<?php $__env->startSection('title', __('dashboard.dashboard')); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        /* Cards Styling */
        #admin-home-page .stat-card {
            background: linear-gradient(145deg, #ffffff, #f5f5f5);
            border: none;
            border-radius: 15px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.05),
                -5px -5px 10px rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
        }

        #admin-home-page .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 7px 7px 15px rgba(0, 0, 0, 0.08),
                -7px -7px 15px rgba(255, 255, 255, 0.9);
        }

        #admin-home-page .welcome-card {
            background: linear-gradient(145deg, #ffffff, #d3cbcb);
            color: rgb(42, 75, 184);
            border-radius: 15px;
            padding: .8rem;
            margin-bottom: .5rem;
            position: relative;
            overflow: hidden;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.05), -5px -5px 10px rgba(255, 255, 255, 0.8);
        }

        #admin-home-page .welcome-icon {
            font-size: 2.0rem;
            color: #4e73df;
            animation: wave 2s infinite;
            transform-origin: 70% 70%;
            display: inline-block;
            position: relative;
        }

        #admin-home-page .welcome-icon::after {
            content: '\f7d9';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            top: -8px;
            right: -8px;
            font-size: 0.8rem;
            color: #f6c23e;
            animation: sparkle 1.5s infinite;
        }

        @keyframes wave {
            0% {
                transform: rotate(0deg);
            }

            10% {
                transform: rotate(14deg);
            }

            20% {
                transform: rotate(-8deg);
            }

            30% {
                transform: rotate(14deg);
            }

            40% {
                transform: rotate(-4deg);
            }

            50% {
                transform: rotate(10deg);
            }

            60% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        @keyframes sparkle {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.2);
                opacity: 0.8;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        #admin-home-page .welcome-text {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 500;
        }

        #admin-home-page .stat-value {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 0.3rem;
        }

        #admin-home-page .stat-label {
            font-size: 0.95rem;
            opacity: 0.8;
            font-weight: 500;
        }

        #admin-home-page .trend-indicator {
            font-size: 0.8rem;
            padding: 0.2rem 0.5rem;
            border-radius: 15px;
            display: inline-flex;
            align-items: center;
        }

        #admin-home-page .trend-up {
            background: rgba(28, 200, 138, 0.1);
            color: #1cc88a;
        }

        #admin-home-page .trend-down {
            background: rgba(231, 74, 59, 0.1);
            color: #e74a3b;
        }

        #admin-home-page .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            background: linear-gradient(145deg, #e2e8f0, #ffffff);
            box-shadow: inset 3px 3px 5px rgba(0, 0, 0, 0.05),
                inset -3px -3px 5px rgba(255, 255, 255, 0.9);
            color: #4e73df;
        }

        /* Chart Card */
        #admin-home-page .chart-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.05),
                -5px -5px 10px rgba(255, 255, 255, 0.8);
            border: none;
        }

        #admin-home-page .chart-container {
            position: relative;
            height: 300px;
            padding: 1rem;
        }

        /* Activity Timeline */
        #admin-home-page .activity-timeline {
            position: relative;
            padding: 1.5rem;
        }

        #admin-home-page .timeline-item {
            position: relative;
            padding-right: 25px;
            /* Padding from line */
            padding-bottom: 0.8rem;
            /* Vertical spacing */
            border-right: 1px solid #e3e6f0;
            /* Thin line */
            padding-top: 0;
        }

        #admin-home-page .timeline-item:last-child {
            padding-bottom: 0;
            border-right-color: transparent;
        }

        #admin-home-page .timeline-event {
            padding-right: 10px;
            /* Padding from point */
            position: relative;
        }

        #admin-home-page .timeline-event h6 {
            margin-bottom: 0.2rem;
            font-size: 0.9rem;
        }

        #admin-home-page .timeline-event p {
            margin-bottom: 0.1rem;
            font-size: 0.85rem;
            color: #6e707e;
            line-height: 1.4;
        }

        #admin-home-page .timeline-event p a {
            color: #4e73df;
            text-decoration: none;
        }

        #admin-home-page .timeline-event p a:hover {
            text-decoration: underline;
        }

        #admin-home-page .timeline-event-time {
            font-size: 0.75rem;
            color: #b7b9cc;
        }

        /* Restore timeline point positioning */
        #admin-home-page .timeline-point {
            position: absolute;
            right: -6px;
            /* Adjusted for thin line */
            top: 5px;
            /* Alignment */
            width: 11px;
            height: 11px;
            border-radius: 50%;
            background-color: #adb5bd;
            /* Default */
            border: 2px solid #fff;
            z-index: 1;
        }

        /* Restore point background colors */
        #admin-home-page .timeline-point.bg-primary {
            background-color: #4e73df;
        }

        #admin-home-page .timeline-point.bg-success {
            background-color: #1cc88a;
        }

        #admin-home-page .timeline-point.bg-warning {
            background-color: #f6c23e;
        }

        #admin-home-page .timeline-point.bg-info {
            background-color: #36b9cc;
        }

        #admin-home-page .timeline-point.bg-secondary {
            background-color: #858796;
        }

        #admin-home-page .timeline-point.bg-danger {
            background-color: #e74a3b;
        }

        /* Table Styling */
        #admin-home-page .table-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.05),
                -5px -5px 10px rgba(255, 255, 255, 0.8);
            border: none;
            overflow: hidden;
        }

        #admin-home-page .table {
            margin-bottom: 0;
        }

        #admin-home-page .table> :not(caption)>*>* {
            padding: 0.75rem;
        }

        #admin-home-page .table tbody tr {
            transition: all 0.3s ease;
            height: 50px;
        }

        #admin-home-page .table tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }

        #admin-home-page .status-badge {
            padding: 0.5em 1em;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        #admin-home-page .d-flex.gap-2 {
            gap: 0.5rem;
        }

        /* تنسيق صورة المقالة */
        #admin-home-page .product-thumbnail {
            width: 35px;
            height: 35px;
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: inline-block;
            border: 1px solid #dee2e6;
        }

        #admin-home-page .product-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
            padding: 2px;
        }

        #admin-home-page .no-image {
            width: 100%;
            height: 100%;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4e73df;
            font-size: 1rem;
            border: 1px solid #dee2e6;
        }

        #admin-home-page .no-image i {
            font-size: 1.2rem;
            color: #4e73df;
        }

        @media (max-width: 768px) {
            #admin-home-page .table> :not(caption)>*>* {
                padding: 0.5rem;
            }

            #admin-home-page .table tbody tr {
                height: 45px;
            }

            #admin-home-page .welcome-card {
                padding: 1.5rem;
            }
        }

        /* تعديل المسافات بين السطور فقط */
        #admin-home-page .table-card .table tbody tr {
            line-height: 1.2;
            height: 40px;
        }

        #admin-home-page .table-card .table td,
        #admin-home-page .table-card .table th {
            padding: 0.5rem;
            vertical-align: middle;
        }

        #admin-home-page .table-card .product-thumbnail {
            width: 30px;
            height: 30px;
        }

        #admin-home-page .table-card .product-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #admin-home-page .table-card .no-image {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            border-radius: 4px;
        }

        #admin-home-page .table-card .status-badge {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }

        /* Activity & Latest Trips List Styling */
        .list-group-item {
            background-color: transparent;
            border: none;
            padding: 0.8rem 0.2rem;
            border-bottom: 1px solid #eee;
        }

        .list-group-item:last-child {
            border-bottom: none;
        }

        .activity-description,
        .trip-title-link {
            font-weight: 500;
            color: #5a5c69;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .activity-description:hover,
        .trip-title-link:hover {
            color: #4e73df;
        }

        .activity-time,
        .trip-date {
            font-size: 0.8rem;
            color: #858796;
        }

        .list-icon {
            width: 30px;
            text-align: center;
            color: #adb5bd;
            font-size: 0.9rem;
        }

        .card-title-custom {
            font-weight: 600;
            color: #5a5c69;
            font-size: 1.1rem;
        }

        /* Prevent horizontal overflow from causing vertical scrollbar */
        .main-content {
            overflow-x: hidden;
        }

        /* Original Floating Label Styles from create.blade.php - Scoped to Modal */
        #addTransactionModal .form-group.floating-label {
            position: relative;
            margin-bottom: 1.5rem;
            /* Reverted to original margin */
        }

        #addTransactionModal .form-group.floating-label .form-label {
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
            /* Remove styles intended for placeholder-like appearance */
            /* opacity: 0; Initially hidden? Let's test */
        }

        /* Show label when input has value or focus - relies on JS adding .has-value to input-group */
        /* This selector needs review based on how the original works */
        /* Option 1: If original relied on :placeholder-shown */
        /*
                                                                                                                                                                    #addTransactionModal .form-group.floating-label .form-control:not(:placeholder-shown) + .form-label,
                                                                                                                                                                    #addTransactionModal .form-group.floating-label .form-control:focus + .form-label {
                                                                                                                                                                        opacity: 1;
                                                                                                                                                                        top: -10px;
                                                                                                                                                                         Adjust other properties as needed
                                                                                                                                                                    }*/
        /* Option 2: Replicating create.blade.php JS behaviour (adding .has-value to input-group) */
        /* Let's assume the label is always visible and positioned above by default with this CSS */
        /* The JS interaction might be simpler */


        #addTransactionModal .form-group.floating-label .form-label i {
            font-size: 14px;
            color: #6a11cb;
        }

        #addTransactionModal .form-group.floating-label .input-group {
            position: relative;
            border: 2px solid #e3e6f0;
            border-radius: 15px;
            transition: all 0.3s ease;
            background: white;
            height: 45px;
            /* Reverted to original height */
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        #addTransactionModal .form-group.floating-label .input-group:focus-within {
            border-color: #6a11cb;
            box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.15);
        }

        /* Style for when JS adds .has-value to input-group */
        #addTransactionModal .form-group.floating-label .input-group.has-value {
            /* Maybe border color change? Check original */
            /* border-color: #6a11cb; */
        }


        #addTransactionModal .form-group.floating-label .form-control {
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

        #addTransactionModal .form-group.floating-label .form-control:focus {
            box-shadow: none;
            background: transparent;
        }

        #addTransactionModal .form-group.floating-label .form-control::placeholder {
            color: #95a5a6;
            opacity: 0.7;
            /* Keep placeholder styling */
        }

        #addTransactionModal .form-group.floating-label .input-group textarea.form-control {
            height: auto;
            padding: 0.75rem 1rem;
        }

        #addTransactionModal .form-group.floating-label .input-group.textarea-group {
            height: auto;
        }

        #addTransactionModal .form-group.floating-label select.form-control {
            appearance: none;
            padding-right: 2.5rem;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%236a11cb' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
            cursor: pointer;
        }

        #addTransactionModal .is-invalid.form-control {
            border-color: #dc3545 !important;
            /* Match original */
        }

        #addTransactionModal .input-group:has(.is-invalid) {
            border-color: #dc3545;
        }

        #addTransactionModal .invalid-feedback {
            text-align: right;
            width: 100%;
            margin-top: 0.25rem;
            font-size: .875em;
            color: #dc3545;
            display: none;
            /* Hide by default, shown by validation */
            padding-right: 10px;
        }

        /* Use standard bootstrap validation display */
        #addTransactionModal .was-validated .form-control:invalid~.invalid-feedback,
        #addTransactionModal .form-control.is-invalid~.invalid-feedback {
            display: block;
        }


        #addTransactionModal .form-group.floating-label:hover .input-group {
            border-color: #8b4cde;
        }

        #addTransactionModal .form-group.floating-label:hover .form-label {
            transform: translateY(-1px);
            box-shadow: 0 3px 5px rgba(106, 17, 203, 0.15);
        }

        /* Custom Modal Body Padding */
        #addTransactionModal .modal-body {
            padding: 1.5rem;
        }

        /* --- Button Styles from create.blade.php - Scoped to Modal --- */
        #addTransactionModal .modal-footer .btn {
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
            /* Remove default bootstrap button styles that might conflict */
            border: none;
            line-height: 1.5;
            /* Ensure consistent line height */
        }

        #addTransactionModal .modal-footer .btn::before {
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

        #addTransactionModal .modal-footer .btn:hover::before {
            transform: translateX(0);
        }

        /* Cancel Button Style (like .cancel-btn) applied to .btn-secondary */
        #addTransactionModal .modal-footer .btn-secondary {
            color: #858796;
            border: 2px solid #858796;
            background: transparent;
        }

        #addTransactionModal .modal-footer .btn-secondary:hover {
            color: white;
            background: linear-gradient(135deg, #858796, #5a5c69);
            transform: translateY(-3px);
            box-shadow: 0 0.5rem 1rem rgba(133, 135, 150, 0.2);
            border-color: #5a5c69;
        }

        /* Save Button Style (like .save-btn) applied to .btn-primary */
        #addTransactionModal .modal-footer .btn-primary {
            color: white;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(106, 17, 203, 0.3);
        }

        #addTransactionModal .modal-footer .btn-primary:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            transform: translateY(-3px);
            box-shadow: 0 0.75rem 1.5rem rgba(106, 17, 203, 0.4);
        }

        /* --- End Button Styles --- */

        /* --- Modal Header Styling --- */
        #addTransactionModal .modal-header {
            background: transparent;
            /* Match card header */
            border-bottom: 1px solid #e3e6f0;
            /* Subtle separator */
            padding: 1rem 1.5rem;
            /* Adjust padding */
            border-top-left-radius: calc(0.3rem - 1px);
            /* Adjust for bootstrap modal */
            border-top-right-radius: calc(0.3rem - 1px);
        }

        #addTransactionModal .modal-title {
            font-weight: 600;
            color: #5a5c69;
            font-size: 1.1rem;
            /* Match card title */
        }

        #addTransactionModal .modal-header .btn-close {
            /* Improve close button visibility/style if needed */
            /* Example: filter: brightness(0.8); */
        }

        /* --- End Modal Header Styling --- */

        /* Custom Modal Body Padding */
        #addTransactionModal .modal-body {
            padding: 1.5rem;
        }

        #admin-home-page .timeline-event {
            position: relative;
        }

        #admin-home-page .timeline-event h6 {
            margin-bottom: 0.2rem;
            font-size: 0.9rem;
        }

        #admin-home-page .timeline-event p {
            margin-bottom: 0.1rem;
            font-size: 0.85rem;
            color: #6e707e;
            line-height: 1.4;
        }

        #admin-home-page .timeline-event p a {
            color: #4e73df;
            text-decoration: none;
        }

        #admin-home-page .timeline-event p a:hover {
            text-decoration: underline;
        }

        #admin-home-page .timeline-event-time {
            font-size: 0.75rem;
            color: #b7b9cc;
            white-space: nowrap;
            margin-right: auto;
            margin-left: 0.2rem;
        }

        /* Styles for single-line activity view */
        #admin-home-page .single-line-event {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.5rem;
        }

        #admin-home-page .single-line-event strong.text-primary {
            font-weight: 600;
            font-size: 0.9rem;
        }

        #admin-home-page .single-line-event .activity-text {
            font-size: 0.85rem;
            color: #6e707e;
        }

        #admin-home-page .single-line-event .activity-text a {
            color: #4e73df;
            text-decoration: none;
            font-weight: 500;
        }

        #admin-home-page .single-line-event .activity-text a:hover {
            text-decoration: underline;
        }

        #admin-home-page .single-line-event .timeline-event-time {
            font-size: 0.75rem;
            color: #b7b9cc;
            white-space: nowrap;
            margin-right: auto;
            margin-left: 0.2rem;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div id="admin-home-page">
        <div class="container-fluid">

            <!-- Welcome Card -->
            <div class="welcome-card card-header">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="mb-1">
                            <i class="fas fa-hand-sparkles welcome-icon me-2"></i>
                            <?php echo e(__('dashboard.welcome')); ?>, <?php echo e(Auth::user()->name); ?> &nbsp;:
                            <span class="welcome-text mb-0"><?php echo e(__('dashboard.summary_of_today_performance')); ?></span>
                        </h4>
                    </div>
                    <div class="col-md-4 d-flex justify-content-md-end align-items-center">
                        <i class="fas fa-store fa-2x opacity-75"></i>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row g-4 mb-3">
                <!-- Trips Stats Card -->
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="stat-icon text-primary">
                                    <i class="fas fa-route"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted mb-0"><?php echo e(__('dashboard.trips_management')); ?></h6>
                                    <h3 class="fw-bold mb-0"><?php echo e($totalTrips); ?></h3>
                                    <div class="trend-indicator trend-up">
                                        <i class="fas fa-plus me-1"></i>
                                        <?php echo e($tripsToday); ?> <?php echo e(__('dashboard.today')); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Photos Stats Card -->
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="stat-icon text-success">
                                    <i class="fas fa-images"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted mb-0"><?php echo e(__('dashboard.photos')); ?></h6>
                                    <h3 class="fw-bold mb-0"><?php echo e($totalPhotos); ?></h3>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Impressions Stats Card -->
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="stat-icon text-info">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted mb-0"><?php echo e(__('dashboard.impressions')); ?></h6>
                                    <h3 class="fw-bold mb-0"><?php echo e($totalImpressions); ?></h3>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Users Stats Card (Keep or Modify) -->
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="stat-icon text-secondary">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted mb-0"><?php echo e(__('dashboard.users')); ?></h6>
                                    <h3 class="fw-bold mb-0"><?php echo e($totalUsers); ?></h3>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Charts & Activities -->
            <div class="row">
                <!-- Trips Chart -->
                <div class="col-lg-8 mb-4">
                    <div class="chart-card">
                        <div class=" px-3 bg-transparent py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0"><i
                                        class="fas fa-chart-line me-2 text-primary"></i><?php echo e(__('dashboard.trips_over_time', ['fallback' => 'Trips Over Time'])); ?>

                                </h5>
                                <div class="chart-actions d-none">
                                    <button class="btn btn-sm btn-outline-primary active"
                                        data-period="monthly"><?php echo e(__('dashboard.monthly')); ?></button>
                                    <button class="btn btn-sm btn-outline-primary"
                                        data-period="weekly"><?php echo e(__('dashboard.weekly')); ?></button>
                                    <button class="btn btn-sm btn-outline-primary"
                                        data-period="daily"><?php echo e(__('dashboard.daily')); ?></button>
                                </div>
                                <div class="dropdown d-none">
                                    <button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="fas fa-download me-2"></i><?php echo e(__('dashboard.download_report')); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="tripsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- أخر الأنشطة -->
                <div class="col-lg-4 mb-4"> 
                    <div class="chart-card h-100">
                        <div class=" px-3 bg-transparent py-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0"><?php echo e(__('dashboard.latest_activities')); ?></h5>
                                <div class="activity-actions">
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="activity-timeline" id="activity-timeline-container">
                            <p class="text-muted text-center"><?php echo e(__('dashboard.no_activities_found')); ?></p>
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- Latest Trips Table -->
            <div class="row">
                <div class="col-12">
                    <div class="table-card card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary"><i
                                    class="fas fa-plane-departure me-2"></i><?php echo e(__('dashboard.latest_trips', ['fallback' => 'Latest Trips'])); ?>

                            </h6>
                            <div> 
                                <button type="button" class="btn btn-sm btn-success me-2" data-bs-toggle="modal"
                                    data-bs-target="#addTransactionModal">
                                    <i class="fas fa-plus me-1"></i>
                                    <?php echo e(__('dashboard.add_transaction', ['fallback' => 'Add Transaction'])); ?>

                                </button>
                                <a href="<?php echo e(route('admin.trips.index')); ?>"
                                    class="btn btn-sm btn-outline-primary"><?php echo e(__('dashboard.view_all')); ?> <i
                                        class="fas fa-arrow-circle-right ms-1"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th><?php echo e(__('dashboard.title')); ?></th>
                                            <th><?php echo e(__('dashboard.location')); ?></th>
                                            <th><?php echo e(__('dashboard.start_date')); ?></th>
                                            <th><?php echo e(__('dashboard.type')); ?></th>
                                            <th><?php echo e(__('dashboard.actions')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $latestTrips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo e(route('admin.trips.show', $trip)); ?>"
                                                        class="text-decoration-none fw-bold"><?php echo e(Str::limit($trip->title, 30)); ?></a>
                                                </td>
                                                <td><?php echo e($trip->location ?? 'N/A'); ?></td>
                                                <td><?php echo e($trip->start_date ? $trip->start_date->format('Y-m-d') : '--'); ?>

                                                </td>
                                                <td><span
                                                        class="badge bg-info"><?php echo e(__('dashboard.' . $trip->type)); ?></span>
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.trips.show', $trip)); ?>"
                                                        class="btn btn-sm btn-outline-info me-1"
                                                        title="<?php echo e(__('dashboard.view')); ?>"><i class="fas fa-eye"></i></a>
                                                    <a href="<?php echo e(route('admin.trips.edit', $trip)); ?>"
                                                        class="btn btn-sm btn-outline-warning"
                                                        title="<?php echo e(__('dashboard.edit')); ?>"><i
                                                            class="fas fa-edit"></i></a>
                                                    
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="5" class="text-center py-4 text-muted">
                                                    <i class="fas fa-info-circle me-2"></i>
                                                    <?php echo e(__('dashboard.no_trips_found', ['fallback' => 'No trips found yet.'])); ?>

                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    
    <div class="modal fade" id="addTransactionModal" tabindex="-1" aria-labelledby="addTransactionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg"> 
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTransactionModalLabel">
                        <i class="fas fa-plus-circle me-2"></i><?php echo e(__('dashboard.add_new_transaction')); ?>

                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('admin.transactions.storeAjax')); ?>" method="POST" id="addTransactionFormModal">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        
                        <div class="form-group floating-label">
                            <label for="modal_trip_id" class="form-label">
                                <i class="fas fa-route me-1"></i>
                                <?php echo e(__('dashboard.trip')); ?> <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <select class="form-control" id="modal_trip_id" name="trip_id" required
                                    placeholder="<?php echo e(__('dashboard.select_trip')); ?>">
                                    
                                    <option value="" selected disabled style="display: none;"></option>
                                    <?php $__currentLoopData = $userTripsForSelect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id); ?>"><?php echo e($title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            
                        </div>

                        <div class="row g-2"> 
                            
                            <div class="col-md-6">
                                <div class="form-group floating-label">
                                    <label for="modal_transaction_type" class="form-label">
                                        <i class="fas fa-exchange-alt me-1"></i>
                                        <?php echo e(__('dashboard.type')); ?> <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <select class="form-control" id="modal_transaction_type" name="type" required
                                            placeholder="<?php echo e(__('dashboard.select_type')); ?>">
                                            
                                            <option value="expense" selected><?php echo e(__('dashboard.expense')); ?></option>
                                            <option value="income"><?php echo e(__('dashboard.income')); ?></option>
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>

                            
                            <div class="col-md-6" id="modalExpenseCategoryGroup">
                                <div class="form-group floating-label">
                                    <label for="modal_expense_category_id" class="form-label">
                                        <i class="fas fa-tag me-1"></i>
                                        <?php echo e(__('dashboard.category')); ?> <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <select class="form-control" id="modal_expense_category_id"
                                            name="expense_category_id" required
                                            placeholder="<?php echo e(__('dashboard.select_category')); ?>">
                                            
                                            <option value="" selected disabled style="display: none;"></option>
                                            <?php
                                                $expenseCategoriesModal = \App\Models\ExpenseCategory::orderBy(
                                                    'name',
                                                )->get();
                                            ?>
                                            <?php $__currentLoopData = $expenseCategoriesModal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>

                            
                            <div class="col-md-12">
                                <div class="form-group floating-label">
                                    <label for="modal_transaction_description" class="form-label">
                                        <i class="fas fa-pen me-1"></i>
                                        <?php echo e(__('dashboard.description')); ?> <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="modal_transaction_description"
                                            name="description" required
                                            placeholder="<?php echo e(__('dashboard.enter_description')); ?>">
                                    </div>
                                    
                                </div>
                            </div>

                            
                            <div class="col-md-6">
                                <div class="form-group floating-label">
                                    <label for="modal_transaction_amount" class="form-label">
                                        <i class="fas fa-dollar-sign me-1"></i>
                                        <?php echo e(__('dashboard.amount')); ?> <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="number" step="0.01" min="0.01" class="form-control"
                                            id="modal_transaction_amount" name="amount" required
                                            placeholder="<?php echo e(__('dashboard.enter_amount')); ?>">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group floating-label">
                                    <label for="modal_transaction_currency" class="form-label">
                                        <i class="fas fa-coins me-1"></i>
                                        <?php echo e(__('dashboard.currency')); ?> <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <select class="form-control" id="modal_transaction_currency" name="currency"
                                            required placeholder="<?php echo e(__('dashboard.select_currency')); ?>">
                                            
                                            <?php
                                                $commonCurrenciesModal = ['USD', 'SAR', 'YER', 'INR', 'EGP', 'JOD']; // Example
                                            ?>
                                            <?php $__currentLoopData = $commonCurrenciesModal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currencyCode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($currencyCode); ?>"
                                                    <?php echo e($currencyCode == 'USD' ? 'selected' : ''); ?>><?php echo e($currencyCode); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>

                            
                            <div class="col-md-6">
                                <div class="form-group floating-label">
                                    <label for="modal_transaction_date" class="form-label">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        <?php echo e(__('dashboard.date')); ?> <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="modal_transaction_date"
                                            name="transaction_date" required value="<?php echo e(date('Y-m-d')); ?>"
                                            placeholder="<?php echo e(__('dashboard.select_date')); ?>">
                                    </div>
                                    
                                </div>
                            </div>

                            
                            <div class="col-md-12">
                                <div class="form-group floating-label">
                                    <label for="modal_transaction_notes" class="form-label">
                                        <i class="fas fa-sticky-note me-1"></i>
                                        <?php echo e(__('dashboard.notes')); ?>

                                    </label>
                                    <div class="input-group textarea-group"> 
                                        <textarea class="form-control" id="modal_transaction_notes" name="notes" rows="2"
                                            placeholder="<?php echo e(__('dashboard.enter_notes_optional')); ?>"></textarea>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal"><?php echo e(__('dashboard.close')); ?></button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i>
                            <?php echo e(__('dashboard.save_transaction')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- Trips Chart --- //
            const tripsCtx = document.getElementById('tripsChart');
            if (tripsCtx) {
                const tripsChart = new Chart(tripsCtx, {
                    type: 'line',
                    data: {
                        labels: <?php echo json_encode($tripsChartLabels, 15, 512) ?>,
                        datasets: [{
                            label: '<?php echo e(__('dashboard.trips')); ?>', // Trips label
                            data: <?php echo json_encode($tripsChartValues, 15, 512) ?>,
                            borderColor: '#4e73df',
                            backgroundColor: 'rgba(78, 115, 223, 0.1)',
                            fill: true,
                            tension: 0.3,
                            pointBackgroundColor: '#4e73df',
                            pointBorderColor: '#fff',
                            pointHoverRadius: 6,
                            pointHoverBackgroundColor: '#2e59d9'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    // Ensure only integers are shown
                                    precision: 0
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false // Hide legend if only one dataset
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                                callbacks: {
                                    label: function(context) {
                                        let label = context.dataset.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        if (context.parsed.y !== null) {
                                            label += context.parsed.y;
                                        }
                                        return label;
                                    }
                                }
                            }
                        },
                        interaction: {
                            mode: 'nearest',
                            axis: 'x',
                            intersect: false
                        }
                    }
                });
            }

            // --- Activity Timeline (Update Fetching/Rendering) --- //
            const activityContainer = document.getElementById('activity-timeline-container');

            // Function to render activities (replace existing or add)
            function renderActivities(activities) {
                if (!activityContainer) return;
                activityContainer.innerHTML = ''; // Clear existing

                if (activities.length === 0) {
                    activityContainer.innerHTML =
                        `<p class="text-muted text-center"><?php echo e(__('dashboard.no_activities_found')); ?></p>`;
                    return;
                }

                activities.forEach(activity => {
                    const itemHtml = createActivityTimelineItem(activity);
                    activityContainer.insertAdjacentHTML('beforeend', itemHtml);
                });
            }

            // Function to create HTML for a single activity item
            function createActivityTimelineItem(activity) {
                let iconClass = 'fa-info-circle';
                let pointClass = 'bg-secondary';
                let modelName = activity.subject_type ? activity.subject_type.split('\\').pop() : null;
                const eventType = activity.event || activity.description ||
                    'unknown'; // Ensure eventType has a value
                let actionTextKey = '';
                let subjectString = '';

                try { // Wrap logic in try...catch to prevent one error stopping all rendering
                    // Determine the translation key and subject string based on event and model
                    if (modelName === 'Trip') {
                        iconClass = 'fa-route';
                        pointClass = 'bg-primary';
                        subjectString = activity.subject?.title || activity.properties?.trip_title ||
                            '<?php echo e(__('dashboard.deleted_subject')); ?>';
                        if (eventType === 'created') actionTextKey = 'dashboard.activity_created_trip';
                        else if (eventType === 'updated') actionTextKey = 'dashboard.activity_updated_trip';
                        else if (eventType === 'deleted') actionTextKey = 'dashboard.activity_deleted_trip';
                    } else if (modelName === 'TripTransaction') {
                        iconClass = 'fa-money-bill-wave';
                        pointClass = 'bg-warning';
                        let transactionDesc = '<?php echo e(__('dashboard.transaction', ['fallback' => 'Transaction'])); ?>';
                        let tripTitleForTransaction =
                            '<?php echo e(__('dashboard.deleted_subject')); ?>'; // Default trip title

                        if (activity.subject) { // Check if transaction subject exists
                            const type = activity.subject.type === 'income' ? '<?php echo e(__('dashboard.income')); ?>' :
                                '<?php echo e(__('dashboard.expense')); ?>';
                            const amount = parseFloat(activity.subject.amount).toLocaleString(undefined, {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                            const currency = activity.subject.currency || '';
                            transactionDesc = `${type}: ${amount} ${currency}`;
                            // Get trip title safely
                            tripTitleForTransaction = activity.subject.trip?.title || activity.properties
                                ?.trip_title || tripTitleForTransaction;
                        } else {
                            // Fallback if subject (transaction) is deleted
                            transactionDesc = activity.properties?.transaction_description ||
                                '<?php echo e(__('dashboard.transaction_deleted')); ?>';
                            // Try getting trip title from properties if subject is deleted
                            tripTitleForTransaction = activity.properties?.trip_title || tripTitleForTransaction;
                        }

                        if (eventType === 'created') actionTextKey = 'dashboard.activity_created_transaction';
                        else if (eventType === 'updated') actionTextKey = 'dashboard.activity_updated_transaction';
                        else if (eventType === 'deleted') actionTextKey = 'dashboard.activity_deleted_transaction';

                        // Construct subject string including transaction details and trip title
                        subjectString = `(${transactionDesc})`;
                        if (tripTitleForTransaction !== '<?php echo e(__('dashboard.deleted_subject')); ?>') {
                            subjectString += ` <?php echo e(__('dashboard.for_trip')); ?> ${tripTitleForTransaction}`;
                        }

                    } else if (modelName === 'Photo') {
                        iconClass = 'fa-image';
                        pointClass = 'bg-success';
                        subjectString = activity.subject?.trip?.title || activity.properties?.trip_title ||
                            '<?php echo e(__('dashboard.deleted_subject')); ?>';
                        if (eventType === 'created') actionTextKey = 'dashboard.activity_created_photo';
                        else if (eventType === 'deleted') actionTextKey = 'dashboard.activity_deleted_photo';
                    } else if (modelName === 'Impression') {
                        iconClass = 'fa-comment';
                        pointClass = 'bg-info';
                        subjectString = activity.subject?.trip?.title || activity.properties?.trip_title ||
                            '<?php echo e(__('dashboard.deleted_subject')); ?>';
                        if (eventType === 'created') actionTextKey = 'dashboard.activity_created_impression';
                        else if (eventType === 'deleted') actionTextKey = 'dashboard.activity_deleted_impression';
                    } else if (modelName === 'Document') {
                        iconClass = 'fa-file-alt'; // Changed icon
                        pointClass = 'bg-secondary';
                        subjectString = activity.subject?.trip?.title || activity.properties?.trip_title ||
                            '<?php echo e(__('dashboard.deleted_subject')); ?>';
                        if (eventType === 'created') actionTextKey = 'dashboard.activity_uploaded_document';
                        else if (eventType === 'deleted') actionTextKey = 'dashboard.activity_deleted_document';
                    } else { // Handle unknown modelName or activities without subject_type
                        subjectString = activity.description || '<?php echo e(__('dashboard.unknown_activity')); ?>';
                        // Try to use event type as key if model is unknown
                        actionTextKey =
                            `dashboard.activity_${eventType}_unknown`; // e.g., dashboard.activity_created_unknown
                    }

                    // Get the translated action text using the key
                    const defaultFallback = eventType.charAt(0).toUpperCase() + eventType.slice(
                        1); // Capitalize eventType
                    // Safely construct the translation key string before passing to Blade
                    const finalActionTextKey = actionTextKey || `dashboard.activity_${eventType}`;
                    // Get pre-translated text from the object
                    const translatedActionText = translations[finalActionTextKey] || defaultFallback;

                    // Construct final timeline description
                    let finalDescription = translatedActionText;
                    let subjectLink = '#'; // Default link
                    let linkedSubjectText = escapeHtml(subjectString); // Default: just the escaped text

                    // Determine the subject link
                    let targetSubjectId = null;
                    if (modelName === 'Trip' && activity.subject?.id) {
                        targetSubjectId = activity.subject.id;
                        subjectLink = `<?php echo e(url('admin/trips')); ?>/${targetSubjectId}`;
                        linkedSubjectText =
                            `<a href="${subjectLink}" class="fw-bold">${escapeHtml(subjectString)}</a>`;
                    } else if (['Photo', 'Impression', 'Document', 'TripTransaction'].includes(modelName)) {
                        targetSubjectId = activity.subject?.trip?.id || activity.properties?.trip_id;
                        if (targetSubjectId) {
                            subjectLink = `<?php echo e(url('admin/trips')); ?>/${targetSubjectId}`;
                            // Link the entire subjectString (which includes transaction details or trip title)
                            linkedSubjectText =
                                `<a href="${subjectLink}" class="fw-bold">${escapeHtml(subjectString)}</a>`;
                        }
                    }
                    // Else: Keep default link and non-linked text for unknown/deleted/etc.

                    // Construct final description with link (if applicable)
                    if (modelName === 'TripTransaction') {
                        // For transactions, linkedSubjectText now contains the link wrapping trip title and details
                        finalDescription = `${translatedActionText} ${linkedSubjectText}`;
                    } else if (subjectLink !== '#') {
                        // For others, link the subject part
                        finalDescription = `${translatedActionText} ${linkedSubjectText}`;
                    } else {
                        // If no link, just use the text
                        finalDescription = `${translatedActionText} ${escapeHtml(subjectString)}`;
                    }

                    // User who performed the action
                    const causerName = activity.causer?.name || translations['dashboard.unknown_user'] ||
                        'Unknown User';
                    const causerLink = `<strong class="text-primary">${escapeHtml(causerName)}</strong>`;

                    // Construct the complete timeline item HTML
                    const timelineItem = `
                        <li class="timeline-item">
                            <span class="timeline-point ${pointClass} timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6 class="mb-0">${causerLink}</h6>
                                    <span class="timeline-event-time">${moment(activity.created_at).locale('<?php echo e(app()->getLocale()); ?>').fromNow()}</span>
                                </div>
                                <p class="mb-0">${finalDescription}</p>
                            </div>
                        </li>`;

                    return timelineItem;

                } catch (error) {
                    console.error('Error creating timeline item for activity:', activity, error);
                    // Return a fallback item indicating an error for this specific activity
                    return `
                        <li class="timeline-item">
                             <span class="timeline-point bg-danger timeline-point-indicator"></span>
                             <div class="timeline-event">
                                 <p class="mb-0 text-danger">Error displaying activity ID: ${activity.id || 'N/A'}</p>
                        </div>
                         </li>`;
                }
            }

            // Helper function to escape HTML
            function escapeHtml(unsafe) {
                if (typeof unsafe !== 'string') return '';
                return unsafe
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;")
                    .replace(/'/g, "&#039;");
            }

            // Initial rendering of activities passed from PHP
            console.log('Activities Data from PHP:', <?php echo json_encode($latestActivities, 15, 512) ?>);

            // Pre-translate activity strings using Blade
            const translations = {
                'dashboard.activity_created_trip': `<?php echo e(__('dashboard.activity_created_trip', ['fallback' => 'Created trip'])); ?>`, // Use backticks for template literals
                'dashboard.activity_updated_trip': `<?php echo e(__('dashboard.activity_updated_trip', ['fallback' => 'Updated trip'])); ?>`,
                'dashboard.activity_deleted_trip': `<?php echo e(__('dashboard.activity_deleted_trip', ['fallback' => 'Deleted trip'])); ?>`,
                'dashboard.activity_created_photo': `<?php echo e(__('dashboard.activity_created_photo', ['fallback' => 'Uploaded photo to'])); ?>`,
                'dashboard.activity_deleted_photo': `<?php echo e(__('dashboard.activity_deleted_photo', ['fallback' => 'Deleted photo from'])); ?>`,
                'dashboard.activity_created_impression': `<?php echo e(__('dashboard.activity_created_impression', ['fallback' => 'Added impression on'])); ?>`,
                'dashboard.activity_deleted_impression': `<?php echo e(__('dashboard.activity_deleted_impression', ['fallback' => 'Deleted impression from'])); ?>`,
                'dashboard.activity_created_transaction': `<?php echo e(__('dashboard.activity_created_transaction', ['fallback' => 'Created transaction'])); ?>`,
                'dashboard.activity_updated_transaction': `<?php echo e(__('dashboard.activity_updated_transaction', ['fallback' => 'Updated transaction'])); ?>`,
                'dashboard.activity_deleted_transaction': `<?php echo e(__('dashboard.activity_deleted_transaction', ['fallback' => 'Deleted transaction'])); ?>`, // Removed 'for' from key
                'dashboard.activity_uploaded_document': `<?php echo e(__('dashboard.activity_uploaded_document', ['fallback' => 'Uploaded document to'])); ?>`,
                'dashboard.activity_deleted_document': `<?php echo e(__('dashboard.activity_deleted_document', ['fallback' => 'Deleted document from'])); ?>`,
                'dashboard.deleted_subject': `<?php echo e(__('dashboard.deleted_subject')); ?>`,
                'dashboard.transaction_deleted': `<?php echo e(__('dashboard.transaction_deleted')); ?>`,
                'dashboard.for_trip': `<?php echo e(__('dashboard.for_trip')); ?>`,
                'dashboard.income': `<?php echo e(__('dashboard.income')); ?>`,
                'dashboard.expense': `<?php echo e(__('dashboard.expense')); ?>`,
                'dashboard.unknown_activity': `<?php echo e(__('dashboard.unknown_activity')); ?>`,
                'dashboard.unknown_user': `<?php echo e(__('dashboard.unknown_user')); ?>`
                // Add other needed translations here
            };

            renderActivities(<?php echo json_encode($latestActivities, 15, 512) ?>);
            console.log('Finished rendering activities.');

            // --- Add Transaction Modal Logic --- //
            const transactionModal = document.getElementById('addTransactionModal');
            const transactionForm = document.getElementById('addTransactionFormModal');
            const typeSelect = document.getElementById('modal_transaction_type');
            const categoryGroup = document.getElementById('modalExpenseCategoryGroup');
            const categorySelect = document.getElementById('modal_expense_category_id');

            // Show/hide category based on type
            function toggleCategoryField() {
                if (typeSelect.value === 'expense') {
                    categoryGroup.style.display = 'block';
                    categorySelect.required = true;
                } else {
                    categoryGroup.style.display = 'none';
                    categorySelect.required = false;
                    categorySelect.value = ''; // Clear value when hidden
                }
            }

            if (typeSelect && categoryGroup && categorySelect) {
                typeSelect.addEventListener('change', toggleCategoryField);
                // Initial check in case the modal is pre-filled (e.g., validation error)
                toggleCategoryField();
            }

            // Handle Modal Form Submission
            if (transactionForm) {
                transactionForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData(transactionForm);
                    const submitButton = transactionForm.querySelector('button[type="submit"]');
                    const originalButtonHtml = submitButton.innerHTML;

                    // Basic client-side validation (optional, enhance as needed)
                    if (!document.getElementById('modal_trip_id').value) {
                        displayError(
                            '<?php echo e(__('dashboard.select_trip_error', ['fallback' => 'Please select a trip.'])); ?>'
                        );
                        return; // Stop submission
                    }

                    submitButton.disabled = true;
                    submitButton.innerHTML =
                        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo e(__('dashboard.saving', ['fallback' => 'Saving...'])); ?>`;

                    fetch(transactionForm.action, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]') ?
                                    document.querySelector('meta[name="csrf-token"]').getAttribute(
                                        'content') : '',
                                'Accept': 'application/json',
                            },
                            body: formData
                        })
                        .then(response => {
                            // Check if response is ok (status 200-299)
                            if (!response.ok) {
                                // Try to parse error JSON, otherwise throw generic error
                                return response.json().then(errData => {
                                    throw new Error(errData.message ||
                                        `HTTP error! status: ${response.status}`);
                                }).catch(() => {
                                    throw new Error(`HTTP error! status: ${response.status}`);
                                });
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                // Close the modal
                                const modalInstance = bootstrap.Modal.getInstance(transactionModal);
                                if (modalInstance) {
                                    modalInstance.hide();
                                }
                                // Reset the form
                                transactionForm.reset();
                                toggleCategoryField(); // Reset category field visibility
                                // Show success message
                                displaySuccess(data.message ||
                                    '<?php echo e(__('dashboard.transaction_added_success')); ?>');
                                // Optionally: Refresh parts of the dashboard if needed (e.g., stats)
                            } else {
                                displayError(data.message ||
                                    '<?php echo e(__('dashboard.transaction_add_error')); ?>');
                            }
                        })
                        .catch(error => {
                            console.error('Error submitting transaction:', error);
                            displayError(error.message || '<?php echo e(__('dashboard.network_error')); ?>');
                        })
                        .finally(() => {
                            submitButton.disabled = false;
                            submitButton.innerHTML = originalButtonHtml;
                        });
                });
            }

            // Reset form when modal is hidden
            if (transactionModal) {
                transactionModal.addEventListener('hidden.bs.modal', function(event) {
                    transactionForm.reset();
                    toggleCategoryField(); // Ensure category field is reset correctly
                });
            }

        });

        // Helper functions for displaying SweetAlert messages
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
                alert('Success: ' + message); // Fallback
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
                alert('Error: ' + message); // Fallback
            }
        }
    </script>
    
    <script>
        (function() {
            'use strict'
            // Select only the modal form
            var modalForm = document.getElementById('addTransactionFormModal');
            if (modalForm) {
                modalForm.addEventListener('submit', function(event) {
                    if (!modalForm.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    modalForm.classList.add('was-validated');
                }, false);
            }

            // Apply floating label logic only to inputs within the modal
            document.querySelectorAll('#addTransactionModal .form-group.floating-label .form-control').forEach(
                input => {
                    const label = input.closest('.form-group.floating-label')?.querySelector(
                        'label'); // Use label tag
                    const inputGroup = input.closest('.input-group');

                    const checkValue = () => {
                        const hasValue = input.value && input.value !== '';
                        const isFocused = document.activeElement === input;
                        const isDateWithValue = input.type === 'date' && hasValue;
                        const isSelectWithValue = input.tagName === 'SELECT' && hasValue && input.value !==
                            ""; // Check for non-empty value in select

                        // Add/remove class to the parent .input-group based on value/focus (matching create.blade.php)
                        const inputGroupTarget = input.closest('.input-group'); // Target input-group
                        if (inputGroupTarget) {
                            if (hasValue || isFocused || isDateWithValue || isSelectWithValue) {
                                inputGroupTarget.classList.add('has-value');
                            } else {
                                inputGroupTarget.classList.remove('has-value');
                            }
                        }
                        // The CSS should now correctly handle the label based on placeholder/focus/value
                    };

                    input.addEventListener('focus', checkValue);
                    input.addEventListener('blur', checkValue);
                    input.addEventListener('input', checkValue);
                    if (input.tagName === 'SELECT') {
                        input.addEventListener('change', checkValue);
                    }
                    if (input.type === 'date') {
                        // Add event listener for browsers that might not fire 'input' on date change via picker
                        input.addEventListener('change', checkValue);
                    }

                    // Initial check in case of pre-filled values or page reload
                    checkValue();
                });

            // Ensure textarea groups have the correct class for styling
            document.querySelectorAll('#addTransactionModal textarea.form-control').forEach(textarea => {
                const inputGroup = textarea.closest('.input-group');
                if (inputGroup) {
                    inputGroup.classList.add('textarea-group');
                }
            });

            // Reset validation and floating label state when modal is hidden
            const transactionModalElement = document.getElementById('addTransactionModal');
            if (transactionModalElement) {
                transactionModalElement.addEventListener('hidden.bs.modal', function(event) {
                    const form = document.getElementById('addTransactionFormModal');
                    if (form) {
                        form.classList.remove('was-validated');
                        // Manually trigger checkValue for all inputs to reset floating labels
                        form.querySelectorAll('.form-group.floating-label .form-control').forEach(input => {
                            const checkValueFunc = () => { // Re-declare or access the outer checkValue
                                const hasValue = input.value && input.value !== '';
                                const formGroup = input.closest('.form-group.floating-label');
                                const inputGroupTarget = input.closest(
                                    '.input-group'); // Target input-group

                                if (inputGroupTarget) {
                                    if (hasValue) {
                                        inputGroupTarget.classList.add('has-value');
                                    } else {
                                        inputGroupTarget.classList.remove('has-value');
                                    }
                                }
                            };
                            // Call immediately after reset
                            setTimeout(checkValueFunc, 0); // Use timeout to ensure reset is complete
                        });
                    }
                });
            }

        })()
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\My_laravel\‏‏laravel_2025_trips\resources\views/admin/home.blade.php ENDPATH**/ ?>