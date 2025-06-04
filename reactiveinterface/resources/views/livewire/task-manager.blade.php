<div>
    <div class="max-w-md mx-auto mt-10">
        <form wire:submit.prevent="createTask" class="mb-4">
            <div class="flex gap-2">
                <input
                    wire:model="name"
                    type="text"
                    class="border rounded p-2 w-full"
                    placeholder="Enter task name"
                >
                <button
                    type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                >
                    Add Task
                </button>
            </div>
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </form>

        <div class="space-y-2">
            @foreach ($tasks as $task)
                <div class="flex items-center justify-between p-2 border rounded">
                    <div class="flex items-center gap-2">
                        <input
                            type="checkbox"
                            wire:click="toggleComplete({{ $task->id }})"
                            {{ $task->completed ? 'checked' : '' }}
                            class="h-5 w-5"
                        >
                        <span class="{{ $task->completed ? 'line-through text-gray-500' : '' }}">
                            {{ $task->name }}
                        </span>
                    </div>
                    <button
                        wire:click="deleteTask({{ $task->id }})"
                        class="text-red-500 hover:text-red-700"
                    >
                        Delete
                    </button>
                </div>
            @endforeach
        </div>
    </div>
</div>
