<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DepartmentService;
use App\Services\CompanyService;
use App\Http\Requests\DepartmentFormRequest;

class DepartmentController extends Controller
{
    protected $departmentService;
    public function __construct(DepartmentService $departmentService, CompanyService $companyService){
        $this->departmentService = $departmentService;
        $this->companyService = $companyService;
    }

    public function index(){
        $departments = $this->departmentService->all();
        return view('departments/index', [
            'departments' => $departments
        ]);
    }

    public function create(){
        $companies = $this->companyService->all();
        return view('departments/create', [
            'companies' => $companies
        ]);
    }

    public function store(DepartmentFormRequest $request){
        $this->departmentService->create($request->all());
        session()->flash('success', 'Thêm phòng ban thành công');
        return redirect('departments/create');
    }

    public function edit($department){
        $department = $this->departmentService->find($department);
        $companies = $this->companyService->all();
        return view('departments/edit',[
            'department' => $department,
            'companies' => $companies
        ]);
    }

    public function update($derpartment, DepartmentFormRequest $request){
        $this->departmentService->update($derpartment, $request->all());
        session()->flash('success','Cập nhật thành công');
        return redirect('departments/index');
    }

    public function destroy($department){
        $this->departmentService->delete($department);
        session()->flash('success','Xóa thành công');
        return redirect('departments/index');
    }

    public function getDepartmentParents(){
        $departmentParents = $this->departmentService->departmentParents();
        return response()->json([
            'departmentParents' => $departmentParents
        ]);
    }
}
