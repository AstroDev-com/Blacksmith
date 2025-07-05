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
    <li class="breadcrumb-item active">إنشاء</li>
@endsection
@section('content')
    <style>
        .modern-card {
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            border: none;
            overflow: hidden;
            transition: transform 0.3s ease;
            background: linear-gradient(145deg, #ffffff, #f8f9fa);
        }

        .modern-card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background: linear-gradient(135deg, #6c5ce7, #4b3d9f);
            color: white !important;
            border-bottom: 3px solid rgba(255, 255, 255, 0.1);
        }

        .preview-container {
            border: 2px dashed #dee2e6;
            border-radius: 15px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(108, 92, 231, 0.05);
        }

        .preview-container:hover {
            border-color: #6c5ce7;
            box-shadow: 0 4px 15px rgba(108, 92, 231, 0.2);
        }

        .form-floating>label {
            padding-right: 3rem;
            color: #6c757d;
        }

        .input-gradient {
            background: linear-gradient(145deg, #f8f9fa, #ffffff);
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .input-gradient:focus {
            border-color: #6c5ce7;
            box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.25);
        }

        .animated-btn {
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .animated-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 92, 231, 0.3);
        }

        .animated-btn::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(45deg);
            transition: all 0.5s ease;
        }

        .animated-btn:hover::after {
            left: 120%;
        }
    </style>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="modern-card">
                    <div class="card-header p-3 d-flex justify-content-between align-items-center py-4">
                        <h3 class="mb-0 fw-bold">
                            <i class="bi bi-person-plus-fill me-3"></i>إنشاء حساب جديد
                        </h3>
                        <a href="{{ route('users.index') }}" class="btn btn-light animated-btn">
                            <i class="bi bi-arrow-left-circle me-2"></i>العودة للقائمة
                        </a>
                    </div>

                    <div class="card-body p-5">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data"
                            class="needs-validation" novalidate>
                            @csrf

                            <div class="row g-5">
                                <!-- الصورة الشخصية -->
                                <div class="col-md-5">
                                    <div class="preview-container p-4 text-center position-relative">
                                        <div class="position-relative d-inline-block">
                                            <img id="imagePreview" class="img-fluid rounded-circle shadow-lg"
                                                src="{{ asset('admin/default_image.webp') }}" alt="صورة المستخدم"
                                                style="width: 280px; height: 280px; object-fit: cover;">
                                            <div class="hover-overlay">
                                                <label for="imageInput"
                                                    class="btn btn-primary btn-sm position-absolute bottom-0 end-0 m-3 rounded-pill">
                                                    <i class="bi bi-camera-fill me-2"></i>تغيير الصورة
                                                </label>
                                            </div>
                                        </div>
                                        <input type="file" name="profile_image" id="imageInput"
                                            class="form-control d-none" accept="image/*"
                                            onchange="handleImagePreview(event)">
                                        @error('profile_image')
                                            <div class="text-danger small mt-3 animate__animated animate__shakeX">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- التفاصيل الأساسية -->
                                <div class="col-md-7">
                                    <div class="row g-4">
                                        <!-- الاسم الكامل -->
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text"
                                                    class="form-control input-gradient @error('name') is-invalid @enderror"
                                                    id="name" name="name" placeholder=" "
                                                    value="{{ old('name') }}" required>
                                                <label for="name">
                                                    <i class="bi bi-person-badge me-2"></i>الاسم الكامل
                                                </label>
                                                @error('name')
                                                    <div class="invalid-feedback animate__animated animate__fadeIn">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- البريد الإلكتروني -->
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="email"
                                                    class="form-control input-gradient @error('email') is-invalid @enderror"
                                                    id="email" name="email" placeholder=" "
                                                    value="{{ old('email') }}" required>
                                                <label for="email">
                                                    <i class="bi bi-envelope-at me-2"></i>البريد الإلكتروني
                                                </label>
                                                @error('email')
                                                    <div class="invalid-feedback animate__animated animate__fadeIn">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- كلمة المرور -->
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <div class="input-group">
                                                    <input type="password"
                                                        class="form-control input-gradient @error('password') is-invalid @enderror"
                                                        id="password" name="password" placeholder=" " required
                                                        autocomplete="new-password">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        onclick="togglePasswordVisibility()">
                                                        <i class="bi bi-eye-slash"></i>
                                                    </button>
                                                </div>
                                                <label for="password">
                                                    <i class="bi bi-shield-lock me-2"></i>كلمة المرور
                                                </label>
                                                @error('password')
                                                    <div class="invalid-feedback animate__animated animate__fadeIn">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- الأدوار -->
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <select name="roles[]" multiple
                                                    class="form-select input-gradient @error('roles') is-invalid @enderror"
                                                    style="height: 120px" required>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role }}"
                                                            {{ in_array($role, old('roles', [])) ? 'selected' : '' }}>
                                                            {{ $role }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label class="form-label">
                                                    <i class="bi bi-person-gear me-2"></i>الصلاحيات والأدوار
                                                </label>
                                                @error('roles')
                                                    <div class="invalid-feedback animate__animated animate__fadeIn">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- المعلومات الإضافية -->
                                <div class="col-12">
                                    <div class="row g-4">
                                        <!-- رقم الجوال -->
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="tel"
                                                    class="form-control input-gradient @error('phone_number') is-invalid @enderror"
                                                    id="phone_number" name="phone_number" placeholder=" "
                                                    pattern="[0-9]{10}" value="{{ old('phone_number') }}">
                                                <label for="phone_number">
                                                    <i class="bi bi-phone-vibrate me-2"></i>رقم الجوال
                                                </label>
                                                @error('phone_number')
                                                    <div class="invalid-feedback animate__animated animate__fadeIn">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- الحالة -->
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <select name="status" id="status"
                                                    class="form-select input-gradient @error('status') is-invalid @enderror">
                                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>
                                                        <i class="bi bi-check-circle me-2"></i>مفعل
                                                    </option>
                                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>
                                                        <i class="bi bi-x-circle me-2"></i>غير مفعل
                                                    </option>
                                                </select>
                                                <label for="status">
                                                    <i class="bi bi-toggle-on me-2"></i>حالة الحساب
                                                </label>
                                                @error('status')
                                                    <div class="invalid-feedback animate__animated animate__fadeIn">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- زر الإرسال -->
                                <div class="col-12 text-center mt-5">
                                    <button type="submit"
                                        class="btn btn-lg btn-primary rounded-pill animated-btn px-5 py-3">
                                        <i class="bi bi-cloud-arrow-up-fill me-3"></i>حفظ المستخدم الجديد
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
        function handleImagePreview(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.add('animate__animated', 'animate__pulse');
                setTimeout(() => preview.classList.remove('animate__pulse'), 500);
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }

        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.querySelector('#password + button i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.classList.replace('bi-eye-slash', 'bi-eye');
            } else {
                passwordInput.type = 'password';
                toggleButton.classList.replace('bi-eye', 'bi-eye-slash');
            }
        }

        // Form validation
        (function() {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection
