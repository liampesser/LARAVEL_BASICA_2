<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}"><img src={{ asset("assets/img/logo.png") }} alt="Basica"></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              {{-- https://apical.xyz/fiches/ou_sommes_nous/Identification_visuelle_pour_le_menu_actif --}}
                <li {!! Route::currentRouteName() == 'home' ? ' class="active"' : null !!}><a href="{{ route('home') }}">Home</a></li>
                <li {!! Str::contains(Route::currentRouteName(), 'works') ? ' class="active"' : null !!}><a href="{{ route('works.index') }}">Portfolio</a></li>
                <li {!! Str::contains(Route::currentRouteName(), 'posts') ? ' class="active"' : null !!}><a href="{{ route('posts.index') }}">Blog</a></li>
                <li {!! Str::contains(Route::currentRouteName(), 'contact') ? ' class="active"' : null !!}><a href="{{ route('contact') }}">Contact</a></li>
                @if (!Auth::check())
                  <li><a href="{{ route('login') }}">Log in</a></li>
                @endif
                @if (Auth::check())
                  <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @endif
            </ul>
        </div>
    </div>
</header><!--/header-->
