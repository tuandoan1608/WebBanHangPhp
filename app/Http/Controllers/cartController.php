<?php

namespace App\Http\Controllers;

use App\category;
use App\Component\Recusive;
use App\product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class cartController extends Controller
{
    public function index()
    {
        
        $l=Cart::instance('shopping')->content();
        $total=Cart::subtotal();
        return view('client.cartItem.index',compact('l','total'));
    }
    public function create(Request $request, $id)
    {
        $custommerid=Auth::guard('userclient')->id();
        $product = product::find($id);
       
        $rows = Cart::search(function($key, $value) {
            return $key->id ===  Request::get('id');
        });
        
        $item = $rows->first();
   
        if(!empty($item)){
           
            $item = Cart::get($rows[0]);
            Cart::instance('shopping')->update($item->rowId, $item->qty + 1);
        }else{
          if(!empty($request->quantity)){
            $data= Cart::instance('shopping')->add(array('id' => $id,'custommerID'=>$custommerid,'image'=>$product->image,'slug'=>$product->metatitle, 'name' => $product->name, 'qty' => $request->quantity, 'price' => $product->price,'weight' => 1));
          }else{
            $data= Cart::instance('shopping')->add(array('id' => $id,'custommerID'=>$custommerid,'image'=>$product->image,'slug'=>$product->metatitle, 'name' => $product->name, 'qty' => 1, 'price' => $product->price,'weight' => 1));
          }
        }

       return back();
    
   
    }
    public function getcategory()
    {
        $data=category::where('status',1)->get();
       
        $Recusive= new Recusive($data);

        $option = $Recusive->categoryRecure();
        return $option;
    
    }
    public function delete($id)
    {
        
       
            
            Cart::instance('shopping')->remove($id);
            $l= Cart::instance('shopping')->content();
            $menu=category::with('categorychilrent')->where('status',1)->where('parentID',0)->get();
            $data=DB::table('slides')->where('status',1)->get();
            $cate=$this->getcategory();
            $l=Cart::instance('shopping')->content();
            $qtys=Cart::count();
            $totals=Cart::subtotal();
            $news=DB::table('news')->where('status',1)->get();
            $total=Cart::subtotal();
            return view('client.cartItem.index',compact('menu','data','cate','news','qtys','l','totals','total'));
        
    }
}
