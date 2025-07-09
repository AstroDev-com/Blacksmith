<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <h2 class="text-center mb-4">أحدث أعمالنا</h2>
        <p class="text-center text-muted mb-5">تصفح أحدث الأعمال المنجزة من قبل فريقنا.</p>
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
                    <div class="card shadow-sm border-0 w-100">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img src="<?php echo e($info->image ? asset($info->image) : asset('public/admin/assets/img/product_default.png')); ?>"
                                alt="Image" class="img-fluid w-100 h-100 object-fit-cover"
                                style="transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'"
                                onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title mb-2"><?php echo e($info->name); ?></h5>
                            <?php if(!empty($info->description)): ?>
                                <p class="card-text text-muted small"><?php echo e(Str::limit($info->description, 80)); ?></p>
                            <?php endif; ?>
                            <a href="<?php echo e(route('frontend.product.show', $info->id)); ?>"
                                class="btn btn-outline-primary btn-sm mt-2">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">لا توجد منتجات لعرضها حالياً.</div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\All My Project\Blacksmith\resources\views/frontend/gallery.blade.php ENDPATH**/ ?>