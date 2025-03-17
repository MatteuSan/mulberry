<li
  class="mu-appbar-item{{ $rn ? ' is-active' : '' }} relative"
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