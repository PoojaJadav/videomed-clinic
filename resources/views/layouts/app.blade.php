<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="h-full font-sans antialiased">
<x-jet-banner />

<div class="min-h-full">
@include('navigation-menu')

<!-- Page Content -->
    <div class="lg:pl-64 flex flex-col">
        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
