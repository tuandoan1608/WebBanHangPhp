<?php

namespace App\Http\Controllers;

use App\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class adminorder extends Controller
{
    public function __construct(order $order)
    {
        $this->order = $order;
    }
    public function index()
    {
   
        $od = $this->order->orderBy('created_at','desc')->get();
        return view('admin.orderadmin.index', compact('od'));
    }
    public function updates(Request $request)
    {
        $url = url()->previous();
        $this->order->find($request->id)->update([

            'status' => $request->status
        ]);

        return redirect($url);
    }
    public function detail($id)
    {

        $od = $this->order->where('id', $id)->first();

        $billInfo = DB::table('orders')
            ->join('order_detail', 'orders.id', '=', 'order_detail.orderID')
            ->leftjoin('products', 'order_detail.productID', '=', 'products.id')
            ->where('orders.id', '=', $id)
            ->select('orders.*', 'order_detail.*', 'products.name as product_name')
            ->get();
        $this->data['billInfo'] = $billInfo;

        return view('admin.orderadmin.detail', $this->data, compact('od'));
    }
    public function printer($id)
    {

        $od = $this->order->where('id', $id)->first();

        $billInfo = DB::table('orders')
            ->join('order_detail', 'orders.id', '=', 'order_detail.orderID')
            ->leftjoin('products', 'order_detail.productID', '=', 'products.id')
            ->where('orders.id', '=', $id)
            ->select('orders.*', 'order_detail.*', 'products.name as product_name')
            ->get();
        $this->data['billInfo'] = $billInfo;

        return view('admin.orderadmin.printers', $this->data, compact('od'));
    }
}
