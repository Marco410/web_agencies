<?php $page = 'Ficha de Solicitud '.$solicitud->nombre; ?>

@extends('layout.mainlayout_admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Ficha Solicitud  </h3>
                        <h4>Membresía: 
                            @if ($solicitud->membresia == 'Zero')
                                <span class="badge text-white" style="background-color: var(--gray)" >{{$solicitud->membresia}}</span>
                            @elseif($solicitud->membresia == 'Basic')
                            <span class="badge text-white" style="background-color: var(--primary)" >{{$solicitud->membresia}}</span>
                            @else
                            <span class="badge text-white" style="background-color: var(--hover)" >{{$solicitud->membresia}}</span>
                            @endif
                        </h4>
                        @if ($solicitud->status == 0)
                        <span class="text-white badge bg-info"> <i class="fas fa-clock" ></i> En Revisión</span>
                        @elseif($solicitud->status == 1)
                        <span class="text-white badge bg-success"> <i class="fas fa-check" ></i> Aprobado</span>
                        @else
                        <span class="text-white badge bg-danger"><i class="fas fa-times"></i> Rechazado</span>
                        @endif
                        @if ($solicitud->status_ask == 0)
                            <span class="text-white badge bg-danger">Sin Responder</span>
                        @else
                        <span class="text-white badge bg-success">Respondido</span>
                        @endif
                    </div>
                    <div class="col-auto text-right">
                    
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
          
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
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5>Datos de Contacto</h5>
                                </div>
                                <div class="col-sm-6 border-right border-bottom">
                                    <small class="text-secondary" >Nombre Completo:</small>
                                    <p>{{ $solicitud->nombre }} {{ $solicitud->apellido_p }} {{ $solicitud->apellido_m }}</p>
                                </div>
                                <div class="col-sm-6 border-bottom">
                                    <small class="text-secondary " >Fecha de Solicitud:</small>
                                    <p>{{ Date('d/M/Y', strtotime($solicitud->created_at)) }} </p>
                                </div>
                                <div class="col-sm-6 border-right border-bottom">
                                    <small class="text-secondary" >Teléfono:</small>
                                    <p>{{ $solicitud->telefono }}</p>
                                </div>
                                <div class="col-sm-6 border-bottom">
                                    <small class="text-secondary"> Correo Electrónico:</small>
                                    <p><a href="mailto:{{ $solicitud->email }}">{{ $solicitud->email }}</a></p>
                                </div>
                                <div class="col-sm-6 border-right border-bottom">
                                    <small class="text-secondary" >Empresa:</small>
                                    <p>{{ $solicitud->empresa }}</p>
                                </div>
                                <div class="col-sm-6 border-bottom">
                                    <small class="text-secondary" >Puesto:</small>
                                    <p>{{ $solicitud->puesto }}</p>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-4">
                                    <h5>Datos de la Concesionaria</h5>
                                </div>
                                <div class="col-sm-6 border-bottom">
                                    <small class="text-secondary" >Razón Social:</small>
                                    <p>{{ $solicitud->razon_social }}</p>
                                </div>
                                <div class="col-sm-12 mt-4">
                                    <p>ACTA CONSTITUTIVA</p>
                                </div>
                                <div class="col-sm-4 border-right border-bottom">
                                    <small class="text-secondary" >Número de Instrumento:</small>
                                    <p>{{ $solicitud->no_instrumento }}</p>
                                </div>
                                <div class="col-sm-4 border-right border-bottom">
                                    <small class="text-secondary" >Volumen  del acta:</small>
                                    <p>{{ $solicitud->acta_volumen }}</p>
                                </div>
                                <div class="col-sm-4 border-bottom">
                                    <small class="text-secondary" >Fecha de Celebración:</small>
                                    <p>{{ $solicitud->acta_fecha }}</p>
                                </div>

                                <div class="col-sm-4 border-right border-bottom">
                                    <small class="text-secondary" >Localidad:</small>
                                    <p>{{ $solicitud->acta_localidad }}</p>
                                </div>
                                <div class="col-sm-4 border-right border-bottom">
                                    <small class="text-secondary" >Número de Notario:</small>
                                    <p>{{ $solicitud->acta_numero }}</p>
                                </div>
                                <div class="col-sm-4 border-bottom">
                                    <small class="text-secondary" >Datos de inscripción ante el R.P.C.:</small>
                                    <p>{{ $solicitud->acta_datos }}</p>
                                </div>
                                <div class="col-sm-12 mt-4">
                                    <p>R.F.C.</p>
                                </div>
                                <div class="col-sm-4 border-right border-bottom">
                                    <small class="text-secondary" >Número de Instrumento:</small>
                                    <p>{{ $solicitud->rfc_numero }}</p>
                                </div>
                                <div class="col-sm-4 border-right border-bottom">
                                    <small class="text-secondary" >Volumen  del acta:</small>
                                    <p>{{ $solicitud->rfc_volumen }}</p>
                                </div>
                                <div class="col-sm-4 border-bottom">
                                    <small class="text-secondary" >Fecha de Celebración:</small>
                                    <p>{{ $solicitud->rfc_fecha }}</p>
                                </div>
                                <div class="col-sm-4 border-right border-bottom">
                                    <small class="text-secondary" >Domicilio:</small>
                                    <p>{{ $solicitud->rfc_localidad }}</p>
                                </div>
                                <div class="col-sm-4 border-right border-bottom">
                                    <small class="text-secondary" >Teléfono:</small>
                                    <p>{{ $solicitud->rfc_telefono }}</p>
                                </div>
                                <div class="col-sm-4 border-bottom">
                                    <small class="text-secondary" >Correo electrónico:</small>
                                    <p><p><a href="mailto:{{ $solicitud->rfc_email }}">{{ $solicitud->rfc_email }}</a></p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-4 mb-4">
                                    <h5>Documentación</h5>
                                </div>
                                <div class="col-sm-4">
                                    <small class="text-secondary" >Identificación Oficial (INE-Pasaporte)</small>
                                    <a target="_blank" href="{{ asset('storage/solicitudes/s'.$solicitud->id . '/' .$solicitud->ine) }}"> <img class="w-100 rounded" alt="ine" src="{{ asset('storage/solicitudes/s'.$solicitud->id . '/' .$solicitud->ine) }}" /></a>

                                </div>
                                <div class="col-sm-4">
                                    <small class="text-secondary" >Acta constitutiva de la empresa</small>
                                    <a target="_blank" href="{{ asset('storage/solicitudes/s'.$solicitud->id . '/' .$solicitud->acta_constitutiva) }}"> <img class="w-100 rounded" alt="acta constitutiva" src="{{ asset('storage/solicitudes/s'.$solicitud->id . '/' .$solicitud->acta_constitutiva) }}" /></a>

                                </div>
                                <div class="col-sm-4">
                                    <small class="text-secondary">Identificación del apoderado legal</small>
                                    <a target="_blank" href="{{ asset('storage/solicitudes/s'.$solicitud->id . '/' .$solicitud->identificacion) }}"> <img class="w-100 rounded" alt="Identificación del apoderado legal" src="{{ asset('storage/solicitudes/s'.$solicitud->id . '/' .$solicitud->identificacion) }}" /></a>
                                </div>
                                <div class="col-sm-4">
                                    <small class="text-secondary">Poder Notarial</small>
                                    <a target="_blank" href="{{ asset('storage/solicitudes/s'.$solicitud->id . '/' .$solicitud->poder_notarial) }}"> <img class="w-100 rounded" alt="Poder Notarial" src="{{ asset('storage/solicitudes/s'.$solicitud->id . '/' .$solicitud->poder_notarial) }}" /></a>
                                </div>
                                <div class="col-sm-4">
                                    <small class="text-secondary">Hoja de Registro del R.F.C.</small>
                                    <a target="_blank" href="{{ asset('storage/solicitudes/s'.$solicitud->id . '/' .$solicitud->hoja_registro) }}"> <img class="w-100 rounded" alt="Hoja de Registro del R.F.C" src="{{ asset('storage/solicitudes/s'.$solicitud->id . '/' .$solicitud->hoja_registro) }}" /></a>
                                </div>
                                <div class="col-sm-4">
                                    <small class="text-secondary">Comprobante de domicilio</small>
                                    <a target="_blank" href="{{ asset('storage/solicitudes/s'.$solicitud->id . '/' .$solicitud->comprobante) }}"> <img class="w-100 rounded" alt="Comprobante de domicilio" src="{{ asset('storage/solicitudes/s'.$solicitud->id . '/' .$solicitud->comprobante) }}" /></a>
                                </div>
                            </div>
                            <div class="row float-right">
                                <div class="col-sm-12 mt-4 mb-4 form-check-inline">
                                    <a class="mr-2" href="{{ url()->previous() }}">Regresar</a>
                                    
                                    <a  data-toggle="modal" data-target="#exampleModal" class="btn btn-md btn-secondary mr-2 text-white">Rechazar Solicitud</a>
                                   
                                    <a class="btn btn-md btn-primary ml-2" data-toggle="modal" data-target="#modalAprobar" href="">Generar Usuario y Aprobar Solicitud</a>
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

    <div class="modal fade" id="exampleModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rechazar Solicitud</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('solicitud.rechazar',$solicitud->id) }}">
            <div class="modal-body">
                    {{ csrf_field()}}
                    <p>¿Estas seguro de rechazar esta solicitud?</p>
                    <small class="text-secondary" >Añadir nota de rechazo:</small>
                    <textarea required class="form-control" name="nota" id=""></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAprobar" tabindex="-1"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Aprobar Solicitud</h5>
            <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="{{ route('solicitud.aprobar',$solicitud->id) }}">
        <div class="modal-body">
                {{ csrf_field()}}
                <p>¿Estas seguro de aprobar esta solicitud?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
