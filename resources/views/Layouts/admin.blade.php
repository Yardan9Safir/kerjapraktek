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

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif
        }

        .sidebar {
            background-color: #37363d;
            min-height: 100vh;
            min-width: 40vh;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 15px;
            text-decoration: none;
            font-weight: 500;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #F3F4FF;
            border-top-left-radius: 25px;
            border-bottom-left-radius: 25px;
            color: #2d2c32;
        }

        .main-content {
            background-color: #F3F4FF;
            padding: 20px;
            width: 100%;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .stat-card {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-radius: 8px;
            color: white;
            padding: 20px;
            margin-right: 15px;
            margin-bottom: 15px;
        }

        .stat-card i {
            font-size: 36px;
            margin-bottom: 10px;
        }

        /* Custom icon size */
        /* .icon-lg {
            font-size: 48px;
        }

        .icon-md {
            font-size: 36px;
        }

        .icon-sm {
            font-size: 24px;
        } */
    </style>
</head>

<body>
    <div class="d-flex flex-column flex-lg-row">
        <div class="sidebar pt-3 ps-3 pb-3 d-flex flex-column">
            <div class="text-center mb-4 pe-3">
                <h4 class="text-white">CV.OASISTECH INDOKARYA</h4>
            </div>
            <div class="d-flex flex-column">
                <a href="{{ route('filterair.index') }}"
                    class="d-flex align-items-center {{ Request::is('santri') ? 'active' : '' }}">
                    <i class="bi bi bi-columns icon-md" style="margin-right: 15px; font-size:20px;"></i>
                    Data Alat Pemfilteran Air
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <i class="bi bi-arrow-down-square" style="margin-right: 15px; font-size:20px;"></i>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

            </div>
        </div>
        <div class="main-content flex-grow-1">
            @yield('content')
        </div>
    </div>
</body>

</html>
