@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>Todas las Preguntas</h2>
                            <div class="ml-auto">
                                <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Hacer una pregunta</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @include('layouts._messages')
                        @foreach($questions as $question)
                            <div class="media">
                                <div class="d-flex flex-column counters">
                                    <div class="vote">
                                        <b>{{ $question->votes }}</b> {{ Str::plural('vote', $question->votes) }}
                                    </div>
                                    <div class="status {{ $question->status }}">
                                        <b>{{ $question->answers_cpunt }}</b> {{ Str::plural('answers', $question->votes) }}
                                    </div>
                                    <div class="view">
                                        {{ $question->views . "  " . Str::plural('view', $question->views) }}
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <h3 class="mt-0"><a href="/questions/{{ $question->slug }}">{{ $question->title }}</a></h3>
                                        <div class="ml-auto">
                                            @can('update', $question)
                                            <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-outline-info">Editar</a>
                                            @endcan

                                            @can('delete', $question)
                                            <form class="form-delete" action="{{ route('questions.destroy', $question->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Estas seguro de eliminar tu pregunta')">Eliminar</button>
                                            </form>
                                            @endcan
                                        </div>
                                    </div>
                                    <p class="lead">
                                        Asked by: <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                        <small class="text-muted">{{ $question->created_date }}</small>
                                    </p>
                                    {{ Str::limit($question->body, 250)  }}
                                </div>
                            </div>
                            <hr>
                        @endforeach

                        <div class="mx-auto">
                            {{ $questions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
