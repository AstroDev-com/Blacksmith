<?php $__env->startSection('content'); ?>
    <div class="site-section" data-aos="fade">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="row mb-5">
                        <div class="col-12 ">
                            <h2 class="site-section-heading text-center"><?php echo e($category->name); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade">
                        <div class="card mb-4">
                            <img src="<?php echo e(asset($product->image ? $product->image : 'admin/assets/img/product_default.png')); ?>"
                                class="card-img-top img-fluid" alt="<?php echo e($product->name); ?>">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo e($product->name); ?></h5>
                                <a href="<?php echo e(route('frontend.product.show', $product->id)); ?>"
                                    class="btn btn-outline-primary btn-sm">تفاصيل</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center">
                        <p>لا توجد منتجات في هذا التصنيف حالياً.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Desktop\Blacksmith\resources\views/frontend/category.blade.php ENDPATH**/ ?>