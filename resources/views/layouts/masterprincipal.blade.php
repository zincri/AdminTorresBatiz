<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <!-- site metas -->
    <title>Torres Batiz</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- circle Animation css -->
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}">
    <!-- site icons -->
    <link rel="icon" href="images/favicon.ico" type="image/gif" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <!-- Site css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
    <!-- colors css -->
    <link rel="stylesheet" href="{{ asset('css/colors1.css') }}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    <!-- wow Animation css -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
    <!-- zoom effect -->
    <link rel='stylesheet' href="{{ asset('css/hizoom.css') }}">
    <!-- revolution slider css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/revolution/css/settings.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/revolution/css/layers.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/revolution/css/navigation.css') }}" />
    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = '6a6b7b437e080e2e15a481564fd618796a44fc44';
        window.smartsupp || (function(d) {
            var s, c, o = smartsupp = function() {
                o._.push(arguments)
            };
            o._ = [];
            s = d.getElementsByTagName('script')[0];
            c = d.createElement('script');
            c.type = 'text/javascript';
            c.charset = 'utf-8';
            c.async = true;
            c.src = 'https://www.smartsuppchat.com/loader.js?';
            s.parentNode.insertBefore(c, s);
        })(document);
    </script>
    @php
        $count = 0;
    @endphp
    @if(\Session::has('cart'))
    @php
        $count = count(\Session::get('cart'));
    @endphp
    <style>
        .shoppingCartItem span{
            visibility: {{$count>0 ? 'visible' : 'hidden'}} !important;
        }
    </style>
    
    @endif
</head>

