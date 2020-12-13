<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientProductDetailController extends Controller
{
    public function detail(Request $request)
    {
        $data= DB::table('products')->find($request->id);
        $data->View_count=$data->View_count+1;
        DB::table('products')->where('id',$request->id)->update(['View_Count'=>$data->View_count]);
        $imageProduct= DB::table('product_imgages')->where('productID',$request->id)->get();
        return view('client.product.index',compact('data','imageProduct'));
    }
}
