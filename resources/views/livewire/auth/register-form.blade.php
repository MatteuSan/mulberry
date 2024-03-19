<section x-data="{ page: 1, role: '' }">
  <form wire:submit="register" method="post">
    @csrf
    <section class="flex flow-column gap-md" x-show="page === 1" x-transition.opacity>
      <div class="flex flow-column gap-sm">
        <div class="flex flow-row wrap-none jc-space-between ai-center gap-sm">
          <livewire:components.ms-form-field name="prefix" label="Prefix" width="xs"/>
          <livewire:components.ms-form-field name="first_name" label="First Name" required="true"/>
        </div>
        <livewire:components.ms-form-field name="middle_name" label="Middle Name (if applicable"/>
        <div class="flex flow-row wrap-none jc-space-between ai-center gap-sm">
          <livewire:components.ms-form-field name="last_name" label="Last Name" required="true"/>
          <livewire:components.ms-form-field name="suffix" label="Suffix" width="xs"/>
        </div>
      </div>
      <livewire:components.ms-form-field name="email" label="Email" required="true" type="email"/>
      <livewire:components.ms-form-field name="password" label="Password" required="true" type="password"/>
      <livewire:components.ms-form-field name="dob" label="Date of birth" required="true" type="text" helper="(mm/dd/yy)"/>
    </section>
    <section class="flex flow-column gap-md" x-show="page === 2" x-transition.opacity>
      <label class="ms-select-field @error('role_id') is-error @enderror">
        <span class="ms-select-field__label">Role</span>
        <select name="role_id" class="ms-select-field__input" wire:model="role_id" x-model="role" required>
          @foreach($roles as $role)
            <option value="{{ $role->slug }}">{{ $role->title }}</option>
          @endforeach
        </select>
        @error('role_id') <span class="ms-form-field__helper">{{ $message }}</span> @enderror
      </label>
      <div class="flex flow-row wrap-none jc-space-between ai-center gap-sm">
        <livewire:components.ms-form-field name="batch" type="text" label="Batch" required="true"/>
        <label class="ms-select-field @error('program_id') is-error @enderror">
          <span class="ms-select-field__label">Program</span>
          <select name="program_id" class="ms-select-field__input" wire:model="program_id" required>
            @foreach($roles as $role)
              <option value="{{ $role->slug }}">{{ $role->title }}</option>
            @endforeach
          </select>
          @error('program_id') <span class="ms-form-field__helper">{{ $message }}</span> @enderror
        </label>
      </div>
    </section>
    <div x-bind:class="`flex flow-row ${ page >= 2 ? ' jc-space-between' : 'jc-end' } gap-sm mt-lg`">
      <button class="ms-button is-outlined" type="submit" @click.prevent="page -= 1" x-show="page >= 2">
        <span class="ms-button__label">Back</span>
      </button>
      <div class="flex flow-row ai-center gap-sm">
        <button class="ms-button is-outlined is-error" @click.prevent="toggle">
          <span class="ms-button__label">Cancel</span>
        </button>
        <button class="ms-button is-filled" @click.prevent="page += 1" x-show="page <= 1">
          <span class="ms-button__label">Next</span>
        </button>
        <button class="ms-button is-filled" type="submit" x-show="page === 2">
          <span class="ms-button__label">Submit</span>
        </button>
      </div>
    </div>
  </form>
</section>