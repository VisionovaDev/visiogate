@extends('layouts.app')


@section('content')
    <div class="container">
        <h3 class="fw-bold mb-3 mt-3">Aggiungi varco</h3>
        <form action="{{ route('imposta.varco.store') }}" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" id="sede_id" name="sede_id" value="{{ $sede->id }}">
            <div class="row">
                <div class="col-md-4 form-group mt-3 {{ $errors->has('nome') ? 'has-error' : '' }}">
                    <label for="nome" class="fw-bold">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}"
                        required>
                    @if ($errors->has('nome'))
                        <span class="text-danger">{{ $errors->first('nome') }}</span>
                    @endif
                </div>

            </div>
            <div class="row">
                <div class="col-md-2 mb-3 mt-3">
                    <div class="form-check form-switch">
                        <input type="hidden" name="is_entrata" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" id="is_entrata"
                            name="is_entrata" value="1"
                            {{ old('is_entrata') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_entrata">E' una entrata</label>
                    </div>
                </div>
                <div class="col-md-2 mb-3 mt-3">
                    <div class="form-check form-switch">
                        <input type="hidden" name="is_uscita" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" id="is_uscita"
                            name="is_uscita" value="1"
                            {{ old('is_uscita') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_uscita">E' una uscita</label>
                    </div>
                </div>
            </div>
            
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Salva</button>
                <a href="{{ route('imposta.sede.show',  $sede->id ) }}">
                    <button type="button" class="btn btn-secondary">Annulla</button>
                </a>
            </div>
        </form>
    </div>
@endsection
