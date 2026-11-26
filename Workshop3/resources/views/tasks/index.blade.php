<x-layouts.app title="All Tasks">

    <x-page-header
        title="All Tasks"
        description="Manage and track your tasks">
        <a href="{{ route('tasks.create') }}"
            class="btn btn-primary">
            + Create Task
        </a>
    </x-page-header>

    @if(session('success'))
    <x-alert>
        {{ session('success') }}
    </x-alert>
    @endif

    <div class="card">

        <div class="table-wrapper">

            <table>

                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($tasks as $task)

                    <tr>
                        <td>
                            <strong>{{ $task->title }}</strong>
                        </td>

                        <td>
                            <span class="badge badge-{{ $task->status }}">
                                {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                            </span>
                        </td>

                        <td>
                            {{ $task->due_date?->format('M d, Y') ?? 'Not set' }}
                        </td>

                        <td>
                            <div class="actions">

                                <a href="{{ route('tasks.show', $task) }}"
                                    class="btn btn-outline">
                                    View
                                </a>

                                <a href="{{ route('tasks.edit', $task) }}"
                                    class="btn btn-secondary">
                                    Edit
                                </a>

                                <form action="{{ route('tasks.destroy', $task) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this task?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger">
                                        Delete
                                    </button>

                                </form>

                            </div>
                        </td>
                    </tr>

                    @empty

                    <tr>
                        <td colspan="4">
                            <div class="empty-state">
                                <h3>No tasks found</h3>
                                <p>Create your first task to get started.</p>
                            </div>
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-layouts.app>