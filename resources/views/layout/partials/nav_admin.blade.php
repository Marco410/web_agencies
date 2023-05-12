<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-logo">
        <a href="index">
            <img src="{{ asset('assets_admin/img/logo-icon.png') }}" class="img-fluid" alt="">

        </a>
    </div>
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                @can('admin.home')
                    <li class="{{ Route::is(['dashboard']) ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}"><i class="fas fa-columns"></i> <span>Inicio</span></a>
                    </li>
                @endcan
                @can('admin.agencies')
                    <li class="{{ Route::is(['agencia']) ? 'active' : '' }}">
                        <a href="{{ route('agencia') }}"><i class="fas fa-car"></i> <span>Agencias</span></a>
                    </li>
                @endcan
                {{-- @can('admin.agencies.claim') --}}
                {{-- <li class="{{ Route::is(['admin.agencies.claim']) ? 'active' : '' }}">
                    <a href="{{ route('admin.agencies.claim') }}"><i class="fas fa-warehouse"></i> <span>Agencias
                            Reclamadas</span></a>
                </li> --}}
                {{-- @endcan --}}
                @can('admin.brands')
                    <li class="{{ Request::is('admin/marcas') ? 'active' : '' }}">
                        <a href="{{ route('marcas') }}"><i class="fab fa-buffer"></i> <span>Marcas</span></a>
                    </li>
                @endcan
                @can('admin.users')
                    <li class="{{ Route::is(['users','users.edit']) ? 'active' : '' }}">
                        <a href="{{ route('users') }}"><i class="fas fa-users"></i> <span>Usuarios</span></a>
                    </li>
                @endcan
                <li class="{{ Route::is('solicitudes') ? 'active' : '' }}">
                    <a href="{{ route('solicitudes') }}"><i class="fas fa-envelope-open-text"></i><span>Solicitudes</span></a>
                </li>
                <li class="{{ Route::is('solicitudes.agencies') ? 'active' : '' }}">
                    <a href="{{ route('solicitudes.agencies') }}"><i class="fas fa-car"></i><span>Solicitudes Agencia</span></a>
                </li>

                <li class="{{ Route::is('comentarios.index') ? 'active' : '' }}">
                    <a href="{{ route('comentarios.index') }}"><i class="fas fa-comments"></i>
                        <span>Comentarios</span></a>
                </li>
                <li class="{{ Route::is('contacto.msj') ? 'active' : '' }}">
                    <a href="{{ route('contacto.msj') }}"><i class="fas fa-envelope"></i> <span>Mensajes de Contacto</span></a>
                </li>
                <li class="{{ Route::is('groserias.index') ? 'active' : '' }}">
                    <a href="{{ route('groserias.index') }}"><i class="fas fa-meh-blank"></i> <span>Filtro de Lenguaje</span></a>
                </li>
                <li class="{{ Route::is('papelera.index') ? 'active' : '' }}">
                    <a href="{{ route('papelera.agencia') }}"><i class="fas fa-trash"></i> <span>Papelera</span></a>
                </li>
                <li class="{{ Route::is('settings.index') ? 'active' : '' }}">
                    <a href="{{ route('settings.index') }}"><i class="fas fa-cog"></i>
                        <span>Configuración</span></a>
                </li>


                {{-- <li class="{{ Request::is('admin/service-list') ? 'active' : '' }}">
							<a href="service-list"><i class="fas fa-bullhorn"></i> <span> Services</span></a>
						</li>
						<li class="{{ Request::is('admin/total-report') ? 'active' : '' }}">
							<a href="total-report"><i class="far fa-calendar-check"></i> <span> Booking List</span></a>
						</li>
						<li class="{{ Request::is('admin/payment_list') ? 'active' : '' }}">
							<a href="payment_list"><i class="fas fa-hashtag"></i> <span>Payments</span></a>
						</li>
						<li class="{{ Request::is('admin/ratingstype') ? 'active' : '' }}">
							<a href="ratingstype"><i class="fas fa-star-half-alt"></i> <span>Rating Type</span></a>
						</li>
						<li class="{{ Request::is('admin/review-reports') ? 'active' : '' }}">
							<a href="review-reports"><i class="fas fa-star"></i> <span>Ratings</span></a>
						</li>
						<li class="{{ Request::is('admin/subscriptions') ? 'active' : '' }}">
							<a href="subscriptions"><i class="far fa-calendar-alt"></i> <span>Subscriptions</span></a>
						</li>
						<li class="{{ Request::is('admin/wallet') ? 'active' : '' }}">
							<a href="wallet"><i class="fas fa-wallet"></i> <span> Wallet</span></a>
						</li>
						<li class="{{ Request::is('admin/service-providers') ? 'active' : '' }}">
							<a href="service-providers"><i class="fas fa-user-tie"></i> <span> Service Providers</span></a>
						</li>
						<li class="{{ Request::is('admin/users') ? 'active' : '' }}">
							<a href="users"><i class="fas fa-user"></i> <span>Users</span></a>
						</li>
						<li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
							<a href="settings"><i class="fas fa-cog"></i> <span> Settings</span></a>
						</li> --}}
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
