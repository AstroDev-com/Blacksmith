<?php $__env->startSection('content'); ?>
    <div class="site-section" data-aos="fade">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="row mb-5">
                        <div class="col-12 text-center">
                            <h2 class="site-section-heading"><?php echo e($product->name); ?></h2>
                            <img src="<?php echo e(asset($product->image ?? 'admin/assets/img/product_default.png')); ?>"
                                alt="<?php echo e($product->name); ?>" class="img-fluid my-3" style="max-height:300px;">
                            <p><?php echo e($product->description); ?></p>
                            <p><strong>السعر:</strong> <?php echo e($product->price ?? '-'); ?></p>
                            <p><strong>التصنيف:</strong> <?php echo e($product->category->name ?? '-'); ?></p>
                            <p><strong>الحالة:</strong> <?php echo e($product->status == 1 ? 'متوفر' : 'غير متوفر'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Desktop\Blacksmith\resources\views/frontend/show.blade.php ENDPATH**/ ?>