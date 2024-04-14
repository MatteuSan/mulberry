<section
  class="w-full fill-surface-200 ink-surface-ink p-lg @medium:p-xl r-lg my-xl"
  x-data="{ role: '{{ $user->role->slug }}', department: '{{ $user->staff?->department->slug }}', program: '{{ $user->student?->program->slug }}' }">
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

    <label class="ms-select-field @error('role') is-error @enderror">
      <span class="ms-select-field__label">Role</span>
      <select name="role" class="ms-select-field__input" wire:model="role" x-model="role" required>
        @foreach($roles as $role)
          <option value="{{ $role->slug }}">{{ $role->title }}</option>
        @endforeach
      </select>
      @error('role') <span class="ms-form-field__helper">{{ $message }}</span> @enderror
    </label>

    <div class="flex flow-row wrap-none gap-sm jc-space-between ai-center" x-show="role == 'student'">
      <x-ms-form-field wire:model.blur="batch" name="batch" type="text" label="Batch" required="true" value="{{ $user?->student?->batch }}"/>
      <label class="ms-select-field min-h-full @error('program') is-error @enderror">
        <span class="ms-select-field__label">Program</span>
        <select name="program" class="ms-select-field__input" wire:model="program" x-model="program">
          @foreach($programs as $program)
            <option value="{{ $program->slug }}">{{ $program->title }}</option>
          @endforeach
        </select>
        @error('program') <span class="ms-form-field__helper">{{ $message }}</span> @enderror
      </label>
    </div>

    <div class="flex flow-row wrap-none gap-sm jc-space-between ai-center" x-show="role == 'staff' || role == 'superuser'">
      <label class="ms-select-field min-h-full @error('department') is-error @enderror">
        <span class="ms-select-field__label">Department</span>
        <select name="department" class="ms-select-field__input" wire:model="department" x-model="department">
          @foreach($departments as $department)
            <option value="{{ $department->slug }}">{{ $department->title }}</option>
          @endforeach
        </select>
        @error('department') <span class="ms-form-field__helper">{{ $message }}</span> @enderror
      </label>
    </div>

    <div class="flex flow-row jc-space-between gap-sm">
      <a wire:navigate href="{{ route('admin.manage-users') }}" class="ms-button is-outlined is-error">
        <span class="ms-button__label">Cancel</span>
      </a>
      <div class="flex flow-row wrap-none ai-center gap-sm">
        <button class="ms-button is-filled is-error" type="button" wire:click="delete" wire:confirm="Are you sure you want to delete this user? This action cannot be undone.">
          <span class="ms-button__label">Delete</span>
        </button>
        <button class="ms-button is-filled is-inverted" type="submit">
          <span class="ms-button__label">Save</span>
        </button>
      </div>
    </div>
  </form>
</section>