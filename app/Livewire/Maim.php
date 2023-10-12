<?php

namespace App\Livewire;

use Livewire\Component;

class Maim extends Component
{

    public $welcome = "Bienvenido estas son tus tareas";
    public function render()
    {
        return view('livewire.maim');
    }
}
