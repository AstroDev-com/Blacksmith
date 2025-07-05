@extends('admin.layouts.master')
@section('title', 'رسالة جديدة')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">رسالة جديدة</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('messages.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="receiver_id">المستلم</label>
                                <select name="receiver_id" id="receiver_id"
                                    class="form-control @error('receiver_id') is-invalid @enderror" required>
                                    <option value="">اختر المستلم</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('receiver_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('receiver_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="subject">الموضوع</label>
                                <input type="text" name="subject" id="subject"
                                    class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}"
                                    required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="priority">الأولوية</label>
                                <select name="priority" id="priority"
                                    class="form-control @error('priority') is-invalid @enderror" required>
                                    <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>منخفضة</option>
                                    <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>متوسطة
                                    </option>
                                    <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>عالية</option>
                                </select>
                                @error('priority')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="content">المحتوى</label>
                                <textarea name="content" id="content" rows="6" class="form-control @error('content') is-invalid @enderror"
                                    required>{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane"></i> إرسال
                                </button>
                                <a href="{{ route('messages.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> إلغاء
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // يمكنك إضافة أي JavaScript مخصص هنا
    </script>
@endpush
