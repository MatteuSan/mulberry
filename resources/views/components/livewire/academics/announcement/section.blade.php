<section class="flex flow-column gap-md mt-sm">
  @if($announcements->count() !== 0)
    @foreach($announcements as $announcement)
      @if($currentPassFilter($announcement))
        <livewire:academics.announcement.card
          :id="$announcement->id"
          :title="$announcement->title"
          :content="$announcement->content"
          :created_at="$announcement->created_at"
          :updated_at="$announcement->updated_at"
          :is-unread="!auth()->user()->readAnnouncements()->get()->contains('announcement_id', $announcement->id)"
          :author="$announcement->user()->first()->fullName()"
          wire:key="{{ $announcement->id }}"
          :key="$announcement->id"
        />
      @endif
    @endforeach
  @else
    <div class="grid pi-center border-xs border-surface-600 ink-surface-600">
      <p>No announcements to load.</p>
    </div>
  @endif
  <div class="w-full grid pi-center">
    {{ $announcements->links('components.livewire.components.ms-pagination') }}
  </div>
</section>