<?php $page="Personal";?>
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
								<div class="row">
									<div class="col-sm-3">
										
										@if ($personal->imagen != null)
											<a href="{{ route('user.personal.ver',$personal->id) }}">
												<img class="img-fluid serv-img" style="border-radius: 100px" width="200px" height="200px" alt="{{ $personal->nombre }}" src="{{URL::asset('storage/personal/'.$personal->id.'/'.$personal->imagen)}}">
												</a>
											@else
											<a href="">
											<img class="img-fluid serv-img" style="border-radius: 100px" width="200px" height="200px"  alt="{{ $personal->nombre }}" src="{{ asset('assets/img/user-back.png')}}">
											</a>
											@endif
									</div>
									<div class="col-sm-9">
										<h4 class="widget-title">{{ $personal->nombre }}</h4>
										<span class="text-secondary">{{ $personal->puesto }}</span>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<button class="btn btn-md btn-primary float-right" data-toggle="modal" data-target="#deletePersonal" title="Eliminar" ><i class="fas fa-trash" ></i></button>
								<button class="btn btn-md btn-primary float-right mr-2" data-toggle="modal" data-target="#editPersonal" >Editar <i class="fas fa-edit" ></i></button>
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
																<small><strong id="total_reviews" >{{ $personal->reviews_count }}</strong></small>
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
																url:'/usuario/data-reviews-personal-ver?personal_id='+{{$personal->id}}+'&range_in='+ini+"&range_end="+fin,
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
						<div class="col-sm-12 card mt-4">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										@if (!empty($personal->reviews))
											@foreach ($personal->reviews as $review)
											<div class="row  mb-4">
												<div class="col-sm-1">
													<img src="{{ asset('assets/img/user.png') }}" width="100%" alt="{{ $review->user[0]->name }}">

												</div>
												<div class="col-sm-10 border-bottom">
													<h6>{{ $review->user[0]->name }} {{ $review->user[0]->apellido_p }} {{ $review->user[0]->apellido_m }}</h6>
													<div class="rating">
														<i class="fas fa-star {{ ($review->rating >= 1) ? 'filled' : '' }}"></i>
														<i class="fas fa-star {{ ($review->rating >= 2) ? 'filled' : '' }}"></i>
														<i class="fas fa-star {{ ($review->rating >= 3) ? 'filled' : '' }}"></i>
														<i class="fas fa-star {{ ($review->rating >= 4) ? 'filled' : '' }}"></i>
														<i class="fas fa-star {{ ($review->rating >= 5) ? 'filled' : '' }}"></i>
														<span class="d-inline-block average-rating">({{ $review->rating }})</span>
														<small class="text-secondary" >{{ date( 'd/m/Y', strtotime($review->created_at)) }}</small>
													</div>
													<span>{{ $review->text }}</span>
												</div>
											</div>
											
										@endforeach
										@else
											<span>No tiene comentarios</span>
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
</div>

<div class="modal fade" id="editPersonal" tabindex="-1" role="dialog" aria-labelledby="editPersonalLabel" aria-hidden="true">
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
				<form action="{{ route('user.personal.edit') }}" method="POST" enctype="multipart/form-data" >
					{{ csrf_field() }}
					<div class="center">
						<div class="form-input">
							<div class="preview">
								<label for="file-ip-1"><i class="fas fa-camera" ></i> </label>
								@if ($personal->imagen != null)
									<img class="img-fluid" style="border-radius: 100px" height="100px" width="100px" id="blah" src="{{URL::asset('storage/personal/'.$personal->id.'/'.$personal->imagen)}}" alt="Perfil del personal" />
								@else
								<img class="img-fluid" style="border-radius: 100px" height="100px" width="100px" id="blah" src="{{ asset('assets/img/user-back.png')}}" alt="Perfil del personal" />
								@endif
								<img style="display: none; border-radius: 100px; height: 100px;width: 100px;"  id="file-ip-1-preview">
							</div>
							<input type="file" name="perfil" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
						</div>
					</div> 
					<div class="row mt-4">
						<div class="col-sm-12">
							<div class="form-group">
								<input type="hidden" class="form-control" value="{{ $personal->id }}" name="personal_id" >
								<input type="text" class="form-control" value="{{ $personal->nombre }}" name="nombre" placeholder="Nombre Completo">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" value='{{ $personal->puesto }}' name="puesto" placeholder="Puesto">
							</div>
							<div class="form-group">
								<select class="form-control" name="agencia_id" id="">
									<option value="">Seleccione agencia:</option>
									@foreach ($agencias as $agencia)
										<option  value="{{ $agencia->agencia[0]->id }}" {{ ($personal->agencia_id == $agencia->agencia[0]->id) ? 'selected' : '' }} >{{ $agencia->agencia[0]->nombre }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-12">
							<button type="submit" class="btn btn-block btn-primary" >Actualizar</button>
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

  <div class="modal fade" id="deletePersonal" tabindex="-1" role="dialog" aria-labelledby="deletePersonalLabel" aria-hidden="true">
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
				<form action="{{ route('user.personal.delete') }}" method="POST" enctype="multipart/form-data" >
					{{ csrf_field() }}
					<div class="row mt-4">
							<input type="hidden" name="personal_id" value="{{ $personal->id }}" >
							<input type="hidden" name="nombre" value="{{ $personal->nombre }}" >
						<div class="col-sm-12 text-center">
							<h5>¿Estás seguro de eliminarlo?</h5>
							<p> Se perderán todos los datos asociados al personal junto con los comentarios que agregaron sobre él.</p>
							<button type="submit" class="btn btn-block btn-primary" >Eliminar</button>
						</div>
					</div>
					
				</form>
				 
			</div>
		  </div>
		  
		</div>
	  </div>
	</div>
  </div>

@endsection