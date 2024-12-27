<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard AlgooraNews</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bberkay/lightweight-wysiwyg-editor@main/src/wysiwyg.css">
</head>

<body class=" bg-slate-100">
    @include('admin/layouts/sidebar')
    @yield('content')
    @include('admin/layouts/footer')
    @stack('scripts')
    @stack('alerts')
    @stack('wsgi')

</body>

</html>
