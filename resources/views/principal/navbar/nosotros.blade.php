@extends ('layouts.masterprincipal') @section ('content')
<style>
    
.gross_layout.right_gross_layout::after {
    position: absolute;
    background: url(../images/layout_img/dark_bg_img2.png) !important;
    width: 35%;
    height: 100%;
    left: 0;
    content: "";
    top: 0;
    background-size: cover;
    background-position: right;
}
</style>
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">Nosotros</h1>
                            <ol class="breadcrumb">
                                <li><a href="/">Inicio</a></li>
                                <li class="active">Nosotros</li>
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
<div class="section padding_layout_1 light_silver gross_layout right_gross_layout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="full">
                    <div class="main_headingr text_align_center tituloNosotros">
                        <h1><span>29 años comprometidos con la calidad y el servicio</span></h1>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_right">
                        <h2>Misión</h2>
                        <p class="large"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-12 col-lg-8 text-align_right">
                <div class="full large_cont_p">
                    <p>{{$informaciongeneral->mision}}<br> <br>
                    </p>
                    <h2 class="main_heading text_align_right">Visión</h2>
                    <p>{{$informaciongeneral->vision}}
                    </p>
                    <h2 class="main_heading text_align_right">Objetivos</h2>
                    <p>{{$informaciongeneral->objetivos}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->
<div class="fb-comments" data-width="100%" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>

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
                        <li><img class="img-responsive2" src="{{$item->imagen}}" alt="#" /></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Model search bar -->
</div>

@endsection