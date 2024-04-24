@extends('layouts.main')

@section('title', 'Manage Requests')

@section('content')
  <main class="content-wrap">
    <section class="mu-pathbar">
      <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
      <a class="mu-pathbar__item" wire:navigate href="{{ route('enrollment') }}" role="link">Enrollment</a>
      <span class="mu-pathbar__item">Manage Request</span>
    </section>
    <h1 class="supertitle mt-md @medium:mt-xl">Manage Request</h1>
    <livewire:admin.enrollment.manage.form :load="$load" :id="$loadRequest->student_id" :request-id="$loadRequest->id" />
  </main>
@endsection