<?php

namespace App\Http\Controllers;
use App\setting;
use Illuminate\Http\Request;

class adminsettingController extends Controller
{
    private $setting;
    public function __construct(setting $setting)
    {
        $this->setting=$setting;
        
    }
    public function index()
    {
        $data=$this->setting->paginate(10);
       return view('admin.setting.index',compact('data'));
    }
    public function add(Request $request)
    {
        return view('admin.setting.add');
    }
    public function edit($id,Request $request)
    {
        $data=$this->setting->find($id);
        return view('admin.setting.edit',compact('data'));
    }
    public function insert(Request $request)
    {
        $this->setting->create([
            'name'=>$request->config_key,
            'value'=>$request->config_value,
            'status'=>$request->status,
            'type'=>$request->type,
        ]);
        return redirect()->route('setting.index');
    }
    public function update($id,Request $request)
    {
        $this->setting->find($id)->update([
            'name'=>$request->config_key,
            'value'=>$request->config_value,
            'status'=>$request->status,
            'type'=>$request->type,
        ]);
        return redirect()->route('setting.index');
    }
    public function delete($id)
    {
        try{
            $this->setting->find($id)->delete();
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
