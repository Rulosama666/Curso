<?php

namespace App\Livewire;

use Livewire\Component;

class Maim extends Component
{

    public $welcome = "Bienvenid@, estas son tus tareas";

    protected $listeners = ['taskSaved'];

    public function taskSaved($message)
    {
        session()->flash('message', $message);
    }

    public function render()
    {
        return view('livewire.maim');
    }
}
