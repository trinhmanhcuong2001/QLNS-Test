<?php

namespace App\Services;


use App\Repositories\CountryRepository;

class CountryService {

    protected $countryRepository;
    public function __construct(CountryRepository $countryRepository) {
        $this->countryRepository = $countryRepository;
    }

    public function all(){
        return $this->countryRepository->all();
    }

    public function create($request){
        return $this->countryRepository->create($request);
    }

    public function find($id){
        return $this->countryRepository->find($id);
    }

    public function update($id, $request){
        return $this->countryRepository->update($id, $request);
    }

    public function delete($id){
        return $this->countryRepository->delete($id);
    }

}