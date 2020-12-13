<?php
 namespace App\Http\ViewComposer;
 use App\Component\Recusive;
 use Illuminate\View\View;
use App\category;
use Gloudemans\Shoppingcart\Facades\Cart;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;

class MovieComposer
 {
     protected $category;
     public $movieList = [];
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct(category $category)
     {
         $this->category=$category;
     }
     public function getcategory()
     {
         $data=$this->category->where('status',1)->get();
        
         $Recusive= new Recusive($data);
 
         $option = $Recusive->categoryRecure();
         return $option;
     
     }
     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {
        
        $menu=category::with('categorychilrent')->where('status',1)->where('parentID',0)->get();
        $data=DB::table('slides')->where('status',1)->get();
        $cate=$this->getcategory();
        $l=Cart::instance('shopping')->content();
        $qtys=Cart::count();
        $totals=Cart::subtotal();
        $news=DB::table('news')->where('status',1)->get();
         $view->with(['menu'=>$menu,'data'=>$data,'cate'=>$cate,'news'=>$news,'qtys'=>$qtys,'cart'=>$l,'totals'=>$totals]);
         
     }
 }
