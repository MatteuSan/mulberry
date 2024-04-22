@extends('layouts.main')

@section('title', 'Enrollment')

@section('content')
  <main class="content-wrap">
    <section class="mu-pathbar">
      <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
      <span class="mu-pathbar__item">Enrollment</span>
    </section>
    <h1 class="supertitle mt-md @medium:mt-xl">Enrollment</h1>
  </main>
@endsection