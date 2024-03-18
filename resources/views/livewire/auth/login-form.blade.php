<section class="w-full fill-surface-200 ink-surface-ink p-xl r-lg">
  <div class="flex flow-row jc-center ai-center mt-md mb-2xl gap-md">
    <img style="max-height: 55px;" src="{{ asset('/img/mapua-logo.png') }}" alt="Mapua University logo." />
    <h2 class="title" style="text-align: center">Institution Login</h2>
  </div>
  <form class="flex flow-column gap-md" wire:submit="login">
    @csrf
    <x-ms-form-field name="email" label="Email" required="true" type="email" />
    <x-ms-form-field name="password" label="Password" required="true" type="password" />
    <div class="flex flow-row jc-end gap-sm">
      <button class="ms-button is-filled is-inverted" type="submit">
        <span class="ms-button__label">Login</span>
      </button>
    </div>
  </form>
</section>