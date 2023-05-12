<?php $page = 'Crear Usuarios'; ?>

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
                                <h3 class="page-title">Añadir Nuevo Usuario</h3>
                            </div>
                        </div>
                    </div>

					<div class="card">
						<div class="card-body">

							<form method="POST" action="{{ route('users.store') }}">
									{{ csrf_field() }}
									<div class="form-group form-focus">
										<label class="focus-label">Nombre</label>
										<input type="text" required name="nombre" class="form-control floating" placeholder="Escribe tu nombre" value="{{ old('nombre') }}"  >
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
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required  placeholder="Ingresa una contraseña">
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
									<div class="mt-5">
										<button class="btn btn-primary" type="submit" >Registrar Nuevo Usuario</button>
										<a href="{{route('users')}}" class="btn btn-link">Cancel</a>
									</div>
							</form>
						</div>
					</div>

						<div class="row">
							<div class="col-sm-12">
								@if($errors->any())
								@foreach($errors->all() as $error)
								<div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong>{{ $error }}</div>
								@endforeach
								@endif

							</div>
						</div>

                </div>
            </div>
        </div>
    </div>
@endsection
