
 <div>
     
    <div class="bg-gray-800 pt-3 mb-3">
       <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
           <h3 class="font-bold pl-2">Razones</h3>
       </div>
   </div>

   <div class="container mx-auto">
       {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
       <div class="bg-white rounded-lg shadow overflow-hidden max-w-4xl mx-auto py-4 px-6 mb-3">
           @if (session()->has('message'))
               <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                 <div class="flex">
                   <div class="mx-auto">
                     <p class="text-xl">{{ session('message') }}</p>
                   </div>
                 </div>
               </div>
           @endif
           <div class="mx-auto">
               <button wire:click="create()" class="form-btn"> Registrar Razon</button>
               <select class="border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="type">
                   <option value="description">Seleccionar</option>
                   <option value="id">Codigo</option>
                   <option value="description">Descripcion</option>
               </select>
               <input type="text" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="search" placeholder="Ingrese una razon" wire:model="search">
           </div>
           
           
           @if($isOpen)
               @include('livewire.reasons.create')
           @endif
       </div>
       <div class="bg-white rounded-lg shadow overflow-hidden max-w-4xl mx-auto mb-3">
           <table class="table-fixed w-full">
               <thead>
                   <tr class="bg-gray-100">
                       <th class="px-4 py-2 w-20">ID</th>
                       <th class="px-4 py-2">Descripcion</th>
                       <th class="px-4 py-2 mx-auto"></th>
                   </tr>
               </thead>
               <tbody>
                   @foreach($reasons as $reason)
                   <tr>
                       <td class="border px-4 py-2">{{ $reason->id }}</td>
                       <td class="border px-4 py-2">{{ $reason->description }}</td>
                       <td class="border px-4 py-2">
                           <button wire:click="edit({{ $reason->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-1"><i class="fas fa-edit"></i></button>
                           <button wire:click="destroy({{ $reason->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-trash-alt"></i></button>
                       </td>
                   </tr>
                   @endforeach
               </tbody>
           </table>
           <div class="bg-gray-100 px-6 py-4 border-t border-gray-200">
               {{ $reasons->links() }}
           </div>
       </div>
       
   </div>

</div>