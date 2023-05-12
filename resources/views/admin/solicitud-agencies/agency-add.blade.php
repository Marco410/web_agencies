<?php $page="Añadir Agencia";?>

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
                                <h3 class="page-title">Añadir Nueva Agencia "{{$solicitud->place_name }}" </h3>
                            </div>
                        </div>
                    </div>

					@if ($solicitud->agencia_add == 1)
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12 text-center">
									<h5 class="text-success" >La agencia ya fue añadida</h5>
								</div>
							</div>
						</div>
					</div>
					@else
						
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12 text-center p-4">
									<h5>En el buscador del mapa escribe: "{{ $solicitud->place_name }}" para obtener la información de la agencia</h5>
								</div>
							</div>
							
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
						<input type="hidden" name="place_id_solicitud" id="place_id_solicitud" value="{{ $solicitud->place_id }}">
						<input type="hidden" name="razon_social_search" id="razon_social_search" value="{{ $solicitud->razon_social }}">
							<form method="POST" action="{{ route('agencia.store') . '?solicitud='.$solicitud->id }}">
								{{ csrf_field() }}
								<div class="row">
									<div class="col-sm-12 p-4 text-center" id="msj_place_id">

									</div>
								</div>
								<div class="row mt-1">
									<div class="col-sm-6">
										<div class="form-group form-focus">
											<label class="focus-label">Nombre</label>
											<input type="text" required id="nombre" name="nombre"  value="{{ old('nombre') }}"  class="form-control floating" placeholder="Escribe tu nombre">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-focus">
											<label class="focus-label">Marca</label>
											<select class="filter-agency form-control" name="marca" id="">
												@foreach ($marcas as $marca)
													<option value="{{ $marca->id }}" {{ ($solicitud->marca_id == $marca->id) ? 'selected' : '' }} >{{ $marca->nombre }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group form-focus">
											<label class="focus-label">Dirección Completa</label>
											<input type="text" required  value="{{ old('direccion') }}"  id="direccion" name="direccion" class="form-control floating" placeholder="Escribe la dirección">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-focus">
											<label class="focus-label">Calle</label>
											<input type="text" required id="calle" name="calle"  value="{{ old('calle') }}"  class="form-control floating" placeholder="Escribe la calle">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-focus">
											<label class="focus-label">Colonia</label>
											<input type="text" required id="colonia" name="colonia"  value="{{ old('colonia') }}"  class="form-control floating" placeholder="Escribe la colonia">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-focus">
											<label class="focus-label">Ciudad</label>
											<input type="text" required id="ciudad" name="ciudad"  value="{{ old('ciudad') }}"  class="form-control floating" placeholder="Escribe la ciudad">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-focus">
											<label class="focus-label">Estado</label>
											<input type="text" required id="estado" name="estado"  value="{{ old('estado') }}"  class="form-control floating" placeholder="Escribe el estado">
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group form-focus">
											<label class="focus-label">Pais</label>
											<input type="text" required id="pais" name="pais"  value="{{ old('pais') }}"   class="form-control floating" placeholder="Escribe el país">
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group form-focus">
											<label class="focus-label">Código Postal</label>
											<input type="text" required id="cp" name="cp"  class="form-control floating"  value="{{ old('cp') }}"  placeholder="Escribe el código postal">
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group form-focus">
											<label class="focus-label">Teléfono</label>
											<input type="text" required id="telefono" name="telefono"  value="{{ old('telefono') }}"  class="form-control floating" placeholder="Escribe el teléfono">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-6">
										<div class="form-group form-focus">
											<label class="focus-label">Latitud</label>
											<input type="text"  required id="lat" name="lat"  value="{{ old('lat') }}"  class="form-control floating" placeholder="Escribe la latitud">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-focus">
											<label class="focus-label">Longitud</label>
											<input type="text"  required id="lng" name="lng"  value="{{ old('lng') }}"  class="form-control floating" placeholder="Escribe la longitud">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-focus">
											<label class="focus-label">Place ID</label>
											<input type="text" readonly required id="place_id_input"  value="{{ old('place_id') }}"  name="place_id" class="form-control floating" placeholder="Busca en el mapa para obtenerlo">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-focus">
											<label class="focus-label">Rating</label>
											<input type="text"  required  value="{{ old('rating') }}" id="rating" name="rating" class="form-control floating" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group form-focus">
											<label class="focus-label">Horario</label>
										</div>
									</div>
									<div class="col-sm-6">
										<div id="horario"></div>
										<textarea style="display: none" id="horario_input"   name="horario_input" value="{{ old('horario_input') }}" id="" cols="30" rows="10"></textarea>
									</div>
								
								</div>
								<div class="row mt-3">
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
									
								</div>
								<div class="mt-5">
									<button class="btn btn-primary  " type="submit" > <i class="fas fa-save" ></i> Agregar Agencia</button>
									<a href="{{route('solicitudes.agencies')  }}" class="btn btn-link">Cancel</a>
								</div>
							</form>
	
							<div class="row">
								<div class="col-sm-12">
									@if($errors->any())
									@foreach($errors->all() as $error)
									<div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong>{{ $error }}</div>
									@endforeach
									@endif
	
								</div>
							</div>
						</div>
					</div>
					@endif

                </div>
            </div>
        </div>
    </div>
@endsection
