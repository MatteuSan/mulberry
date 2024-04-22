@extends('layouts.main')

@section('title', 'Profile')

@section('content')
  <main class="content-wrap">
    <section class="mu-pathbar">
      <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
      <span class="mu-pathbar__item">Profile</span>
    </section>
    <section class="grid cols-1 @large:cols-3 gap-lg">
      <div class="flex flow-column gap-sm jc-start">
        <h1 class="supertitle mt-md @medium:mt-xl mb-md">My Profile</h1>
        <ul class="ms-list">
          <li class="ms-list__item"><b>{{ "$user->first_name $user->middle_name $user->last_name" }}</b></li>
          @if($user->student) <li class="ms-list__item">{{ $user->student->number }}</li> @endif
          @if($user->staff) <li class="ms-list__item">{{ $user->staff->number }}</li> @endif
        </ul>
        <x-ms-button link="/edit" type="filled small fullwidth">Edit Profile</x-ms-button>
      </div>
      <div class="@medium:start-2 @medium:end-3">
        <h1 class="supertitle mt-md @medium:mt-xl mb-md">My Documents</h1>
        <div class="w-full grid pi-center px-lg py-3xl r-md ink-surface-600" style="border: 1px solid var(--ms-theme-primary-600);">
          <p>No documents to load.</p>
        </div>
      </div>
    </section>
  </main>
@endsection