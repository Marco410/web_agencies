<?php $page = 'Groserias'; ?>

@extends('layout.mainlayout_admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Filtro de Lenguaje</h3>
                    </div>
                    <div class="col-auto text-right">
                        {{-- <a class="btn btn-white filter-btn mr-3" href="javascript:void(0);" id="filter_search">
                            <i class="fas fa-filter"></i>
                        </a> --}}
                        <a data-toggle="modal"
                        data-target="#addGroseria" class="btn btn-primary add-button ml-3 text-white">
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
                                <table  class=" datatable table table-hover table-center mb-0 ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Groseria</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($groserias  as $groseria)
                                                <tr>
                                                    <td>{{ $groseria->id }}</td>
                                                    <td>{{ $groseria->groseria }} </td>
                                                    <td class="text-right">
                                                        <a class="btn btn-sm bg-warning-light" data-toggle="modal" data-target="#modalUpdateGroseria" data-groseria="{{ $groseria->groseria }}" data-id="{{ $groseria->id }}" onclick="updateGroseria(this)" > <i class="fas fa-edit" ></i></a >

                                                            <a class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#modalDeleteGroseria" data-groseria="{{ $groseria->groseria }}" data-id="{{ $groseria->id }}" onclick="deleteGroseria(this)" > <i class="fas fa-trash" ></i></a >
                                                        
                                                        
                                                    </td>
                                                    
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /Main Wrapper -->

    <div class="modal fade" id="addGroseria" tabindex="-1"
                                    aria-labelledby="addGroseriaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGroseriaLabel">Añadir Groseria</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('groserias.add') }}">
                {{ csrf_field() }}

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="">Groseria</label>
                            <input class="form-control" type="text" name="groseria" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Cerrar</button>
                    <button type="submit" 
                    class="btn btn-primary">Añadir</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.groserias.update_groseria_modal')
@include('admin.groserias.delete_groseria_modal')

@endsection
