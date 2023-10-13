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

    public function edit(TaskModel $task)
    {
        $this->task = $task;
    }

    public function done(TaskModel $task)
    {
        $task->update(['done' => !$task->done]);
        $this->mount();
    }

    public function save()
    {
        $this->validate();

        $this->task->save();

        $this->mount();

<<<<<<< HEAD
        session()->flash('message', 'Tarea guardada correctamente!');
=======
        $this->emitUp('taskSaved', 'Tarea guardada correctamente!');
    }

    public function delete($id)
    {
        $taskToDelete = TaskModel::find($id);

        if (!is_null($taskToDelete)) {
            $taskToDelete->delete();
            $this->emitUp('taskSaved', 'Tarea eliminada correctamente!');
            $this->mount();
        }
>>>>>>> 962000fa518c8bb8440fb70f6cf88a19a33bd256
    }

    public function render()
    {
        return view('livewire.task');
    }
}
