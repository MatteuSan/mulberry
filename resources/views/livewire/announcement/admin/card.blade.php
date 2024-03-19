<div class="flex flow-column gap-sm fill-primary-600 p-md r-sm border-primary-400" style="border-width: 1px; border-style: solid">
  <div>
    <h4 class="subtitle truncated-1">{{ $title }}</h4>
    <p class="body truncated-1">{{ $content }}</p>
    @if($updated_at->diffInDays() - $created_at->diffInDays() >= 1)
      <small class="small">Updated {{ $updated_at }}. Written by {{ $author }}</small>
    @else
      <small class="small">Posted {{ $created_at }} by {{ $author }}</small>
    @endif
  </div>
  <footer class="flex flex-row wrap-none jc-end gap-sm">
    <a
      wire:navigate
      href="{{ route('admin.announcements.edit', ['id' => $id]) }}"
      aria-label="Edit announcement number {{ $id }}."
      class="ms-button is-filled is-small is-inverted" role="link"
    >
      Edit
    </a>
    <button
      class="ms-button is-outlined is-small is-filled is-error"
      type="button"
      wire:click="delete"
      wire:confirm="Are you sure you want to delete this announcement? This action cannot be undone."
      wire:loading.attr="disabled"
    >
      Delete
    </button>
  </footer>
</div>