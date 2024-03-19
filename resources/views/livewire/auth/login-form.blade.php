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