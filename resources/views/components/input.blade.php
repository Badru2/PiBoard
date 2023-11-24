<div class="form-group row">
    <label for="{{ $name }}" class="label text-white">{{ $label }}</label>

    <div>
        <input id="{{ $name }}" type="{{ $type ?? 'text' }}" class="form-control @error($name) is-invalid @enderror"
            name="{{ $name }}"
            @isset($object->{$name}) value="{{ old($name) ? old($name) : $object->{$name} }}"
        @else value="{{ old($name) }}" @endisset
            required autocomplete="{{ $name }}" autofocus>

        @if ($errors->has($name))
            <span class="invalid-feedback" role="alert">
                {{ $errors->first($name) }}
            </span>
        @endif
    </div>
</div>
