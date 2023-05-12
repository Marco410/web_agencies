<?php $page = 'Editar Agencia'; ?>

@extends('layout.mainlayout_admin')
@section('content')


    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="page-title">Edit Agency</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <div class="card">
                        <div class="card-body">

                            <!-- Form -->
                            <h4 class="mt-4">Perfil</h4>
                            <hr>
                            <form action="{{ route('agencia.edit-save') }}" method="get">


                                <input hidden name="id" id="id" class="form-control mt-2" type="text"
                                    value="{{ $agencias->id }}" >


                                <div class="form-group mt-1">
                                    <label class="label-edit">Nombre</label>
                                    <input name="agencia" id="agencia" class="form-control mt-2" type="text"
                                        value="{{ $agencias->nombre }}" placeholder="Nombre">
                                </div>

                                <div class="form-row">
                                    <div class="input-group mb-3">
                                        <label class="w-100">Marca</label>
                                        <select class="custom-select" id="marcas-agencias" name="marca">
                                            @foreach ($marcas as $item)
                                                @if ($item->id == $marca->id)
                                                    <option selected value="{{ $item->id }}">{{ $item->nombre }}
                                                    </option>
                                                @endif
                                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>

                                <h4 class="mt-5">Direction</h4>
                                <hr>

                                <div class="form-row">
                                    <div class="col">
                                        <label class="label-edit" for="">Pais</label>
                                        <input name="pais" type="text" class="form-control" placeholder="Pais"
                                            value={{ $agencias->pais }}>
                                    </div>
                                    <div class="col">
                                        <label class="label-edit" for="">Estado</label>
                                        <select class="custom-select" id="estados" name="estado">
                                            @foreach ($estados as $estado)
                                                @if ($estado->estado == $agencias->estado)
                                                    <option selected value="{{ $estado->id }}">{{ $estado->estado }}
                                                    </option>
                                                @endif
                                                <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>

                                <div class="form-row mt-5">
                                    <div class="col">
                                        <label class="label-edit" for="">Ciudad</label>
                                        <select class="custom-select" id="ciudades" name="ciudad">

                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="label-edit" for="">CP</label>
                                        <input type="text" class="form-control" placeholder="Codigo Postal"
                                            value="{{ $agencias->cp }}" name="cp">
                                    </div>

                                </div>


                                <div class="form-row mt-5">
                                    <div class="col">
                                        <label class="label-edit" for="">Calle</label>
                                        <input type="text" class="form-control" placeholder="Calle" name="calle"
                                            value={{ $agencias->calle }}>
                                    </div>
                                    <div class="col">
                                        <label class="label-edit" for="">Colonia</label>
                                        <input type="text" class="form-control" placeholder="Colonia" name="colonia"
                                            value="{{ $agencias->colonia }}">
                                    </div>

                                </div>

                                <div class="form-row mt-5">
                                    <div class="col">
                                        <label class="label-edit" for="">Latitud</label>
                                        <input disabled type="text" class="form-control" placeholder="Latitud" name="lat"
                                            value={{ $agencias->lat }}>
                                    </div>
                                    <div class="col">
                                        <label class="label-edit" for="">Longitud</label>
                                        <input type="text" disabled class="form-control" placeholder="Longitud" name="lng"
                                            value="{{ $agencias->lng }}">
                                    </div>

                                </div>


                                <h4 class="mt-5">Contact</h4>
                                <hr>

                                <div class="form-row mt-3">
                                    <div class="col">
                                        <label class="label-edit" for="">Telefono</label>
                                        <input type="phone" class="form-control" placeholder="telefono" name="tel"
                                            value="{{ $agencias->telefono }}">
                                    </div>
                                    <div class="col">
                                        @if ($agencias->horario != '0')
                                            <div class="card available-widget">
                                                <div class="card-body">
                                                    <h5 class="card-title">Horario</h5>
                                                    <ul class="text-center">
                                                        <li>{!! $agencias->horario !!}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                </div>


                                <div class="mt-4">
                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                    <a href="{{route('agencia')}}" class="btn btn-link">Cancel</a>
                                </div>
                            </form>
                            <!-- Form -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /Main Wrapper -->
@endsection
