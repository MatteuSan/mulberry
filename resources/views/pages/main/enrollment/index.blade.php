@extends('layouts.main')

@section('title', 'Enrollment')

@section('content')
  <main class="content-wrap">
    <section class="mu-pathbar">
      <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
      <span class="mu-pathbar__item">Enrollment</span>
    </section>
    <h1 class="supertitle mt-md @medium:mt-xl">Enrollment</h1>
    <section class="grid cols-1 @large:cols-3 gap-lg">
      <div>
        <h2 class="title mb-sm">Status Board</h2>
        <ul class="ms-list">
          <li class="ms-list__item">
            <b>Load: </b>
            @if($isRequestApproved === null)
              <p class="flex ai-center gap-sm"><span class="fill-surface-400 ink-surface-ink px-sm py-xs r-sm small">Not-yet submitted</span></p>
            @else
              @if(!$isRequestApproved)
                <p class="flex ai-center gap-sm"><span class="fill-accent-400 ink-accent-ink px-sm py-xs r-sm small">Awaiting approval</span></p>
              @else
                <p class="flex ai-center gap-sm"><span class="fill-success-400 ink-success-ink px-sm py-xs r-sm small">Approved</span></p>
              @endif
            @endif
          </li>
          <li class="ms-list__item">
            <b>Payment: </b>
            @if($isRequestApproved === null)
              <p class="flex ai-center gap-sm"><span class="fill-surface-400 ink-surface-ink px-sm py-xs r-sm small">Not-yet paid</span></p>
            @else
              @if(!$isRequestApproved)
                <p class="flex ai-center gap-sm"><span class="fill-accent-400 ink-accent-ink px-sm py-xs r-sm small">Awaiting confirmation</span></p>
              @else
                <p class="flex ai-center gap-sm"><span class="fill-success-400 ink-success-ink px-sm py-xs r-sm small">Paid</span></p>
              @endif
            @endif
          </li>
        </ul>
      </div>
      <div class="start-2 end-3">
        <h2 class="title mb-sm">My Load</h2>
        @if($load->count() > 0)
          <livewire:enrollment.load.load-table :load="$load" is-request-open="true" />
          @if(!$isRequestApproved) <x-ms-button link="enrollment.load" type="outlined fullwidth">Edit load</x-ms-button> @endif
        @else
          <div class="w-full grid pi-center px-lg py-3xl r-md ink-surface-600" style="border: 1px solid var(--ms-theme-primary-600);">
            <p>No courses loaded. Add courses <a class="mu-link" href="{{ route('enrollment.load') }}">here</a>.</p>
          </div>
        @endif
      </div>
    </section>
  </main>
@endsection