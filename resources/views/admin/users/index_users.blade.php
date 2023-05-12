<?php $page = 'Usuarios'; ?>

@extends('layout.mainlayout_admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Usuarios</h3>
                    </div>
                    <div class="col-auto text-right">
                        {{-- <a class="btn btn-white filter-btn mr-3" href="javascript:void(0);" id="filter_search">
                            <i class="fas fa-filter"></i>
                        </a> --}}
                        <a href="{{ route('users.add') }}" class="btn btn-primary add-button ml-3">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <!-- Search Filter -->
            <div class="card filter-card" id="filter_inputs">
                <div class="card-body pb-0">
                    <form action="#" method="post">
                        <div class="row filter-row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Sub Category</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>From Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>To Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Search Filter -->
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
                                <table id="tabla-users" class="table table-hover table-center mb-0 "style="width:100%" >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Rol</th>
                                            <th>Se Unió el</th>
                                            <th>Registro en</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            @if ($user->active == 1)

                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }} {{ $user->apellido_p }} </td>
                                                    <td> <a href="mailto:{{ $user->email }}">  {{ $user->email }}</a></td>
                                                    <td>
                                                        {{ $user->roles[0]->name }}
                                                        {{-- <img class="rounded service-img mr-1" src="{{URL::asset('storage/users/'.$user->imagen)}}" alt="{{ $user->nombre }}"> {{ $user->nombre }} --}}
                                                    </td>
                                                    <td>
                                                        {{ Date('d M Y', strtotime($user->created_at)) }}
                                                    </td>
                                                    <td>{{ $user->register_at }}</td>
                                                   
                                                    <td class="text-right">
                                                        @if ($user->block == 1)
                                                        <i title="Usuario Bloqueado" class="text-danger fas fa-user-times" ></i>
                                                        @endif
                                                        @if($user->roles[0]->name == "Dealer")
                                                        <a title="Asignar agencia al usuario" href="{{ route('users.asign.agency', $user->id) }}" class="btn btn-sm bg-info-light mr-2"><i class="fas fa-warehouse"></i>  Asignar</a>
                                                        {{-- <a title="Ver Agencias" href="{{ route('users.see-agencies-asign', $user->id) }}" class="btn btn-sm bg-primary-light mr-2"><i class="fas fa-car"></i> Agencias</a> --}}
                                                        @endif
                                                        <a href="{{ route('users.edit', $user->id) }}"
                                                            class="btn btn-sm bg-warning-light mr-2"><i class="far fa-edit mr-1"></i></a>
                                                        <button id="btn-delete-user"
                                                            class="btn btn-sm bg-danger-light text-white" data-toggle="modal"
                                                            data-target="#exampleModal">
                                                            <i class="delete-dash fas fa-trash-alt"></i>
                                                        </button>
                                                        
                                                    </td>
                                                    
                                            @endif
                                            </tr>
                                        @endforeach
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
