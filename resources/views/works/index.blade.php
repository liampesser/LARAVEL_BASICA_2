{{--
  Variables disponibles
  - $works ARRAY(Work)
 --}}

@extends('templates.index')
@extends('templates.hero')

{{-- TITLE DE LA PAGE --}}
@section('title')
  Portfolio
@endsection

{{-- TITLE DU HERO --}}
@section('heroTitle')
  Our Portfolio
@endsection

{{-- SCRIPT DU MORE POST --}}
@section('scripts')
  <script src="{{ asset('assets/js/works/index.js')}}"></script>
@endsection

{{-- ZONE CONTENT --}}
@section('content')

  <div class="section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2>We are leading company</h2>
					<h3>Specializing in Wordpress Theme Development</h3>
					<p>
						Donec elementum mi vitae enim fermentum lobortis. In hac habitasse platea dictumst. Ut pellentesque, orci
						sed mattis consequat, libero ante lacinia arcu, ac porta lacus urna in lorem. Praesent consectetur tristique
						augue, eget elementum diam suscipit id. Donec elementum mi vitae enim fermentum lobortis.
					</p>
				</div>
			</div>
		</div>
	</div>

  {{-- VUE DES CARDS DES WORKS --}}
  @include('works._cards')

@endsection
