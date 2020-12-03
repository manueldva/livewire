<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Client;

use Livewire\WithPagination;

class ClientComponet extends Component
{

    use WithPagination;
    
    public $search = '';
    public $type = 'name';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    
    public $name, $address, $cellPhone, $phone, $email, $client_id;

    
    public $isOpen = 0;


	protected $rules = [
		'name'=> 'required',
        'address'=> 'required',
        'cellPhone'=> 'required|integer',
        'phone'=> 'integer'
	];

	protected $messages = [
		'name.required'=> 'El campo nombre no puede estar vacio',
        'address.required'=> 'El campo direccion no puede estar vacio',
        'cellPhone.required'=> 'El campo celular no puede estar vacio',
        'cellPhone.integer'=> 'El celular debe ser un número entero.',
        'phone.integer'=> 'El telefono phone debe ser un número entero.',
	];


    public function render()
    {
        $clients = Client::latest('id')->where($this->type ,'like', '%' . $this->search . '%')->paginate(5);
        return view('livewire.clients.client-componet', compact('clients'));
    }


    public function create()
    {
        $this->reset(['name','address','cellPhone','phone','email' ,'client_id']);
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }



    public function store() {

    	$this->validate();

    	
        Client::updateOrCreate(['id' => $this->client_id], [
            'name' => $this->name,
            'address' => $this->address,
            'cellPhone' => $this->cellPhone,
            'phone' => $this->phone,
            'email' => $this->email
        ]);
  
        session()->flash('message', 
            $this->client_id ? 'Cliente actualizado correctamente.' : 'Cliente creado correctamente.');
  
        $this->closeModal();
        $this->reset(['name','address','cellPhone','phone','email' ,'client_id']);
    	
    }

    public function edit(client $client){

    	$this->name= $client->name;
    	$this->address= $client->address;
        $this->cellPhone= $client->cellPhone;
        $this->phone= $client->phone;
        $this->email= $client->email;
        $this->client_id= $client->id;
        

        $this->openModal();
    }


  
    public function destroy(client $client){

    	$client->delete();
    	$this->reset(['name','address','client_id']);
        session()->flash('message', 'Cliente eliminado correctamente.');
    }
}
