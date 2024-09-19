<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Livewire\Forms\PostForm;

class PostIndex extends Component
{
    public PostForm $form;
    public bool $postModal = false;
    public bool $editMode = false;
    public bool $drawer = false;
    
    public function showModal()
    {
        $this->form->reset();
        $this->editMode = false;
        $this->postModal = true;
    }

    public function closeModal()
    {
        $this->postModal = false;
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $this->form->setPost($post);
        $this->editMode =true;
        $this->postModal = true;
    }

    public function save()
    {
        if($this->editMode){
            $this->form->update();
            $this->editMode = false;
        }else{
            $this->form->store();
        }
        $this->postModal = false;

    }

    public function delete($id)
    {
        Post::find($id)->delete();
    }

    public $headers = [
        ['key' => 'id', 'label' => '#', 'class' => 'bg-red-100 w-1'],
        ['key' => 'title', 'label' => 'Title'],
        ['key' => 'slug', 'label' => 'Slug'] ,
        ['key' => 'edit', 'label' => 'Edit'] ,
        ['key' => 'delete', 'label' => 'Delete'] ,
        
    ];

    public function render()
    {
        return view('livewire.post-index',[
            'posts' => Post::all(),
            'headers' => $this->headers,
        ]);
    }
    
}
