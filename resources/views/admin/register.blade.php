<?php $page = 'Registro'; ?>

@extends('layout.mainlayout_admin')
@section('content')		
<div class="main-wrapper">
	
		<div class="login-page">
			<div class="login-body container">
				<div class="loginbox">
					<div class="login-right-wrap">
						<div class="account-header">
							<div class="account-logo text-center mb-4">
								<a href="{{route('index')}}">
									<img src="{{ asset("/assets/img/logo-negro.png") }}" alt="" class="img-fluid">
								</a>
							</div>
						</div>
						<div class="login-header text-center">
							<h3>Registro <span>AutoNavega</span></h3>
							<p class="text-muted">Registrate para Acceder al Panel de Administración</p>
						</div>
						<form method="POST" action="{{ route('admin.register') }}">
							{{ csrf_field() }}
							<div class="form-group form-focus">
								<label class="focus-label">Nombre</label>
								<input type="text" required name="nombre" value="{{ old('nombre') }}"  class="form-control floating" placeholder="Escribe tu nombre">
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group form-focus">
										<label class="focus-label">Apellido Paterno</label>
										<input type="text" required name="apellido_p" class="form-control floating" value="{{ old('apellido_p') }}"  placeholder="Escribe tu Apellido Paterno">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group form-focus">
										<label class="focus-label">Apellido Materno</label>
										<input type="text"  name="apellido_m" class="form-control floating" value="{{ old('apellido_m') }}"  placeholder="Escribe tu Apellido Materno">
									</div>
								</div>
							</div>					
							<div class="form-group">
								<label class="control-label">Correo Electrónico</label>
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ingresa tu correo electrónico">
								@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group">
								<label class="control-label">Teléfono</label>
								<input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" placeholder="Ingresa tu telefono">
								@error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group mb-4">
								<label class="control-label">Contraseña</label>
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}"  required  placeholder="Ingresa una contraseña">
								@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group form-focus">
								<label class="focus-label">Confirmar Contraseña</label>
								<input type="password" required name="password_confirm" class="form-control floating" placeholder="Escribe de nuevo la contraseña">
							</div>
							<div class="text-center">
								<button class="btn btn-primary btn-block account-btn" type="submit" >Registrarme</button>
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
						<div class="row">
							<div class="col-sm-12 mt-4 text-center">
								<a class="text-primary" href="{{ route('admin.login') }}">¿Ya estás registrado?</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Main Wrapper -->
@endsection
	  