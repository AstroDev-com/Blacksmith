<?php $__env->startSection('title', __('dashboard.dashboard')); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        /* Keep existing styles for .stat-card, .welcome-card, .stat-icon etc. if needed for remaining cards */
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
            /* Default color, can be overridden by text-primary etc. */
        }

        /* Remove Chart Card styles */
        /* Remove Activity Timeline styles */
        /* Remove Table Styling if no other tables use these specific styles */
        /* Remove Modal specific styles (#addTransactionModal) */

        /* Prevent horizontal overflow from causing vertical scrollbar */
        .main-content {
            overflow-x: hidden;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div id="admin-home-page">
        <div class="container-fluid">

            <!-- Welcome Card -->
            <div class="welcome-card card-header mb-4"> 
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="mb-1">
                            <i class="fas fa-hand-sparkles welcome-icon me-2"></i>
                            <?php echo e(__('dashboard.welcome')); ?>, <?php echo e(Auth::user()->name); ?>!
                            
                            
                        </h4>
                    </div>
                    <div class="col-md-4 d-flex justify-content-md-end align-items-center">
                        <i class="fas fa-clinic-medical fa-2x opacity-75"></i> 
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row g-4 mb-3">
                
                
                

                <!-- Users Stats Card (Kept) -->
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="stat-icon text-secondary">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted mb-0"><?php echo e(__('dashboard.users')); ?></h6>
                                    <h3 class="fw-bold mb-0"><?php echo e($totalUsers ?? 0); ?></h3> 
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Placeholder for future Clinic Stats -->
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="stat-icon text-primary">
                                    <i class="fas fa-user-md"></i> 
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted mb-0">الأطباء</h6> 
                                    <h3 class="fw-bold mb-0">0</h3> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="stat-icon text-success">
                                    <i class="fas fa-calendar-check"></i> 
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted mb-0">المواعيد اليوم</h6> 
                                    <h3 class="fw-bold mb-0">0</h3> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="stat-icon text-info">
                                    <i class="fas fa-user-injured"></i> 
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted mb-0">المرضى</h6> 
                                    <h3 class="fw-bold mb-0">0</h3> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            

            

        </div>
    </div>

    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    
    
    
    
    <script>
        // Helper functions for displaying SweetAlert messages (Kept for potential future use)
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\My_laravel\‏‏‏‏‏‏laravel_2025_gas_station\resources\views/admin/home.blade.php ENDPATH**/ ?>