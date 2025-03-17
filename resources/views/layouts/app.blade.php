<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Yappr')</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="relative antialiased bg-gray-100 font-lexend">
    <x-header />

    <div class="max-w-screen-2xl border-2 border-red-500 mx-auto h-screen">
        <main class="border-2 border-pink-400">
            @yield('content')
        </main>
    </div>

    <x-footer />
    @stack('scripts')
</body>

</html>
