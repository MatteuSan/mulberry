@extends('layouts.main')

@section('title', 'Academics')

@section('content')
  <main class="content-wrap">
    <section class="mu-pathbar">
      <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
      <span class="mu-pathbar__item">Academics</span>
    </section>
    <h1 class="supertitle mt-md @medium:mt-xl">Academics</h1>
    <section class="grid cols-1 @medium:cols-2 gap-md">
      <section id="announcements">
        <h2 class="title mt-sm">Announcements</h2>
        <div class="flex flow-column gap-md mt-md">
          @if($announcements->count() >= 1)
            @foreach($announcements->take(2) as $announcement)
              <livewire:academics.announcement.card
                :id="$announcement->id"
                :title="$announcement->title"
                :content="$announcement->content"
                :created_at="$announcement->created_at"
                :updated_at="$announcement->updated_at"
                :is-unread="!$announcements_read->contains('announcement_id', $announcement->id)"
                :author="$announcement->user()->first()->fullName()"
              />
            @endforeach
            @if($announcements->count() >= 2)
              <div class="grid pi-center border-xs border-surface-600">
                <a wire:navigate href="{{ route('academics.announcements') }}"
                   class="ms-button is-outlined is-inverted is-fullwidth" role="link">
                  <span class="ms-button__label">View all announcements</span>
                </a>
              </div>
            @endif
          @else
            <div class="grid pi-center px-lg py-3xl r-md ink-surface-600"
                 style="border: 1px solid var(--ms-theme-primary-600);">
              <p>No announcements to load.</p>
            </div>
          @endif
        </div>
      </section>
      @visible('student')
      <section id="grades">
        <h2 class="title mt-sm">My Grades</h2>
        <div class="mt-md">
          @if($grades && $grades->count() != 0)
            <table class="mu-table w-full">
              <thead>
              <tr>
                <th>Course</th>
                <th>Grade</th>
                <th>Completion</th>
              </tr>
              </thead>
              <tbody>
              @foreach($grades as $grade)
                <tr>
                  <td class="align-center">{{ $gradedCourses->where('id', $grade->course_id)->first()->slug }}</td>
                  <td class="align-center">{{ round($grade->grade, 2) }}</td>
                  <td class="align-center">{{ $grade->completion_grade }}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          @else
            <div class="grid pi-center px-lg py-3xl r-md ink-surface-600"
                 style="border: 1px solid var(--ms-theme-primary-600); text-align: center">
              <p>Your grades are not yet available.</p>
            </div>
          @endif
        </div>
      </section>
      @endvisible
    </section>
    @visible('student')
    <section id="schedule">
      <h2 class="title mt-sm">My Schedule</h2>
      <div class="mt-md">
        @if($schedules && $schedules->count() != 0)
          <section style="overflow-x: auto">
            <livewire:academics.schedule.table />
          </section>
          <div class="mt-sm">
            <x-ms-button link="academics.schedule" type="outlined fullwidth">
              Edit schedule
            </x-ms-button>
          </div>
        @else
          <div class="grid pi-center px-lg py-3xl r-md ink-surface-600"
               style="border: 1px solid var(--ms-theme-primary-600); text-align: center">
            <p>Your schedule is not yet available. <br/> Click <a href="{{ route('academics.schedule') }}"
                                                                  class="mu-link">here</a> to edit your schedule</p>
          </div>
        @endif
      </div>
    </section>
    @endvisible
  </main>
@endsection