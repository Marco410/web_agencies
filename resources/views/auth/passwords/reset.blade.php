@extends('layout.mainlayout_admin')
@section('content')		
<div class="main-wrapper">
		<div class="login-page">
			<div class="login-body container">
				<div class="loginbox">
					<div class="login-right-wrap">
						<div class="account-header">
							<div class="account-logo text-center mb-4">
								<a href="index.html">
									<img src="{{asset("assets_admin/img/logo-icon.png")}}" alt="" class="img-fluid">
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
						<div class="login-header text-center">
							<h3>Recuperar Contraseña <span>AutoNavega</span></h3>
							<p class="text-muted">Escribe tu nueva contraseña</p>
						</div>
						<form method="POST" action="{{ route('password.update') }}">
							{{ csrf_field() }}
							<input type="hidden" name="token" value="{{ $token }}">

							<div class="form-group">
								<label for=""></label>
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group mb-4">
								<label class="control-label">Nueva Contraseña</label>

								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
                            <div class="form-group mb-4">
								<label class="control-label">Confirma tu Contraseña</label>
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
							</div>
							<div class="text-center mb-4">
								<button class="btn btn-primary btn-block account-btn" type="submit">Cambiar Contraseña</button>
							</div>
						</form>
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
	  