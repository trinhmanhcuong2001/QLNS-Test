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

    public function find($id){
        return $this->role->find($id);
    }

    public function update($id,$data){
        $role = $this->find($id);
        $role->update($data);
    }

    public function delete($id){
        $role = $this->find($id);
        $role->delete();
    }
}