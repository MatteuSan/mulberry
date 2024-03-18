@extends('layouts.main')

@section('title', 'Announcements')

@section('content')
  <main class="content-wrap">
    <section class="my-xl">
      <section class="mu-pathbar mb-lg">
        <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
        <a class="mu-pathbar__item" wire:navigate href="{{ route('academics') }}" role="link">Academics</a>
        <span class="mu-pathbar__item">Announcements</span>
      </section>
      <h1 class="supertitle">Announcements</h1>
      <div class="flex flow-column gap-md mt-sm">
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
        @else
          <div class="grid pi-center border-xs border-surface-600 ink-surface-600">
            <p>No announcements to load.</p>
          </div>
        @endif
      </div>
    </section>
  </main>
@endsection