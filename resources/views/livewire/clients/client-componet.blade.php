
 <div>
     
     <div class="bg-gray-800 pt-3 mb-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h3 class="font-bold pl-2">Clientes</h3>
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
            <button wire:click="create()" class="form-btn"> Registrar Cliente</button>
            @if($isOpen)
                @include('livewire.clients.create')
            @endif
        </div>
        <div class="bg-white rounded-lg shadow overflow-hidden max-w-4xl mx-auto mb-3">
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">ID</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Direccion</th>
                        <th class="px-4 py-2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td class="border px-4 py-2">{{ $client->id }}</td>
                        <td class="border px-4 py-2">{{ $client->name }}</td>
                        <td class="border px-4 py-2">{{ $client->address }}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $client->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-1">Editar</button>
                            <button wire:click="destroy({{ $client->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="bg-gray-100 px-6 py-4 border-t border-gray-200">
                {{ $clients->links() }}
            </div>
        </div>
        
    </div>

</div>