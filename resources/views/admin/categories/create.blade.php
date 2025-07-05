@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1>إنشاء فئة</h1>
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
    <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">الوصف</label>
            <input type="text" name="description" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">الصورة</label>
            <input type="file" name="image" class="form-control" >
        </div>
        <div class="form-group">
            <label for="status">الحالة</label>
            <select name="status" class="form-control" required>
                <option value="1">نشط</option>
                <option value="0">غير نشط</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">إنشاء</button>
    </form>

@endsection