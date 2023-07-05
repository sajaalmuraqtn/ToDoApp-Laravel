@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info">Edit Task</div>
                @if ($errors->any())
                <div class="alert alert-danger mt-3 m-1">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <div class="card-body">
                    <form action="{{ route('todos.update', ['id' => $task->id]) }}" method="post">
@csrf
                        <div class="mb-3">
                          <label  class="form-label">Task Title</label>
                          <input type="text" value="{{$task->title}}" name="title" class="form-control" >
                        </div>
                        <div class="mb-3">
                          <label  class="form-label">Task Description</label>
                          <textarea name= "description" value="{{$task->description}}"  class = "form-control" rows="5">

                          </textarea>
                        </div>

                          <div class="mb-3">
                            <label for="exampleInputRole" class="form-label">Status</label>

                            <select class="form-select" name="is_completed" aria-label="Default select example">
                                <option value="0">not complete</option>
                                <option value="1">complete</option>
                              </select>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
