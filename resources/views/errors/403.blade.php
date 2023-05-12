<?php $page="Sin Permisos";?>

@extends('layout.mainlayout')
@section('content')

    <div class="container mb-4 p-4">
        <div class="row">
            <div class="col-sm-12 text-center">
                <img width="10%" class="img-fluid" src="{{ asset('assets/img/logo-icon.png') }}" alt="">
                <h1>No tienes permisos</h1>
                <h4>Para acceder a esta página</h4>
                <i style="font-size: 30px" class="fas fa-user-shield x2" ></i>
            </div>
        </div>
    </div>

@endsection