@extends('frontend.layouts.app')

@section('title', 'المعرض')

@section('content')
    <div class="site-section"  data-aos="fade">
      <div class="container-fluid">

        <div class="row justify-content-center">

          <div class="col-md-7">
            <div class="row mb-5">
              <div class="col-12 ">
                <h2 class="site-section-heading text-center">معرض الصور</h2>
              </div>
            </div>
          </div>

        </div>
        <div class="row" id="lightgallery">
          <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="images/big-images/nature_big_1.jpg" data-sub-html="<h4>ضوء خافت</h4><p>هذا نص تجريبي لوصف الصورة. يمكنك استبداله بوصف مناسب للصورة المعروضة.</p>">
            <a href="#"><img src="images/nature_small_1.jpg" alt="صورة" class="img-fluid"></a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="images/big-images/nature_big_2.jpg" data-sub-html="<h4>ضوء خافت</h4><p>هذا نص تجريبي لوصف الصورة. يمكنك استبداله بوصف مناسب للصورة المعروضة.</p>">
            <a href="#"><img src="images/nature_small_2.jpg" alt="صورة" class="img-fluid"></a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="images/big-images/nature_big_3.jpg" data-sub-html="<h4>ضوء خافت</h4><p>هذا نص تجريبي لوصف الصورة. يمكنك استبداله بوصف مناسب للصورة المعروضة.</p>">
            <a href="#"><img src="images/nature_small_3.jpg" alt="صورة" class="img-fluid"></a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="images/big-images/nature_big_3.jpg" data-sub-html="<h4>ضوء خافت</h4><p>هذا نص تجريبي لوصف الصورة. يمكنك استبداله بوصف مناسب للصورة المعروضة.</p>">
            <a href="#"><img src="images/nature_small_3.jpg" alt="صورة" class="img-fluid"></a>
          </div>


        </div>
      </div>
    </div>
@endsection
