<div
  class="flex flow-column gap-sm fill-primary-600 p-md r-sm border-primary-400"
  style="border-width:1px;border-style:solid;{{ $isUnread ? 'border-color:var(--ms-theme-warning-400) !important;' : '' }}"
>
  <div>
    <h4 class="subtitle truncated-1">{{ $title }}</h4>
    <p class="body truncated-1">{{ $content }}</p>
    @if($updated_at->diffInDays() - $created_at->diffInDays() >= 1)
      <small class="small">Updated {{ $updated_at }}</small>
    @else
      <small class="small">Posted {{ $created_at }}</small>
    @endif
  </div>
  <footer class="flex flex-row wrap-none jc-end">
    <a wire:navigate href="{{ route('academics.announcements.id', ['id' => $id]) }}" class="ms-button is-small is-outlined is-inverted" role="link">
      <span class="ms-button__label">Read announcement</span>
    </a>
  </footer>
</div>