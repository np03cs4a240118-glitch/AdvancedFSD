<aside class="sidebar">
    <div class="logo">
        Task Manager
    </div>
    <nav>
        <a href="{{ route('tasks.index') }}"
            class="nav-link {{ request()->routeIs('tasks.index') ? 'active' : '' }}">
            Tasks
        </a>

        <a href="{{ route('tasks.create') }}"
            class="nav-link {{ request()->routeIs('tasks.create') ? 'active' : '' }}">
            Create Task
        </a>
    </nav>

</aside>