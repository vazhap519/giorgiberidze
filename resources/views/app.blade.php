<!doctype html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Website') }}</title>

    @php
        $settings = cache()->remember('site_settings', 3600, fn() => \App\Models\SiteSetting::first());
    @endphp

    @if($settings?->favicon_url)
        <link rel="icon" href="{{ $settings->favicon_url }}">
    @endif

    @viteReactRefresh
    @vite(['resources/js/app.jsx', 'resources/css/app.css'])

    @inertiaHead
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 font-display transition-colors duration-300">
@inertia
</body>
</html>
