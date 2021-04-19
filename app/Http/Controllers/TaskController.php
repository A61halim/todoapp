<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request){
    
        $task = new Task;
        $task->task = Request("task");
        $task->task_discription = Request("taskDescription");
        $task->status = "In Progress";
        $task->user_id = Auth::user()->id;

        $task->save();

        $tasks = Task::where('user_id',Auth::user()->id)->get() ;
        return view("home",["tasks" => $tasks]);
        // return redirect("/home");
    }
    public function delete(Request $request){
        // return $request->id;

        Task::where('id', $request->id)->delete();
        return redirect('/');
    }

    public function finished(Request $request){
        Task::where('id',$request->id)->update(['status'=>"Finished"]);
        return redirect('/');
    }

}
