<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1><?php echo e(__('dashboard.products')); ?></h1>
        <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary"><?php echo e(__('dashboard.create_product')); ?></a>
        <table class="table">
            <thead>
                <tr>
                    <th><?php echo e(__('dashboard.name')); ?></th>
                    <th><?php echo e(__('dashboard.description')); ?></th>
                    <th><?php echo e(__('dashboard.image')); ?></th>
                    <th><?php echo e(__('dashboard.status')); ?></th>
                    <th><?php echo e(__('dashboard.category')); ?></th>
                    <th><?php echo e(__('dashboard.actions')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($product->name); ?></td>
                        <td><?php echo e($product->description); ?></td>
                        <td><img src="<?php echo e(asset( $product->image)); ?>" alt="<?php echo e($product->name); ?>" width="100"></td>
                        <td><?php echo e($product->status); ?></td>
                        <td><?php echo e($product->category->name); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.products.show', $product->id)); ?>" class="btn btn-info"><?php echo e(__('dashboard.view')); ?></a>
                            <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="btn btn-primary"><?php echo e(__('dashboard.edit')); ?></a>
                            <a href="<?php echo e(route('admin.products.delete', $product->id)); ?>" class="btn btn-danger"><?php echo e(__('dashboard.delete')); ?></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\GitHub_Project\Alqadsy\Blacksmith\resources\views/admin/products/index.blade.php ENDPATH**/ ?>