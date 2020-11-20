<div class="container mx-auto">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

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
                        <button class="bg-blue-500 hover:bg-blue-700  mb-2 text-white font-bold px4 py-2 rounded w-full">Editar</button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold px4 py-2 rounded">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
