<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Task
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6 lg:p-8">

                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="list-disc list-inside text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-label for="title" value="Title" />
                        <x-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title', $task->title) }}" required />
                    </div>

                    <div>
                        <x-label for="description" value="Description (optional)" />
                        <textarea id="description" name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">{{ old('description', $task->description) }}</textarea>
                    </div>

                    <div>
                        <x-label for="priority" value="Priority" />
                        <select id="priority" name="priority" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200" required>
                            <option value="low" {{ old('priority', $task->priority) === 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ old('priority', $task->priority) === 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ old('priority', $task->priority) === 'high' ? 'selected' : '' }}>High</option>
                        </select>
                    </div>

                    <div>
                        <x-label for="due_date" value="Due Date (optional)" />
                        <x-input id="due_date" name="due_date" type="date" class="mt-1 block w-full" value="{{ old('due_date', $task->due_date?->format('Y-m-d')) }}" />
                    </div>

                    <div class="flex items-center gap-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="is_completed" value="1" {{ $task->is_completed ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring focus:ring-indigo-200">
                            <span class="ms-2 text-gray-700">Mark as completed</span>
                        </label>

                        <div class="flex-grow"></div>

                        <x-button type="submit">
                            Update Task
                        </x-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
