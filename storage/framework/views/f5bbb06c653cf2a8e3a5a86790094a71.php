<style>
    .notification-btn .notification-badge {
        top: -5px;
        font-size: 0.7em;
        padding: 0.2em 0.45em;
        line-height: 1;
    }

    html:not([dir='rtl']) .notification-btn .notification-badge {
        right: -5px;
    }

    html[dir='rtl'] .notification-btn .notification-badge {
        left: -5px;
        right: auto;
    }
</style>

<header class="main-header no-print">
    <div class="header-right">
        <button class="sidebar-toggle" id="sidebarToggle" title="<?php echo e(__('dashboard.toggle_menu')); ?>">
            <i class="fas fa-bars"></i>
        </button>
        <div class="search-box">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="<?php echo e(__('dashboard.search')); ?>">
                <button class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="header-left">
        <!-- Language Switcher -->
        <div class="language-switcher">
            <a href="<?php echo e(LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale() == 'ar' ? 'en' : 'ar')); ?>"
                class="btn btn-link">
                <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?>
                    <i class="flag-icon flag-icon-ye"></i>
                    <span class="current-lang"><?php echo e(__('dashboard.arabic')); ?></span>
                <?php else: ?>
                    <i class="flag-icon flag-icon-gb"></i>
                    <span class="current-lang"><?php echo e(__('dashboard.english')); ?></span>
                <?php endif; ?>
            </a>
        </div>

        <!-- Conversations Link/Icon -->
        <a href="<?php echo e(route('conversations.index')); ?>"
            class="text-decoration-none btn btn-link notification-btn position-relative me-2"
            title="<?php echo e(__('dashboard.conversations')); ?>">
            <i class="fas fa-comments"></i>
            <?php if($unreadConversationsCountForLayout > 0): ?>
                <span class="notification-badge position-absolute badge rounded-pill bg-success">
                    <?php echo e($unreadConversationsCountForLayout); ?>

                    <span class="visually-hidden">unread conversations</span>
                </span>
            <?php endif; ?>
        </a>

        <!-- Notifications Dropdown -->
        <div class="dropdown notification-dropdown">
            <button class="btn btn-link notification-btn position-relative" type="button" id="notificationDropdown"
                data-bs-toggle="dropdown" aria-expanded="false" title="<?php echo e(__('dashboard.notifications')); ?>">
                <i class="fas fa-bell"></i>
                <?php if($unreadNotificationsCountForLayout > 0): ?>
                    <span class="notification-badge position-absolute badge rounded-pill bg-danger">
                        <?php echo e($unreadNotificationsCountForLayout); ?>

                        <span class="visually-hidden">unread messages</span>
                    </span>
                <?php endif; ?>
            </button>
            <ul class="dropdown-menu <?php echo e($isRTL ? 'dropdown-menu-start' : 'dropdown-menu-end'); ?> shadow border-0 mt-2"
                aria-labelledby="notificationDropdown" style="min-width: 320px; max-height: 450px; overflow-y: auto;">
                <li class="dropdown-header d-flex justify-content-between align-items-center px-3 py-2 bg-light">
                    <span class="fw-bold"><?php echo e(__('dashboard.notifications')); ?>

                        (<?php echo e($unreadNotificationsCountForLayout); ?>)</span>
                </li>
                <li>
                    <hr class="dropdown-divider my-0">
                </li>

                <?php $__empty_1 = true; $__currentLoopData = $unreadNotificationsForLayout->take(7); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li>
                        <a class="dropdown-item d-flex align-items-start px-3 py-2 notification-item <?php echo e($notification->read_at ? 'read' : 'unread'); ?>"
                            href="<?php echo e(route('notifications.markAsRead', ['notification' => $notification->id, 'redirect_url' => $notification->data['url'] ?? url()->current()])); ?>">
                            <div class="<?php echo e($isRTL ? 'ms-3' : 'me-3'); ?> pt-1 fs-5 text-center" style="width: 25px;">
                                <i class="<?php echo e($notification->data['icon'] ?? 'fas fa-info-circle'); ?>"></i>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-0 small text-wrap"><?php echo $notification->data['message'] ?? __('dashboard.new_notification'); ?></p>
                                <small
                                    class="text-muted d-block"><?php echo e($notification->created_at->diffForHumans()); ?></small>
                            </div>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <li>
                        <p class="text-center text-muted small my-4 px-3"><?php echo e(__('dashboard.no_unread_notifications')); ?>

                        </p>
                    </li>
                <?php endif; ?>

                <?php if($unreadNotificationsCountForLayout > 0): ?>
                    <li>
                        <hr class="dropdown-divider my-0">
                    </li>
                <?php endif; ?>
                <li>
                    <a class="dropdown-item text-center small py-2 bg-light" href="<?php echo e(route('notifications.index')); ?>">
                        <?php echo e(__('dashboard.view_all_notifications')); ?>

                    </a>
                </li>
            </ul>
        </div>

        <div class="dropdown">
            <div class="user-menu" data-bs-toggle="dropdown">
                <?php if(Auth::check()): ?>
                    <img src="<?php echo e(asset('admin/logo.png')); ?>" alt="User" class="user-avatar">
                    <div class="d-none d-md-block">
                        <div class="fw-bold"><?php echo e(Auth::user()->name); ?></div>
                        <div class="small text-muted">
                            <?php echo e(Auth::user()->roles->first()->name ?? __('dashboard.no_role')); ?></div>
                    </div>
                    <i class="fas fa-chevron-down <?php echo e($isRTL ? 'me-2' : 'ms-2'); ?>"></i>
                <?php endif; ?>
            </div>
            <?php if(Auth::check()): ?>
                <ul class="dropdown-menu <?php echo e($isRTL ? 'dropdown-menu-start' : 'dropdown-menu-end'); ?>">
                    <?php if($isRTL): ?>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('user.profile.edit')); ?>">
                                <span class="text-start flex-grow-1"><?php echo e(__('dashboard.profile')); ?></span>
                                <i class="fas fa-user ms-2"></i>
                            </a>
                        </li>
                        <?php if(Auth::user()->hasRole('super-admin')): ?>
                            <li>
                                <a class="dropdown-item d-flex align-items-center"
                                    href="<?php echo e(route('settings.index')); ?>">
                                    <span class="text-start flex-grow-1"><?php echo e(__('dashboard.settings')); ?></span>
                                    <i class="fas fa-cog ms-2"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item text-danger d-flex align-items-center" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="text-start flex-grow-1"><?php echo e(__('dashboard.logout')); ?></span>
                                <i class="fas fa-sign-out-alt ms-2"></i>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                    style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('user.profile.edit')); ?>">
                                <i class="fas fa-user me-2"></i>
                                <span><?php echo e(__('dashboard.profile')); ?></span>
                            </a>
                        </li>
                        <?php if(Auth::user()->hasRole('super-admin')): ?>
                            <li>
                                <a class="dropdown-item d-flex align-items-center"
                                    href="<?php echo e(route('settings.index')); ?>">
                                    <i class="fas fa-cog me-2"></i>
                                    <span><?php echo e(__('dashboard.settings')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item text-danger d-flex align-items-center" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i>
                                <span><?php echo e(__('dashboard.logout')); ?></span>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                    style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</header>
<!-- إضافة overlay للشاشات الصغيرة -->
<div class="mobile-overlay" id="mobileOverlay"></div>
<?php /**PATH C:\xampp\htdocs\My_laravel\‏‏‏‏laravel_2025_clinic\resources\views/admin/includes/header.blade.php ENDPATH**/ ?>