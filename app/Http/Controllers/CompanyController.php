<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyService;
use App\Http\Requests\CompanyFormRequest;
use Exception;

class CompanyController extends Controller
{
    protected $companyService;
    public function __construct(CompanyService $companyService){
        $this->companyService = $companyService;
    }

    public function index(){
        $companies = $this->companyService->all();
        return view('companies/index',[
            'companies' => $companies
        ]);
    }

    public function create(){
        return view('companies/create');
    }

    public function store(CompanyFormRequest $request){
        $this->companyService->create($request->all());
        session()->flash('success','Thêm công ty thành công!');
        return redirect('companies/create');
    }

    public function edit($company){
        $company = $this->companyService->find($company);
        return view('companies/edit', [
            'company' => $company
        ]);
    }

    public function update($company, CompanyFormRequest $request){
        $this->companyService->update($company, $request->all());
        session()->flash('success','Cập nhật thành công');
        return redirect('companies/index');
    }

    public function destroy($company){
        try {
            $this->companyService->delete($company);
            session()->flash('success','Xóa thành công');
            return redirect('companies/index');
        } catch (\Exception $e) {
            \session()->flash('error','Không thể xóa vì còn nhân viên nằm trong công ty');
            return redirect()->back(); 
        }
    }
}
