<?php $page="Landing";?>

@extends('layout.mainlayout_landing')
@section('content')
<!-- Hero Section -->
<section class="hero-section-landing" >
	<div class="layer">
		<div class="home-banner-landing"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-search-landing">
						<h3>Toma el control sobre el Customer Journey de <br> todos tus clientes.</h3>
						<span>Una solución innovadora y flexible con las herramientas necesarias, para que las agencias automotrices alcancen más objetivos y mejoren el nivel de satisfacción de sus clientes y prospectos.</span>
						
						<div class="row mt-4">
							<div class="col-sm-6 mt-4">
								<button type="button" data-toggle="modal" data-membresia='Plus' data-target="#form_register_modal" class="btn btn-md btn-primary pl-4 pr-4"  > <span class="text-white"> ¡COMIENZA AHORA!</span></button>
							</div>
							<div class="col-sm-6 mt-4">
								<a  href="#how-work-section" class="btn btn-md btn-transparent pl-4 pr-4 link-to" id="btn_star" ><span class="text-white">¿Cómo funciona?</span></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 text-center"  >
					<img class="desk" style="top: 250px; position: relative; right:150px" width="800px" src="{{ asset('assets/landing/laptop.png') }}" alt="Laptop AutoNavega">
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Hero Section -->

<!-- How It Works -->
<section id="how-work-section" class="how-work"  >
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="heading ">
					<h2>¿Cómo funciona?</h2>
				</div>
				<div class="howworksec">
					<div class="row">
						<div class="col-lg-6">
							<div class="howwork" style="text-align: left">
								<p class="pl-4"><i class="text-primary fas fa-square" ></i> +69%de los compradores siguen las recomendaciones que reciben en su entorno privado.
									</p>
								<p class="pl-4"><i class="text-primary fas fa-square" ></i> +38% de los clientes compran basados en las reseñas en línea. Future Shopper Report 2021. </p>
								<p class="mt-4">Pero hay algo que los compradores NO resuelven en sus búsquedas en línea:</p>
								<h3>¿Dónde y con quién?</h3>
								<p class="mt-4">Ahí es donde entra <strong>AutoNavega®</strong>. Un canal de comunicación abierto y transparente para el rankeo de concesionarios automotrices que conecta usuarios con los mejores distribuidores.</p>
							</div>
						</div>
						<div class="col-lg-6 ">
							<img class="img-fluid" width="100%" src="{{ asset('assets/landing/funcion.png') }}" alt="Gráfica Función">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /How It Works -->
<!-- quienes-somos -->
<section class="quienes-somos" >
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2 class="text-white" >¿Aún no conoces AutoNavega®?</h2>
				
				<a href="{{ route('index') }}" target="_blank" class="btn btn-md btn-black pl-4 pr-4 mt-4" >VISITA NUESTRO SITIO</a>
			</div>
		</div>
	</div>
</section>
<!-- /quienes-somos -->

<!-- Category Section -->
<section id="beneficios-section" class="category-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-md-6">
						<div class="heading">
							<h2>Conoce la realidad de tu mercado y la de tus competidores.</h2>
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-6">
						<a class="link-to" href="#bene">

							<div class="border-realidad" id="beneficios-comments" >
								<h4 class="mb-3" ><strong>Acceso a todos los comentarios</strong></h4>
								<p>Conoce quién y qué comentario están haciendo de tu concesionaria; así como el resultado global de las concesionarias y la percepción de todos sus clientes.</p>
							</div>
						</a>
						<a class="link-to" href="#bene">
							
							<div class="border-realidad" id="beneficios-response"> 
							<h4 class="mb-3"><strong>Quick Response</strong> by AutoNavega®</h4>
							<p>El poco o nulo seguimiento de los asesores ahora no será un problema. Quick Response by AutoNavega®, garantiza un seguimiento oportuno a todos los casos.</p>
						</div>
						</a>
						<a class="link-to" href="#bene">

						<div class="border-realidad" id="beneficios-citas">
							<h4 class="mb-3"><strong>Agendando citas de forma sencilla</strong></h4>
							<p>Tus clientes potenciales podrán hacer citas para visitar tu concesionaria para venta de autos nuevos, venta de autos usados, refacciones o cualquier servicio que necesiten.</p>
						</div>
						</a>
					</div>
					<div id="bene" class="col-md-6">
						<div  class="realidad-carousel mt-4">
							<div class="realidad-slider owl-carousel owl-theme">
							
								<img class="img-fluid" src="{{ asset('assets/landing/beneficios1.png') }}" alt="Beneficios 1">

								<img  class="img-fluid" src="{{ asset('assets/landing/beneficios2.png') }}" alt="Beneficios 2">
								
								<img  class="img-fluid" src="{{ asset('assets/landing/beneficios3.png') }}" alt="Beneficios 3">
		
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /Category Section -->

<!-- como-funciona -->
<section class="plataforma-section" >
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-md-12">
						<div class="heading howitworks">
							<h2 class="" >Una plataforma inteligente, <br>
								intuitiva y fácil de usar</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 mb-4">
						<div class="row">
							<div class="text col-md-12 col-lg-2 ">
								<img class="img-fluid" width="20px" src="{{ asset('assets/landing/icon-reportes.png') }}" alt="Reportes">
							</div>
							<div class="col-sm-10">
								<h5 class=""><strong>¡Todo bajo control!</strong> <br> Reportes Mensuales</h5>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-sm-12">
								<p>Obtén reportes y estadísticas generales, así como por áreas en específico. Interactúa con tus clientes y logra una mayor oportunidad para retenerlos. Muestra a otros usuarios tu compromiso con ellos y logra nuevos clientes.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4  mb-4">
						<div class="row">
							<div class="text col-md-12 col-lg-2 ">
								<img class="img-fluid" width="20px" src="{{ asset('assets/landing/icon-personal.png') }}" alt="Personal">
							</div>
							<div class="col-sm-10">
								<h5 class=""><strong>¡Dealer Rating!</strong> <br> Calificación de tu Personal</h5>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-sm-12">
								<p>Con AutoNavega® puedes agregar a todo tu personal y dejar que tus clientes los califiquen, identifica áreas de oportunidad y mejora tus procesos.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 mb-4">
						<div class="row">
							<div class="text col-md-12 col-lg-2 ">
								<img class="img-fluid" width="20px" src="{{ asset('assets/landing/icon-ubicacion.png') }}" alt="Ubicación AutoNavega">
							</div>
							<div class="col-sm-10">
								<h5 class=""><strong>¡Llegar fácil!</strong> <br> Función Llévame Aquí</h5>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-sm-12">
								<p>Los clientes no tendrán que salir de AutoNavega® para buscarte en su app de mapas. Con la función de Llévame ahí, podrán acceder inmediatamente a tu ubicación.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /como-funciona -->

