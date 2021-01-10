<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';

    protected $fillable = [
    			'id', 
    			'name', 
    			'description', 
    			'due_date', 
    			'created_at', 
    			'updated_at'
    		];

    public function project()
    {
    	return $this->hasMany('App\Model\Task', 'id');
    }
}
