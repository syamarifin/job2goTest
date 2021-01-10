<?php

namespace App\Http\Controllers;

use App\Http\Resources\Project as ProjectResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Project;
use Validator;

class ProjectController extends Controller
{
	public function readProject()
    {
	    $project = Project::get();
	    return ProjectResource::collection($project);
	}

	public function addProject(Request $Request)
    {
    	$validator = Validator::make($Request->all(), [
            'name'         	=> 'required|string|max:100',
            'description'  	=> 'required|string|max:255',
            'due_date'  	=> 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $name			= $Request->name;
	    $description    = $Request->description;
	    $due_date 		= $Request->due_date;
	    $project     	= Project::create([
	    				'name' 			=> $name, 
	    				'description' 	=> $description, 
	    				'due_date' 		=> $due_date,
	    			]);

        return new ProjectResource($project);
	}
}
