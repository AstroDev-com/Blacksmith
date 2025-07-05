<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>تعديل الفئة</h1>
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
    <form action="<?php echo e(route('admin.categories.update', $category->id)); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $category->name)); ?>" required>
        </div>
        <div class="form-group">
            <label for="description">الوصف</label>
            <input type="text" name="description" class="form-control" value="<?php echo e(old('description', $category->description)); ?>" required>
        </div>
        <div class="form-group">
            <label for="image">الصورة</label>
            <input type="file" name="image" class="form-control" >
            <?php if($category->image): ?>
                <img src="<?php echo e(asset('images/' . $category->image)); ?>" alt="الصورة الحالية" width="100">
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="status">الحالة</label>
            <select name="status" class="form-control" required>
                <option value="1" <?php echo e(old('status', $category->status) == 1 ? 'selected' : ''); ?>>نشط</option>
                <option value="0" <?php echo e(old('status', $category->status) == 0 ? 'selected' : ''); ?>>غير نشط</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\My father Work\0- template_dashboard\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>