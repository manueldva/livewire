<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Post;

use Livewire\WithPagination;

class PostComponet extends Component
{

	use WithPagination;
    
	public $name, $body, $post_id;

    public $isOpen = 0;


	protected $rules = [
		'name'=> 'required',
		'body'=> 'required'
	];

	protected $messages = [
		'name.required'=> 'El campo nombre no puede estar vacio',
		'body.required'=> 'El campo body no puede estar vacio'
	];


    public function render()
    {
        $posts = Post::latest('id')->paginate(10);
        return view('livewire.posts.post-componet', compact('posts'));
    }


    public function create()
    {
        $this->reset(['name','body','post_id']);
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

    	
        Post::updateOrCreate(['id' => $this->post_id], [
            'name' => $this->name,
            'body' => $this->body
        ]);
  
        session()->flash('message', 
            $this->post_id ? 'Post actualizado correctamente.' : 'Post creado correctamente.');
  
        $this->closeModal();
        $this->reset(['name','body','post_id']);
    	
    }

    public function edit(post $post){

    	$this->name= $post->name;
    	$this->body= $post->body;
    	$this->post_id= $post->id;

        $this->openModal();
    }


  
    public function destroy(post $post){

    	$post->delete();
    	$this->reset(['name','body','post_id']);
        session()->flash('message', 'Post eliminado correctamente.');
    }
}
