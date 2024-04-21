<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository {
    protected $role;
    public function __construct(Role $role) {
        $this->role = $role;
    }

    public function all(){
        return $this->role->all();
    }

    public function create($data){
        return $this->role->create($data);
    }

    public function findOrFail($id){
        return $this->role->find($id);
    }

    public function update($id,$data){
        $role = $this->findOrFail($id);
        $role->update($data);
    }

    public function delete($id){
        $role = $this->findOrFail($id);
        $role->delete();
    }
}