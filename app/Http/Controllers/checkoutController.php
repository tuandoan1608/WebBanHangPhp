<?php

namespace App\Http\Controllers;

use App\order;
use App\userorder;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class checkoutController extends Controller
{
    public function __construct(order $order, userorder $userorder)
    {
        $this->order = $order;
        $this->userorder = $userorder;
    }
    public function index()
    {
        $data = Cart::instance('shopping')->content();
        $totals = Cart::subtotal();
        return view('client.checkout.index', compact('data', 'totals'));
    }
    public function placeOrder(Request $request)
    {
        $l = Cart::instance('shopping')->content();
        $amount = Cart::subtotal();


     

        $userid = Auth::guard('userclient')->id();

        $status = 1;
        $data = [
       
            'userID' => $userid,
            'amount' => $amount,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            "phone" => $request->phone,
            "email" => $request->email,
            'address' => $request->fulladdress,
            'note' => $request->note,
            'status' => $status,
        ];

        $order = $this->order->create($data);
        $cart = Cart::instance('shopping')->content();
        foreach ($cart as $value) {
            DB::table('order_detail')->insert([
                'orderID' => $order->id,
                'productID' => $value->id,
                'total_price' => $value->price * $value->qty,
                'quantity' => $value->qty,


            ]);
        }
        Cart::destroy();

        return redirect()->route('chitietdonhang');
    }
    public function chitietdon()
    {  $userid = Auth::guard('userclient')->id();
        $od=$this->order->where('userID',$userid)->orderBy('created_at','desc')->get();
        return view('client.order.index',compact('od'));
    }
    public function delete($id)
    {
        try{
            $this->order->find($id)->delete();
            DB::table('order_detail')->where('orderID',$id)->delete();
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
