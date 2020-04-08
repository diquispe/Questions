<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Your Answer</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('questions.answers.store', $question->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <textarea name="body" id="" cols="30" rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="7"></textarea>
                        @if($errors->has('body'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('body') }}</strong>
                            </div>
                            @endif
                    </div>
                    <div class="form_group">
                        <button type="submit" class="btn btn-lg btn-outline-primary">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
