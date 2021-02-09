{{--
  Variables disponibles
    - $posts ARRAY(Post)
--}}

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
          {{ __('Gestion des posts') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="my-2 text-left py-2">
                    <a href="{{ route('dashboard') }}" class="text-blue-400">Revenir sur le dashboard</a>
                  </div>
                  <h3 class="my-2 text-left py-2 text-2xl">Liste des posts</h3>
                  <div class="my-2 text-left py-2">
                    <a href="{{ route('admin.posts.create') }}">Ajouter un enregistrement</a>
                  </div>
                  <table class="table auto">
                    <thead>
                      <tr class="bg-gray-600 text-white">
                        <th class="border text-left px-4 py-2">Id</th>
                        <th class="border text-left px-4 py-2">Title</th>
                        <th class="border text-left px-4 py-2">Content</th>
                        <th class="border text-left px-4 py-2">Image</th>
                        <th class="border text-left px-4 py-2">Created at</th>
                        <th class="border text-left px-4 py-2">Updated at</th>
                        <th class="border text-left px-4 py-2">Categorie</th>
                        <th class="border text-left px-4 py-2">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($posts as $post)
                        <tr>
                          <td class="border px-4 py-2">{{ $post->id }}</td>
                          <td class="border px-4 py-2">{{ $post->title }}</td>
                          <td class="border px-4 py-2">{!! Str::of($post->content)->limit(50) !!}</td>
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
                    </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
