@extends('admin.layouts.master')

@section('title', $title)

@section('breadcrumb')
    @parent
    @foreach ($breadcrumb as $item)
        <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
            @if (!$loop->last)
                <a href="{{ $item['url'] }}">{{ $item['name'] }}</a>
            @else
                {{ $item['name'] }}
            @endif
        </li>
    @endforeach
@endsection

@push('styles')
    <style>
        /* Copied styles from role/show.blade.php for consistency */
        :root {
            --primary-color: #6a11cb;
            --secondary-color: #2575fc;
            --light-bg: #f8f9fc;
            --card-bg: #ffffff;
            --text-color: #495057;
            --text-muted: #6c757d;
            --primary-gradient: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            --light-gradient: linear-gradient(135deg, #eef2ff 0%, #f8f9fc 100%);
            --card-radius: 1rem;
            --card-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        /* Card Styles */
        .role-detail-card {
            /* Renamed from .permission-details-card */
            border: none;
            border-radius: var(--card-radius);
            box-shadow: var(--card-shadow);
            background: var(--card-bg);
            transition: all 0.3s ease-in-out;
            overflow: hidden;
            position: relative;
            margin-bottom: 2rem;
            margin-top: 1rem;
            /* Add some top margin */
        }

        .role-detail-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: var(--primary-gradient);
            background-size: 200% 100%;
            animation: gradient 4s ease infinite;
            z-index: 2;
            border-top-left-radius: var(--card-radius);
            border-top-right-radius: var(--card-radius);
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .card-header {
            background: var(--light-bg);
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header .header-info {
            flex-grow: 1;
            display: flex;
            /* Use flex for icon and text */
            align-items: center;
            gap: 1rem;
            /* Gap between icon and text */
        }

        .card-header .header-actions {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .card-header .back-btn {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: var(--card-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .card-header .back-btn:hover {
            background: #e9ecef;
            color: var(--primary-color);
            transform: translateY(-1px);
        }

        .card-header .btn-edit-header {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            background: var(--primary-gradient);
            color: white;
            border: none;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 3px 8px rgba(106, 17, 203, 0.1);
        }

        .card-header .btn-edit-header:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(106, 17, 203, 0.2);
        }

        .card-header .icon-wrapper {
            width: 45px;
            height: 45px;
            background: var(--primary-gradient);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(106, 17, 203, 0.15);
            color: white;
            font-size: 1.4rem;
            flex-shrink: 0;
            /* Prevent icon from shrinking */
        }

        .card-header .card-title {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 0.1rem;
        }

        .card-header .text-muted {
            font-size: 0.9rem;
        }

        .card-body {
            padding: 2rem 1.8rem;
        }

        /* Info Items Grid */
        .role-info {
            /* Reusing class name for consistency */
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.2rem;
            margin-bottom: 2.5rem;
        }

        .info-item {
            background: var(--light-gradient);
            border-radius: 12px;
            padding: 1.2rem 1.1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s ease;
            border: 1px solid transparent;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.03);
        }

        .info-item:hover {
            transform: translateY(-4px);
            background: var(--card-bg);
            border-color: #d8e2fc;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.07);
            z-index: 1;
        }

        .info-icon {
            width: 42px;
            height: 42px;
            background: var(--card-bg);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 1.2rem;
            transition: all 0.3s ease;
            flex-shrink: 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .info-item:hover .info-icon {
            background: var(--primary-gradient);
            color: white;
            transform: scale(1.1);
            box-shadow: 0 5px 10px rgba(106, 17, 203, 0.2);
        }

        .info-content {
            flex: 1;
            text-align: right;
        }

        .info-content h6 {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-bottom: 0.2rem;
            font-weight: 500;
            text-transform: uppercase;
        }

        .info-content p,
        .info-content .status-badge {
            margin: 0;
            font-size: 0.95rem;
            color: var(--text-color);
            font-weight: 600;
            line-height: 1.4;
        }

        /* Roles Section */
        .roles-section {
            /* Adapted from .permissions-section */
            background: var(--light-gradient);
            border-radius: 12px;
            padding: 1.5rem 1.3rem;
            margin-top: 2rem;
            border: 1px solid #e9ecef;
        }

        .roles-title {
            font-size: 1.1rem;
            color: var(--primary-color);
            margin-bottom: 1.8rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 0.8rem;
        }

        .roles-title i {
            font-size: 1.1rem;
            color: var(--secondary-color);
        }

        .roles-grid {
            /* Adapted from .permissions-grid */
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
        }

        .role-badge {
            /* Existing style, looks good */
            display: inline-flex;
            align-items: center;
            padding: 0.6rem 1rem;
            border-radius: 10px;
            /* Adjusted radius */
            background: var(--primary-gradient);
            color: white;
            font-size: 0.85rem;
            font-weight: 500;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 3px 7px rgba(106, 17, 203, 0.15);
            cursor: default;
        }

        .role-badge i {
            font-size: 0.9rem;
        }

        .role-badge:hover {
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 5px 12px rgba(106, 17, 203, 0.25);
        }

        /* Status Badge */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.4rem 0.9rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            gap: 0.4rem;
        }

        .status-badge.active {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
            border: 1px solid rgba(40, 167, 69, 0.2);
        }

        .status-badge.inactive {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.2);
        }

        .status-badge i {
            font-size: 0.9rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .card-header {
                padding: 1rem 1.2rem;
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            .card-header .header-info {
                flex-grow: 1;
                /* Ensure text wraps if needed */
                min-width: 0;
            }

            .card-header .card-title {
                font-size: 1.1rem;
                /* Slightly smaller title */
            }

            .card-header .header-actions {
                width: 100%;
                justify-content: space-between;
                margin-top: 0.5rem;
            }

            .card-body {
                padding: 1.5rem 1.3rem;
            }

            .role-info {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .role-badge {
                padding: 0.5rem 0.8rem;
                font-size: 0.8rem;
            }

            /* Removed action-buttons specific styles as they are gone */
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-9">
                {{-- Removed old page header --}}
                <div class="role-detail-card"> {{-- Changed class --}}
                    <div class="card-header">
                        <div class="header-info">
                            <div class="icon-wrapper">
                                <i class="fas fa-key"></i> {{-- Permission Icon --}}
                            </div>
                            <div>
                                <h3 class="card-title mb-0">{{ $permission->name }}</h3>
                                <p class="text-muted mb-0">{{ __('dashboard.permission_details') }}</p>
                            </div>
                        </div>
                        <div class="header-actions">
                            <a href="{{ route('permissions.index') }}" class="back-btn"
                                title="{{ __('dashboard.back_to_list') }}">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn-edit-header">
                                <i class="fas fa-edit me-1"></i>
                                <span>{{ __('dashboard.edit') }}</span>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        {{-- Using role-info grid structure --}}
                        <div class="role-info">
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-key"></i>
                                </div>
                                <div class="info-content">
                                    <h6>{{ __('dashboard.name') }}</h6>
                                    <p>{{ $permission->name }}</p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-toggle-on"></i>
                                </div>
                                <div class="info-content">
                                    <h6>{{ __('dashboard.status') }}</h6>
                                    <div class="status-badge {{ $permission->status ? 'active' : 'inactive' }}">
                                        <i
                                            class="fas {{ $permission->status ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                        {{ $permission->status ? __('dashboard.active') : __('dashboard.inactive') }}
                                    </div>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="info-content">
                                    <h6>{{ __('dashboard.created_at') }}</h6>
                                    <p>{{ $permission->created_at->format('Y-m-d H:i') }}</p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-history"></i>
                                </div>
                                <div class="info-content">
                                    <h6>{{ __('dashboard.last_updated') }}</h6>
                                    <p>{{ $permission->updated_at->format('Y-m-d H:i') }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Roles Section --}}
                        <div class="roles-section">
                            <h5 class="roles-title">
                                <i class="fas fa-user-shield"></i>
                                {{ __('dashboard.roles_with_this_permission') }}
                            </h5>
                            @if ($roles->isNotEmpty())
                                <div class="roles-grid">
                                    @foreach ($roles as $role)
                                        <div class="role-badge" title="{{ $role->name }}">
                                            <i class="fas fa-user-shield"></i>
                                            {{ $role->name }}
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted mb-0">{{ __('dashboard.no_roles_assigned') }}</p>
                            @endif
                        </div>

                        {{-- Removed old action buttons div --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
