@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1>{{ __('dashboard.category') }} {{ __('dashboard.details') }}</h1>
        <div class="card" style="width: 24rem;">
            <img src="{{ asset('images/' . $category->image) }}" class="card-img-top" alt="{{ $category->name }}" style="max-width: 100%; height: auto;">
            <div class="card-body">
                <h5 class="card-title">{{ $category->name }}</h5>
                <p class="card-text"><strong>{{ __('dashboard.description') }}:</strong> {{ $category->description }}</p>
                <p class="card-text"><strong>{{ __('dashboard.status') }}:</strong> {{ $category->status }}</p>
                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary">{{ __('dashboard.edit') }}</a>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">{{ __('dashboard.back') }}</a>
            </div>
        </div>
    </div>
@endsection