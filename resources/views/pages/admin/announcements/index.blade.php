<?php
use function Laravel\Folio\{middleware};

middleware(['admin']);
?>

@extends('layouts.main')

@section('title', 'Announcements - Admin')

@section('content')
<main class="content-wrap relative" x-data="announcementModal(false)">
  <section class="mu-pathbar">
    <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
    <a class="mu-pathbar__item" wire:navigate href="{{ route('admin') }}" role="link">Admin</a>
    <span class="mu-pathbar__item">Manage Announcements</span>
  </section>
  <h1 class="supertitle mt-md @medium:mt-xl">Manage Announcements</h1>
  <div class="flex flow-row wrap-none jc-space-between ai-center">
    <h2 class="title mb-sm">All announcements</h2>
    <button class="ms-button is-inverted is-filled" @click="toggle">
      <i class="ms-button__icon">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
      </i>
      <span class="ms-button__label">Create</span>
    </button>
  </div>
  <section
    :class="`mu-modal__overlay${ open ?' is-open' : ''}`"
    x-show="open"
    x-transition.opacity
  >
    <div class="mu-modal" @click.outside="toggle">
      <livewire:admin.announcement.form />
    </div>
  </section>
  <livewire:admin.announcement.section />
</main>
@endsection