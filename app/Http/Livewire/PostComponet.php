<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Post;

use Livewire\WithPagination;

class PostComponet extends Component
{

	use WithPagination;
    
	public $name, $body, $post_id;

	public $accion="store";

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
        return view('livewire.post-componet', compact('posts'));
    }

    public function store() {

    	$this->validate();

    	Post::create([
    		'name'=> $this->name,
    		'body'=> $this->body
    	]);

    	$this->reset(['name','body']);

    	session()->flash('message', 'Post creado correctamente.');
    	
    }

    public function edit(post $post){

    	$this->name= $post->name;
    	$this->body= $post->body;
    	$this->post_id= $post->id;
    	$this->accion = "update";
    }


    public function update(){

    	$this->validate();
    	
    	$post = Post::find($this->post_id);
    	$post->update([
    		'name'=> $this->name,
    		'body'=> $this->body
    	]);

    	$this->reset(['name','body','post_id','accion']);

    	 session()->flash('message', 'Post actualizado correctamente.');
    }

    public function default(){

    	$this->reset(['name','body','post_id','accion']);
    }


    public function destroy(post $post){

    	$post->delete();
    	$this->reset(['name','body','post_id','accion']);
    }
}
