@extends('layouts.main')

@section('title', 'Announcements - Admin')

@section('content')
<main class="content-wrap">
  <livewire:announcement.admin.form />
  <h2 class="title mb-sm">All announcements</h2>
  <livewire:announcement.admin.section />
</main>
@endsection