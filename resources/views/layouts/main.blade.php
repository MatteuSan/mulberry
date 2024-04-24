<!doctype html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title') - Mulberry</title>
  @vite('resources/scss/main.scss')
  @vite('resources/js/app.js')

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/img/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/img/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/img/favicon-16x16.png') }}">

  <meta name="robots" content="noindex, nofollow">

  @livewireStyles
</head>
<body>
<header class="mu-header">
  <div class="mu-header__wrapper">
    <a wire:navigate href="{{ route('home') }}">
      <img src="{{ asset('/img/mapua-logo.png') }}" alt="logo" class="mu-logo">
    </a>
    <nav class="mu-appbar">
      <ul class="mu-appbar__list{{ auth()->user()->hasRole('superuser') ? ' is-superuser' : '' }}">
        <x-mu-appbar-item route="home">
          <x-slot:icon>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
          </x-slot:icon>
          Home
          <x-slot:dropdown></x-slot:dropdown>
        </x-mu-appbar-item>
        <x-mu-appbar-item route="academics">
          <x-slot:icon>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
            </svg>
          </x-slot:icon>
          Academics
          <x-slot:dropdown>
            <x-mu-appbar-dropdown-item route="academics.announcements">
              Announcements
            </x-mu-appbar-dropdown-item>
            @visible('staff|superuser')
              <x-mu-appbar-dropdown-item route="admin.announcements">
                Manage Announcements
              </x-mu-appbar-dropdown-item>
            @endvisible
            @visible('student')
              <x-mu-appbar-dropdown-item route="academics.announcements">
                My Grades
              </x-mu-appbar-dropdown-item>
              <x-mu-appbar-dropdown-item route="academics.announcements">
                My Schedule
              </x-mu-appbar-dropdown-item>
            @endvisible
          </x-slot:dropdown>
        </x-mu-appbar-item>
        <x-mu-appbar-item route="enrollment">
          <x-slot:icon>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
          </x-slot:icon>
          Enrollment
          <x-slot:dropdown>
            @visible('student')
              <x-mu-appbar-dropdown-item route="enrollment.load">
                My Load
              </x-mu-appbar-dropdown-item>
              {{--<x-mu-appbar-dropdown-item route="enrollment">
                Payments
              </x-mu-appbar-dropdown-item>--}}
            @endvisible
            @visible('staff|superuser')
              <x-mu-appbar-dropdown-item route="enrollment">
                 Manage Load Requests
              </x-mu-appbar-dropdown-item>
            @endvisible
          </x-slot:dropdown>
        </x-mu-appbar-item>
        @visible('superuser')
          <x-mu-appbar-item route="admin">
            <x-slot:icon>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
              </svg>
            </x-slot:icon>
            Admin
            <x-slot:dropdown>
              <x-mu-appbar-dropdown-item route="admin.manage-users">
                Manage Users
              </x-mu-appbar-dropdown-item>
            </x-slot:dropdown>
          </x-mu-appbar-item>
        @endvisible
        <x-mu-appbar-item route="profile">
          <x-slot:icon>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
          </x-slot:icon>
          Profile
          <x-slot:dropdown>
            <x-mu-appbar-dropdown-item route="profile.edit">
              Edit Profile
            </x-mu-appbar-dropdown-item>
            <x-mu-appbar-dropdown-item route="profile.documents">
              My Documents
            </x-mu-appbar-dropdown-item>
            <x-mu-appbar-dropdown-item route="logout">
              Logout
            </x-mu-appbar-dropdown-item>
          </x-slot:dropdown>
        </x-mu-appbar-item>
      </ul>
    </nav>
  </div>
</header>
<div class="flex flow-row wrap-none border-error-200 fill-error-300 ink-error-ink p-md body" wire:offline>
  <p style="width: 100%; max-width: 1077px;" class="my-none mx-auto">Connection has been lost. You are viewing the content offline.</p>
</div>
@yield('content')
@livewireScripts
<script type="text/javascript">
  document.addEventListener('alpine:init', () => {
    Alpine.data('registerModal', () => ({
      open: false,
      toggle() {
        this.open = ! this.open
      }
    }));
    Alpine.data('announcementModal', () => ({
      open: false,
      toggle() {
        this.open = ! this.open
      }
    }));
  })
</script>
</body>
</html>