@extends('layouts.main')

@section('title', 'Edit Profile')

@section('content')
  <main class="content-wrap">
    <section class="mu-pathbar">
      <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
      <a class="mu-pathbar__item" wire:navigate href="{{ route('profile') }}" role="link">Profile</a>
      <span class="mu-pathbar__item">Edit Profile</span>
    </section>
    <livewire:profile.form />
  </main>
@endsection