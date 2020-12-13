<?php

namespace App\Http\Controllers;

use App\permission;
use App\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminRolesController extends Controller
{
    private $role;
    public function __construct(role $role,permission $permission)
    {
        $this->role=$role;
        $this->permission=$permission;
    }
    public function index()
    {
        
       $data=DB::table('roles')->get();
       return view('admin.roles.danhsach',compact('data'));
    }
    public function add(Request $request)
    {
        $data= $this->permission->with('permissionParent')->where('parentID',0)->get();
        return view('admin.roles.them',compact('data'));
    }
    public function edit($id,Request $request)
    {
        $data=$this->role->find($id);
        $warper= $this->permission->with('permissionParent')->where('parentID',0)->get();
        $roleselect=$data->permissions;
        return view('admin.roles.sua',compact('data','warper','roleselect'));
    }
    public function insert(Request $request)
    {
        $role=$this->role->create([
            'name'=>$request->name,
            'display_name'=>$request->displayname,
    
        ]);
        $role->permissions()->attach($request->roles);
        return redirect()->route('roles.index');
    }
    public function update($id,Request $request)
    {
        $role=$this->role->find($id);
        $role->update([
            'name'=>$request->name,
            'display_name'=>$request->displayname,
    
        ]);
      
        $role->permissions()->sync($request->roles);
        return redirect()->route('roles.index');
    }
   
    public function delete($id)
    {
        try{
            $this->use->find($id)->delete();
            return response()->json([
                'code'=>200,
                'message'=>'success'
            ]);

        }catch(\Exception $exception){
            return response()->json([
                'code'=>500,
                'message'=>'faile'
            ]);

        }
    }
}
