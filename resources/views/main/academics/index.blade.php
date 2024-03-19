@extends('layouts.main')

@section('title', 'Academics')

@section('content')
  <main class="content-wrap">
    <section class="mu-pathbar">
      <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
      <span class="mu-pathbar__item">Academics</span>
    </section>
    <h1 class="supertitle mt-md @medium:mt-xl">Academics</h1>
    <section id="announcements">
      <h2 class="title mt-sm">Announcements</h2>
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
              :author="$announcement->user()->first()->name"
            />
          @endforeach
          @if($announcements->count() >=3)
            <div class="grid pi-center border-xs border-surface-600">
              <a wire:navigate href="{{ route('academics.announcements') }}"
                 class="ms-button is-outlined is-inverted is-fullwidth" role="link">
                <span class="ms-button__label">View all announcements</span>
              </a>
            </div>
          @endif
        @else
          <div class="grid pi-center px-lg py-3xl r-md ink-surface-600" style="border: 1px solid var(--ms-theme-primary-600);">
            <p>No announcements to load.</p>
          </div>
        @endif
      </div>
    </section>
  </main>
@endsection