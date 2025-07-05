<?php $__env->startSection('title', __('dashboard.trips_list')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card categories-list-card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper bg-primary">
                                <i class="fas fa-plane-departure text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h3 class="card-title mb-0"><?php echo e(__('dashboard.trips_management')); ?></h3>
                                <p class="text-muted mb-0"><?php echo e(__('dashboard.manage_your_trips')); ?></p>
                            </div>
                        </div>
                        <a href="<?php echo e(route('admin.trips.create')); ?>" class="btn btn-primary add-category-btn">
                            <i class="fas fa-plus me-2"></i>
                            <span><?php echo e(__('dashboard.add_trip')); ?></span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="filter-row mb-4">
                            <div class="row g-3 mb-3">
                                <div class="col-md-4 col-lg-5">
                                    <div class="form-group floating-label mb-0">
                                        <label for="tripSearchInput" class="form-label">
                                            <i class="fas fa-search"></i> <?php echo e(__('dashboard.search')); ?>

                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="tripSearchInput"
                                                value="<?php echo e(request('search')); ?>"
                                                placeholder="<?php echo e(__('dashboard.search_in_title_location')); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <div class="form-group floating-label mb-0">
                                        <label for="typeFilter" class="form-label">
                                            <i class="fas fa-filter"></i> <?php echo e(__('dashboard.type')); ?>

                                        </label>
                                        <div class="input-group">
                                            <select class="form-control" id="typeFilter">
                                                <option value=""><?php echo e(__('dashboard.all_types')); ?></option>
                                                <option value="business"
                                                    <?php echo e(request('type') == 'business' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('dashboard.business')); ?></option>
                                                <option value="leisure"
                                                    <?php echo e(request('type') == 'leisure' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('dashboard.leisure')); ?></option>
                                                <option value="medical"
                                                    <?php echo e(request('type') == 'medical' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('dashboard.medical')); ?></option>
                                                <option value="other" <?php echo e(request('type') == 'other' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('dashboard.other')); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group floating-label mb-0">
                                        <label for="sortBy" class="form-label">
                                            <i class="fas fa-sort"></i> <?php echo e(__('dashboard.sort_by')); ?>

                                        </label>
                                        <div class="input-group">
                                            <select class="form-control" id="sortBy">
                                                <option value="start_date_desc"
                                                    <?php echo e(request('sort', 'start_date_desc') == 'start_date_desc' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('dashboard.sort_by_start_date_desc')); ?></option>
                                                <option value="start_date_asc"
                                                    <?php echo e(request('sort') == 'start_date_asc' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('dashboard.sort_by_start_date_asc')); ?></option>
                                                <option value="end_date_desc"
                                                    <?php echo e(request('sort') == 'end_date_desc' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('dashboard.sort_by_end_date_desc')); ?></option>
                                                <option value="end_date_asc"
                                                    <?php echo e(request('sort') == 'end_date_asc' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('dashboard.sort_by_end_date_asc')); ?></option>
                                                <option value="title_asc"
                                                    <?php echo e(request('sort') == 'title_asc' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('dashboard.sort_by_title_asc')); ?></option>
                                                <option value="title_desc"
                                                    <?php echo e(request('sort') == 'title_desc' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('dashboard.sort_by_title_desc')); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3 align-items-end">
                                <div class="col-md-3 col-lg-3">
                                    <div class="form-group floating-label mb-0">
                                        <label for="startDate" class="form-label">
                                            <i class="fas fa-calendar-alt"></i> <?php echo e(__('dashboard.start_date')); ?>

                                        </label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" id="startDate"
                                                value="<?php echo e(request('start_date')); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3">
                                    <div class="form-group floating-label mb-0">
                                        <label for="endDate" class="form-label">
                                            <i class="fas fa-calendar-alt"></i> <?php echo e(__('dashboard.end_date')); ?>

                                        </label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" id="endDate"
                                                value="<?php echo e(request('end_date')); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <div class="filter-buttons">
                                        <button type="button" class="btn btn-secondary btn-apply" id="applyFilters">
                                            <i class="fas fa-check me-1"></i> <?php echo e(__('dashboard.apply_filters')); ?>

                                        </button>
                                        <button type="button" class="btn btn-secondary btn-reset" id="resetFilters">
                                            <i class="fas fa-redo me-1"></i> <?php echo e(__('dashboard.reset')); ?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover categories-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center"><i
                                                class="fas fa-heading me-1"></i><?php echo e(__('dashboard.title')); ?></th>
                                        <th class="text-center"><i
                                                class="fas fa-map-marker-alt me-1"></i><?php echo e(__('dashboard.location')); ?></th>
                                        <th class="text-center"><i
                                                class="fas fa-info-circle me-1"></i><?php echo e(__('dashboard.type')); ?></th>
                                        <th class="text-center"><i
                                                class="fas fa-calendar-check me-1"></i><?php echo e(__('dashboard.start_date')); ?>

                                        </th>
                                        <th class="text-center"><i
                                                class="fas fa-calendar-times me-1"></i><?php echo e(__('dashboard.end_date')); ?></th>
                                        <th class="text-center"><i
                                                class="fas fa-align-left me-1"></i><?php echo e(__('dashboard.description')); ?></th>
                                        <th class="text-center"><i
                                                class="fas fa-cogs me-1"></i><?php echo e(__('dashboard.actions')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $trip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr class="category-row">
                                            <td class="align-middle text-center"><?php echo e($index + $trips->firstItem()); ?></td>
                                            <td class="align-middle fw-bold"><?php echo e($trip->title); ?></td>
                                            <td class="align-middle text-center"><?php echo e($trip->location ?? '-'); ?></td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="badge bg-secondary"><?php echo e(__('dashboard.' . $trip->type)); ?></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <small><?php echo e($trip->start_date ? $trip->start_date->format('Y-m-d') : '--'); ?></small>
                                                <div class="text-muted" style="font-size: 0.8em;">
                                                    <?php echo e($trip->start_date ? $trip->start_date->diffForHumans() : ''); ?></div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <small><?php echo e($trip->end_date ? $trip->end_date->format('Y-m-d') : '--'); ?></small>
                                                <?php if($trip->end_date): ?>
                                                    <div class="text-muted" style="font-size: 0.8em;">
                                                        <?php echo e($trip->end_date->diffForHumans()); ?></div>
                                                <?php endif; ?>
                                            </td>
                                            <td class="align-middle">
                                                <div class="category-description">
                                                    <?php echo e(Str::limit($trip->description, 50)); ?>

                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="btn-group actions-group">
                                                    <a href="<?php echo e(route('admin.trips.show', $trip)); ?>"
                                                        class="btn-action btn-view text-decoration-none"
                                                        title="<?php echo e(__('dashboard.view')); ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo e(route('admin.trips.edit', $trip)); ?>"
                                                        class="btn-action btn-edit text-decoration-none"
                                                        title="<?php echo e(__('dashboard.edit')); ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="<?php echo e(route('admin.trips.destroy', $trip)); ?>"
                                                        method="POST" class="d-inline delete-form">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="button"
                                                            class="btn-action btn-delete delete-btn text-decoration-none"
                                                            title="<?php echo e(__('dashboard.delete')); ?>">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="8" class="text-center py-5">
                                                <div class="empty-state">
                                                    <i class="fas fa-plane-slash fa-3x text-purple mb-3"></i>
                                                    <h4 class="text-purple"><?php echo e(__('dashboard.no_trips_found')); ?></h4>
                                                    <p class="text-muted">
                                                        <?php echo e(__('dashboard.add_new_trip_to_get_started')); ?></p>
                                                    <a href="<?php echo e(route('admin.trips.create')); ?>"
                                                        class="btn btn-primary mt-3 add-category-btn">
                                                        <i class="fas fa-plus me-2"></i> <?php echo e(__('dashboard.add_trip')); ?>

                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php if($trips->hasPages()): ?>
                            <?php echo e($trips->appends(request()->query())->links()); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .categories-list-card {
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
            background: linear-gradient(145deg, #ffffff, #f8f9fc);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            position: relative;
        }

        .categories-list-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 0.5rem;
            background: linear-gradient(90deg, #6a11cb, #2575fc, #6a11cb);
            background-size: 200% 100%;
            animation: gradient 3s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .add-category-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: white;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: none;
            border-radius: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            z-index: 1;
            box-shadow: 0 0.5rem 1rem rgba(106, 17, 203, 0.3);
        }

        .add-category-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.75rem 1.5rem rgba(106, 17, 203, 0.4);
        }

        .add-category-btn i {
            font-size: 1rem;
            transition: transform 0.3s ease;
        }

        .add-category-btn:hover i {
            transform: rotate(90deg);
        }

        .categories-table {
            width: 100%;
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0 0;
        }

        .categories-table thead th {
            background: linear-gradient(135deg, #f8f9fc, #ffffff);
            color: #6a11cb;
            font-weight: 600;
            padding: 0.75rem 0.5rem;
            border: none;
            text-align: center;
            position: relative;
            line-height: 1.1;
        }

        .categories-table thead th::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50%;
            height: 2px;
            background: linear-gradient(90deg, #6a11cb, #2575fc);
            border-radius: 1px;
        }

        .categories-table tbody tr {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            line-height: 1.1;
        }

        .categories-table tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }

        .categories-table tbody td {
            padding: 0.2rem 0.5rem;
            border: none;
            vertical-align: middle;
            line-height: 1.1;
            font-size: 0.9rem;
        }

        .icon-wrapper {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
        }

        .icon-wrapper.bg-primary {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
        }

        .icon-wrapper i {
            color: white;
        }

        .badge.bg-secondary {
            background-color: #6c757d !important;
        }

        .actions-group {
            display: flex;
            gap: 0.5rem;
            justify-content: center;
        }

        .btn-action {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            border: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            font-size: 0.8rem;
            line-height: 1;
            cursor: pointer;
        }

        .btn-action::before {
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

        .btn-action:hover::before {
            transform: translateX(0);
        }

        .btn-view {
            background: linear-gradient(135deg, #17a2b8, #117a8b);
        }

        .btn-edit {
            background: linear-gradient(135deg, #ffc107, #e0a800);
        }

        .btn-delete {
            background: linear-gradient(135deg, #dc3545, #c82333);
        }

        .btn-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.2);
        }

        .empty-state {
            padding: 3rem;
            text-align: center;
        }

        .empty-state i.text-purple {
            color: var(--primary-color, #6a11cb) !important;
        }

        .empty-state h4.text-purple {
            color: var(--primary-color, #6a11cb) !important;
            margin-bottom: 0.5rem;
        }

        .empty-state .text-muted {
            margin-bottom: 1rem;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin: 1rem 0 0 0;
            padding: 0;
        }

        .pagination .page-item .page-link {
            border: none;
            border-radius: 1rem;
            padding: 0.5rem 1rem;
            color: #6a11cb;
            background: transparent;
            transition: all 0.3s ease;
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            box-shadow: 0 0.25rem 0.5rem rgba(106, 17, 203, 0.2);
        }

        .pagination .page-item:not(.active) .page-link:hover {
            background: linear-gradient(135deg, #e0cffc, #d0e1fd);
            color: #6a11cb;
            transform: translateY(-2px);
        }

        .pagination .page-item.disabled .page-link {
            color: #adb5bd;
            background: transparent;
            cursor: not-allowed;
        }

        .category-description {
            font-size: 0.85rem;
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .card-header {
                padding: 1rem;
                flex-direction: column;
                gap: 1rem;
                align-items: stretch !important;
            }

            .add-category-btn {
                width: 100%;
            }

            .categories-table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            .categories-table thead th,
            .categories-table tbody td {
                white-space: normal;
            }

            .btn-action {
                width: 30px;
                height: 30px;
                font-size: 0.8rem;
            }
        }

        .filter-row {
            margin-bottom: 1.5rem;
            align-items: end;
            justify-content: space-evenly;
            gap: 1rem;
        }

        .filter-row .form-group.floating-label {
            position: relative;
            margin-bottom: 0;
            width: 100%;
        }

        .filter-row .form-group.floating-label .form-label {
            position: absolute;
            top: -10px;
            right: 10px;
            background: white;
            padding: 0 10px;
            font-size: 12px;
            color: #6a11cb;
            font-weight: 600;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            border-radius: 15px;
            box-shadow: 0 1px 3px rgba(106, 17, 203, 0.1);
            pointer-events: none;
            height: 20px;
            line-height: 20px;
        }

        .filter-row .form-group.floating-label .form-label i {
            font-size: 12px;
            color: #6a11cb;
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
            border-color: #6a11cb;
            box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.15);
        }

        .filter-row .form-group.floating-label .form-control {
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

        .filter-row .form-control:focus {
            box-shadow: none;
            background: transparent;
        }

        .filter-row select.form-control {
            appearance: none;
            padding-right: 2.5rem;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%236a11cb' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
            cursor: pointer;
        }

        .filter-row .form-group.floating-label:hover .input-group {
            border-color: #8b4cde;
        }

        .filter-row .form-group.floating-label:hover .form-label {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(106, 17, 203, 0.2);
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
            border: 2px solid #e3e6f0;
            background: #f8f9fc;
            color: #6a11cb;
            box-shadow: none;
        }

        .filter-buttons .btn:hover {
            transform: translateY(-2px);
            background: #e9ecef;
            border-color: #dee2e6;
            color: #5e13bf;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
        }

        .filter-buttons .btn-reset {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .filter-buttons .btn-apply {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        @media print {
            body * {
                visibility: hidden;
                background: transparent !important;
                color: #000 !important;
                box-shadow: none !important;
                text-shadow: none !important;
            }

            .container-fluid,
            .container-fluid *,
            .categories-list-card,
            .categories-list-card *,
            .table-responsive,
            .table-responsive * {
                visibility: visible;
            }

            .categories-list-card {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                border: none !important;
                box-shadow: none !important;
                margin: 0;
                padding: 0;
            }

            .navbar,
            .sidebar,
            .card-header .d-flex.align-items-center>div:not(:last-child),
            .card-header .add-category-btn,
            .filter-row,
            .actions-group,
            .delete-form button,
            .card-footer,
            .pagination,
            .floating-label,
            tfoot tr:not(.totals-row),
            .btn-action,
            .main-header,
            .main-sidebar,
            footer,
            .categories-list-card::before {
                display: none !important;
                visibility: hidden !important;
            }

            .table-responsive {
                overflow: visible !important;
            }

            .categories-table {
                width: 100%;
                border-collapse: collapse !important;
                margin: 0 !important;
                font-size: 10pt !important;
            }

            .categories-table thead th,
            .categories-table tbody td,
            .categories-table tfoot td {
                border: 1px solid #ddd !important;
                padding: 4px 6px !important;
                background: #fff !important;
                color: #000 !important;
                line-height: 1.2 !important;
            }

            .categories-table thead th {
                background: #eee !important;
                font-weight: bold;
            }

            .categories-table tbody tr {
                page-break-inside: avoid;
            }

            .badge {
                border: 1px solid #ccc !important;
                padding: 2px 4px !important;
                border-radius: 0 !important;
                background: transparent !important;
                font-weight: normal !important;
                font-size: 9pt !important;
            }

            .badge i {
                display: none;
            }

            .category-description {
                white-space: normal !important;
                max-width: 200px;
                word-wrap: break-word;
            }

            a[href]:after {
                content: none !important;
            }
        }

        .swal2-popup-responsive {
            width: auto !important;
            max-width: 90%;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('form');
                    Swal.fire({
                        title: '<?php echo e(__('dashboard.are_you_sure')); ?>',
                        text: '<?php echo e(__('dashboard.delete_confirmation_message_trip')); ?>',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: '<?php echo e(__('dashboard.yes_delete')); ?>',
                        cancelButtonText: '<?php echo e(__('dashboard.cancel')); ?>',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            const searchInput = document.getElementById('tripSearchInput');
            const typeSelect = document.getElementById('typeFilter');
            const sortSelect = document.getElementById('sortBy');
            const startDateInput = document.getElementById('startDate');
            const endDateInput = document.getElementById('endDate');
            const applyFiltersBtn = document.getElementById('applyFilters');
            const resetFiltersBtn = document.getElementById('resetFilters');
            const currentPath = "<?php echo e(route('admin.trips.index')); ?>";

            function updateFilters() {
                const url = new URL(currentPath);

                if (searchInput.value.trim()) {
                    url.searchParams.set('search', searchInput.value.trim());
                }
                if (typeSelect.value) {
                    url.searchParams.set('type', typeSelect.value);
                }
                if (sortSelect.value) {
                    url.searchParams.set('sort', sortSelect.value);
                } else {
                    url.searchParams.set('sort', 'start_date_desc');
                }
                if (startDateInput.value) {
                    url.searchParams.set('start_date', startDateInput.value);
                }
                if (endDateInput.value) {
                    url.searchParams.set('end_date', endDateInput.value);
                }

                window.location.href = url.toString();
            }

            function resetFilters() {
                searchInput.value = '';
                typeSelect.value = '';
                sortSelect.value = 'start_date_desc';
                startDateInput.value = '';
                endDateInput.value = '';
                window.location.href = currentPath;
            }

            let searchTimeout;
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(updateFilters, 500);
                });
            }

            if (typeSelect) typeSelect.addEventListener('change', updateFilters);
            if (sortSelect) sortSelect.addEventListener('change', updateFilters);
            if (startDateInput) startDateInput.addEventListener('change', updateFilters);
            if (endDateInput) endDateInput.addEventListener('change', updateFilters);

            if (applyFiltersBtn) applyFiltersBtn.addEventListener('click', updateFilters);

            if (resetFiltersBtn) resetFiltersBtn.addEventListener('click', resetFilters);

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\My_laravel\‏‏laravel_2025_trips\resources\views/admin/trips/index.blade.php ENDPATH**/ ?>