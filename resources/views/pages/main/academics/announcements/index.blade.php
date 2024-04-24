@extends('layouts.main')

@section('title', 'Announcements')

@section('content')
  <main class="content-wrap">
    <section class="mu-pathbar">
      <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
      <a class="mu-pathbar__item" wire:navigate href="{{ route('academics') }}" role="link">Academics</a>
      <span class="mu-pathbar__item">Announcements</span>
    </section>
    <h1 class="supertitle mt-md @medium:mt-xl">Announcements</h1>
    <livewire:academics.announcement.section />
  </main>
@endsection