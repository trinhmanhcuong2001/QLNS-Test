<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\RoleService;
use App\Http\Requests\UserFormRequest;


class UserController extends Controller
{
    
    protected $userService;
    protected $roleService;
    public function __construct(UserService $userService, RoleService $roleService){
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    public function index(){
        $users = $this->userService->all();
        $roles = $this->roleService->all();
        return view('users.index', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function create(){
        return view('users.create');
    }

    public function store(UserFormRequest $request){
        
        try{
            $result = $this->userService->create($request->all());
            if($result){
                session()->flash('success','Thêm người dùng thành công!');
            }else{
                session()->flash('error','Email đã tồn tại!');
            }    
            return redirect('users/create');
        }catch(Exception $e){
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
        
    }

    public function edit($id){
        $user = $this->userService->find($id);
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update($id, UserFormRequest $request){
        $this->userService->update($id, $request->all());
        session()->flash('success','Cập nhật thành công!');
        return redirect('users/index');          
    }

    public function destroy($id){
        $this->userService->delete($id);
        return redirect()->back();
    }

    public function addRole(Request $request){
        $role_id = $request->input('role_id');
        $user_id = $request->input('user_id');
        $result = $this->userService->addRole($user_id, $role_id);
        return response()->json([
            'result' => $result
        ]);
    }

    public function removeRole(Request $request){
        $role_id = $request->input('role_id');
        $user_id = $request->input('user_id');
        $result = $this->userService->removeRole($user_id, $role_id);
        return response()->json([
            'result' => $result
        ]);
    }

}
