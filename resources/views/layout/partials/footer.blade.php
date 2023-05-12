@include('modals')

<!-- Footer -->
<footer class="footer">

		<!-- Footer Top -->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<!-- Footer Widget -->
						<div class="footer-widget footer-menu">
							<h2 class="footer-title">Links Rápidos</h2>
							<ul>
								<li>
									<a href="{{route('nosotros')}}">Nosotros</a>
								</li>
								<li>
									<a  href="{{route('contacto')}}">Contacto</a>
								</li>
							</ul>
						</div>
						<!-- /Footer Widget -->
					</div>
					<div class="col-lg-3 col-md-6">
						<!-- Footer Widget -->
						<div class="footer-widget footer-menu">
							<h2 class="footer-title">Pestañas</h2>
							<ul>
								<li>
									<a href="{{route('index')}}">Inicio</a>
								</li>
								<li>
									<a href="{{route('agencias')}}">Agencias</a>
								</li>
                                <li>
									<a href="{{route('user.dashboard')}}">Mi Panel</a>
								</li>
							</ul>
						</div>
						<!-- /Footer Widget -->
					</div>
					<div class="col-lg-3 col-md-6">
						<!-- Footer Widget -->
						<div class="footer-widget footer-contact">
							<h2 class="footer-title">Contacto</h2>
							<div class="footer-contact-info">
								<p class="mb-0"><i class="fas fa-envelope"></i> <a class="text-primary" href="mailto:contacto@autonavega.com ">contacto@autonavega.com </a></p>
							</div>
						</div>
						<!-- /Footer Widget -->
					</div>
					<div class="col-lg-3 col-md-6">
						<!-- Footer Widget -->
						<div class="footer-widget">
							<h2 class="footer-title">Síguenos</h2>
							<div class="social-icon">
								<ul>
									<li>
										<a href="https://www.facebook.com/Autonavega" target="_blank"><i class="fab fa-facebook-f"></i> </a>
									</li>
									<li>
										<a href="https://www.instagram.com/autonavega/" target="_blank"><i class="fab fa-instagram"></i> </a>
									</li>

								</ul>
							</div>
							{{-- <div class="subscribe-form">
								<input type="email" class="form-control" placeholder="Enter your email">
								<button type="submit" class="btn footer-btn">
									<i class="fas fa-paper-plane"></i>
								</button>
							</div> --}}
						</div>
						<!-- /Footer Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- /Footer Top -->

		<!-- Footer Bottom -->
		<div class="footer-bottom">
			<div class="container">
				<!-- Copyright -->
				<div class="copyright">
					<div class="row">
						<div class="col-md-6 col-lg-6">
							<div class="copyright-text">
								<p>Copyright &copy; 2021 - {{ date('Y') }} MORGUI, S.A.P.I. Todos los derechos reservados. La marca <a href="{{route('index')}}">AutoNavega</a>  es una marca registrada. El logotipo es una marca comercial registrada.</p> 
							</div>
						</div>
						<div class="col-md-6 col-lg-6">
							<!-- Copyright Menu -->
							<div class="copyright-menu">
								<ul class="policy-menu">
									<li>
										<a href="{{route("term-condition")}}">Términos y Condiciones</a>
									</li>
									<li>
										<a href="{{ route('privacy-policy') }}">Aviso de Privacidad</a>
									</li>
									<li>
										<a href="{{route('faq')}}">Preguntas Frecuentes</a>
									</li>
								</ul>
							</div>
							<!-- /Copyright Menu -->
						</div>
					</div>
				</div>
				<!-- /Copyright -->
			</div>
		</div>
		<!-- /Footer Bottom -->

	</footer>
	<!-- /Footer -->
