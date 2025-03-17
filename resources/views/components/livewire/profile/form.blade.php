<div class="w-full fill-surface-200 ink-surface-ink p-lg @medium:p-xl r-lg my-xl">
  <h2 class="title mb-md">Edit profile</h2>
  <form class="flex flow-column gap-md" wire:submit="edit">
    @csrf
    <x-ms-form-field wire:model="prefix" name="prefix" type="text" value="{{ $user->prefix }}" label="Prefix" />
    <x-ms-form-field wire:model="firstName" name="first-name" type="text" value="{{ $user->first_name }}" label="First Name" />
    <x-ms-form-field wire:model="middleName" name="middle-name" type="text" value="{{ $user->middle_name }}" label="Middle Name (if applicable)" />
    <x-ms-form-field wire:model="lastName" name="last-name" type="text" value="{{ $user->last_name }}" label="Last Name" />
    <x-ms-form-field wire:model="suffix" name="suffix" type="text" value="{{ $user->suffix }}" label="Suffix" />

    <div class="flex flow-row wrap-none gap-sm jc-end ai-center">
      <x-ms-button link="/profile" type="outlined error" wire:click.prevent>Cancel</x-ms-button>
      <x-ms-button type="filled" native="submit">Save</x-ms-button>
    </div>
  </form>
</div>