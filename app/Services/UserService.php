<?php

namespace App\Services;

use App\Repositories\UserRepository;



class UserService {
    protected $userRepository;
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function all(){
        return $this->userRepository->all();
    }

    public function create($data){
        $email = $this->userRepository->findEmail($data['email']);
        if($email){
            return false;
        }
        $userData = [
            'email' => $data['email'],
            'password' => $data['password'],
            'is_active' => true
        ];
        return $this->userRepository->create($userData);      
    }

    public function find($id){
        return $this->userRepository->find($id);
    }

    public function update($id, $data){
        return $this->userRepository->update($id, $data);
    }

    public function delete($id){
        $this->userRepository->delete($id);
    }

    public function addRole($id, $role){
        return $this->userRepository->addRole($id, $role);
    }

    public function removeRole($id, $role){
        return $this->userRepository->removeRole($id, $role);
    }
}