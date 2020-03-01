@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Questions</div>

                    <div class="card-body">
                        @foreach($questions as $question)
                            <div class="media">
                                <div class="d-flex flex-column counters">
                                    <div class="vote">
                                        <b>{{ $question->votes }}</b> {{ Str::plural('vote', $question->votes) }}
                                    </div>
                                    <div class="status {{ $question->status }}">
                                        <b>{{ $question->answers }}</b> {{ Str::plural('answers', $question->votes) }}
                                    </div>
                                    <div class="view">
                                        {{ $question->views . "  " . Str::plural('view', $question->views) }}
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
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