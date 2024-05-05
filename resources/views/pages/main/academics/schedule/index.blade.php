@extends('layouts.main')

@section('title', 'Schedule')

@section('content')
  <main class="content-wrap">
    <section class="mu-pathbar">
      <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
      <a class="mu-pathbar__item" wire:navigate href="{{ route('academics') }}" role="link">Academics</a>
      <span class="mu-pathbar__item">Schedule</span>
    </section>
    <h1 class="supertitle mt-md @medium:mt-xl">Schedule</h1>
    <livewire:academics.schedule.section />
  </main>
@endsection