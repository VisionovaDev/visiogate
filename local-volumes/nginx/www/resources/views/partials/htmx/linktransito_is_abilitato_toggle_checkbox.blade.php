<input class="form-check-input" type="checkbox" role="switch" id="is_abilitato_{{ $link->id }}"
    hx-get="{{ route('imposta.linktransito.is_abilitato_toggle', ['id' => $link->id]) }}" hx-trigger="change"
    hx-target="#is_abilitato_{{ $link->id }}" hx-swap="outerHTML" {{ $link->is_abilitato ? 'checked' : '' }}>
