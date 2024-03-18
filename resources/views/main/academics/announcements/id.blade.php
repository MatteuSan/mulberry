@extends('layouts.main')

@section('title', 'Announcement')

@section('content')
  <main class="content-wrap">
    <section class="mt-xl">
      <section class="mu-pathbar mb-lg">
        <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
        <a class="mu-pathbar__item" wire:navigate href="{{ route('academics') }}" role="link">Academics</a>
        <a class="mu-pathbar__item" wire:navigate href="{{ route('academics.announcements') }}" role="link">Announcements</a>
        <span class="mu-pathbar__item">{{ $announcement->title }}</span>
      </section>
      <h1 class="supertitle">{{ $announcement->title }}</h1>
      <section class="markdown mb-xl">
        {!! Str::markdown($announcement->content, ['allow_unsafe_links' => false]) !!}
      </section>
    </section>
  </main>
@endsection