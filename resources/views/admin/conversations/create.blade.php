@extends('admin.layouts.master')

@section('title', __('dashboard.new_conversation'))

@push('styles')
    {{-- Add Select2 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <style>
        /* Dark mode styles for the form */
        .card {
            background-color: var(--light);
            border: 1px solid var(--gray);
        }

        .card-header {
            background-color: var(--light);
            border-bottom: 1px solid var(--gray);
        }

        .card-header h6 {
            color: var(--primary);
        }

        .form-label {
            color: var(--dark);
        }

        .form-select,
        .form-control {
            background-color: var(--light);
            border: 1px solid var(--gray);
            color: var(--dark);
        }

        .form-select:focus,
        .form-control:focus {
            background-color: var(--light);
            border-color: var(--primary);
            color: var(--dark);
        }

        /* Select2 Dark Mode Styles */
        .select2-container--bootstrap-5 .select2-selection {
            background-color: var(--light);
            border-color: var(--gray);
            color: var(--dark);
        }

        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__rendered {
            background-color: var(--light);
            color: var(--dark);
        }

        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__choice {
            background-color: var(--gray);
            border-color: var(--gray);
            color: var(--dark);
        }

        .select2-container--bootstrap-5 .select2-dropdown {
            background-color: var(--light);
            border-color: var(--gray);
        }

        .select2-container--bootstrap-5 .select2-results__option {
            color: var(--dark);
        }

        .select2-container--bootstrap-5 .select2-results__option--highlighted {
            background-color: var(--gray);
            color: var(--dark);
        }

        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__choice__remove {
            color: var(--dark);
        }

        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: var(--primary);
        }

        /* Button styles */
        .btn-secondary {
            background-color: var(--gray);
            border-color: var(--gray);
            color: var(--dark);
        }

        .btn-secondary:hover {
            background-color: var(--primary);
            border-color: var(--primary);
            color: var(--light);
        }

        .text-danger {
            color: var(--danger) !important;
        }

        .text-gray-800 {
            color: var(--dark) !important;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">

        {{-- Session Messages --}}
        @include('admin.partials.session-messages')

        {{-- Page Heading --}}
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('dashboard.new_conversation') }}</h1>
            <a href="{{ route('conversations.index') }}" class="btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> {{ __('dashboard.back_to_conversations') }}
            </a>
        </div>

        {{-- New Conversation Form --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('dashboard.start_new_conversation') }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('conversations.store') }}" method="POST">
                    @csrf

                    {{-- Recipients Selection --}}
                    <div class="mb-3">
                        <label for="recipients" class="form-label">{{ __('dashboard.recipients') }}:</label>
                        <select class="form-select" id="recipients" name="recipients[]" multiple="multiple" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                        @error('recipients')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Initial Message --}}
                    <div class="mb-3">
                        <label for="message" class="form-label">{{ __('dashboard.message') }}:</label>
                        <textarea name="message" id="message" class="form-control" rows="4"
                            placeholder="{{ __('dashboard.type_your_initial_message') }}" required>{{ old('message') }}</textarea>
                        @error('message')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> {{ __('dashboard.send_message') }}
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    {{-- Add jQuery and Select2 JS --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#recipients').select2({
                theme: "bootstrap-5",
                placeholder: "{{ __('dashboard.select_recipients') }}",
                allowClear: true
            });
        });
    </script>
@endpush
