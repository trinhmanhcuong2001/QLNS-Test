<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;

class TaskController extends Controller
{
    protected $taskService;
    public function __construct(TaskService $taskService){
        $this->taskService = $taskService;
    }

    public function index(){
        $tasks = $this->taskService->all();
        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function create(){
        return view('tasks.create');
    }

    public function store(Request $request){
        $this->taskService->create($request->all());
        session()->flash('success','Thêm thành công');
        return redirect('tasks.index');
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
}
