{{--
  Variables disponibles
    - $works ARRAY(Work)
--}}

<div class="section">
  <div class="container">
    <div class="row">

      <ul class="grid cs-style-2">
        @include('works._list')
      </ul>

    </div>

    {{-- VUE DE MORE WORKS --}}
    @include('works._more_btn')

  </div>
</div>
