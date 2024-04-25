<?php 

namespace App\Repositories;

use App\Models\Task;

class TaskRepository {
    protected $task;
    public function __construct(Task $task) {
        $this->task = $task;
    }

    public function all(){
        return $this->task->orderBy('project_id')->get();
    }

    public function create($data){
        return $this->task->create($data);
    }

    public function find($id){
        return $this->task->findOrFail($id);
    }

    public function update($id,$data){
        $task = $this->find($id);
        $task->update($data);
    }

    public function delete($id){
        $task = $this->find($id);
        $task->delete();
    }

    public function search($keyword){
        $tasks = $this->task->where('name', 'like' , '%' . $keyword . '%')->get();
        return $tasks;
    }
}