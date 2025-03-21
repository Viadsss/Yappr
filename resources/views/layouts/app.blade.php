<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Yappr')</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="relative antialiased bg-gray-100 font-lexend h-screen scroll-smooth">
    @yield('header')

    <main class="max-w-screen-2xl mx-auto min-h-full pt-4 pb-8 px-8">
        @yield('content')
    </main>

    @yield('footer')
    @stack('scripts')
</body>

</html>
