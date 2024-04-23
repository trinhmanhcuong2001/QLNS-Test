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

    public function edit($project){
        $companies = $this->companyService->all();
        $project = $this->projectService->find($project);
        return view('projects/edit', [
            'project' => $project,
            'companies' => $companies
        ]);
    }

    public function update($project, Request $request){
        $result = $this->projectService->update($project, $request->all());
        if($result){
            session()->flash('success','Cập nhật thành công');
            return redirect('/projects/index');
        }
        return redirect()->back();
    }

    public function destroy($id){
        $this->projectService->delete($id);
        \session()->flash('success', 'Xóa thành công');
        return redirect('/projects/index');
    }

    public function getPersons(){
        $people = $this->personService->allWithProject();      
        return response()->json([
            'people' => $people
        ]);
    }
}
