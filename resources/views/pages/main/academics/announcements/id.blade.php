@extends('layouts.main')

@section('title', 'Announcement')

@section('content')
  <main class="content-wrap">
    <section class="mu-pathbar">
      <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
      <a class="mu-pathbar__item" wire:navigate href="{{ route('academics') }}" role="link">Academics</a>
      <a class="mu-pathbar__item" wire:navigate href="{{ route('academics.announcements') }}" role="link">Announcements</a>
      <span class="mu-pathbar__item">{{ $announcement->title }}</span>
    </section>
    <h1 class="supertitle mt-md @medium:mt-xl">{{ $announcement->title }}</h1>
    <h2 class="mu-subtitle mt-sm">Posted on {{ $announcement->created_at->format('F j, Y') }} by {{ $author->name }}</h2>
    <section class="markdown mb-xl">
      {!! Str::markdown($announcement->content, ['allow_unsafe_links' => false]) !!}
    </section>
  </main>
@endsection