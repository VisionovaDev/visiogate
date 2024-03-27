@extends('layouts.app')


@section('content')
    <div class="container mt-3 mb-3">
        <h3 class="fw-bold mb-3">Sedi</h3>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm text-end">
                                        <a href="{{ route('imposta.sede.add') }}">
                                            <button type="button" class="btn btn-success btn-sm">
                                                Aggiungi
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Indirizzo</th>
                                        <th scope="col">Citta</th>
                                        <th scope="col">CAP</th>
                                        <th scope="col">Prov.</th>
                                        <th scope="col">Nazione</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">{{-- Modifica --}}</th>
                                        <th scope="col">{{-- Cancella --}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sedi as $sede)
                                        <tr>
                                            <td><a class="text-decoration-none"
                                                    href="{{ route('imposta.sede.show', ['id' => $sede->id]) }}">
                                                    {{ $sede->nome }}</a></td>
                                            <td><a class="text-decoration-none"
                                                    href="{{ route('imposta.sede.show', ['id' => $sede->id]) }}">
                                                    {{ $sede->indirizzo }}</a></td>
                                            <td><a class="text-decoration-none"
                                                    href="{{ route('imposta.sede.show', ['id' => $sede->id]) }}">
                                                    {{ $sede->citta }}</a></td>
                                            <td><a class="text-decoration-none"
                                                    href="{{ route('imposta.sede.show', ['id' => $sede->id]) }}">
                                                    {{ $sede->cap }}</a></td>
                                            <td><a class="text-decoration-none"
                                                    href="{{ route('imposta.sede.show', ['id' => $sede->id]) }}">
                                                    {{ $sede->provincia }}</a></td>
                                            <td><a class="text-decoration-none"
                                                    href="{{ route('imposta.sede.show', ['id' => $sede->id]) }}">
                                                    {{ $sede->nazione }}</a></td>
                                            <td><a class="text-decoration-none"
                                                    href="{{ route('imposta.sede.show', ['id' => $sede->id]) }}">
                                                    {{ $sede->telefono }}</a></td>
                                            <td> <a href="{{ route('imposta.sede.edit', ['id' => $sede->id]) }}"><i
                                                        class="bi bi-pencil-square" style="cursor: pointer;"></i></a></td>
                                            <td>
                                                @if (count($sedi) > 1)
                                                    <i class="bi bi-trash" style="cursor: pointer;" data-bs-toggle="modal"
                                                        data-bs-target="#dlg_conferma_cancellazione_sede_{{ $sede->id }}"></i>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

{{-- inserisco i dialog a popup --}}

@section('before_body_close')
    <!-- Modal richiesta conferma cancellazione sede-->
    @foreach ($sedi as $sede)
        <div class="modal fade" id="dlg_conferma_cancellazione_sede_{{ $sede->id }}" tabindex="-1"
            aria-labelledby="dlg_conferma_cancellazione_sedeLabel_{{ $sede->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dlg_conferma_cancellazione_sedeLabel_{{ $sede->id }}">Conferma
                            Cancellazione</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                    </div>
                    <div class="modal-body">
                        Confermi la cancellazione della sede <strong>{{ $sede->nome }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <form action="{{ route('imposta.sede.delete', ['id' => $sede->id]) }}" method="POST">
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
