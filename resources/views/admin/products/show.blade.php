@extends('admin.layouts.master')

@section('content')
    <div class="container" dir="rtl">
        <h1>{{ __('dashboard.products') }} {{ __('dashboard.details') }}</h1>
        <div class="card" style="width: 24rem;">
                        <img src="{{ asset( $product->image) }}" alt="{{ $product->name }}" width="100">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text"><strong>{{ __('dashboard.description') }}:</strong> {{ $product->description }}</p>
                <p class="card-text"><strong>{{ __('dashboard.status') }}:</strong> {{ $product->status == 1 ? __('dashboard.active') : __('dashboard.inactive') }}</p>
                <p class="card-text"><strong>{{ __('dashboard.category') }}:</strong> {{ $product->category->name }}</p>
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">{{ __('dashboard.edit') }}</a>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">{{ __('dashboard.back') }}</a>
            </div>
        </div>
    </div>
@endsection