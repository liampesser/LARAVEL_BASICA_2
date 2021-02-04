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
            <li class="disabled"><a href="#">Previous</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">Next</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection
