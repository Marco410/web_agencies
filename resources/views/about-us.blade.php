<?php $page = 'Nosotros'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-title">
                        <h2>Nosotros</h2>
                    </div>
                </div>
                <div class="col-auto float-right ml-auto breadcrumb-menu">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Nosotros</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <section class="about-us">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="about-blk-content" style="padding-right: 50px">
                            <h4>QUIÉNES <strong>SOMOS</strong></h4>
                            <p>Es un espacio usado como recurso de rankeo de concesionarios automotrices y centros de
                                negocio de la industria automotriz, que ofrece mediante su sistema de comunicación y
                                calificación de servicios una red social donde exista comunicación con sus usuarios, así
                                como la transparencia y apertura de opinión de los usuarios.</p>
                            <p>Se fundó en 2016 para ayudar a las personas a encontrar negocios locales del giro de la
                                industria automotriz y sus relacionados y poder hacer reseñas de los servicios brindados.
                            </p>
                            <p> <span class="text-primary">Autonavega.com</span> proporciona a sus clientes un directorio
                                amplio en línea con más de 1,000 establecimientos en todo el país, incluyendo talleres de
                                servicio, showrooms de venta de autos, grupos automotrices, etc. La compañía ofrece una
                                fuente única de reseñas a nivel nacional.</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="about-blk-image">
                            <iframe src="https://player.vimeo.com/video/241712124?h=edb4cc5493" width="550" height="352"
                                frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- como-funciona -->
    <section class="como-funciona">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="heading">
                                <h2 class="text-white">Qué calificamos en Autonavega</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 text-center mb-4">
                            <div class="box">
                                <img class="mb-2" width="40px" src="assets/img/icons/sillon.png" alt=""><br>
                                <span> <strong> Comodidad para el cliente</strong></span>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center mb-4">
                            <div class="box">
                                <img class="mb-2" width="40px" src="assets/img/icons/atencion.png" alt=""><br>
                                <span> <strong> Nivel de atención de los ejecutivos</strong></span>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center mb-4">
                            <div class="box">
                                <img class="mb-2" width="40px" src="assets/img/icons/servicio.png" alt=""><br>
                                <span> <strong> Costo-Beneficio </strong></span>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center mb-4">
                            <div class="box">
                                <img class="mb-2" width="40px" src="assets/img/icons/practicidad.png" alt=""><br>
                                <span> <strong> Practicidad y Ventajas para el cliente</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-12">
				<div class="row">
					<div class="col-md-6 ">
						<div class="heading">
							<h2 class="text-white" >Cómo funciona AUTONAVEGA</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 text-center mb-4">
						<div class="box">
							<img class="mb-2" width="40px" src="assets/img/icons/sillon.png" alt=""><br>
							<span> <strong> COMODIDAD</strong></span>
						</div>
					</div>
					<div class="col-lg-3 text-center mb-4">
						<div class="box">
							<img class="mb-2" width="40px" src="assets/img/icons/atencion.png" alt=""><br>
							<span> <strong> ATENCIÓN</strong></span>
						</div>
					</div>
					<div class="col-lg-3 text-center mb-4">
						<div class="box">
							<img class="mb-2" width="40px" src="assets/img/icons/servicio.png" alt=""><br>
							<span> <strong> SERVICIO</strong></span>
						</div>
					</div>
					<div class="col-lg-3 text-center mb-4">
						<div class="box">
							<img class="mb-2" width="40px" src="assets/img/icons/practicidad.png" alt=""><br>
							<span> <strong> PRACTICIDAD</strong></span>
						</div>
					</div>
				</div>
			</div> --}}
            </div>
        </div>
    </section>

    <section class="call-us">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h5 class="text-primary" >¿No encontraste la agencia que buscabas?</h5>
                    <h2>¿Eres una agencia y quieres aparecer en nuestro directorio?</h2>
                    <p>Mándanos tus datos y nos pondremos en contacto contigo.</p>
                </div>
                <div class="col-6 call-us-btn">
                    <a href="{{ route('contacto') }}" class="btn btn-call-us">Contáctanos</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /como-funciona -->
    <!--
     <section class="about-us">
      <div class="content">
       <div class="container">
        <div class="row">
         <div class="col-6">
          <div class="about-blk-content">
           <h4>Experienced and Reliable</h4>
           <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scel erisque the mattis, leo quam aliquet congue justo ut scelerisque. Praesent pharetra, justo ut scelerisque the mattis, leo quam aliquet congue justo ut scelerisque.</p>
           <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scel erisque the mattis, leo quam aliquet congue justo ut scelerisque. Praesent pharetra, justo ut scelerisque the mattis, leo quam aliquet congue justo ut scelerisque.</p>
          </div>
         </div>
         <div class="col-6">
          <div class="about-blk-image">
           <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
         </div>
        </div>
       </div>
      </div>
     </section>

     <section class="call-us">
      <div class="container">
       <div class="row">
        <div class="col-6">
         <span>Free Consultation</span>
         <h2>Ready to start your dream project?</h2>
         <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod. Nunc placerat mi id nisi interdum mollis</p>
        </div>
        <div class="col-6 call-us-btn">
         <a href="javascript:void(0);" class="btn btn-call-us">Request A Free Consultation</a>
        </div>
       </div>
      </div>
     </section>

     How It Works
     <section class="how-work">
      <div class="container">
       <div class="row">
        <div class="col-lg-12">
         <div class="heading howitworks">
          <h2>Reasons You Should Call Us</h2>
          <span>Our Advantages</span>
         </div>
         <div class="howworksec">
          <div class="row">
           <div class="col-lg-4">
            <div class="howwork">
             <div class="iconround">
              <div class="steps">01</div>
              <img src="assets/img/icon-1.png" alt="">
             </div>
             <h3>Choose What To Do</h3>
             <p>Aliquam lorem ante, dapibus in, viverra quis, feugiat Phasellus viverra nulla ut metus varius laoreet.</p>
            </div>
           </div>
           <div class="col-lg-4">
            <div class="howwork">
             <div class="iconround">
              <div class="steps">02</div>
              <img src="assets/img/icon-2.png" alt="">
             </div>
             <h3>Find What You Want</h3>
             <p>Aliquam lorem ante, dapibus in, viverra quis, feugiat Phasellus viverra nulla ut metus varius laoreet.</p>
            </div>
           </div>
           <div class="col-lg-4">
            <div class="howwork">
             <div class="iconround">
              <div class="steps">03</div>
              <img src="assets/img/icon-3.png" alt="">
             </div>
             <h3>Amazing Places</h3>
             <p>Aliquam lorem ante, dapibus in, viverra quis, feugiat Phasellus viverra nulla ut metus varius laoreet.</p>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
     </section>
     /How It Works -->
    </div>
@endsection
