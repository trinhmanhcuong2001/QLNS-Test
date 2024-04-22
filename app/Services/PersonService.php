<?php

namespace App\Services;

use App\Repositories\PersonRepository;

class PersonService {
    protected $personRepository;
    public function __construct(PersonRepository $personRepository) {
        $this->personRepository = $personRepository;
    }

    public function all(){
        return $this->personRepository->all();
    }

    public function create($user, $data){
        $data['user_id'] = $user;
        return $this->personRepository->create($data);
    }

    public function find($id) {
        return $this->personRepository->find($id);
    }

    public function findByUser($user) {
        return $this->personRepository->findByUser($user);
    }

    public function update($id, $data) {
        return $this->personRepository->update($id, $data);
    }
}