<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task as TaskModel;

class Task extends Component
{
    public $tasks;
    public TaskModel $task;

    protected $rules = ['task.text' => 'required|max:40'];

    public function mount()
    {
        $this->tasks = TaskModel::get(); //orderBy('id', 'desc')->
        $this->task = new TaskModel();
    }

    public function updatedTaskText()
    {
        $this->validate(['task.text' => 'max:40']);
    }

    public function save()
    {
        $this->validate();

        $this->task->save();

        $this->mount();

        session()->flash('message', 'Tarea guardada correctamente!');
    }

    public function render()
    {
        return view('livewire.task');
    }
}
