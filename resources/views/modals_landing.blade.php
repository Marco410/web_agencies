
    <!-- Login Modal -->
    <div class="modal account-modal fade" id="form_register_modal">
        <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 90%!important">
            <div class="modal-content">
                <div class="modal-header p-0 border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        
                        {{-- <form action="{{ route('landing.register_leader')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }} --}}
                            <div class="row">
                                <div class="col-md-4 float-left">
                                    <img width="187px" src="{{ asset('assets/img/logo-negro.png') }}" alt="Logo AutoNavega Registro">
                                </div>
                                <div class="col-md-8">
                                    <div class="">
                                        <h3>Formulario de <span class="text-primary" >Registro</span></h3>
                                        <p>Una vez firmado tu contrato crearemos un usuario para que puedas comenzar.</p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="divider"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 title">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><span>1</span></li>
                                        <li class="list-inline-item"><h4>Datos de Contacto</h4></li>
                                    </ul>
                                    <div class="mb-4"><div style="display: inline-block;"  class="line1"></div><div style="display: inline-block;"  class="line2"></div></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="">*Nombre</label>
                                    <input type="text" class="form-control" placeholder="Escribe tu Nombre" name="nombre" id="nombre" value="{{ old('nombre') }}" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">*Apellido Paterno</label>
                                    <input type="text" class="form-control" placeholder="Escribe tu Apellido Paterno" name="apellido_p" id="apellido_p" value="{{ old('apellido_p') }}" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">Apellido Materno</label>
                                    <input type="text" class="form-control" placeholder="Escribe tu Apellido Materno" name="apellido_m" id="apellido_m" value="{{ old('apellido_m') }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="">*Tu Email</label>
                                    <input type="email" class="form-control" placeholder="Escribe tu Email" name="email" id="email" value="{{ old('email') }}" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">*Tu Teléfono</label>
                                    <input type="text" class="form-control" placeholder="Escribe tu Teléfono" name="telefono" id="telefono" value="{{ old('telefono') }}" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">*Membresía</label>
                                    <select class="form-control" name="membresia" id="membresia">
                                        <option value="">Selecciona:</option>
                                        <option value="Basic">Basic</option>
                                        <option value="Plus">Plus</option>
                                    </select>
                                </div>
                            
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="">*Empresa a la que representas</label>
                                    <input type="text" class="form-control" placeholder="Agencia o Concesionaria" name="empresa" id="empresa" value="{{ old('empresa') }}" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">*Puesto dentro de la empresa</label>
                                    <input type="text" class="form-control" placeholder="Escribe tu puesto" name="puesto" id="puesto" value="{{ old('puesto') }}" />
                                </div>
                                <div class="col-md-4 form-group" >
                                    <label for="">Membresía:</label>
                                    <div id="zero" style="display: none">
                                        <div class="card-plan plan">
                                            <div class="card-heading" style="background-color: var(--gray)">
                                                ZERO
                                            </div>
                                        </div>
                                    </div>
                                <div id="basic" style="display: none">
                                    <div class="card-plan plan">
                                        <div class="card-heading" style="background-color: var(--primary)">
                                            Basic
                                        </div>
                                    </div>
                                </div>
                                <div id="plus" style="display: none">
                                    <div class="card-plan plan">
                                        <div class="card-heading" style="background-color: var(--hover)">
                                            Plus
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="divider"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 title">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><span>2</span></li>
                                        <li class="list-inline-item"><h4>Datos de la Concesionaria</h4></li>
                                    </ul>
                                    <div class="mb-4"><div style="display: inline-block;"  class="line1"></div><div style="display: inline-block;"  class="line2"></div></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <label for="">*Nombre de la razón social</label>
                                    <input type="text" class="form-control" placeholder="Razón Social" name="razon_social" id="razon_social" value="{{ old('razon_social') }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p>ACTA CONSTITUTIVA</p>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">*Número de Instrumento</label>
                                    <input type="text" class="form-control" placeholder="Número de Instrumento" name="no_instrumento" id="no_instrumento" value="{{ old('no_instrumento') }}" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">*Volumen  del acta:</label>
                                    <input type="text" class="form-control" placeholder="Volumen" name="acta_volumen" id="acta_volumen" value="{{ old('acta_volumen') }}" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">*Fecha de Celebración:</label>
                                    <input type="date" class="form-control" placeholder="Fecha" name="acta_fecha" id="acta_fecha" value="{{ old('acta_fecha') }}" />
                                </div>  
                                <div class="col-md-4 form-group">
                                    <label for="">*Localidad</label>
                                    <input type="text" class="form-control" placeholder="Localidad" name="acta_localidad" id="acta_localidad" value="{{ old('acta_localidad') }}" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">*Número de Notario</label>
                                    <input type="text" class="form-control" placeholder="Número de Notario" name="acta_numero" id="acta_numero" value="{{ old('acta_numero') }}" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">*Datos de inscripción ante el R.P.C.</label>
                                    <input type="text" class="form-control" placeholder="Datos de Inscripción" name="acta_datos" id="acta_datos" value="{{ old('acta_datos') }}" />
                                </div>
                                <div class="col-sm-12">
                                    <p class="text-secondary" >DATOS DEL PODER NOTARIAL</p>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">Número de Instrumento</label>
                                    <input type="text" class="form-control" placeholder="Número de Instrumento" name="datos_no_instrumento" id="datos_no_instrumento" value="{{ old('datos_no_instrumento') }}" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">Volumen  del acta:</label>
                                    <input type="text" class="form-control" placeholder="Volumen" name="datos_volumen" id="datos_volumen" value="{{ old('datos_volumen') }}" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">Fecha de Celebración:</label>
                                    <input type="date" class="form-control" placeholder="Fecha" name="datos_fecha" id="datos_fecha" value="{{ old('datos_fecha') }}" />
                                </div>  
                                <div class="col-md-4 form-group">
                                    <label for="">Localidad</label>
                                    <input type="text" class="form-control" placeholder="Localidad" name="datos_localidad" id="datos_localidad" value="{{ old('datos_localidad') }}" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">Número de Notario</label>
                                    <input type="text" class="form-control" placeholder="Número de Notario" name="datos_notario" id="datos_notario" value="{{ old('datos_notario') }}" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">Datos de inscripción</label>
                                    <input type="text" class="form-control" placeholder="Datos de Inscripción" name="datos_datos" id="datos_datos" value="{{ old('datos_datos') }}" />
                                </div>   
                                <div class="col-md-12">
                                    <p>R.F.C.:</p>
                                </div>
                                <div class="col-md-8 form-group">
                                    <label for="">*RFC</label>
                                    <input type="text" class="form-control" placeholder="Escribe el RFC" name="rfc_rfc" id="rfc_rfc" value="{{ old('rfc_rfc') }}" />
                                </div>  
                                <div class="col-md-4 form-group">
                                    <label for="">*Número de Instrumento</label>
                                    <input type="text" class="form-control" placeholder="Número de Instrumento" name="rfc_numero" id="rfc_numero" value="{{ old('rfc_numero') }}" />
                                </div>  
                                <div class="col-md-4 form-group">
                                    <label for="">*Volumen:</label>
                                    <input type="text" class="form-control" placeholder="Volumen" name="rfc_volumen" id="rfc_volumen" value="{{ old('rfc_volumen') }}" />
                                </div>  
                                <div class="col-md-4 form-group">
                                    <label for="">*Fecha de Celebración:</label>
                                    <input type="date" class="form-control" placeholder="Fecha" name="rfc_fecha" id="rfc_fecha" value="{{ old('rfc_fecha') }}" />
                                </div>  
                                <div class="col-md-4 form-group">
                                    <label for="">*Teléfono:</label>
                                    <input type="text" class="form-control" placeholder="Teléfono" name="rfc_telefono" id="rfc_telefono" value="{{ old('rfc_telefono') }}" />
                                </div>  
                                <div class="col-md-4 form-group">
                                    <label for="">*Email:</label>
                                    <input type="email" class="form-control" placeholder="Email" name="rfc_email" id="rfc_email" value="{{ old('rfc_email') }}" />
                                </div> 
                                <div class="col-md-8 form-group">
                                    <label for="">*Domicilio:</label>
                                    <input type="text" class="form-control" placeholder="Localidad" name="rfc_localidad" id="rfc_localidad" value="{{ old('rfc_localidad') }}" />
                                </div>  
                               
                               
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="divider"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 title">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><span>3</span></li>
                                        <li class="list-inline-item"><h4>Documentación</h4></li>
                                    </ul>
                                    <div class="mb-4"><div style="display: inline-block;"  class="line1"></div><div style="display: inline-block;"  class="line2"></div></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="">*Identificación Oficial (INE-Pasaporte)</label>

                                    <input type="file" name="ine" id="ine" class="inputfile inputIne"  />
                                    <label for="ine" ><span id="ine_filename">Subir Documento<i class="fas fa-upload float-right"></i> </span></label>
                                </div>  
                                <div class="col-md-4 form-group">
                                    <label for="">*Acta constitutiva de la empresa</label>

                                    <input type="file" name="acta_constitutiva" id="acta_constitutiva" class="inputfile inputActa"  />
                                    <label for="acta_constitutiva" ><span id="acta_constitutiva_filename">Subir Documento<i class="fas fa-upload float-right"></i> </span></label>
                                </div>  
                                <div class="col-md-4 form-group">
                                    <label for="">*Identificación del apoderado legal</label>

                                    <input type="file" name="identificacion" id="identificacion" class="inputfile inputIden"  />
                                    <label for="identificacion" ><span id="identificacion_filename">Subir Documento<i class="fas fa-upload float-right"></i> </span></label>
                                </div> 
                                <div class="col-md-4 form-group">
                                    <label for="">*Poder Notarial</label>
                                   {{--  <input type="file" class="form-control" placeholder="Subir Documento" name="poder_notarial" value="{{ old('poder_notarial') }}" /> --}}

                                    <input type="file" name="poder_notarial" id="poder_notarial" class="inputfile inputPoder"  />
                                    <label for="poder_notarial" ><span id="poder_notarial_filename">Subir Documento<i class="fas fa-upload float-right"></i> </span></label>
                                </div>  
                                <div class="col-md-4 form-group">
                                    <label for="">*Hoja de Registro del R.F.C.</label>
                                    {{-- <input type="file" class="form-control" placeholder="Subir Documento" name="hoja_registro" value="{{ old('hoja_registro') }}" /> --}}
                                    <input type="file" name="hoja_registro" id="hoja_registro" class="inputfile inputHoja"  />
                                    <label for="hoja_registro" ><span id="hoja_registro_filename">Subir Documento<i class="fas fa-upload float-right"></i> </span></label>
                                </div>  
                                <div class="col-md-4 form-group">
                                    <label for="">*Comprobante de domicilio</label>
                                    {{-- <input type="file" class="form-control" placeholder="Subir Documento" name="comprobante" value="{{ old('comprobante') }}" /> --}}
                                    </strong>
                                    <input type="file" name="comprobante" id="comprobante" class="inputfile inputComp"  />
                                    <label for="comprobante" ><span id="comprobante_filename">Subir Documento<i class="fas fa-upload float-right"></i> </span></label>
                                </div> 
                                <div class="col-sm-12 text-right">
                                    {{-- <h5 for="confirmo"><input id="confirmo" type="checkbox" class="" /> </h5> --}}
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="check_confirmo"  id="customCheck1">
                                        <label style="font-size: 17px" class="custom-control-label" for="customCheck1">Confirmo que la información enviada es válida y tengo el poder para hacerlo </label>
                                        
                                      </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <img style="display: none;" id="loading_landing"  src="{{ asset('assets_admin/img/loading.gif') }}" height="100px" width="100px" alt="">
                                    <button type="button" id="save-solicitud" class="btn btn-primary btn-lg float-right">Firmar Contrato</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12" id="errors">
                                    
                                    @if($errors->any())
                                        @foreach($errors->all() as $error)
                                        <div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong>{{ $error }}</div>
                                        @endforeach
                                        <script>
                                            $( document ).ready(function() {
                                                $('#form_register_modal').modal('toggle');
                                            });
                                        </script>
                                    @endif
                                    {{-- {{ dd(session()->all()); }} --}}
                                </div>
                            </div>
                       {{--  </form> --}}
                    </div>
                   

                </div>
            </div>
        </div>
    </div>
    <!-- /Login Modal -->

    <script>
        $("#form_register_modal").on('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            try{
                
                var recipient = button.getAttribute('data-membresia');
            }catch{
                var recipient = '{{ old("membresia") }}';
            }
            if (recipient == "Basic") {
                $("#membresia").val('Basic');
                $("#basic").show();
                $("#zero").hide();
                $("#plus").hide();
            }else if(recipient == "Zero"){
                $("#membresia").val('Zero');
                $("#basic").hide();
                $("#zero").show();
                $("#plus").hide();
            }else{
                $("#membresia").val('Plus');
                $("#basic").hide();
                $("#zero").hide();
                $("#plus").show();
            }
        });

        $('#membresia').on('change',function(){

            if($(this).val() == "Zero"){
                $("#basic").hide();
                $("#zero").show();
                $("#plus").hide();
            }else if($(this).val() == "Basic"){
                $("#basic").show();
                $("#zero").hide();
                $("#plus").hide();
            }else{
                $("#basic").hide();
                $("#zero").hide();
                $("#plus").show();
            }
        });
    </script>

  <!--  Modals -->
    @if (session('statusSol'))
    <script>
        $( document ).ready(function() {
            $('#success_modal').modal('toggle');
        });
    </script>
    @endif
        <!-- Success Modal -->
        <div class="modal account-modal fade" id="success_modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header p-0 border-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row text-center">
                            <div class="col-sm-12">
                                <i class="fas fa-check fa-2x text-success"></i>
                                <p id="succes-msj">{!! session('statusSol') !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Success Modal -->

    <script>
        function close_login(){
            $('#login_modal').hide();
            $('#user-register').show();
        }

        function close_register(){
            $('#user-register').hide();
            $('#login_modal').show();
        }
    </script>
