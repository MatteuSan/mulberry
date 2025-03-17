@props([
  'type' => '',
  'icon' => null,
  'role' => 'button',
  'nativeType' => 'button',
  'isDisabled' => false,
  'link' => '',
])

@php
  function handleLinkTarget(string $link, string $fallbackTarget = '_self'): string
  {
   if (Route::getRoutes()->hasNamedRoute($link)) return route($link);
   $isExternal = (str_contains($link, 'http://') || str_contains($link, 'https://')) && !Route::getRoutes()->hasNamedRoute($link);
   return $isExternal ? '_blank' : $fallbackTarget;
  }

  function handleLink(string $link): string
  {
   if(Route::getRoutes()->hasNamedRoute($link)) return route($link);
   return $link;
  }

  function handleTypes(string $types): string
  {
   $finalTypes = [];
   $types = explode(' ', $types);
   foreach ($types as $type) $finalTypes[] = "is-$type";
   return implode(" ", $finalTypes);
  }
@endphp

@if(!empty($link))
  <a class="ms-button{{ $type ? ' ' . handleTypes($type) : '' }}" href="{{ handleLink($link) }}" target="{{ handleLinkTarget($link) }}" {{ $attributes }} wire:navigate @if($isDisabled) disabled @endif>
    @if($icon) <i class="ms-button__icon" aria-hidden="true">{{ $icon }}</i> @endif
    <span class="ms-button__label">{{ $slot }}</span>
  </a>
@else
  <button class="ms-button{{ $type ? ' ' . handleTypes($type) : '' }}" {{ $attributes }} role="{{ $role }}" type="{{ $nativeType }}" @if($isDisabled) disabled @endif>
    @if($icon) <i class="ms-button__icon" aria-hidden="true">{{ $icon }}</i> @endif
    <span class="ms-button__label">{{ $slot }}</span>
  </button>
@endif