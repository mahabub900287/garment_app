<div class="form-group mt-3 {{ $mainclass ?? '' }}">
    <label for="{{ $name }}" class="mb-2">{{ $label ?? 'Input label' }} @if ($required??false) <span class="error">*</span> @endif</label>
    <input name="{{ $name }}" id="{{ $name }}" class="form-control py-2{{ $class ?? '' }}" placeholder="{{ $placeholder ?? '' }}" type="{{ $type ?? 'text' }}" value="{{ $value ?? old($name) }}" {{ $required ?? '' }}>
    @if (!empty($errorName))
        @error($errorName)
            <span class="text-danger fs-6">{{ $message }}</span>
        @enderror
    @endif
</div>
