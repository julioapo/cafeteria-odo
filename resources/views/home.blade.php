@extends('layouts.template')

@section('title',' Pagina Inicio')

@section('pageClass', "data-spy='scroll' data-target='#navbar-menu' data-offset='100'")

@section('content')
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_four"></div>
                <div class="object" id="object_five"></div>
                <div class="object" id="object_six"></div>
                <div class="object" id="object_seven"></div>
                <div class="object" id="object_eight"></div>
                <div class="object" id="object_big"></div>
            </div>
        </div>
    </div>
    <!--End Preloader -->
    <!-- Navbar -->
    <nav class="navbar navbar-default bootsnav no-background navbar-fixed black">
        <div class="container">            
            <div class="attr-nav">
                <ul>                    
                    <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
                </ul>
            </div>                        
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img src="images/logo_small.png" class="logo" alt=""></a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="#">@include('order.state')</a>
            </div>
            @guest
                @if (Route::has('login'))
                    <div class="navbar-header">
                        <a class="navbar-brand" style="color: #ffffff;font-weight:bold;font-size: 16px" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </div>
                @endif                            
                @if (Route::has('register'))
                    <div class="navbar-header">                                    
                        <a class="navbar-brand" style="color: #ffffff;font-weight:bold;font-size: 16px" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </div>
                @endif
            @else
                <div class="navbar-header">                    
                    <a class="navbar-brand" style="color: #ffffff;font-weight:bold;font-size: 16px" href="#">Hola!! {{ Auth::user()->name }}</a>
                            <a class="navbar-brand" style="color: #ffffff;font-weight:bold;font-size: 16px" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Puedes cerrar tu Session
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </div>
            @endguest
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('order.order') }}">@include('order.active')</a>
            </div>
            <!-- End Header Navigation -->
        </div>

        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <div class="widget">
                <h6 class="title">Menu</h6>
                <ul class="link">
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="#">Reserve su mesa</a></li>
                    <li><a href="#">Menus</a></li>
                    <li><a href="#">Pedir Ahora</a></li>
                    <li><a href="#">Contactenos</a></li>
                    <li><a href="#">Administrar</a></li>
                    <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>                    
                </ul>
            </div>
        </div>
        <!-- End Side Menu -->
    </nav>

    <!-- Header -->
    <header id="hello">
        <!-- Container -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="banner">
                        <!--<h3>-llegaste a-</h3>-->
                        <h1>CAFETERIA UNIVERSIDAD DE LA REPUBLICA</h1>

                        <div class="info_btn_shadow">
                            <a href="{{ route('order.index') }}" class="info_btn">Haga su Pedido </a>
                        </div>

                        <div class="inner_banner">
                            <div class="banner_content">
                                <p>Este bocadillo rebosante de carne, la humilde pero vistosa especialidad de Uruguay, es una de las maneras más económicas y apetitosas de degustar la famosa ternera del país sureño.</p>
                                <p>*Basada en el peso de la hamburguesa precocida.</p>							
                            </div>
                            <div class="stamp">
                                <img src="images/stampII.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Container end -->
        <p class="caption">*Limited Time Only</p>
    </header><!-- Header end -->

    <!-- Block Content -->
    <section id="block">
        <div class="container">

            <div class="row">
                @foreach ($today_menu as $menu)
                    <div class="col-sm-6">

                        <div class="classic" style="background-image:url('{{ $menu->photo_file }}')">
                        <!--<div class="classic" style="background-image:url('images/imagenes_menus/postres.jpeg')">-->
                            
                            <a href="" class="classic_btn">Ordenar</a>

                            <div class="overlay">
                                <h3>{{ $menu->name_product }}</h3>

                                <p class="overlay_content">{{ $menu->commentary }}</p>
                            </div>
                        </div>
                    </div>                
                @endforeach
            <!-- First section -->
            </div><!-- first section end -->

            <!-- Third section -->
            <!-- Carousel -->
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                    <li data-target="#carousel" data-slide-to="3"></li>
                </ol>

                <!-- carousel inner -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="images/cafeteria_instituto_de_higiene.jpg" alt="Burger">

                        <div class="carousel-caption">
                            <h2>Cafetería Instituto de Higiene</h2>
                            <h3>TEL. 24815969<h3>

                            <p>GRAL LAS HERAS 1925.</p>

                        </div>
                    </div>
                    <div class="item">
                        <img src="images/cafeteria_facultad_de_ciencias.jpg" alt="Burger">

                        <div class="carousel-caption">
                            <h2>Cafetería Facultad de Ciencias</h2>
                            <h3>TEL. 24815969<h3>

                            <p>GRAL LAS HERAS 1925.</p>

                        </div>
                    </div>
                    <div class="item">
                        <img src="images/cafeteria_facultad_odontologia.jpg" alt="Burger">

                        <div class="carousel-caption">
                            <h2>Cafeteria Facultad de Odontología</h2>   
                            <h3>TEL. 24815969<h3>

                            <p>GRAL LAS HERAS 1925.</p>

                        </div>
                    </div>
                    <div class="item">
                        <img src="images/colegio_san_ignacio.jpg" alt="Burger">

                        <div class="carousel-caption">
                            <h2>Cafeteria Colegio San Ignacio</h2>   
                            <h3>TEL. 24815969<h3>

                            <p> GRAL LAS HERAS 1925.</p>

                        </div>                        
                    </div>
                </div><!-- carousel inner end -->
            </div><!-- Carousel end-->

            <!-- Forth section -->
            <div class="row forth_sec">
                <div class="col-sm-4">
                    <div class="menu">
                        <div class="inner_content">                                
                            <a href="" class="classic_btn">menus</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="drinks">
                        <div class="inner_content">                                
                            <!--<h2>guarniciones</h2>-->
                            <a href="" class="classic_btn">guarniciones</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="sides">
                        <div class="inner_content">
                            <a href="" class="classic_btn">postres</a>
                        </div>
                    </div>
                </div>
            </div><!-- forth section end -->
        </div>
    </section><!-- Block Content end-->

    <!-- Lock -->
    <section id="lock">
        <h2>SALON CAFETERIA Y RESTAURANTE</h2>
        <p>Ambiente Climatizado, Servicio de bufet, horario de apertura y la dirección de ubicación a continuación. realize su pedido Ya.</p>
        <p>Servicio de entrega a domicilio.</p>
    </section>

    <!-- Map -->
    <div id="ourmaps"></div>

    <!-- Footer -->
    <footer>
        <!-- Container -->
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-sm-4 col-xs-12 col-lg-offset-1 pull-right">
                    <div class="subscribe">
                        <h4>Suscribete Ahora</h4>
                        <p>Subscribete y recibiras nuestro
                            menu cada semnana.</p>

                        <form role="form">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="email" class="form-control" id="em" placeholder="Enter your e-mail here">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn send_btn">
                                            <i class="glyphicon glyphicon-send"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="col-lg-3 col-sm-4 col-xs-12 col-lg-offset-1 pull-right">
                    <div class="contact_us">
                        <h4>Contactanos</h4>
                        <a href="">cantinaodontologia@gmail.com</a>

                        <address>
                            Dr. Alfredo Navarro 3051<br />
                            Parque Batlle <br />
                            Montevideo <br />
                        </address>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-4 col-xs-12 pull-right">
                    <div class="basic_info">
                        <a href=""><img class="footer_logo" src="images/footer_logo.png" alt="Burger" /></a>

                        <ul class="list-inline social">
                            <li><a href="" class="fa fa-facebook"></a></li>
                            <li><a href="" class="fa fa-twitter"></a></li>
                            <li><a href="" class="fa fa-instagram"></a></li>
                        </ul>

                        <div class="footer-copyright">
                            <p class="wow fadeInRight" data-wow-duration="1s">
                                Made with 
                                <i class="fa fa-heart"></i>
                                by 
                                <a target="_blank" href="http://bootstrapthemes.co">Bootstrap Themes</a> <br /> 
                                2016. All Rights Reserved
                            </p>
                        </div>					
                    </div>
                </div>

            </div>
        </div><!-- Container end -->
    </footer><!-- Footer end -->


    <!-- scroll up-->
    <div class="scrollup">
        <a href="#"><i class="fa fa-chevron-up"></i></a>
    </div><!-- End off scroll up -->
@endsection