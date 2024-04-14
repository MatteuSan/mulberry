@extends('layouts.main')

@section('title', 'Edit User - Admin')

@section('content')
  <main class="content-wrap">
    <livewire:admin.manage-users.edit
      :user="$user"
      :prefix="$user->prefix"
      :first-name="$user->first_name"
      :middle-name="$user->middle_name"
      :last-name="$user->last_name"
      :suffix="$user->suffix"
      :email="$user->email"
      :dob="$user->dob"
      :batch="$user->student?->batch"
      :program="$user->student?->program?->slug"
      :role="$user->role->slug"
    />
  </main>
@endsection