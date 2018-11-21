@extends ('layouts.masterprincipal') @section ('content')
<!-- inner page banner -->
<div id="inner_banner" style="background-image: url('{{$informaciongeneral->imagenbannersecundario}}')" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">{{$categoriaActual}}</h1>
                            <ol class="breadcrumb">
                                <li><a href="/">Inicio</a></li>
                                <li class="active">{{$categoriaActual}}</li>
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
<div class="section padding_layout_1 product_list_main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row productosList">
                    @foreach($productos as $key => $item)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                        <a href="{{ route('producto-detalle',[$item->id]) }}">
                            <div class="product_list">
                                <div class="product_img"> <img class="img-responsive" src="{{ asset($item->imagen) }}" alt=""> </div>
                                <div class="product_detail_btm">
                                    <div class="center">
                                        <h4>{{$item->nombre}}</h4>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
                <div class="row paginationPart">
                    {{ $productos->links() }}
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
                            <li data-target="#testimonial_slider" data-slide-to="1"></li>
                            <li data-target="#testimonial_slider" data-slide-to="2"></li>
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
                        <div class="call_icon"> <img src="{{asset('images/layout_img/phone_icon.png')}}" alt="#" /> </div>
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
<!-- end section -->

@endsection