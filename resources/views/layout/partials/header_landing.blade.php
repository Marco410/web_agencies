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
	<script>
		$(window).scroll(function() {
				if ($(window).scrollTop() >= 50) {
					$('.header-landing').addClass('fixed-header');
					$('.header-landing').css('background','#000');
					$('.hero-section-landing').css('position','relative');
				} else {
					$('.header-landing').css('background','transparent');
					$('.header-landing').removeClass('fixed-header');
					$('.hero-section-landing').css('position','');
				}
			});
	</script>
	<div class="main-wrapper">
	@if(Route::is(['landing.index']) ||  $exception )
		<!-- Header -->
	<header class="header-landing" style="background:transparent;">
		<div class="">
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
						<li class="{{ Route::is('landing.index') ? '' : '' }}">
							<a href="{{ route('landing.index') }}">Inicio</a>
						</li>
						<li class="{{ Request::is('landing.index','#how-work-section') ? 'active' : '' }}">
							<a class="link-to" href="#how-work-section">¿Cómo funciona?</a>
						</li>
						<li class="{{ Request::is('nosotros') ? 'active' : '' }}">
							<a class="link-to" href="#beneficios-section" >Beneficios</a>
						</li>
						<li class="{{ Request::is('contacto') ? 'active' : '' }}">
							<a  class="link-to" href="#membresias-section" >Membresías para Concesionarios</a>
						</li>
						<li class="{{ Request::is('contacto') ? 'active' : '' }}">
							<a  class="link-to" href="#nosotros-section" >Nosotros</a>
						</li>
						<li class="{{ Request::is('contacto') ? 'active' : '' }}">
							<a  class="link-to" href="#faqs-section" >FAQ´s</a>
						</li>
						@auth
							@if(auth()->user()->hasRole('Dealer'))
							<li class="{{ Route::is('user.dashboard') ? 'active' : '' }}">
								<a  href="{{route('user.dashboard')}}" >Mi Panel</a>
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
				<ul class="nav header-navbar-rht">
					<li class="nav-item">
						<a class="nav-link header-login login-text" href="javascript:void(0);" data-toggle="modal" data-membresia='Basic' data-target="#form_register_modal">
                            <span class="show-text">¡COMIENZA AHORA!</span>
                        </a>
					</li>
				</ul>
			</nav>
			</div>
		</header>
		<!-- /Header -->
		@endif
