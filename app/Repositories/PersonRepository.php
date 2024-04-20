<?php

namespace App\Repositories;

use App\Models\Person;

class PersonRepository {
    protected $person;
    public function __construct(Person $person) {
        $this->person = $person;
    }

    public function create($data){
        return $this->person->create($data);
    }

    public function findByUser($id){
        return $this->person->where('user_id', $id)->first();
    }

    public function findOrFail($id) {
        return $this->person->find($id);
    }

    public function update($id, $data){
        $person = $this->find($id);
        $person->update($data);
        return $person;
    }
}