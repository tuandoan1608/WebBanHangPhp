<?php

namespace App\Http\Controllers;

use App\category;
use App\Component\Recusive;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeclientController extends Controller
{
    private $product;
    private $category;
    public function __construct(category $category, product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function index()
    {

        $newProduct = $this->product->with('productstatus')->orderBy('created_at', 'DESC')->take(15)->get();
        $hotProduct = $this->product->orderBy('tophot', 'DESC')->take(15)->get();
        $catecat = $this->category->with('productstatus','categorychilrent')->where('status', 1)->where('parentID', 0)->get();
        return view('homeclient', compact('newProduct', 'hotProduct','catecat'));
    }
  
    public function getcategory()
    {
        $data = $this->category->all();
        $Recusive = new Recusive($data);

        $option = $Recusive->categoryRecure();
        return $option;
    }
}
