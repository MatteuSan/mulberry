@extends('layouts.main')

@section('title', 'Manage Users')

@section('content')
  <main class="content-wrap relative" x-data="registerModal(false)">
    <section class="mu-pathbar">
      <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
      <a class="mu-pathbar__item" wire:navigate href="{{ route('admin') }}" role="link">Admin</a>
      <span class="mu-pathbar__item">Manage Users</span>
    </section>
    <h1 class="supertitle mt-md @medium:mt-xl">Manage Users</h1>
    <livewire:admin.manage-users.section />
  </main>
@endsection