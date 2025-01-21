<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UKM ASSEM') }}</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-Poppins antialiased">
    <x-custom.navbar></x-custom.navbar>
    <main class="pt-20 min-h-screen">
        {{ $slot }}
    </main>
    <x-custom.footer></x-custom.footer>
</body>

</html>