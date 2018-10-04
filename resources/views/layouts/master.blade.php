<!DOCTYPE html>
<html lang="en">
    <head>        
            <!-- META SECTION -->
            <title>Torres Batiz</title>            
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            
            <link rel="icon" href="{{ asset('favicon.ico')}}" type="image/x-icon" />
            <!-- END META SECTION -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
            <!-- CSS INCLUDE -->        
            <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/theme-torres.css')}}"/>
            <!-- EOF CSS INCLUDE -->   
            <link rel="stylesheet" href="{{ asset('css/font-awesome.css')}}">
            
            
            <style>
            
	select{
		font-family: fontAwesome
	}
	.oculto {width:100%;background:#f2f2f2;border-radius:0 0 10px 10px;padding:10px;overflow:auto;max-height:200px;display:none}
		.oculto ul {display:inline;float:left;width:100%;margin:0;padding:0}
			.oculto ul li {margin:0;padding:0;display:block;width:30px;height:30px;text-align:center;font-size:15px;font-family:"fontawesome";float:left;cursor:pointer;color:#666;line-height:30px;transition:0.2s all}
			.oculto ul li:hover {background:#FFF;color:#000}
		.oculto input[type=text] { font-size:13px;padding:5px;margin:0 0 10px 0;border:1px solid #ddd; }
	
</style>                              
    </head>
    

    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="home">Torres Batiz</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="{{asset('images/logogo.jpg')}}" alt="Torres Betiz"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="{{asset('images/logogo.jpg')}}" alt="Torres Batiz"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">{{ Auth::user()->name }}</div>
                                <div class="profile-data-title">Administrador</div>
                            </div>
                            <div class="profile-controls">
                                <a href="{{  url('administrador/informacion')  }}" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="{{  url('administrador/mensajes')  }}" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Menu de opciones</li>
                                       
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-sort-desc"></span> <span class="xn-text">Informacion</span></a>
                        <ul>
                            <li><a href="{{  url('administrador/informacion')  }}"><span class="fa fa-image"></span> Informacion General</a></li>
                            <li><a href="{{  url('administrador/listaservicios')  }}"><span class="fa fa-image"></span> Lista de servicios</a></li>
                            <li><a href="{{  url('administrador/slider')  }}"><span class="fa fa-image"></span> Presentaciones de inicio</a></li>
                            <li><a href="{{  url('administrador/proyectos')  }}"><span class="fa fa-image"></span> Proyectos realizados</a></li>
                            <li><a href="{{  url('administrador/infoASC')  }}"><span class="fa fa-image"></span> Arrendamiento, Soporte y Consumibles</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-sort-desc"></span> <span class="xn-text">Noticias</span></a>
                        <ul>
                            <li><a href="{{  url('administrador/noticias')  }}"><span class="fa fa-image"></span> Ver Noticias</a></li>
                        </ul>
                    </li>
                    
                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-sort-desc"></span> <span class="xn-text">Productos</span></a>
                         <ul>
                            <li><a href="{{  url('administrador/categorias')  }}"><span class="fa fa-image"></span> Categorias</a></li>
                            <li><a href="{{  url('administrador/productos')  }}"><span class="fa fa-image"></span> Productos</a></li>

                                                             
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-sort-desc"></span> <span class="xn-text">Promociones</span></a>
                         <ul>
                            <li><a href="{{ url('administrador/promociones') }}"><span class="fa fa-image"></span> Lista de promociones</a></li>
                                                             
                        </ul>
                    </li>     
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-sort-desc"></span> <span class="xn-text">Marcas</span></a>
                         <ul>
                            <li><a href="{{  url('administrador/marcas')  }}"><span class="fa fa-image"></span> Nuestras marcas</a></li>
                                                             
                        </ul>
                    </li>               
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-sort-desc"></span> <span class="xn-text">Sucursales</span></a>
                         <ul>
                            <li><a href="{{  url('administrador/sucursales')  }}"><span class="fa fa-image"></span> Nuestras sucursales</a></li>
                                                         
                        </ul>
                    </li>

                    <?php

                    // CÓDIGO PARA CONTROLAR LOS PUNTOS DE MENSAJES
                    $iconoGeneral = false;
                    $showMensajes = false;
                    $showArrendamiento = false;
                    $showConsumibles = false;
                    $showCarrito = false;
                    $iconoMensajes = DB::table('tbl_contacto')->where('activo','=',1)->where('visto','=',0)->get();
                    $iconoArrendamiento = DB::table('tbl_solicitud')->where('activo','=',1)->where('visto','=',0)->get();
                    $iconoConsumibles = DB::table('tbl_solicitudconsumibles')->where('activo','=',1)->where('visto','=',0)->get();
                    $iconoCarrito = DB::table('tbl_solicitudcart')->where('activo','=',1)->where('visto','=',0)->get();
                    // dd(count($iconoMensajes));
                    if(count($iconoArrendamiento) != 0 || count($iconoCarrito) != 0 || count($iconoConsumibles) != 0 || count($iconoMensajes) != 0){
                      $iconoGeneral = true;
                    }
                    if(count($iconoArrendamiento) != 0){
                        $showArrendamiento = true;
                    }
                    if(count($iconoCarrito) != 0){
                        $showCarrito = true;
                    }
                    if(count($iconoConsumibles) != 0){
                        $showConsumibles = true;
                    }
                    if(count($iconoMensajes) != 0){
                        $showMensajes = true;
                    }

                    

                    ?>


                    <li class="xn-openable mensajesMenu">
                        <span class="{{$iconoGeneral == true ? 'notificationIcon' : 'notificationIcon disabled'}}"></span>
                        <a href="#"><span class="fa fa-sort-desc"></span> <span class="xn-text">Solicitudes</span></a>
                         <ul>
                            <li>
                                <span class="{{$showMensajes == true ? 'pendienteIcon' : 'pendienteIcon disabled'}}"></span>
                                <a href="{{  url('administrador/mensajes')  }}"><span class="fa fa-image"></span> Mensajes</a></li>
                            <li>
                                <span class="{{$showArrendamiento == true ? 'pendienteIcon' : 'pendienteIcon disabled'}}"></span>
                                <a href="{{  url('administrador/arrendamiento')  }}"><span class="fa fa-image"></span> Solicitudes arrendamiento</a></li>
                            <li>
                                <span class="{{$showConsumibles == true ? 'pendienteIcon' : 'pendienteIcon disabled'}}"></span>
                                <a href="{{  url('administrador/consumibles')  }}"><span class="fa fa-image"></span> Solicitudes consumibles</a></li>
                            <li>
                                <span class="{{$showCarrito == true ? 'pendienteIcon' : 'pendienteIcon disabled'}}"></span>
                                <a href="{{  url('administrador/carrito')  }}"><span class="fa fa-image"></span> Solicitudes del carrito</a></li>
                                                             
                        </ul>
                    </li>   
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-sort-desc"></span> <span class="xn-text">Usuarios</span></a>
                         <ul>
                            <li><a href="{{  url('administrador/usuarios')  }}"><span class="fa fa-image"></span> Usuarios registrados</a></li>
                                                         
                        </ul>
                    </li>      
                         
                    
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->

            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                                               
                                    <a class="mb-control" data-box="#mb-signout">
                                                     <span class="fa fa-sign-out"></span>

                                        
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    </li> 
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <?php
                        /*CODIGO PHP*/ /*CODIGO PHP*//*CODIGO PHP*//*CODIGO PHP*//*CODIGO PHP*//*CODIGO PHP*//*CODIGO PHP*/
                            $mensajes=DB::table('tbl_contacto')->where('activo','=',1)->where('visto','=',0)->get();
                                $rows= count($mensajes);
                                if($rows != 0){
                                    session()->put('mensajes', $mensajes);
                                }
                                else{
                                    session()->forget('mensajes');
                                }
                        /*CODIGO PHP*//*CODIGO PHP*//*CODIGO PHP*//*CODIGO PHP*//*CODIGO PHP*//*CODIGO PHP*//*CODIGO PHP*/
                        ?>
                        <a href="#"><span class="fa fa-comments"></span></a>
                        <div class="informer informer-danger">{{ session('mensajes')? count(session('mensajes')) : 0 }}</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-comments"></span> Mensajes</h3>                                
                                <div class="pull-right">
                                    <span class="label label-danger">{{ session('mensajes')? count(session('mensajes')) : 0}}</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                   
                                @if( session('mensajes') )
                                @foreach(session('mensajes') as $item)
                                <a href="{{ URL::action('MensajesController@show',$item->id)}}" class="list-group-item">
                                    <div class="list-group-status status-online"></div>
                                    <img src="{{asset('images/users/user2.jpg')}}" class="pull-left" alt="John Doe"/>
                                    <span class="contacts-title">{{$item->nombre}}</span>
                                    <p>{{$item->mensaje}}</p>
                                </a>
                                @endforeach
                                
                                @endif
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="{{  url('administrador/mensajes')  }}">Todos los mensajes</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END MESSAGES -->
                    <!-- TASKS -->
                    <!--
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-tasks"></span></a>
                        <div class="informer informer-warning">3</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>                                
                                <div class="pull-right">
                                    <span class="label label-warning">3 active</span>
                                </div>
                            </div>
                            <div class="panel-body list-group scroll" style="height: 200px;">                                
                                <a class="list-group-item" href="#">
                                    <strong>Phasellus augue arcu, elementum</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Aenean ac cursus</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
                                    </div>
                                    <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2014 / 80%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Lorem ipsum dolor</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 23 Sep 2014 / 95%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Cras suscipit ac quam at tincidunt.</strong>
                                    <div class="progress progress-small">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 21 Sep 2014 /</small><small class="text-success"> Done</small>
                                </a>                                
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-tasks.html">Show all tasks</a>
                            </div>                            
                        </div>                        
                    </li>
                    -->
                    <!-- END TASKS -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active">Dashboard</li>
                </ul>
                <!-- END BREADCRUMB -->    
                
                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <!-- START WIDGETS -->                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                    <div class="panel-heading">                                
                                        <h3 class="panel-title">Torres Batiz</h3>
                                        <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                        </ul>                                
                                    </div>

                                
                                    @yield('content')
                               
                            </div>
                        
                        </div>
                    </div>
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Cerrar <strong>Sesion</strong> ?</div>
                    <div class="mb-content">
                    



                        <p>¿Estás seguro de que quieres desconectarte?</p>                    
                        <p>Presione No si desea continuar trabajando. Presione Sí para desconectarse del usuario actual.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right signOutAlert">
                        
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-success btn-lg">Si</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            
                            </form>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="{{asset('audio/alert.mp3')}}" preload="auto"></audio>
        <audio id="audio-fail" src="{{asset('audio/fail.mp3')}}" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
        <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="{{ asset('js/plugins/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/plugins/jquery/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap.min.js')}}"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src="{{ asset('js/plugins/icheck/icheck.min.js')}}"></script>        
        <script type="text/javascript" src="{{ asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>
        
       

        <script type="text/javascript" src="{{ asset('js/plugins/morris/raphael-min.js')}}"></script>
            
        <script type="text/javascript" src="{{ asset('js/plugins/rickshaw/d3.v3.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/plugins/rickshaw/rickshaw.min.js')}}"></script>
        <script type='text/javascript' src="{{ asset('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script type='text/javascript' src="{{ asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>                
        <script type='text/javascript' src="{{ asset('js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>                
        <script type="text/javascript" src="{{ asset('js/plugins/owl/owl.carousel.min.js')}}"></script>                 
        <script type="text/javascript" src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/plugins/moment.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
      
        
        <script type="text/javascript" src="{{ asset('js/plugins.js')}}"></script>        
        <script type="text/javascript" src="{{ asset('js/actions.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/plugins/fileinput/fileinput.min.js')}}"></script>        
        @stack('select')

        @stack('mapa')
        @stack('clickableRow')
        @stack('addProductsToPromo')

        <!-- END TEMPLATE -->
        <!-- END SCRIPTS -->         
    </body>
</html>

