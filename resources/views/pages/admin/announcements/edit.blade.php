@extends('layouts.main')

@section('title', 'Edit Announcement - Admin')

@section('content')
  <main class="content-wrap">
    <livewire:admin.announcement.edit :announcement="$announcement" :title="$announcement->title" :content="$announcement->content" />
  </main>
@endsection