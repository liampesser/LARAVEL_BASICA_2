{{--
  Variables disponibles
    - $works ARRAY(Work)
--}}

<section id="main-slider" class="no-margin">
    <div class="carousel slide">
        <ol class="carousel-indicators">
          @foreach ($works as $index => $work)
            <li data-target="#main-slider" data-slide-to="{{ $index }}" class="{{ ($index === 0) ? 'active' : '' }}"></li>
          @endforeach
        </ol>
        <div class="carousel-inner">

          {{-- VUE DES SLIDES --------}}
          @include('works._slide')
        </div>
        <!--/.carousel-inner-->
    </div>
    <!--/.carousel-->

    <!-- BOUTONS DU SLIDER -->
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="icon-angle-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="icon-angle-right"></i>
    </a>
</section><!--/#main-slider-->