<!-- Popular Servides -->
<section id="membresias-section"  class="popular-services">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-md-12">
						<div class="heading howitworks">
							<h2>Selecciona una  <strong class="text-primary" >membresía</strong></h2>
							<span>Tenemos el paquete que se ajusta a tus necesidades.</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 desk">
						<div class="card-plan">
							<div class="card-heading" style="background-color: #fafafa"  >
								-
							</div>
							<div class="card-subheading" style="background-color: #fafafa; display: flex; justify-content: center;align-items: center; text-align: center;">
							</div>
							<div class="card-body-plan">
								<div class="card-text">
									<p class="text">Perfil de Dealer en la Plataforma</p>
								</div>
								<div class="card-text">
									<p class="text">Personalización de Perfil</p>
								</div>
								<div class="card-text">
									<p class="text">Consulta de Comentarios</p>
								</div>
								<div class="card-text">
									<p class="text">Dealer Dashboard</p>
								</div>
								<div class="card-text">
									<p class="text">Citas en Línea</p>
								</div>
								<div class="card-text">
									<p class="text">Reporte Mensual de Acciones</p>
								</div>
								<div class="card-text">
									<p class="text"><strong>QuickResponse</strong> by AutoNavega®</p>
								</div>
								<div class="card-text">
									<p class="text">Calificación del Personal</p>
								</div>
								<div class="card-text">
									<p class="text">Inventario de Autos en tiempo real* <small>(En desarrollo)</small></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3 mb-4">
						<div class="card-plan plan">
							<div class="card-heading" style="background-color: var(--gray)" >
								ZERO
							</div>
							<div class="card-subheading" style="background-color: var(--gray);display: flex; justify-content: center;align-items: center; text-align: center;">
								¡GRATIS!
							</div>
							<div class="card-body-plan">
								<div class="card-row">
									<img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega">
									<p class="text movil" style="display: none">Perfil de Dealer en la Plataforma</p>
								</div>
								<div class="card-row desk">
									-
								</div>
								<div class="card-row desk">
									-
								</div>
								<div class="card-row desk">
									-
								</div>
								<div class="card-row desk">
									-
								</div>
								<div class="card-row desk">
									-
								</div>
								<div class="card-row desk">
									-
								</div>
								<div class="card-row desk">
									-
								</div>
								<div class="card-row desk">
									-
								</div>
								{{-- <a style="cursor: pointer" data-toggle="modal" data-membresia='Zero' data-target="#form_register_modal" > <div class="card-subheading" style="background-color: var(--gray);display: flex; justify-content: center;align-items: center; text-align: center;">
									¡COMIENZA AHORA!
								</div></a> --}}
							</div>
						</div>
					</div>
					<div class="col-sm-3 mb-4">
						<div class="card-plan plan">
							<div class="card-heading" style="background-color: var(--primary)">
								BASIC
							</div>
							<div class="card-subheading" style="background-color: var(--primary)">
								 <strong> *$3,100 MXN / MES </strong><br> <span> Ahorra $1,860.00 con pago anual</span>
							</div>
							<div class="card-body-plan">
								<div class="card-row">
									<img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega">
									<p class="text movil" style="display: none">Perfil de Dealer en la Plataforma</p>
								</div>
								<div class="card-row">
									<img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega">
									<p class="text movil" style="display: none">Personalización de Perfil</p>

								</div>
								<div class="card-row">
									<img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega">
									<p class="text movil" style="display: none">Consulta de Comentarios</p>

								</div>
								<div class="card-row">
									<img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega">
									<p class="text movil" style="display: none">Dealer Dashboard</p>

								</div>
								<div class="card-row desk">
									-
								</div>
								<div class="card-row desk">
									-
								</div>
								<div class="card-row desk">
									-
								</div>
								<div class="card-row desk">
									-
								</div>
								<div class="card-row desk">
									-
								</div>
								<a style="cursor: pointer" data-toggle="modal" data-membresia='Basic' data-target="#form_register_modal" >
								<div class="card-subheading" style="background-color: var(--primary);display: flex; justify-content: center;align-items: center; text-align: center;">
									¡COMIENZA AHORA!
								</div></a>
							</div>
						</div>
					</div>
					<div class="col-sm-3 mb-4">
						<div class="card-plan plan">
							<div class="card-heading" style="background-color: var(--hover)">
								PLUS
							</div>
							<div class="card-subheading" style="background-color: var(--hover)">
								<strong>*$3,650 MXN  / MES </strong> <br> <span>Ahorra $5,256.00 con pago anual</span>
							</div>
							<div class="card-body-plan">
								<div class="card-row">
									<img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega">
									<p class="text movil" style="display: none">Perfil de Dealer en la Plataforma</p>
								</div>
								<div class="card-row">
									<img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega">
									<p class="text movil" style="display: none">Personalización de Perfil</p>
								</div>
								<div class="card-row">
									<img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega">
									<p class="text movil" style="display: none">Consulta de Comentarios</p>
								</div>
								<div class="card-row">
									<img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega">
									<p class="text movil" style="display: none">Dealer Dashboard</p>

								</div>
								<div class="card-row">
									<img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega">
									<p class="text movil" style="display: none">Citas en Línea</p>

								</div>
								<div class="card-row">
									<img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega">
									<p class="text movil" style="display: none">Reporte Mensual de Acciones</p>

								</div>
								<div class="card-row">
									<img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega">
									<p class="text movil" style="display: none"><strong>QuickResponse</strong> by AutoNavega®</p>

								</div>
								<div class="card-row">
									<img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega">
									<p class="text movil" style="display: none">Calificación del Personal</p>

								</div>
								<div class="card-row">
									<img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega">
									<p class="text movil" style="display: none">Inventario de autos en tiempo real*<small>(En desarrollo)</small></p>
								</div>
								<a style="cursor: pointer" data-toggle="modal" data-membresia='Plus' data-target="#form_register_modal" >
								<div class="card-subheading" style="background-color: var(--hover);display: flex; justify-content: center;align-items: center; text-align: center;">
									¡COMIENZA AHORA!
								</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-12 card-footer-plan">
						<p>*Cobros Mensuales (Sin Descuento), Semestrales (5% Descuentos), Anuales (12% Descuento)</p>
						<p>Precios más IVA.</p>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>
