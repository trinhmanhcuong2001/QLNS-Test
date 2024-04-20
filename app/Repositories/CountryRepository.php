<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository {
    protected $country;

    public function __construct(Country $country) {
        return $this->country = $country;
    }

    public function all(){
        return $this->country->all();
    }

    public function create($data){
        return $this->country->create($data);
    }

    public function findOrFail($id){
        return $this->country->findOrFail($id);
    }

    public function update($id, $data){
        $country = $this->find($id);
        $country->update($data);
        return $country;
    }

    public function delete($id){
        $country = $this->find($id);
        $country->delete();
    }
}