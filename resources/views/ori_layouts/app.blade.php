<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <title>Data Master</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    @include('ori_layouts.nav')
    @yield('content')
    @vite('resources/js/app.js')
</body>

</html>
