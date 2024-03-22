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
                            {{ $azienda->nome }}
                        </p>
                        <p class="card-text border-bottom"><span class="fw-bold">Indirizzo:</span>
                            {{ $azienda->indirizzo }}
                        </p>
                        <p class="card-text border-bottom"><span class="fw-bold">Città:</span> {{ $azienda->citta }}</p>
                        <p class="card-text border-bottom"><span class="fw-bold">CAP:</span> {{ $azienda->cap }}</p>
                        <p class="card-text border-bottom"><span class="fw-bold">Provincia:</span>
                            {{ $azienda->provincia }}
                        </p>
                        <p class="card-text border-bottom"><span class="fw-bold">Nazione:</span> {{ $azienda->nazione }}
                        </p>
                        <p class="card-text border-bottom"><span class="fw-bold">Sito Web:</span> <a href="{{ $azienda->sito }}" target="_blank">{{ $azienda->sito }}</a></p>
                        <p class="card-text border-bottom"><span class="fw-bold">Email:</span> {{ $azienda->email }}
                        </p>
                        <p class="card-text border-bottom"><span class="fw-bold">Telefono:</span>
                            {{ $azienda->telefono }}
                        </p>
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
                                    <p>Formato png o jpg dimensioni:200x100</p>
                                </div>
                                <div class="col-sm  text-end">
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#dlg_carica_logo">
                                        Modifica</button>
                                </div>
                            </div>
                        </div>

                        @if ($azienda->LogoFilePath)
                        <img src="{{ asset($azienda->LogoFilePath) }}" alt="Logo Azienda" class="img-fluid">
                        @endif
                    </div>
                </div>
                {{-- inizio elenco sedi --}}
                <div class="card border-0 shadow-lg mt-3">
                    <div class="card-body">
                        <h4 class="card-title">Sedi azienda</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Indirizzo</th>
                                    <th scope="col">Citta</th>
                                    <th scope="col">CAP</th>
                                    <th scope="col">Prov.</th>
                                    <th scope="col">Nazine</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">{{-- Modifica --}}</th>
                                    <th scope="col">{{-- Cancella --}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sedi as $sede)
                                <tr>
                                    <td>{{ $sede->nome }}</td>
                                    <td>{{ $sede->indirizzo }}</td>
                                    <td>{{ $sede->citta }}</td>
                                    <td>{{ $sede->cap }}</td>
                                    <td>{{ $sede->provincia }}</td>
                                    <td>{{ $sede->nazione}}</td>
                                    <td>{{ $sede->telefono }}</td>
                                    <td> <a href="{{ route('imposta.sede.edit', ['id' => $sede->id]) }}"><i class="bi bi-pencil-square" style="cursor: pointer;"></i></a></td>
                                    <td>@if(count($sedi) > 1)
                                        <i class="bi bi-trash" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#dlg_conferma_cancellazione_sede_{{ $sede->id }}"></i>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm text-end">
                                    <a href="{{ route('imposta.sede.add' ) }}">
                                        <button type="button" class="btn btn-success btn-sm">
                                            Aggiungi
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- fine elenco  sedi --}}
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
                                        <button class="nav-link{{ $loop->first ? ' active' : '' }}" id="{{ $lang }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $lang }}" type="button" role="tab" aria-controls="{{ $lang }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}"><span class="fi fi-{{ $lang }}"></span>&nbsp;{{ $label }}</button>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content mt-3" id="privacyTabContent">
                                    @foreach (['it', 'en', 'de', 'fr', 'es'] as $lang)
                                    <div class="tab-pane overflow-auto fade{{ $loop->first ? ' show active' : '' }}" style="max-height: 500px;" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}-tab">

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

{{-- inserisco i dialog a popup --}}
@section('before_body_close')
<!-- Modal per il caricamento del logo -->
<div class="modal fade" id="dlg_carica_logo" tabindex="-1" aria-labelledby="dlg_carica_logoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dlg_carica_logoModalLabel">Form di Dialogo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Annulla"></button>
            </div>
            <form action="{{ route('imposta.azienda.update_logo', ['id' => $azienda->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Seleziona il logo da inserire</label>
                        <input type="file" class="form-control" name="image" id="image" accept=".png, .jpg, .jpeg">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Inserisci Logo</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal richiesta conferma cancellazione sede-->
@foreach ($sedi as $sede)
<div class="modal fade" id="dlg_conferma_cancellazione_sede_{{ $sede->id }}" tabindex="-1" aria-labelledby="dlg_conferma_cancellazione_sedeLabel_{{ $sede->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dlg_conferma_cancellazione_sedeLabel_{{ $sede->id }}">Conferma Cancellazione</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                Confermi la cancellazione della sede <strong>{{ $sede->nome }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{route('imposta.sede.delete', ['id' => $sede->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Conferma</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection