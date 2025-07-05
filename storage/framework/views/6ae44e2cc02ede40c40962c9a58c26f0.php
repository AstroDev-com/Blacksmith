<?php echo $__env->make('admin.includes.style', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<!DOCTYPE html>
<html dir="<?php echo e(app()->isLocale('ar') ? 'rtl' : 'ltr'); ?>" lang="<?php echo e(app()->getLocale()); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title', 'لوحة التحكم'); ?></title>

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <?php if(LaravelLocalization::getCurrentLocale() == 'ar'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('admin/css/rtl.css')); ?>">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('admin/css/ltr.css')); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('admin/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }

        /* Force hide vertical scrollbar for the entire page */
        body {
            // ... existing code ...
        }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
    <?php
        use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
        use Illuminate\Support\Facades\Auth;
        $isRTL = LaravelLocalization::getCurrentLocale() == 'ar';
        $unreadConversationsCountForLayout = 0;
        $unreadNotificationsCountForLayout = 0;
        $unreadNotificationsForLayout = collect();
        $currentUserForLayout = Auth::user();
        if ($currentUserForLayout) {
            try {
                $unreadNotificationsForLayout = $currentUserForLayout->unreadNotifications;
                $unreadNotificationsCountForLayout = $unreadNotificationsForLayout->count();
            } catch (\Exception $e) {
                logger('Error calculating notifications in layout', ['error' => $e->getMessage()]);
            }
            try {
                $unreadConversationsCountForLayout = $currentUserForLayout
                    ->conversations()
                    ->where(function ($query) {
                        $query
                            ->whereNull('conversation_participants.read_at')
                            ->orWhereColumn('conversations.updated_at', '>', 'conversation_participants.read_at');
                    })
                    ->count();
            } catch (\Exception $e) {
                logger('Error calculating unread convos in layout', ['error' => $e->getMessage()]);
                $unreadConversationsCountForLayout = 0;
            }
        }
    ?>

    <?php echo $__env->make('admin.includes.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Header -->
    <?php echo $__env->make('admin.includes.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Main Content -->

    <main class="main-content">
        <?php echo $__env->make('admin.includes.alerts.success', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('admin.includes.alerts.error', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/ar.js"></script>
    <script>
        // Set Moment.js locale based on app locale
        moment.locale('<?php echo e(app()->getLocale()); ?>');
    </script>
    <?php echo $__env->make('admin.includes.scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <script src="<?php echo e(asset('admin/select2/js/select2.full.min.js')); ?>"></script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\My_laravel\‏‏‏‏laravel_2025_clinic\resources\views/admin/layouts/master.blade.php ENDPATH**/ ?>