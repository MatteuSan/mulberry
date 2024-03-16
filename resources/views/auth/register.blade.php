@extends('layouts.auth')

@section('title', 'Register Student / User')

@section('content')
  <header>
    <h2>Register</h2>

    <form>
      @csrf
    </form>
  </header>
@endsection