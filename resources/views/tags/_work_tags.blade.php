{{--
  Variables disponibles:
    - $tags ARRAY(Tag)
 --}}

  @foreach ($tags as $tag)
    {{ $tag->name }},
  @endforeach