<!-- /Popular Servides -->

<section id="nosotros-section" class="hero-section" style="position: relative" >
	<div class="layer-conectamos">
		<div class="conectamos-landing"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-search-landing">
						<h3>Conectamos clientes con <br> agencias automotrices</h3>
						<span style="font-weight: 400; font-size:16px;line-height: 160%;" >Somos el recurso en línea para los clientes para completar su <strong> Customer Journey</strong> al definir una relación con un Dealer automotriz. <br> <br> Es un espacio usado como recurso de rankeo de concesionarios automotrices y centros de negocio de la industria automotriz, que ofrece mediante su sistema de comunicación y calificación de servicios una red social donde exista comunicación con sus usuarios, así como la transparencia y apertura de opinión de los usuarios.</span>
					
					</div>
				</div>
				<div class="col-lg-6 logo-contactanos">
						<img class="img-fluid" width="70%" src="{{ asset('assets/img/logo.png') }}" alt="Logo AutoNavega">
				</div>
			</div>
		</div>
	</div>
</section>

<section id="faqs-section" class="response-section" >
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-12 mb-4">
						<div class="heading">
							<h2>Encuentra las Respuestas</h2>
						</div>
						<p>Si aún tienes dudas con gusto podemos resolver todas tus preguntas:</p>
						<div class="col-md-12" style="display:flex; justify-content: space-around;">
							{{-- <a class="btn btn-md btn-wp" href=""> <img width="25px" src="{{ asset('assets/landing/whatsapp.png') }}" alt="Whatsapp AutoNavega"> CONTÁCTANOS</a> --}}
							<a class="btn btn-md btn-black" target="_blank" href="{{ route('contacto') }}">  ¡ESCRÍBENOS!  </a>
						</div>
					</div>
					<div class="col-lg-12 mt-4">
						<div id="accordion">
							<div class="card">
							  <div class="card-header" id="headingOne">
								<p class="mb-0">
								  <button class="btn btn-link" style="font-size: 20px" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Una de las reseñas de mi negocio ha desaparecido. ¿Qué ha pasado? <i class=" text-primary fas fa-plus"></i>
								  </button>
								</p>
							  </div>
						  
							  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="card-body">
									Aquí algunas razones:
									<ol>
										<li>El usuario que escribió la reseña pudo eliminarla. </li>
										<li>La reseña pudo haber sido borrada por el área de Atención a los Usuarios. Esto sólo sucede si el comentario rompe las Condiciones de Uso de la platafora.</li>
										<li>El comentario está siendo valorado para nuestra área interna a través de una conciliación o alguna otra acción necesaria para verificar si el comentario es falso o verdadero.</li>
									</ol>
								</div>
							  </div>
							</div>
							<div class="card">
							  <div class="card-header" id="headingTwo">
								<h5 class="mb-0">
								  <button class="btn btn-link collapsed" style="font-size: 20px" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									¿Qué debo hacer si alguien escribe un comentario negativo sobre mi negocio?<i class=" text-primary fas fa-plus"></i>
								  </button>
								</h5>
							  </div>
							  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="card-body">
									<p> No es fácil satisfacer a todos los clientes; sin embargo, en Autonavega creemos que las reseñas negativas son necesarias para crecer y mejorar nuestros procesos.</p>
									<p>
									La intensión que tenemos es ser una alternativa para todas las partes involucradas para identificar aquellas áreas de oportunidad y patrones específicos que se repitan, para así mejorar todos los procesos y estar más cerca de la satisfacción al cliente que se busca.</p>
									<p>
									Ten cuidado con un solo comentario “ultra-negativo”, y dale el peso que consideres adecuado. La mayor parte de los usuarios de <a href="{{ route('index') }}"> Autonavega.com</a> buscan un criterio muy generalizado y que englobe varios comentarios para evaluar a una agencia automotriz.</p>
									<p>
									Además de todo, si cuentas con una membresía activa, siempre podrás responder y contactar al usuario. Ten en consideración que contestar a una crític con otra crítica quizás puede no ser la mejor idea.</p>
									
								</div>
							  </div>
							</div>
							
							<div class="card">
								<div class="card-header" id="headingForth">
								  <h5 class="mb-0">
									<button class="btn btn-link collapsed" style="font-size: 20px" data-toggle="collapse" data-target="#collapseForth" aria-expanded="false" aria-controls="collapseForth">
										¿Cómo es que la información de mi negocio está en Autonavega? <i class=" text-primary fas fa-plus"></i>
									</button>
								  </h5>
								</div>
								<div id="collapseForth" class="collapse" aria-labelledby="headingForth" data-parent="#accordion">
								  <div class="card-body">
									<p>
									Recopilamos información que se encuentra pública de las diferentes fuentes públicas. Adicional, también obtenemos información que los clientes y usuarios nos brindan sobre sus experiencias y negocios.</p>
									<p>
									Si en algún momento crees que la información de tu negocio no está actualizada, háznoslo saber.</p>

								  </div>
								</div>
  
							   
							  </div>
							  <div class="card">
								<div class="card-header" id="headingFive">
								  <h5 class="mb-0">
									<button class="btn btn-link collapsed" style="font-size: 20px" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
										¿Puedo eliminar de Autonavega el perfil con la información de mi negocio? <i class=" text-primary fas fa-plus"></i>
									</button>
								  </h5>
								</div>
								<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
								  <div class="card-body">
									<p>
										Los usuarios tienen derecho a hablar de lo que les agrada (y lo que no les agrada) sobre un servicio, atención, o agencia de autos que visitaron. Nosotros no retiramos los perfiles de los negocios, así que, creemos que lo mejor que se puede hacer, es acercarte a tus clientes y verdaderamente escuchar sus comentarios positivos y negativos en pro de tu negocio.
									</p>

								  </div>
								</div>
							  </div>
							  <div class="card">
								<div class="card-header" id="headingSix">
								  <h5 class="mb-0">
									<button class="btn btn-link collapsed" style="font-size: 20px" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
										¿Puede una empresa de gestión de marketing ayudarme a controlar mi reputación en Autonavega? <i class=" text-primary fas fa-plus"></i>
									</button>
								  </h5>
								</div>
								<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
								  <div class="card-body">
									<p>
										Ten cuidado. Hay muchas empresas que te dicen que se encargarán de “gestionar tu reputación” y podrían decir que trabajan directamente con Autonavega. </p>
									<p>
									Si te preguntas, ¿cómo pueden cumplirte con mejorar tu reputación? La respuesta es: no es posible.  Nadie trabajará directamente con Autonavega pues no aceptamos nada a cambio de remover o mejorar las calificaciones que nuestros usuarios ponen en la plataforma.</p>
									<p>
									Adicional, nos interesa que sepas que, a través de el Proceso de Conciliación, podemos apoyarte a verificar si tienes duda en cualquier de los comentarios.
									Pregúntanos y podremos ayudarte.</p>
									<p>
									Por último, y como lo hemos mencionado antes, la mejor forma para mejorar la reputación de tu negocio es brindando un excelente servicio al cliente y contestando de forma diplomática y orientando a una solución a los comentairos de los usuarios.</p>

								  </div>
								</div>
							  </div>
							  <div class="card">
								<div class="card-header" id="headingSeven">
								  <h5 class="mb-0">
									<button class="btn btn-link collapsed" style="font-size: 20px" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
										Estoy considerando acciones legales. ¿Cuáles son mis derechos? <i class=" text-primary fas fa-plus"></i>
									</button>
								  </h5>
								</div>
								<div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
								  <div class="card-body">
									<p>Sabemos que nadie está contento cuando reciben una crítica o un comentario negativo y aún peor si crees que viola tus derechos. Es muy importante que te asistas de un abogado si quieres tomar medidas legales. Es importante decir que no te llevará muy lejos meter a Autonavega en la disputa pues actuamos como cualquier foro público donde los usuarios expresan sus puntos de vista (La ley está bien estableciad en este punto, pero te invitamos a indagar más si estás interesado en confirmarlo).</p>
									
								  </div>
								</div>
							  </div>


						  </div>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>
</section>

</div>

@endsection
