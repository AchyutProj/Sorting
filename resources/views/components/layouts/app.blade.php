<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @vite('resources/css/app.css', 'resources/js/app.js')
    </head>
    <body class="bg-slate-800 flex flex-col gap-3 h-screen w-screen justify-center items-center text-white">
        {{ $slot }}
    </body>
</html>
