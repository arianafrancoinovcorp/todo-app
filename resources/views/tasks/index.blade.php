<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tasks
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
            <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 text-green-800 rounded-lg shadow-sm">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
            @endif

            <!-- Header with Create Button and Filters -->
            <div class="mb-6 flex flex-col lg:flex-row gap-4 items-start lg:items-center justify-between">
                <a href="{{ route('tasks.create') }}"
                    class="group inline-flex items-center px-6 py-3 bg-gradient-to-r from-yellow-400 to-amber-400 text-gray-900 font-semibold rounded-lg hover:from-yellow-500 hover:to-amber-500 transform hover:scale-105 transition-all duration-200 shadow-md hover:shadow-lg">
                    <svg class="w-5 h-5 mr-2 group-hover:rotate-90 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Create Task
                </a>

                <form method="GET" action="{{ route('tasks.index') }}" class="flex flex-wrap gap-3 items-center bg-white p-4 rounded-lg shadow-sm">
                    <div class="relative">
                        <select name="status" class="appearance-none border-gray-300 rounded-lg shadow-sm pl-4 pr-10 py-2 focus:border-yellow-400 focus:ring focus:ring-yellow-200 transition">
                            <option value="">All statuses</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        <svg class="absolute right-3 top-3 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>

                    <div class="relative">
                        <select name="priority" class="appearance-none border-gray-300 rounded-lg shadow-sm pl-4 pr-10 py-2 focus:border-yellow-400 focus:ring focus:ring-yellow-200 transition">
                            <option value="">All priorities</option>
                            <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>
                        </select>
                        <svg class="absolute right-3 top-3 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>

                    <input type="date" name="due_date" value="{{ request('due_date') }}"
                        class="border-gray-300 rounded-lg shadow-sm focus:border-yellow-400 focus:ring focus:ring-yellow-200 transition" />

                    <button type="submit"
                        class="inline-flex items-center px-5 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transform hover:scale-105 transition-all duration-200 shadow-sm hover:shadow-md">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                        </svg>
                        Filter
                    </button>

                    <a href="{{ route('tasks.index') }}"
                        class="inline-flex items-center px-5 py-2 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Clear
                    </a>
                </form>
            </div>

            <!-- Tasks List -->
            <div class="bg-gradient-to-br from-white to-gray-50 shadow-xl sm:rounded-xl p-6 space-y-4">
                @forelse($tasks as $task)
                <div class="group border border-gray-200 rounded-xl p-5 flex flex-col md:flex-row justify-between md:items-center gap-4 hover:shadow-lg hover:border-yellow-300 transition-all duration-200 bg-white">
                    <div class="flex-1">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 mt-1">
                                @if($task->priority === 'high')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        High
                                    </span>
                                @elseif($task->priority === 'medium')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                        </svg>
                                        Medium
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                        Low
                                    </span>
                                @endif
                            </div>
                            
                            <div class="flex-1">
                                <h3 onclick="openModal({{ $task->id }})" class="text-lg font-semibold text-gray-900 cursor-pointer hover:text-yellow-600 transition-colors duration-200 {{ $task->is_completed ? 'line-through text-gray-500' : '' }}">
                                    {{ $task->title }}
                                </h3>
                                <p class="text-gray-600 mt-1 text-sm">{{ $task->description }}</p>
                                <div class="flex items-center gap-4 mt-2 text-sm text-gray-500">
                                    <span class="inline-flex items-center">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        {{ $task->due_date ? $task->due_date->format('M d, Y') : 'No due date' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-2 items-center flex-wrap">
                        <!-- Mark as done -->
                        <form method="POST" action="{{ route('tasks.toggle', $task) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 rounded-lg font-medium transition-all duration-200 transform hover:scale-105 {{ $task->is_completed ? 'bg-green-500 hover:bg-green-600 text-white shadow-sm' : 'bg-gray-200 hover:bg-gray-300 text-gray-700' }}">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ $task->is_completed ? 'Completed' : 'Complete' }}
                            </button>
                        </form>

                        <!-- Edit -->
                        <a href="{{ route('tasks.edit', $task) }}" 
                            class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-all duration-200 transform hover:scale-105 shadow-sm">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit
                        </a>

                        <!-- Delete -->
                        <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                onclick="return confirm('Are you sure you want to delete this task?')"
                                class="inline-flex items-center px-4 py-2 bg-red-500 text-white font-medium rounded-lg hover:bg-red-600 transition-all duration-200 transform hover:scale-105 shadow-sm">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <p class="mt-4 text-lg text-gray-500">No tasks found.</p>
                    <p class="mt-1 text-sm text-gray-400">Create your first task to get started!</p>
                </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>

<!-- Modal -->
<div id="taskModal" onclick="closeModal()" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40 flex items-center justify-center p-4 backdrop-blur-sm transition-all duration-300">
    <div onclick="event.stopPropagation()" class="bg-white rounded-2xl shadow-2xl max-w-lg w-full p-8 transform transition-all duration-300 scale-95 hover:scale-100">
        <div class="flex items-start justify-between mb-4">
            <h2 id="modalTitle" class="text-2xl font-bold text-gray-900"></h2>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <p id="modalDescription" class="text-gray-600 mb-6 leading-relaxed"></p>
        
        <div class="space-y-3 mb-6">
            <div class="flex items-center text-sm">
                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
                <strong class="text-gray-700 mr-2">Priority:</strong> 
                <span id="modalPriority" class="px-2 py-1 rounded-full text-xs font-medium"></span>
            </div>
            
            <div class="flex items-center text-sm">
                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <strong class="text-gray-700 mr-2">Due date:</strong> 
                <span id="modalDueDate" class="text-gray-600"></span>
            </div>
        </div>
        
        <button onclick="closeModal()" class="w-full px-6 py-3 bg-gradient-to-r from-yellow-400 to-amber-400 rounded-lg hover:from-yellow-500 hover:to-amber-500 text-gray-900 font-semibold transform hover:scale-105 transition-all duration-200 shadow-md hover:shadow-lg">
            Close
        </button>
    </div>
</div>

<script>
    function openModal(taskId) {
        fetch(`/tasks/${taskId}`)
            .then(res => res.json())
            .then(task => {
                document.getElementById('modalTitle').textContent = task.title;
                document.getElementById('modalDescription').textContent = task.description || 'No description';
                
                const priorityEl = document.getElementById('modalPriority');
                const priorityText = task.priority.charAt(0).toUpperCase() + task.priority.slice(1);
                priorityEl.textContent = priorityText;
                
                // Apply priority colors
                if (task.priority === 'high') {
                    priorityEl.className = 'px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800';
                } else if (task.priority === 'medium') {
                    priorityEl.className = 'px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800';
                } else {
                    priorityEl.className = 'px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800';
                }
                
                document.getElementById('modalDueDate').textContent = task.due_date ?? 'No due date';
                
                document.getElementById('taskModal').classList.remove('hidden');
            });
    }

    function closeModal() {
        document.getElementById('taskModal').classList.add('hidden');
    }

    // Close modal with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
</script>