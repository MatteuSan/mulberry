@extends('layouts.main')

@section('title', 'Home')

@section('content')
<main class="content-wrap">
  <h1 class="supertitle">Welcome, Mapuan!</h1>
  <section id="announcements">
    <h2 class="title" style="margin-top: 15px">Announcements</h2>
    <div class="mu-alert">
      <p class="mu-alert__label">1 new announcement from the university!</p>
      <button class="mu-alert__action" type="button">Read</button>
    </div>
    <div class="content-feed" style="margin-top: 10px">
      <div class="mu-card">
        <div class="mu-card__content">
          <h2 class="mu-card__title">Announcement Title</h2>
          <p class="mu-card__preview-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet iusto modi optio pariatur quibusdam veritatis. At odio praesentium tempore totam voluptates? Accusamus harum veritatis voluptate. Debitis magnam quia vero?</p>
        </div>
        <footer class="mu-card__actions">
          <button class="mu-button" type="button">Read more</button>
        </footer>
      </div>
    </div>
  </section>
</main>
@endsection