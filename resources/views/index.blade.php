<h1>
    The list of tasks
</h1>


@isset ($name)
    My name is {{$name}}
@endisset

<div>
    <h2>Con if y foreach</h2>

    @if(count($tasks))
        {{-- <div>there are tasks</div> --}}
        @foreach ($tasks as $task)
            <div>
                <a href="{{ route('task.show', ['id' => $task->id]) }}">
                    {{ $task->title }}
                </a>
            </div>
        @endforeach
    @else
        <div>no tasks</div>
    @endif

    {{--  --}}
    <h2>Con FORELSE</h2>
    <p>FORELSE mete de pasiva un "if true???"?</p>
    
    @forelse ($tasks as $task )
        <div>
            {{-- <a href="tasks/{{ $task->id }}">
                {{ $task->title }}
            </a> --}}

            <a href="{{ route('task.show', ['id' => $task->id]) }}">
                {{ $task->title }}
            </a>
        </div>
    @empty
        <div>no tasks</div>
    @endforelse

</div>