<?php
use function Laravel\Folio\name;

name('login');
?>

@extends('layouts.auth')

@section('title', 'Login')

@section('content')
  <section class="w-full fill-surface-200 ink-surface-ink p-xl r-lg">
    <div class="flex flow-row jc-center ai-center mt-md mb-2xl gap-md">
      <img style="max-height: 55px;" src="{{ asset('/img/mapua-logo.png') }}" alt="Mapua University logo." />
      <h2 class="title" style="text-align: center">Institution Login</h2>
    </div>
    <livewire:auth.login-form />
  </section>
@endsection