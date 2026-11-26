<x-layouts.app title="Edit Task">

    <x-page-header
        title="Edit Task"
        description="Update the details of your task" />

    <div class="card">

        <form action="{{ route('tasks.update', $task) }}"
            method="POST">

            @csrf
            @method('PUT')

            <x-form.input
                label="Task Title"
                name="title"
                :value="$task->title" />

            <div class="form-group">

                <label class="form-label">Description</label>

                <textarea name="description"
                    class="form-control">{{ old('description', $task->description) }}</textarea>

                @error('description')
                <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <div class="form-group">

                <label class="form-label">Status</label>

                <select name="status" class="form-control">

                    @foreach([
                    'pending' => 'Pending',
                    'in_progress' => 'In Progress',
                    'completed' => 'Completed'
                    ] as $value => $label)

                    <option value="{{ $value }}"
                        @selected(old('status', $task->status) === $value)>
                        {{ $label }}
                    </option>

                    @endforeach

                </select>

                @error('status')
                <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <x-form.input
                label="Due Date"
                name="due_date"
                type="date"
                :value="$task->due_date?->format('Y-m-d') ?? ''" />

            <x-button type="submit">
                Update Task
            </x-button>

            <a href="{{ route('tasks.index') }}"
                class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</x-layouts.app>