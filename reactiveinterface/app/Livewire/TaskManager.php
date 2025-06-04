<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskManager extends Component
{
    public $tasks;
    public $name = '';

    public function mount()
    {
        $this->tasks = Task::all();
    }

    public function createTask()
    {
        $this->validate([
            'name' => 'required|min:3',
        ]);

        Task::create([
            'name' => $this->name,
            'completed' => false,
        ]);

        $this->name = '';
        $this->tasks = Task::all();
    }

    public function toggleComplete($taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->update([
            'completed' => !$task->completed,
        ]);

        $this->tasks = Task::all();
    }

    public function deleteTask($taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->delete();

        $this->tasks = Task::all();
    }

    public function render()
    {
        return view('livewire.task-manager');
    }
}
