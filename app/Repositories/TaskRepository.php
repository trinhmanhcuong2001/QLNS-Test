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

    public function filter($data){
        $query = $this->task->query();

        if(isset($data['company_id'])){
            $query->whereHas('project', function ($query) use ($data){
                $query->where('company_id', $data['company_id']);
            });
        }
        if(isset($data['project_id'])){
            $query->where('project_id', $data['project_id']);
        }

        if(isset($data['person_id'])){
            $query->where('person_id', $data['person_id']);
        }
        if(isset($data['priority'])){
            $query->where('priority', $data['priority']);
        }
        if(isset($data['status'])){
            $query->where('status', $data['status']);
        }
        return $query->get();
    }
}