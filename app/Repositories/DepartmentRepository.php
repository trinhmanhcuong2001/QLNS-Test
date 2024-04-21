<?php 

namespace App\Repositories;

use App\Models\Department;

class DepartmentRepository {
    protected $department;
    public function __construct(Department $department) {
        $this->department = $department;
    }

    public function all(){
        return $this->department->all();
    }

    public function create($data){
        return $this->department->create($data);
    }

    public function findOrFail($id){
        return $this->department->findOrFail($id);
    }

    public function update($id, $data){
        $department = $this->findOrFail($id);
        $department->update($data);
    }

    public function delete($id){
        $department = $this->findOrFail($id);
        $department->delete();
    }

    public function departmentParents(){
        return $this->department->where('parent_id', 0)->get();
    }
}