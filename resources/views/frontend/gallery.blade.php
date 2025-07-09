@extends('frontend.layouts.app')
@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4">أحدث أعمالنا</h2>
        <p class="text-center text-muted mb-5">تصفح أحدث الأعمال المنجزة من قبل فريقنا.</p>
        <div class="row">
            @forelse ($products as $info)
                <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
                    <div class="card shadow-sm border-0 w-100">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img src="{{ $info->image ? asset($info->image) : asset('public/admin/assets/img/product_default.png') }}"
                                alt="Image" class="img-fluid w-100 h-100 object-fit-cover"
                                style="transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'"
                                onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title mb-2">{{ $info->name }}</h5>
                            @if (!empty($info->description))
                                <p class="card-text text-muted small">{{ Str::limit($info->description, 80) }}</p>
                            @endif
                            <a href="{{ route('frontend.product.show', $info->id) }}"
                                class="btn btn-outline-primary btn-sm mt-2">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">لا توجد منتجات لعرضها حالياً.</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
