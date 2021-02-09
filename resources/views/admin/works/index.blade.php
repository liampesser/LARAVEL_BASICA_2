{{--
  Variables disponibles
    - $posts ARRAY(Post)
--}}

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
          {{ __('Gestion des works') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="my-2 text-left py-2">
                    <a href="{{ route('dashboard') }}" class="text-blue-400">Revenir sur le dashboard</a>
                  </div>
                  <h3 class="my-2 text-left py-2 text-2xl">Liste des works</h3>
                  <div class="my-2 text-left py-4">
                    <a href="{{ route('admin.works.create') }}" class="w-full py-2 px-4 transition-colors duration-150 bg-blue-400 rounded-lg focus:shadow-outline hover:bg-blue-500 text-white">
                      Ajouter un enregistrement
                    </a>
                  </div>
                  <table class="my-2 table auto">
                    <thead>
                      <tr class="bg-gray-600 text-white">
                        <th class="border text-left px-4 py-2">Id</th>
                        <th class="border text-left px-4 py-2">Title</th>
                        <th class="border text-left px-4 py-2">Content</th>
                        <th class="border text-left px-4 py-2">Image</th>
                        <th class="border text-left px-4 py-2">In Slider</th>
                        <th class="border text-left px-4 py-2">Created at</th>
                        <th class="border text-left px-4 py-2">Updated at</th>
                        <th class="border text-left px-4 py-2">Client</th>
                        <th class="border text-left px-4 py-2">Tags</th>
                        <th class="border text-left px-4 py-2">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @include('admin.works._list')
                    </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
