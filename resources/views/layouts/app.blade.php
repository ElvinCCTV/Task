<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Multi-Region App')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"}
                    }
                },
                fontFamily: {
                    'body': [
                        'Inter',
                        'ui-sans-serif',
                        'system-ui',
                        '-apple-system',
                        'system-ui',
                        'Segoe UI',
                        'Roboto',
                        'Helvetica Neue',
                        'Arial',
                        'Noto Sans',
                        'sans-serif',
                        'Apple Color Emoji',
                        'Segoe UI Emoji',
                        'Segoe UI Symbol',
                        'Noto Color Emoji'
                    ],
                    'sans': [
                        'Inter',
                        'ui-sans-serif',
                        'system-ui',
                        '-apple-system',
                        'system-ui',
                        'Segoe UI',
                        'Roboto',
                        'Helvetica Neue',
                        'Arial',
                        'Noto Sans',
                        'sans-serif',
                        'Apple Color Emoji',
                        'Segoe UI Emoji',
                        'Segoe UI Symbol',
                        'Noto Color Emoji'
                    ]
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-white">
<div class="flex flex-col min-h-screen">
    <header class="bg-white dark:bg-gray-800 shadow">
        <nav class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <a href="{{ city_route('city.home', [$city->slug]) }}" class="text-xl font-semibold text-gray-800 dark:text-white">Россия</a>
                @if(isset($city))
                    <p class="text-md text-white dark:text-gray-100">{{ $city->name }} | {{$city->region}}</p>
                @else
                    <p class="text-sm text-gray-600 dark:text-gray-400">No city selected</p>
                @endif
            </div>
            <ul class="flex space-x-4 mt-4">
                <li><a href="{{ city_route('home') }}" class="hover:text-primary-500 dark:hover:text-primary-400">Home</a></li>
                <li><a href="{{ city_route('about') }}" class="hover:text-primary-500 dark:hover:text-primary-400">About</a></li>
                <li><a href="{{ city_route('news') }}" class="hover:text-primary-500 dark:hover:text-primary-400">News</a></li>
            </ul>
        </nav>
    </header>

    <main class="flex-grow container mx-auto px-6 py-8">
        @yield('content')
    </main>

    <footer class="bg-white dark:bg-gray-800 shadow mt-8">
        <div class="container mx-auto px-6 py-3 text-center">
            <p class="text-sm text-gray-600 dark:text-gray-400">&copy; {{ date('Y') }} Multi-Region App</p>
        </div>
    </footer>
</div>
</body>
</html>
