<section class="flex flow-column wrap-none gap-md">
  <div class="flex flow-row wrap-none jc-space-between ai-center gap-xl">
    <form class="w-full flex flow-row wrap-none jc-start ai-center gap-sm">
      <label class="ms-form-field">
        <span class="ms-form-field__label">Search a user...</span>
        <input
          type="text"
          class="ms-form-field__input"
          placeholder="Search a user..."
          name="query"
          value="{{ old('query') }}"
          wire:model.live.debounce.500ms="searchQuery"
          required
        />
      </label>
      <label class="ms-select-field">
        <span class="ms-select-field__label">Role</span>
        <select name="role" class="ms-select-field__input" wire:model.live="roleFilter">
          <option value="all">All</option>
          @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ $role->title }}</option>
          @endforeach
        </select>
      </label>
    </form>
    <button class="ms-button is-inverted is-filled" @click="toggle">
      <i class="ms-button__icon">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
      </i>
      <span class="ms-button__label">Add</span>
    </button>
  </div>
  <section
    :class="`mu-modal__overlay${open ? ' is-open' : ''}`"
    x-transition.opacity
    x-show="open"
    x-on:user-list-updated.window="open = false"
  >
    <div class="mu-modal" @click.outside="toggle">
      <section class="w-full fill-surface-200 ink-surface-ink p-xl r-lg">
        <div class="flex flow-row jc-center ai-center mt-md mb-2xl gap-md">
          <h2 class="title" style="text-align: center">Add User</h2>
        </div>
        <livewire:admin.manage-users.register-form />
      </section>
    </div>
  </section>
  <div class="flex flow-column gap-md">
    @if($users->count() > 0)
      @foreach($users as $user)
        <livewire:admin.manage-users.card
          :id="$user->id"
          :prefix="$user->prefix"
          :first-name="$user->first_name"
          :middle-name="$user->middle_name"
          :last-name="$user->last_name"
          :suffix="$user->suffix"
          :role="$user->role()->firstOrFail()->title"
          :created-at="$user->created_at"
          :wire:key="$user->id"
        />
      @endforeach
    @else
      <div class="grid pi-center border-xs border-surface-600 ink-surface-600">
        <p>No users to load.</p>
      </div>
    @endif
  </div>
  <div class="flex flow-row jc-center ai-center gap-md">
    {{ $users->links('components.livewire.components.ms-pagination') }}
  </div>
</section>