<body id="default_theme" class="home_1 shopping-cart">
    <!-- loader -->
    <div class="bg_load"> <img class="loader_animation" src="{{asset('images/logoTorres.png')}}" alt="#" /> </div>
    <!-- end loader -->
    <!-- header -->
    <header id="default_header" class="header_style_1">
        <!-- header top -->
        <div class="header_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-9">
                        <div class="full">
                            <div class="topbar-left">
                                <ul class="list-inline">
                                    <li> <span class="topbar-label"><i class="fa  fa-home"></i></span> <span class="topbar-hightlight">{{session('informacion')->direccion}}</span> </li>
                                    <li> <span class="topbar-label"><i class="fa fa-envelope-o"></i></span> <span class="topbar-hightlight"><a href="mailto:{{session('informacion')->email}}">{{session('informacion')->email}}</a></span> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 right_section_header_top">
                        <div class="float-right">
                            <div class="social_icon">
                                <ul class="list-inline">
                                    <!--Controlar que no se desborde de redes sociales -->
                                    @foreach(session('redes') as $item)
                                    <li>
                                        <a class="{{$item->icono}}" href="{{$item->url}}" title="{{$item->nombre}}" target="_blank"></a>
                                    </li>
                                    @endforeach
                                    <!--Controlar que no se desborde de redes sociales -->
                                    <li class="shoppingCartItem">
                                        <a href="{{ route('cart-show') }}"><i class="fa fa-shopping-cart"></i><span id="numeroCompras">{{$count}}</span></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header top -->
        <!-- header bottom -->
        <div class="header_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
                        <!-- logo start -->
                        <div class="logo">
                            <a href="/"><img src="{{asset('images/logos/logo.svg')}}" alt="logo" /></a>
                        </div>
                        <!-- logo end -->
                    </div>
                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                        <!-- menu start -->
                        <div class="menu_side">
                            <div id="navbar_menu">
                                <ul class="first-ul">
                                    <li>
                                        <a href="/">Inicio</a>
                                    </li>
                                    <li><a href="/nosotros">Nosotros</a></li>
                                    <li>
                                        <a href="/productos">Catálogo de productos</a>

                                    </li>
                                    <li>
                                        <a href="/arrendamiento">Arrendamiento</a>

                                    </li>
                                    <li>
                                        <a href="/soporte">Soporte</a>
                                    </li>
                                    <li>
                                        <a href="/consumibles">Consumibles</a>

                                    </li>
                                    <li>
                                        <a href="/sucursales">Sucursales</a>

                                    </li>
                                    <li>
                                        <a href="/noticias">Noticias</a>

                                    </li>
                                    <li><a href="/contacto">Contacto</a></li>
                                </ul>
                            </div>
                            <div class="search_icon">
                                <ul>
                                    <li><a href="#" data-toggle="modal" data-target="#search_bar"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- header bottom end -->
    </header>
    <!-- end header -->

    <!--***************************************************************************************-->


    @yield('content')



    <!--***************************************************************************************-->

    <!-- footer -->
    <footer class="footer_style_2 footer_blog">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="main-heading left_text">
                        <h2>Torres Batiz</h2>
                    </div>
                    <p>{{session('informacion')->descripcion}}</p>
                    <!-- Controlar que no se desborde el foreach -->
                    <ul class="torresListFooter">
                        @foreach(session('servicios') as $item)
                        <li>{{$item->servicio}}</li>
                        @endforeach
                    </ul>
                    <!-- Controlar que no se desborde el foreach -->

                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="main-heading left_text">
                                <h2>Links de interes</h2>
                            </div>
                            <ul class="footer-menu">
                                <li><a href="/nosotros"><i class="fa fa-angle-right"></i>Nosotros</a></li>
                                <li><a href="/arrendamiento"><i class="fa fa-angle-right"></i>Arrendamiento</a></li>
                                <li><a href="/sucursales"><i class="fa fa-angle-right"></i>Nuestras Sucursales</a></li>
                                <li><a href="/productos"><i class="fa fa-angle-right"></i>Catalogos</a></li>
                                <li><a href="/noticias"><i class="fa fa-angle-right"></i>Noticias</a></li>
                            </ul>
                        </div>
                        <!-- Controlar que no se desborde el foreach -->
                        <div class="col-md-5">
                            <div class="main-heading left_text">
                                <h2>Contactos Torres Batiz</h2>
                            </div>
                            <ul class="footer-menu">
                                @foreach(session('sucursales') as $item)
                                <li><i class="fa fa-angle-right"></i> {{$item->nombre}} -
                                    <span style="font-size:18px;"><a href="tel:{{$item->telefono}}">{{$item->telefono}}</a></span><br>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-3 contactosFooter">
                            <div class="main-heading left_text">
                                <h2>Contáctenos</h2>
                            </div>
                            <p>Envíenos un formulario y especifique su necesidad</p>
                            <a href="/contacto"><button type="button">Ir a Contactos</button></a>
                        </div>
                        <!-- Controlar que no se desborde el foreach -->

                    </div>
                </div>

                <div class="cprt">
                    <p>Designs by <a href="http://creativasoftline.com">Creativa Softline</a> All rights reserved.</p>
                </div>
            </div>
        </div>
        <div class="row">

            <ul class="social_icons">
                <li class="social-icon fb"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li class="social-icon tw"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li class="social-icon gp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            </ul>


        </div>
    </footer>
    <!-- end footer -->
    <!-- js section -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- menu js -->
    <script src="{{ asset('js/menumaker.js')}}"></script>
    <!-- wow animation -->
    <script src="{{ asset('js/wow.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- revolution js files -->
    <script src="{{ asset('css/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('css/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('css/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('css/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('css/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('css/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('css/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('css/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('css/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('css/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('css/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
    <!-- map js -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ"></script>
    <!--script>
         // This example adds a marker to indicate the position of Bondi Beach in Sydney,
         // Australia.
         AQUI IBA
        
       </script>-->

    <!-- google map js -->
    @stack('script')
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('js/TimelineMax.min.js') }}"></script>
    <script src="{{ asset('js/ScrollMagic.js') }}"></script>
    <script src="{{ asset('js/DrawSVGPlugin.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>
    <script src="{{ asset('js/layoutAnimate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/media.js') }}"></script>
    @stack('zoomScript_js') @stack('validacion') @stack('validacionconsumibles') @stack('validacioncontacto') @stack('tabs_function')
    <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
    -->
    <!-- end google map js -->
   
</body>

</html>