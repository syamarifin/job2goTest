<?php

namespace App\Http\Controllers;

use App\Http\Resources\Task as TaskResource;
use App\Http\Resources\Task_with_Project as TaskProjectResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Task;
use App\Project;
use Validator;

class TaskController extends Controller
{
    public function readTask(Request $Request)
    {
        $task = Task::get();
        if ($Request->project!='') {
        	$task = Task::where([
        		['id','=',$Request->id]
        	])
        	->get();
        }

        return TaskResource::collection($task);
    }

    public function readProjectTask(Request $Request)
    {
    	// $checkout = transaction::where([
     //    	['user_id','=',Auth::user()->id],
     //    	['paid','=',0]
     //    ])->get();

     //    return TransactionResource::collection($checkout);
        $task = Project::get();

        return TaskProjectResource::collection($task);
    }

    public function addTask(Request $Request)
    {
    	$validator = Validator::make($Request->all(), [
            'name'         	=> 'required|string|max:100',
            'project'       => 'required|string|max:100',
            'description'  	=> 'required|string|max:255',
            'due_date'  	=> 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $name			= $Request->name;
	    $project    	= $Request->project;
	    $description    = $Request->description;
	    $due_date 		= $Request->due_date;
	    $task     	= Task::create([
	    				'name' 			=> $name, 
	    				'project' 		=> $project, 
	    				'description' 	=> $description, 
	    				'due_date' 		=> $due_date,
	    			]);

        return new TaskResource($task);
	}
}
