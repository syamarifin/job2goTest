<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Task as TaskResource;
use App\Task;

class Task_with_Project extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'description'   => $this->description,
            'due_date'      => $this->due_date,
            'created_at'    => $this->created_at->format('d/m/Y H:i:s'),
            'updated_at'    => $this->updated_at->format('d/m/Y H:i:s'),
            'Detail_Task'   => TaskResource::collection(Task::where('project', $this->id)->get())
        ];
    }
}
