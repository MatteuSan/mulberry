<section class="w-full fill-surface-200 ink-surface-ink p-lg @medium:p-xl r-lg my-xl" x-data="{ content: '' }">
  <h2 class="title mb-md">Create announcement</h2>
  <form class="flex flow-column gap-md" wire:submit="createAnnouncement">
    <livewire:components.ms-form-field name="title" label="Title" required="true" />
    <livewire:components.ms-form-field alpine-model="content" name="content" label="Content" required="true" type="textarea" helper="Markdown is supported" />
    <div class="flex flow-row jc-space-between ai-center gap-sm">
      <small class="small" x-text="`${content.length} characters`"></small>
      <div class="flex flow-row ai-center gap-sm">
        <button class="ms-button is-outlined is-error" @click.prevent="toggle">
          <span class="ms-button__label">Cancel</span>
        </button>
        <button class="ms-button is-filled" type="submit">
          <span class="ms-button__label">Create announcement</span>
        </button>
      </div>
    </div>
  </form>
</section>