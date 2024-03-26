@extends('layouts.app')


@section('content')
    <div class="container mt-3 mb-3">
        <h3 class="fw-bold mb-3">Varco</h3>
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
                                        <a href="{{ route('imposta.varco.edit', ['id' => $varco->id]) }}">
                                            <button type="button" class="btn btn-success btn-sm">
                                                Modifica
                                            </button>
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <p class="card-text border-bottom"><span class="fw-bold">Nome sede:</span>
                                <a class="text-decoration-none"
                                    href="{{ route('imposta.sede.show', ['id' => $varco->sede->id]) }}">{{ $varco->sede->nome }}</a>

                            </p>

                            <p class="card-text border-bottom"><span class="fw-bold">Nome varco:</span>
                                {{ $varco->nome }}
                            </p>
                            <p class="card-text border-bottom"><span class="fw-bold">E' una entrata:</span>
                                @if ($varco->is_entrata)
                                    Sì
                                @else
                                    No
                                @endif
                                </a>
                                </td>
                            </p>
                            <p class="card-text border-bottom"><span class="fw-bold">E' una uscita:</span>
                                @if ($varco->is_uscita)
                                    Sì
                                @else
                                    No
                                @endif
                                </a></td>
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-sm">

                    <!-- inizio elenco codicin QR -->
                    <div class="card border-0 shadow-lg">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <h4 class="card-title">Link di registrazione</h4>
                                    </div>
                                    <div class="col-sm text-end">
                                        <a href="{{ route('imposta.linktransito.add', $varco->id) }}">
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
                                        <th scope="col">Codice</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Abilitato</th>
                                        <th scope="col"><!-- Modifica --></th>
                                        <th scope="col"><!-- Cancella --></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($varco->links as $link)
                                        <tr>
                                            <td>{{ $link->codice }}</td>
                                            <td>{{ $link->LinkCompleto }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="is_abilitato_{{ $link->id }}"
                                                        hx-get="{{ route('imposta.linktransito.is_abilitato_toggle', ['id' => $link->id]) }}"
                                                        hx-trigger="change" hx-target="#is_abilitato_{{ $link->id }}"
                                                        hx-swap="outerHTML" {{ $link->is_abilitato ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td>
                                                @if (count($varco->links) > 1)
                                                    <i class="bi bi-trash" style="cursor: pointer;" data-bs-toggle="modal"
                                                        data-bs-target="#dlg_conferma_cancellazione_link_{{ $link->id }}"></i>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    <!-- fine elenco codici QR -->

                </div>

            </div>
        </div>


    </div>
@endsection

{{-- inserisco i dialog a popup --}}
@section('before_body_close')
    <!-- Modal richiesta conferma cancellazione codice QR -->

    @foreach ($varco->links as $link)
        <div class="modal fade" id="dlg_conferma_cancellazione_link_{{ $link->id }}" tabindex="-1"
            aria-labelledby="dlg_conferma_cancellazione_link_Label_{{ $link->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dlg_conferma_cancellazione_link_Label_{{ $link->id }}">Conferma
                            Cancellazione</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                    </div>
                    <div class="modal-body">
                        Confermi la cancellazione del codice <strong>{{ $link->codice }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <form action="{{ route('imposta.linktransito.delete', ['id' => $link->id]) }}" method="POST">
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
