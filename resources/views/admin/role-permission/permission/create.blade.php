@extends('admin.layouts.master')

@section('title', 'إضافة صلاحية')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">الصلاحيات</li>
@endsection

@section('content')
    <style>
        .perm-card {
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
        }

        .perm-icon {
            font-size: 1.2rem;
            margin-left: 8px;
        }
    </style>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="perm-card">
                    <div class="card-header p-3 bg-light d-flex justify-content-between align-items-center py-3">
                        <h2 class="mb-0   fw-bold text-success">
                            <i class="bi bi-shield-plus me-2"></i>إضافة صلاحية جديدة
                        </h2>
                        <a href="{{ route('permissions.index') }}" class="btn btn-danger rounded-pill px-4">
                            <i class="bi bi-arrow-left me-2"></i>رجوع
                        </a>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('permissions.store') }}" method="POST">
                            @csrf

                            <div class="row g-4">
                                <!-- اسم الصلاحية -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder=" " required
                                            value="{{ old('name') }}">
                                        <label for="name">
                                            <i class="bi bi-tag perm-icon text-muted"></i>اسم الصلاحية
                                        </label>
                                        @error('name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- نوع الصلاحية -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select name="guard_name" id="guard_name"
                                            class="form-select @error('guard_name') is-invalid @enderror">
                                            <option value="web" selected>web</option>
                                        </select>
                                        <label for="guard_name">
                                            <i class="bi bi-shield-check perm-icon text-muted"></i>نوع الحماية
                                        </label>
                                        @error('guard_name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- الوصف -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text"
                                            class="form-control @error('description') is-invalid @enderror" id="description"
                                            name="description" placeholder=" " value="{{ old('description') }}">
                                        <label for="description">
                                            <i class="bi bi-text-paragraph perm-icon text-muted"></i>الوصف
                                        </label>
                                        @error('description')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- الحالة -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select name="status" id="status"
                                            class="form-select @error('status') is-invalid @enderror">
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>مفعل</option>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>غير مفعل
                                            </option>
                                        </select>
                                        <label for="status">
                                            <i class="bi bi-power perm-icon text-muted"></i>الحالة
                                        </label>
                                        @error('status')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- زر الإرسال -->
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-success px-5 py-3 rounded-pill">
                                        <i class="bi bi-save me-2"></i>حفظ الصلاحية
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
