<?php

namespace App\Repositories;


use App\Models\User;

class UserRepository {
    protected $user;
    public function __construct(User $user) {
        $this->user = $user;
    }

    public function all(){
        return $this->user->all();
    }

    public function create($data) {
        return $this->user->create($data);
    }

    public function findOrFail($id) {
        return $this->user->findOrFail($id);
    }

    public function update($id, $data) {
        $user = $this->findOrFail($id);
        $user->update($data);
    }

    public function delete($id) {
        $user = $this->findOrFail($id);
        $user->delete();
    }

    public function findEmail($email){
        return $this->user->where('email', $email)->first();
    }

    public function addRole($id, $role){
        $user = $this->findOrFail($id);
        $user->roles()->attach([$role]);
        return $user;
    }

    public function removeRole($id, $role){
        $user = $this->findOrFail($id);
        $user->roles()->detach($role);
        return $user;
    }
}