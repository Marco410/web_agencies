<?php $page="Papelera Marcas";?>

@extends('layout.mainlayout_admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <h3>Papelera</h3>
            <hr>
            <nav class="nav nav-pills flex-column flex-sm-row">
                <a class="flex-sm-fill text-sm-center nav-link " href="{{ route('papelera.agencia') }}">Agencias</a>
                <a class="flex-sm-fill text-sm-center nav-link active" href="{{ route('papelera.marca') }}">Marcas</a>
                <a class="flex-sm-fill text-sm-center nav-link" href="{{ route('papelera.user') }}">Usuarios</a>
            </nav>

            <div class="row mt-5">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabla-marca" class="table table-hover table-center mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Marca</th>
                                            <th>Descripción</th>
                                            <th class="text-right">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($marcas as $marca)

                                            <tr>
                                                <td>{{ $marca->id }}</td>
                                                <td>
                                                    <img class="rounded service-img mr-1"
                                                        src="{{ URL::asset('storage/marcas/' . $marca->imagen) }}"
                                                        alt="{{ $marca->nombre }}"> {{ $marca->nombre }}
                                                </td>
                                                <td>{{ $marca->descripcion }}</td>
                                                <td class="text-right">
                                                    <button id="btn-delete-marca" class="btn btn-sm btn-primary text-white"
                                                        data-toggle="modal" data-target="#destroymodal">
                                                        <i class="delete-dash fas fa-trash-alt"></i>

                                                    </button>
                                                    <button id="btn-recover-marca" class="btn btn-sm btn-success text-white"
                                                        data-toggle="modal" data-target="#recovermodal">
                                                        <i class="fas fa-trash-restore"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                        @endforeach
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
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="destroyMarca()">Confirmar</button>
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
                                                <p>¿Deseas recuperar esta marca?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="recoverMarca()">Confirmar</button>
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
