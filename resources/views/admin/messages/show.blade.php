@extends('admin.layouts.master')
@section('title', 'عرض الرسالة')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">عرض الرسالة</h3>
                        <div>
                            @if ($message->status === 'unread')
                                <form action="{{ route('messages.markAsRead', $message) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-check"></i> تحديد كمقروءة
                                    </button>
                                </form>
                            @endif
                            <form action="{{ route('messages.archive', $message) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fas fa-archive"></i> أرشفة
                                </button>
                            </form>
                            <a href="{{ route('messages.index') }}" class="btn btn-primary">
                                <i class="fas fa-arrow-right"></i> العودة للقائمة
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="message-details">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h5>المرسل:</h5>
                                    <p>{{ $message->sender->name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>المستلم:</h5>
                                    <p>{{ $message->receiver->name }}</p>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h5>الموضوع:</h5>
                                    <p>{{ $message->subject }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>الأولوية:</h5>
                                    <p>
                                        <span
                                            class="badge bg-{{ $message->priority === 'high' ? 'danger' : ($message->priority === 'medium' ? 'warning' : 'info') }}">
                                            {{ $message->priority }}
                                        </span>
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h5>الحالة:</h5>
                                    <p>
                                        <span
                                            class="badge bg-{{ $message->status === 'unread' ? 'warning' : ($message->status === 'read' ? 'success' : 'secondary') }}">
                                            {{ $message->status }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <h5>تاريخ الإرسال:</h5>
                                    <p>{{ $message->created_at->format('Y-m-d H:i') }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h5>المحتوى:</h5>
                                    <div class="message-content p-3 bg-light rounded">
                                        {!! nl2br(e($message->content)) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .message-content {
            white-space: pre-wrap;
            line-height: 1.6;
        }
    </style>
@endpush
