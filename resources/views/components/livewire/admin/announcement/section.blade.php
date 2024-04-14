<div class="flex flow-column gap-md">
  @forelse($announcements as $announcement)
    <livewire:admin.announcement.card
      :id="$announcement->id"
      :title="$announcement->title"
      :content="$announcement->content"
      :created_at="$announcement->created_at"
      :updated_at="$announcement->updated_at"
      :author="$announcement->user()->first()->fullName()"
      :wire:key="$announcement->id"
    />
  @empty
    <div class="grid pi-center border-xs border-surface-600 ink-surface-600">
      <p>No announcements to load.</p>
    </div>
  @endforelse
</div>