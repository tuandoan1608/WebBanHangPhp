<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\new_content;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class clientNewController extends Controller
{
    protected $new_content;
    public function __construct(new_content $new_content)
    {
        $this->new_content=$new_content;
    }
    public function index($id){
      
        $newcontent=   DB::table('news_content')->where('new_id',$id)->get();
        return view('client.news.index',compact('newcontent'));
    }
 
    public function detail(Request $request){
        $newdetail=$this->new_content->find($request->id);
        $newdetail->View_count=$newdetail->View_count+1;
        DB::table('news_content')->where('id',$request->id)->update(['View_Count'=>$newdetail->View_count]);
        return view('client.news.newdetail',compact('newdetail'));
    }
}
