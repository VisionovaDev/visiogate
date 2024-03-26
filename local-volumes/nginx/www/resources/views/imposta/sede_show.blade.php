@extends('layouts.app')


@section('content')
    <div class="container mt-3 mb-3">
        <h3 class="fw-bold mb-3">Sede</h3>
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

                                    <div class="col-sm  text-end">
                                        <a href="{{ route('imposta.sede.edit', ['id' => $sede->id]) }}">
                                            <button type="button" class="btn btn-success btn-sm">
                                                Modifica
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <p class="card-text border-bottom"><span class="fw-bold">Ragione soociale:</span>
                                {{ $sede->nome }}
                            </p>
                            <p class="card-text border-bottom"><span class="fw-bold">Indirizzo:</span>
                                {{ $sede->indirizzo }}
                            </p>
                            <p class="card-text border-bottom"><span class="fw-bold">Città:</span> {{ $sede->citta }}</p>
                            <p class="card-text border-bottom"><span class="fw-bold">CAP:</span> {{ $sede->cap }}</p>
                            <p class="card-text border-bottom"><span class="fw-bold">Provincia:</span>
                                {{ $sede->provincia }}
                            </p>
                            <p class="card-text border-bottom"><span class="fw-bold">Nazione:</span> {{ $sede->nazione }}
                            </p>
                            <p class="card-text border-bottom"><span class="fw-bold">Telefono:</span>
                                {{ $sede->telefono }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">

                    <!-- inizio elenco varchi -->
                    <div class="card border-0 shadow-lg">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <h4 class="card-title">Varchi sede</h4>
                                    </div>
                                    <div class="col-sm text-end">
                                        <a href="{{ route('imposta.varco.add', $sede->id) }}">
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
                                        <th scope="col">Entrata</th>
                                        <th scope="col">Uscita</th>
                                        <th scope="col"><!-- Modifica --></th>
                                        <th scope="col"><!-- Cancella --></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sede->varchi as $varco)
                                        <tr>
                                            <td><a class="text-decoration-none"
                                                    href="{{ route('imposta.varco.show', ['id' => $varco->id]) }}">{{ $varco->nome }}</a>
                                            </td>
                                            <td><a class="text-decoration-none"
                                                    href="{{ route('imposta.varco.show', ['id' => $varco->id]) }}">
                                                    @if ($varco->is_entrata)
                                                        Sì
                                                    @else
                                                        No
                                                    @endif
                                                </a></td>
                                            <td><a class="text-decoration-none"
                                                    href="{{ route('imposta.varco.show', ['id' => $varco->id]) }}">
                                                    @if ($varco->is_uscita)
                                                        Sì
                                                    @else
                                                        No
                                                    @endif
                                                </a></td>
                                            <td><a class="text-decoration-none"
                                                    href="{{ route('imposta.varco.edit', ['id' => $varco->id]) }}"><i
                                                        class="bi bi-pencil-square" style="cursor: pointer;"></i></a></td>
                                            <td>
                                                @if (count($sede->varchi) > 1)
                                                    <i class="bi bi-trash" style="cursor: pointer;" data-bs-toggle="modal"
                                                        data-bs-target="#dlg_conferma_cancellazione_sede_{{ $varco->id }}"></i>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- fine elenco varchi -->

                </div>

            </div>
        </div>


    </div>
@endsection

{{-- inserisco i dialog a popup --}}
@section('before_body_close')
    <!-- Modal richiesta conferma cancellazione sede-->
    @foreach ($sede->varchi as $varco)
        <div class="modal fade" id="dlg_conferma_cancellazione_sede_{{ $varco->id }}" tabindex="-1"
            aria-labelledby="dlg_conferma_cancellazione_sedeLabel_{{ $varco->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dlg_conferma_cancellazione_sedeLabel_{{ $varco->id }}">Conferma
                            Cancellazione</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                    </div>
                    <div class="modal-body">
                        Confermi la cancellazione del varco <strong>{{ $varco->nome }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <form action="{{ route('imposta.varco.delete', ['id' => $varco->id]) }}" method="POST">
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
