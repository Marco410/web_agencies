<?php $page = 'Solicitudes Agencias'; ?>

@extends('layout.mainlayout_admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Solicitudes de Agencias</h3>
                    </div>
                    <div class="col-auto text-right">
                      
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabla-users" class="table table-hover table-center mb-0 ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Concesionario</th>
                                            <th>Usuario</th>
                                            <th>Localidad</th>
                                            <th>Estado</th>
                                            <th>Estatus</th>
                                            <th>Agencia</th>
                                            <th>Fecha</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($solicitudes))
                                        @foreach ($solicitudes as $solicitud)
                                                <tr>
                                                    <td>{{ $solicitud->id }}</td>
                                                    <td>{{ $solicitud->razon_social }}</td>
                                                    <td>
                                                        <a href="{{ route('users.edit',$solicitud->user->id) }}">
                                                            {{ $solicitud->user->name }} {{ $solicitud->user->apellido_p }}
                                                        </a>
                                                        
                                                    </td>
                                                    <td>{{ $solicitud->acta_localidad }}</td>
                                                    <td>
                                                        @if ($solicitud->status_ask == 0)
                                                            <span class="text-white badge bg-danger">Sin Responder</span>
                                                        @else
                                                        <span class="text-white badge bg-success">Respondido</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center" >
                                                        @if ($solicitud->status == 0)
                                                        <span class="text-white badge bg-info"> <i class="fas fa-clock" ></i> En Revisión</span>
                                                        @elseif($solicitud->status == 1)
                                                        <span class="text-white badge bg-success"> <i class="fas fa-check" ></i> Aprobado</span>
                                                        @else
                                                        <span class="text-white badge bg-danger"><i class="fas fa-times"></i> Rechazado</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($solicitud->agencia_add == 0)
                                                        <a href="{{ route('solicitud.agency.add',$solicitud->id) }}"><span class="text-white badge bg-danger"><i class="fas fa-times"></i> Sin Crear</span></a>
                                                        @elseif($solicitud->agencia_add == 1)
                                                        <span class="text-white badge bg-success"> <i class="fas fa-check" ></i> Creada</span>
                                                        @else
                                                        <span class="text-white badge bg-info"> <i class="fas fa-clock" ></i> Sin Aprobar</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ Date('d M Y', strtotime($solicitud->created_at)) }}
                                                    </td>                                                    
                                                    <td class="text-right">
                                                        <a class="btn btn-sm bg-info-light" href="{{ route('solicitud.agency.ver',$solicitud->id) }}"> <i class="fas fa-eye"></i> </a>
                                                        <button id="btn-delete-user"
                                                            class="btn btn-sm bg-danger-light text-white" data-toggle="modal"
                                                            data-target="#exampleModal">
                                                            <i class="delete-dash fas fa-trash-alt"></i>
                                                        </button>
                                                        
                                                    </td>
                                               
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Estas seguro de borrar esto?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="button" onclick="deleteUser()"
                                                    class="btn btn-primary">Confirmar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /Main Wrapper -->
@endsection
