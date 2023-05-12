
<div class="mb-4">
    <div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
        <img alt="profile image" src="{{ asset("assets/img/user.png") }}" class="avatar-lg rounded-circle">
        <div class="ml-sm-3 ml-md-0 ml-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
            <h6 class="mb-0">{{ auth()->user()->name }} {{ auth()->user()->apellido_p }}</h6>
            
        </div>
    </div>
</div>
<div class="widget settings-menu">
    <ul>
        
        <li class="nav-item">
            <a href="{{ route('user.perfil') }}" class="nav-link {{ Route::is(['user.perfil','user.perfil.membresia'])? 'active' : '' }}">
                <i class="fas fa-user"></i> <span>Mi Perfil</span>
            </a>
        </li>
       {{--  <li class="nav-item">
            <a href="{{ route('user.dashboard') }}" class="nav-link {{ Route::is(['user.dashboard'])? 'active' : '' }}">
                <i class="fas fa-chart-line"></i> <span>Dashboard</span>
            </a>
        </li> --}}
        <li class="nav-item">
            <a href="{{ route('user.agencies') }}" class="nav-link {{ Route::is(['user.agencies','user.agency.stats'])? 'active' : '' }}">
                <i class="fas fa-car"></i> <span>Mis Agencias</span>
            </a>
        </li>
        

        <li class="nav-item">
            <a href="{{ route('user.personal') }}" class="nav-link {{ Route::is(['user.personal','user.personal.ver'])? 'active' : '' }}">
                <i class="fas fa-users"></i> <span>Mi Personal</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a href="{{ route('user.agencies.claim') }}" class="nav-link {{ Route::is(['user.agencies.claim'])? 'active' : '' }}">
                <i class="fas fa-warehouse"></i> <span>Agencias Reclamadas</span>
            </a>
        </li>  --}}   
        <li class="nav-item">
            <a href="{{ route('user.comments') }}" class="nav-link {{ Route::is(['user.comments','user.comments.see'])? 'active' : '' }}">
                <i class="fas fa-comments"></i> <span>Comentarios </span>
            </a>
        </li>    
        <li class="nav-item">
            <a href="{{ route('user.citas') }}" class="nav-link {{ Route::is(['user.citas','user.citas.ver'])? 'active' : '' }}">
                <i class="fas fa-calendar"></i> <span>Citas en Línea </span>
            </a>
        </li>  
        <li class="nav-item">
            <a href="{{ route('user.reportes') }}" class="nav-link {{ Route::is(['user.reportes'])? 'active' : '' }}">
                <i class="fas fa-chart-pie"></i> <span>Reportes </span>
            </a>
        </li>      

        <li class="nav-item">
            <a href="{{ route('user.notifications') }}" class="nav-link {{ Route::is(['user.notifications'])? 'active' : '' }}">
                <i class="fas fa-bell"></i> <span>Notificaciones </span> <span class="badge badge-primary">@if (Auth::user()->unreadNotifications->count() > 0)
                   {{ Auth::user()->unreadNotifications->count()}}
                    @endif</span>
            </a>
        </li>  
       {{--  <li class="nav-item">
            <a href="{{ route('user.reviews') }}" class="nav-link {{ Route::is(['user.reviews'])? 'active' : '' }}">
                <i class="fas fa-comments"></i> <span>Mis Comentarios</span>
            </a>
        </li> --}}

        {{-- <li class="nav-item">
            <a href="my-services" class="nav-link">
                <i class="far fa-address-book"></i> <span>My Services</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="provider-bookings" class="nav-link">
                <i class="far fa-calendar-check"></i> <span>Booking List</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="provider-settings" class="nav-link">
                <i class="far fa-user"></i> <span>Profile Settings</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="provider-wallet" class="nav-link">
                <i class="far fa-money-bill-alt"></i> <span>Wallet</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="provider-subscription" class="nav-link">
                <i class="far fa-calendar-alt"></i> <span>Subscription</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="provider-availability" class="nav-link">
                <i class="far fa-clock"></i> <span>Availability</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="provider-reviews" class="nav-link">
                <i class="far fa-star"></i> <span>Reviews</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="provider-payment" class="nav-link">
                <i class="fas fa-hashtag"></i> <span>Payment</span>
            </a>
        </li> --}}
    </ul>
</div>