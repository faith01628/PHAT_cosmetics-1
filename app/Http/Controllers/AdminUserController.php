<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteModelTrait;

class AdminUserController extends Controller
{
    private $user;
    private $role;
    use DeleteModelTrait;

    public function __construct(User $user, Role $role) {
        $this->user = $user;
        $this->role = $role;
    }

    public function index() {
        $users = $this->user->simplePaginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create() {
        $roles = $this->role->all();
        return view('admin.user.create', compact('roles'));
    }

    public function store(UserCreateRequest $request) {
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $roleIds = $request->role_id;
            $user->roles()->attach($roleIds);
            DB::commit();
            return redirect()->route('users.index');
        } catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    public function edit($id) {
        $roles = $this->role->all();
        $user = $this->user->find($id);
        $rolesofUser = $user->roles;
        return view('admin.user.edit', compact('roles', 'user', 'rolesofUser'));
        
    }

    public function update(UserCreateRequest $request, $id) {
        try {
            DB::beginTransaction();
            $user = $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        } catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    public function delete($id) {
        return $this->deleteModelTrait($id, $this->user);
    }






}
