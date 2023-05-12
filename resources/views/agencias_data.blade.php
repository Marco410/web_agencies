@foreach ($agencias as $agencia)
<div class="col-sm-6">
	<div class="service-widget">
		<div class="service-img">
			<a href="{{route('agencia.detalles',$agencia->id)}}">
			@if($agencia->marca()->first() != null) 		
			<img class="img-fluid serv-img" alt="Marca {{ $agencia->marca[0]->nombre }}" src="{{URL::asset('storage/marcas/'.$agencia->marca[0]->imagen)}}">
			@else
			<img class="img-fluid serv-img" alt="Sin Marca" src="{{URL::asset('storage/marcas/default.jpg')}}">
			@endif 
			</a>
			<div class="item-info">
				<div class="service-user">
					{{-- <a href="#">
						
						<img src="assets/img/customer/user-03.jpg" alt="">
					</a> --}}
					{{-- <span class="service-price">{{$i}}</span> --}}
				</div>
				<div class="cate-list">
					@if($agencia->marca()->first() != null) 
					<a class="bg-yellow" href="{{route('agencia.detalles',$agencia->id)}}">
						{{ $agencia->marca[0]->nombre}} 
				   </a>
					@else
					
					@endif 
				</div>
			</div>
		</div>
		<div class="service-content">
			<h3 class="title">
				<a href="{{route('agencia.detalles',$agencia->id)}}">{{ $agencia->nombre }}</a>
			</h3>
			<div class="rating">
				<i class="fas fa-star {{ ($agencia->rating >= 1) ? 'filled' : '' }}"></i>
				<i class="fas fa-star {{ ($agencia->rating >= 2) ? 'filled' : '' }}"></i>
				<i class="fas fa-star {{ ($agencia->rating >= 3) ? 'filled' : '' }}"></i>
				<i class="fas fa-star {{ ($agencia->rating >= 4) ? 'filled' : '' }}"></i>
				<i class="fas fa-star {{ ($agencia->rating >= 5) ? 'filled' : '' }}"></i>
				<span class="d-inline-block average-rating">({{ $agencia->rating }})</span>
			</div>
			<div class="user-info">
				<div class="row">
					{{-- <div class="col-sm-12 mb-2" title="{{$agencia->telefono}}">
						<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i><a href="tel:{{$agencia->telefono}}"> <span>{{$agencia->telefono}}</span></a></span>
					</div> --}}
					<div class="col-sm-12 " title="{{$agencia->ciudad}}, {{ $agencia->estado }}">
						<span class="col-auto ser-contact"><i class="fas fa-map-marker-alt mr-1"></i><span >{{$agencia->ciudad}}, {{ $agencia->estado }}</span></span>
					</div>
					<div class="col-sm-12 mt-2 ml-2">
						<div class="row">
							<div class="col-sm-12 col-md-6">
								<span class="ser-contact ml-2 mt-1"><i class="fas fa-images mr-1"></i>{{ $agencia->fotos_count }}</span>
							</div>
							<div class="col-sm-12 col-md-6">
								<span class="ser-location ml-2 mt-1"><i class="fas fa-comments mr-1"></i>{{ $agencia->reviews_count }}</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach