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
									<img src="../assets_admin/img/logo-icon.png" alt="" class="img-fluid">
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
							<h3>Contraseña <span>AutoNavega</span></h3>
							<p class="text-muted">Ingresa tu correo para restrablecer la contraseña</p>
						</div>
						<form method="POST" action="{{ route('password.email') }}">
							{{ csrf_field() }}
							<div class="form-group">
								<label class="control-label">Correo Electrónico</label>
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="text-center mb-4">
								<button class="btn btn-primary btn-block account-btn" type="submit">Enviar link</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Main Wrapper -->
@endsection
	  