<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Post;

class PostComponet extends Component
{
    
	public $name, $body, $post_id;

	public $accion="store";

    public function render()
    {
        $posts = Post::latest('id')->paginate();
        return view('livewire.post-componet', compact('posts'));
    }

    public function store() {

    	Post::create([
    		'name'=> $this->name,
    		'body'=> $this->body
    	]);

    	$this->reset(['name','body']);
    	
    }

    public function edit(post $post){

    	$this->name= $post->name;
    	$this->body= $post->body;
    	$this->post_id= $post->id;
    	$this->accion = "update";
    }


    public function update(){

    	$post = Post::find($this->post_id);
    	$post->update([
    		'name'=> $this->name,
    		'body'=> $this->body
    	]);

    	$this->reset(['name','body','post_id','accion']);
    }

    public function default(){

    	$this->reset(['name','body','post_id','accion']);
    }


    public function destroy(post $post){

    	$post->delete();
    	$this->reset(['name','body','post_id','accion']);
    }
}
