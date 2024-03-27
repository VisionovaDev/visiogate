@extends('layouts.app')


@section('content')
    <div class="container">
        <h3 class="fw-bold mb-3 mt-3">Aggiungi reparto alla sede: {{ $sede->nome }}</h3>
        <form action="{{ route('imposta.reparto.store') }}" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" id="sede_id" name="sede_id" value="{{ $sede->id }}">
            <div class="row">
                <div class="col-md-4 form-group mt-3 {{ $errors->has('nome_it') ? 'has-error' : '' }}">
                    <label for="nome_it" class="fw-bold"><i class="fi fi-it me-1"></i>Nome italiano:</label>
                    <input type="text" class="form-control" id="nome_it" name="nome_it" value="{{ old('nome_it') }}"
                        required>
                    @if ($errors->has('nome_it'))
                        <span class="text-danger">{{ $errors->first('nome_it') }}</span>
                    @endif
                </div>
                <div class="col-md-4 form-group mt-3 {{ $errors->has('nome_en') ? 'has-error' : '' }}">
                    <label for="nome_en" class="fw-bold"><i class="fi fi-en me-1"></i>Nome inglese:</label>
                    <input type="text" class="form-control" id="nome_en" name="nome_en" value="{{ old('nome_en') }}"
                        required>
                    @if ($errors->has('nome_en'))
                        <span class="text-danger">{{ $errors->first('nome_en') }}</span>
                    @endif
                </div>
                <div class="col-md-4 form-group mt-3 {{ $errors->has('nome_de') ? 'has-error' : '' }}">
                    <label for="nome_de" class="fw-bold"><i class="fi fi-de me-1"></i>Nome tedesco:</label>
                    <input type="text" class="form-control" id="nome_de" name="nome_de" value="{{ old('nome_de') }}"
                        required>
                    @if ($errors->has('nome_de'))
                        <span class="text-danger">{{ $errors->first('nome_de') }}</span>
                    @endif
                </div>
                <div class="col-md-4 form-group mt-3 {{ $errors->has('nome_fr') ? 'has-error' : '' }}">
                    <label for="nome_fr" class="fw-bold"><i class="fi fi-fr me-1"></i>Nome francese:</label>
                    <input type="text" class="form-control" id="nome_fr" name="nome_fr" value="{{ old('nome_fr') }}"
                        required>
                    @if ($errors->has('nome_fr'))
                        <span class="text-danger">{{ $errors->first('nome_fr') }}</span>
                    @endif
                </div>
                <div class="col-md-4 form-group mt-3 {{ $errors->has('nome_es') ? 'has-error' : '' }}">
                    <label for="nome_es" class="fw-bold"><i class="fi fi-es me-1"></i>Nome spagnolo:</label>
                    <input type="text" class="form-control" id="nome_es" name="nome_es" value="{{ old('nome_es') }}"
                        required>
                    @if ($errors->has('nome_es'))
                        <span class="text-danger">{{ $errors->first('nome_es') }}</span>
                    @endif
                </div>
                
            </div>
           
            
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Salva</button>
                <a href="{{ route('imposta.reparto.list',  $sede->id ) }}">
                    <button type="button" class="btn btn-secondary">Annulla</button>
                </a>
            </div>
        </form>
    </div>
@endsection
