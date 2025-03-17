@props([
  'type' => '',
  'icon' => null,
  'role' => 'button',
  'nativeType' => 'button',
  'isDisabled' => false,
  'link' => '',
  'linkTarget' => '_self',
])

@if(!empty($link))
  <a class="ms-button{{ $type ? ' ' . $type : '' }}" href="{{ $link }}" target="{{ $linkTarget }}" {{ $attributes }} role="{{ $role }}" type="{{ $nativeType }}" @if($isDisabled) disabled @endif>
    @if($icon) <i class="ms-button__icon" aria-hidden="true">{{ $icon }}</i> @endif
    <span class="ms-button__label">{{ $slot }}</span>
  </a>
@else
  <button class="ms-button{{ $type ? ' ' . $type : '' }}" {{ $attributes }} role="{{ $role }}" type="{{ $nativeType }}" @if($isDisabled) disabled @endif>
    @if($icon) <i class="ms-button__icon" aria-hidden="true">{{ $icon }}</i> @endif
    <span class="ms-button__label">{{ $slot }}</span>
  </button>
@endif