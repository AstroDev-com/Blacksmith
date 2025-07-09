@extends('admin.layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card shadow rounded-4">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="{{ $category->image ? asset($category->image) : asset('admin/assets/img/product_default.png') }}"
                                class="rounded-circle border shadow-sm" alt="{{ $category->name }}"
                                style="width: 120px; height: 120px; object-fit:cover;">
                        </div>
                        <h3 class="card-title mb-2">{{ $category->name }}</h3>
                        <p class="card-text mb-2"><strong><i class="fa fa-align-left me-1"></i> الوصف:</strong>
                            {{ $category->description }}</p>
                        <p class="card-text mb-3">
                            <strong><i class="fa fa-toggle-on me-1"></i> الحالة:</strong>
                            @if ($category->status == 1)
                                <span class="badge bg-success">نشط</span>
                            @else
                                <span class="badge bg-secondary">غير نشط</span>
                            @endif
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary">
                                <i class="fa fa-edit me-1"></i> تعديل
                            </a>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                                <i class="fa fa-arrow-right me-1"></i> عودة
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush
