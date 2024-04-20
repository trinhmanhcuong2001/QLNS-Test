<?php 

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository {

    protected $company;
    public function __construct(Company $company) {
        $this->company = $company;
    }

    public function all(){
        return $this->company->all();
    }

    public function create($data){
        $this->company->create($data);
    }

    public function find($id){
        return $this->company->find($id);
    }

    public function update($id, $data){
        $company = $this->find($id);
        $company->update($data);
    }

    public function delete($id){
        $company = $this->find($id);
        $company->delete();
    }

}