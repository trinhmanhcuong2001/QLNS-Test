<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Services\ProjectService;
use App\Services\CompanyService;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TasksExport;

class TaskController extends Controller
{
    protected $taskService;
    protected $projectService;
    protected $companyService;
    public function __construct(TaskService $taskService, ProjectService $projectService, CompanyService $companyService){
        $this->taskService = $taskService;
        $this->projectService = $projectService;
        $this->companyService = $companyService;
    }

    public function index(){
        $tasks = $this->taskService->all();
        $companies = $this->companyService->all();
        return view('tasks.index', [
            'tasks' => $tasks,
            'companies' => $companies
        ]);
    }

    public function create(){
        $projects = $this->projectService->all();
        return view('tasks.create', [
            'projects' => $projects
        ]);
    }

    public function store(Request $request){
        $this->taskService->create($request->all());
        session()->flash('success','Thêm thành công');
        return redirect('tasks/create');
    }

    public function edit($id){
        $task = $this->taskService->find($id);
        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    public function update($id, Request $request){
        $result = $this->taskService->update($id, $request->all());
        if($request){
            session()->flash('success','Cập nhật thành công');
            return redirect('tasks/index');
        }
        return redirect()->back();
    }

    public function destroy($id){
        $this->taskService->delete($id);
        session()->flash('success','Xóa thành công');
        return redirect('tasks/index');
    }

    public function getPersonByProject(Request $request){
        $project = $request->input('project');
        $people = $this->projectService->getPersonByProject($project);
        return response()->json($people);
    }

    public function getProject(Request $request){
        $company = $request->input('company');
        $projects = $this->companyService->getProject($company);
        return response()->json([
            'projects' => $projects
        ]);
    }

    public function filter(Request $request){
        // $tasks = $this->taskService->filter($request->all());
        // return view('tasks.filter', [
        //     'tasks' => $tasks
        // ]);
        dd($request->all());
    }

    public function search(Request $request){
        $tasks = $this->taskService->search($request->all());
        return view('tasks.search', [
            'tasks' => $tasks
        ]);
    }

    public function exportExcel(){
        return Excel::download(new TasksExport, 'tasks.xlsx');
    }
}
