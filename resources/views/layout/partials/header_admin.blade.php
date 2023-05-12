<div class="main-wrapper">

		<!-- Header -->
		<div class="header">
			<div class="header-left">
				<a href="inicio" class="logo logo-small">
					<img src="{{asset('assets_admin/img/logo-icon.png')}}" alt="Logo" width="30" height="30">
				</a>
			</div>
			<a href="javascript:void(0);" id="toggle_btn">
				<i class="fas fa-align-left"></i>
			</a>
			<a class="mobile_btn" id="mobile_btn" href="javascript:void(0);">
				<i class="fas fa-align-left"></i>
			</a>

			<ul class="nav user-menu">
				<!-- Notifications --->
				<li class="nav-item dropdown noti-dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<i class="far fa-bell"></i> 
						@if (Auth::user()->unreadNotifications->count() > 0)
							<span class="badge badge-pill"></span>
						@endif
					</a>
					<div class="dropdown-menu dropdown-menu-right notifications">
						<div class="topnav-dropdown-header">
							<span class="notification-title">Notificaciones</span>
							<a href="#" id="read_all" class="clear-noti"> Borrar Todas </a>
							
						</div>
						<div class="noti-content">
							<ul class="notification-list">
								@foreach (Auth::user()->unreadNotifications as $noti)	
								<li class="notification-message">
									@switch($noti->type)
										@case("App\Notifications\NewReview")
										<a href="{{route('comentarios.see',$noti->data['data']['id'].'?noti='.$noti->id)}}">
									
											@break
										@case("App\Notifications\ContactoNoti")
										<a href="{{route('contacto.msj')}}">
											
											@break
										@case("App\Notifications\SolicitudAgencyNoti")
											<a href="{{route('solicitudes.agencies')}}">
												
												@break
										@case("App\Notifications\SolicitudNoti")
										<a href="{{route('solicitud.ver',$noti->data['data']['id']) }}">
											
											@break
										@default
									@endswitch
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" 
                                            src="{{ asset('assets/img/user.png') }}" alt="">
											</span>
											<div class="media-body">
												<p class="noti-details">
													<span class="noti-title">{{ $noti->data['text'] }}</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">{{ Date('d M Y h:m a', strtotime($noti->created_at )) }}</span>
												</p>
											</div>
										</div>
									</a>
								</li>
							@endforeach
							</ul>
						</div>
						<script>

						</script>
						<div class="topnav-dropdown-footer">
							<a href="{{ route('notifications.index') }}">Ver todas las notificaciones</a>
						</div>
					</div>
				</li>
				<!-- /Notifications -->

				<!-- User Menu -->
				<li class="nav-item dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle user-link  nav-link" data-toggle="dropdown">
						<span class="user-img">
							<img class="rounded-circle" src="{{asset('assets_admin/img/user.jpg')}}" width="40" alt="Admin">
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						{{-- <a class="dropdown-item" href="admin-profile">Perfil</a> --}}

						<a class="dropdown-item" href="{{ route('logout') }}"
						onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
							{{ __('Cerrar Sesión') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>
				<!-- /User Menu -->

			</ul>
		</div>
		<!-- /Header -->
