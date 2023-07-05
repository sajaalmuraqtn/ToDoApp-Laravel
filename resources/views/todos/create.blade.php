@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info">Create Task</div>
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
                    <form action="{{route('todos.store')}}" method="post">
                      @csrf
                        <div class="mb-3">
                          <label  class="form-label">Task Title</label>
                          <input type="text" name="title" class="form-control" >
                        </div>
                        <div class="mb-3">
                          <label  class="form-label">Task Description</label>
                          <textarea name="description"  class="form-control" rows="5">
                          </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
