@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>Editar tu pregunta</h2>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Regresar a las preguntas</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('questions.update', $question->id) }}" method="post">
                            @method('put')
                            @include('questions._form', ['buttonText' => 'Actualizar Pregunta' ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
