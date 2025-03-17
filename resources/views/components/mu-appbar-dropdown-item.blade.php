@props(['route'])

@php
  $isActive = Route::currentRouteName() == $route;
@endphp

<li class="ms-list__item{{ $isActive ? ' is-active' : '' }}">
  <a wire:navigate href="{{ route($route) }}">{{ $slot }}</a>
</li>