<div class="w-full flex flow-row wrap-none jc-start ai-center gap-sm">
  <label class="ms-form-field">
    <span class="ms-form-field__label">Search a user...</span>
    <input
      type="text"
      class="ms-form-field__input"
      placeholder="Search a user..."
      name="query"
      value="{{ old('query') }}"
      wire:model.live="query"
      required
    />
  </label>
  <label class="ms-select-field">
    <span class="ms-select-field__label">Filter</span>
    <select name="role_id" class="ms-select-field__input" wire:model.live="filter" required>
      <option value="name">Name</option>
      <option value="email">Email</option>
      <option value="role_id">Role</option>
    </select>
  </label>
  {{ $query, $filter }}
  @foreach($results as $result)
    {{ $result->name }}
  @endforeach
</div>