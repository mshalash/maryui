<?php

namespace App\Livewire;

use Livewire\Component;

class Navigation extends Component
{
    public bool $drawer;
    public function render()
    {
        return view('livewire.navigation');
    }
}
