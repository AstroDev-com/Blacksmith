@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1>الفئات</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">إنشاء فئة</a>
        <table class="table">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>الوصف</th>
                    <th>الصورة</th>
                    <th>الحالة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td><img src="{{ asset('images/' . $category->image) }}" alt="{{ $category->name }}" width="100"></td>
                        <td>{{ $category->status }}</td>
                        <td>
                            <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-info">عرض</a>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary">تعديل</a>
                            <a href="{{ route('admin.categories.destroy', $category->id) }}" class="btn btn-danger">حذف</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection