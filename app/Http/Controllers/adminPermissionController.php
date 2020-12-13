<?php

namespace App\Http\Controllers;
use App\permission;
use App\Component\Recusive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminPermissionController extends Controller
{
    private $permission;
    public function __construct(permission $permission)
    {
        $this->permission=$permission;
        
    }
    public function add()
    {
        $select=$this->getper();
        return view('admin.permission.add',compact('select'));
    }
    public function insert(Request $request)
    {
       DB::table('permission')->insert([
        'name'=>$request->name,
        'displayname'=>$request->name,
        'parentID'=>$request->parent_id,
        'key_permission'=>$request->key_permission,
       ]);
        return back();
    }
    public function getper()
    {
        
        $data=$this->permission->all();
        $Recusive= new Recusive($data);

        $option = $Recusive->categoryRecure();
        return $option;
    
    }
}
