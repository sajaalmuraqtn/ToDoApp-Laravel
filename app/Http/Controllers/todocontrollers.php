<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class todocontrollers extends Controller
{
    public function index()
    {
        $tasks = Todo::query()
            ->where('user_id', '=', Auth::user()->id)
            ->get();

        return view('todos.index', ['todos' => $tasks]);
    }
    public function create(){
     return view('todos.create');
    }
    public function edit($id){
     $task= Todo::find($id);
     return view('todos.edit',['task'=>$task]);
    }
    public function update(TodoRequest $request,$id){
     $task= Todo::find($id);
     $task->title=$request->title;
     $task->description = $request->description;
     $task->is_completed = $request->is_completed;

     if ($task->save()) {
        return redirect('todos/index')->with('status', 'task updated successfully');
    }
 }
    public function store(TodoRequest $request ) {
        $task = new Todo();
        // $user=User::get();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->is_completed = 0;
        $task->user_id=Auth::user()->id;
        //  $user->id;

        if ($task->save()) {
            return redirect('todos/index')->with('status', 'New task added successfully');
        }
    }
    public function delete($id){
        $task = Todo::find($id);

        if($task){
            $task->delete();
            return redirect('todos/index')->with('status', 'task deleted successfully');
        }
        else{
            return redirect('todos/index')->with('status', 'task not found');
        }
    }
}
