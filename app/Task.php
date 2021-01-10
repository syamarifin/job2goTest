<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';

    protected $fillable = [
    			'id', 
    			'project', 
    			'name', 
    			'description', 
    			'due_date', 
    			'created_at', 
    			'updated_at'
    		];

    public function project()
    {
    	return $this->belongsTo('App\Model\Project', 'id');
    }
}
