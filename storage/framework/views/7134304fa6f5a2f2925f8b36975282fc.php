<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1><?php echo e(__('dashboard.category')); ?> <?php echo e(__('dashboard.details')); ?></h1>
        <div class="card" style="width: 24rem;">
            <img src="<?php echo e(asset('images/categories/' . $category->image)); ?>" class="card-img-top" alt="<?php echo e($category->name); ?>" style="max-width: 100%; height: auto;">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($category->name); ?></h5>
                <p class="card-text"><strong><?php echo e(__('dashboard.description')); ?>:</strong> <?php echo e($category->description); ?></p>
                <p class="card-text"><strong><?php echo e(__('dashboard.status')); ?>:</strong> <?php echo e($category->status); ?></p>
                <a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>" class="btn btn-primary"><?php echo e(__('dashboard.edit')); ?></a>
                <a href="<?php echo e(route('admin.categories.index')); ?>" class="btn btn-secondary"><?php echo e(__('dashboard.back')); ?></a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\Alqadsy\Blacksmith\resources\views/admin/categories/show.blade.php ENDPATH**/ ?>