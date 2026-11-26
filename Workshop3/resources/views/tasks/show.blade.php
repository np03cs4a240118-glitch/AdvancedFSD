<x-layouts.app title="Task Details">

    <x-page-header
        title="Task Details"
        description="View information about this task">
        <a href="{{ route('tasks.edit', $task) }}"
            class="btn btn-primary">
            Edit Task
        </a>
    </x-page-header>

    <div class="card">

        <h2>{{ $task->title }}</h2>

        <div class="detail-label">Description</div>

        <div class="detail-value">
            {{ $task->description ?? 'No description provided.' }}
        </div>

        <div class="detail-label">Status</div>

        <div class="detail-value">
            <span class="badge badge-{{ $task->status }}">
                {{ ucfirst(str_replace('_', ' ', $task->status)) }}
            </span>
        </div>

        <div class="detail-label">Due Date</div>

        <div class="detail-value">
            {{ $task->due_date?->format('M d, Y') ?? 'Not set' }}
        </div>

        <div class="detail-label">Created At</div>

        <div class="detail-value">
            {{ $task->created_at->format('M d, Y H:i') }}
        </div>

        <a href="{{ route('tasks.index') }}"
            class="btn btn-secondary">
            Back to Tasks
        </a>

    </div>

</x-layouts.app>