{{--
  Variables disponibles
    - $categories ARRAY(Categorie)
--}}

@php
  $categories = \App\Models\Categorie::orderBy('name', 'ASC')->get();
@endphp

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
          {{ __('Ajout d\'un post') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="my-2 text-left py-2">
                    <a href="{{ route('admin.posts.index') }}" class="text-blue-400">Revenir sur la gestion des posts</a>
                  </div>
                  <h3 class="my-2 text-left py-2 text-2xl">Données du post</h3>
                  <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                      <label for="title">Titre</label>
                    </div>
                    <div class="mb-2">
                      <input type="text" name="title" id="title">
                    </div>
                    <div>
                      <label for="content">Contenu</label>
                    </div>
                    <div class="mb-2">
                      <textarea name="content" id="content"></textarea>
                    </div>
                    <div>
                      <label for="image">Image</label>
                    </div>
                    <div class="mb-2">
                      <input type="file" name="image" id="image">
                    </div>
                    <div>
                      <label for="categorie">Catégorie</label>
                    </div>
                    <div class="mb-2">
                      <select name="categorie_id" id="categorie_id">
                        @foreach ($categories as $categorie)
                          <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-2">
                      <button class="h-10 px-5 my-2 transition-colors duration-150 bg-blue-400 rounded-lg focus:shadow-outline hover:bg-blue-500 text-white">Valider</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
