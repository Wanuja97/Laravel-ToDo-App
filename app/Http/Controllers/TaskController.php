<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request){
        //die dom
        //dd($request->all());
        $task = new Task;
        
        $this->validate($request,[
            'task'=>'required|max:100|min:5',
        ]);
        
        $task->task = $request->task;
        $task->save();
        
        //taking all rows in table Task
        $data = Task::all();
        return view('tasks')->with('mydata',$data);

        //dd($data);
        //return redirect()->back();
        //return view('view_name');
    }

    public function updateTaskAsCompleted($id){
        $taskrow = Task::find($id);
        $taskrow->iscompleted = 1;
        $taskrow->save();
        return redirect()->back();
    }

    public function updateTaskAsNotCompleted($id){
        $taskrow = Task::find($id);
        $taskrow->iscompleted = 0;
        $taskrow->save();
        return redirect()->back();
    }

    public function taskdelete($id){
        $taskrow = Task::find($id);
        $taskrow->delete();
        return redirect()->back();
    }

    Public function taskUpdate1($id){
        $taskrow = Task::find($id);
        return view('updatetask')->with('taskdata',$taskrow);
    }
    Public function taskUpdate2(Request $request){
        //dd($request);
        $id = $request->id;
        $task = $request->newtask;
        $datarow = Task::find($id);
        $datarow->task = $task;
        $datarow->save();
        $fulldata = Task::all();
        return view('tasks')->with('mydata',$fulldata);
    }
}
