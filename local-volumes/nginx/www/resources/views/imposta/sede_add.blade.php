@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="fw-bold mb-3">Aggiunge sede</h3>

    <form action="{{ route('imposta.sede.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group mt-33 {{ $errors->has('nome') ? 'has-error' : '' }}">
            <label for="nome" class="fw-bold">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
            @if ($errors->has('nome'))
            <span class="text-danger">{{ $errors->first('nome') }}</span>
            @endif
        </div>

        <div class="form-group mt-33 {{ $errors->has('indirizzo') ? 'has-error' : '' }}">
            <label for="indirizzo" class="fw-bold">Indirizzo:</label>
            <input type="text" class="form-control" id="indirizzo" name="indirizzo" value="{{ old('indirizzo') }}" required>
            @if ($errors->has('indirizzo'))
            <span class="text-danger">{{ $errors->first('indirizzo') }}</span>
            @endif
        </div>

        <div class="form-group mt-33 {{ $errors->has('citta') ? 'has-error' : '' }}">
            <label for="citta" class="fw-bold">Citta:</label>
            <input type="text" class="form-control" id="citta" name="citta" value="{{ old('citta') }}" required>
            @if ($errors->has('citta'))
            <span class="text-danger">{{ $errors->first('citta') }}</span>
            @endif
        </div>

        <div class="form-group mt-33 {{ $errors->has('cap') ? 'has-error' : '' }}">
            <label for="cap" class="fw-bold">CAP:</label>
            <input type="text" class="form-control" id="cap" name="cap" value="{{ old('cap') }}" required>
            @if ($errors->has('cap'))
            <span class="text-danger">{{ $errors->first('cap') }}</span>
            @endif
        </div>

        <div class="form-group mt-33 {{ $errors->has('provincia') ? 'has-error' : '' }}">
            <label for="provincia" class="fw-bold">Provincia:</label>
            <input type="text" class="form-control" id="provincia" name="provincia" maxlength="2" value="{{ old('provincia') }}" required>
            @if ($errors->has('provincia'))
            <span class="text-danger">{{ $errors->first('provincia') }}</span>
            @endif
        </div>

        <div class="form-group mt-33 {{ $errors->has('nazione') ? 'has-error' : '' }}">
            <label for="nazione" class="fw-bold">Nazione:</label>
            <input type="text" class="form-control" id="nazione" name="nazione" value="{{ old('nazione') }}" required>
            @if ($errors->has('nazione'))
            <span class="text-danger">{{ $errors->first('nazione') }}</span>
            @endif
        </div>

        <div class="form-group mt-33 {{ $errors->has('telefono') ? 'has-error' : '' }}">
            <label for="telefono" class="fw-bold">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
            @if ($errors->has('telefono'))
            <span class="text-danger">{{ $errors->first('telefono') }}</span>
            @endif
        </div>

        <div class="mt-3">
            <a href="{{ route('imposta.sede.store') }}">
                <button type="submit" class="btn btn-primary">Salva</button>
            </a>

            <a href="{{ route('imposta.azienda.show') }}">
                <button type="button" class="btn btn-secondary">Annulla</button>
            </a>
        </div>
    </form>

</div>
@endsection
