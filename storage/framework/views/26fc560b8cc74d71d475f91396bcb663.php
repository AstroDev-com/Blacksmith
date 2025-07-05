<?php $__env->startSection('content'); ?>
    <div class="container" dir="rtl">
        <h1><?php echo e(__('dashboard.create_product')); ?></h1>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="<?php echo e(route('admin.products.store')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name"><?php echo e(__('dashboard.name')); ?></label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description"><?php echo e(__('dashboard.description')); ?></label>
                <input type="text" name="description" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image"><?php echo e(__('dashboard.product_image')); ?></label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status"><?php echo e(__('dashboard.status')); ?></label>
                <select name="status" class="form-control" required>
                    <option value="1"><?php echo e(__('dashboard.active')); ?></option>
                    <option value="0"><?php echo e(__('dashboard.inactive')); ?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="category_id"><?php echo e(__('dashboard.category')); ?></label>
                <select name="category_id" class="form-control" required>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo e(__('dashboard.create_product')); ?></button>
            <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-secondary"><?php echo e(__('dashboard.back')); ?></a>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\My father Work\0- template_dashboard\resources\views/admin/products/create.blade.php ENDPATH**/ ?>