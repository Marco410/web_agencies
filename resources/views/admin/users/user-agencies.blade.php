<?php $page = 'Agencias de '. $user->name; ?>

@extends('layout.mainlayout_admin')
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">
            
            <div class="row">
                <div class="col-sm-12">
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
                    <div class="page-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="page-title"> <i class="fas fa-car" ></i> Agencias de: {{ $user->name }} {{ $user->apellido_p }}</h3>
                                <input type="hidden" value="{{ $user->id }}" id="user_id"  >
                                <label for="">Seleccione la agencia que desea asignarle</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($agencias as $agencia)
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <a href="{{route('agencia.detalles',$agencia->id)}}">
                                    @if($agencia['agencia'][0]->marca()->first() != null) 		
                                    <img class="img-fluid serv-img rounded" width="50%" alt="Marca {{ $agencia['agencia'][0]->marca[0]->nombre }}" src="{{URL::asset('storage/marcas/'.$agencia['agencia'][0]->marca[0]->imagen)}}">
                                    @else
                                    <img class="img-fluid serv-img rounded" alt="Sin Marca" src="{{URL::asset('storage/marcas/default.jpg')}}">
                                    @endif 
                                    </a>
                                    <div class="item-info">
                                        
                                        <div class="cate-list">
                                            @if($agencia['agencia'][0]->marca()->first() != null) 
                                            <a class="bg-yellow" href="#">
                                                {{ $agencia['agencia'][0]->marca[0]->nombre}}  
                                            </a>
                                            @endif 
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h4 class="title">
                                        <a href="{{route('agencia.detalles',$agencia['agencia'][0]->id)}}">{{ $agencia['agencia'][0]->nombre }}</a>
                                    </h4>
                                    <div class="rating">
                                        <i class="fas fa-star {{ ($agencia['agencia'][0]->rating >= 1) ? 'filled' : '' }}"></i>
                                        <i class="fas fa-star {{ ($agencia['agencia'][0]->rating >= 2) ? 'filled' : '' }}"></i>
                                        <i class="fas fa-star {{ ($agencia['agencia'][0]->rating >= 3) ? 'filled' : '' }}"></i>
                                        <i class="fas fa-star {{ ($agencia['agencia'][0]->rating >= 4) ? 'filled' : '' }}"></i>
                                        <i class="fas fa-star {{ ($agencia['agencia'][0]->rating >= 5) ? 'filled' : '' }}"></i>
                                        <span class="d-inline-block average-rating">({{ $agencia['agencia'][0]->rating }})</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>

        