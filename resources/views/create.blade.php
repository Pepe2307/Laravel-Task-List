@extends('layouts.app')

@section('title', 'Add Task')

@section('styles')
<style>
    .error-messege{
        color: red;
        font-size: 0.8rem;
    }
</style>
@endsection

@section('content')
    {{-- {{ $errors }} --}}
    <form action="{{ route('task.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{old('title')}}"> 
            @error('title')
                <p class="error-messege">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5" value="{{old('description')}}"></textarea>
            @error('description')
                <p class="error-messege">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10" value="{{old('long_description')}}"></textarea>
            @error('long_description')
                <p class="error-messege">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Create Task</button>
        </div>
    </form>
@endsection