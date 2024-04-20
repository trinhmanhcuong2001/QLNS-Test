<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;

class DepartmentService {
    protected $derpartmentRepository;
    public function __construct(DepartmentRepository $departmentRepository) {
        $this->departmentRepository = $departmentRepository;
    }

    public function all(){
        return $this->departmentRepository->all();
    }

    public function create($data){
        return $this->departmentRepository->create($data);
    }

    public function find($id){
        return $this->departmentRepository->find($id);
    }

    public function update($id, $data){
        return $this->departmentRepository->update($id,$data);
    }

    public function delete($id){
        $this->departmentRepository->delete($id);
    }
}