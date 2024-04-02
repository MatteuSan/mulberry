@props([
  'name' => null,
  'rows' => 10,
  'width' => 'w-full',
])

<span class="block {{ $width }}">
  @if($type == 'textarea')
    <label class="ms-form-field @error($name) is-error @enderror">
      <span class="ms-form-field__label">{{ $label }}</span>
      <textarea
        class="ms-form-field__input"
        name="{{ $name }}"
        rows="10"
        placeholder="a"
        wire:model="{{ $name }}"
        @if ($alpineModel) x-model="{{ $alpineModel }}" @endif
        @if($required) required @endif
        @if($disabled) disabled @endif
      >{{ $value ?: old($name) }}</textarea>
      @if($helper)
        <span class="ms-form-field__helper">{{ $helper }}</span>
      @endif
      @error($name) <span class="ms-form-field__helper">{{ $message }}</span> @enderror
    </label>
  @else
    <label class="ms-form-field @error($name) is-error @enderror">
      <span class="ms-form-field__label">{{ $label }}</span>
      <input
        type="{{ $type }}"
        class="ms-form-field__input"
        placeholder="{{ $label }}"
        name="{{ $name }}"
        value="{{ $value ?: old($name) }}"
        wire:model="{{ $name }}"
        @if ($alpineModel) x-model="{{ $alpineModel }}" @endif
        @if($required) required @endif
        @if($disabled) disabled @endif
      />
      @if($helper)
        <span class="ms-form-field__helper">{{ $helper }}</span>
      @endif
      @error($name) <span class="ms-form-field__helper">{{ $message }}</span> @enderror
    </label>
  @endif
</span>