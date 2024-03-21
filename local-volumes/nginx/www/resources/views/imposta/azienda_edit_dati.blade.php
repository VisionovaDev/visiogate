@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="fw-bold mb-3">Modifica dati anagrafici</h3>
        <form action="{{ route('imposta.azienda.edit_dati', ['id' => $azienda->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mt-3">
                <label for="nome" class="fw-bold">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome"
                    value="{{ old('nome', $azienda->nome) }}" required>
                @if ($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
            </div>

            <div class="form-group mt-3">
                <label for="indirizzo" class="fw-bold">Indirizzo:</label>
                <input type="text" class="form-control" id="indirizzo" name="indirizzo"
                    value="{{ old('indirizzo', $azienda->indirizzo) }}" required>
                @if ($errors->has('indirizzo'))
                    <span class="text-danger">{{ $errors->first('indirizzo') }}</span>
                @endif
            </div>

            <div class="form-group mt-3">
                <label for="citta" class="fw-bold">Citta:</label>
                <input type="text" class="form-control" id="citta" name="citta"
                    value="{{ old('citta', $azienda->citta) }}" required>
                @if ($errors->has('citta'))
                    <span class="text-danger">{{ $errors->first('citta') }}</span>
                @endif
            </div>

            <div class="form-group mt-3">
                <label for="cap" class="fw-bold">CAP:</label>
                <input type="text" class="form-control" id="cap" name="cap"
                    value="{{ old('cap', $azienda->cap) }}" required>
                @if ($errors->has('cap'))
                    <span class="text-danger">{{ $errors->first('cap') }}</span>
                @endif
            </div>

            <div class="form-group mt-3">
                <label for="provincia" class="fw-bold">Provincia:</label>
                <input type="text" class="form-control" id="provincia" name="provincia" maxlength="2"
                    value="{{ old('provincia', $azienda->provincia) }}" required>
                @if ($errors->has('provincia'))
                    <span class="text-danger">{{ $errors->first('provincia') }}</span>
                @endif
            </div>

            <div class="form-group mt-3">
                <label for="nazione" class="fw-bold">Nazione:</label>
                <input type="text" class="form-control" id="nazione" name="nazione"
                    value="{{ old('nazione', $azienda->nazione) }}" required>
                @if ($errors->has('nazione'))
                    <span class="text-danger">{{ $errors->first('nazione') }}</span>
                @endif
            </div>


            <div class="form-group mt-3">
                <label for="email" class="fw-bold">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $azienda->email) }}" required>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group mt-3">
                <label for="telefono" class="fw-bold">Telefono</label>
                <input type="text" class="form-control" id="telefono" name="telefono"
                    value="{{ old('telefono', $azienda->telefono) }}" required>
                @if ($errors->has('telefono'))
                    <span class="text-danger">{{ $errors->first('telefono') }}</span>
                @endif
            </div>

            <div class="form-group mt-3">
                <label for="sito" class="fw-bold">Sito Web</label>
                <input type="url" class="form-control" id="sito" name="sito"
                    value="{{ old('sito', $azienda->sito) }}" required>
                @if ($errors->has('sito'))
                    <span class="text-danger">{{ $errors->first('sito') }}</span>
                @endif
            </div>

            <!-- Aggiungi qui gli altri campi del form seguendo lo stesso schema -->
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Salva</button>
                <a href="{{ route('imposta.azienda.show', ['id' => $azienda->id]) }}">
                    <button type="button" class="btn btn-secondary">Annulla</button>
                </a>
            </div>
        </form>
    </div>
@endsection
