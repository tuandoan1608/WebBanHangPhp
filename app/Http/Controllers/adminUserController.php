<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminUserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->use=$user;
    }
    public function index()
    {
       $data=DB::table('users')->get();
       return view('admin.user.danhsach',compact('data'));
    }
    public function add(Request $request)
    {
        return view('admin.user.them');
    }
    public function edit($id,Request $request)
    {
        $data=$this->use->find($id);
        return view('admin.setting.edit',compact('data'));
    }
    public function insert(Request $request)
    {
        $p=bcrypt($request->pass);
      $user=  $this->use->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$p,
            'active'=>$request->status,
         
        ]);
        foreach($request->role as $r){
            DB::table('user_roles')->insert([
                'user_id'=>$user->id,
                'user_role'=>$r
            ]);
        }
        return redirect()->route('user.index');
    }
    public function update($id,Request $request)
    {
        $this->use->find($id)->update([
            'name'=>$request->config_key,
            'value'=>$request->config_value,
            'status'=>$request->status,
            'type'=>$request->type,
        ]);
        return redirect()->route('user.index');
    }
    public function updates(Request $request)
    {   
        $url= url()->previous();
        $this->use->find($request->id)->update([
           
            'active'=>$request->status
        ]);
           
        return redirect($url);
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
