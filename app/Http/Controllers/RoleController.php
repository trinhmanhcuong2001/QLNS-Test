<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoleService;
use App\Http\Requests\RoleFormRequest;

class RoleController extends Controller
{
    protected $roleService;
    public function __construct(RoleService $roleService){
        $this->roleService = $roleService;
    }

    public function index(){
        $roles = $this->roleService->all();
        return view('roles/index', [
            'roles' => $roles
        ]);
    }

    public function create(){
        return view('roles/create');
    }

    public function store(RoleFormRequest $request){
        $this->roleService->create($request->all());
        session()->flash('success','Thêm quyền thành công');
        return redirect('roles/create');
    }

    public function edit($role){
        $role = $this->roleService->find($role);
        return view('roles/edit', [
            'role' => $role
        ]);
    }

    public function update($role, RoleFormRequest $request){
        $this->roleService->update($role, $request->all());
        \session()->flash('success','Cập nhật thành công');
        return redirect('roles/index');
    }

    public function destroy($role){
        $this->roleService->delete($role);
        session()->flash('success', 'Xóa thành công');
        return redirect('roles/index');
    }
}
