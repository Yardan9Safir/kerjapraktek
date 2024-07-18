<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* Smaller carousel */
        .carousel-inner img {
            height: 300px;
            object-fit: cover;
        }
    </style>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">CV. OasisTech IndoKarya</a>
            <a href="/login" class="btn btn-success">LOGIN ADMIN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/profile">Profile</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link active" href="/about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/kelompok">Kelompok</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>

    <div class="container p-4">
        <div class="row">
            \\<div class="col-lg-10 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Deskripsi Perusahaan</h5>
                <p>
                    CV. Oasis Tech Indo Karya adalah perusahaan yang bergerak dalam penyediaan solusi pemfilteran air berkualitas tinggi. Berdiri sejak 2021, perusahaan ini berkomitmen untuk menyediakan produk dan layanan yang membantu meningkatkan kualitas air bagi rumah tangga, bisnis komersial, dan industri.
                </p>
            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                <img src="https://lh3.googleusercontent.com/p/AF1QipMG_gbJJgMPD9gr5p5jARvXPo2XcseAak3V6ira=s1360-w1360-h1020" alt="Deskripsi Gambar" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="container p-4">
        <div class="row">
            <div class="row-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Tujuan Perusahaan</h5>
                <p>
                   Oasis Tech Indo Karya menawarkan berbagai jenis mesin pemfilteran air yang dirancang dengan teknologi terkini untuk memastikan air yang lebih bersih dan sehat. Selain itu, perusahaan juga menyediakan layanan pemasangan, perawatan, dan konsultasi untuk memastikan pelanggan mendapatkan solusi pemfilteran air yang optimal dan sesuai dengan kebutuhan mereka. Dengan fokus pada inovasi dan kepuasan pelanggan, CV. Oasis Tech Indo Karya terus berusaha menjadi pemimpin di industri pemfilteran air di Indonesia.
                </p>
            </div>
        </div>
    </div>
</body>

</html>
