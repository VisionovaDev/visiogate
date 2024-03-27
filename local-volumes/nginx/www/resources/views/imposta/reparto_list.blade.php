@extends('layouts.app')


@section('content')
    <div class="container mt-3 mb-3">
        <h3 class="fw-bold mb-3">Reparti</h3>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <!-- inizio elenco reparti per ogni sede  -->
                    @foreach ($sedi as $sede)
                        <div class="card border-0 shadow-lg mb-5">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm">
                                            <h4 class="card-title">Reparti della sede: <a class="text-decoration-none" href="{{ route('imposta.sede.show', $sede->id) }}">{{ $sede->nome }}</a></h4>
                                        </div>
                                        <div class="col-sm text-end">
                                            <a href="{{ route('imposta.reparto.add', $sede->id) }}">
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
                                            <th scope="col"><i class="fi fi-it me-1"></i>Nome it</th>
                                            <th scope="col"><i class="fi fi-en me-1"></i>Nome en</th>
                                            <th scope="col"><i class="fi fi-de me-1"></i>Nome de</th>
                                            <th scope="col"><i class="fi fi-fr me-1"></i>Nome fr</th>
                                            <th scope="col"><i class="fi fi-es me-1"></i>Nome es</th>
                                            <th scope="col"><!-- Modifica --></th>
                                            <th scope="col"><!-- Cancella --></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sede->reparti as $reparto)
                                            <tr>
                                                <td>{{ $reparto->nome_it }}</td>
                                                <td>{{ $reparto->nome_en }}</td>
                                                <td>{{ $reparto->nome_de }}</td>
                                                <td>{{ $reparto->nome_fr }}</td>
                                                <td>{{ $reparto->nome_es }}</td>
                                                <td><a class="text-decoration-none"
                                                    href="{{ route('imposta.reparto.edit', ['id' => $reparto->id]) }}"><i
                                                        class="bi bi-pencil-square" style="cursor: pointer;"></i></a>
                                                  </td>
                                                <td>
                                                    @if (count($sede->reparti) > 1)
                                                        <i class="bi bi-trash" style="cursor: pointer;"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#dlg_conferma_cancellazione_reparto_{{ $reparto->id }}"></i>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    @endforeach
                    <!-- fine elenco reparti  -->

                </div>

            </div>
        </div>
    </div>
@endsection

{{-- inserisco i dialog a popup --}}

@section('before_body_close')
    <!-- Modal richiesta conferma cancellazione reparto -->
    @foreach ($sede->varchi as $varco)
        <div class="modal fade" id="dlg_conferma_cancellazione_reparto_{{ $reparto->id }}" tabindex="-1"
            aria-labelledby="dlg_conferma_cancellazione_reparto_Label_{{ $reparto->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dlg_conferma_cancellazione_reparto_Label_{{ $reparto->id }}">Conferma
                            Cancellazione</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                    </div>
                    <div class="modal-body">
                        Confermi la cancellazione del reparto <strong>{{ $reparto->nome_it }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <form action="{{ route('imposta.reparto.delete', ['id' => $reparto->id]) }}" method="POST">
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
