<?php $page="Mi Personal";?>
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
							<div class="col-sm-8">
								<h4 class="widget-title">Mi Personal</h4>
								<h6 class="text-info" style="float: left;" >Solo puedes agregar, ver y filtrar el personal de una agencia <strong>PLUS</strong></h6>
							</div>
							<div class="col-sm-4">
								<button class="btn btn-md btn-primary float-right" data-toggle="modal" data-target="#addPersonal" >Añadir Personal <i class="fas fa-plus" ></i></button>
								
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-sm-8 mb-2">
								<label for=""> <i class="fas fa-filter" ></i>  Filtros: </label><a style="float: right" href="{{ route('user.personal') }}" >Eliminar Filtros</a>
								<select class="form-control" name="filter" id="filter">
									<option value="">Seleccione:</option>
									@foreach ($agencias as $agencia)
									@if ($agencia->agencia[0]->membresia_id == 3)
									<option value="{{ $agencia->agencia[0]->id }}"@if (isset($_GET['agencia'])) @if ($_GET['agencia'] == $agencia->agencia[0]->id) selected @endif  @endif>{{ $agencia->agencia[0]->nombre }}</option>
									@endif
									@endforeach
								</select>
							</div>
							<div class="col-sm-6 ">
								
							</div>
						</div>
						<div class="card mb-0">
							<div class="row no-gutters">
								<div class="col-lg-12">
									<div class="card-body">
										<div class="row">
											<div class="col-sm-12">
												@if (session('status_personal'))
													<div class="alert alert-success">
														{{ session('status_personal') }}
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
												@endif
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<h5> <strong> Calificación de <span class="text-primary" >mi personal</span></strong></h5>
											</div>
											<div class="col-sm-6 align-self-center">
												<div class="row">
													<div class="col-sm-12">
														<h2 id="total_rating" >{{ $finRatingPersonal }}</h2>
														<div class="review-count">
															<div class="rating">
																<i id="1r" class="fas fa-star {{ ($finRatingPersonal >= 1) ? 'filled' : '' }} fa-lg"></i>
																<i id="2r" class="fas fa-star {{ ($finRatingPersonal >= 2) ? 'filled' : '' }} fa-lg"></i>
																<i id="3r" class="fas fa-star {{ ($finRatingPersonal >= 3) ? 'filled' : '' }} fa-lg"></i>
																<i id="4r" class="fas fa-star {{ ($finRatingPersonal >= 4) ? 'filled' : '' }} fa-lg"></i>
																<i id="5r" class="fas fa-star {{ ($finRatingPersonal >= 5) ? 'filled' : '' }} fa-lg"></i>
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
																<small><strong id="total_reviews" >{{ $reviews }}</strong></small>
															</div>
														</div>
														
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="row">
													<div class="col-sm-6"  >
														<label class="text-secondary" >Fecha Inicial</label>
														<input class="form-control" type="date" name="range_inTotal" id="range_inTotal" onchange="changePeriodoTotal()" />
													</div>
													<div class="col-sm-6 " >
														<label class="text-secondary">Fecha Final</label>
														<input class="form-control" type="date" name="range_endTotal" id="range_endTotal" onchange="changePeriodoTotal()" />
													</div>
													<div class="col-lg-12 mt-4 mb-4" >
														<canvas id="myChart" width="500" height="270"></canvas>
														<script>
														let myChart;						
														function changePeriodoTotal(){
															var ini = $("#range_inTotal").val();
															var fin = $("#range_endTotal").val();
								
															try{
																$.ajax({
																url:'/usuario/data-reviews-personal?range_in='+ini+"&range_end="+fin,
																method: 'GET',
								
															}).done(function(resp){
																if(myChart){
																	myChart.destroy();
																}
																var inDate = resp[3];
																var endDate = resp[4]
																var total_reviews = resp[5]
																var total_rating = resp[6]

																$("#1r").removeClass('filled');
																$("#2r").removeClass('filled');
																$("#3r").removeClass('filled');
																$("#4r").removeClass('filled');
																$("#5r").removeClass('filled');

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
															
																generarGraficaTotal(resp[0],resp[1],resp[2]);
								
															});
															}catch(e){
																$("#total_rating").html("error");

															}
															
															
														}
														generarGraficaTotal({{ $finAtencion }}, {{ $finTiempo }}, {{ $finConocimiento }});
														function generarGraficaTotal(finAtencion, finPracticidad, finVelocidad){
								
															let delayed;
															const ctx = document.getElementById('myChart').getContext('2d');
															myChart = new Chart(ctx, {
															type: 'bar',
															data: {
																labels: ['Atención', 'Tiempo de Respuesta', 'Conocimiento',],
																datasets: [{
																	label: 'Calificación',
																	data: [finAtencion,finPracticidad,finVelocidad],
																	backgroundColor: [
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
								</div>
							</div>
						</div>
						
							<div class="row mt-4">
								
								@for ($i = 0; $i < count($personal) ; $i++)
								@foreach ($personal[$i] as $person)
 								<div class="col-sm-4">
									<div class="service-widget">
										<div class="service-img">
											@if ($person->imagen != null)
											<a href="{{ route('user.personal.ver',$person->id) }}">
												<img class="img-fluid serv-img" height="100px" alt="{{ $person->nombre }}" src="{{URL::asset('storage/personal/'.$person->id.'/'.$person->imagen)}}">
												</a>
											@else
											<a href="{{ route('user.personal.ver',$person->id) }}">
											<img class="img-fluid serv-img"  height="100px"  alt="{{ $person->nombre }}" src="{{ asset('assets/img/user-back.png')}}">
											</a>
											@endif
											<div class="item-info">
												<div class="service-user">
													<a class="btn btn-primary btn-sm"  href="{{ route('user.personal.ver',$person->id) }}">
													 <i class="fas fa-eye" ></i>
													</a> 
												</div>
												
											</div>
										</div>
										<div class="service-content">
											<h3 class="title">
												<a href="{{ route('user.personal.ver',$person->id) }}">{{ $person->nombre }}</a>
											</h3>
											<span>{{ $person->puesto }}</span>
											<div class="rating">
												<i class="fas fa-star {{ ($person->rating >= 1) ? 'filled' : '' }}"></i>
												<i class="fas fa-star {{ ($person->rating >= 2) ? 'filled' : '' }}"></i>
												<i class="fas fa-star {{ ($person->rating >= 3) ? 'filled' : '' }}"></i>
												<i class="fas fa-star {{ ($person->rating >= 4) ? 'filled' : '' }}"></i>
												<i class="fas fa-star {{ ($person->rating >= 5) ? 'filled' : '' }}"></i>
												<span class="d-inline-block average-rating">({{ $person->rating }})</span>
											</div>
											<div class="user-info">
												<div class="row">
													<div class="col-sm-12 " title="">
														<a href="{{ route('user.agency.stats',$person->agencia[0]->id) }}"> <span class="col-auto ser-contact"><i class="fas fa-car mr-1"></i>  <span >{{$person->agencia[0]->nombre}}</span></span></a>
														<span class="col-auto ser-contact"><i class="fas fa-comments mr-1"></i>  <span >{{$person->reviews_count}}</span></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
								@endfor
								
								
							{{-- 	@foreach ($agencias as $agencia)
								<div class="col-sm-4">
									<div class="service-widget">
										<div class="service-img">
											<a href="{{ route('user.agency.stats',$agencia['agencia'][0]->id) }}">
											@if($agencia['agencia'][0]->marca()->first() != null) 		
											<img class="img-fluid serv-img" alt="Marca {{ $agencia['agencia'][0]->marca[0]->nombre }}" src="{{URL::asset('storage/marcas/'.$agencia['agencia'][0]->marca[0]->imagen)}}">
											@else
											<img class="img-fluid serv-img" alt="Sin Marca" src="{{URL::asset('storage/marcas/default.jpg')}}">
											@endif 
											</a>
											<div class="item-info">
												<div class="service-user">
													<a class="btn btn-primary btn-sm"  href="{{route('agencia.detalles',$agencia['agencia'][0]->id)}}">
													 <i class="fas fa-eye" ></i>
													</a> 
												</div>
												<div class="cate-list">
													@if($agencia['agencia'][0]->marca()->first() != null) 
													<a class="bg-yellow" href="service-details">
														{{ $agencia['agencia'][0]->marca[0]->nombre}}  
												</a>
													@else
													
													@endif 
												</div>
											</div>
										</div>
										<div class="service-content">
											<h3 class="title">
												<a href="{{ route('user.agency.stats',$agencia['agencia'][0]->id) }}">{{ $agencia['agencia'][0]->personal }}</a>
											</h3>
											<div class="rating">
												<i class="fas fa-star {{ ($agencia['agencia'][0]->rating >= 1) ? 'filled' : '' }}"></i>
												<i class="fas fa-star {{ ($agencia['agencia'][0]->rating >= 2) ? 'filled' : '' }}"></i>
												<i class="fas fa-star {{ ($agencia['agencia'][0]->rating >= 3) ? 'filled' : '' }}"></i>
												<i class="fas fa-star {{ ($agencia['agencia'][0]->rating >= 4) ? 'filled' : '' }}"></i>
												<i class="fas fa-star {{ ($agencia['agencia'][0]->rating >= 5) ? 'filled' : '' }}"></i>
												<span class="d-inline-block average-rating">({{ $agencia['agencia'][0]->rating }})</span>
											</div>
											<div class="user-info">
												<div class="row">
													<div class="col-sm-12 " title="{{$agencia['agencia'][0]->ciudad}}, {{ $agencia->estado }}">
														<span class="col-auto ser-contact"><i class="fas fa-car mr-1"></i><span >{{$agencia['agencia'][0]->ciudad}}, {{ $agencia->estado }}</span></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach --}}
						  </div>
					</div>
						
					</div>
				</div>
			</div>
		</div>
</div>
<div class="modal fade" id="addPersonal" tabindex="-1" role="dialog" aria-labelledby="addPersonalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		
		<div class="modal-body">
			<div class="row">
				<div class="col-sm-12">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
				</div>
			</div>
		  <div class="row">
			<div class="col-sm-12 text-center">
				<form action="{{ route('user.personal.add') }}" method="POST" enctype="multipart/form-data" >
					{{ csrf_field() }}
					<div class="center">
						<div class="form-input">
							<div class="preview">
								<label for="file-ip-1"><i class="fas fa-camera" ></i> </label>
								<img class="img-fluid" style="border-radius: 100px" height="100px" width="100px" id="blah" src="{{ asset('assets/img/user.png') }}" alt="Perfil del personal" />
								<img style="display: none; border-radius: 100px; height: 100px;width: 100px;"  id="file-ip-1-preview">
							</div>
							<input type="file" name="perfil" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
						</div>
					</div> 
					<div class="row mt-4">
						<div class="col-sm-12">
							<div class="form-group">
								<input type="text" class="form-control" name="nombre" placeholder="Nombre Completo">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="puesto" placeholder="Puesto">
							</div>
							<div class="form-group">
								<select class="form-control" required name="agencia_id" id="">
									<option value="">Seleccione agencia:</option>
									@foreach ($agencias as $agencia)
									@if ( $agencia->agencia[0]->membresia_id == 3)
										<option value="{{ $agencia->agencia[0]->id }}">{{ $agencia->agencia[0]->nombre }}</option>
									@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-12">
							<button type="submit" class="btn btn-block btn-primary" >Crear Personal</button>
						</div>
					</div>
					
				</form>
				  <script>
					  function showPreview(event){
						if(event.target.files.length > 0){
							$("#blah").hide();
							var src = URL.createObjectURL(event.target.files[0]);
							var preview = document.getElementById("file-ip-1-preview");
							preview.src = src;
							preview.style.display = "block";
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