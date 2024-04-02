<section class="w-full fill-surface-200 ink-surface-ink p-lg @medium:p-xl r-lg my-xl">
  <h2 class="title mb-md">Edit announcement</h2>
  <form class="flex flow-column gap-md" wire:submit="edit">
    <x-ms-form-field wire:model.blur="title" name="title" label="Title" required="true" value="{{ $announcement->title }}" />
    <x-ms-form-field wire:model.blur="content" name="content" label="Content" required="true" type="textarea" value="{{ $announcement->content }}" helper="Markdown is supported" />
    <div class="flex flow-row jc-space-between gap-sm">
      <a wire:navigate href="{{ route('admin.announcements') }}" class="ms-button is-outlined is-error">
        <span class="ms-button__label">Cancel</span>
      </a>
      <div class="flex flow-row wrap-none ai-center gap-sm">
        <button class="ms-button is-filled is-inverted" type="submit">
          <span class="ms-button__label">Save</span>
        </button>
        <button class="ms-button is-filled is-error" type="button" wire:click="delete">
          <span class="ms-button__label">Delete</span>
        </button>
      </div>
    </div>
  </form>
</section>