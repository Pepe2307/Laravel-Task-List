@extends('layouts.app')


@section('title', $task->title)


@section('content')
    <p>{{$task->description}}</p>

    @if($task->long_description)
        <p>{{$task->long_description}}</p>
    @endif

    <p>Task ID: {{$task->id}}</p>
    <p>Task Created at: {{$task->created_at}}</p>
    <p>Task Updated at: {{$task->updated_at}}</p>
@endsection