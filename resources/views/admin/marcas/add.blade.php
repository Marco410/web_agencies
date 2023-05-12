<?php $page="Añadir Marca";?>

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
									<h3 class="page-title">Añadir Nueva Marca</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						<div class="row">
							<div class="col-sm-12">
								@if($errors->any())
								@foreach($errors->all() as $error)
								<div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong>{{ $error }}</div>
								@endforeach
								@endif

							</div>
						</div>
						<div class="card">
							<div class="card-body">

								<!-- Form -->
								<form method="post" enctype="multipart/form-data" action="{{ route('marcas.store')}}">
									{{ csrf_field() }}
									<div class="form-group">
										<label>Marca</label>
										<input class="form-control" id="marca" name="marca" onblur="genLinkMarca()" value="{{ old('marca') }}"  type="text">
									</div>
									<div class="form-group">
										<label>Descripción</label>
										<input class="form-control" name="descripcion" value="{{ old('descripcion') }}" type="text">
									</div>
									<div class="form-group">
										<label>Link</label>
										<input class="form-control" id="link" name="link" type="text" value="{{ old('link') }}" readonly>
									</div>
									<div class="form-group">
										<label>Imagen</label>
										<input class="form-control" name="imagen" type="file"  >
									</div>
									<div class="mt-4">
										<button class="btn btn-primary" type="submit">Añadir Nueva</button>
										<a href="{{route('marcas')}}" class="btn btn-link">Cancel</a>
									</div>
								</form>
								<!-- /Form -->

							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<script>
			$(document).ready( function () {
			} );

			function genLinkMarca()
			{
				var x = document.getElementById("marca").value;
				var sinAcentos = x.normalize('NFD').replace(/[\u0300-\u036f]/g,"");
				var sinCarAlfaNum = sinAcentos.replace(/[^0-9a-z]/gi, '-');
				var linkGenerado = sinCarAlfaNum.toLowerCase();
				document.getElementById("link").value = linkGenerado;
			}
		</script>
</div>
<!-- /Main Wrapper -->
@endsection
