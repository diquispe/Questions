@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>Haz una pregunta</h2>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Regresar a las preguntas</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('questions.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="questions-title">Titulo de la Pregunta</label>
                                <input type="text" name="title" id="questions-title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">
                                @if($errors->has('title'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="questions-body">Contenido de la pregunta</label>
                                <textarea name="body" id="questions-body" cols="10" rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"></textarea>
                                @if($errors->has('body'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg">Preguntar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
