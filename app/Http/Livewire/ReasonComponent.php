<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reason;

use Livewire\WithPagination;

class ReasonComponent extends Component
{
    use WithPagination;
    
    public $search = '';
    public $type = 'description';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $description, $reason_id;

    
    public $isOpen = 0;

    protected $rules = [
		'description'=> 'required',
	];

	protected $messages = [
		'name.required'=> 'El campo descripcion no puede estar vacio'
	];


    public function render()
    {
        $reasons = Reason::latest('id')->where($this->type ,'like', '%' . $this->search . '%')->paginate(5);
        return view('livewire.reasons.reason-component', compact('reasons'));

    }

    public function create()
    {
        $this->reset(['description' ,'reason_id']);
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

    	
        Reason::updateOrCreate(['id' => $this->reason_id], [
            'description' => $this->description
        ]);
  
        session()->flash('message', 
            $this->reason_id ? 'Cliente actualizado correctamente.' : 'Cliente creado correctamente.');
  
        $this->closeModal();
        $this->reset(['description','reason_id']);
    	
    }

    public function edit(reason $reason){

    	$this->description= $reason->description;
        
        $this->openModal();
    }


  
    public function destroy(reason $reason){

    	$reason->delete();
    	$this->reset(['description','reason_id']);
        session()->flash('message', 'Razon eliminado correctamente.');
    }

}
