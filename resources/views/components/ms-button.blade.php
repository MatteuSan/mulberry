@props([
  'cleanedType' => '',
  'icon' => null,
  'role' => 'button',
  'nativeType' => 'button',
  'isDisabled' => false,
  'cleanedLink' => '',
  'linkTarget' => '_self',
])

@if(!empty($link))
  <a class="ms-button{{ $type ? ' ' . $cleanedType : '' }}" href="{{ $cleanedLink }}" target="{{ $linkTarget }}" {{ $attributes }} role="{{ $role }}" type="{{ $nativeType }}" @if($isDisabled) disabled @endif>
    @if($icon) <i class="ms-button__icon" aria-hidden="true">{{ $icon }}</i> @endif
    <span class="ms-button__label">{{ $slot }}</span>
  </a>
@else
  <button class="ms-button{{ $type ? ' ' . $cleanedType : '' }}" {{ $attributes }} role="{{ $role }}" type="{{ $nativeType }}" @if($isDisabled) disabled @endif>
    @if($icon) <i class="ms-button__icon" aria-hidden="true">{{ $icon }}</i> @endif
    <span class="ms-button__label">{{ $slot }}</span>
  </button>
@endif