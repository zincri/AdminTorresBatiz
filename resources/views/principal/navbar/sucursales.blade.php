@extends ('layouts.masterprincipal') 
@section ('content')

<!-- inner page banner -->
<div id="inner_banner" style="background-image: url('{{$informaciongeneral->imagenbannersecundario}}')" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">Sucursales</h1>
                            <ol class="breadcrumb">
                                <li><a href="/">Inicio</a></li>
                                <li class="active">Sucursales</li>
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
<div class="section padding_layout_1" style="margin-bottom: 2%">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_center">
                        <h2><span>Sucursales</span></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-container">
            <div class="bd-example bd-example-tabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                
                    @foreach($sucursales as $key => $item)
                    <li class="nav-item">
                        <a class="nav-link {{ $key==0 ? 'active show' : ''}}" id="sucursal{{ $item->id }}" data-toggle="tab" href="#sucursal_{{$item->id}}" role="tab" aria-controls="home" aria-selected="{{$key==0 ? 'true' : 'false'}}">{{$item->nombre}}</a>
                    </li>
                    @endforeach
                    
                   
                </ul>
                <div class="tab-content" id="myTabContent">
                    @foreach($sucursales as $key => $item)

                   
                    <div class="tab-pane fade {{ $key==0 ? 'active show' : ''}}" id="sucursal_{{$item->id}}" role="tabpanel" aria-labelledby="sucursal{{ $item->id }}-tab">
                        <div class="mapcontainer">
                            <div class="contend">
                                <div class="service_blog sucursal">
                                    <div class="service_img">
                                        <iframe src="{{$item->urlgooglemaps}}" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                    <div class="service_head">
                                        <h5><a href="#">{{$item->direccion}}</a></h5>
                                        <h6>
                                            <ul class="torresList">
                                                <li>{{$item->telefono}}</li>
                                            </ul>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    
                   
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
                                <div class="testimonial-container">
                                    <iframe width="100%" height="315" src="{{$informaciongeneral->videoprincipal}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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

@endsection

@push('tabs_function')
<script>

</script>
@endpush