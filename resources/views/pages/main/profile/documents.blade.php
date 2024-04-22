@extends('layouts.main')

@section('title', 'My Documents')

@section('content')
  <main class="content-wrap">
    <section class="mu-pathbar">
      <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
      <a class="mu-pathbar__item" wire:navigate href="{{ route('profile') }}" role="link">Profile</a>
      <span class="mu-pathbar__item">My Documents</span>
    </section>
    <h1 class="supertitle mt-md @medium:mt-xl mb-md">My Documents</h1>
    <section>
      <div class="w-full grid pi-center px-lg py-3xl r-md ink-surface-600" style="border: 1px solid var(--ms-theme-primary-600);">
        <p>No documents to load.</p>
      </div>
    </section>
  </main>
@endsection