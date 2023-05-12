<?php $page="Papelera Agencias";?>

@extends('layout.mainlayout_admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <h3>Papelera</h3>
            <hr>
            <nav class="nav nav-pills flex-column flex-sm-row">
                <a class="flex-sm-fill text-sm-center nav-link active" href="{{route('papelera.agencia')}}">Agencias</a>
                <a class="flex-sm-fill text-sm-center nav-link" href="{{route('papelera.marca')}}">Marcas</a>
                <a class="flex-sm-fill text-sm-center nav-link"href="{{route('papelera.user')}}">Usuarios</a>
            </nav>

            <div class="row mt-5">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0 datatable" id="tabla-index">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Marca</th>
                                            <th>Ciudad</th>
                                            <th>Estado</th>
                                            <th>Rating</th>
                                            <th class="text-right">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($agencias as $agencia)

                                                <tr>
                                                    <td>{{ $agencia->id }}</td>
                                                    <td>{{ $agencia->nombre }}</td>
                                                    <td>{{ !isset($agencia->marca[0]->nombre) ? '' : $agencia->marca[0]->nombre }}
                                                    </td>
                                                    <td>{{ $agencia->ciudad }}</td>
                                                    <td>{{ $agencia->estado }}</td>
                                                    <td>{{ $agencia->rating }}</td>
                                                    <td>
                                                        <button id="btn-delete" class="btn btn-sm btn-primary text-white"
                                                            data-toggle="modal" 
                                                            data-id="{{ $agencia->id }}" data-target="#destroymodal">
                                                            <i class="delete-dash fas fa-trash-alt"></i>

                                                        </button>
                                                        <button id="btn-delete" class="btn btn-sm btn-success text-white"
                                                            data-toggle="modal" data-id="{{ $agencia->id }}"  data-target="#recovermodal">
                                                            <i class="fas fa-trash-restore"></i>

                                                        </button>

                                                        {{-- <button class="btn btn-sm btn-warning text-white" id='btn-edit'>

                                                        </button> --}}
                                                    </td>
                                                </tr>

                                        @endforeach
                                    </tbody>
                                </table>

                                {{-- Modal delete --}}
                                <!-- Modal -->

                                <div class="modal fade" id="destroymodal" tabindex="-1"
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
                                                <p>¿Deseas borrar esto de manera permanente?</p>
                                                <p>Se borrarán todos los datos asociados a la agencia.</p>
                                                <input type="hidden" name="delete_id_agencia" id="delete_id_agencia">
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="destroyAgencia()">Confirmar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="recovermodal" tabindex="-1"
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
                                                <p>¿Deseas recuperar esta agencia?</p>
                                                <input type="hidden" name="recuperar_id_agencia" id="recuperar_id_agencia">

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="recoverAgencia()">Confirmar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- End Modal --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
