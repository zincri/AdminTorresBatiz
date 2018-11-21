@extends ('layouts.masterprincipal') @section ('content')

<!-- inner page banner -->
<div id="inner_banner" style="background-image: url('{{$informaciongeneral->imagenbannersecundario}}')" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">Consumibles</h1>
                            <ol class="breadcrumb">
                                <li><a href="/">Inicio</a></li>
                                <li class="active">Consumibles</li>
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
<div class="section padding_layout_1">
    <div class="container">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-left">
            <div class="row">
                <div class="col-md-12 service_blog margin_bottom_50" style="margin-top: 0; overflow: visible">
                    <div class="full">
                        <div class="service_img"> <img class="img-responsive" src="images/torresimages/img-consumibles.jpg" alt="#"> </div>
                        <div class="service_cont">
                        <h3 class="service_head"><a href="#">{{$info->titulo}}</a></h3>
                            <p>{{ $info->descripcion }}</p>
                            <p></p>
                            <div class="bt_cont">
                                <div class="formularioArrendatario">
                                    <p class="tituloFormulario">SOLICITUD DE CONSUMIBLES</p>
                                    <p class="descArrendamiento">Porfavor, llene el siguiente formulario</p>
                                    {!! Form::open(array('url' => 'consumibles','autocomplete'=>'off','method'=>'POST', 'onsubmit'=>'return validarsend();')) !!} {{Form::token()}}
                                    <div class="groupForm">
                                        <label for="nombre">Nombre:</label>
                                        <div class="input-group nombreGroup">
                                            <input id="nombre" type="text" name="nombre" placeholder="Ingrese su nombre aquí">
                                            <span id="nombreOK" style="color:red" class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="groupForm">

                                        <label for="empresa">Empresa:</label>
                                        <div class="input-group empresaGroup">
                                            <input id="empresa" type="text" name="empresa" placeholder="Ingrese el nombre de su empresa">
                                            <span id="empresaOK" style="color:red" class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="groupForm">
                                        <label for="telefono">Teléfono:</label>
                                        <div class="input-group telefonoGroup">
                                            <input id="telefono" type="text" name="telefono" placeholder="Ingrese su número telefónico">
                                            <span id="telefonoOK" style="color:red" class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="groupForm">
                                        <label for="email">Correo electrónico:</label>
                                        <div class="input-group correoGroup">
                                            <input id="email" type="email" name="email" placeholder="ejemplo@dominio.com">
                                            <span id="emailOK" style="color:red" class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="groupForm">
                                        <label for="modelo">Modelo de equipo:</label>
                                        <div class="input-group modeloGroup">
                                            <input id="modelo" type="text" name="modelo" placeholder="Ingrese modelo de equipo">
                                            <span id="modeloOK" style="color:red" class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="groupInputs">
                                        <p class="descArrendamiento">Porfavor, mándenos un mensaje especificando su necesidad y nosotros nos comunicaremos posteriormente con usted.</p>
                                        <div class="input-group mensajeGroup">
                                            <textarea id="mensaje" name="mensaje" placeholder="Ingrese su mensaje aquí"></textarea>
                                            <span id="mensajeOK" style="color:red" class="help-block"></span>
                                        </div>
                                    </div>
                                    <button type="submit">Enviar formulario</button> {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-left">
            <div class="side_bar">
                <div class="side_bar_blog">
                    <h4>Noticias recientes</h4>
                    <p>{{$noticia}}
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

@endsection @push('validacionconsumibles')
<script type="text/javascript" src="{{ asset('js/validarsolicitudconsumibles.js') }}"></script>
@endpush