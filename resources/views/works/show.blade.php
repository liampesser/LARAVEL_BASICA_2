{{--
  Variables disponibles
  - $works ARRAY(Work)
 --}}

@extends('templates.index')
@extends('templates.hero')

{{-- TITLE DE LA PAGE --}}
@section('title')
  Portfolio | {{ $work->title }}
@endsection

{{-- TITLE DU HERO --}}
@section('heroTitle')
  Work Details
@endsection

{{-- ZONE CONTENT --}}
@section('content')

  <div class="section">
    <div class="container">
      <div class="row">
        <!-- Product Image & Available Colors -->
        <div class="col-sm-6">
          <div class="product-image-large">
            <img src="{{ asset('assets/img/portfolio/' . $work->image . '.jpg') }}" alt="{{ $work->title }}">
          </div>
          <div class="colors">
            <span class="color-white"></span>
            <span class="color-black"></span>
            <span class="color-blue"></span>
            <span class="color-orange"></span>
            <span class="color-green"></span>
          </div>
        </div>
        <!-- End Product Image & Available Colors -->
        <!-- Product Summary & Options -->
        <div class="col-sm-6 product-details">
          <h2>{{ $work->title }}</h2>
        <h3>Quick Overview</h3>
          <p>{{ $work->content }}</p>
        <h3>Project Details</h3>
        <p><strong>Client: </strong>{{ $work->client->name }}</p>
        <p><strong>Date: </strong>{{ \Carbon\Carbon::parse($work->created_at)->format('F j, Y') }}</p>
        <p><strong>Tags: </strong>@include('tags._work_tags', ['tags' => $work->tags])</p>
        </div>
        <!-- End Product Summary & Options -->

      </div>
    </div>
  </div>

  <hr>

  {{-- VUE SIMILAR WORKS --}}
  @include('works._similar', ['works' => \App\Models\Work::whereHas('tags', function ($query) use ($work) {
    return $query->whereIn('name', $work->tags->pluck('name'));
    })
    ->where('id', '!=', $work->id)
    ->take(4)
    ->get()])

@endsection
