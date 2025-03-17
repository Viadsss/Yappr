<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Yappr')</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="relative antialiased bg-gray-100 font-lexend h-screen">
    <main class="max-w-screen-2xl mx-auto min-h-full flex flex-col items-center justify-center py-8 px-4">
        @yield('content')
    </main>
    </div>

    <x-footer />
    @stack('scripts')
</body>

</html>
