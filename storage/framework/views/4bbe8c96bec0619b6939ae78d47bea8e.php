<!DOCTYPE html>
<html lang="en">
<head>
  <title>Photosen &mdash; Colorlib Website Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/fonts/icomoon/style.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/magnific-popup.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset("frontend/css/jquery-ui.css")); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.carousel.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.theme.default.min.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/lightgallery.min.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap-datepicker.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('frontend/fonts/flaticon/font/flaticon.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/swiper.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/aos.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">

</head>
<body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>




<?php echo $__env->make('frontend.layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>



    <div class="container-fluid" data-aos="fade" data-aos-delay="500">
     <?php echo $__env->yieldContent('content'); ?>
    </div>

<?php echo $__env->make('frontend.layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>





  </div>

  <script src="<?php echo e(asset('frontend/js/jquery-3.3.1.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery-migrate-3.0.1.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery-ui.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/popper.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/owl.carousel.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery.stellar.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery.countdown.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery.magnific-popup.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/bootstrap-datepicker.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/swiper.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/aos.js')); ?>"></script>

  <script src="<?php echo e(asset('frontend/js/picturefill.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/lightgallery-all.min.js')); ?>"></script>
  <script src="<?php echo e(asset('frontend/js/jquery.mousewheel.min.js')); ?>"></script>

  <script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>

  <script>
    $(document).ready(function(){
      $('#lightgallery').lightGallery();
    });
  </script>

</body>
</html><?php /**PATH D:\All My Project\My father Work\0- template_dashboard\resources\views/frontend/layouts/app.blade.php ENDPATH**/ ?>