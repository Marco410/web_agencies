<?php $page="Agencias";?>

@extends('layout.mainlayout')
@section('content')

<div class="content">
	<div class="container">
		<div class="row">
			
			<div class="col-sm-12 mb-3">
				<span class="text-primary" >FILTROS: </span>
				<span class="text-secondary" >Marcas:</span>
				@if (isset($_GET['marca']))
					@foreach ($_GET['marca'] as $key => $marca)
					<span class="badge badge-primary">{{$marca}}</span>
					@endforeach
				@else
				<span class="badge badge-primary">Todas</span>
				@endif
				<span class="text-secondary ml-4" >Estado:</span>
				@if (isset($_GET['estado']))
					@foreach ($_GET['estado'] as $key => $estado)

					<span class="badge badge-primary">{{$estado}}</span>
					@endforeach
				@else
				<span class="badge badge-primary">Todos</span>
				@endif
				<span class="text-secondary ml-4" >Municipio(s):</span>

				@if (isset($_GET['municipio']))
					@foreach ($_GET['municipio'] as $key => $municipio)

					<span class="badge badge-primary">{{$municipio}}</span>
					@endforeach
				@else
				<span class="badge badge-primary">Todos</span>
				@endif
			</div>
			<div class="col-sm-12 col-md-2">
				<div class="dash-widget dash-bg-4 float-right">
					<span class="text-white text-center">¡Excelente! <br> Encontramos {{ $agenciasCount }} Resultado(s) para tu búsqueda.
				</div>
			</div>
			<div class="col-sm-10 mb-2" style="align-items: center; ">
					<div class="col-sm-12 col-md-6 text-center mb-3">
						<button type="button" class="btn btn-sm btn-primary text-center " id="btn_search" > <i class="fas fa-search" ></i>  Nueva Búsqueda</button>
					</div>
					<div class="col-sm-12 col-md-6 text-center mb-3 movil" style="display: none">
						<a href="#map" class="btn btn-sm btn-primary text-center"  > <i class="fas fa-map"></i>  Ver mapa</a>
					</div>
					<script>
						var multipleMuni;
							$(document).ready(function(){
							var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
								removeItemButton: true,
								itemSelectText: 'Selecciona',
								placeholder: true,
								loadingText: 'Cargando...',
								noResultsText: 'No se encontraron resultados',
								noChoicesText: 'No hay más elementos a elegir',
								});

								var multipleEstado = new Choices('#choices-multiple-estado', {
								removeItemButton: true,
								itemSelectText: 'Selecciona',
								placeholder: true,
								maxItemCount: 1,
								loadingText: 'Cargando...',
								noResultsText: 'No se encontraron resultados',
								noChoicesText: 'No hay más elementos a elegir',
								maxItemText: (maxItemCount) => {
									return `Solo puedes añadir ${maxItemCount} estado`;
									},
								});

								window.multipleMuni = new Choices('#choices-multiple-muni', {
									removeItemButton: true,
									itemSelectText: 'Selecciona',
									loadingText: 'Cargando...',
									noResultsText: 'No se encontraron resultados',
									noChoicesText: 'No hay más elementos a elegir',
									addItems: true
									});
						});
					</script>
					<form id="search-box" style="display:none"  method="GET" action="{{ route('agencias') }}">
						<div class="search-input line">
							<i class="fas fa-tv bficon"></i>
							<div class="form-group mb-0">
								<label for="">Selecciona una marca:</label>
                                <select id="choices-multiple-remove-button" multiple class="form-control" name="marca[]" id="marca">
									<option value="">Seleccione una marca:</option>
									@foreach ($marcas as $marca)
									<option value="{{ $marca->nombre }}">{{ $marca->nombre }}</option>

									@endforeach
								</select>
							</div>
						</div>
						<script>
							function getMuni(){
								var array = [];
								var search = document.getElementById("choices-multiple-estado").value;
								$.ajax({
								url: 'get-muni?estado=' +search,
								type:'get',
								beforeSend:function(){
									$('.ajax-load').show();
									$("#municipios").html("");
								}

							}).done(function(data){

								window.multipleMuni.clearChoices();
								$(".muni__list div.choices__list").html("");
								data.forEach(element => array.push(
									{
										value: element.municipio,
										label:element.municipio
									}
								)
								);
								window.multipleMuni.setChoices(array, 'value', 'label', false);

							}).fail(function(jqXHR,ajaxOptions,thrownError){
								console.log("El servidor no responde: "+thrownError);
							});
							}
						</script>
						<div class="search-input line">
							<i class="fas fa-location-arrow bficon"></i>
							<div class="form-group mb-0">
								<label for="">Selecciona un estado:</label>
								<select class="form-control"  multiple id="choices-multiple-estado" name="estado[]" onChange="getMuni()" >
									<option value=""></option>
									@foreach ($estados as $estado)
									<option value="{{ $estado->estado }}">{{ $estado->estado }}</option>
									@endforeach
								</select>
								{{-- <input type="text" class="form-control" placeholder="Your Location">  --}}
								<a class="current-loc-icon current_location" href="javascript:void(0);"><i class="fas fa-crosshairs"></i></a>
							</div>
						</div>
						<div class="search-input">
							<i class="fas fa-map-marker-alt bficon"></i>
							<div class="form-group mb-0">
								<label for="">Selecciona un municipio (opcional):</label>
								<select id="choices-multiple-muni" multiple class="form-control" id="municipios" name="municipio[]">

								</select>
							</div>
						</div>
						<div class="search-btn">
							<button class="btn search_service" type="submit"> <i class="fas fa-search" ></i> </button>
						</div>
					</form>
			</div>
			
			<div class="col-lg-6" >
				<div class="col-sm-6 mb-2">
					<label for=""> <i class="fas fa-filter" ></i>  Filtros:</label>
					<select class="form-control" name="filter" id="filter">
						<option value="">Seleccione:</option>
						<option value="m_ranking" @if (isset($_GET['order'])) @if ($_GET['order'] == 'm_ranking') selected @endif  @endif>Menor Ranking</option>
						<option value="ma_ranking" @if (isset($_GET['order'])) @if ($_GET['order'] == 'ma_ranking' ) selected @endif @endif>Mayor Ranking</option>
						<option value="ma_comentarios"@if (isset($_GET['order'])) @if ($_GET['order'] == 'ma_comentarios' ) selected @endif @endif>Más comentarios</option>
						<option value="m_comentarios"@if (isset($_GET['order'])) @if ($_GET['order'] == 'm_comentarios' ) selected @endif @endif>Menos comentarios</option>
					</select>
				</div>
				<div class="col-sm-12">
					<div class="row" id="post-data">
						@include('agencias_data')
					</div>
				</div>
				<div class="col-sm-12">
					<div class="ajax-load text-center" style="display: none">
						<img src="{{ asset('assets/img/loader.gif') }}" alt="">
						<p>Cargando más Agencias</p>
					</div>
					<script>
						function loadMoreAgencies(page){
							var s = "";
							if(window.location.search.toString().indexOf('?') != -1){
								s = "&";
							}else{
								s = "?";
							}

							$.ajax({
								url: window.location +s+ 'page=' +page,
								type:'get',
								beforeSend:function(){
									$('.ajax-load').show();
								}
							}).done(function(data){
								if(data.html == ""){
									$('.ajax-load').html("<div class='card' ><div class='card-body'><span class='text-primary'>No hay más agencias </span></div></div>");
									return;
								}
								$('.ajax-load').hide();
								$('#post-data').append(data.html);
							}).fail(function(jqXHR,ajaxOptions,thrownError){
								/* alert("El servidor no responde"); */
								console.log("El servidor no responde: "+thrownError);
							});
						}
						var page = 1;
						$(window).scroll(function(){
							var pantalla = $(document).height() - 200;
							if($(window).scrollTop() + $(window).height() >= ($(document).height() - 200)){
								page++;
								loadMoreAgencies(page);
							}
						});
					</script>
				</div>
			</div>
			<div class="col-lg-6 {{-- theiaStickySidebar --}}">
				<div class="row">
					<div class="col-sm-12 mr-2 " style="border-radius: 15px;">
						<style>
							#map {
							height: 700px;
							/* The height is 400 pixels */
							width: 100%;
							/* The width is the width of the web page */
							}
						</style>
						<div id="map" style="position: fixed" ></div>
						<hr>
					</div>

					<script>
						infoObj = [];
						function agenciasMarkers() {
							var center = { lat: 22.9742593, lng: -105.2873167 };
							const agencias = @json($agenciasall);
							var map = new google.maps.Map(document.getElementById("map"), {
								zoom: 5,
								center: center,
							});
							for(i = 0; i < agencias.length; i++){
								var marca = "";
								if(agencias[i]['marca'].length == 0){
									marca = "-";
								}else{
									marca = agencias[i]['marca'][0]['nombre'];
								}

								var content = '<div class="col-sm-12 text-center" ><h6>' + agencias[i]['nombre'].toString() + '</h6> <div class="col-sm-12" > <b>Estado:</b> '+ agencias[i]['estado'].toString()  +' </div> <div class"col-sm-12" > <b>Marca: </b>'+marca+' </div><div class="col-sm-12 mt-2" > <a class="btn btn-sm btn-primary" href="/agencia/'+agencias[i]['id'].toString()+'" > Ver Agencia </a> </div>  </div>';

								const marker = new google.maps.Marker({
									position: { lat:parseFloat(agencias[i]['lat'])  ,lng: parseFloat(agencias[i]['lng'])  },
									map: map,
									animation: google.maps.Animation.DROP
								});
								const infoWindow = new google.maps.InfoWindow({
									content: content
								});
								marker.addListener("click", () => {
									closeOtherInfo();
									infoWindow.open(marker.get('map'), marker);
									infoObj[0] = infoWindow;
									});
							}
							}
							function closeOtherInfo(){
								if(infoObj.length > 0){
									infoObj[0].set("marker",null);
									infoObj[0].close();
									infoObj[0].length = 0;
								}
							}
					</script>
				</div>
			</div>
		</div>
	</div>
</div>

</div>



	   @endsection
