<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel com Angular+Material</title>
    </head>
    <body class="antialiased">
        <app-root></app-root>
        <script src="{{asset('js/runtime.e52a78f68d3a501f.js')}}" type="module"></script>
        <script src="{{asset('js/polyfills.4a877794f0c37d8b.js')}}" type="module"></script>
        <script src="{{asset('js/main.c3a5220bf6c060d5.js')}}" type="module"></script>
    </body>
</html>
