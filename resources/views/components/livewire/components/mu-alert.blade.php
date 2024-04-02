<div class="mu-alert my-sm">
  <p class="mu-alert__label">{{ $slot }}</p>
  {{ $actions }}
  @if($actions)
    <button wire:confirm="Are you sure you want all announcements to be marked as read? (This cannot be undone)" class="ms-button is-small is-error" type="button">Read all</button>
  @endif
</div>