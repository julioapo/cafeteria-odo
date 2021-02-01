<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">        
    <!-- Mobile Specific Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">        
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="stylesheet" href="http://www.cafeteria-odo.local/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="http://www.cafeteria-odo.local/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="http://www.cafeteria-odo.local/vendor/adminlte/dist/css/adminlte.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @yield('css')
</head>
<body class="sidebar-mini">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">            
        <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contactanos</a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">@yield('header_nav1')</li>
        </ul>
    </nav>
    <div class="content-wrapper ">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title_module')</h1>
                    </div>
                </div>
            </div>
            <section class="content">                
                    @yield('content')                
            </section>
        </div>
    </div>    
    <script src="http://www.cafeteria-odo.local/vendor/jquery/jquery.min.js"></script>
    <script src="http://www.cafeteria-odo.local/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://www.cafeteria-odo.local/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="http://www.cafeteria-odo.local/vendor/adminlte/dist/js/adminlte.min.js"></script>    
    @yield('scripts')    
</body>
</html>