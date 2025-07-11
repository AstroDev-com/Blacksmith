@extends('frontend.layouts.app')

@section('content')
    <div class="site-section" data-aos="fade">
        <div class="container-fluid">
            <div class="row" id="lightgallery">
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade">
                    <a href="{{ asset($product->image ?? 'admin/assets/img/product_default.png') }}" class="image-popup">
                        <img src="{{ asset($product->image ?? 'admin/assets/img/product_default.png') }}" alt="{{ $product->name }}" class="img-fluid my-3" style="max-height:300px;">
                    </a>
                    <div class="text-center">
                        <h4 class="site-section-heading">{{ $product->name }}</h4>
                        <p>{{ $product->description }}</p>
                        <p><strong>التصنيف:</strong> {{ $product->category->name ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



