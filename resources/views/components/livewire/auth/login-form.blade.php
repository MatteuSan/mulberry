<form class="flex flow-column gap-md" wire:submit="login">
  @csrf
  <x-ms-form-field wire:model.blur="email" name="email" label="Email" required="true" type="email" />
  <x-ms-form-field wire:model.blur="password" name="password" label="Password" required="true" type="password" />
  <label class="flex flow-row wrap-none gap-sm ai-center">
    <input type="checkbox" id="remember" name="remember" wire:model="remember" />
    Remember me
  </label>
  <div class="flex flow-row jc-end gap-sm">
    <button class="ms-button is-filled is-inverted" type="submit">
      <span class="ms-button__label">Login</span>
    </button>
  </div>
</form>