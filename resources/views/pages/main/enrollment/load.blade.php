@extends('layouts.main')

@section('title', 'My Load')

@section('content')
  <main class="content-wrap">
    <section class="mu-pathbar">
      <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
      <a class="mu-pathbar__item" wire:navigate href="{{ route('enrollment') }}" role="link">Enrollment</a>
      <span class="mu-pathbar__item">My Load</span>
    </section>
    <h1 class="supertitle mt-md @medium:mt-xl">My Load</h1>
    <livewire:enrollment.load.section />
    @if(!$isRequestApproved)
      <h2 class="subtitle">Available Courses</h2>
      <livewire:enrollment.load.courses-list />
    @endif
  </main>
@endsection