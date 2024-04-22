@props([
  'type' => '',
  'icon' => null,
  'role' => 'button'
])

@if(!empty($link))
  <a class="ms-button{{ $type ? ' ' . $handleTypes($type) : '' }}" href="{{ $handleLink($link) }}" target="{{ $handleLinkTarget($link) }}" {{ $attributes }} wire:navigate>
    @if($icon) <i class="ms-button__icon" aria-hidden="true">{{ $icon }}</i> @endif
    <span class="ms-button__label">{{ $slot }}</span>
  </a>
@else
  <button class="ms-button{{ $type ? ' ' . $handleTypes($type) : '' }}" {{ $attributes }} role="{{ $role }}" type="{{ $nativeType }}">
    @if($icon) <i class="ms-button__icon" aria-hidden="true">{{ $icon }}</i> @endif
    <span class="ms-button__label">{{ $slot }}</span>
  </button>
@endif