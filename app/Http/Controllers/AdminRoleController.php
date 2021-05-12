<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminRoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission){
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index(){
        $roles = $this->role->paginate(5);

        return view('admin.role.index', compact('roles'));
    }

    public function create(){
        $permissionParent = $this->permission->where('parent_id',0)->get();
        return view('admin.role.add',compact('permissionParent'));
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();
            $role = $this->role->create([
                'name' => $request->name,
                'display_name' => $request->description,
            ]);
            $role->permission()->attach($request->permission_id);
            DB::commit();
            return redirect()->route('roles.index');
        } catch (\Exception $exception){
            DB::rollBack();
            Log::error('Messages : '.$exception->getMessage().' --- Line : '.$exception->getLine());
        }
    }

    public function edit($id){
        $permissionParent = $this->permission->where('parent_id',0)->get();
        $role = $this->role->find($id);
        $permissionChecked = $role->permission;

        return view('admin.role.edit',compact('permissionParent','role','permissionChecked'));
    }

    public function update(Request $request, $id){
        try{
            DB::beginTransaction();
            $this->role->find($id)->update([
                'name' => $request->name,
                'display_name' => $request->description,
            ]);
            $role = $this->role->find($id);
            $role->permission()->sync($request->permission_id);
            DB::commit();
            return redirect()->route('roles.index');
        } catch (\Exception $exception){
            DB::rollBack();
            Log::error('Messages : '.$exception->getMessage().' --- Line : '.$exception->getLine());
        }
    }
}
