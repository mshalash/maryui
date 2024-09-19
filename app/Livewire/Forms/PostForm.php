<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Post;
use Livewire\Attributes\Rule;


class PostForm extends Form
{
    public ?Post $post;

    #[Rule('required')]
    public $title;
    
    #[Rule('required')]
    public $slug;

    #[Rule('required')]
    public $content;

    public function setPost(Post $post){
        $this->post = $post;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->content = $post->content;
    }


    public function store()
    {
        $this->validate();

        Post::create([
            'title'=> $this->title,
            'slug'=> $this->slug,
            'content'=> $this->content,
        ]);
        $this->reset();
    }

    public function update()
    {
        
        $this->validate();

        $this->post->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
        ]);

        $this->reset();
    }
    
}
