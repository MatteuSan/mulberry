<div class="flex flow-column gap-md">
  @if($users->count() >= 1)
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
      />
    @endforeach
  @else
    <div class="grid pi-center border-xs border-surface-600 ink-surface-600">
      <p>No users to load.</p>
    </div>
  @endif
</div>