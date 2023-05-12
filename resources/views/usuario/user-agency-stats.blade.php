<?php $page=$agencia->nombre;?>
@extends('layout.mainlayout')
@section('content')		
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-md-4 theiaStickySidebar">
				@include('usuario.sidebar')
			</div>
			<input type="hidden" id="agencia_id" value="{{ $agencia->id }}" >
			<div class="col-xl-9 col-md-8">
				<h4 class="widget-title"> {{ $agencia->nombre }} @if ($agencia->membresia_id == "3")
					<label class="badge" style="background-color: var(--hover);color:white;" >PLUS</label>
				@elseif($agencia->membresia_id == "2")
					<label class="badge badge-primary" >BASIC</label>
				@elseif($agencia->membresia_id == "1")
					<label class="badge badge-secondary" >ZERO</label>
				@endif </h4>
				<div class="row">
					<div class="col-sm-12" id="membresia-change-status" style="display: none" >
						<div class="alert alert-success">
							Tu membresia se pauso o se cancelo con éxito.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
					<div class="col-sm-12">
						@if (session('status_qr'))
							<div class="alert alert-success">
								{{ session('status_qr') }}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						@endif
						@if (session('status_hor'))
							<div class="alert alert-success">
								{{ session('status_hor') }}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						@endif
					</div>
				</div>
				<div class="row">
					
					<div class="col-lg-4">
						<a href="#" class="dash-widget dash-bg-3">
							<span class="dash-widget-icon">{{ $finRating }}</span>
							<div class="dash-widget-info">
								<span><i class="fas fa-star filled" ></i> Rating Total</span>
							</div>
						</a>
					</div>
					
					<div class="col-lg-4">
						<a href="#" class="dash-widget dash-bg-2">
							<span class="dash-widget-icon">{{ $agencia->fotos_count }}</span>
							<div class="dash-widget-info">
								<span>Fotos</span>
							</div>
						</a>
					</div>
					<div class="col-lg-4">
						<a href="#" class="dash-widget dash-bg-1">
							<span class="dash-widget-icon">{{ $agencia->reviews_count }}</span>
							<div class="dash-widget-info">
								<span>Comentarios</span>
							</div>
						</a>
					</div>
				</div>

				{{-- GRÁFICA DE LOS CUATRO ESTANDARES TOTAL  --}}
				<div class="row mt-4 card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6 align-self-center">
								<div class="row">
									<div class="col-sm-12">
										<h2 id="total_rating" >{{ $finRating }}</h2>
										<div class="review-count">
											<div class="rating">
												<i id="1r" class="fas fa-star {{ ($finRating >= 1) ? 'filled' : '' }} fa-lg"></i>
												<i id="2r" class="fas fa-star {{ ($finRating >= 2) ? 'filled' : '' }} fa-lg"></i>
												<i id="3r" class="fas fa-star {{ ($finRating >= 3) ? 'filled' : '' }} fa-lg"></i>
												<i id="4r" class="fas fa-star {{ ($finRating >= 4) ? 'filled' : '' }} fa-lg"></i>
												<i id="5r" class="fas fa-star {{ ($finRating >= 5) ? 'filled' : '' }} fa-lg"></i>
											</div>
										</div>
										<span>Calificación General</span>
									</div>
									<div class="col-sm-12  mt-4 ">
										<div class="row border-top">
											<div class="col-sm-6 mt-2">
												<small class="text-secondary" >Periodo:</small>
											</div>
											<div class="col-sm-6 mt-2">
												<small>Del <strong class="text-primary" id="in" >{{ date('d M Y', strtotime($dateIni)) }}</strong> al <strong class="text-primary" id="end" >{{ date('d M Y')}}</strong> </small>
											</div>
										</div>
										<div class="row border-top mt-3">
											<div class="col-sm-6 mt-2">
												<small class="text-secondary" >Total de comentarios:</small>
											</div>
											<div class="col-sm-6 mt-2">
												<small><strong id="total_reviews" >{{ $agencia->reviews_count }}</strong></small>
											</div>
										</div>
										
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="row">

									<div class="col-sm-6"  >
										<label for="">Fecha Inicial</label>
										<input class="form-control" type="date" name="range_inTotal" id="range_inTotal" onchange="changePeriodoTotal()" />
									</div>
									<div class="col-sm-6 " >
										<label for="">Fecha Final</label>
										<input class="form-control" type="date" name="range_endTotal" id="range_endTotal" onchange="changePeriodoTotal()" />
									</div>
								</div>
		
								<div class="col-lg-12 mb-4" >
									<canvas id="myChart" width="500" height="270"></canvas>
									<script>
									var agencia_id = {{ $agencia->id }};
									let myChart;						
									function changePeriodoTotal(){
										var ini = $("#range_inTotal").val();
										var fin = $("#range_endTotal").val();
		
										$.ajax({
											url:'/usuario/data-estandar?agencia='+agencia_id+"&range_in="+ini+"&range_end="+fin,
											method: 'GET',
		
										}).done(function(resp){
											if(myChart){
												myChart.destroy();
											}
											$("#1r").removeClass('filled');
											$("#2r").removeClass('filled');
											$("#3r").removeClass('filled');
											$("#4r").removeClass('filled');
											$("#5r").removeClass('filled');

											var inDate = resp[5];
											var endDate = resp[6]
											var total_reviews = resp[4]
											var total_rating = resp[7]

											if(total_reviews == "0"){
												$("#total_rating").html("<span style='font-size:18px' >No hay comentarios en este rango de fechas</span>");
												$("#in").html(inDate);
												$("#end").html(endDate);
												$("#total_reviews").html(total_reviews);

											}else{
												$("#in").html(inDate);
												$("#end").html(endDate);
												$("#total_reviews").html(total_reviews);
												$("#total_rating").html(total_rating);
												if(total_rating >= 1){
													$("#1r").addClass('filled');
												}
												if(total_rating >= 2){
													$("#2r").addClass('filled');
												}
												if(total_rating >= 3){
													$("#3r").addClass('filled');
												}
												if(total_rating >= 4){
													$("#4r").addClass('filled');
												}
												if(total_rating >= 5){
													$("#5r").addClass('filled');
												}
											}
											generarGraficaTotal(resp[0],resp[1],resp[2],resp[3],resp[4]);
		
										});
										
									}
									generarGraficaTotal({{ $finAtencion }}, {{ $finPracticidad }}, {{ $finVelocidad }}, {{ $finResultado }},{{ $countAtencion }});
									function generarGraficaTotal(finAtencion, finPracticidad, finVelocidad, finResultado,countAtencion){
		
										let delayed;
										const ctx = document.getElementById('myChart').getContext('2d');
										myChart = new Chart(ctx, {
										type: 'bar',
										data: {
											labels: ['Atención Per.', 'Instalaciones', 'Tiempo de Respuesta', 'Calificación General'],
											datasets: [{
												label: 'Calificación total en base a '+countAtencion + ' comentarios',
												data: [finAtencion,finPracticidad,finVelocidad,finResultado],
												backgroundColor: [
													'#E5E5E5',
													'#E5E5E5',
													'#E5E5E5',
													'#E5E5E5'
												],
												borderRadius:15
											},
											
											]
										},
										options: {
											animation: {
											onComplete: () => {
												delayed = true;
											},
											delay: (context) => {
												let delay = 0;
												if (context.type === 'data' && context.mode === 'default' && !delayed) {
												delay = context.dataIndex * 300 + context.datasetIndex * 100;
												}
												return delay;
											},
											},
											scales: {
												y: {
													beginAtZero: true,
													title: {
														display:true,
														text: "Rating " + countAtencion + " comentarios"
													}
												}
											}
										}
										});
									}
									</script>
								</div>
							</div>
						</div>
						
					</div>
				</div>

				<div class="row">
					
					<div class="col-sm-6">
						<h5>Información</h5>
						<div class="card">
							<div class="card-body">
								<div class="col-sm-12">
									<div class="row border-bottom mb-3">
										<div class="col-sm-3">
											<small class="text-secondary">Teléfono</small>
										</div>
										<div class="col-sm-9 text-right">
											<small><strong> {{ $agencia->telefono }}</strong></small>
											<a class="text-info" style="cursor: pointer" data-toggle="modal" data-target="#modalTelefono" data-id="{{ $agencia->id }}" data-telefono="{{ $agencia->telefono }}" ><i class="fas fa-edit" ></i></a>
										</div>
									</div>
									<div class="row border-bottom mb-3">
										<div class="col-sm-3">
											<small class="text-secondary">Dirección</small>
										</div>
										<div class="col-sm-9 text-right">
											<small><strong> {{ $agencia->direccion }}</strong></small>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
								</div>
								
							</div>
						</div>
						{{-- @if ($agencia->qr)
						<h5>Qr <i class="fas fa-qrcode" ></i> </h5>
						<div class="card">
							<div class="card-body">
								<div class="col-sm-12">
									<div class="row  mb-3">
										<div class="col-sm-9">
											<small class="text-secondary">Descargar</small>
										</div>
										<div class="col-sm-3 text-right">
											<a href="{{ route('user.download.qr',$agencia->qr->id) }}"> <i class="fas fa-download" ></i> </a>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
								</div>
								
							</div>
						</div>	
						@endif --}}
						<h5>Fotos <i class="fas fa-image" ></i> </h5>
						<div class="card">
							<div class="card-body">
								<div class="col-sm-12">
									<div class="row  mb-3">
										<div class="col-sm-9">
											<small class="text-secondary">Ver y Actualizarlas</small>
										</div>
										<div class="col-sm-3 text-right">
											<a class="text-info" style="cursor: pointer" data-toggle="modal" data-target="#modalFotos" > <i class="fas fa-images" ></i> </a>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
								</div>
								
							</div>
						</div>
						
					</div>

					<div class="col-sm-6">
						<h5>Horario</h5>
						<div class="card">
							<div class="card-body text-center">
								@if ($agencia->horario == '0')
									<span>Sin horario</span>
								@else
								<div class="col-sm-12 text-center">

									@if ($agencia->hours)
									<div class="row">
										<div class="col-sm-6 border-right">
											<label class="text-secondary">Lunes</label> <br>
											<strong><span class="border-bottom" >{{ $agencia->hours->lun }}</span></strong> <br> <br>
											<label class="text-secondary">Martes</label> <br>
											<strong><span class="border-bottom">{{ $agencia->hours->mar }}</span></strong> <br><br>
											<label class="text-secondary">Miércoles</label> <br>
											<strong><span class="border-bottom">{{ $agencia->hours->mie }}</span></strong> <br><br>
											<label class="text-secondary">Jueves</label> <br>
											<strong><span class="border-bottom">{{ $agencia->hours->jue }}</span></strong> <br><br>
										</div>
										<div class="col-sm-6">
											<label class="text-secondary">Viernes</label> <br>
											<strong><span class="border-bottom">{{ $agencia->hours->vie }}</span></strong> <br><br>
											<label class="text-secondary">Sábado</label> <br>
											<strong><span class="border-bottom">{{ $agencia->hours->sab }}</span></strong> <br><br>
											<label class="text-secondary">Domingo</label> <br>
											<strong><span class="border-bottom">{{ $agencia->hours->dom }}</span></strong> <br><br>
										</div>
									</div>
									@else
									{!! $agencia->horario !!}
										
									@endif

								</div>
								@endif
								<button class="btn" data-toggle="modal" data-target="#modalHorario" > <i class="fas fa-pen" ></i> </button>
								
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<h5>Resumen de membresía  </h5> 
						@if ($agencia->membresia_id != "1")
						<a class="text-info" target="_blank" href="{{ route('user.agencia.contrato'). '?agencia='.$agencia->id }}">Ver Contrato <i class="fas fa-file-contract" ></i> </a>
						@endif
						<div class="card mt-2">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										<div class="row border-bottom mb-4">
											<div class="col-sm-4">
												<small class="text-secondary" >Membresía</small>
											</div>
											<div class="col-sm-4">
												@if ($agencia->membresia_id == "3")
													<label class="badge" style="background-color: var(--hover);color:white;" >PLUS</label>
												@elseif($agencia->membresia_id == "2")
													<label class="badge badge-primary" >BASIC</label>
												@elseif($agencia->membresia_id == "1")
													<label class="badge badge-secondary" >ZERO</label>
												@endif
											</div>
											<div class="col-sm-4">
												<small class="text-secondary" >Tipo:</small>
												@if ($agencia->suscripcion)
												<small> <strong style="text-transform: capitalize;"  > {{ $agencia->suscripcion->plan }}</strong></span>
													@endif
											</div>
										</div>
										<div class="row border-bottom mb-4">
											<div class="col-sm-4">
												<small class="text-secondary" >Empezó en</small>
											</div>
											<div class="col-sm-4">
												@if ($agencia->suscripcion)
												<small id="suscripcion_date" ></small>
												@else
												<small>{{ date('d M Y', strtotime($agencia->created_at)) }}</small>
												@endif
												
											</div>
											<div class="col-sm-4">
												@if ($agencia->suscripcion)
													<?php $precio= 0; ?>
													@if ($agencia->suscripcion->plan == "anual")
														<?php $precio= $agencia->suscripcion->membresia->anual; ?>
													@elseif ($agencia->suscripcion->plan == "semestral")
														<?php $precio= $agencia->suscripcion->membresia->semestral; ?>
													@else
														<?php $precio= $agencia->suscripcion->membresia->mensual; ?>
													@endif
													<small class="text-secondary" >Precio: <strong>${{ number_format($precio,2,".",",") }}</strong></small>
												@endif
											</div>
										</div>
										@if ($agencia->membresia_id != 1)
										<div class="row border-bottom mb-4" id="next_payment">
											<div class="col-sm-4">
												<small class="text-secondary" >Próximo Pago</small>
											</div>
											<div class="col-sm-4">
												<small id="next_payment_date" ></small>
												
											</div>
											<div class="col-sm-4">
												<small class="text-secondary" >Pago: <strong id="transaction_amount" ></strong></small>
											</div>
										</div>
										<div class="row border-bottom mb-4" id="months_plan">
											<div class="col-sm-4">
												<small class="text-secondary" >Plan</small>
											</div>
											<div class="col-sm-4">
												<small id="reason" ></small>
											</div>
											<div class="col-sm-4">
												<small id="status" ></small>
											</div>
										</div>
										<div class="row border-bottom mb-4" id="months_plan">
											<div class="col-sm-8">
												<small class="text-secondary" >Meses para finalizar membresía</small>
											</div>
											<div class="col-sm-4">
												<small id="months_plan_pending" >Ninguno</small>
											</div>
										</div>
										@endif
										<div class="row text-center"  >
											
											{{-- <div class="col-sm-6">
												<button class="btn btn-md btn-white">Actualizar Método de Pago</button>
											</div> --}}
												@if ($agencia->suscripcion->plan != "anual" || $agencia->suscripcion->membresia_id != 3)
													
												<div class="col-sm-12 mt-2" id="btn-update-membresia">
													<a class="btn btn-md btn-primary" href="{{ route('user.cambiar.plan',$agencia->id) }}" style="font-size: 12px" >Cambiar plan de la agencia</a>
												</div>
												
												@endif
												<div class="col-sm-12 mt-2" id="btn-buy-membresia" style="display: none;">
													<div class="row">
														<div class="col-sm-6">
															<a class="btn btn-md btn-primary btn-block" href="{{ route('user.perfil.membresia') . '?membresia=Basic&agencia='.$agencia->id }}" target="_blank" style="font-size: 12px" >Comprar Membresía Basic</a>
														</div>
														<div class="col-sm-6">
															<a class="btn btn-md btn-white" href="{{ route('user.perfil.membresia') . '?membresia=Plus&agencia='.$agencia->id }}" target="_blank" style="font-size: 12px;" >Comprar Membresía Plus</a>
														</div>
													</div>

												</div>
											{{-- 	<div class="col-sm-6 mt-4">
													<div class="col-sm-6">
														<a class="btn btn-sm btn-warning text-white" id="btn-pause-plan" style="font-size: 12px" >Pausar mi Plan</a>
													</div>
												</div> --}}
												{{-- <div class="col-sm-6 mt-2">
													<button type="button" class="btn" id="btn-cancelar-plan" style="font-size: 12px" >Cancelar mi Plan</button>
												</div> --}}
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>

				<div class="row card">
					<div class="card-body">
						<div class="row">
						<div class="col-sm-6">
							<h3 class="heading">Código QR AutoNavega®</h3>
							<small>
								Genera un código QR de forma ráida y sencilla, el cual podrás imprimir y colocar en espacio estratégico para que todos tus visitantes puedan subir su calificación.
							</small> <br>
							<form method="POST" action="{{ route('user.agency.qr') }}">
								{{ csrf_field() }}
								<input type="hidden" name="url" value="{{ route('agencia.detalles',$agencia->id) }}" >
								<input type="hidden" name="agencia_id" value="{{ $agencia->id }}" >
								<button type="submit" class="btn btn-md btn-primary mt-4" >Genera QR <i class="fas fa-qrcode" ></i> </button>
								{{-- {{ QrCode::size(200)->generate(url()->current()); }} --}}
							</form>
							</div>
						<div class="col-sm-6">
							<img class="img-fluid" src="{{ asset('assets/img/qr-ejemplo.png') }}" alt="">
						</div>
					</div>

					</div>
				</div>
				
				{{-- Gráfica por periodo # comentarios --}}
				<div class="row mt-4 card ">
					<div class="card-body">

						<div class="col-sm-12">
							<h5>Gráfica por periodo. # Comentarios</h5>
							<small>Seleccione un perido para visualizar la gráfica.</small>
							<hr>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<select class="form-control" name="periodo" id="periodo" onchange="changePeriodo()" >
									<option value="">Seleccione un periodo:</option>
									<option value="anio" selected  >Año</option>
									<option value="mes">Mes</option>
									<option value="range">Rango entre fechas</option>
									{{-- $datos = vEstadoPedidos::where('created_at', '>=', now()->subDays(30))
									->whereCodVendedor($userAct->codvendedor)
									->get(); --}}
								</select>
							</div>
	
							<div class="col-sm-3" id="panel-range-in" style="display: none;">
								<input class="form-control" type="date" name="range_in" id="range_in" onchange="changePeriodo()" />
							</div>
							<div class="col-sm-3" id="panel-range-end" style="display: none;">
								<input class="form-control" type="date" name="range_end" id="range_end" onchange="changePeriodo()" />
							</div>
							<div class="col-sm-2" id="panel-range-type" style="display: none;">
								<select class="form-control" name="range_period" id="range_period" onchange="changePeriodo()" >
									<option value="">Seleccione la vista:</option>
									<option selected value="anio">Año</option>
									<option value="mes">Mes</option>
									<option value="day">Día</option>
								</select>
							</div>
							<div class="col-sm-5" id="panel-anio-mes" style="display: none;">
								<select class="form-control" name="anio-mes"  id="anio-mes" onchange="changePeriodo()"  >
									<option value="">Seleccione un año:</option>
								</select>
							</div>
						</div>
						
						<div class="col-sm-12">
							<canvas id="myReviews" width="400" height="200"></canvas>
							<script>
							var agencia_id = {{ $agencia->id }};
							var periodo = $("#periodo").val();
							let myReviews;
							
							function changePeriodo(){
								elemento = document.getElementById('periodo').value;
								var fecha = new Date();
								var anio = fecha.getFullYear();
								var anios = [anio-3,anio-2,anio-1,anio];

								if(elemento == "mes"){
									$('#panel-anio-mes').show();
									if($("#anio-mes option[value=2022]").length > 0){

									}else{
										for(k=0;k<anios.length;k++){
											$("#anio-mes").append('<option value='+anios[k]+' >'+anios[k]+'</option>');
										}
									}
									$('#panel-range-in').hide();
									$('#panel-range-end').hide();
									$('#panel-range-type').hide();
								}else if (elemento == "range" ){
									
									$('#panel-anio-mes').hide();
									$('#panel-range-in').show();
									$('#panel-range-end').show();
									$('#panel-range-type').show();
									
								}else if (elemento == "anio"){
									
									$('#panel-anio-mes').hide();
									$('#panel-range-in').hide();
									$('#panel-range-end').hide();
									$('#panel-range-type').hide();
								}

								var arrayM = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

								$.ajax({
									url:'/usuario/data-reviews?agencia='+agencia_id+'&periodo='+elemento+'&anio_mes='+$("#anio-mes").val()+"&range_in="+$('#range_in').val()+"&range_end="+$('#range_end').val()+"&range_period="+$("#range_period").val(),
									method: 'GET',

								}).done(function(resp){
									if(myReviews){
										myReviews.destroy();
									}
									if(elemento == "anio"){
										generarGrafica(anios,resp);
									}else if(elemento == "mes"){
										generarGrafica(arrayM,resp);
									}else if(elemento == "range"){
										var labels = [];
										var labelsData = [];
										for (const [key, value] of Object.entries(resp))
										{
											labels.push(key);
											labelsData.push(value.length);
										}


										generarGrafica(labels,labelsData);
									}
								});

							}

							changePeriodo();

							function generarGrafica(labels,respCount){
								let delayed2;
								const ctx2 = document.getElementById('myReviews').getContext('2d');
								myReviews = new Chart(ctx2, {
								type: 'line',
								data: {
									labels: labels,
									datasets: [{
										label: 'Comentarios',
										data: respCount,
										backgroundColor: [
											'#989CA6',
										],
										borderColor:'#4C5059'
									}]
								},
								options: {
									animation: {
									onComplete: () => {
										delayed2 = true;
									},
									delay: (context) => {
										let delay = 0;
										if (context.type === 'data' && context.mode === 'default' && !delayed2) {
										delay = context.dataIndex * 300 + context.datasetIndex * 100;
										}
										return delay;
									},
									},
									scales: {
										y: {
											beginAtZero: true,
											title: {
												display:true,
												text: "Cantidad de comentarios"
											}
										}
									}
								}
								});
							}
							
							</script>
						</div>
					</div>

				</div>

				{{-- GRÁFICA POR DÍAS 
				<div class="row">
					<div class="col-sm-12 mt-4">
						<h5>Gráfica calificación por día</h5>
						<small>Muestra la calificación de los últimos 8 días en base a los comentarios que hacen en el día, tomando los comentarios que tienen las cuatro calificaciones.</small>
						<hr>
					</div>
					<div class="col-sm-12">
						<script>
							const fechaD= [];
							const rev= [];
							const atencionArr= [];
							const practicidadArr= [];
							const velocidadArr= [];
							const resultadoArr= [];
							var countRev = 0;
							var countA = 0;
						</script>
						@foreach ($reviewsByDay as $key => $rev)
						<script>
							fechaD.push('{{ $key }}');
							rev.push({{ $rev->count() }});
						</script>
							<?php 
								$ate = 0;
								$prac = 0;
								$vel = 0;
								$res = 0;
							?>
							@foreach ($rev as $item)
								<?php 
									$ate += $item->atencion;
									$prac += $item->practicidad;
									$vel += $item->velocidad;
									$res += $item->resultado;
								?>
							@endforeach
							<?php $ate = $ate / $rev->count(); 
							 $prac = $prac / $rev->count(); 
							 $vel = $vel / $rev->count(); 
							 $res = $res / $rev->count(); ?>
							<script>
								atencionArr.push({{$ate}});
								practicidadArr.push({{$prac}});
								velocidadArr.push({{$vel}});
								resultadoArr.push({{$res}});
							</script>
						@endforeach
						
						<canvas id="myReviewsByDay" width="500" height="170"></canvas>
						<script>
						
						let delayed3;
						const ctx3 = document.getElementById('myReviewsByDay').getContext('2d');
						const myReviewsByDay = new Chart(ctx3, {
						type: 'bar',
						data: {
							labels: fechaD,
							datasets: [{
								label: '# Comentarios por Día',
								data: rev,
								backgroundColor: [
									'#5D8AA6'
								],
								borderRadius:20
							},{
								label:'% Atencion',
								data: atencionArr,
								backgroundColor:['#A8E6CE'],
								borderRadius:5
							},{
								label:'% Practicidad',
								data: practicidadArr,
								backgroundColor:['#D8E0F2'],
								borderRadius:5
							},{
								label:'% Velocidad',
								data: velocidadArr,
								backgroundColor:['#DCEDC2'],
								borderRadius:5
							},{
								label:'% Resultado',
								data: resultadoArr,
								backgroundColor:['#9A8FBF'],
								borderRadius:5
							}]
						},
						options: {
							animation: {
								y: {
								easing: 'easeInOutElastic',
								from: (ctx) => {
								if (ctx.type === 'data') {
									if (ctx.mode === 'default' && !ctx.dropped) {
									ctx.dropped = true;
									return 0;
									}
								}
								}
							}
							},
							scales: {
								y: {
									beginAtZero: true,
									title: {
										display:true,
										text: "Calificación"
									}
								}
							}
						}
						});
						</script>
					</div>
				</div>

				{{-- GRÁFICA POR MES 
				<div class="row">
					<div class="col-sm-12 mt-4">
						<h5>Gráfica calificación por mes</h5>
						<small>Muestra la calificación en base a los comentarios que hacen en el mes, tomando los comentarios que tienen las cuatro calificaciones.</small>
						<hr>
					</div>
					<div class="col-sm-12">
						<script>
							const fechaM= [];
							const revM= [];
							const atencionArrM= [];
							const practicidadArrM= [];
							const velocidadArrM= [];
							const resultadoArrM= [];
							var countRevM = 0;
							var countAM = 0;
						</script>
						@foreach ($reviewsByMonth as $keyM => $revM)
						<script>
							fechaM.push('{{ $keyM }}');
							revM.push({{ $revM->count() }});
						</script>
							<?php 
								$ateM = 0;
								$pracM = 0;
								$velM = 0;
								$resM = 0;
							?>
							@foreach ($revM as $itemM)
								<?php 
									$ateM += $itemM->atencion;
									$pracM += $itemM->practicidad;
									$velM += $itemM->velocidad;
									$resM += $itemM->resultado;
								?>
							@endforeach
							<?php $ateM = $ateM / $revM->count(); 
							 $pracM = $pracM / $revM->count(); 
							 $velM = $velM / $revM->count(); 
							 $resM = $resM / $revM->count(); ?>
							<script>
								atencionArrM.push({{$ateM}});
								practicidadArrM.push({{$pracM}});
								velocidadArrM.push({{$velM}});
								resultadoArrM.push({{$resM}});
							</script>
						@endforeach
						
						<canvas id="myReviewsByMonth" width="500" height="170"></canvas>
						<script>
						
						let delayedM;
						const ctxM = document.getElementById('myReviewsByMonth').getContext('2d');
						const myReviewsByMonth = new Chart(ctxM, {
						type: 'bar',
						data: {
							labels: fechaM,
							datasets: [{
								label: '# Comentarios por Mes',
								data: revM,
								backgroundColor: [
									'#5D8AA6'
								],
								borderRadius:20
							},{
								label:'% Atencion',
								data: atencionArrM,
								backgroundColor:['#A8E6CE'],
								borderRadius:5
							},{
								label:'% Practicidad',
								data: practicidadArrM,
								backgroundColor:['#D8E0F2'],
								borderRadius:5
							},{
								label:'% Velocidad',
								data: velocidadArrM,
								backgroundColor:['#DCEDC2'],
								borderRadius:5
							},{
								label:'% Resultado',
								data: resultadoArrM,
								backgroundColor:['#9A8FBF'],
								borderRadius:5
							}]
						},
						options: {
							scales: {
								y: {
									beginAtZero: true,
									title: {
										display:true,
										text: "Calificación"
									}
								}
							}
						}
						});
						</script>
					</div>
				</div>

				{{-- GRÁFICA POR AÑO 
				<div class="row">
					<div class="col-sm-12 mt-4">
						<h5>Gráfica calificación por año</h5>
						<small>Muestra la calificación en base a los comentarios que hacen en el año, tomando los comentarios que tienen las cuatro calificaciones.</small>
						<hr>
					</div>
					<div class="col-sm-12">
						<script>
							const fechaY= [];
							const revY= [];
							const atencionArrY= [];
							const practicidadArrY= [];
							const velocidadArrY= [];
							const resultadoArrY= [];
							var countRevY = 0;
							var countAY = 0;
						</script>
						@foreach ($reviewsByYear as $keyY => $revY)
						<script>
							fechaY.push('{{ $keyY }}');
							revY.push({{ $revY->count() }});
						</script>
							<?php 
								$ateY = 0;
								$pracY = 0;
								$velY = 0;
								$resY = 0;
							?>
							@foreach ($revY as $itemY)
								<?php 
									$ateY += $itemY->atencion;
									$pracY += $itemY->practicidad;
									$velY += $itemY->velocidad;
									$resY += $itemY->resultado;
								?>
							@endforeach
							<?php $ateY = $ateY / $revY->count(); 
							 $pracY = $pracY / $revY->count(); 
							 $velY = $velY / $revY->count(); 
							 $resY = $resY / $revY->count(); ?>
							<script>
								atencionArrY.push({{$ateY}});
								practicidadArrY.push({{$pracY}});
								velocidadArrY.push({{$velY}});
								resultadoArrY.push({{$resY}});
							</script>
						@endforeach
						
						<canvas id="myReviewsByYear" width="500" height="170"></canvas>
						<script>
						
						let delayedY;
						const ctxY = document.getElementById('myReviewsByYear').getContext('2d');
						const myReviewsByYear = new Chart(ctxY, {
						type: 'bar',
						data: {
							labels: fechaY,
							datasets: [{
								label: '# Comentarios por Mes',
								data: revY,
								backgroundColor: [
									'#5D8AA6'
								],
								borderRadius:20
							},{
								label:'% Atencion',
								data: atencionArrY,
								backgroundColor:['#A8E6CE'],
								borderRadius:5
							},{
								label:'% Practicidad',
								data: practicidadArrY,
								backgroundColor:['#D8E0F2'],
								borderRadius:5
							},{
								label:'% Velocidad',
								data: velocidadArrY,
								backgroundColor:['#DCEDC2'],
								borderRadius:5
							},{
								label:'% Resultado',
								data: resultadoArrY,
								backgroundColor:['#9A8FBF'],
								borderRadius:5
							}]
						},
						options: {
							animation: {
							onComplete: () => {
								delayedY = true;
							},
							delay: (context) => {
								let delay = 0;
								if (context.type === 'data' && context.mode === 'default' && !delayed) {
								delay = context.dataIndex * 300 + context.datasetIndex * 100;
								}
								return delay;
							},
							},
							scales: {
								y: {
									beginAtZero: true,
									title: {
										display:true,
										text: "Calificación"
									}
								}
							}
						}
						});
						</script>
					</div>
				</div>	--}}

				
				<div class="row card">
					<div class="card-body">
						<div class="col-sm-12">
							<h5>Comentarios de la Agencia</h5>
							<small>Estos son los comentarios que hacen los usuarios.</small>
							<hr>
						</div>
						<div class="col-sm-12">
							<div class="">
								@if (count($agencia->reviews) == 0)
								<div class="row">
								<div class="col-sm-12 text-center mb-4">
									<span>No hay comentarios aún</span>
								</div>
							</div>
							@else
								@foreach ($agencia->reviews as $rev)
								<div class="row  mb-4">
									<div class="col-sm-1 text-center">
										@if($rev->user_id)
										<img src="{{ asset('assets/img/user.png') }}" width="100%" alt="{{ $rev->user[0]->name }}">
										@else
										<img class="rounded-circle" src="{{ $rev->foto_url }}" width="100%" alt="{{ $rev->autor }} ">
										@endif
										<a class="btn btn-sm bg-info-light mt-2" href="{{ route('user.comments.see',$rev->id) }}" > <i class="fas fa-eye" ></i> </a>
									</div>
									<div class="col-sm-10 border-bottom">
										@if($rev->user_id)
										<h6>{{ $rev->user[0]->name }} {{ $rev->user[0]->apellido_p }} {{ $rev->user[0]->apellido_m }}</h6>
										@else
										<h6>{{ $rev->autor }} </h6>
										@endif
										<div class="rating">
											<i class="fas fa-star {{ ($rev->rating >= 1) ? 'filled' : '' }}"></i>
											<i class="fas fa-star {{ ($rev->rating >= 2) ? 'filled' : '' }}"></i>
											<i class="fas fa-star {{ ($rev->rating >= 3) ? 'filled' : '' }}"></i>
											<i class="fas fa-star {{ ($rev->rating >= 4) ? 'filled' : '' }}"></i>
											<i class="fas fa-star {{ ($rev->rating >= 5) ? 'filled' : '' }}"></i>
											<span class="d-inline-block average-rating">({{ $rev->rating }})</span>
											<small class="text-secondary" >{{ date( 'd/m/Y', strtotime($rev->created_at)) }}</small>
										</div>
										@if($rev->user_id)
										<small>{{-- Atención --}}Atencion del Personal ({{$rev->atencion}}) <i class="fas fa-star filled"></i></small>
										<small>{{-- Practicidad --}} Instalaciones ({{$rev->practicidad}}) <i class="fas fa-star filled"></i></small>
										<small>{{-- Velocidad --}}Tiempo de Respuesta ({{$rev->velocidad}}) <i class="fas fa-star filled"></i></small>
										<small>Calificación General ({{$rev->resultado}}) <i class="fas fa-star filled"></i></small> <br> <br>
										@endif
										<span>{{ $rev->text }}</span>
									</div>
								</div>
								@endforeach
							@endif
							</div>
						</div>
					</div>

				</div>
				
				
			</div>
		</div>
	</div>
</div>
</div>

<div class="modal" id="modalHorario"  tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title">Horario</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form method="POST" action="{{ route('user.add.horario') }}">
			{{ csrf_field() }}
			<div class="modal-body">
				<input type="hidden" name="agencia_id" value="{{ $agencia->id }}" >
				<div class="row">
					<div class="col-sm-6">
						<label >Lunes</label> <input type="checkbox" name="clun"> <small>Cerrado</small> <br>
						<small>De</small>
						<input class="form-control" type="time" name="ilun" ><small>a</small> <input class="form-control" type="time" name="elun"> <br>
						<label >Martes</label> <input type="checkbox" name="cmar"> <small>Cerrado</small> <br>
						<small>De</small>
						<input class="form-control" type="time" name="imar"><small>a</small><input class="form-control" type="time" name="emar"> <br>
						<label >Miércoles</label> <input type="checkbox" name="cmie"> <small>Cerrado</small> <br>
						<small>De</small>
						<input class="form-control" type="time" name="imie"><small>a</small><input class="form-control" type="time" name="emie"><br>
						<label >Jueves</label> <input type="checkbox" name="cjue"> <small>Cerrado</small><br>
						<small>De</small>
						<input class="form-control" type="time" name="ijue"><small>a</small><input class="form-control" type="time" name="ejue"><br>
					</div>
					<div class="col-sm-6">
						<label >Viernes</label> <input type="checkbox" name="cvie"> <small>Cerrado</small><br>
						<small>De</small>
						<input class="form-control" type="time" name="ivie"><small>a</small><input class="form-control" type="time" name="evie"><br>
						<label >Sábado</label> <input type="checkbox" name="csab"> <small>Cerrado</small><br>
						<small>De</small>
						<input class="form-control" type="time" name="isab"><small>a</small><input class="form-control" type="time" name="esab"><br>
						<label >Domingo</label> <input type="checkbox" name="cdom"> <small>Cerrado</small><br>
						<small>De</small>
						<input class="form-control" type="time" name="idom"><small>a</small><input class="form-control" type="time" name="edom"><br>
					</div>
				</div>
			</div>
			<div class="modal-footer">
			<button  type="submit" class="btn btn-primary">Guardar Horario</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			</div>
		</form>
	  </div>
	</div>
  </div>

  <div class="modal" id="modalFotos"  tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title">Fotos</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<form method="POST" action="{{ route('user.agency.add.foto') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="agencia_id" value="{{ $agencia->id }}" >
				<div class="row">
					<div class="col-sm-4 text-center">
						<h5>Añadir Nueva Foto</h5>
					</div>
					<div class="col-sm-4 text-center">
						<input type="file" name="foto_upload" required id="foto_upload" class="inputfile inputComp"  />
						<label for="foto_upload" ><span id="foto_upload_filename">Escoger Foto <i class="fas fa-image"></i> </span></label>
					</div>
					<div class="col-sm-4 text-center">
						<button class="btn btn-sm btn-white btn-block" > Subir Foto <i class="fas fa-upload" ></i> </button>
					</div>
				</div>
			</form>
			<div class="row">
					@if (count($agencia->fotos) == 0)
					<div class="col-sm-12 text-center mb-4">
						<span>Esta agencia no tiene fotos</span>
					</div>
					@else
					@foreach ($agencia->fotos as $k => $foto)
					<div class="col-sm-4" >
						<div style="position: relative; max-heigh:200px;" >
							<button type="button" data-toggle="modal" data-target="#deleteFoto" class="btn btn-sm btn-primary" style="top:20px; right:10px; float:right; position:relative;" data-id="{{ $foto->id }}"  > <i class="fas fa-trash" ></i> </button>

							@if($foto->html != null)
							<img style="border-radius: 15px; box-shadow: 0 5px 10px rgb(0 0 0 / 30%);" src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=600&photo_reference={{ $foto->foto_ref }}&key={{ $key->value }}"
							alt="{{ $agencia->nombre }}" class="d-block w-100 img-fluid" >

							@elseif($foto->foto_upload != null)
							<img class="d-block w-100 img-fluid" style="border-radius: 15px; box-shadow: 0 5px 10px rgb(0 0 0 / 30%);"  alt="{{ $agencia->nombre }}" src="{{URL::asset('storage/agencias/'.$agencia->id.'/'.$foto->foto_upload)}}">

							@else
							<img style="border-radius: 15px; box-shadow: 0 5px 10px rgb(0 0 0 / 30%);" src="{{ $foto->foto_url }}"
							alt="{{ $agencia->nombre }}" class="d-block w-100 img-fluid" >
							@endif
						</div>
					</div>
						@endforeach
				@endif
				</div>
			</div>
		
	  </div>
	</div>
  </div>

  <div class="modal fade" id="deleteFoto" tabindex="-1" role="dialog" aria-labelledby="deleteFotoLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<form method="POST" action="{{ route('user.agency.delete.foto') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-body">
				<div class="form-group">
					<input type="hidden" name="foto_delete" id="foto_delete" >
				<label for="recipient-name" class="col-form-label">¿Realmente deseas eliminar esta foto?</label>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Eliminar Foto</button>
			</div>
		</form>
	  </div>
	</div>
  </div>

  <div class="modal fade" id="modalTelefono" tabindex="-1" role="dialog" aria-labelledby="modalTelefonoLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		  <form method="POST" action="{{ route('user.agency.update.telefono') }}" >
			{{ csrf_field() }}
			<div class="modal-body">
				<h3>Actualizar Teléfono</h3>
				<div class="form-group">
					<input type="hidden" name="agencia_id" id="agencia_id_telefono" >
					<label for="recipient-name" class="col-form-label">Teléfono</label>
					<input type="text" class="form-control" name="telefono" id="telefono_update" value="" >
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Actualizar</button>
			</div>
		</form>
	  </div>
	</div>
  </div>

  <script>
	  var inputsComp = document.querySelectorAll('.inputComp');
Array.prototype.forEach.call(inputsComp, function (input) {
	var label = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener('change', function (e) {
		var fileName = '';
		if (this.files && this.files.length > 1) {

		}
		else {
			fileName = e.target.value.split("\\").pop();
		}
		if (fileName) {
			$("#foto_upload_filename").html(fileName + '<i class="fas fa-file-check float-right"></i>');
		} else {
			label.innerHTML = labelVal;
		}
	});
});

	$('#deleteFoto').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var id = button.data('id');
		console.log(id);

		$("#foto_delete").val(id);
		/* $('#modalFotos').hide(); */
		
	});

	$('#modalTelefono').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var id = button.data('id');
		var telefono = button.data('telefono');

		$("#agencia_id_telefono").val(id);
		$("#telefono_update").val(telefono);

		/* $('#modalFotos').hide(); */
		
	});
  </script>


@endsection