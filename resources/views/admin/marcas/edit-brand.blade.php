<?php $page = 'Editar Marca'; ?>
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
                                <h3 class="page-title">Editar Marca</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <div class="card">
                        <div class="card-body">

                            <!-- Form -->
                            <form action="{{ route('marcas.update') }}"  enctype="multipart/form-data" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Marca</label>
                                    <input hidden name="id" class="form-control" type="text" value="{{ $marca->id }}">
                                    <input name="name" id="marca" class="form-control" type="text" onblur="genLinkMarca()"
                                     required   value="{{ $marca->nombre }}">
                                </div>
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <input name="description" class="form-control" type="text"
                                     required   value="{{ $marca->descripcion }}">
                                </div>
                                <div class="form-group">
                                    <label>Link</label>
                                    <input id="link" name="link" readonly class="form-control" type="text"
                                     required   value="{{ $marca->link }}">
                                </div>
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input class="form-control" name="imagen" type="file" >
                                </div>
                                <div class="form-group">
                                    <div class="w-100 img-marca">
                                        <img class="w-100 rounded" alt=""
                                            src="{{ asset('storage/marcas/' . $marca->imagen) }}">

                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                                    <a href="{{route('marcas')}}" class="btn btn-link">Cancel</a>
                                </div>
                            </form>
                            <!-- /Form -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>


            function genLinkMarca()
            {
                var x = document.getElementById("marca").value;
                var sinAcentos = x.normalize('NFD').replace(/[\u0300-\u036f]/g,"");
                var sinCarAlfaNum = sinAcentos.replace(/[^0-9a-z]/gi, '-');
                var linkGenerado = sinCarAlfaNum.toLowerCase();
                document.getElementById("link").value = linkGenerado;
            }
        </script>

    </div>



    <!-- /Main Wrapper -->
@endsection
