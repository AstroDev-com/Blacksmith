<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>إنشاء فئة</h1>
    </div>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('admin.categories.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">الوصف</label>
            <input type="text" name="description" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">الصورة</label>
            <input type="file" name="image" class="form-control" >
        </div>
        <div class="form-group">
            <label for="status">الحالة</label>
            <select name="status" class="form-control" required>
                <option value="1">نشط</option>
                <option value="0">غير نشط</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">إنشاء</button>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\Alqadsy\Blacksmith\resources\views/admin/categories/create.blade.php ENDPATH**/ ?>