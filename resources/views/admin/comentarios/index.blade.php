<?php $page="Comentarios";?>

@extends('layout.mainlayout_admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="col">
                <h3 class="page-title mb-3">Comentarios</h3>
                <div class="col-auto text-right mb-2">
                    <a class="btn btn-white filter-btn" href="javascript:void(0);" id="filter_search">
                        <i class="fas fa-filter"></i>
                    </a>
                </div>
            </div>
            <!-- Search Filter -->
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
            <div class="card filter-card" id="filter_inputs">
                <div class="card-body pb-0">
                        <div class="row filter-row">
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label>Agencias</label>
                                    <select class="filter-agency form-control" id="" style="width: 100%;" name="agencias-comentarios"
                                        id="filterAgency">
                                        <option value=""></option>
                                        @foreach ($agencias as $agencia)
                                            <option value="{{ $agencia->nombre }}"> {{ $agencia->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label>Autor</label>
                                    <div class="form-group">
                                        <input id="autor-search" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="button" onclick="Busqueda()">Filtrar</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <!-- /Search Filter -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="loading" style="display: none" class="row">
                                <div class="col-sm-12 text-center">
                                    <img width="100px" src="{{ asset('assets_admin/img/loading.gif') }}" alt="">
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover display compact table-center mb-0" id="tabla-comentarios"
                                style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Agencia</th>
                                        <th>Autor</th>
                                        <th>Comentarios</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                
                                    <tbody>
                                    </tbody>
                                </table>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.comentarios.comment-add-answer-modal')	
    @include('admin.comentarios.comment-delete-modal')	

@endsection
