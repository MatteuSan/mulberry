<section class="w-full fill-surface-200 ink-surface-ink p-lg @medium:p-xl r-lg my-xl" x-data="{ role: '' }">
  <h2 class="title mb-md">Edit user</h2>
  <form class="flex flow-column gap-md" wire:submit="edit">
    <div class="flex flow-column gap-sm">
      <div class="flex flow-row wrap-none jc-space-between ai-center gap-sm">
        <x-ms-form-field wire:model.blur="prefix" name="prefix" label="Prefix" width="xs" value="{{ $user->prefix }}" />
        <x-ms-form-field wire:model.blur="firstName" name="first_name" label="First Name" required="true" value="{{ $user->first_name }}" />
      </div>
      <x-ms-form-field wire:model.blur="middleName" name="middle_name" label="Middle Name (if applicable)" value="{{ $user->middle_name }}" />
      <div class="flex flow-row wrap-none jc-space-between ai-center gap-sm">
        <x-ms-form-field wire:model.blur="lastName" name="last_name" label="Last Name" required="true" value="{{ $user->last_name }}" />
        <x-ms-form-field wire:model.blur="suffix" name="suffix" label="Suffix" width="xs" value="{{ $user->suffix }}" />
      </div>
    </div>
    <x-ms-form-field wire:model.blur="email" name="email" label="Email" required="true" type="email" value="{{ $user->email }}" />
    <x-ms-form-field wire:model.blur="dob" name="dob" label="Date of birth" required="true" type="text" helper="(yyyy-mm-dd)" value="{{ $user->dob }}" />

    <label class="ms-select-field @error('role_id') is-error @enderror">
      <span class="ms-select-field__label">Role</span>
      <select name="role_id" class="ms-select-field__input" wire:model="role_id" x-model="role" required>
        @foreach($roles as $role)
          <option value="{{ $role->slug }}">{{ $role->title }}</option>
        @endforeach
      </select>
      @error('role_id') <span class="ms-form-field__helper">{{ $message }}</span> @enderror
    </label>

    @if($user->role_id == 3)
      <div class="flex flow-row wrap-none gap-sm jc-space-between ai-center" x-show="role == 'student'">
        <x-ms-form-field wire:model.blur="batch" name="batch" type="text" label="Batch" required="true" value="{{ $user->student()->first()->batch }}"/>
        <label class="ms-select-field min-h-full @error('program_id') is-error @enderror">
          <span class="ms-select-field__label">Program</span>
          <select name="program_id" class="ms-select-field__input" wire:model="program_id" required>
            @foreach($programs as $program)
              <option value="{{ $program->slug }}">{{ $program->title }}</option>
            @endforeach
          </select>
          @error('program_id') <span class="ms-form-field__helper">{{ $message }}</span> @enderror
        </label>
      </div>
    @endif

    <div class="flex flow-row jc-space-between gap-sm">
      <a wire:navigate href="{{ route('admin.manage-users') }}" class="ms-button is-outlined is-error">
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