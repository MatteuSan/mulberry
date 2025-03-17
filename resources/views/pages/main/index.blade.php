@extends('layouts.main')

@section('title', 'Home')

@section('content')
  <main class="content-wrap">
    <section class="mu-pathbar">
      <span class="mu-pathbar__item" style="color: rgba(0, 0, 0, 0)">Home</span>
    </section>
    <h1 class="supertitle mt-md @medium:mt-xl">Welcome, {{ auth()->user()->first_name }}!</h1>
    <section class="grid cols-1 @large:cols-3 gap-lg">
      <section id="links">
        <h2 class="title mt-sm mb-md">Quick Links</h2>
        <ul class="flex flow-row wrap gap-sm" style="list-style: none">
          <li>
            <a href="#" class="ms-button is-outlined is-small is-inverted">Facebook Page</a>
          </li>
        </ul>
      </section>
      <section id="announcements" class="@large:start-2 @large:end-3">
        <h2 class="title mt-sm mb-md">Announcements</h2>
        @if($announcements_all->count() >= 1 && $announcements_read->count() < $announcements_all->count())
          <section>
            <div class="mu-alert my-sm">
              <p class="mu-alert__label">{{ $announcements_all->count() - $announcements_read->count() }} new {{ $pluralize('announcement', 'announcements', $announcements_all->count() - $announcements_read->count()) }} from the university!</p>
              <button wire:confirm="Are you sure you want all announcements to be marked as read? (This cannot be undone)" class="ms-button is-small" type="button">Read all</button>
            </div>
            <div class="flex flow-column gap-md mt-md">
              @if($announcements->count() >= 1)
                @foreach($announcements as $announcement)
                  <livewire:academics.announcement.card
                    :id="$announcement->id"
                    :title="$announcement->title"
                    :content="$announcement->content"
                    :created_at="$announcement->created_at"
                    :updated_at="$announcement->updated_at"
                    :author="$announcement->user()->first()->first_name"
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
          <section class="mt-md">
            <div class="grid pi-center px-lg py-3xl r-md ink-surface-600" style="border: 1px solid var(--ms-theme-primary-600);">
              <p>No announcements to load. Click <a wire:navigate class="mu-link" href="{{ route('academics.announcements') }}">here</a> to see the archives.</p>
            </div>
          </section>
        @endif
      </section>
      @visible('student')
        <section id="schedule" class="@large:start-2 @large:end-3">
          <h2 class="title mt-sm mb-md">My Schedule</h2>
          <section style="max-width: calc(100svw - 50px); overflow-x: auto;">
            <livewire:academics.schedule.table is-minimized="true" />
          </section>
        </section>
      @endvisible
    </section>
  </main>
@endsection