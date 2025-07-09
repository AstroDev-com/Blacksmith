<?php $__env->startSection('content'); ?>
    <div class="row">

        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4">
                <div class="image-wrap-2">
                    <div class="image-info">
                        <h2 class="mb-3"><?php echo e($info->name); ?></h2>
                        <a href="<?php echo e(route('frontend.category.products', $info->id)); ?>">عرض المزيد</a>
                    </div>
                    <img src="<?php echo e(asset($info->image)); ?>" alt="Image" class="img-fluid">
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Desktop\Blacksmith\resources\views/frontend/home.blade.php ENDPATH**/ ?>