@extends('layouts.main')

@section('title', 'Home')

@section('content')
  <main class="content-wrap">
    <section class="mu-pathbar">
      <span class="mu-pathbar__item" style="color: rgba(0, 0, 0, 0)">Home</span>
    </section>
    <h1 class="supertitle mt-md @medium:mt-xl">Welcome, Mapuan!</h1>
    <h2 class="title mt-sm">Announcements</h2>
    @if($announcements_all->count() >= 1 && $announcements_read->count() < $announcements_all->count())
      <section id="announcements">
        <div class="mu-alert my-sm">
          <p class="mu-alert__label">{{ $announcements_all->count() - $announcements_read->count() }} new {{ $pluralize('announcement', 'announcements', $announcements_all->count() - $announcements_read->count()) }} from the university!</p>
          <button wire:confirm="Are you sure you want all announcements to be marked as read? (This cannot be undone)" class="ms-button is-small is-error" type="button">Read all</button>
        </div>
        <div class="flex flow-column gap-md mt-md">
          @if($announcements->count() >= 1)
            @foreach($announcements as $announcement)
              <livewire:announcement.card
                :id="$announcement->id"
                :title="$announcement->title"
                :content="$announcement->content"
                :created_at="$announcement->created_at"
                :updated_at="$announcement->updated_at"
                :author="$announcement->user_id"
                :is-unread="!$announcements_read->contains('announcement_id', $announcement->id)"
              />
            @endforeach
            @if($announcements_all->count() - $announcements_read->count() > 2)
              <div class="grid pi-center border-xs border-surface-600">
                <a wire:navigate href="{{ route('academics.announcements') }}"
                   class="ms-button is-outlined is-inverted is-fullwidth" role="link">
                  <span class="ms-button__label">View all announcements</span>
                </a>
              </div>
            @endif
          @endif
        </div>
      </section>
    @else
      <div class="grid pi-center px-lg py-3xl r-md ink-surface-600" style="border: 1px solid var(--ms-theme-primary-600);">
        <p>No announcements to load. Click <a wire:navigate class="mu-link" href="{{ route('academics.announcements') }}">here</a> to see the archives.</p>
      </div>
    @endif
  </main>
  <script type="text/javascript">
    document.addEventListener('alpine:init', () => {
      Alpine.data('registerModal', () => ({
        open: false,
        toggle() {
          this.open = ! this.open
        }
      }));
      Alpine.data('announcementModal', () => ({
        open: false,
        toggle() {
          this.open = ! this.open
        }
      }));
    })
  </script>
@endsection