<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProjectService;
use App\Services\CompanyService;
use App\Services\PersonService;

class ProjectController extends Controller
{
    protected $projectService;
    public function __construct(ProjectService $projectService, CompanyService $companyService, PersonService $personService){
        $this->projectService = $projectService;
        $this->companyService = $companyService;
        $this->personService = $personService;
    }

    public function index(){
        $projects = $this->projectService->all();
        return view('projects/index', [
            'projects' => $projects
        ]);
    }

    public function create(){
        $companies = $this->companyService->all();
        return view('projects/create',[
            'companies' => $companies
        ]);
    }

    public function store(Request $request){
        $result = $this->projectService->create($request->all());
        if($result){
            session()->flash('success','Thêm dự án thành công');
            return redirect('projects/create');
        }
        return redirect()->back();
    }

    public function getPersons(){
        $people = $this->personService->all();
        return response()->json([
            'people' => $people
        ]);
    }
}
