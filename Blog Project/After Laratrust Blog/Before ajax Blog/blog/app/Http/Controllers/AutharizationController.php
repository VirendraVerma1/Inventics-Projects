<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\User;


class AutharizationController extends Controller
{
    public function role_index()
    {
        $roles=Role::all();
        return view('Role.index',compact('roles'));
    }

    public function role_create()
    {
        $permissionsList=Permission::all();
        $role=Role::all();
        return view('Role.create',compact('role','permissionsList'));
    }

    public function role_edit($id)
    {
        $permissions=Permission::all();
        $role=Role::find($id);
        return view('Role.edit',compact('role','permissions'));
    }

    public function role_store(Request $request)
    {
        $role=new Role;
        $role->name=$request->name;
        $role->display_name=$request->name;
        $role->description=$request->description;
        $role->save();
        $role->permissions()->sync($request->permissions);
        return redirect()->route('role.index');
    }

    public function role_update(Request $request,$id)
    {
        $role=Role::find($id);
        $role->name=$request->name;
        $role->display_name=$request->name;
        $role->description=$request->description;
        $role->save();
        $role->permissions()->sync($request->permissions);
        return redirect()->route('role.index');
    }

    public function role_delete($id)
    {
        $role=Role::find($id);
        $role->delete();
        $role->permissions()->delete();//it will delete from the mapping also
        return redirect()->back();
    }


    //---------------------------------------permission funtions
    public function permission_index()
    {
        $permissions=Permission::all();
        return view('Permission.index',compact('permissions'));
    }

    public function permission_create()
    {
        return view('Permission.create');
    }

    public function permission_edit($id)
    {
        $permission=Permission::find($id);
        return view('Permission.edit',compact('permission'));
    }

    public function permission_store(Request $request)
    {
        $permission=new Permission;
        $permission->name=$request->name;
        $permission->display_name=$request->name;
        $permission->description=$request->description;
        $permission->save();
        return redirect()->route('permission.index');
    }

    public function permission_update(Request $request,$id)
    {
        $permission=Permission::find($id);
        $permission->name=$request->name;
        $permission->display_name=$request->name;
        $permission->description=$request->description;
        $permission->save();
        return redirect()->route('permission.index');
    }

    public function permission_delete($id)
    {
        $permission=Permission::find($id);
        $permission->delete();
        return redirect()->back();
    }

    //-----------------------------role users----
    public function role_user_index()
    {
        $role_users=User::all();
        return view('RoleUsers.index',compact('role_users'));
    }

    public function role_user_edit($id)
    {
        $roles=Role::all();
        $role_users=User::find($id);
        return view('RoleUsers.edit',compact('role_users','roles'));
    }

    public function role_user_update(Request $request,$id)
    {
        $role_user=User::find($id);
        $role_user->roles()->sync($request->myusers);
        $role_user->save();
        return redirect()->route('role_user.index');
    }

    
}
