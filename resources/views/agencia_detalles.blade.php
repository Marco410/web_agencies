<?php $page = 'Agencia'; ?>
@extends('layout.mainlayout')
@section('content')

    <div class="content">
        @auth
        <div class="icono-comentarios">
            <a href="#card-comentarios"><i class="fas fa-comments"></i></a>
        </div>
        @endauth

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (session('status_claim'))
                        <div class="alert alert-success">
                            {{ session('status_claim') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-view">
                        <div class="service-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h1>{{ $agencia->nombre }}</h1>
                                <div class="fav-btn fav-btn-big">
                                    {{-- <a href="javascript:void(0)" class="fav-icon with-border">
                                        <i class="fas fa-heart"></i>
                                    </a> --}}
                                </div>
                            </div>
                            <address class="service-location"><i class="fas fa-location-arrow"></i>
                                {{ $agencia->direccion }}</address>
                            <div class="rating">
                                <i class="fas fa-star {{ $finRating >= 1 ? 'filled' : '' }}"></i>
                                <i class="fas fa-star {{ $finRating >= 2 ? 'filled' : '' }}"></i>
                                <i class="fas fa-star {{ $finRating >= 3 ? 'filled' : '' }}"></i>
                                <i class="fas fa-star {{ $finRating >= 4 ? 'filled' : '' }}"></i>
                                <i class="fas fa-star {{ $finRating >= 5 ? 'filled' : '' }}"></i>
                                <span class="d-inline-block average-rating">({{ $finRating }})</span>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    @if (isset($agencia->marca[0]))
                                        <div class="service-cate">
                                            <a href="#">{{ $agencia->marca[0]->nombre }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @auth
                        @else
                        <div class="card provider-widget clearfix movil" style="display:none;">
                            <div class="card-body text-center">
                                <a class="btn btn-sm btn-primary" href="javascript:void(0);" data-toggle="modal"
                                    data-target="#login_modal">
                                    <span class="show-text"> <i class="fas fa-user-shield"></i> Califica esta agencia aquí.</span>
                                </a>
                            </div>
                        </div>
                        @endauth


                        @auth
                        @if (auth()->user()->block == 0)
                        <div class="card text-center movil" style="display: none" >
                            <div class="card-body">
                                <h4 class="card-title text-success">Empecemos a calificar, esto ayudará a más usuarios como tú.</h4>
                            </div>
                        </div>
                        <div class="card provider-widget clearfix movil" id="card-comentarios" style="display: none" >
                            <div class="card-body">
                                <h5 class="card-title">Dejanos tu Calificación</h5>
                                <div class="about-author">
                                    <div class="col-sm-12">
                                        <form method="POST" action="">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{ $agencia->id }}" name="agencia_id_movil"
                                                id="agencia_id_movil">
                                            <div title="Atención recibida" class="rating">
                                                <b>{{-- Atención --}}Atención del Personal</b>
                                                <i class="fas fa-star cursor" id="1ate_movil" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="2ate_movil" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="3ate_movil" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="4ate_movil" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="5ate_movil" onclick="calificar(this)"></i>
                                            </div>
                                            <input type="hidden" name="atencion_movil" id="atencion_movil" value="0">
                                            <div title="Practicidad para el cliente" class="rating">
                                                <b>{{-- Practicidad --}} Instalaciones</b>
                                                <i class="fas fa-star cursor" id="1prac_movil" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="2prac_movil" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="3prac_movil" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="4prac_movil" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="5prac_movil" onclick="calificar(this)"></i>
                                            </div>
                                            <input type="hidden" name="practicidad_movil" id="practicidad_movil" value="0">
                                            <div title="Velocidad del Servicio" class="rating">
                                                <b>{{-- Velocidad --}}Tiempo de Respuesta</b>
                                                <i class="fas fa-star cursor" id="1vel_movil" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="2vel_movil" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="3vel_movil" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="4vel_movil" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="5vel_movil" onclick="calificar(this)"></i>
                                            </div>
                                            <input type="hidden" name="velocidad_movil" id="velocidad_movil" value="0">
                                            <div title="Resultado final del servicio" class="rating">
                                                <b>{{-- Resultado Final --}}Calificación General</b>
                                                <i class="fas fa-star cursor" id="1res_movil" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="2res_movil" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="3res_movil" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="4res_movil" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="5res_movil" onclick="calificar(this)"></i>
                                            </div>
                                            <input type="hidden" name="resultado_movil" id="resultado_movil" value="0">
                                            <textarea class="form-control mt-2" name="comentario_movil" id="comentario_movil"
                                                placeholder="Escribe aquí" ></textarea>
                                            <button type="button" id="save-review-movil" class="btn btn-info btn-sm btn-block mt-2">
                                                <i class="fas fa-paper-plane"></i> Enviar calificación</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @else
                        <div class="card provider-widget clearfix movil" style="display: none">
                            <div class="card-body text-center">
                                <span class="show-text"> <i class="fas fa-user-shield"></i> No tienes permitido dejar comentarios. Aclaraciones: <a href="mailto:contacto@autonavega.xom">contacto@autonavega.com</a></span>
                                
                            </div>
                        </div>
                        @endif
                    @else
                       {{--  asd --}}
                    @endauth
                    @if ($agencia->horario != '0')
                        <div class="card available-widget movil" style="display: none" >
                            <div class="card-body">
                                <h5 class="card-title">Horario</h5>
                                @if ($agencia->horario == '0')
									<span>Sin horario</span>
								@else
								<div class="col-sm-12 text-center">

									@if ($agencia->hours)
									<div class="row">
										<div class="col-sm-6 border-right">
											<label class="text-secondary">Lunes</label> <br>
											<strong><span class="border-bottom" >{{ $agencia->hours->lun }}</span></strong> <br> <br>
											<label class="text-secondary">Martes</label> <br>
											<strong><span class="border-bottom">{{ $agencia->hours->mar }}</span></strong> <br><br>
											<label class="text-secondary">Miércoles</label> <br>
											<strong><span class="border-bottom">{{ $agencia->hours->mie }}</span></strong> <br><br>
											<label class="text-secondary">Jueves</label> <br>
											<strong><span class="border-bottom">{{ $agencia->hours->jue }}</span></strong> <br><br>
										</div>
										<div class="col-sm-6">
											<label class="text-secondary">Viernes</label> <br>
											<strong><span class="border-bottom">{{ $agencia->hours->vie }}</span></strong> <br><br>
											<label class="text-secondary">Sábado</label> <br>
											<strong><span class="border-bottom">{{ $agencia->hours->sab }}</span></strong> <br><br>
											<label class="text-secondary">Domingo</label> <br>
											<strong><span class="border-bottom">{{ $agencia->hours->dom }}</span></strong> <br><br>
										</div>
									</div>
									@else
									{!! $agencia->horario !!}
										
									@endif

								</div>
								@endif
                            </div>
                        </div>
                    @endif

                        <div class="service-details">
                            <ul class="nav nav-pills service-tabs" id="pills-tab" role="tablist">
                                <li class="nav-item ">
                                    <a class="nav-link active" id="pills-book-tab" data-toggle="pill" href="#pills-book"
                                        role="tab" aria-controls="pills-book" aria-selected="false"> <i
                                            class="fas fa-comment-dots mr-2"></i> Comentarios</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link " id="pills-profile-tab" data-toggle="pill"
                                        href="#pills-profile" role="tab" aria-controls="pills-profile"
                                        aria-selected="false"> <i class="fas fa-map-marked-alt mr-2"></i> Mapa</a>
                                </li>
                                <li class="nav-item resp-mov">
                                    <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                        role="tab" aria-controls="pills-home" aria-selected="true"> <i
                                            class="fas fa-info mr-2 "></i> Información</a>
                                </li>
                                @if ($agencia->membresia_id == 3)
                                    
                                <li class="nav-item resp-mov">
                                    <a class="nav-link" id="pills-cita-tab" data-toggle="pill" href="#pills-cita"
                                        role="tab" aria-controls="pills-cita" aria-selected="true"> <i
                                            class="fas fa-calendar mr-2 "></i> Haz una cita</a>
                                </li>
                                    @if ($agencia->personal->count() != 0)
                                        <li class="nav-item resp-mov mt-2">
                                            <a class="nav-link " id="pills-personal-tab" data-toggle="pill" href="#pills-personal"
                                                role="tab" aria-controls="pills-personal" aria-selected="true"> <i
                                                    class="fas fa-users mr-2 "></i> Calificar Personal</a>
                                        </li>
                                    @endif
                                @endif
                                @auth
                                    {{--Si esta--}}
                                @else
                                <li class="nav-item desk" >
                                    <a class="btn btn-info" href="javascript:void(0);" data-toggle="modal"
                                    data-target="#login_modal">
                                    <span class="show-text"> <i class="fas fa-user-shield"></i> Califica esta agencia aquí.</span>
                                </a>
                                </li>
                                @endauth
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="pills-book" role="tabpanel"
                                    aria-labelledby="pills-book-tab">
                                    <div class="card review-box">
                                        <div class="card-body">
                                            @if (count($agencia->reviews) == 0)
                                                <div class="row">
                                                    <div class="col-sm-12 text-center mb-4">
                                                        <span>No hay comentarios aún</span>
                                                    </div>
                                                </div>
                                            @else
                                                @foreach ($agencia->reviews as $rev)
                                                    <div class="review-list">
                                                        <div class="review-img text-center">
                                                            @if ($rev->user_id)
                                                                <img class="rounded-circle"
                                                                    src="{{ asset('assets/img/user.png') }}" alt="">
                                                            @else
                                                                <img class="rounded-circle" src="{{ $rev->foto_url }}"
                                                                    alt="">
                                                            @endif
                                                           
                                                        </div>
                                                        <div class="review-info">
                                                            @if ($rev->user_id)
                                                                <h5>{{ $rev->user[0]->name }}
                                                                    {{ $rev->user[0]->apellido_p }}</h5>
                                                                <div class="review-date">
                                                                    {{ date('d M Y', strtotime($rev->created_at)) }}
                                                                </div>
                                                            @else
                                                                <h5>{{ $rev->autor }}</h5>
                                                                <div class="review-date">
                                                                    {{ date('d M Y', $rev->time) }} </div>
                                                            @endif
                                                            <p class="mb-0">{{ $rev->text }}</p>
                                                            @if ($rev->user_id)
                                                                <small>{{-- Atención --}}Atención del Personal ({{ $rev->atencion }}) <i
                                                                        class="fas fa-star filled"></i></small>
                                                                <small>{{-- Practicidad --}}Instalaciones ({{ $rev->practicidad }}) <i
                                                                        class="fas fa-star filled"></i></small>
                                                                <small>{{-- Velocidad --}}Tiempo de Respuesta ({{ $rev->velocidad }}) <i
                                                                        class="fas fa-star filled"></i></small>
                                                                <small>{{-- Resultado --}}Calificación General ({{ $rev->resultado }}) <i
                                                                        class="fas fa-star filled"></i></small>
                                                            @endif
                                                        </div>
                                                        <div class="review-count">
                                                            <div class="rating">
                                                                <i
                                                                    class="fas fa-star {{ $rev->rating >= 1 ? 'filled' : '' }}"></i>
                                                                <i
                                                                    class="fas fa-star {{ $rev->rating >= 2 ? 'filled' : '' }}"></i>
                                                                <i
                                                                    class="fas fa-star {{ $rev->rating >= 3 ? 'filled' : '' }}"></i>
                                                                <i
                                                                    class="fas fa-star {{ $rev->rating >= 4 ? 'filled' : '' }}"></i>
                                                                <i
                                                                    class="fas fa-star {{ $rev->rating >= 5 ? 'filled' : '' }}"></i>
                                                                <span
                                                                    class="d-inline-block average-rating">({{ $rev->rating }})</span>
                                                            </div>
                                                            @auth
                                                            @if (auth()->user()->roles[0]->name == 'Admin')
                                                                <a title="Eliminar Comentario" class="btn btn-sm bg-danger-light ml-3" data-toggle="modal" data-target="#modalDeleteComentario"  data-id="{{ $rev->id }}" data-autor="@if ($rev->user_id){{ $rev->user[0]->name }} {{ $rev->user[0]->apellido_p }}@else{{ $rev->autor }}@endif" onclick="commentDelete(this)" > <i class="fas fa-trash" ></i></a >
                                                            @endif
                                                            @endauth
                                                        </div>
                                                        @if (!$rev->answers->isEmpty())
                                                            <div class="row mt-1">
                                                                @foreach ($rev->answers  as $ans)
                                                                
                                                                <div class="col-sm-8 offset-4 mt-1" style="background-color: #f0f2f5; padding: 10px 20px 10px 20px;  border-radius:5px;">
                                                                    <div class="row">

                                                                        <div class="col-sm-1 text-center">
                                                                            <div class="noti-avatar">
                                                                                <img class="avatar-img rounded-circle"  src="{{ asset('assets/img/logo-icon.png') }}" width="30px" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-9">
                                                                            <label>{{ $ans->answer }}</label>
                                                                            <small>{{ date('d M Y', strtotime($ans->created_at )) }}</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>                                                            
                                                        @else
                                                            
                                                        @endif
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade " id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Conoce la ubicación</h5>
                                            <div class="col-sm-12">
                                                <iframe width="100%" height="450" style="border:0" loading="lazy"
                                                    allowfullscreen
                                                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC3cOZ4msHc0Ty1zVmpkJ96QRmxEdlzQkk&q=place_id:{{ $agencia->place_id }}">
                                                </iframe>
                                            </div>
                                            <div class="col-sm-12">
                                                <style>
                                                    #map, #street-view {
                                                        height: 400px;
                                                        width: 100%;
                                                    }

                                                </style>
                                                <script>
                                                   let panorama;
                                                    function initialize() {
                                                    panorama = new google.maps.StreetViewPanorama(
                                                        document.getElementById("street-view"),
                                                        {
                                                        position: { lat: parseFloat({{$agencia->lat}}), lng: parseFloat({{$agencia->lng}}) },
                                                        pov: { heading: 165, pitch: 0 },
                                                        zoom: 1,
                                                        }
                                                    );
                                                    }
                                                </script>
                                                <div style="position: relative" >
                                                    <div style="display: abosolute; ">
                                                    </div>
                                                    <div class="mt-4" id="street-view" style="z-index: 8;display: abosolute;"></div>
                                                    <p class="text-center" style="" >Máximiza para ver el Street View</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="card service-description">
                                        <div class="card-body">
                                            <h5 class="card-title">Detalles</h5>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p> <b>Dirección: </b>{{ $agencia->direccion }}</p>
                                                </div>
                                                {{-- <div class="col-sm-6">
                                                    <p><b>Telefono:</b> <a
                                                            href="tel:{{ $agencia->telefono }}">{{ $agencia->telefono }}</a>
                                                    </p>
                                                </div> --}}

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade " id="pills-cita" role="tabpanel"
                                    aria-labelledby="pills-cita-tab">
                                    <div class="card service-description">
                                        <div class="card-body">
                                            <h5 class="card-title">Nueva Cita</h5>
                                             <div class="row">
                                                <div class="col-sm-12">
                                                    @if (session('status_cita'))
                                                    <script>
                                                        $( document ).ready(function() {
                                                            $('#cita_modal').modal('toggle')
                                                        });
                                                    </script>
                                                    @endif
                                                    @if($errors->any())
                                                    <script>
                                                        $( document ).ready(function() {
                                                            $('#error_modal').modal('toggle');
                                                        });
                                                    </script>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                           
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    @if($errors->any())
                                                    @foreach($errors->all() as $error)
                                                    <div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong>{{ $error }}</div>
                                                    @endforeach
                                                    @endif
                    
                                                </div>
                                            </div>
                                            <form action="{{ route('agencia.create.cita') }}" method="POST" >
                                                {{ csrf_field() }}
                                            <div class="row">
                                                <input type="hidden" value="{{ $agencia->id }}" name="agencia_id"  > 
                                                <div class="col-sm-6 form-group">
                                                    <label for="">Nombre</label>
                                                    <input type="text" class="form-control" placeholder="Escribe el nombre" name="nombre" value="{{ old('nombre') }}"  />
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="">Apellidos</label>
                                                    <input type="text" class="form-control" placeholder="Escribe tus apellidos" name="apellidos" value="{{ old('apellidos') }}"  />
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label for="">Email</label>
                                                    <input type="email" class="form-control" placeholder="Escribe tu email" name="email" value="{{ old('email') }}" />
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="">Teléfono</label>
                                                    <input type="text" class="form-control" placeholder="Escribe tu teléfono" name="telefono" value="{{ old('telefono') }}"  />
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="">Motivo de la cita</label>
                                                    <select class="form-control" name="motivo" id="motivo">
                                                        <option value="">Seleccione:</option>
                                                        <option value="Autos nuevos">Autos nuevos</option>
                                                        <option value="Seminuevos">Seminuevos</option>
                                                        <option value="Taller Mecánico / Cita Servicio">Taller Mecánico / Cita Servicio</option>
                                                        <option value="Hojalatería y Pintura">Hojalatería y Pintura</option>
                                                        <option value="Atención en General">Atención en General</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="">Fecha y Hora</label>
                                                    <input type="datetime-local" class="form-control" name="date_cita" placeholder="Seleccione la fecha y hora" >
                                                    
                                                </div>
                                                <div class="col-sm-12 form-group">
                                                    <label for="">Tipo de cliente</label>
                                                    <select class="form-control" name="tipo_cliente" id="motivo">
                                                        <option value="">Seleccione:</option>
                                                        <option value="Nuevo Cliente">Nuevo Cliente</option>
                                                        <option value="Ya soy cliente">Ya soy cliente</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 form-group">
                                                    <label for="">Forma de contacto</label>
                                                    <select class="form-control" name="contacto" id="motivo">
                                                        <option value="">Seleccione:</option>
                                                        <option value="Correo Electrónico">Correo Electrónico</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 form-group">
                                                    <label for="">Describenos el motivo de tu cita</label>
                                                    <textarea class="form-control" name="motivo_cita" id="motivo_cita" rows="3" ></textarea>
                                                </div>
                                               <div class="col-sm-12 ">
                                                   <button type="submit" class="btn btn-md btn-primary float-right" >Solicitar Cita</button>
                                               </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="pills-personal" role="tabpanel"
                                    aria-labelledby="pills-personal-tab">
                                    <div class="card service-description">
                                        <div class="card-body">
                                            <h5 class="card-title">Calificar Personal</h5>
                                            <div class="row">
                                                @auth
                                                    @if (auth()->user()->block == 0)
                                                        @foreach ($agencia->personal as  $person)
                                                        <div class="col-sm-4">
                                                            <div class="service-widget">
                                                                <div class="service-img">
                                                                    @if ($person->imagen != null)
                                                                    <a href="">
                                                                        <img class="img-fluid serv-img" height="100px" alt="{{ $person->nombre }}" src="{{URL::asset('storage/personal/'.$person->id.'/'.$person->imagen)}}">
                                                                        </a>
                                                                    @else
                                                                    <a href="">
                                                                    <img class="img-fluid serv-img"  height="100%"  alt="{{ $person->nombre }}" src="{{ asset('assets/img/user-back.png')}}">
                                                                    </a>
                                                                    @endif
                                                                    <div class="item-info">
                                                                        <div class="cate-list">
                                                                            <a class="bg-yellow" data-toggle="modal" data-target="#calificarPersonal" data-nombre='{{ $person->nombre }}' data-personalId='{{ $person->id }}' data-puesto='{{ $person->puesto }}' href="">
                                                                               <i class="fas fa-star" ></i>  Calificar
                                                                           </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="service-content">
                                                                    <h3 class="title">
                                                                        <a href="">{{ $person->nombre }}</a>
                                                                    </h3>
                                                                    <span>{{ $person->puesto }}</span>
                                                                    <div class="rating">
                                                                        <i class="fas fa-star {{ ($person->rating >= 1) ? 'filled' : '' }}"></i>
                                                                        <i class="fas fa-star {{ ($person->rating >= 2) ? 'filled' : '' }}"></i>
                                                                        <i class="fas fa-star {{ ($person->rating >= 3) ? 'filled' : '' }}"></i>
                                                                        <i class="fas fa-star {{ ($person->rating >= 4) ? 'filled' : '' }}"></i>
                                                                        <i class="fas fa-star {{ ($person->rating >= 5) ? 'filled' : '' }}"></i>
                                                                        <span class="d-inline-block average-rating">({{ $person->rating }})</span>
                                                                    </div>
                                                                    <div class="user-info">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 " title="">
                                                                                <a href="{{ route('user.agency.stats',$person->agencia[0]->id) }}"> <span class="col-auto ser-contact"><i class="fas fa-car mr-1"></i>  <span >{{$person->agencia[0]->nombre}}</span></span></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    @else
                                                    <div class="card provider-widget clearfix" >
                                                        <div class="card-body text-center">
                                                            <span class="show-text"> <i class="fas fa-user-shield"></i> No tienes permitido dejar comentarios. Aclaraciones: <a href="mailto:contacto@autonavega.xom">contacto@autonavega.com</a></span>
                                                            
                                                        </div>
                                                    </div>
                                                    @endif
                                                @else
                                                {{--  asd --}}
                                                @endauth

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- <div class="service-carousel">
					<div class="popular-slider owl-carousel owl-theme">

						<div class="service-widget">
							<div class="service-img">
								<a href="service-details">
									<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-03.jpg">
								</a>
								<div class="item-info">
									<div class="service-user">
										<a href="#">
											<img src="assets/img/customer/user-03.jpg" alt="">
										</a>
										<span class="service-price">$2</span>
									</div>
									<div class="cate-list">
										<a class="bg-yellow" href="service-details">Electrical</a>
									</div>
								</div>
							</div>
							<div class="service-content">
								<h3 class="title">
									<a href="service-details">Electric Panel Repairing Service</a>
								</h3>
								<div class="rating">
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star"></i>
									<span class="d-inline-block average-rating">(4.5)</span>
								</div>
								<div class="user-info">
									<div class="row">
										<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx30</span></span>
										<span class="col ser-location"><span>Kalispell, Montana</span>  <i class="fas fa-map-marker-alt ml-1"></i></span>
									</div>
								</div>
							</div>
						</div>

						<div class="service-widget">
							<div class="service-img">
								<a href="service-details">
									<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-04.jpg">
								</a>
								<div class="item-info">
									<div class="service-user">
										<a href="#">
											<img src="assets/img/customer/user-04.jpg" alt="">
										</a>
										<span class="service-price">$14</span>
									</div>
									<div class="cate-list">
										<a class="bg-yellow" href="service-details">Car Wash</a>
									</div>
								</div>
							</div>
							<div class="service-content">
								<h3 class="title">
									<a href="service-details">Steam Car Wash</a>
								</h3>
								<div class="rating">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<span class="d-inline-block average-rating">(0)</span>
								</div>
								<div class="user-info">
									<div class="row">
										<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx74</span></span>
										<span class="col ser-location"><span>Electra, Texas</span>  <i class="fas fa-map-marker-alt ml-1"></i></span>
									</div>
								</div>
							</div>
						</div>

						<div class="service-widget">
							<div class="service-img">
								<a href="service-details">
									<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-05.jpg">
								</a>
								<div class="item-info">
									<div class="service-user">
										<a href="#">
											<img src="assets/img/customer/user-05.jpg" alt="">
										</a>
										<span class="service-price">$100</span>
									</div>
									<div class="cate-list">
										<a class="bg-yellow" href="service-details">Cleaning</a>
									</div>
								</div>
							</div>
							<div class="service-content">
								<h3 class="title">
									<a href="service-details">House Cleaning Services</a>
								</h3>
								<div class="rating">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<span class="d-inline-block average-rating">(0)</span>
								</div>
								<div class="user-info">
									<div class="row">
										<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx91</span></span>
										<span class="col ser-location"><span>Sylvester, Georgia</span>  <i class="fas fa-map-marker-alt ml-1"></i></span>
									</div>
								</div>
							</div>
						</div>

						<div class="service-widget">
							<div class="service-img">
								<a href="service-details">
									<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-06.jpg">
								</a>
								<div class="item-info">
									<div class="service-user">
										<a href="#">
											<img src="assets/img/customer/user-06.jpg" alt="">
										</a>
										<span class="service-price">$100</span>
									</div>
									<div class="cate-list">
										<a class="bg-yellow" href="service-details">Computer</a>
									</div>
								</div>
							</div>
							<div class="service-content">
								<h3 class="title">
									<a href="service-details">Computer & Server AMC Service</a>
								</h3>
								<div class="rating">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<span class="d-inline-block average-rating">(0)</span>
								</div>
								<div class="user-info">
									<div class="row">
										<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx92</span></span>
										<span class="col ser-location"><span>Los Angeles, California</span>  <i class="fas fa-map-marker-alt ml-1"></i></span>
									</div>
								</div>
							</div>
						</div>

						<div class="service-widget">
							<div class="service-img">
								<a href="service-details">
									<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-07.jpg">
								</a>
								<div class="item-info">
									<div class="service-user">
										<a href="#">
											<img src="assets/img/customer/user-07.jpg" alt="">
										</a>
										<span class="service-price">$5</span>
									</div>
									<div class="cate-list">
										<a class="bg-yellow" href="service-details">Interior</a>
									</div>
								</div>
							</div>
							<div class="service-content">
								<h3 class="title">
									<a href="service-details">Interior Designing</a>
								</h3>
								<div class="rating">
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star"></i>
									<span class="d-inline-block average-rating">(4)</span>
								</div>
								<div class="user-info">
									<div class="row">
										<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx28</span></span>
										<span class="col ser-location"><span>Hanover, Maryland</span>  <i class="fas fa-map-marker-alt ml-1"></i></span>
									</div>
								</div>
							</div>
						</div>

						<div class="service-widget">
							<div class="service-img">
								<a href="service-details">
									<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-08.jpg">
								</a>
								<div class="item-info">
									<div class="service-user">
										<a href="#">
											<img src="assets/img/customer/user-08.jpg" alt="">
										</a>
										<span class="service-price">$100</span>
									</div>
									<div class="cate-list">
										<a class="bg-yellow" href="service-details">Construction</a>
									</div>
								</div>
							</div>
							<div class="service-content">
								<h3 class="title">
									<a href="service-details">Building Construction Services</a>
								</h3>
								<div class="rating">
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star"></i>
									<span class="d-inline-block average-rating">(4)</span>
								</div>
								<div class="user-info">
									<div class="row">
										<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx62</span></span>
										<span class="col ser-location"><span>Burr Ridge, Illinois</span>  <i class="fas fa-map-marker-alt ml-1"></i></span>
									</div>
								</div>
							</div>
						</div>

						<div class="service-widget">
							<div class="service-img">
								<a href="service-details">
									<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-09.jpg">
								</a>
								<div class="item-info">
									<div class="service-user">
										<a href="#">
											<img src="assets/img/customer/user-09.jpg" alt="">
										</a>
										<span class="service-price">$500</span>
									</div>
									<div class="cate-list">
										<a class="bg-yellow" href="service-details">Painting</a>
									</div>
								</div>
							</div>
							<div class="service-content">
								<h3 class="title">
									<a href="service-details">Commercial Painting Services</a>
								</h3>
								<div class="rating">
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<span class="d-inline-block average-rating">(3)</span>
								</div>
								<div class="user-info">
									<div class="row">
										<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx75</span></span>
										<span class="col ser-location"><span>Huntsville, Alabama</span>  <i class="fas fa-map-marker-alt ml-1"></i></span>
									</div>
								</div>
							</div>
						</div>

						<div class="service-widget">
							<div class="service-img">
								<a href="service-details">
									<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-10.jpg">
								</a>
								<div class="item-info">
									<div class="service-user">
										<a href="#">
											<img src="assets/img/user.jpg" alt="">
										</a>
										<span class="service-price">$150</span>
									</div>
									<div class="cate-list">
										<a class="bg-yellow" href="service-details">Plumbing</a>
									</div>
								</div>
							</div>
							<div class="service-content">
								<h3 class="title">
									<a href="service-details">Plumbing Services</a>
								</h3>
								<div class="rating">
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<span class="d-inline-block average-rating">(3)</span>
								</div>
								<div class="user-info">
									<div class="row">
										<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx13</span></span>
										<span class="col ser-location"><span>Richmond, Virginia</span> <i class="fas fa-map-marker-alt ml-1"></i></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> --}}
                    @if (count($agencia->fotos) == 0)
                        <div class="row">
                            <div class="col-sm-12 text-center mb-4">
                                <span>Esta agencia no tiene fotos</span>
                            </div>
                        </div>
                    @else
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner">
                                {{-- <div class="carousel-item active">
                            <img src="..." class="d-block w-100" alt="...">
                          </div> --}}

                                @foreach ($agencia->fotos as $k => $foto)
                                    @if($foto->html != null)
                                    <div class="carousel-item  {{ $k == 0 ? 'active' : '' }}">
                                        <img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=600&photo_reference={{ $foto->foto_ref }}&key={{ $key->value }}"
                                            alt="{{ $agencia->nombre }}" class="d-block w-100 " ">
                                    </div>
                                    @elseif($foto->foto_upload)
                                    <div class="carousel-item  {{ $k == 0 ? 'active' : '' }}">
                                        <img src="{{ URL::asset('storage/agencias/'.$agencia->id.'/'.$foto->foto_upload)}} "
                                            alt="{{ $agencia->nombre }}" class="d-block w-100 " ">
                                    </div>
                                    @else
                                    <div class="carousel-item  {{ $k == 0 ? 'active' : '' }}">
                                        <img src="{{ $foto->foto_url }}"
                                            alt="{{ $agencia->nombre }}" class="d-block w-100 " ">
                                    </div>
                                    @endif
                                @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                            </div>


                    @endif
                </div>
                <div class="col-lg-4 theiaStickySidebar">
                    <div class="sidebar-widget widget">
                        {{-- <div class="service-amount">
                            <span>$150</span>
                        </div> --}}
                    @auth
                        {{-- <div class="service-book">
                            <a href="tel:{{ $agencia->telefono }}" class="btn btn-primary"> <i
                                class="fas fa-phone-alt mr-2"></i>Llamar </a>
                            </div> --}}

                        </div>
                        @if (auth()->user()->block == 0)
                        <div class="card provider-widget clearfix desk" id="card-comentarios" >
                            <div class="card-body">
                                <h5 class="card-title">Dejanos tu Calificación</h5>
                                <div class="about-author">
                                    <div class="col-sm-12">
                                        <form method="POST" action="">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{ $agencia->id }}" name="agencia_id"
                                                id="agencia_id">
                                            <div title="Atención recibida" class="rating">
                                                <b>{{-- Atención --}}Atención del Personal</b>
                                                <i class="fas fa-star cursor" id="1ate" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="2ate" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="3ate" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="4ate" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="5ate" onclick="calificar(this)"></i>
                                            </div>
                                            <input type="hidden" name="atencion" id="atencion" value="0">
                                            <div title="Practicidad para el cliente" class="rating">
                                                <b>{{-- Practicidad --}} Instalaciones</b>
                                                <i class="fas fa-star cursor" id="1prac" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="2prac" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="3prac" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="4prac" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="5prac" onclick="calificar(this)"></i>
                                            </div>
                                            <input type="hidden" name="practicidad" id="practicidad" value="0">
                                            <div title="Velocidad del Servicio" class="rating">
                                                <b>{{-- Velocidad --}}Tiempo de Respuesta</b>
                                                <i class="fas fa-star cursor" id="1vel" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="2vel" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="3vel" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="4vel" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="5vel" onclick="calificar(this)"></i>
                                            </div>
                                            <input type="hidden" name="velocidad" id="velocidad" value="0">
                                            <div title="Resultado final del servicio" class="rating">
                                                <b>{{-- Resultado Final --}}Calificación General</b>
                                                <i class="fas fa-star cursor" id="1res" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="2res" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="3res" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="4res" onclick="calificar(this)"></i>
                                                <i class="fas fa-star cursor" id="5res" onclick="calificar(this)"></i>
                                            </div>
                                            <input type="hidden" name="resultado" id="resultado" value="0">
                                            <textarea class="form-control mt-2" name="comentario" id="comentario"
                                                placeholder="Escribe aquí" ></textarea>
                                            <button type="button" id="save-review" class="btn btn-info btn-sm btn-block mt-2">
                                                <i class="fas fa-paper-plane"></i> Enviar calificación</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @else
                        <div class="card provider-widget clearfix">
                            <div class="card-body text-center">
                                <span class="show-text"> <i class="fas fa-user-shield"></i> No tienes permitido dejar comentarios. Aclaraciones: <a href="mailto:contacto@autonavega.xom">contacto@autonavega.com</a></span>
                                
                            </div>
                        </div>
                        @endif
                    @else
                       {{--  <div class="card provider-widget clearfix desk">
                            <div class="card-body text-center">
                                <a class="btn btn-sm btn-info" href="javascript:void(0);" data-toggle="modal"
                                    data-target="#login_modal">
                                    <span class="show-text"> <i class="fas fa-user-shield"></i> Califica esta agencia aquí.</span>
                                </a>
                            </div>
                        </div> --}}
                    @endauth

                    @if ($agencia->horario != '0')
                        <div class="card available-widget desk">
                            <div class="card-body">
                                <h5 class="card-title">Horario</h5>
                                @if ($agencia->horario == '0')
									<span>Sin horario</span>
								@else
								<div class="col-sm-12 text-center">

									@if ($agencia->hours)
									<div class="row">
										<div class="col-sm-6 border-right">
											<label class="text-secondary">Lunes</label> <br>
											<strong><span class="border-bottom" >{{ $agencia->hours->lun }}</span></strong> <br> <br>
											<label class="text-secondary">Martes</label> <br>
											<strong><span class="border-bottom">{{ $agencia->hours->mar }}</span></strong> <br><br>
											<label class="text-secondary">Miércoles</label> <br>
											<strong><span class="border-bottom">{{ $agencia->hours->mie }}</span></strong> <br><br>
											<label class="text-secondary">Jueves</label> <br>
											<strong><span class="border-bottom">{{ $agencia->hours->jue }}</span></strong> <br><br>
										</div>
										<div class="col-sm-6">
											<label class="text-secondary">Viernes</label> <br>
											<strong><span class="border-bottom">{{ $agencia->hours->vie }}</span></strong> <br><br>
											<label class="text-secondary">Sábado</label> <br>
											<strong><span class="border-bottom">{{ $agencia->hours->sab }}</span></strong> <br><br>
											<label class="text-secondary">Domingo</label> <br>
											<strong><span class="border-bottom">{{ $agencia->hours->dom }}</span></strong> <br><br>
										</div>
									</div>
									@else
									{!! $agencia->horario !!}
										
									@endif

								</div>
								@endif
                            </div>
                        </div>
                    @endif

                   {{--  @auth
                        <div class="card">
                            <div class="card-body">
                                <div class="col-sm-12 text-center">
                                    @if ($claimOwn == 0)
                                        @if ($claim == 0)
                                            <form method="POST" action="{{ route('user.claim.agency') }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="agencia_id" value="{{ $agencia->id }}">
                                                <button type="submit" class="btn btn-sm btn-warning">Reclamar esta
                                                    agencia</button>
                                            </form>
                                        @else
                                            <p>Esta agencia ya fue reclamada</p>
                                        @endif
                                    @else
                                        <p>Ya reclamaste esta agencia, ve el estatus <a
                                                href="{{ route('user.agencies.claim') }}">aquí</a></p>

                                    @endif

                                </div>
                            </div>
                        </div>
                    @endauth --}}
                </div>
            </div>
        </div>
    </div>

    </div>

    @include('agencia_delete_comment')	

     <!-- cita Modal -->
     <div class="modal account-modal fade" id="error_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-0 border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row text-center">
                        <div class="col-sm-12">
                            <i class="fas fa-exclamation-circle fa-2x text-primary"></i>
                            <h4 class="text-primary" >Ocurrio un error con tu registro de cita en <strong class="text-primary" >Auto Navega®</strong></h4> <p>Reviza tu solicitud en la pestaña "Haz una cita".</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /cita Modal -->
    
    <!-- cita Modal -->
    <div class="modal account-modal fade" id="cita_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-0 border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row text-center">
                        <div class="col-sm-12">
                            <i class="fas fa-check fa-2x text-success"></i>
                            <h4 class="text-primary" >Gracias por agendar una
                                cita a través de <strong class="text-primary" >Auto Navega®</strong></h4> <p>Recibirás vía correo electrónico la confirmación o respuesta a tu solicitud.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /cita Modal -->

     <!-- Calificar Modal -->
     <div class="modal account-modal fade" id="calificarPersonal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                
                <div class="modal-header text-center">
                    <h5 style="margin-left: 30px" class="modal-title" >  <strong id="nombre_personal" ></strong> <br> <span id="personal_puesto" ></span> </h5> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h5 class="card-title">Dejanos tu Calificación</h5>
                            <div class="about-author">
                                <div class="col-sm-12">
                                    <form method="POST" action="">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="personal_id"
                                            id="personal_id">
                                        <div title="Atención recibida" class="rating">
                                            <b>Atención</b>
                                            <i class="fas fa-star cursor" id="1ate_personal" onclick="calificar(this)"></i>
                                            <i class="fas fa-star cursor" id="2ate_personal" onclick="calificar(this)"></i>
                                            <i class="fas fa-star cursor" id="3ate_personal" onclick="calificar(this)"></i>
                                            <i class="fas fa-star cursor" id="4ate_personal" onclick="calificar(this)"></i>
                                            <i class="fas fa-star cursor" id="5ate_personal" onclick="calificar(this)"></i>
                                        </div>
                                        <input type="hidden" name="atencion_personal" id="atencion_personal" value="0">
                                        <div title="Tiempo de Respuesta" class="rating">
                                            <b>Tiempo de Respuesta</b>
                                            <i class="fas fa-star cursor" id="1tiempo_per" onclick="calificar(this)"></i>
                                            <i class="fas fa-star cursor" id="2tiempo_per" onclick="calificar(this)"></i>
                                            <i class="fas fa-star cursor" id="3tiempo_per" onclick="calificar(this)"></i>
                                            <i class="fas fa-star cursor" id="4tiempo_per" onclick="calificar(this)"></i>
                                            <i class="fas fa-star cursor" id="5tiempo_per" onclick="calificar(this)"></i>
                                        </div>
                                        <input type="hidden" name="tiempo_personal" id="tiempo_personal" value="0">
                                        <div title="Conocimiento" class="rating">
                                            <b>Conocimiento</b>
                                            <i class="fas fa-star cursor" id="1cono_per" onclick="calificar(this)"></i>
                                            <i class="fas fa-star cursor" id="2cono_per" onclick="calificar(this)"></i>
                                            <i class="fas fa-star cursor" id="3cono_per" onclick="calificar(this)"></i>
                                            <i class="fas fa-star cursor" id="4cono_per" onclick="calificar(this)"></i>
                                            <i class="fas fa-star cursor" id="5cono_per" onclick="calificar(this)"></i>
                                        </div>
                                        <input type="hidden" name="conocimiento_personal" id="conocimiento_personal" value="0">
                                        
                                        <textarea class="form-control mt-2" name="comentario_personal" id="comentario_personal"
                                            placeholder="Escribe aquí un comentario sobre el personal" ></textarea>
                                        <button type="button" id="save-review-personal" class="btn btn-info btn-sm btn-block mt-2">
                                            <i class="fas fa-paper-plane"></i> Enviar calificación</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Calificar Modal -->
@endsection
