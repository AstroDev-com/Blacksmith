@extends('admin.layouts.master')

@section('content')
    <div class="container" dir="rtl">
        <h1>{{ __('dashboard.edit_product') }}</h1>
        <form action="{{ route('admin.products.update', $produst->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">{{ __('dashboard.name') }}</label>
                <input type="text" name="name" class="form-control" value="{{ $produst->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">{{ __('dashboard.description') }}</label>
                <input type="text" name="description" class="form-control" value="{{ $produst->description }}" required>
            </div>
            <div class="form-group">
                <label for="image">{{ __('dashboard.product_image') }}</label>
                <input type="file" name="image" class="form-control" value="{{ $produst->image }}">
            </div>
            <div class="form-group">
                <label for="status">{{ __('dashboard.status') }}</label>
                <select name="status" class="form-control" required>
                    <option value="1" {{ $produst->status == 1 ? 'selected' : '' }}>{{ __('dashboard.active') }}</option>
                    <option value="0" {{ $produst->status == 0 ? 'selected' : '' }}>{{ __('dashboard.inactive') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="category_id">{{ __('dashboard.category') }}</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $produst->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('dashboard.update_product') }}</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">{{ __('dashboard.back') }}</a>
        </form>
    </div>
@endsection