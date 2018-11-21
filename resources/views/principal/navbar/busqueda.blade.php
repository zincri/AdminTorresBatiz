@extends('layouts.masterprincipal')

@section('content')

<!-- inner page banner -->
<div id="inner_banner" style="background-image: url('{{$informaciongeneral->imagenbannersecundario}}')" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">Resultados de Búsqueda</h1>
                            <ol class="breadcrumb">
                                <li><a href="/">Inicio</a></li>
                                <li class="active">Búsqueda</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end inner page banner -->
<!-- section -->
<div class="section padding_layout_1 blog_grid">
    <div class="container">
        <div class="row">
        <div class="col-md-8">
            <h3>Resultados de búsqueda</h3>
            <div class="busquedaContainer">
                    <a href="">
                    <p>Escritorio metálico 4 Gavetas | Marca: Gebesa | Categoría: Mobiliario metálico</p>
                    <p>RELOJ CHECADOR 1600E * GRAN PANTALLA LCD QUE MUESTRA LA FECHA, HORARIO Y DE LA SEMANA,* NO REQUIERE REINICIO EN PERDIDAS DE ENERGIA.</p>
                    </a>
            </div>
            @foreach ($productos as $item)
                <div class="busquedaContainer">
                    <a href="{{ route('producto-detalle',[$item->idProducto]) }}">
                        <p>{{$item->nombreProducto}} | Marca: {{$item->marcaProducto}} | Categoría: {{$item->categoria}}</p>
                        <p>{{ $item->descProducto }}</p>
                    </a>
                </div>
            @endforeach
            
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-left">
            <div class="side_bar">
                <div class="side_bar_blog">
                    <h4>Noticias recientes</h4>
                    <p>{{$noticia->descripcion}}
                    </p>
                    <p class="enlaceBlog"><a href="/noticias">Ver más</a></p>
                </div>
                <div class="side_bar_blog">
                    <h4>Vídeo Destacado</h4>
                    <div class="recent_post">
                        <ul>
                            <li>
                                <p class="post_head"><a href="#">Video</a></p>
                                <iframe width="100%" height="315" src="{{$informaciongeneral->videoprincipal}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hz>

            <div class="row paginationPart">
                   <!-- Insertar paginación -->
                </div>
        </div>
    </div>
</div>
<!-- end section -->
<!-- section -->
<div class="section padding_layout_1 testmonial_section white_fonts">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="full">
                    <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#testimonial_slider" data-slide-to="0" class="active"></li>
                            @foreach($videos as $item)
                            <li data-target="#testimonial_slider" data-slide-to="{{$item->id}}"></li>
                            @endforeach
                            <!-- <li data-target="#testimonial_slider" data-slide-to="1"></li>
                                       <li data-target="#testimonial_slider" data-slide-to="2"></li> -->
                        </ul>
                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="testimonial-container"><iframe width="100%" height="315" src="{{$informaciongeneral->videoprincipal}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>
                            @foreach($videos as $item)
                            <div class="carousel-item">
                                <div class="testimonial-container">
                                    <iframe width="100%" height="315" src="{{$item->video}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    <div class="testimonial-content">
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="full"> </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->
<!-- section -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="contact_us_section">
                        <div class="call_icon"> <img src="images/layout_img/phone_icon.png" alt="#" /> </div>
                        <div class="inner_cont">
                            <h2>Si tiene alguna duda, contáctenos</h2>
                            <p>Puede comunicarse con nosotros al teléfono <strong>{{$informaciongeneral->telefono}}</strong>. O llene una solicitud dando click en Contáctenos</p>
                        </div>
                        <div class="button_Section_cont"> <a class="btn dark_gray_bt" href="/contacto">Contáctenos</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->
<!-- section -->
<div class="section padding_layout_1" style="padding: 50px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <ul class="brand_list">
                    @foreach($marcas as $item)
                        <li style="background-image: url({{$item->imagen}})"></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Model search bar -->

@endsection