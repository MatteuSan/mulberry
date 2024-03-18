<section class="w-full fill-surface-800 p-xl r-lg">
  <h2 class="title mb-md">Register</h2>
  <form class="flex flow-column gap-md" action="{{ route('register.store') }}" method="post">
    @csrf
    <x-form-field name="name" label="Name" required="true" />
    <x-form-field name="email" label="Email" required="true" type="email" />
    <x-form-field name="password" label="Password" required="true" type="password" />
    <label class="ms-select-field @error('role_id') is-error @enderror">
      <span class="ms-select-field__label">Role</span>
      <select name="role_id" class="ms-select-field__input" wire:model="role_id" required>
        @foreach($roles as $role)
          <option value="{{ $role->slug }}">{{ $role->title }}</option>
        @endforeach
      </select>
      @error('role_id') <span class="ms-form-field__helper">{{ $message }}</span> @enderror
    </label>
    <div class="flex flow-row jc-end">
      <button class="ms-button is-outlined is-inverted" type="submit">
        <span class="ms-button__label">Register User</span>
      </button>
    </div>
  </form>
</section>