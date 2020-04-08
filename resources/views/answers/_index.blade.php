<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2>{{ $answersCount . " " . Str::plural('Answer', $question->answers_count) }}</h2>
            </div>
            <div class="card-body">
                @include('layouts._messages')
                @foreach($answers as $answer)
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
                                    <i class="fas fa-check fa-2x "></i>
                                    <span class="favourites-count">123</span>
                                </a>
                            </div>
                        </div>
                        <div class="media-body">
                            {!! $answer->body_html  !!}
                            <div class="float-right">
                                <span class="text-muted">Answered {{ $answer->created_date }}</span>
                                <div class="media mt-2">

                                    <a href="{{ $answer->user->url }}" class="pr-2">
                                        <img src="{{ $answer->user->avatar }}" class="imagen">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
