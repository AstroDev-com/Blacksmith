@extends('admin.layouts.master')

@section('title', __('dashboard.notifications'))

@push('styles')
    <style>
        .notification-item.unread {
            /* background-color: #f8f9fa; */
            /* Original light background */
            background-color: #eef2f7;
            /* Slightly more noticeable background */
            border-left: 4px solid #0d6efd;
            /* Blue left border for unread */
        }

        .notification-item.read {
            opacity: 0.8;
        }

        /* Add hover effect to the link within the item */
        .notification-item>a:hover {
            background-color: rgba(0, 0, 0, 0.03);
            /* Subtle hover background */
        }

        .notification-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            /* background-color: #e9ecef; */
            /* Original icon background */
            background-color: #f1f3f5;
            /* Lighter icon background */
            color: #495057;
        }

        .notification-card .card-body {
            padding: 1rem;
            /* Adjust padding as needed */
        }

        .notification-card .card-footer {
            padding: 0.75rem 1rem;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('dashboard.all_notifications') }}</h1>
            {{-- Optional: Add Mark All Read Button --}}
            @if (Auth::user()->unreadNotifications->count() > 0)
                <form action="{{ route('notifications.markAllRead') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-check-double fa-sm text-white-50"></i> {{ __('dashboard.mark_all_read') }}
                    </button>
                </form>
            @endif
        </div>

        <div class="card shadow mb-4 notification-card">
            <div class="card-body p-0">
                @if ($notifications->count() > 0)
                    <ul class="list-group list-group-flush">
                        @foreach ($notifications as $notification)
                            <li
                                class="list-group-item notification-item {{ $notification->read_at ? 'read' : 'unread' }} d-flex justify-content-between align-items-center">
                                {{-- Notification Content Link --}}
                                <a href="{{ route('notifications.markAsRead', ['notification' => $notification->id, 'redirect_url' => $notification->data['url'] ?? url()->current()]) }}"
                                    class="text-decoration-none text-dark d-flex align-items-start flex-grow-1 {{ $isRTL ?? false ? 'me-3' : 'ms-3' }}">
                                    <div class="notification-icon {{ $isRTL ?? false ? 'ms-3' : 'me-3' }}">
                                        <i class="{{ $notification->data['icon'] ?? 'fas fa-info-circle' }} fs-5"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-1">{!! $notification->data['message'] ?? 'Notification content missing.' !!}</p>
                                        <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                        @if (!$notification->read_at)
                                            <span
                                                class="badge bg-primary rounded-pill {{ $isRTL ?? false ? 'me-2' : 'ms-2' }}">{{ __('dashboard.new') }}</span>
                                        @endif
                                    </div>
                                </a>

                                {{-- Action Buttons --}}
                                <div class="notification-actions {{ $isRTL ?? false ? 'me-2' : 'ms-2' }}">
                                    {{-- Mark as Unread Button (Show only if read) --}}
                                    @if ($notification->read_at)
                                        <form action="{{ route('notifications.markAsUnread', $notification->id) }}"
                                            method="POST" class="d-inline me-1">
                                            @csrf
                                            @method('PATCH') {{-- Or PUT --}}
                                            <button type="submit" class="btn btn-sm btn-outline-secondary p-1"
                                                title="{{ __('dashboard.mark_as_unread') }}">
                                                <i class="fas fa-eye-slash fa-fw"></i> {{-- Or fas fa-undo --}}
                                            </button>
                                        </form>
                                    @endif

                                    {{-- Delete Button --}}
                                    <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('{{ __('dashboard.are_you_sure_delete_notification') }}');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger p-1"
                                            title="{{ __('dashboard.delete') }}">
                                            <i class="fas fa-trash fa-fw"></i>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-center text-muted p-5">{{ __('dashboard.no_notifications_found') }}</p>
                @endif
            </div>

            @if ($notifications->hasPages())
                <div class="card-footer bg-light border-top">
                    {{ $notifications->links() }} {{-- Display pagination links --}}
                </div>
            @endif
        </div>

    </div>
@endsection
