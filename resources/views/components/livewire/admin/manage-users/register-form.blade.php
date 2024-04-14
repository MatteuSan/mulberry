<section x-data="{ page: 1, role: 'superuser' }">
  <form wire:submit="register">
    @csrf
    <section class="flex flow-column wrap-none gap-md" x-show="page == 1">
      <x-ms-form-field wire:model.blur="username" name="username" label="Username" required="true"/>
      <div class="flex flow-column gap-sm">
        <div class="flex flow-row wrap-none jc-space-between ai-center gap-sm">
          <x-ms-form-field wire:model.blur="prefix" name="prefix" label="Prefix" width="xs"/>
          <x-ms-form-field wire:model.blur="firstName" name="first_name" label="First Name" required="true"/>
        </div>
        <x-ms-form-field wire:model.blur="middleName" name="middle_name" label="Middle Name (if applicable)"/>
        <div class="flex flow-row wrap-none jc-space-between ai-center gap-sm">
          <x-ms-form-field wire:model.blur="lastName" name="last_name" label="Last Name" required="true"/>
          <x-ms-form-field wire:model.blur="suffix" name="suffix" label="Suffix" width="xs"/>
        </div>
      </div>
      <x-ms-form-field wire:model.blur="email" name="email" label="Email" required="true" type="email"/>
      <x-ms-form-field wire:model.blur="password" name="password" label="Password" required="true" type="password"/>
      <x-ms-form-field wire:model.blur="dob" name="dob" label="Date of birth" required="true" type="text" helper="(yyyy-mm-dd)"/>
    </section>
    <div class="flex flow-column wrap-none gap-md" x-show="page == 2">
      <label class="ms-select-field @error('role') is-error @enderror">
        <span class="ms-select-field__label">Role</span>
        <select name="role" class="ms-select-field__input" wire:model.blur="role" x-model="role" required>
          @foreach($roles as $role)
            <option value="{{ $role->slug }}">{{ $role->title }}</option>
          @endforeach
        </select>
        @error('role_id') <span class="ms-form-field__helper">{{ $message }}</span> @enderror
      </label>
      <div class="flex flow-row wrap-none jc-space-between ai-center gap-sm" x-show="role == 'student'" x-transition.opacity>
        <x-ms-form-field wire:model.blur="batch" name="batch" type="text" label="Batch" required="true"/>
        <label class="ms-select-field @error('program') is-error @enderror">
          <span class="ms-select-field__label">Program</span>
          <select name="program" class="ms-select-field__input" wire:model="program" required>
            @foreach($programs as $program)
              <option value="{{ $program->slug }}">{{ $program->title }}</option>
            @endforeach
          </select>
          @error('program') <span class="ms-form-field__helper">{{ $message }}</span> @enderror
        </label>
      </div>
      <div class="flex flow-row wrap-none jc-space-between ai-center gap-sm" x-show="role == 'staff' || role == 'superuser'" x-transition.opacity>
        <label class="ms-select-field @error('department') is-error @enderror">
          <span class="ms-select-field__label">Department</span>
          <select name="department" class="ms-select-field__input" wire:model="department" required>
            @foreach($departments as $department)
              <option value="{{ $department->slug }}">{{ $department->title }}</option>
            @endforeach
          </select>
          @error('department') <span class="ms-form-field__helper">{{ $message }}</span> @enderror
        </label>
      </div>
    </div>
    <div class="flex flow-row jc-space-between gap-sm mt-lg">
      <button class="ms-button is-outlined is-error" @click.prevent="toggle">
        <span class="ms-button__label">Cancel</span>
      </button>
      <div class="flex flow-row ai-center gap-sm">
        <button class="ms-button is-outlined" x-show="page >= 2" @click.prevent="page--">
          <span class="ms-button__label">Back</span>
        </button>
        <button class="ms-button is-filled" x-show="page <= 1" @click.prevent="page++">
          <span class="ms-button__label">Next</span>
        </button>
        <button class="ms-button is-filled" x-show="page == 2" type="submit">
          <span class="ms-button__label">Submit</span>
        </button>
      </div>
    </div>
  </form>
</section>