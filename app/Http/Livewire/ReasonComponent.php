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
        $this->reset(['description' ,'client_id']);
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

}
