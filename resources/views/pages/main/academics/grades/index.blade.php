@extends('layouts.main')

@section('title', 'My Grades')

@section('content')
  <main class="content-wrap">
    <section class="mu-pathbar">
      <a class="mu-pathbar__item" wire:navigate href="{{ route('home') }}" role="link">Home</a>
      <a class="mu-pathbar__item" wire:navigate href="{{ route('academics') }}" role="link">Academics</a>
      <span class="mu-pathbar__item">My Grades</span>
    </section>
    <h1 class="supertitle mt-md @medium:mt-xl">My Grades</h1>
    <table class="mu-table">
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
            <td class="align-center">{{ $courses->where('id', $grade->course_id)->first()->slug }}</td>
            <td class="align-center">{{ round($grade->grade, 2) }}</td>
            <td class="align-center">{{ $grade->completion_grade }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </main>
@endsection