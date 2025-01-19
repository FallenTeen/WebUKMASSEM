<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preload" href="{{ asset('images/bg-1.JPG') }}" as="image">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }

        .splash-container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #000;
            color: #fff;
            z-index: 9999;
        }

        .splash-logo {
            width: 150px; /* Atur ukuran logo sesuai kebutuhan */
            height: 150px;
            animation: fadeInOut 3s ease-in-out forwards;
        }

        @keyframes fadeInOut {
            0% {
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }
    </style>
</head>
<body>

    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" 
        x-show="show" x-transition:enter="transition ease-out duration-500" 
        x-transition:leave="transition ease-in duration-300" class="splash-container">
        
        <!-- Logo with Alpine.js Animation -->
        <img src="{{ asset('icons/assem.png') }}" alt="Logo" class="splash-logo" 
            x-data="{ opacity: 0, transform: 'scale(0.5)' }" 
            x-init="setTimeout(() => { opacity = 1; transform = 'scale(1)' }, 500)" 
            :style="{ opacity: opacity, transform: transform }">
    </div>

    <script>
        // Setelah 3 detik, redirect ke halaman utama
        setTimeout(function() {
            window.location.href = "{{ url('/') }}"; // Mengarahkan ke halaman utama
        }, 3000); // 3 detik
    </script>
    
</body>
</html>
