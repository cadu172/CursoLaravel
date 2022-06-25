<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel com Angular+Material</title>
        <link rel="stylesheet" href="{{asset('js/styles.css')}}">
    </head>
    <body class="antialiased">
        <app-root></app-root>
        <script src="{{asset('js/runtime.js')}}" type="module"></script>
        <script src="{{asset('js/polyfills.js')}}" type="module"></script>
        <script src="{{asset('js/main.js')}}" type="module"></script>
    </body>
</html>
