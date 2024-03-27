@extends('layouts.app')


@section('content')
    <div class="container mt-3 mb-3">
        <h3 class="fw-bold mb-3">Persone</h3>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container">
            @foreach ($sedi as $sede)
                <div class="row">
                    <div class="col-sm">
                        <h5>Sede {{ $sede->nome }}</h5>
                        @foreach ($sede->reparti as $reparto)
                            <div class="card border-0 shadow-lg mb-5">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm text-end">
                                                <a href="{{ route('imposta.persona.add', $reparto->id) }}">
                                                    <button type="button" class="btn btn-success btn-sm">
                                                        Aggiungi
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm">
                                            <h5>Persone del reparto {{ $reparto->nome_it }} di
                                                {{ $reparto->sede->nome }}</h5>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">Cognome</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Interno</th>
                                                    <th scope="col">Telefono</th>
                                                    <th scope="col">Accetta visite</th>
                                                    <th scope="col">{{-- Modifica --}}</th>
                                                    <th scope="col">{{-- Cancella --}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($reparto->persone as $persona)
                                                    <tr>
                                                        <td>{{ $persona->nome }}</td>
                                                        <td>{{ $persona->cognome }}</td>
                                                        <td>{{ $persona->email }}</td>
                                                        <td>{{ $persona->interno }}</td>
                                                        <td>{{ $persona->telefono }}</td>
                                                        <td>
                                                            @if ($persona->accetta_visite)
                                                                Sì
                                                            @else
                                                                No
                                                            @endif
                                                        </td>

                                                        <td> <a
                                                                href="{{ route('imposta.persona.edit', ['id' => $persona->id]) }}"><i
                                                                    class="bi bi-pencil-square"
                                                                    style="cursor: pointer;"></i></a></td>
                                                        <td>
                                                            <i class="bi bi-trash" style="cursor: pointer;"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#dlg_conferma_cancellazione_persona_{{ $persona->id }}"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

{{-- inserisco i dialog a popup --}}

@section('before_body_close')
    <!-- Modal richiesta conferma cancellazione persona -->
    @foreach ($sedi as $sede)
        @foreach ($sede->reparti as $reparto)
            @foreach ($reparto->persone as $persona)
                <div class="modal fade" id="dlg_conferma_cancellazione_persona_{{ $persona->id }}" tabindex="-1"
                    aria-labelledby="dlg_conferma_cancellazione_persona_Label_{{ $persona->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="dlg_conferma_cancellazione_persona_Label_{{ $persona->id }}">
                                    Conferma
                                    Cancellazione</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Chiudi"></button>
                            </div>
                            <div class="modal-body">
                                Confermi la cancellazione di <strong>{{ $persona->nome }} {{ $persona->congnome }} dal
                                    reparto
                                    {{ $reparto->nome_it }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                <form action="{{ route('imposta.persona.delete', ['id' => $persona->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Conferma</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    @endforeach
@endsection
