
 <div>
     
     <div class="bg-gray-800 pt-3 mb-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2">Posts</h3>
        </div>
    </div>

    <div class="container mx-auto">
        {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
         <div class="bg-white rounded-lg shadow overflow-hidden max-w-4xl mx-auto py-4 px-6 mb-3">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-xl">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <button wire:click="create()" class="form-btn"> Crear Post </button>
             @if($isOpen)
                @include('livewire.posts.create')
            @endif
        </div>
        <div class="bg-white rounded-lg shadow overflow-hidden max-w-4xl mx-auto mb-3">
            <table>
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr class="text-xs font-medium text-gray-500 uppercase text-left tracking-wider">
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Nombre</th>
                        <th class="px-6 py-3">Body</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($posts as $post)
                        <tr class="text-sm text-gray-500">
                            <td class="px-6 py-4">{{ $post->id }}</td>
                            <td class="px-6 py-4">{{ $post->name }}</td>
                            <td class="px-6 py-4">{{ $post->body }}</td>
                            <td class="px-6 py-4">
                                <button wire:click="edit({{ $post }})" class="form-btn mb-2 w-full">Editar</button>
                                <button wire:click="destroy({{ $post }})" class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 py-2 rounded">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="bg-gray-100 px-6 py-4 border-t border-gray-200">
                {{ $posts->links() }}
            </div>
        </div>
        
    </div>

</div>