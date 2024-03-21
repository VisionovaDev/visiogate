@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="fw-bold mb-3">Modifica Privacy Azienda</h3>
        <form action="{{ route('imposta.azienda.edit_privacy', ['id' => $azienda->id]) }}" method="POST">
            @csrf
            @method('PUT')

            @foreach (['it' => 'Italiano', 'en' => 'Inglese', 'de' => 'Tedesco', 'fr' => 'Francese', 'es' => 'Spagnolo'] as $lang => $label)
                <div class="form-group mt-3">
                    <label for="privacy_{{ $lang }}" class="fw-bold"><span class="fi fi-{{ $lang }}"></span>&nbsp; {{ $label }}:</label>
                    <input type="text" class="form-control" id="privacy_{{ $lang }}" name="privacy_{{ $lang }}"
                        value="{{ old('privacy_' . $lang,$azienda->{'privacy_' . $lang} ) }}" required>
                    @if ($errors->has('privacy_{{ $lang }}'))
                        <span class="text-danger">{{ $errors->first('privacy_' . $lang) }}</span>
                    @endif
                </div>
            @endforeach

            <!-- Aggiungi qui gli altri campi del form seguendo lo stesso schema -->
            <div class="mt-3">                
                <a href="{{ route('imposta.azienda.update_privacy', ['id' => $azienda->id]) }}">
                <button type="submit" class="btn btn-primary">Salva</button>
                </a>
                <a href="{{ route('imposta.azienda.show', ['id' => $azienda->id]) }}">
                    <button type="button" class="btn btn-secondary">Annulla</button>
                </a>
            </div>
        </form>
    </div>
@endsection
