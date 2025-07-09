@extends('frontend.layouts.app')

@section('content')
    <div class="site-section" data-aos="fade">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="row mb-5">
                        <div class="col-12 ">
                            <h2 class="site-section-heading text-center">{{ $category->name }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade">
                        <div class="card mb-4">
                            <img src="{{ asset($product->image ? $product->image : 'admin/assets/img/product_default.png') }}"
                                class="card-img-top img-fluid" alt="{{ $product->name }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <a href="{{ route('frontend.product.show', $product->id) }}"
                                    class="btn btn-outline-primary btn-sm">تفاصيل</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>لا توجد منتجات في هذا التصنيف حالياً.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
