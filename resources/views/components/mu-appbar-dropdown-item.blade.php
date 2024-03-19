<li class="ms-list__item{{ $rn($route) ? ' is-active' : '' }}">
  <a wire:navigate href="{{ route($route) }}">{{ $slot }}</a>
</li>