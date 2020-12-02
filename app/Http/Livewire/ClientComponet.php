<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Client;

use Livewire\WithPagination;

class ClientComponet extends Component
{

	use WithPagination;
    
	public $name, $address, $cellPhone, $phone, $email, $client_id;

    public $isOpen = 0;


	protected $rules = [
		'name'=> 'required',
        'address'=> 'required',
        'cellPhone'=> 'required',
        'phone'=> 'required'
	];

	protected $messages = [
		'name.required'=> 'El campo nombre no puede estar vacio',
        'address.required'=> 'El campo direccion no puede estar vacio',
        'cellPhone.required'=> 'El campo celular no puede estar vacio',
        'phone.required'=> 'El campo telefono no puede estar vacio'
	];


    public function render()
    {
        $clients = Client::latest('id')->paginate(10);
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
