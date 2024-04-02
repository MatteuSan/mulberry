<?php
use function Laravel\Folio\{middleware};

middleware(['admin']);
?>

@extends('layouts.main')

@section('title', 'Register Student / User')

@section('content')
  <main class="content-wrap relative" x-data="registerModal(false)">
    <section class="mu-pathbar">
      <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
      <a class="mu-pathbar__item" wire:navigate href="{{ route('admin') }}" role="link">Admin</a>
      <span class="mu-pathbar__item">Manage Users</span>
    </section>
    <h1 class="supertitle mt-md @medium:mt-xl">Manage Users</h1>
    <div class="flex flow-row wrap-none jc-space-between ai-center gap-xl">
      <livewire:admin.manage-users.search />
      <button class="ms-button is-inverted is-filled" @click="toggle">
        <i class="ms-button__icon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
          </svg>
        </i>
        <span class="ms-button__label">Add</span>
      </button>
    </div>
    <section
      :class="`mu-modal__overlay${open ? ' is-open' : ''}`"
      x-transition.opacity
      x-show="open"
    >
      <div class="mu-modal" @click.outside="toggle">
        <section class="w-full fill-surface-200 ink-surface-ink p-xl r-lg">
          <div class="flex flow-row jc-center ai-center mt-md mb-2xl gap-md">
            <h2 class="title" style="text-align: center">Add User</h2>
          </div>
          <livewire:admin.manage-users.register-form />
        </section>
      </div>
    </section>
    <livewire:admin.manage-users.section />
  </main>
@endsection