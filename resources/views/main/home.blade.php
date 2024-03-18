@extends('layouts.main')

@section('title', 'Home')

@section('content')
  <main class="content-wrap">
    <h1 class="supertitle mt-md @medium:mt-xl @large:mt-2xl">Welcome, Mapuan!</h1>
    @if($announcements_all->count() >= 1 && $announcements_read->count() < $announcements_all->count())
      <section id="announcements">
        <h2 class="title mt-sm">Announcements</h2>
        <div class="mu-alert my-sm">
          <p class="mu-alert__label">{{ $announcements_all->count() - $announcements_read->count() }} new {{ $pluralize('announcement', 'announcements', $announcements_all->count() - $announcements_read->count()) }} from the university!</p>
          <a href="{{ route('academics.announcements') }}" class="ms-button is-small" role="link">Read all</a>
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
                :is-unread="!$announcements_read->contains('announcement_id', $announcement->id)"
              />
            @endforeach
            @if($announcements->count() > 2)
              <div class="grid pi-center border-xs border-surface-600">
                <a wire:navigate href="{{ route('academics.announcements') }}"
                   class="ms-button is-outlined is-inverted is-fullwidth" role="link">
                  <span class="ms-button__label">View all announcements</span>
                </a>
              </div>
            @endif
        </div>
      </section>
    @else
      <div class="grid pi-center border-xs border-surface-600 ink-surface-600">
        <p>No announcements to load. Click <a href="{{ route('academics.announcements') }}">here</a> to see the archives.</p>
      </div>
    @endif
    @endif
  </main>
@endsection