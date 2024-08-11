@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')

    @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
    @endif

    <div>
        <a href="{{ route('tasks.create') }}">Add Task</a> 
    </div>

    @forelse ($tasks as $task )
        <div>
            <a href="{{ route('task.show', ['task' => $task->id]) }}"> {{ $task->title }} </a>
        </div>
    @empty
        <div>no tasks</div>
    @endforelse

    @if ($tasks->count())
        <nav>
            {{ $tasks -> links() }}
        </nav>
    @endif

@endsection