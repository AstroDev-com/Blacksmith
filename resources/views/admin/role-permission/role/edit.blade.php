{{-- @extends('admin.layouts.master')

@section('title', 'الأدوار')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">الأدوار</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-light" dir="ltr">
                    <h4 class="card-title">تعديل دور</h4>
                    <a href="{{ route('roles.index') }}" class="btn btn-danger">رجوع</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('roles.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">اسم الدور</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="اسم الدور" value="{{ $role->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="guard_name">نوع الدور</label>
                                <select name="guard_name" id="guard_name" class="form-control">
                                    <option value="web" {{ $role->guard_name == 'web' ? 'selected' : '' }}>web
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="display_name">الوصف</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="الوصف" value="{{ $role->description }}">
                            </div>
                            <div class="form-group">
                                <label for="status">الحالة</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ $role->status == 1 ? 'selected' : '' }}>مفعل</option>
                                    <option value="0" {{ $role->status == 0 ? 'selected' : '' }}>غير مفعل
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="mt-2 btn btn-primary">تعديل دور </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}


@extends('admin.layouts.master')

@section('title', 'تعديل دور')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">الأدوار</li>
@endsection

@section('content')
    <style>
        .role-edit-card {
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
        }

        .perm-edit-group {
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .perm-edit-group:hover {
            border-color: #6c5ce7;
            transform: translateY(-3px);
        }
    </style>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="role-edit-card">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center py-3">
                        <h4 class="mb-0  fw-bold text-warning">
                            <i class="bi bi-shield-check me-2"></i>تعديل بيانات الدور
                        </h4>
                        <a href="{{ route('roles.index') }}" class="btn btn-danger rounded-pill px-4">
                            <i class="bi bi-arrow-left me-2"></i>رجوع
                        </a>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('roles.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row g-4">
                                <!-- معلومات أساسية -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder=" " required
                                            value="{{ old('name', $role->name) }}">
                                        <label for="name">
                                            <i class="bi bi-tag-fill me-2 text-muted"></i>اسم الدور
                                        </label>
                                        @error('name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select name="guard_name" id="guard_name"
                                            class="form-select @error('guard_name') is-invalid @enderror">
                                            <option value="web" selected>web</option>
                                        </select>
                                        <label for="guard_name">
                                            <i class="bi bi-shield-lock me-2 text-muted"></i>نوع الحماية
                                        </label>
                                        @error('guard_name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text"
                                            class="form-control @error('description') is-invalid @enderror" id="description"
                                            name="description" placeholder=" "
                                            value="{{ old('description', $role->description) }}">
                                        <label for="description">
                                            <i class="bi bi-text-paragraph me-2 text-muted"></i>الوصف
                                        </label>
                                        @error('description')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select name="status" id="status"
                                            class="form-select @error('status') is-invalid @enderror">
                                            <option value="1"
                                                {{ old('status', $role->status) == 1 ? 'selected' : '' }}>مفعل</option>
                                            <option value="0"
                                                {{ old('status', $role->status) == 0 ? 'selected' : '' }}>غير مفعل</option>
                                        </select>
                                        <label for="status">
                                            <i class="bi bi-power me-2 text-muted"></i>الحالة
                                        </label>
                                        @error('status')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- الصلاحيات -->
                                {{-- <div class="col-12">
                                    <h5 class="mb-3 fw-bold text-primary">
                                        <i class="bi bi-key-fill me-2"></i>إدارة الصلاحيات
                                    </h5>

                                    @foreach ($permissionsGrouped as $group => $permissions)
                                        <div class="perm-edit-group">
                                            <h6 class="fw-semibold text-muted mb-3">
                                                <i class="bi bi-folder2-open me-2"></i>{{ $group }}
                                            </h6>
                                            <div class="row g-3">
                                                @foreach ($permissions as $permission)
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="permissions[]" value="{{ $permission->name }}"
                                                                id="perm_{{ $permission->id }}"
                                                                {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="perm_{{ $permission->id }}">
                                                                {{ $permission->description }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div> --}}

                                <!-- زر التحديث -->
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-warning px-5 py-3 rounded-pill text-white">
                                        <i class="bi bi-arrow-repeat me-2"></i>تحديث البيانات
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
