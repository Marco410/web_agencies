    <!--  Modals -->
    @if (session('status') || session('errorL'))
    <script>
        $( document ).ready(function() {
            $('#login_modal').modal('toggle');
        });
    </script>
    @endif
    <!-- Login Modal -->
    <div class="modal account-modal fade" id="login_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-0 border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="login-header">
                        <h3>Iniciar <span>Sesión</span></h3>
                    </div>
                    <form method="POST" action="{{ route('user.login') }}">
							{{ csrf_field() }}
                        <div class="form-group form-focus">
                            <label class="focus-label">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control" placeholder="ejemplo@autonavega.com">
                        </div>
                        <div class="form-group form-focus">
                            <label class="focus-label">Contraseña</label>
                            <input type="password" name="password" class="form-control" placeholder="********">
                        </div>
                        <div class="text-right">	
                        </div>
                        <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Iniciar Sesión</button>
                        <div class="login-or">	<span class="or-line"></span>
                            <span class="span-or">o</span>
                        </div>
                        <div class="row form-row social-login">
                            <div class="col-6">	<a href="{{ route('login.facebook','redirect_to='.url()->full()) }}" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Iniciar Sesión</a>
                            </div>
                            <div class="col-6">	<a href="{{ route('login.google','redirect_to='.strval(url()->full())) }}" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Iniciar Sesión</a>
                            </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-sm-12">
                                @if (session('errorL'))
                                <div class="alert alert-danger mt-2">
                                    {!! session('errorL') !!}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                </div>
                            @endif
                            @if (session('status'))
                            <div class="alert alert-success mt-2">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                            </div>
                            @endif

                            </div>
                        </div>
                        <div class="text-center dont-have">¿No tienes una cuenta? <a href="{{ route('registro') }}"  >Registrate</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Login Modal -->

    <script>
        function close_login(){
            $('#login_modal').hide();
            $('#user-register').show();
        }

        function close_register(){
            $('#user-register').hide();
            $('#login_modal').show();
        }
    </script>

@if (session('loginSocial'))
<script>
    $( document ).ready(function() {
        /* $('#login_social_modal').modal('toggle'); */

        var notyf = new Notyf({
            duration: 2000,
            position: {
                x: 'center',
                y: 'center',
            },
            types: [
                {
                    type: 'warning',
                    background: 'orange',
                    icon: {
                        className: 'material-icons',
                        tagName: 'i',
                        text: 'warning'
                    }
                },
                {
                    type: 'error',
                    duration: 3000,
                    dismissible: true
                },
                {
                    type: 'success',
                    duration: 1500,
                    dismissible: true
                }
            ]
        });

    notyf.success('Iniciaste sesión con éxito');

        /* setTimeout(() => {
            $('#login_social_modal').modal('hide');
        }, 1500); */

    });
</script>
@endif
     <!-- Login Social Modal -->
<div class="modal account-modal fade" id="login_social_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-0 border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row text-center">
                    <div class="col-sm-12">
                        <div class="alert alert-success">
                            {{ session('loginSocial') }}
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- /Login Social Modal -->