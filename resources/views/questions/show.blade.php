@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h1>{{ $question->title }}</h1>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Regresar a las preguntas</a>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="media">
                        <div class="counters">
                            <div class="d-flex flex-column vote-controls">
                                <a href="" title="este pregunta es util" class="vote-up">
                                    <i class="fas fa-caret-up fa-3x"></i>
                                </a>
                                <span class="votes-count">1234</span>
                                <a href="" title="este pregunta no es util" class="vote-up">
                                    <i class="fas fa-caret-down fa-3x"></i>
                                </a>
                                <a href="" title="Esta pregunta no es util" class="favorite vote-accepted">
                                    <i class="fas fa-check fa-2x"></i>
                                    <span class="favourites-count">123</span>
                                </a>
                            </div>
                        </div>
                        <div class="media-body">
                            {!! $question->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">Answered {{ $question->created_date }}</span>
                                <div class="media mt-2">

                                    <a href="{{ $question->user->url }}" class="pr-2">
                                        <img src="{{ $question->user->avatar }}" class="imagen">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('answers._index', [
            'answers' => $question->answers,
            'answersCount' =>$question->answers_count
           ])
         @include('answers._create')
    </div>

@endsection
