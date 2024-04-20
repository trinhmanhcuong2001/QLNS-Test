<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DepartmentService;

class DepartmentController extends Controller
{
    protected $departmentService;
    public function __construct(DepartmentService $departmentService){
        $this->departmentService = $departmentService;
    }

    public function index(){
        $departments = $this->departmentService->all();
        return view('departments/index', [
            'departments' => $departments
        ]);
    }
}
