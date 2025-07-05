<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>الفئات</h1>
        <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-primary">إنشاء فئة</a>
        <table class="table">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>الوصف</th>
                    <th>الصورة</th>
                    <th>الحالة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($category->name); ?></td>
                        <td><?php echo e($category->description); ?></td>
                        <td><img src="<?php echo e(asset('images/' . $category->image)); ?>" alt="<?php echo e($category->name); ?>" width="100"></td>
                        <td><?php echo e($category->status); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.categories.show', $category->id)); ?>" class="btn btn-info">عرض</a>
                            <a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>" class="btn btn-primary">تعديل</a>
                            <a href="<?php echo e(route('admin.categories.destroy', $category->id)); ?>" class="btn btn-danger">حذف</a>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\My father Work\0- template_dashboard\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>