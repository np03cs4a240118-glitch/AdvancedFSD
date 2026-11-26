<x-layouts.app title="Create Task">

    <x-page-header
        title="Create Task"
        description="Add a new task to your task manager" />

    <div class="card">

        <form action="{{ route('tasks.store') }}" method="POST">

            @csrf

            <x-form.input
                label="Task Title"
                name="title" />

            <div class="form-group">

                <label class="form-label">Description</label>

                <textarea name="description"
                    class="form-control">{{ old('description') }}</textarea>

                @error('description')
                <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <div class="form-group">

                <label class="form-label">Status</label>

                <select name="status" class="form-control">

                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>

                </select>

                @error('status')
                <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <x-form.input
                label="Due Date"
                name="due_date"
                type="date" />

            <x-button type="submit">
                Save Task
            </x-button>

            <a href="{{ route('tasks.index') }}"
                class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</x-layouts.app>