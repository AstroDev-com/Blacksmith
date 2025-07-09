@extends('admin.layouts.master')

@section('content')
    <div class="container d-flex justify-content-center align-items-center mt-4" dir="rtl">
        <div class="card shadow rounded-4 w-100" style="max-width: 420px;">
            <div class="card-header bg-primary text-white text-center rounded-top-4">
                <h4 class="mb-0">{{ __('dashboard.products') }} {{ __('dashboard.details') }}</h4>
            </div>
            <div class="card-body text-center">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="mb-3"
                    style="max-width: 160px; max-height: 160px; border-radius: 16px; border:1px solid #eee; box-shadow:0 2px 8px #0001;">
                <h5 class="card-title mb-3">{{ $product->name }}</h5>
                <ul class="list-group list-group-flush text-end mb-3">
                    <li class="list-group-item"><strong>{{ __('dashboard.description') }}:</strong>
                        {{ $product->description }}</li>
                    <li class="list-group-item">
                        <strong>{{ __('dashboard.status') }}:</strong>
                        @if ($product->status == 1)
                            <span class="badge bg-success">{{ __('dashboard.active') }}</span>
                        @else
                            <span class="badge bg-danger">{{ __('dashboard.inactive') }}</span>
                        @endif
                    </li>
                    <li class="list-group-item"><strong>{{ __('dashboard.category') }}:</strong>
                        {{ $product->category->name }}</li>
                </ul>
                <div class="d-flex justify-content-between gap-2">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning px-4">
                        <i class="fas fa-edit"></i> {{ __('dashboard.edit') }}
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary px-4">
                        <i class="fas fa-arrow-right"></i> {{ __('dashboard.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
