<?php $page = 'Contacto'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-title">
                        <h2>Contáctanos</h2>
                    </div>
                </div>
                <div class="col-auto float-right ml-auto breadcrumb-menu">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('index') }}">Inicio</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Contáctanos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <section class="contact-us">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        @if (session('status-contacto'))
                            <div class="alert alert-success">
                                {{ session('status-contacto') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="contact-queries">
                            <h4 class="mb-4">Ingresa tus datos</h4>
                            <form method="POST" action="{{ route('contacto.store') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-xl-6">
                                        <label class="mr-sm-2">Nombre(s):</label>
                                        <input class="form-control" type="text" name="nombre" required>
                                    </div>
                                    <div class="form-group col-xl-6">
                                        <label class="mr-sm-2">Apellidos</label>
                                        <input class="form-control" type="text" name="apellidos" required>
                                    </div>
                                    <div class="form-group col-xl-6">
                                        <label class="mr-sm-2">Correo Electrónico</label>
                                        <input class="form-control" type="email" name="email" required>
                                    </div>
                                    <div class="form-group col-xl-6">
                                        <label class="mr-sm-2">Teléfono</label>
                                        <input class="form-control" type="text" name="telefono">
                                    </div>
                                    <div class="form-group col-xl-12">
                                        <label class="mr-sm-2">Mensaje</label>
                                        <textarea class="form-control" name="msj" required rows="5"></textarea>
                                    </div>
                                    <div class="col-xl-12 mt-4">
                                        <button class="btn btn-primary btn-lg pl-5 pr-5" type="submit">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-4 wrap-cont">
                        <div class="contact-details">
                            <div class="contact-info">
                                <i class="far fa-envelope"></i>
                                <div class="contact-data">
                                    <h4>Email</h4>
                                    <p> <a href="mailto:info@autonavega.com">contacto@autonavega.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="map-grid">
        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d250646.68136328788!2d76.82714556974858!3d11.012014523817232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba859af2f971cb5%3A0x2fc1c81e183ed282!2sCoimbatore%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1596472179383!5m2!1sen!2sin" allowfullscreen="" aria-hidden="false" tabindex="0" class="contact-map"></iframe> --}}
        <img src="{{  asset("/assets/img/banner.jpg")}}" alt="">
    </div>
    </div>
@endsection
