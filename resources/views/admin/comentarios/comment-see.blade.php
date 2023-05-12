<?php $page="Ver Comentario";?>

@extends('layout.mainlayout_admin')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="col">
                <h3 class="page-title mb-3"> <i class="fas fa-comment" ></i>  Comentario</h3>
                
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="review-list">
                                <div class="review-img">
                                    @if ($rev->user_id)
                                        <img class="rounded-circle" width="80px"
                                            src="{{ asset('assets/img/user.png') }}" alt="">
                                    @else
                                        <img class="rounded-circle" src="{{ $rev->foto_url }}"
                                            alt="">
                                    @endif
                                </div>
                                <div class="review-info">
                                    @if ($rev->user_id)
                                    <h5>{{ $rev->user[0]->name }} {{ $rev->user[0]->apellido_p }}</h5>
                                    <div class="review-date">
                                        {{ date('d M Y', strtotime($rev->created_at)) }}
                                    </div>
                                    <?php 
                                    $autor = $rev->user[0]->name ." ". $rev->user[0]->apellido_p;
                                    $autorid = $rev->user[0]->id;
                                    ?>
                                    @else
                                    <h5>{{ $rev->autor }}</h5>
                                        <div class="review-date">
                                            {{ date('d M Y', $rev->time) }} </div>
                                    <?php 
                                    $autor = $rev->autor;
                                    $autorid = 0;
                                     ?>

                                    @endif
                                    <p class="mb-0 text-primary">{{ $rev->text }}</p>
                                    @if ($rev->user_id)
                                        <small>Atención ({{ $rev->atencion }}) <i
                                                class="fas fa-star filled"></i></small>
                                        <small>Practicidad ({{ $rev->practicidad }}) <i
                                                class="fas fa-star filled"></i></small>
                                        <small>Velocidad ({{ $rev->velocidad }}) <i
                                                class="fas fa-star filled"></i></small>
                                        <small>Resultado ({{ $rev->resultado }}) <i
                                                class="fas fa-star filled"></i></small>
                                    @endif
                                </div>
                                <div class="review-count">
                                    <div class="rating">
                                        <i
                                            class="fas fa-star {{ $rev->rating >= 1 ? 'filled' : '' }}"></i>
                                        <i
                                            class="fas fa-star {{ $rev->rating >= 2 ? 'filled' : '' }}"></i>
                                        <i
                                            class="fas fa-star {{ $rev->rating >= 3 ? 'filled' : '' }}"></i>
                                        <i
                                            class="fas fa-star {{ $rev->rating >= 4 ? 'filled' : '' }}"></i>
                                        <i
                                            class="fas fa-star {{ $rev->rating >= 5 ? 'filled' : '' }}"></i>
                                        <span
                                            class="d-inline-block average-rating">({{ $rev->rating }})</span>
                                    </div>
                                </div>
                                <a class="btn btn-sm bg-primary-light" data-toggle="modal" data-target="#modalComentario" data-whatever="{{ $rev->text }}" data-autorid="{{ $autorid }}" data-autor="{{ $autor }}" data-id="{{ $rev->id }}" onclick="comment(this)" > <i class="fas fa-reply" ></i> Responder</a >
                                    <a class="btn btn-sm bg-info-light" href="{{ route('agencia.detalles',$rev->agencia_id) }}" > <i class="fas fa-car" ></i> Ver comentario en agencia</a >
                                        <a class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#modalDeleteComentario" data-autor="{{ $autor }}" data-id="{{ $rev->id }}" onclick="commentDelete(this)" > <i class="fas fa-trash" ></i></a >
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-sm-12 text-center">
                                <h4 class="mb-4 " >Respuestas</h4>
                            </div>
                            <hr>
                            @if (!$rev->answers->isEmpty())
                                @foreach ($rev->answers as $answer)
                                <div class="row ">
                                    <div class="col-sm-3 text-center">
                                        <img class="rounded-circle" width="70px"
                                        src="{{ asset('assets/img/user.png') }}" alt="">
                                    <h6>{{ $answer->user->name }} {{ $answer->user->apellido_p }}</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <i class="fas fa-comment-dots" ></i>
                                        <p>Respuesta: <strong>{{ $answer->answer }}</strong> </p>
                                        <p>Fecha:  <strong>{{ Date('d M Y h:m a', strtotime($answer->created_at )) }}</strong></p>
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                            @else
                            <div class="col-sm-12 text-center">
                                <h6>Aún no se le ha respondido</h6>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   @include('admin.comentarios.comment-add-answer-modal')
   @include('admin.comentarios.comment-delete-modal')


@endsection
