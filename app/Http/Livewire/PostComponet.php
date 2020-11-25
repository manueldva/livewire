<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Post;

class PostComponet extends Component
{
    
	public $name, $body;

    public function render()
    {
        $posts = Post::latest('id')->get();
        return view('livewire.post-componet', compact('posts'));
    }

    public function store() {

    	Post::create([
    		'name'=> $this->name,
    		'body'=> $this->body
    	]);

    	$this->name ="";
    	$this->body ="";
    	
    }
}
