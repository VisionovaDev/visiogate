@extends('layouts.app')


@section('content')
    <div class="container">
        <h3 class="fw-bold mb-3 mt-3">Aggiunta persona:</h3>
        <form action="{{ route('imposta.persona.store') }}" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" id="reparto_id" name="reparto_id" value="{{ $reparto->id }}">
            <div class="row">
                <div class="col-md-4 form-group mt-3 {{ $errors->has('nome') ? 'has-error' : '' }}">
                    <label for="nome" class="fw-bold">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome"
                        value="{{ old('nome') }}" required>
                    @if ($errors->has('nome'))
                        <span class="text-danger">{{ $errors->first('nome') }}</span>
                    @endif
                </div>
                <div class="col-md-4 form-group mt-3 {{ $errors->has('cognome') ? 'has-error' : '' }}">
                    <label for="cognome" class="fw-bold">Cognome:</label>
                    <input type="text" class="form-control" id="cognome" name="cognome"
                        value="{{ old('cognome') }}" required>
                    @if ($errors->has('cognome'))
                        <span class="text-danger">{{ $errors->first('cognome') }}</span>
                    @endif
                </div>
                <div class="col-md-4 form-group mt-3 {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email" class="fw-bold">Email:</label>
                    <input type="text" class="form-control" id="email" name="email"
                        value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group mt-3 {{ $errors->has('interno') ? 'has-error' : '' }}">
                    <label for="interno" class="fw-bold">Interno:</label>
                    <input type="text" class="form-control" id="interno" name="interno"
                        value="{{ old('interno') }}">
                    @if ($errors->has('interno'))
                        <span class="text-danger">{{ $errors->first('interno') }}</span>
                    @endif
                </div>
                <div class="col-md-4 form-group mt-3 {{ $errors->has('telefono') ? 'has-error' : '' }}">
                    <label for="telefono" class="fw-bold">Telefono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono"
                        value="{{ old('telefono') }}">
                    @if ($errors->has('telefono'))
                        <span class="text-danger">{{ $errors->first('telefono') }}</span>
                    @endif
                </div>
                <div class="col-md-4 form-group mt-3 {{ $errors->has('reparto_id') ? 'has-error' : '' }}">
                    <div class="mb-3">
                        <label for="reparto_id" class="fw-bold">Reparto:</label>
                        <select class="form-select form-control" id="reparto_id" name="reparto_id">
                            @foreach ($reparto->sede->reparti as $reparto_sede)
                                <option value="{{ $reparto_sede->id }}"  @if ($reparto_sede->id == $reparto->id ) SELECTED  @endif >
                                     {{ $reparto_sede->nome_it }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('reparto_id'))
                        <span class="text-danger">{{ $errors->first('reparto_id') }}</span>
                    @endif
                </div>
            </div>
            <div class="row">

                <div class="col-md-4 form-group mt-3 {{ $errors->has('accetta_visite') ? 'has-error' : '' }}">
                    <!-- Inizio Toggle per is_email_entrata_abilitata -->
                    <div class="mb-3 mt-3">
                        <div class="form-check form-switch">
                            <input type="hidden" name="accetta_visite" value="0">
                            <input class="form-check-input" type="checkbox" role="switch" id="accetta_visite"
                                name="accetta_visite" value="1"
                                {{ old('accetta_visite') ? 'checked' : '' }}>
                            <label class="form-check-label" for="accetta_visite">Accetta visite</label>
                        </div>
                    </div>
                    <!-- Fine Toggle per is_email_entrata_abilitata -->
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Salva</button>
                <a href="{{ route('imposta.persona.list') }}">
                    <button type="button" class="btn btn-secondary">Annulla</button>
                </a>
            </div>
        </form>
    </div>
@endsection
