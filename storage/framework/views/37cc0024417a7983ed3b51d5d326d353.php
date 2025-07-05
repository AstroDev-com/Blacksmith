<?php $__env->startSection('title', __('dashboard.activity_log', ['fallback' => 'Activity Log'])); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper bg-info me-3">
                                <i class="fas fa-list-alt text-white"></i>
                            </div>
                            <div>
                                <h3 class="card-title mb-0">
                                    <?php echo e(__('dashboard.activity_log', ['fallback' => 'Activity Log'])); ?></h3>
                                <p class="text-muted mb-0">
                                    <?php echo e(__('dashboard.system_activity_history', ['fallback' => 'History of system activities'])); ?>

                                </p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        
                        <div class="filter-row mb-4">
                            <form action="<?php echo e(route('admin.activity.index')); ?>" method="GET">
                                <div class="row g-3 align-items-end">
                                    
                                    <div class="col-md-3">
                                        <div class="form-group floating-label mb-0">
                                            <label for="causer_id" class="form-label"><i class="fas fa-user"></i>
                                                <?php echo e(__('dashboard.user')); ?></label>
                                            <div class="input-group">
                                                <select class="form-control" id="causer_id" name="causer_id">
                                                    <option value=""><?php echo e(__('dashboard.all_users')); ?></option>
                                                    
                                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($user->id); ?>"
                                                            <?php echo e(request('causer_id') == $user->id ? 'selected' : ''); ?>>
                                                            <?php echo e($user->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group floating-label mb-0">
                                            <label for="subject_type" class="form-label"><i class="fas fa-cogs"></i>
                                                <?php echo e(__('dashboard.record_type', ['fallback' => 'Record Type'])); ?></label>
                                            <div class="input-group">
                                                <select class="form-control" id="subject_type" name="subject_type">
                                                    <option value=""><?php echo e(__('dashboard.all_types')); ?></option>
                                                    
                                                    <?php $__currentLoopData = $subjectTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($type); ?>"
                                                            <?php echo e(request('subject_type') == $type ? 'selected' : ''); ?>>
                                                            <?php echo e($type); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group floating-label mb-0">
                                            <label for="date_range" class="form-label"><i class="fas fa-calendar-alt"></i>
                                                <?php echo e(__('dashboard.date_range')); ?></label>
                                            <div class="input-group">
                                                
                                                <input type="text" class="form-control bg-white" id="date_range"
                                                    name="date_range" value="<?php echo e(request('date_range')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="filter-buttons">
                                            <button type="submit" class="btn btn-primary btn-apply">
                                                <i class="fas fa-filter me-1"></i> <?php echo e(__('dashboard.filter')); ?>

                                            </button>
                                            <a href="<?php echo e(route('admin.activity.index')); ?>"
                                                class="btn btn-secondary btn-reset">
                                                <i class="fas fa-redo me-1"></i> <?php echo e(__('dashboard.reset')); ?>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        
                        <div class="table-responsive">
                            <table class="table table-hover activity-log-table">
                                <thead class="table-light">
                                    <tr>
                                        <th><?php echo e(__('dashboard.description')); ?></th>
                                        <th><?php echo e(__('dashboard.subject')); ?></th>
                                        <th><?php echo e(__('dashboard.user')); ?></th>
                                        
                                        <th><?php echo e(__('dashboard.timestamp')); ?></th>
                                        <th><?php echo e(__('dashboard.details')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($activity->description); ?></td>
                                            <td>
                                                <?php if($activity->subject): ?>
                                                    <span
                                                        class="badge bg-light text-dark me-1"><?php echo e(class_basename($activity->subject_type)); ?></span>
                                                    
                                                    <span><?php echo e($activity->subject->title ?? ($activity->subject->name ?? '#' . $activity->subject_id)); ?></span>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($activity->causer?->name ?? 'System'); ?></td>
                                            
                                            <td>
                                                <span title="<?php echo e($activity->created_at->format('Y-m-d H:i:s')); ?>">
                                                    <?php echo e($activity->created_at->diffForHumans()); ?>

                                                </span>
                                            </td>
                                            <td>
                                                
                                                <?php if(
                                                    $activity->properties &&
                                                        $activity->properties->count() > 0 &&
                                                        $activity->properties->except(['attributes', 'old'])->count() > 0): ?>
                                                    <button class="btn btn-sm btn-outline-secondary btn-circle"
                                                        data-bs-toggle="modal" data-bs-target="#activityDetailsModal"
                                                        data-bs-properties='<?php echo e($activity->properties->toJson()); ?>'
                                                        title="<?php echo e(__('dashboard.view_details')); ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="5" class="text-center py-4">
                                                <?php echo e(__('dashboard.no_activities_found')); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        
                        <div class="mt-3 d-flex justify-content-center">
                            <?php echo e($activities->links()); ?>

                        </div>

                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 

    
    <div class="modal fade" id="activityDetailsModal" tabindex="-1" aria-labelledby="activityDetailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="activityDetailsModalLabel">
                        <?php echo e(__('dashboard.activity_details', ['fallback' => 'Activity Details'])); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="<?php echo e(__('dashboard.close')); ?>"></button>
                </div>
                <div class="modal-body">
                    
                    <pre><code></code></pre>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal"><?php echo e(__('dashboard.close')); ?></button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .icon-wrapper {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .filter-row .form-group.floating-label {
            position: relative;
            margin-bottom: 0;
            width: 100%;
        }

        .filter-row .form-group.floating-label .form-label {
            position: absolute;
            top: -10px;
            <?php echo e(app()->getLocale() == 'ar' ? 'right' : 'left'); ?>: 10px;
            /* Adjust for LTR/RTL */
            background: white;
            padding: 0 10px;
            font-size: 12px;
            color: var(--bs-primary);
            /* Changed color */
            font-weight: 600;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            border-radius: 15px;
            box-shadow: 0 1px 3px rgba(var(--bs-primary-rgb), 0.1);
            /* Changed color */
            pointer-events: none;
            height: 20px;
            line-height: 20px;
        }

        .filter-row .input-group {
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

        .filter-row .input-group:focus-within {
            border-color: var(--bs-primary);
            /* Changed color */
            box-shadow: 0 0 0 0.2rem rgba(var(--bs-primary-rgb), 0.15);
            /* Changed color */
        }

        .filter-row .form-control {
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

        .filter-row select.form-control {
            appearance: none;
            padding-right: 2.5rem;
            /* Ensure space for arrow */
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%236a11cb' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: <?php echo e(app()->getLocale() == 'ar' ? 'left' : 'right'); ?> 0.75rem center;
            background-size: 16px 12px;
            cursor: pointer;
        }

        .filter-buttons {
            display: flex;
            gap: 0.5rem;
            height: 45px;
            align-items: flex-end;
            width: 100%;
        }

        .filter-buttons .btn {
            flex: 1;
            height: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            text-transform: none;
            letter-spacing: normal;
            box-shadow: none;
        }

        .btn-apply {
            border: 2px solid var(--bs-primary);
            background: var(--bs-primary);
            color: white;
        }

        .btn-apply:hover {
            background: darken(var(--bs-primary), 10%);
            border-color: darken(var(--bs-primary), 10%);
        }

        .btn-reset {
            border: 2px solid #6c757d;
            background: #6c757d;
            color: white;
        }

        .btn-reset:hover {
            background: #5a6268;
            border-color: #545b62;
        }

        .activity-log-table td,
        .activity-log-table th {
            vertical-align: middle;
            font-size: 0.9rem;
        }

        .activity-log-table .badge {
            font-size: 0.8em;
            font-weight: 500;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            padding: 0;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }

        #activityDetailsModal .modal-body pre {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0.3rem;
            padding: 1rem;
            white-space: pre-wrap;
            /* Since CSS 2.1 */
            white-space: -moz-pre-wrap;
            /* Mozilla, since 1999 */
            white-space: -pre-wrap;
            /* Opera 4-6 */
            white-space: -o-pre-wrap;
            /* Opera 7 */
            word-wrap: break-word;
            /* Internet Explorer 5.5+ */
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ar.js"></script> 

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Flatpickr for date range
            flatpickr("#date_range", {
                mode: "range",
                dateFormat: "Y-m-d",
                locale: "<?php echo e(app()->getLocale()); ?>", // Use Laravel's current locale
                altInput: true,
                altFormat: "d/m/Y", // User-friendly format
                disableMobile: "true" // Optional: improve mobile usability
            });

            // Script for handling details modal
            const detailsModal = document.getElementById('activityDetailsModal');
            if (detailsModal) {
                detailsModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    const properties = JSON.parse(button.getAttribute('data-bs-properties') || '{}');
                    const modalBody = detailsModal.querySelector('.modal-body pre code');

                    // Clear previous content
                    modalBody.textContent = ''; // Clear text content

                    // Display properties (formatted JSON)
                    // We exclude 'attributes' and 'old' for cleaner view if they exist
                    const displayProperties = {};
                    for (const key in properties) {
                        if (key !== 'attributes' && key !== 'old') {
                            displayProperties[key] = properties[key];
                        }
                    }
                    modalBody.textContent = JSON.stringify(displayProperties, null, 2);

                    // Optional: Highlight syntax if using a library like Prism.js
                    // if (typeof Prism !== 'undefined') {
                    //     Prism.highlightElement(modalBody);
                    // }
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\My_laravel\laravel_2025_dashboard\0- template_dashboard\resources\views/admin/activity/index.blade.php ENDPATH**/ ?>