<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository {
    protected $project;
    public function __construct(Project $project) {
        $this->project = $project;
    }

    public function all(){
        return $this->project->paginate(10);
    }

    public function create($data) {
        return $this->project->create($data);
    }

    public function find($id){
        return $this->project->findOrFail($id);
    }

    public function update($id, $data){
        $project = $this->find($id);
        $project->update($data);
        return $project;
    }

    public function delete($id){
        $project = $this->find($id);
        $project->delete();
    }

    public function addPersonProject($project, $person){
        $project = $this->find($project);
        $project->people()->detach();
        $project->people()->attach($person);
    }
}