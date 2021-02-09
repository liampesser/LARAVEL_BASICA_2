{{--
  Variables disponibles
    - $clients : ARRAY(Client)
    - $tags : ARRAY(Tag)
--}}

@php
  $clients = \App\Models\Client::orderBy('name', 'ASC')->get();
  $tags = \App\Models\Tag::orderBy('name', 'ASC')->get();
@endphp

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
          {{ __('Edition d\'un work') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="my-2 text-left py-2">
                    <a href="{{ route('admin.works.index') }}" class="text-blue-400">Revenir sur la gestion des works</a>
                  </div>
                  <h3 class="my-2 text-left py-2 text-2xl">Données du work</h3>
                  <form action="{{ route('admin.works.update', $work->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    {{-- TITRE --------}}
                    <div class="mb-1">
                      <label for="title">Titre</label>
                    </div>
                    <div class="mb-4 w-3/12">
                      <input class="w-full border" type="text" name="title" id="title" value="{{ $work->title }}">
                    </div>
                    {{-- CONTENU --------}}
                    <div>
                      <label for="content">Contenu</label>
                    </div>
                    <div class="mb-4 w-4/12">
                      <textarea class="w-full border h-32" name="content" id="content">{{ $work->content }}</textarea>
                    </div>
                    {{-- IMAGE --------}}
                    <div class="mb-1">
                      <label for="image">Image {{ $work->image }}</label>
                    </div>
                    <div class="mb-4">
                      <input type="file" name="image" id="image">
                    </div>
                    {{-- INSLIDER --------}}
                    <div class="mb-1">
                      <label for="inSlider">In Slider</label>
                    </div>
                    <div class="mb-4">
                      <select name="inSlider" id="inSlider">
                        <option value="1" {{ ($work->inSlider === 1) ? 'selected' : '' }}>Oui</option>
                        <option value="2" {{ ($work->inSlider === 0) ? 'selected' : '' }}>Non</option>
                      </select>
                    </div>
                    {{-- CLIENT --------}}
                    <div class="mb-1">
                      <label for="client">Client</label>
                    </div>
                    <div class="mb-4">
                      <select name="client_id" id="client_id">
                        @foreach ($clients as $client)
                          <option class="w-full border" value="{{ $client->id }}" {{ ($client->id === $work->client_id) ? 'selected' : '' }}>
                            {{ $client->name }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                    {{-- TAGS --------}}
                    <div>
                      <label for="tags">Tags</label>
                    </div>
                    @foreach ($tags as $tag)
                      <div class="pl-4 mb-1">
                        <input type="checkbox" name="tags[]" id="{{ $tag->name }}" value="{{ $tag->id }}"
                         @foreach ($work->tags as $workTag)
                           {{ $workTag->id === $tag->id ? 'checked' : '' }}
                         @endforeach>
                        <label for="{{ $tag->name }}">{{ $tag->name }}</label>
                      </div>
                    @endforeach
                    {{-- BOUTON SUBMIT --------}}
                    <div class="mt-4 w-2/12">
                      <button class="w-full h-10 px-5 my-2 transition-colors duration-150 bg-blue-400 rounded-lg focus:shadow-outline hover:bg-blue-500 text-white">Valider</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
