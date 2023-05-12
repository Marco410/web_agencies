<?php error_reporting(0);?>
@if(Route::is(['index']))
	<!-- Loader -->
	<div class="page-loading">
		<div class="preloader-inner">
			<div class="preloader-square-swapping">
				<div class="cssload-square-part cssload-square-green"></div>
				<div class="cssload-square-part cssload-square-pink"></div>
				<div class="cssload-square-blend"></div>
			</div>
		</div>
	</div>
	<!-- /Loader -->
	@endif
	<div class="main-wrapper">
	@if(Route::is(['index','agencias','agencia.detalles','brands','contacto','nosotros','user.dashboard','user.reviews','user.agencies','user.agencies.claim','user.agency.stats','user.notifications','user.citas','user.citas.ver','user.comments','user.comments.see','user.personal.ver','user.agency.solicitar','user.personal','user.perfil','user.perfil.membresia','user.perfil.membresia.check','user.perfil.update.membresia','user.reportes','user.cambiar.plan','user.perfil.membresia.contrato','user.perfil.membresia.cambiar','user.membresia.activar','user.perfil.membresia.activar','about-us','categories','contact-us','faq','privacy-policy','search','service-details','term-condition']) ||  $exception )
		<!-- Header -->
		<header class="header">
		<div class="header-fixed">
			<nav class="navbar navbar-expand-lg header-nav">
				<div class="navbar-header">
					<a id="mobile_btn" href="javascript:void(0);">
						<span class="bar-icon">
							<span></span>
							<span></span>
							<span></span>
						</span>
					</a>
					<a href="{{ route('index') }}" class="navbar-brand logo">
						<img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
					</a>
					<a href="{{route('index')}}" class="navbar-brand logo-small">
						<img width="100px" src="{{ asset("assets/img/logo-icon-blanco.png")}}" class="img-fluid" alt="Logo">
					</a>
				</div>
				<div class="main-menu-wrapper">
					<div class="menu-header">
						<a href="{{route('index')}}" class="menu-logo">
							<img src="{{asset("assets/img/logo.png")}}" class="img-fluid" alt="Logo">
						</a>
						<a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a>
					</div>
					<ul class="main-nav">
						<li class="{{ Request::is('/') ? 'active' : '' }}">
							<a href="{{ route('index') }}">Inicio</a>
						</li>
						<li class="{{ Request::is('agencias-automotrices') ? 'active' : '' }}">
							<a href="{{ route('agencias') }}">Agencias Automotrices</a>
						</li>
						
						<li class="{{ Request::is('nosotros') ? 'active' : '' }}">
							<a href="{{route('nosotros')}}" >Nosotros</a>
						</li>
						<li class="{{ Request::is('contacto') ? 'active' : '' }}">
							<a  href="{{route('contacto')}}" >Contáctanos</a>
						</li>
						@auth
							@if(auth()->user()->hasRole('Dealer'))
							<li class="{{ Route::is('user.perfil') ? 'active' : '' }}">
								<a  href="{{route('user.perfil')}}" >Mi Panel</a>
							</li>
							@endif
							<li class="has-submenu movil" style="display: none;">
								<a href="#">Hola {{ auth()->user()->name }}<i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									
									<li class=""><a href="#" onclick="event.preventDefault();
										document.getElementById('logout-form-movil').submit();">Cerrar Sesión</a></li>
								</ul>
		
								<form id="logout-form-movil" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</li>
						@endif
					
					</ul>
				</div>
				@auth
				<ul class="main-nav desk">
					<li class="has-submenu ">
						<a href="#">Hola {{ auth()->user()->name }}<i class="fas fa-chevron-down"></i></a>
						<ul class="submenu">
							<li>
								<a href="#">
									{{ auth()->user()->roles[0]->name }}
								</a>
							</li>
							<li class=""><a href="#" onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">Cerrar Sesión</a></li>
						</ul>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</li>
				</ul>
				@else
				<ul class="nav header-navbar-rht">
					<li class="nav-item">
						<a class="nav-link header-login login-text" href="javascript:void(0);" data-toggle="modal" data-target="#login_modal">
                            <span class="show-text">Iniciar Sesión</span>
                        </a>
					</li>
				</ul>
				@endauth
			</nav>
			</div>
		</header>
		<!-- /Header -->
		@endif
