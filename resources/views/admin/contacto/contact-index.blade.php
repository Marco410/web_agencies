<?php $page="Mensajes de Contacto";?>

@extends('layout.mainlayout_admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="col">
                <h3 class="page-title mb-3">Mensajes de Contacto</h3>
                <small>Puedes responder a los mensajes dando clic al correo o al teléfono.</small>
                
            </div>
         
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatable table-hover display compact table-center mb-0" 
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Teléfono</th>
                                            <th>Mensaje</th>
                                            <th>Fecha</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contactos as $contacto)
                                        <tr>
                                            <td>{{ $contacto->id }}</td>
                                            <td>{{ $contacto->nombre }} {{ $contacto->apellidos }}</td>
                                            <td><a href="mailto:{{ $contacto->email }}">{{ $contacto->email }}</a></td>
                                            <td> <a href="tel:{{ $contacto->telefono }}">{{ $contacto->telefono }}</a></td>
                                            <td><?php 
                                            if(strlen($contacto->msj) > 35){
                                                echo substr($contacto->msj, 0, 35) . "...";
                                            }else{
                                                echo $contacto->msj;
                                            } ?></td>
                                            <td>{{ Date('d M Y',strtotime($contacto->created_at)) }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary text-white" href="" data-toggle="modal" data-target="#modalContacto" data-msj="{{ $contacto->msj }}" onclick="contacto(this)" > <i class="fas fa-eye" ></i> </a>
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

    <div class="modal fade" id="modalContacto" tabindex="-1" role="dialog" aria-labelledby="modalContactoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalContactoLabel">Mensaje de Contacto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 text-center mb-4" id="contacto-text" >
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
          </div>
        </div>
      </div>
    
      <script>
    
            function contacto(elemento){
                text = elemento.getAttribute("data-msj");
    
                $("#contacto-text").html('"'+text+'"');
    
            }
      </script>


@endsection
