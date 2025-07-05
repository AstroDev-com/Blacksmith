@extends('admin.layouts.master')
@section('title', 'المستخدمين')
@section('page_title')
    <div class="fs-5 mt-1">
        <i class="fas fa-users fa-lg text-secondary"></i> المستخدمين
    </div>
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">المستخدمين</a></li>
    <li class="breadcrumb-item active">تعديل</li>
@endsection

@section('content')
    <style>
        .edit-card {
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
        }

        .image-edit-preview {
            border: 2px dashed #dee2e6;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .image-edit-preview:hover {
            border-color: #6c5ce7;
            transform: translateY(-3px);
        }
    </style>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="edit-card">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center py-3">
                        <h4 class="mb-0  fw-bold text-warning">
                            <i class="bi bi-pencil-square me-2"></i>تعديل بيانات المستخدم
                        </h4>
                        <a href="{{ route('users.index') }}" class="btn btn-danger rounded-pill px-4">
                            <i class="bi bi-arrow-left me-2"></i>رجوع
                        </a>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-4">
                                <!-- صورة المستخدم -->
                                <div class="col-md-6">
                                    <div class="image-edit-preview text-center p-3 rounded-3">
                                        <img id="previewImage" class="img-fluid rounded-3 shadow"
                                            src="{{ $user->thumbnail ? asset('storage/' . $user->thumbnail) : asset('admin/assets/img/emp_default.png') }}"
                                            alt="{{ $user->name }}"
                                            style="width: 250px; height: 250px; object-fit: cover;">
                                        <input type="file" name="profile_image" id="profile_image"
                                            class="form-control mt-3 d-none" accept="image/*" onchange="previewFile(event)">
                                        <label for="profile_image" class="btn btn-outline-primary mt-3 w-100">
                                            <i class="bi bi-cloud-upload me-2"></i>تغيير الصورة
                                        </label>
                                        @error('profile_image')
                                            <div class="text-danger small mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- تفاصيل المستخدم -->
                                <div class="col-md-6">
                                    <div class="row g-3">
                                        <!-- الاسم -->
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                                    name="name" value="{{ old('name', $user->name) }}">
                                                <label for="name">
                                                    <i class="bi bi-person me-2 text-muted"></i>اسم المستخدم
                                                </label>
                                                @error('name')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- الإيميل -->
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="email" class="form-control bg-light" id="email"
                                                    name="email" value="{{ $user->email }}" readonly>
                                                <label for="email">
                                                    <i class="bi bi-envelope-at me-2 text-muted"></i>البريد الإلكتروني
                                                </label>
                                            </div>
                                        </div>

                                        <!-- كلمة المرور -->
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" name="password" placeholder=" ">
                                                <label for="password">
                                                    <i class="bi bi-key me-2 text-muted"></i>كلمة مرور جديدة
                                                </label>
                                                @error('password')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- الأدوار -->
                                        <div class="col-12">
                                            <label class="form-label">
                                                <i class="bi bi-shield-lock me-2 text-muted"></i>الأدوار
                                            </label>
                                            <select name="roles[]" multiple
                                                class="form-select @error('roles') is-invalid @enderror"
                                                style="height: 120px">
                                                @foreach ($roles as $id => $name)
                                                    <option value="{{ $id }}"
                                                        {{ $user->hasRole($name) ? 'selected' : '' }}>
                                                        {{ $name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('roles')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- معلومات إضافية -->
                                <div class="col-12">
                                    <div class="row g-3">
                                        <!-- رقم الجوال -->
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text"
                                                    class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                    name="phone" value="{{ old('phone', $user->phone) }}">
                                                <label for="phone">
                                                    <i class="bi bi-phone me-2 text-muted"></i>رقم الجوال
                                                </label>
                                                @error('phone')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- الحالة -->
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <select name="status" id="status"
                                                    class="form-select @error('status') is-invalid @enderror">
                                                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>مفعل
                                                    </option>
                                                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>معطل
                                                    </option>
                                                </select>
                                                <label for="status">
                                                    <i class="bi bi-power me-2 text-muted"></i>الحالة
                                                </label>
                                                @error('status')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

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

    <script>
        function previewFile(event) {
            const input = event.target;
            const preview = document.getElementById('previewImage');
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.add('shadow-lg');
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src =
                    "{{ $user->thumbnail ? asset('storage/' . $user->thumbnail) : asset('admin/assets/img/emp_default.png') }}";
            }
        }
    </script>
@endsection
