@extends('layouts.task-app')

@section('content')
    <form action="{{ route('tasks.store') }}" method="POST" class="add-form">
        @csrf
        <input type="hidden" name="filter" value="{{ $filter }}">
        <input
            type="text"
            name="title"
            value="{{ old('title') }}"
            placeholder="Add a new task..."
            required
        >
        <button type="submit" class="btn">Add</button>
    </form>

    <nav class="filters" aria-label="Filter tasks">
        <a
            href="{{ route('tasks.index', ['filter' => 'all']) }}"
            class="filter-link {{ $filter === 'all' ? 'active' : '' }}"
        >All</a>
        <a
            href="{{ route('tasks.index', ['filter' => 'active']) }}"
            class="filter-link {{ $filter === 'active' ? 'active' : '' }}"
        >Active</a>
        <a
            href="{{ route('tasks.index', ['filter' => 'completed']) }}"
            class="filter-link {{ $filter === 'completed' ? 'active' : '' }}"
        >Completed</a>
    </nav>

    @if($tasks->isEmpty())
        <p class="empty-state">No tasks in this view yet.</p>
    @else
        <ul class="task-list">
            @foreach($tasks as $task)
                <li class="task-item">
                    <div class="task-left">
                        <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="filter" value="{{ $filter }}">
                            <button type="submit" class="btn btn-ghost">
                                {{ $task->is_completed ? 'Undo' : 'Done' }}
                            </button>
                        </form>

                        <span class="task-title {{ $task->is_completed ? 'done' : '' }}">
                            {{ $task->title }}
                        </span>
                    </div>

                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="filter" value="{{ $filter }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

@section('content')
    <form action="{{ route('tasks.store') }}" method="POST" class="add-form">
        @csrf
        <input type="hidden" name="filter" value="{{ $filter }}">
        <input
            type="text"
            name="title"
            value="{{ old('title') }}"
            placeholder="Add a new task..."
            required
        >
        <button type="submit" class="btn">Add</button>
    </form>

    <nav class="filters" aria-label="Filter tasks">
        <a
            href="{{ route('tasks.index', ['filter' => 'all']) }}"
            class="filter-link {{ $filter === 'all' ? 'active' : '' }}"
        >All</a>
        <a
            href="{{ route('tasks.index', ['filter' => 'active']) }}"
            class="filter-link {{ $filter === 'active' ? 'active' : '' }}"
        >Active</a>
        <a
            href="{{ route('tasks.index', ['filter' => 'completed']) }}"
            class="filter-link {{ $filter === 'completed' ? 'active' : '' }}"
        >Completed</a>
    </nav>

    @if($tasks->isEmpty())
        <p class="empty-state">No tasks in this view yet.</p>
    @else
        <ul class="task-list">
            @foreach($tasks as $task)
                <li class="task-item">
                    <div class="task-left">
                        <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="filter" value="{{ $filter }}">
                            <button type="submit" class="btn btn-ghost">
                                {{ $task->is_completed ? 'Undo' : 'Done' }}
                            </button>
                        </form>

                        <span class="task-title {{ $task->is_completed ? 'done' : '' }}">
                            {{ $task->title }}
                        </span>
                    </div>

                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="filter" value="{{ $filter }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection