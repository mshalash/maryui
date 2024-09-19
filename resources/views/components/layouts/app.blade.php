<!DOCTYPE html>
<html data-theme="cupcake" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaryUI Tutorial</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
    <body>
        {{ $slot }}
    </body>
</html>
