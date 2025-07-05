@extends('admin.layouts.master')

@section('content')
    <div class="container" dir="rtl">
        <h1>{{ __('dashboard.create_product') }}</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ __('dashboard.name') }}</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">{{ __('dashboard.description') }}</label>
                <input type="text" name="description" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">{{ __('dashboard.product_image') }}</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status">{{ __('dashboard.status') }}</label>
                <select name="status" class="form-control" required>
                    <option value="1">{{ __('dashboard.active') }}</option>
                    <option value="0">{{ __('dashboard.inactive') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="category_id">{{ __('dashboard.category') }}</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('dashboard.create_product') }}</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">{{ __('dashboard.back') }}</a>
        </form>
    </div>
@endsection