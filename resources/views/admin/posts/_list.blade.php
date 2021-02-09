{{--
  Variables disponibles
    - $posts ARRAY(Post)
--}}

@foreach ($posts as $post)
  <tr>
    <td class="border px-4 py-2">{{ $post->id }}</td>
    <td class="border px-4 py-2">{{ $post->title }}</td>
    <td class="border px-4 py-2">{!! Str::of($post->content)->limit(25) !!}</td>
    <td class="border px-4 py-2">{{ $post->image }}</td>
    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($post->created_at)->format('j.m.y') }}</td>
    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($post->updated_at)->format('j.m.y') }}</td>
    <td class="border px-4 py-2">{{ $post->categorie->name }}</td>
    <td class="border px-4 py-2">
      <a href="{{ route('admin.posts.edit', $post->id) }}" class="block py-2">Editer</a> <hr>
      <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="block py-2 text-red-500">Supprimer</button>
      </form>
    </td>
  </tr>
@endforeach
