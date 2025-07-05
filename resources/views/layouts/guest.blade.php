<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts & Styles -->
    {{-- Ensure Bootstrap CSS/JS are loaded via Vite or CDN --}}
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])

    {{-- Or if using Bootstrap CDN --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}
</head>

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100 my-5">
            <div class="col-md-6 col-lg-5 col-xl-4">
                <div class="text-center mb-4">
                    <a href="/">
                        {{-- Removed fixed width, adjust component or CSS if needed --}}
                        <x-application-logo class="mx-auto" style="height: 60px;" /> {{-- Example: Centered logo with fixed height --}}
                    </a>
                </div>

                <div class="card shadow-sm rounded-3">
                    {{-- Increased padding --}}
                    <div class="card-body p-4 p-md-5">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
