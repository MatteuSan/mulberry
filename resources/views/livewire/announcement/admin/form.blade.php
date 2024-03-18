<section class="w-full fill-surface-800 p-xl r-lg my-xl">
  <h2 class="title mb-md">Create announcement</h2>
  <form class="flex flow-column gap-md" wire:submit="createAnnouncement">
    <x-ms-form-field name="title" label="Title" required="true" />
    <x-ms-form-field name="content" label="Content" required="true" type="textarea" helper="Markdown is supported" />
    <div class="flex flow-row jc-end">
      <button class="ms-button is-filled is-inverted" type="submit">
        <span class="ms-button__label">Create announcement</span>
      </button>
    </div>
  </form>
</section>