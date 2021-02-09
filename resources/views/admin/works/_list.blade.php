{{--
  Variables disponibles
    - $works ARRAY(Work)
--}}

@foreach ($works as $work)
  <tr>
    <td class="border px-4 py-2">{{ $work->id }}</td>
    <td class="border px-4 py-2">{{ $work->title }}</td>
    <td class="border px-4 py-2">{!! Str::of($work->content)->limit(25) !!}</td>
    <td class="border px-4 py-2">{{ $work->image }}</td>
    <td class="border px-4 py-2">{{ ($work->inSlider === 1) ? 'Oui' : 'Non' }}</td>
    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($work->created_at)->format('j.m.y') }}</td>
    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($work->updated_at)->format('j.m.y') }}</td>
    <td class="border px-4 py-2">{{ $work->client->name }}</td>
    <td class="border px-4 py-2">@include('tags._work_tags', ['tags' => $work->tags])</td>
    <td class="border px-4 py-2">
      <a href="#" class="block py-2">Editer</a> <hr>
      <form action="#" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="block py-2 text-red-500">Supprimer</button>
      </form>
    </td>
  </tr>
@endforeach
