<?php

namespace App\Livewire;


use App\Models\Task;
use Livewire\Component;

class TaskComponent extends Component
{
    public $tasks = [];
    public $title;
    public $description;
    public $modal = false;
    public $editingTaskId = null;

    public function render()
    {
        return view('livewire.task-component');
    }

    public function mount()
    {
        $this->tasks = Task::where('user_id', auth()->user()->id)->get();
    }

    private function clearFields()
    {
        $this->title = '';
        $this->description = '';
    }

    public function openCreateModal()
    {
        $this->clearFields();
        $this->modal = true;
        $this->editingTaskId = null;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function createTask()
    {

        if ($this->editingTaskId) {
            $task = Task::find($this->editingTaskId);
            $task->title = $this->title;
            $task->description = $this->description;
            $task->save();
        } else {

            $task = new Task();
            $task->title = $this->title;
            $task->description = $this->description;
            $task->user_id = auth()->user()->id;
            $task->save();
        }

        $this->clearFields();
        $this->modal = false;
        $this->mount();
    }

    public function editTask(Task $item)
    {
        $this->title = $item->title;
        $this->description = $item->description;
        $this->editingTaskId = $item->id;
        $this->modal = true;
    }

    public function deleteTask($id)
    {
        Task::find($id)->delete();
        $this->mount();
    }
}
