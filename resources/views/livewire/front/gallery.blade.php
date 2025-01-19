<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-Poppin">

    <x-custom.navbar></x-custom.navbar>

    <section id="gallery"
        class="bg-black items-center flex justify-center text-4xl text-center text-white font-bold h-screen">
        NANTI DISINI GALLERY <br>
        cuma belum tau mo gimana layoutnya

    </section>
    @livewire('contentmanager.gallery1')

    <x-custom.footer></x-custom.footer>

</body>

</html>