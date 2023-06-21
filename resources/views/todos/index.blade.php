@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Completed</th>
                    <th scope="col">Actions</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $task )

                <tr class="mb-3">
                <th scope="row">{{$task->id}}</th>
                <td>{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td @if ($task->is_completed==0)
                    class="bg-danger text-white"
                    @else
                    class="bg-success text-white"
                    @endif >{{$task->is_completed}}</td>
                <td><a class="btn btn-info btn-sm" href="{{ route('todos.edit',['id'=>$task->id]) }}">Edit</a></td>

                <td><a class="btn btn-danger btn-sm" href="{{ route('todos.delete',['id'=>$task->id]) }}">Delete</a></td>

              </tr>
                @endforeach

            </tbody>
        </table>
        @if (Route::has('todos.create'))
         <a class="btn btn-primary col-md-2 " href="{{ route('todos.create') }}">{{ __('Add Task') }}</a>
        @endif

    </div>
@endsection
