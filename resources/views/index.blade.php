@extends('layouts.app')

@section('content')

    @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
    @endif

    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="btn">Add Task!</a>
    </nav>

    @forelse ($tasks as $task )
        <div>
            <a href="{{ route('task.show', ['task' => $task->id]) }}"
                @class(['line-through' => $task->completed])>{{ $task->title }}
            </a>
        </div>
    @empty
        <div>No Tasks</div>
    @endforelse

    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks -> links() }}
        </nav>
    @endif

@endsection