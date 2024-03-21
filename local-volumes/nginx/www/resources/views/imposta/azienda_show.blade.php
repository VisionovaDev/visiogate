@extends('layouts.app')

@section('content')
    <div class="container mt-3 mb-3">
        <h3 class="fw-bold mb-3">Azienda</h3>


        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <h4 class="card-title">Dati azienda</h4>
                                        <p>Dati generali dell'azienda</p>
                                    </div>
                                    <div class="col-sm  text-end">
                                        <a href="{{ route('imposta.azienda.edit_dati', ['id' => $azienda->id]) }}">
                                            <button type="button" class="btn btn-success btn-sm">
                                                Modifica
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <p class="card-text border-bottom"><span class="fw-bold">Ragione soociale:</span>
                                {{ $azienda->nome }}</p>
                            <p class="card-text border-bottom"><span class="fw-bold">Indirizzo:</span>
                                {{ $azienda->indirizzo }}</p>
                            <p class="card-text border-bottom"><span class="fw-bold">Città:</span> {{ $azienda->citta }}</p>
                            <p class="card-text border-bottom"><span class="fw-bold">CAP:</span> {{ $azienda->cap }}</p>
                            <p class="card-text border-bottom"><span class="fw-bold">Provincia:</span>
                                {{ $azienda->provincia }}</p>
                            <p class="card-text border-bottom"><span class="fw-bold">Nazione:</span> {{ $azienda->nazione }}
                            </p>
                            <p class="card-text border-bottom"><span class="fw-bold">Sito Web:</span> <a
                                    href="{{ $azienda->sito }}" target="_blank">{{ $azienda->sito }}</a></p>
                            <p class="card-text border-bottom"><span class="fw-bold">Email:</span> {{ $azienda->email }}
                            </p>
                            <p class="card-text border-bottom"><span class="fw-bold">Telefono:</span>
                                {{ $azienda->telefono }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <h4 class="card-title">Logo azienda</h4>
                                        <p>Formato png o jpg dimensioni:300x200</p>
                                    </div>
                                    <div class="col-sm  text-end">
                                        <button type="button" class="btn btn-success btn-sm">Modifica</button>
                                    </div>
                                </div>
                            </div>

                            @if ($azienda->logo_file_path)
                                <img src="{{ asset($azienda->logo_file_path) }}" alt="Logo Azienda" class="img-fluid">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-sm">
                        <div class="card border-0 shadow-lg">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm">
                                            <h4 class="card-title">Privacy</h4>
                                            <p>Informative privacy dell'azienda</p>
                                        </div>
                                        <div class="col-sm  text-end">
                                            <a href="{{ route('imposta.azienda.edit_privacy', ['id' => $azienda->id]) }}">
                                                <button type="button" class="btn btn-success btn-sm">
                                                    Modifica
                                                </button>
                                            </a>

                                            
                                        </div>
                                    </div>
                                </div>

                                <!-- Tabs per le diverse lingue della privacy -->
                                <div class="mb-10">
                                    <ul class="nav nav-tabs mt-3" id="privacyTab" role="tablist">
                                        @foreach (['it' => 'Italiano', 'en' => 'Inglese', 'de' => 'Tedesco', 'fr' => 'Francese', 'es' => 'Spagnolo'] as $lang => $label)
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link{{ $loop->first ? ' active' : '' }}"
                                                    id="{{ $lang }}-tab" data-bs-toggle="tab"
                                                    data-bs-target="#{{ $lang }}" type="button" role="tab"
                                                    aria-controls="{{ $lang }}"
                                                    aria-selected="{{ $loop->first ? 'true' : 'false' }}"><span
                                                        class="fi fi-{{ $lang }}"></span>&nbsp;{{ $label }}</button>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content mt-3" id="privacyTabContent">
                                        @foreach (['it', 'en', 'de', 'fr', 'es'] as $lang)
                                            <div class="tab-pane overflow-auto fade{{ $loop->first ? ' show active' : '' }}"
                                                style="max-height: 500px;"
                                                id="{{ $lang }}" role="tabpanel"
                                                aria-labelledby="{{ $lang }}-tab">

                                                {!! $azienda->{'privacy_' . $lang} !!}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>


    </div>
@endsection
