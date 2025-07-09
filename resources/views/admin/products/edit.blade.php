@extends('admin.layouts.master')

@section('content')
    <div class="container d-flex justify-content-center align-items-center mt-3" dir="rtl">
        <div class="card shadow rounded-4 w-100" style="max-width: 600px;">
            <div class="card-header bg-primary text-white text-center rounded-top-4">
                <h3 class="mb-0">{{ __('dashboard.edit_product') }}</h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.products.update', $product->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="name">{{ __('dashboard.name') }}</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required
                            placeholder="مثال: منتج جديد">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">{{ __('dashboard.description') }}</label>
                        <textarea name="description" class="form-control" rows="3" required placeholder="اكتب وصف المنتج هنا">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">{{ __('dashboard.product_image') }}</label>
                        <input type="file" name="image" class="form-control" id="imageInput">
                        <div class="mt-2">
                            <small class="text-muted">{{ __('dashboard.current_image') }}</small><br>
                            <img id="currentImage" src="{{ asset($product->image) }}" alt="صورة المنتج الحالية"
                                style="max-width: 120px; max-height: 120px; border-radius: 8px; border:1px solid #eee;">
                        </div>
                        <div class="mt-2" id="previewContainer" style="display:none;">
                            <small class="text-muted">{{ __('dashboard.new_image_preview') }}</small><br>
                            <img id="imagePreview" src="#" alt="معاينة الصورة الجديدة"
                                style="max-width: 120px; max-height: 120px; border-radius: 8px; border:1px solid #eee;">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="status">{{ __('dashboard.status') }}</label>
                        <select name="status" class="form-control" required>
                            <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>
                                {{ __('dashboard.active') }}</option>
                            <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>
                                {{ __('dashboard.inactive') }}</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="category_id">{{ __('dashboard.category') }}</label>
                        <select name="category_id" class="form-control" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap gap-2">
                        <button type="submit" class="btn btn-success px-4 mb-2">
                            <i class="fas fa-save"></i> {{ __('dashboard.update_product') }}
                        </button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary px-4 mb-2">
                            <i class="fas fa-arrow-right"></i> {{ __('dashboard.back') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                document.getElementById('previewContainer').style.display = 'block';
                document.getElementById('imagePreview').src = URL.createObjectURL(file);
            } else {
                document.getElementById('previewContainer').style.display = 'none';
                document.getElementById('imagePreview').src = '#';
            }
        });
    </script>
@endsection
