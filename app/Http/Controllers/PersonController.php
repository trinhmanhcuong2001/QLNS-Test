<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PersonService;
use App\Services\CompanyService;
use Exception;
use App\Http\Requests\PersonFormRequest;

class PersonController extends Controller
{
    protected $personService;
    protected $companyService;
    public function __construct(PersonService $personService, CompanyService $companyService){
        $this->personService = $personService;
        $this->companyService = $companyService;
    }

    public function create($user_id){
        $person = $this->personService->findByUser($user_id);
        $companies = $this->companyService->all();
        if($person){
            return redirect('people/detail/' . $person->id);
        }
        return view('people/create', [
            'companies' => $companies
        ]);
    }

    public function store($user,PersonFormRequest $request){
        try{
            $person = $this->personService->create($user, $request->all());
            return redirect('people/detail/'. $person->id);
        }catch (Exception $e) {
            session()->flash('error', 'Lỗi: Thông tin người dùng này đã tồn tại');
            return redirect('users/index');
        }
    }

    public function detail($id){
        $person = $this->personService->find($id);
        return view('people/detail', [
            'person' => $person
        ]);
    }

    public function edit($id){
        $person = $this->personService->find($id);
        $companies = $this->companyService->all();
        return view('people/edit', [
            'person' => $person,
            'companies' => $companies
        ]);
    }

    public function update($id, PersonFormRequest $request){
        $person = $this->personService->update($id, $request->all());
        return redirect('people/detail/'. $person->id);
    }
}
