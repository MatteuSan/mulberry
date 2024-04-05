@extends('layouts.main')

@section('title', 'Admin')

@section('content')
  <main class="content-wrap">
    <section class="mu-pathbar">
      <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
      <span class="mu-pathbar__item">Admin</span>
    </section>
    <h1 class="supertitle mt-md @medium:mt-xl">Admin Panel</h1>
    <section class="grid cols-1 @medium:cols-2 @large:cols-3 gap-md ji-center">
      <x-ms-button type="outlined fullwidth fullheight" link="admin.manage-users">Manage Users</x-ms-button>
      <x-ms-button type="outlined fullwidth fullheight" link="admin.announcements">Manage Announcements</x-ms-button>
    </section>
  </main>
@endsection