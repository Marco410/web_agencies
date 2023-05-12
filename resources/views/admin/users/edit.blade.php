<?php $page='Editar Usuarios';?>

@extends('layout.mainlayout_admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xl-9 offset-xl-1">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="page-title">Editar Usuario</h3> @if ($user->block == 1)
                                <span class="badge badge-danger" >Usuario Bloqueado</span> @else <span class="badge badge-success" >Usuario Activo</span>
                            @endif
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                </div>
                
                <div class="col-sm-9 offset-1">
                    <div class="row">
                        <div class="col">
                            <h5 class="page-title">Información</h5>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <!-- Form -->
                            <form method="post" enctype="multipart/form-data" action="{{ route('users.update') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Nombre</label></label>
                                    <input class="form-control" type="text" name="id" value="{{ $user->id }}" hidden>
                                    <input class="form-control" type="text" name="name" value="{{ $user->name }}" required >
                                </div>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Apellido Paterno</label>
                                            <input class="form-control" type="text" name="apellido_p" value="{{ $user->apellido_p }}" required >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Apellido Materno</label>
                                            <input class="form-control" type="text" name="apellido_m" value="{{ $user->apellido_m }}"  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email" type="email" value="{{ $user->email }}"
                                      required  >
                                </div>
                                <div class="form-group">
                                    <label class="w-100">Rol</label>
                                    <select class="custom-select" name="rol" id="rol">

                                        <option value="Admin" {{($user->roles[0]->name == 'Admin') ? 'selected' : ''}}>Admin</option>
                                        <option value="Dealer" {{($user->roles[0]->name == 'Dealer') ? 'selected' : ''}}>Dealer</option>
                                        <option value="Suscriptor" {{($user->roles[0]->name == 'Suscriptor') ? 'selected' : ''}}>Suscriptor</option>

                                    </select>
                                    {{-- <input class="form-control" name="imagen" type="email" value="{{ $user->roles[0]->name }}" > --}}
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="block" type="checkbox" {{ ($user->block == 1) ? 'checked' : '' }} >
                                    <label class="form-check-label" for="flexCheckChecked">
                                      Bloquear Usuario
                                    </label>
                                  </div>
                                <div class="form-group">
                                    <small>Si se bloquea este usuario no podrá comentar.</small>
                                    
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-primary" type="submit">Guardar cambios</button>
                                    <a href="../usuarios" class="btn btn-link">Cancelar</a>
                                </div>
                            </form>
                            <!-- /Form -->

                        </div>
                    </div>
                    
                </div>
               {{--  <div class="col-sm-6">
                    <div class="row">
                        <div class="col">
                            <h5 class="page-title">Resumen de membresía</h5>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row border-bottom">
                                    <div class="col-sm-4">
                                        <p class="text-secondary">Membresía</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4>@if ($user->membresia_id == "3")
                                            <label class="badge" style="background-color: var(--hover);color:white;" >PLUS</label>
                                        @elseif($user->membresia_id == "2")
                                            <label class="badge badge-primary" >BASIC</label>
                                        @elseif($user->membresia_id == "1")
                                            <label class="badge badge-secondary" >ZERO</label>
                                        @endif</h4>
                                    </div>
                                    <div class="col-sm-4">
                                        @if ($user->suscripcion)
                                        <small class="text-secondary" >Tipo:</small>
                                            <small> <strong style="text-transform: capitalize;"  > {{ $user->suscripcion->plan }}</strong></small>
                                        @endif
                                    </div>
                                </div>
                                <div class="row border-bottom mt-2">
                                    <div class="col-sm-4">
                                        <p class="text-secondary">Subscripción ID:</p>
                                    </div>
                                    <div class="col-sm-4">
                                        @if ($user->suscripcion)
                                            <p>{{ $user->suscripcion->id }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row border-bottom mt-2">
                                    <div class="col-sm-4">
                                        <p class="text-secondary">Empezó en:</p>
                                    </div>
                                    <div class="col-sm-4">
                                        @if ($user->suscripcion)
                                        <small>{{ date('d M Y', strtotime($user->suscripcion->created_at)) }}</small>
                                        @else
                                        <small>{{ date('d M Y', strtotime($user->created_at)) }}</small>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        @if ($user->suscripcion)
                                            <?php $precio= 0; ?>
                                            @if ($user->suscripcion->plan == "anual")
                                                <?php $precio= $user->suscripcion->membresia->anual; ?>
                                            @elseif ($user->suscripcion->plan == "semestral")
                                                <?php $precio= $user->suscripcion->membresia->semestral; ?>
                                            @else
                                                <?php $precio= $user->suscripcion->membresia->mensual; ?>
                                            @endif
                                            <small class="text-secondary" >Precio: <strong>${{ number_format($precio,2,".",",") }}</strong></small>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-12 text-center">
                                            <input type="hidden" name="user_plan_id" id="user_plan_id" value="{{ $user->id }}">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#bajaPlanModal"  data-user="{{ $user->id }}" > <i class="fas fa-trash" ></i> Dar de baja membresía</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-sm-12">
                    
                    @if (count($user->agencies) != 0)
                    <div class="row">
                        <div class="col">
                            <h5 class="page-title">Agencias</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                @foreach ($user->agencies as $agencia)
                                <div class="col-sm-4">
                                    
                                    <div class="service-widget">
                                        <div class="service-img">
                                            <a href="{{route('agencia.detalles',$agencia->agencia[0]->id)}}">
                                                @if($agencia->agencia[0]->marca[0]->first() != null) 		
                                                <img class="img-fluid serv-img" alt="Marca {{ $agencia->agencia[0]->marca[0]->nombre }}" src="{{URL::asset('storage/marcas/'.$agencia->agencia[0]->marca[0]->imagen)}}">
                                                @else
                                                <img class="img-fluid serv-img" alt="Sin Marca" src="{{URL::asset('storage/marcas/default.jpg')}}">
                                                @endif 
                                                </a>
                                            <div class="item-info">
                                                <div class="service-user">
                                                  {{--   <a href="#">
                                                        
                                                        <img src="assets/img/customer/user-03.jpg" alt="">
                                                    </a> --}}
                                                   {{--  <span class="service-price"> <a type="button" data-toggle="modal" data-target="#eliminarAgenciaModal" data-agencia="{{ $agencia->agencia[0]->id }}" data-user="{{ $user->id }}" ><i class=" text-primary fas fa-trash" ></i></a>  </span> --}}
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#eliminarAgenciaModal" data-agencia="{{ $agencia->agencia[0]->id }}" data-user="{{ $user->id }}"> <i class="fas fa-trash" ></i> </button>

                                                </div>
                                                <div class="cate-list">
                                                    <a class="bg-yellow" href="{{route('agencia.detalles',$agencia->agencia[0]->id)}}">
                                                        {{ $agencia->agencia[0]->marca[0]->nombre }}
                                                   </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="service-content">
                                            <h3 class="title">
                                                <a href="{{route('agencia.detalles',$agencia->agencia[0]->id)}}">{{$agencia->agencia[0]->nombre}}</a>
                                            </h3>
                                            <div class="rating">
                                                <i class="fas fa-star {{ ($agencia->agencia[0]->rating >= 1) ? 'filled' : '' }}"></i>
                                                <i class="fas fa-star {{ ($agencia->agencia[0]->rating >= 2) ? 'filled' : '' }}"></i>
                                                <i class="fas fa-star {{ ($agencia->agencia[0]->rating >= 3) ? 'filled' : '' }}"></i>
                                                <i class="fas fa-star {{ ($agencia->agencia[0]->rating >= 4) ? 'filled' : '' }}"></i>
                                                <i class="fas fa-star {{ ($agencia->agencia[0]->rating >= 5) ? 'filled' : '' }}"></i>
                                                <span class="d-inline-block average-rating">({{ $agencia->agencia[0]->rating }})</span>
                                            </div>
                                            <div class="user-info">
                                                <div class="row">
                                                    {{-- <div class="col-sm-12 mb-2" title="{{$agencia->telefono}}">
                                                        <span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i><a href="tel:{{$agencia->telefono}}"> <span>{{$agencia->telefono}}</span></a></span>
                                                    </div> --}}
                                                    <div class="col-sm-12 " title="123, 123">
                                                        <span class="col-auto ser-contact"><i class="fas fa-map-marker-alt mr-1"></i><span >{{ $agencia->agencia[0]->ciudad }}, {{ $agencia->agencia[0]->estado }}</span></span>
                                                    </div>
                                                    <div class="col-sm-12 mt-2 ml-2">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-6">
                                                                <span class="ser-contact ml-2 mt-1"><i class="fas fa-images mr-1"></i>{{ count($agencia->agencia[0]->fotos) }}</span>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6">
                                                                <span class="ser-location ml-2 mt-1"><i class="fas fa-comments mr-1"></i>{{ count($agencia->agencia[0]->reviews) }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 text-center mt-4">
                                                        
                                                        @if ($agencia->agencia[0]->membresia_id == "3")
                                                            <label class="badge" style="background-color: var(--hover);color:white;" >PLUS</label>
                                                        @elseif($agencia->agencia[0]->membresia_id == "2")
                                                            <label class="badge badge-primary" >BASIC</label>
                                                        @elseif($agencia->agencia[0]->membresia_id == "1")
                                                            <label class="badge badge-secondary" >ZERO</label>
                                                        @endif

                                                       
                                                    </div>
                                                    <div class="col-sm-6 mt-4">
                                                        @if ($agencia->agencia[0]->contrato != null)
                                                            <a class="text-info" target="_blank" href="{{ route('admin.agencia.contrato'). '?agencia='.$agencia->agencia[0]->id }}">Ver contrato <i class="fas fa-contract" ></i> </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach

                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-sm-12 text-center mb-4">
                            <small>No tiene agencias</small>
                        </div>
                    </div>
                    @endif
                    
                </div>

            </div>
        </div>
    </div>

    </div>
    <!-- /Main Wrapper -->

    <div class="modal fade" id="eliminarAgenciaModal" tabindex="-1" role="dialog" aria-labelledby="eliminarAgenciaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <form method="POST" action="{{ route('users.agency.delete') }}" >
                {{ csrf_field() }}
                  <input type="hidden" id="agencia_delete_id" name="agencia_delete_id" value="">
                  <input type="hidden" id="user_delete_id" name="user_delete_id" value="">
                <div class="modal-body mt-4">
                    <div class="form-group text-center">
                    <label for="recipient-name" class="col-form-label">¿Estás seguro de eliminar esta agencia al usuario?</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Eliminar Agencia de Usuario</button>
                </div>
            </form>
          </div>
        </div>
    </div>

    <div class="modal fade" id="bajaPlanModal" tabindex="-1" role="dialog" aria-labelledby="bajaPlanModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <form method="POST" action="{{ route('users.baja.plan') }}" >
                {{ csrf_field() }}
                  <input type="hidden" id="user_plan_id" name="user_plan_id" value="">
                <div class="modal-body mt-4">
                    <div class="form-group text-center">
                    <label for="recipient-name" class="col-form-label">¿Estás seguro de dar de baja su membresía?</label>
                    <p>Se cambiará su membresá a ZERO y tendrás que cancelar su plan en Mercado Pago</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Dar de Baja Membresía</button>
                </div>
            </form>
          </div>
        </div>
    </div>
@endsection
