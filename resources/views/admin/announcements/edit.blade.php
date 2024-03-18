@extends('layouts.main')

@section('title', 'Edit Announcement - Admin')

@section('content')
  <main class="content-wrap">
    <livewire:announcement.admin.edit :announcement="$announcement" :title="$announcement->title" :content="$announcement->content" />
  </main>
@endsection