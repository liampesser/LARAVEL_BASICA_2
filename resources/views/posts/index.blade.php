{{--
  Variables disponibles
    - $posts ARRAY(Post)
--}}

@extends('templates.index')
@extends('templates.hero')

{{-- TITLE DE LA PAGE --}}
@section('title')
  Blog
@endsection

{{-- TITLE DU HERO --}}
@section('heroTitle')
  Our Blog
@endsection

{{-- ZONE CONTENT --}}
@section('content')
  <div class="section">
    <div class="container">
      <div class="row">

        {{-- VUE DES CARDS DES POSTS --}}
        @include('posts._cards')

        <!-- Pagination -->
        <div class="pagination-wrapper ">
          <ul class="pagination pagination-sm">
            {{-- https://laracasts.com/discuss/channels/laravel/laravel-55-pagination-for-bootstrap-4 --}}
            {!! $posts->links() !!}
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection
