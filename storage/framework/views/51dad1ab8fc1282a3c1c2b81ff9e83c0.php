<?php $__env->startSection('content'); ?>
    <div class="container" dir="rtl">
        <h1><?php echo e(__('dashboard.products')); ?> <?php echo e(__('dashboard.details')); ?></h1>
        <div class="card" style="width: 24rem;">
                        <img src="<?php echo e(asset( $product->image)); ?>" alt="<?php echo e($product->name); ?>" width="100">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($product->name); ?></h5>
                <p class="card-text"><strong><?php echo e(__('dashboard.description')); ?>:</strong> <?php echo e($product->description); ?></p>
                <p class="card-text"><strong><?php echo e(__('dashboard.status')); ?>:</strong> <?php echo e($product->status == 1 ? __('dashboard.active') : __('dashboard.inactive')); ?></p>
                <p class="card-text"><strong><?php echo e(__('dashboard.category')); ?>:</strong> <?php echo e($product->category->name); ?></p>
                <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="btn btn-primary"><?php echo e(__('dashboard.edit')); ?></a>
                <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-secondary"><?php echo e(__('dashboard.back')); ?></a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\My father Work\0- template_dashboard\resources\views/admin/products/show.blade.php ENDPATH**/ ?>