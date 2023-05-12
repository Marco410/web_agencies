<?php $page="Papelera Usuarios";?>

@extends('layout.mainlayout_admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <h3>Papelera</h3>
            <hr>
            <nav class="nav nav-pills flex-column flex-sm-row">
                <a class="flex-sm-fill text-sm-center nav-link" href="{{ route('papelera.agencia') }}">Agencias</a>
                <a class="flex-sm-fill text-sm-center nav-link" href="{{ route('papelera.marca') }}">Marcas</a>
                <a class="flex-sm-fill text-sm-center nav-link active" href="{{ route('papelera.user') }}">Usuarios</a>
            </nav>

            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabla-users" class="table table-hover table-center mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Rol</th>
                                            <th class="text-right">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)


                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }} {{ $user->apellido_p }}</td>
                                                <td>
                                                    {{ $user->roles[0]->name }}
                                                    {{-- <img class="rounded service-img mr-1" src="{{URL::asset('storage/users/'.$user->imagen)}}" alt="{{ $user->nombre }}"> {{ $user->nombre }} --}}
                                                </td>
                                                <td class="text-right">
                                                    <button id="btn-delete-user" class="btn btn-sm btn-primary text-white"
                                                        data-toggle="modal" data-target="#destroymodal">
                                                        <i class="delete-dash fas fa-trash-alt"></i>

                                                    </button>
                                                    <button id="btn-recover-user" class="btn btn-sm btn-success text-white"
                                                        data-toggle="modal" data-target="#recovermodal">
                                                        <i class="fas fa-trash-restore"></i>
                                                    </button>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
                                                <p>¿Estas seguro de borrar esto para siempre?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="button" onclick="destroyUser()"
                                                    class="btn btn-primary">Confirmar</button>
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
                                                <p>¿Deseas recuperar este Usuario?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="recoverUser()">Confirmar</button>
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

@endsection
