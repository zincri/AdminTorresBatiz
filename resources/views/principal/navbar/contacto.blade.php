@extends ('layouts.masterprincipal') 
@section ('content')

<!-- map -->

<div class="map-container column-map left-pos-map">

    <div class="map_section">
        <div id="map"></div>
    </div>
</div>
<!-- end map -->
<!-- section -->
<div class="section padding_layout_1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_center">
                        <h2><span>Mantente en contacto</span></h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="full">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contant_form">

                            <div class="form_section formularioArrendatario">
                                {!! Form::open(array('url' => 'contacto','autocomplete'=>'off','method'=>'POST', 'onsubmit'=>'return validarsend();')) !!} {{Form::token()}}
                                <div class="row formularioArrendatario">


                                    <div class="col-md-6">
                                        <div class="groupForm">
                                            <label for="nombre">Nombre:</label>
                                            <div class="input-group nombreGroup">
                                                <input type="text" id="nombre" name="nombre" max="48" min="1" placeholder="Ingrese su nombre aquí. (Campo obligatorio)">
                                                <span id="nombreOK" style="color:red" class="help-block"></span>
                                            </div>

                                        </div>
                                        <div class="groupForm">
                                            <div class="input-group asuntoGroup">
                                                <label for="asunto">Asunto:</label>
                                                <input id="asunto" type="text" name="asunto" max="40" placeholder="Ingrese su asunto. (Campo obligatorio)">
                                                <span id="asuntoOK" style="color:red" class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="groupForm">
                                            <div class="input-group telefonoGroup">
                                                <label for="telefono">Teléfono:</label>
                                                <input type="text" id="telefono" name="telefono" max="20" placeholder="+52 ... (Campo obligatorio)">
                                                <span id="telefonoOK" style="color:red" class="help-block"></span>
                                                <small>Mínimo 7 caracteres (de preferencia incluya lada local)</small>
                                            </div>
                                        </div>
                                        <div class="groupForm">
                                            <div class="input-group correoGroup">
                                                <label for="email">Correo electrónico:</label>
                                                <input type="email" id="email" name="email" max="48" placeholder="ejemplo@dominio.com (Campo obligatorio)">
                                                <span id="emailOK" style="color:red" class="help-block"></span>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="groupInputs">
                                            <p class="descArrendamiento">Porfavor, mándenos un mensaje especificando su necesidad y nosotros nos comunicaremos posteriormente con usted. (Campo obligatorio)</p>
                                            <div class="input-group ">
                                                <div class="input-group mensajeGroup">
                                                    <textarea id="mensaje" name="mensaje" max="1498" placeholder="Ingrese su mensaje aquí"></textarea>
                                                    <span id="mensajeOK" style="color:red" class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit">Enviar formulario</button>

                                    </div>

                                </div>



                                {!! Form::close() !!}

                            </div>

                        </div>
                    </div>
                    <!--FIN FORMULARIO-->
                </div>
            </div>
        </div>
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
@endsection @push('validacioncontacto')
<script type="text/javascript" src="{{asset('js/mapa_inicio.js')}}"></script>
<script type="text/javascript" src="{{asset('js/validarcontacto.js')}}"></script>
@endpush