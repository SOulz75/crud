<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Task;
use App\Models\Employee;

class TaskController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = Task::where('taskTitle', 'LIKE', '%'.$request->search.'%')->paginate(5);
        }else{
            $data = Task::paginate(5);
        }
        return view('taskData', compact('data'));
    }

    public function addTask(){
        $emp = Employee::all();
        return view('addTask', compact('emp'));;
    }

    public function insertTask(Request $request){
        //validation
        // $this->validate($request,[

        //     'taskTitle' => 'required|min:5|max:255',
        //     'taskType' => 'required|min:10|max:11',
        // ]);

        $data = Task::create($request->all());

        return redirect()->route('taskData')->with('success', 'Task has been generate successfully');
    }


    // public function showAllTask($id){
    //     $data = Task::find($id);
    //     return view('taskData', compact('data'));
    // }

    public function showTask($id){
        $data = Task::find($id);
        // $data = Employee::find($id);
        return view('showTask', compact('data'));
    }


    public function updateTask(Request $request, $id){
        $data = Task::find($id);
        $data->update($request->all());
        return redirect()->route('taskData')->with('success', 'Task has been update.');
    }
    public function deleteTask($id){
        $data = Task::find($id);
        $data->delete();
        return redirect()->route('taskData')->with('success', 'Task has been deleted.');
    }
    // public function designationPerson(Request $request, $id){
    //     $data = Employee::find($id);
    //     return view('showEmployee', compact('data'));
    // }
}
