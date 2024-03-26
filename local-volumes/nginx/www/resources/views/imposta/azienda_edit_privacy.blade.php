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

        const ce_it = ClassicEditor
            .create(document.querySelector('#privacy_it'), {
                toolbar: toolbar_opt,
            })
            .catch(error => {
                console.error(error);
            });

        const ce_en = ClassicEditor
            .create(document.querySelector('#privacy_en'), {
                toolbar: toolbar_opt,
            })
            .catch(error => {
                console.error(error);
            });

        const ce_de = ClassicEditor
            .create(document.querySelector('#privacy_de'), {
                toolbar: toolbar_opt,
            })
            .catch(error => {
                console.error(error);
            });

        const ce_fr = ClassicEditor
            .create(document.querySelector('#privacy_fr'), {
                toolbar: toolbar_opt,
            })
            .catch(error => {
                console.error(error);
            });

        const ce_es = ClassicEditor
            .create(document.querySelector('#privacy_es'), {
                toolbar: toolbar_opt,
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

@section('content')
    <div class="container">
        <h3 class="fw-bold mb-3">Modifica Privacy Azienda</h3>
        <form action="{{ route('imposta.azienda.edit_privacy', ['id' => $azienda->id]) }}" method="POST">
            @csrf
            @method('PUT')

            @foreach (['it' => 'Italiano', 'en' => 'Inglese', 'de' => 'Tedesco', 'fr' => 'Francese', 'es' => 'Spagnolo'] as $lang => $label)
                <div class="form-group mt-3">
                    <label for="privacy_{{ $lang }}" class="fw-bold"><i
                            class="fi fi-{{ $lang }}"></i>&nbsp; {{ $label }}:</label>
                    <textarea rows=10 class="form-control" id="privacy_{{ $lang }}" name="privacy_{{ $lang }}" required>
                        {{ old('privacy_' . $lang, $azienda->{'privacy_' . $lang}) }}
                    </textarea>
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
