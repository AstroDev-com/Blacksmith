@extends('frontend.layouts.app')

@section('content')
    <div class="site-section" data-aos="fade">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="row mb-5">
                        <div class="col-12 text-center">
                            <h2 class="site-section-heading">{{ $product->name }}</h2>
                            <img src="{{ asset($product->image ?? 'admin/assets/img/product_default.png') }}"
                                alt="{{ $product->name }}" class="img-fluid my-3" style="max-height:300px;">
                            <p>{{ $product->description }}</p>
                            <p><strong>السعر:</strong> {{ $product->price ?? '-' }}</p>
                            <p><strong>التصنيف:</strong> {{ $product->category->name ?? '-' }}</p>
                            <p><strong>الحالة:</strong> {{ $product->status == 1 ? 'متوفر' : 'غير متوفر' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
