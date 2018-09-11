@extends('layouts.master')

@section('content')
{!! $errors->first('erroregistro','
                    <div class="alert alert-danger">
                        <strong>Warning!</strong>Ocurrio un error, intentelo nuevamente por favor!
                    </div>
')!!}
<!-- START CONTENT FRAME -->
<div class="content-frame">                                    
    <!-- START CONTENT FRAME TOP -->
    <div class="content-frame-top">                        
        <div class="page-title">                    
            <h2><span class="fa fa-inbox"></span> Inbox <small>(3 unread)</small></h2>
        </div>                                                                                
        <!--
            <div class="pull-right">                            
                <button class="btn btn-default"><span class="fa fa-cogs"></span> Settings</button>
                <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
            </div>
        -->                        
    </div>
    <!-- END CONTENT FRAME TOP -->
    <!-- START CONTENT FRAME BODY -->
    <div class="content-frame"> <!-- Aqui quite -body -->
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <label class="check mail-checkall">
                    <input type="checkbox" class="icheckbox"/>
                </label>
                <!--
                <div class="btn-group">
                    <button class="btn btn-default"><span class="fa fa-mail-reply"></span></button>
                    <button class="btn btn-default"><span class="fa fa-mail-reply-all"></span></button>
                    <button class="btn btn-default"><span class="fa fa-mail-forward"></span></button>
                </div>
                -->
                <div class="btn-group">
                    <button class="btn btn-default"><span class="fa fa-star"></span></button>
                </div>
                <button class="btn btn-default"><span class="fa fa-trash-o"></span></button>                                                                    
                <div class="pull-right" style="width: 150px;">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
                        <input class="form-control datepicker" type="text" data-orientation="left"/>                                    
                    </div>
                </div>
            </div>
            <div class="panel-body mail">

                @foreach ($datos as $item)
                <div class="mail-item mail-unread mail-info">                                    
                        <div class="mail-checkbox">
                            <input type="checkbox" class="icheckbox"/>
                        </div>
                        <div class="mail-star">
                            <span class="fa fa-star-o"></span>
                        </div>
                        <div class="mail-user">{{$item->nombre}}</div>                                    
                            <a href="{{ URL::action('AdminArrendamientoController@show',$item->id)}}" class="mail-text">{{$item->empresa}}</a>                                    
                        <div class="mail-date">{{$item->fecha_ins}}</div>
                </div>
                @endforeach
                <!--
                
                <div class="mail-item mail-unread mail-danger">                                    
                    <div class="mail-checkbox">
                        <input type="checkbox" class="icheckbox"/>
                    </div>
                    <div class="mail-star">
                        <span class="fa fa-star-o"></span>
                    </div>
                    <div class="mail-user">John Doe</div>                                    
                    <a href="pages-mailbox-message.html" class="mail-text">New Windows 9 App</a>                                    
                    <div class="mail-date">Today, 10:36</div>
                </div>
                
                <div class="mail-item mail-success">
                    <div class="mail-checkbox">
                        <input type="checkbox" class="icheckbox"/>
                    </div>
                    <div class="mail-star">
                        <span class="fa fa-star-o"></span>
                    </div>
                    <div class="mail-user">Nadia Ali</div>                                    
                    <a href="pages-mailbox-message.html" class="mail-text">Check my new song</a>                                    
                    <div class="mail-date">Yesterday, 20:19</div>
                </div>
                
                <div class="mail-item mail-warning">
                    <div class="mail-checkbox">
                        <input type="checkbox" class="icheckbox"/>
                    </div>
                    <div class="mail-star starred">
                        <span class="fa fa-star-o"></span>
                    </div>
                    <div class="mail-user">Brad Pitt</div>                                    
                    <a href="pages-mailbox-message.html" class="mail-text">How are you? Need some work?</a>                                    
                    <div class="mail-date">Sep 15</div>
                </div>
                
                <div class="mail-item mail-info">
                    <div class="mail-checkbox">
                        <input type="checkbox" class="icheckbox"/>
                    </div>
                    <div class="mail-star">
                        <span class="fa fa-star-o"></span>
                    </div>
                    <div class="mail-user">Dmitry Ivaniuk</div>                                    
                    <a href="pages-mailbox-message.html" class="mail-text">Can you check this docs?</a>                                    
                    <div class="mail-date">Sep 14</div>
                    <div class="mail-attachments">
                        <span class="fa fa-paperclip"></span> 11Kb
                    </div>
                </div>
                
                <div class="mail-item">
                    <div class="mail-checkbox">
                        <input type="checkbox" class="icheckbox"/>
                    </div>
                    <div class="mail-star starred">
                        <span class="fa fa-star-o"></span>
                    </div>
                    <div class="mail-user">HTC</div>                                    
                    <a href="pages-mailbox-message.html" class="mail-text">New updates on your phone HD7</a>
                    <div class="mail-date">Sep 13</div>
                    <div class="mail-attachments">
                        <span class="fa fa-paperclip"></span> 58Mb
                    </div>
                </div>
                
                <div class="mail-item mail-unread">
                    <div class="mail-checkbox">
                        <input type="checkbox" class="icheckbox"/>
                    </div>
                    <div class="mail-star">
                        <span class="fa fa-star-o"></span>
                    </div>
                    <div class="mail-user">Unknown</div>                                    
                    <a href="pages-mailbox-message.html" class="mail-text">You won $15,000,000</a>
                    <div class="mail-date">Sep 13</div>
                </div>
                
                <div class="mail-item mail-success">
                    <div class="mail-checkbox">
                        <input type="checkbox" class="icheckbox"/>
                    </div>
                    <div class="mail-star">
                        <span class="fa fa-star-o"></span>
                    </div>
                    <div class="mail-user">Nadia Ali</div>                                    
                    <a href="pages-mailbox-message.html" class="mail-text">Your tickets</a>
                    <div class="mail-date">Sep 11</div>
                    <div class="mail-attachments">
                        <span class="fa fa-paperclip"></span> 1.2Mb
                    </div>
                </div>
                
                <div class="mail-item mail-info">
                    <div class="mail-checkbox">
                        <input type="checkbox" class="icheckbox"/>
                    </div>
                    <div class="mail-star">
                        <span class="fa fa-star-o"></span>
                    </div>
                    <div class="mail-user">Dmitry Ivaniuk</div>                                    
                    <a href="pages-mailbox-message.html" class="mail-text">New bug founded</a>
                    <div class="mail-date">Sep 11</div>
                </div>
                
                <div class="mail-item">
                    <div class="mail-checkbox">
                        <input type="checkbox" class="icheckbox"/>
                    </div>
                    <div class="mail-star">
                        <span class="fa fa-star-o"></span>
                    </div>
                    <div class="mail-user">Darth Vader</div>                                    
                    <a href="pages-mailbox-message.html" class="mail-text">Where drawings of the new spaceship?</a>
                    <div class="mail-date">Sep 10</div>
                </div>                                
            -->
            </div>
            <div class="panel-footer">  
                <!--                              
                <div class="btn-group">
                    <button class="btn btn-default"><span class="fa fa-mail-reply"></span></button>
                    <button class="btn btn-default"><span class="fa fa-mail-reply-all"></span></button>
                    <button class="btn btn-default"><span class="fa fa-mail-forward"></span></button>
                </div>
                -->
                <div class="btn-group">
                    <button class="btn btn-default"><span class="fa fa-star"></span></button>                                    
                    
                </div>
                
                <button class="btn btn-default"><span class="fa fa-trash-o"></span></button>                                    
                
                <ul class="pagination pagination-sm pull-right">
                    <li class="disabled"><a href="#">«</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>                                    
                    <li><a href="#">»</a></li>
                </ul>
            </div>                            
        </div>
        
    </div>
    <!-- END CONTENT FRAME BODY -->
</div>
<!-- END CONTENT FRAME -->

@endsection 