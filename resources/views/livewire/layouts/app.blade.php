<!-- resources/views/components/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>AlgooraNews - Berita Seputar Cryptocurrency</title>

        <!-- General SEO Meta Tags -->
        <meta name="description"
            content="AlgooraNews adalah platform terpercaya yang menyajikan berita terbaru dan informasi mendalam seputar dunia cryptocurrency, blockchain, dan aset digital lainnya.">
        <meta name="keywords"
            content="AlgooraNews, berita cryptocurrency, blockchain, aset digital, informasi crypto, berita terbaru crypto, analisis pasar crypto">
        <meta name="author" content="AlgooraNews">

        <!-- Open Graph / Facebook -->
        <meta property="og:title" content="AlgooraNews - Berita Terbaru Cryptocurrency">
        <meta property="og:description"
            content="Ikuti berita terbaru, analisis pasar, dan perkembangan terkini dunia cryptocurrency hanya di AlgooraNews.">
        <meta property="og:image" content="{{ asset('assets/img/logo/logo-min.jpg') }}">
        <meta property="og:url" content="{{ env('APP_URL') }}">
        <meta property="og:type" content="website">

        <!-- Twitter Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="AlgooraNews - Berita Terbaru Cryptocurrency">
        <meta name="twitter:description"
            content="Dapatkan informasi terkini dan terpercaya tentang dunia cryptocurrency, blockchain, dan aset digital di AlgooraNews.">
        <meta name="twitter:image" content="{{ asset('assets/img/logo/logo-min.jpg') }}">

        <!-- WhatsApp Sharing Meta Tags -->
        <meta property="og:image" content="{{ asset('assets/img/logo/logo-min.jpg') }}">
        <meta property="og:description"
            content="Platform berita terpercaya untuk berita terbaru, analisis, dan wawasan seputar cryptocurrency di AlgooraNews.">

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}" type="image/x-icon">

    </head>

    @stack('styles')
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body x-init="initFlowbite();" class="bg-gray-900 ">
    {{-- @include('livewire.layouts.home-navbar') --}}
    @livewire('home-navbar')

    {{ $slot }} <!-- Ini akan menampilkan konten dari Livewire component -->


    @stack('scripts')

    @include('livewire.layouts.footer')



</body>

</html>
