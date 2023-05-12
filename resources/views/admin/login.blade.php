<?php $page = 'Login'; ?>
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
						<div class="row">
							<div class="col-sm-12">
								@if (session('status'))
									<div class="alert alert-success">
										{{ session('status') }}
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									</div>
								@endif
							</div>
						</div>
                        <div class="row">
							<div class="col-sm-12">
								@if (session('errorL'))
									<div class="alert alert-danger">
										{{ session('errorL') }}
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									</div>
								@endif
							</div>
						</div>
						<div class="login-header text-center">
							<h3>Login <span>AutoNavega</span></h3>
							<p class="text-muted">Accede al Panel de Administración</p>
						</div>
						<form method="POST" action="{{ route('admin.login') }}">
							{{ csrf_field() }}
							<div class="form-group">
								<label class="control-label">Correo Electrónico</label>
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ingresa tu correo electrónico">
								@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group mb-4">
								<label class="control-label">Contraseña</label>
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required  placeholder="Ingresa una contraseña">
								@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="text-center mb-4">
								<button class="btn btn-primary btn-block account-btn" type="submit">Iniciar Sesión</button>
							</div>
						</form>
						<div class="row">
							<div class="col-sm-12  text-center">
								<a class="text-primary" href="{{ route('forgot.password') }}">¿Olvitaste tu contraseña?</a>
							</div>
							<div class="col-sm-12  text-center">
								<a class="text-primary" href="{{ route('registro') }}">¿No estas registrado?</a>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								@if (session('errorLogin'))
									<div class="alert alert-success">
										{{ session('errorLogin') }}
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
									</div>
								@endif
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
