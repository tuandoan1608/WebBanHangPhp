<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminCouponController extends Controller
{
    public function index()
    {
        $data=DB::table('coupon')->get();
        return view('admin.coupon.index',compact('data'));
    }
    public function add()
    {
        return view('admin.coupon.add');
    }
    public function create(Request $request)
    {
        DB::table('coupon')->insert([
            'name'=>$request->name,
            'codeCoupon'=>$request->code,
            'discount'=>$request->Discount,
            'type'=>$request->type,
            'status'=>$request->status
        ]);
        return redirect()->route('coupon.index');
    }
    public function edit($id)
    {
        $data=DB::table('coupon')->find($id);
        return view('admin.coupon.edit',compact('data'));
    }
    public function update(Request $request,$id)
    { ;
      
       DB::table('coupon')->where('id',$id)->update([
            'name'=>$request->name,
            'codeCoupon'=>$request->code,
            'discount'=>$request->Discount,
           
            'status'=>$request->status
        ]);
        return redirect()->route('coupon.index');
    }
}
