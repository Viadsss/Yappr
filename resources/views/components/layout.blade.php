@props([
    'title' => 'Yappr',
    'haveHeader' => true,
    'haveFooter' => true,
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Yappr' }}</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <div class="px-10">
        @if ($haveHeader)
            <x-header />
        @endif


        <main>
            {{ $slot }}
        </main>

        @if ($haveFooter)
            <x-footer />
        @endif
    </div>
    @stack('scripts')
</body>

</html>
