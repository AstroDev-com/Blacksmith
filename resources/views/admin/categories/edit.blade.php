@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1>تعديل الفئة</h1>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
        </div>
        <div class="form-group">
            <label for="description">الوصف</label>
            <input type="text" name="description" class="form-control" value="{{ old('description', $category->description) }}" required>
        </div>
        <div class="form-group">
            <label for="image">الصورة</label>
            <input type="file" name="image" class="form-control" >
            @if($category->image)
                <img src="{{ asset('images/' . $category->image) }}" alt="الصورة الحالية" width="100">
            @endif
        </div>
        <div class="form-group">
            <label for="status">الحالة</label>
            <select name="status" class="form-control" required>
                <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>نشط</option>
                <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>غير نشط</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
@endsection