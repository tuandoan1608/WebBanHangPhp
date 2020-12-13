<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class clientcateproduct extends Controller
{
    public function index(Request $request)
    {
       if(isset($request->id)){
        $menu = DB::table('categories')->where('id', $request->id)->first();
      
        $cates = category::with('categorychilrent')->where('parentID', $menu->id)->first();
        $cate = category::with('categorychilrent')->where('parentID', $menu->id)->get();
        if (!empty($request->ids)) {

            if ($request->sort === 'low') {
                $data = DB::table('products')->where('categoryID', $request->ids)->orderBy('price', 'asc')->paginate(12);
            } elseif ($request->sort === 'new') {
                $data = DB::table('products')->where('categoryID', $request->ids)->orderBy('created_at', 'desc')->paginate(12);
            } elseif ($request->sort === 'hight') {
                $data = DB::table('products')->where('categoryID', $request->ids)->orderBy('price', 'desc')->paginate(12);
            } else {
                $data = DB::table('products')->where('categoryID', $request->ids)->paginate(12);
            }
        } else {
            if (!empty($cates)) {
                $data = product::where('categoryID', $cates->id)->paginate(5);
            } else {
                $data = null;
            }
        }
      
      
      
        return view('client.cateproduct.index', compact('menu', 'cate', 'data'));
       }else{
        return view('client.cateproduct.index');
       }
    }
}
