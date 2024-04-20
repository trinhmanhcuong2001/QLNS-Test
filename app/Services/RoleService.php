<?php

namespace App\Services;

use App\Repositories\RoleRepository;

class RoleService {
    protected $roleRepository;
    public function __construct(RoleRepository $roleRepository) {
        $this->roleRepository = $roleRepository;
    }

    public function all(){
        return $this->roleRepository->all();
    }

    public function find($id){
        return $this->roleRepository->find($id);
    }

    public function create($data){
        return $this->roleRepository->create($data);
    }

    public function update($id, $data){
        return $this->roleRepository->update($id, $data);
    }

    public function delete($id){
        $this->roleRepository->delete($id);
    }
}