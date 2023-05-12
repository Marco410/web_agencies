
@foreach ($marcas as $marca)	
<div class="col-lg-4 col-md-6">
	<a href="{{route('agencias')."?marca%5B%5D=".$marca->nombre}}">
		<div class="cate-widget">
			<img class="img-fluid serv-img" alt="Marca {{ $marca->nombre }}" src="{{URL::asset('storage/marcas/'.$marca->imagen)}}">
			<div class="cate-title">
				<h3><span><i class="fas fa-circle"></i> {{ $marca->nombre }}</span></h3>
			</div>
			<div class="cate-count">
				<i class="fas fa-car"></i> {{ $marca->agencias()->count() }}
			</div>
		</div>
	</a>
</div>
@endforeach