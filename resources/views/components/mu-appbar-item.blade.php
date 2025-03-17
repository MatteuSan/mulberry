@props(['route', 'icon', 'dropdown'])

@php
 $isActive = Route::currentRouteName() == $route;
@endphp

<li
  class="mu-appbar-item{{ $isActive ? ' is-active' : '' }} relative"
  x-data="{ isDropdownVisible: false }"
  @mouseenter="isDropdownVisible = true"
  @mouseleave="isDropdownVisible = false"
>
  <a wire:navigate href="{{ route($route) }}">
    <i class="mu-appbar-item__icon">
      {{ $icon }}
    </i>
    <span class="mu-appbar-item__label">{{ $slot }}</span>
  </a>
  <span class="absolute p-sm w-full">
    <ul :class="`ms-list is-dropdown is-raised is-selectable absolute${isDropdownVisible ? ' is-open' : ''}`">
      {{ $dropdown }}
    </ul>
  </span>
</li>