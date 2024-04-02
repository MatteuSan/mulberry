<div class="flex flow-column gap-md">
  @if($announcements->count() >= 1)
    @foreach($announcements as $announcement)
      <livewire:admin.announcement.card
        :id="$announcement->id"
        :title="$announcement->title"
        :content="$announcement->content"
        :created_at="$announcement->created_at"
        :updated_at="$announcement->updated_at"
        :author="$announcement->user()->first()->first_name"
      />
    @endforeach
  @else
    <div class="grid pi-center border-xs border-surface-600 ink-surface-600">
      <p>No announcements to load.</p>
    </div>
  @endif
</div>