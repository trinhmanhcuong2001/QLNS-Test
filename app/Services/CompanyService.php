<?php 

namespace App\Services;

use App\Repositories\CompanyRepository;

class CompanyService {
    protected $companyRepository;
    public function __construct(CompanyRepository $companyRepository) {
        $this->companyRepository = $companyRepository;
    }

    public function all(){
        return $this->companyRepository->all();
    }

    public function create($data){
        return $this->companyRepository->create($data);
    }

    public function find($id){
        return $this->companyRepository->find($id);
    }

    public function update($id, $data){
        return $this->companyRepository->update($id, $data);
    }

    public function delete($id){
        $this->companyRepository->delete($id);
    }

}