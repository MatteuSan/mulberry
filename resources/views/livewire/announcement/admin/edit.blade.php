<section class="w-full fill-surface-800 p-xl r-lg my-xl">
  <h2 class="title mb-md">Edit announcement</h2>
  <form class="flex flow-column gap-md" wire:submit="edit">
    <x-ms-form-field name="title" label="Title" required="true" value="{{ $announcement->title }}" />
    <x-ms-form-field name="content" label="Content" required="true" type="textarea" value="{{ $announcement->content }}" helper="Markdown is supported" />
    <div class="flex flow-row jc-end gap-sm">
      <button class="ms-button is-filled is-inverted" type="submit">
        <span class="ms-button__label">Save</span>
      </button>
      <button class="ms-button is-filled is-error" type="button" wire:click="delete">
        <span class="ms-button__label">Delete</span>
      </button>
    </div>
  </form>
</section>