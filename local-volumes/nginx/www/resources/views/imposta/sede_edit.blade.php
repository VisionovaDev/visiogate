@extends('layouts.app')

@section('before_head_close')
    {{-- Inizio per l'CKEditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <style>
        .ck-editor__editable {
            min-height: 300px;
            max-height: 500px;
        }
    </style>
    {{-- Fine per l'CKEditor --}}
@endsection

@section('before_body_close')
    <script>
        const toolbar_opt = {
            items: [
                'heading', '|',
                'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                'outdent', 'indent', '|',
                'blockQuote', 'insertTable', 'undo', 'redo'

            ]
        };

        const lingue = ['it', 'en', 'de', 'fr', 'es'];

        lingue.forEach(function(lingua) {
            ClassicEditor
                .create(document.querySelector('#msg_email_entrata_' + lingua), {
                    toolbar: toolbar_opt,
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('#msg_email_uscita_' + lingua), {
                    toolbar: toolbar_opt,
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('#regolamento_' + lingua), {
                    toolbar: toolbar_opt,
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <h3 class="fw-bold mb-3">Modifica dati sede</h3>
        <form action="{{ route('imposta.sede.update', ['id' => $sede->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4 form-group mt-3 {{ $errors->has('nome') ? 'has-error' : '' }}">
                    <label for="nome" class="fw-bold">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome"
                        value="{{ old('nome', $sede->nome) }}" required>
                    @if ($errors->has('nome'))
                        <span class="text-danger">{{ $errors->first('nome') }}</span>
                    @endif
                </div>

                <div class="col-md-4 form-group mt-3 {{ $errors->has('indirizzo') ? 'has-error' : '' }}">
                    <label for="indirizzo" class="fw-bold">Indirizzo:</label>
                    <input type="text" class="form-control" id="indirizzo" name="indirizzo"
                        value="{{ old('indirizzo', $sede->indirizzo) }}" required>
                    @if ($errors->has('indirizzo'))
                        <span class="text-danger">{{ $errors->first('indirizzo') }}</span>
                    @endif
                </div>

                <div class="col-md-4 form-group mt-3 {{ $errors->has('citta') ? 'has-error' : '' }}">
                    <label for="citta" class="fw-bold">Citta:</label>
                    <input type="text" class="form-control" id="citta" name="citta"
                        value="{{ old('citta', $sede->citta) }}" required>
                    @if ($errors->has('citta'))
                        <span class="text-danger">{{ $errors->first('citta') }}</span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group mt-3 {{ $errors->has('cap') ? 'has-error' : '' }}">
                    <label for="cap" class="fw-bold">CAP:</label>
                    <input type="text" class="form-control" id="cap" name="cap"
                        value="{{ old('cap', $sede->cap) }}" required>
                    @if ($errors->has('cap'))
                        <span class="text-danger">{{ $errors->first('cap') }}</span>
                    @endif
                </div>

                <div class="col-md-4 form-group mt-3 {{ $errors->has('provincia') ? 'has-error' : '' }}">
                    <label for="provincia" class="fw-bold">Provincia:</label>
                    <input type="text" class="form-control" id="provincia" name="provincia" maxlength="2"
                        value="{{ old('provincia', $sede->provincia) }}" required>
                    @if ($errors->has('provincia'))
                        <span class="text-danger">{{ $errors->first('provincia') }}</span>
                    @endif
                </div>

                <div class="col-md-4 form-group mt-3 {{ $errors->has('nazione') ? 'has-error' : '' }}">
                    <label for="nazione" class="fw-bold">Nazione:</label>
                    <input type="text" class="form-control" id="nazione" name="nazione"
                        value="{{ old('nazione', $sede->nazione) }}" required>
                    @if ($errors->has('nazione'))
                        <span class="text-danger">{{ $errors->first('nazione') }}</span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group mt-3 {{ $errors->has('telefono') ? 'has-error' : '' }}">
                    <label for="telefono" class="fw-bold">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono"
                        value="{{ old('telefono', $sede->telefono) }}" required>
                    @if ($errors->has('telefono'))
                        <span class="text-danger">{{ $errors->first('telefono') }}</span>
                    @endif
                </div>
            </div>



            {{-- inizio gestione email in ingresso --}}
            <!-- Inizio Toggle per is_email_entrata_abilitata -->
            <div class="mb-3 mt-3">
                <div class="form-check form-switch">
                    <input type="hidden" name="is_email_entrata_abilitata" value="0">
                    <input class="form-check-input" type="checkbox" role="switch" id="isEmailEntrataAbilitata"
                        name="is_email_entrata_abilitata" value="1"
                        {{ old('is_email_entrata_abilitata', $sede->is_email_entrata_abilitata) ? 'checked' : '' }}>
                    <label class="form-check-label" for="isEmailEntrataAbilitata">Email entrata abilitata</label>
                </div>
            </div>
            <!-- Fine Toggle per is_email_entrata_abilitata -->
            <h5 class="fw-bold mb-3 mt-3">Email in ingresso</h5>
            <div class="mb-10">
                <ul class="nav nav-tabs mt-3" id="msgTabEntrata" role="tablist">
                    @foreach (['it' => 'Italiano', 'en' => 'Inglese', 'de' => 'Tedesco', 'fr' => 'Francese', 'es' => 'Spagnolo'] as $lang => $label)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link{{ $loop->first ? ' active' : '' }}"
                                id="msgTabEntrata_{{ $lang }}-tab" data-bs-toggle="tab"
                                data-bs-target="#msgTabEntrata_{{ $lang }}" type="button" role="tab"
                                aria-controls="{{ $lang }}"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                <i class="fi fi-{{ $lang }} me-1"></i>{{ $label }}</button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content mt-3" id="msgTabEntrataTabContent">
                    @foreach (['it', 'en', 'de', 'fr', 'es'] as $lang)
                        <div class="tab-pane overflow-auto fade{{ $loop->first ? ' show active' : '' }}"
                            style="max-height: 500px;" id="msgTabEntrata_{{ $lang }}" role="tabpanel"
                            aria-labelledby="{{ $lang }}-tab">
                            <div
                                class="form-group mt-33 {{ $errors->has('oggetto_email_entrata_' . $lang) ? 'has-error' : '' }}">
                                <label for="oggetto_email_entrata_{{ $lang }}" class="fw-bold">Oggetto della
                                    mail:</label>
                                <input type="text" class="form-control"
                                    id="oggetto_email_entrata_{{ $lang }}"
                                    name="oggetto_email_entrata_{{ $lang }}"
                                    value="{{ old('oggetto_email_entrata_' . $lang, $sede->{'oggetto_email_entrata_' . $lang}) }}">
                                @if ($errors->has('oggetto_email_entrata_' . $lang))
                                    <span
                                        class="text-danger">{{ $errors->first('oggetto_email_entrata_' . $lang) }}</span>
                                @endif
                            </div>
                            <label for="msg_email_entrata_{{ $lang }}" class="fw-bold">Contenuto della
                                mail:</label>
                            <textarea rows=10 class="form-control mb-3" id="msg_email_entrata_{{ $lang }}"
                                name="msg_email_entrata_{{ $lang }}" required>
                    {{ old('msg_email_entrata_' . $lang, $sede->{'msg_email_entrata_' . $lang}) }}
                    </textarea>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- fine gestione email in ingresso --}}

            {{-- inizio gestione email in uscita --}}
            <!-- Inizio Toggle per is_email_uscita_abilitata -->
            <div class="mb-3 mt-3">
                <div class="form-check form-switch">
                    <input type="hidden" name="is_email_uscita_abilitata" value="0">
                    <input class="form-check-input" type="checkbox" role="switch" id="isEmailUscitaAbilitata"
                        name="is_email_uscita_abilitata" value="1"
                        {{ old('is_email_uscita_abilitata', $sede->is_email_uscita_abilitata) ? 'checked' : '' }}>
                    <label class="form-check-label" for="isEmailUscitaAbilitata">Email uscita abilitata</label>
                </div>
            </div>
            <!-- Fine Toggle per is_email_uscita_abilitata -->

            <h5 class="fw-bold mb-3 mt-3">Email in uscita </h5>
            <div class="mb-10">
                <ul class="nav nav-tabs mt-3" id="msgTabUscita" role="tablist">
                    @foreach (['it' => 'Italiano', 'en' => 'Inglese', 'de' => 'Tedesco', 'fr' => 'Francese', 'es' => 'Spagnolo'] as $lang => $label)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link{{ $loop->first ? ' active' : '' }}"
                                id="msgTabUscita_{{ $lang }}-tab" data-bs-toggle="tab"
                                data-bs-target="#msgTabUscita_{{ $lang }}" type="button" role="tab"
                                aria-controls="{{ $lang }}"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                <i class="fi fi-{{ $lang }} me-1"></i>{{ $label }}</button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content mt-3" id="msgTabUscitaTabContent">
                    @foreach (['it', 'en', 'de', 'fr', 'es'] as $lang)
                        <div class="tab-pane overflow-auto fade{{ $loop->first ? ' show active' : '' }}"
                            style="max-height: 500px;" id="msgTabUscita_{{ $lang }}" role="tabpanel"
                            aria-labelledby="{{ $lang }}-tab">

                            <div
                                class="form-group mt-33 {{ $errors->has('oggetto_email_uscita_' . $lang) ? 'has-error' : '' }}">
                                <label for="oggetto_email_uscita_{{ $lang }}" class="fw-bold">Oggetto della
                                    mail:</label>
                                <input type="text" class="form-control" id="oggetto_email_uscita_{{ $lang }}"
                                    name="oggetto_email_uscita_{{ $lang }}"
                                    value="{{ old('oggetto_email_uscita_' . $lang, $sede->{'oggetto_email_uscita_' . $lang}) }}">
                                @if ($errors->has('oggetto_email_uscita_' . $lang))
                                    <span class="text-danger">{{ $errors->first('oggetto_email_uscita_' . $lang) }}</span>
                                @endif
                            </div>
                            <label for="msg_email_entrata_{{ $lang }}" class="fw-bold">Contenuto della
                                mail:</label>
                            <textarea rows=10 class="form-control mb-3" id="msg_email_uscita_{{ $lang }}"
                                name="msg_email_uscita_{{ $lang }}" required>
                    {{ old('msg_email_uscita_' . $lang, $sede->{'msg_email_uscita_' . $lang}) }}
                    </textarea>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- fine gestione email in uscita --}}


            {{-- inizio gestione regolamento --}}
            <h5 class="fw-bold mb-3 mt-3">Regolamento </h5>
            <div class="mb-10">
                <ul class="nav nav-tabs mt-3" id="msgTabRegolamento" role="tablist">
                    @foreach (['it' => 'Italiano', 'en' => 'Inglese', 'de' => 'Tedesco', 'fr' => 'Francese', 'es' => 'Spagnolo'] as $lang => $label)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link{{ $loop->first ? ' active' : '' }}"
                                id="msgTabRegolamento_{{ $lang }}-tab" data-bs-toggle="tab"
                                data-bs-target="#msgTabRegolamento_{{ $lang }}" type="button" role="tab"
                                aria-controls="{{ $lang }}"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}"><span
                                    class="fi fi-{{ $lang }} me-1"></span>{{ $label }}</button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content mt-3" id="msgTabRegolamentoTabContent">
                    @foreach (['it', 'en', 'de', 'fr', 'es'] as $lang)
                        <div class="tab-pane overflow-auto fade{{ $loop->first ? ' show active' : '' }}"
                            style="max-height: 500px;" id="msgTabRegolamento_{{ $lang }}" role="tabpanel"
                            aria-labelledby="{{ $lang }}-tab">
                            <textarea rows=10 class="form-control" id="regolamento_{{ $lang }}" name="regolamento_{{ $lang }}"
                                required>
                    {{ old('regolamento_' . $lang, $sede->{'regolamento_' . $lang}) }}
                    </textarea>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- fine gestione in regolamento --}}

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Salva</button>
                <a href="{{ route('imposta.sede.show') }}">
                    <button type="button" class="btn btn-secondary">Annulla</button>
                </a>
            </div>

        </form>
    </div>
@endsection
