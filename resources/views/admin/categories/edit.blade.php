@extends('admin.layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm rounded-4">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <i class="fa fa-edit me-2"></i>
                        <h4 class="mb-0">تعديل الفئة</h4>
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
                        <form action="{{ route('admin.categories.update', $category->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row align-items-center">
                                <label for="name" class="col-sm-2 col-form-label">الاسم <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" required
                                        value="{{ old('name', $category->name) }}">
                                </div>
                            </div>
                            <div class="mb-3 row align-items-center">
                                <label for="description" class="col-sm-2 col-form-label">الوصف <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="description" id="description" class="form-control" required
                                        value="{{ old('description', $category->description) }}">
                                </div>
                            </div>
                            <div class="mb-3 row align-items-center">
                                <label for="image" class="col-sm-2 col-form-label">الصورة</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" id="image" class="form-control mb-2">
                                    @if ($category->image)
                                        <div class="mt-2">
                                            <img src="{{ asset( $category->image) }}"
                                                alt="الصورة الحالية" width="90" class="rounded border">
                                            <span class="text-muted ms-2">الصورة الحالية</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row align-items-center">
                                <label for="status" class="col-sm-2 col-form-label">الحالة <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="status" id="status" class="form-select" required>
                                        <option value="1"
                                            {{ old('status', $category->status) == 1 ? 'selected' : '' }}>نشط</option>
                                        <option value="0"
                                            {{ old('status', $category->status) == 0 ? 'selected' : '' }}>غير نشط</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary me-2"> <i
                                        class="fa fa-arrow-right me-1"></i> عودة</a>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fa fa-save me-1"></i> تحديث
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush
