<?php $page="Solicitar Agencia";?>
@extends('layout.mainlayout')
@section('content')		
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-md-4 theiaStickySidebar">
				@include('usuario.sidebar')
			</div>
			<div class="col-xl-9 col-md-8">
				<div class="row mb-4">
					<div class="col-sm-6">
						<h4 class="widget-title">Solicitud de Nueva Agencia</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
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
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 card">
						<div class="card-body">
							<style>
								#map {
								height: 500px;
								}
								.controls {
									background-color: #fff;
									border-radius: 2px;
									border: 1px solid transparent;
									box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
									box-sizing: border-box;
									font-family: Roboto;
									font-size: 15px;
									font-weight: 300;
									height: 39px;
									margin-left: 17px;
									margin-top: 10px;
									outline: none;
									padding: 0 11px 0 13px;
									text-overflow: ellipsis;
									width: 400px;
								}

								.controls:focus {
									border-color: #4d90fe;
								}

								.title {
									font-weight: bold;
								}

								#infowindow-content {
									
								}

								#map #infowindow-content {
									sdisplay: inline;
								}
							</style>
							<div class="row">
								<div class="col-sm-12 text-center">
									<p class="text-info" > <i class="fas fa-info"></i> Escribe el nombre de tu agencia como esta en Google Maps para encontrarla más rápido.</p>
								</div>
								<div class="col-sm-12">
									<div style="display: none">
										<input
										id="pac-input" class="controls"
										type="text"
										placeholder="Escribe la dirección de la agencia."
										/>
									</div>
									<div id="map"></div>
									<div id="infowindow-content">
										<span id="place-name" class="title"></span><br />
										
										<span id="place-address"></span>
									</div>
								</div>
							</div>
							<form method="POST" action="{{ route('user.agency.solicitar.add') }}" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="row mt-2 mb-4">
									<div class="col-md-12 title">
										<ul class="list-inline">
											<li class="list-inline-item" ><span>1</span></li>
											<li class="list-inline-item"><h4>Datos de la Concesionaria</h4></li>
										</ul>
										<div class="mb-4"><div style="display: inline-block;"  class="line1"></div><div style="display: inline-block;"  class="line2"></div></div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-8 form-group">
										<label class="focus-label">*Nombre de la razón social</label>
											<input type="text" required id="razon_social" name="razon_social"  value="{{ old('razon_social') }}"  class="form-control floating" placeholder="Razón Social">
											<input type="hidden" required id="place_name" name="place_name"  value="{{ old('place_name') }}" >
									</div>
									<div class="col-sm-4">
										<div class="form-group form-focus">
											<label class="focus-label">Marca</label>
											<select class="filter-agency form-control" name="marca" required id="">
												@foreach ($marcas as $marca)
													<option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="row mt-1">
									<div class="col-sm-12">
										<p class="text-secondary" >ACTA CONSTITUTIVA</p>
									</div>
									<div class="col-md-4 form-group">
										<label for="">*Número de Instrumento</label>
										<input type="text" class="form-control" placeholder="Número de Instrumento" name="no_instrumento" value="{{ old('no_instrumento') }}" />
									</div>
									<div class="col-md-4 form-group">
										<label for="">*Volumen  del acta:</label>
										<input type="text" class="form-control" placeholder="Volumen" name="acta_volumen" value="{{ old('acta_volumen') }}" />
									</div>
									<div class="col-md-4 form-group">
										<label for="">*Fecha de Celebración:</label>
										<input type="date" class="form-control" placeholder="Fecha" name="acta_fecha" value="{{ old('acta_fecha') }}" />
									</div>  
									<div class="col-md-4 form-group">
										<label for="">*Localidad</label>
										<input type="text" class="form-control" placeholder="Localidad" name="acta_localidad" id="acta_localidad" value="{{ old('acta_localidad') }}" />
									</div>
									<div class="col-md-4 form-group">
										<label for="">*Número de Notario</label>
										<input type="text" class="form-control" placeholder="Número de Notario" name="acta_numero" value="{{ old('acta_numero') }}" />
									</div>
									<div class="col-md-4 form-group">
										<label for="">*Datos de inscripción</label>
										<input type="text" class="form-control" placeholder="Datos de Inscripción" name="acta_datos" value="{{ old('acta_datos') }}" />
									</div>  
									<div class="col-sm-12">
										<p class="text-secondary" >DATOS DEL PODER NOTARIAL</p>
									</div>
									<div class="col-md-4 form-group">
										<label for="">*Número de Instrumento</label>
										<input type="text" class="form-control" placeholder="Número de Instrumento" name="datos_no_instrumento" value="{{ old('datos_no_instrumento') }}" />
									</div>
									<div class="col-md-4 form-group">
										<label for="">*Volumen  del acta:</label>
										<input type="text" class="form-control" placeholder="Volumen" name="datos_volumen" value="{{ old('datos_volumen') }}" />
									</div>
									<div class="col-md-4 form-group">
										<label for="">*Fecha de Celebración:</label>
										<input type="date" class="form-control" placeholder="Fecha" name="datos_fecha" value="{{ old('datos_fecha') }}" />
									</div>  
									<div class="col-md-4 form-group">
										<label for="">*Localidad</label>
										<input type="text" class="form-control" placeholder="Localidad" name="datos_localidad" id="datos_localidad" value="{{ old('datos_localidad') }}" />
									</div>
									<div class="col-md-4 form-group">
										<label for="">*Número de Notario</label>
										<input type="text" class="form-control" placeholder="Número de Notario" name="datos_notario" value="{{ old('datos_notario') }}" />
									</div>
									<div class="col-md-4 form-group">
										<label for="">*Datos de inscripción</label>
										<input type="text" class="form-control" placeholder="Datos de Inscripción" name="datos_datos" value="{{ old('datos_datos') }}" />
									</div> 
									<div class="col-sm-12">
										<p class="text-secondary" >R.F.C:</p>
									</div> 
									<div class="col-md-8 form-group">
										<label for="">*RFC</label>
										<input type="text" class="form-control" placeholder="Escribe el RFC" name="rfc_rfc" id="rfc_rfc" value="{{ old('rfc_rfc') }}" />
									</div>  
									<div class="col-md-4 form-group">
										<label for="">*Número de Instrumento</label>
										<input type="text" class="form-control" placeholder="Número de Instrumento" name="rfc_numero" value="{{ old('rfc_numero') }}" />
									</div>  
									<div class="col-md-4 form-group">
										<label for="">*Volumen:</label>
										<input type="text" class="form-control" placeholder="Volumen" name="rfc_volumen" value="{{ old('rfc_volumen') }}" />
									</div>  
									<div class="col-md-4 form-group">
										<label for="">*Fecha de Celebración:</label>
										<input type="date" class="form-control" placeholder="Fecha" name="rfc_fecha" value="{{ old('rfc_fecha') }}" />
									</div>  
									
									<div class="col-md-4 form-group">
										<label for="">*Teléfono:</label>
										<input type="text" class="form-control" placeholder="Teléfono" name="rfc_telefono" value="{{ old('rfc_telefono') }}" />
									</div>  
									<div class="col-md-4 form-group">
										<label for="">*Email:</label>
										<input type="email" class="form-control" placeholder="Email" name="rfc_email" value="{{ old('rfc_email') }}" />
									</div> 
									<div class="col-md-8 form-group">
										<label for="">*Domicilio:</label>
										<input type="text" class="form-control" placeholder="Localidad" name="rfc_domicilio" id="rfc_domicilio" value="{{ old('rfc_domicilio') }}" />
									</div>  
									
									
									<div class="col-sm-12">
										<div class="form-group form-focus">
											<label class="focus-label">Dirección Completa</label>
											<input type="text" required  value="{{ old('direccion') }}"  id="direccion" name="direccion" class="form-control floating" placeholder="Escribe la dirección">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-6">
										<div class="form-group form-focus">
											<label class="focus-label">Latitud</label>
											<input type="text" id="lat" name="lat"  value="{{ old('lat') }}"  class="form-control floating" placeholder="Escribe la latitud">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-focus">
											<label class="focus-label">Longitud</label>
											<input type="text"  id="lng" name="lng"  value="{{ old('lng') }}"  class="form-control floating" placeholder="Escribe la longitud">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-focus">
											<label class="focus-label">Place ID</label>
											<input type="text" readonly required id="place_id_input"  value="{{ old('place_id') }}"  name="place_id" class="form-control floating" placeholder="Se autollena al buscar en el mapa">
										</div>
									</div>
								</div>
								{{-- <div class="row mt-3">
									<div class="col-sm-12">
										<label for="">Fotos</label>
									</div>
								</div>
								<div class="row" id="fotos">
									
								</div>
								<div class="row mt-3">
									<div class="col-sm-12">
										<label for="">Reviews</label>
									</div>
								</div>
								<div class="row" id="reviews">
									
								</div> --}}
								<div class="row">
									<div class="col-md-12 title">
										<ul class="list-inline">
											<li class="list-inline-item"><span>2</span></li>
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
								</div>
								<div class="col-sm-12">
									<label style="font-size: 19px" ><input type="checkbox" name="check_confirmo" class="" />
									Confirmo que la información enviada es válida y tengo el poder para hacerlo</label>
								</div>
								<div class="mt-5 float-right">
									<button class="btn btn-primary  " type="submit" > <i class="fas fa-save" ></i> Agregar Agencia</button>
									<a href="{{route('user.agencies')}}" class="btn btn-link">Cancelar</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	   @endsection
	  