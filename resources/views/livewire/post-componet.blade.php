<div class="container mx-auto">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div class="bg-white rounded-lg shadow overflow-hidden max-w-4xl mx-auto p-4 mb-6">

        <div class="mb-3">
            <label for="name" class="form-label mb-2">Nombre</label>
            <input wire:model="name" id="name" placeholder="Ingrese un nombre" class="form-control">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label mb-2">Descripcion</label>
            <textarea wire:model="body" id="body" rows="4" class="form-control" placeholder="Ingrese la descripcion del post"></textarea>
        </div>

        @if( $accion == 'store')
            <button wire:click="store" class="form-btn"> Crear Post </button>
        @else
            <button wire:click="update" class="form-btn"> Editar Post </button>
            <button wire:click="default" class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 py-2 rounded">Cancelar</button>
        @endif

    </div>

    <table class="bg-white rounded-lg shadow overflow-hidden max-w-4xl mx-auto">
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
</div>
