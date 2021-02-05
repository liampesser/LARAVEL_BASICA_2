@extends('templates.index')


{{-- TITLE DE LA PAGE --------}}
@section('title')
  Home
@endsection


{{-- ZONE CONTENT --------}}
@section('content')

  {{-- VUE DU SLIDER --------}}
  @include('works._slider', ['works' => \App\Models\Work::where('inSlider', 1)->orderBy('created_at', 'DESC')->take(3)->get()])

  <!-- Our Portfolio -->
  <div class="section section-white">
    <div class="container">
      <div class="row">

        {{-- VUE DES RECENT WORKS --------}}
        @include('works._recent', ['works' => \App\Models\Work::orderBy('created_at', 'DESC')->take(6)->get()])

      </div>
    </div>
  </div>
  <!-- Our Portfolio -->

  <!-- Our Articles -->
  <div class="section">
    <div class="container">
      <div class="row">
        <!-- Featured News -->
        <div class="col-sm-6 featured-news">
          {{-- VUE DES LATEST POSTS --}}
          @include('posts._latest', ['posts' => \App\Models\Post::orderBy('created_at', 'DESC')->take(3)->get()])
        </div>
        <!-- End Featured News -->

        <!-- Latest News Twitter -->
        <div class="col-sm-6 latest-news">
          {{-- VUE DES LATEST POSTS TWITTER --------}}
          @include('twitter_posts._latest')
        </div>
        <!-- End Featured News -->
      </div>
    </div>
  </div>

@endsection
