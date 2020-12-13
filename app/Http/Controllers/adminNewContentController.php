<?php

namespace App\Http\Controllers;

use App\Component\Recusive;
use Illuminate\Http\Request;
use App\new_content;
use App\news;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class adminNewContentController extends Controller
{
    protected $newcontent;
    protected $news;
    public function __construct(new_content $newcontent,news $news)
    {
        
        $this->newcontent=$newcontent;
        $this->news=$news;
    }
    public function index(){
        $listmn=DB::table('news_content')->paginate(3);

        return view('admin.newcontent.index',compact('listmn'));
    }
    public function add(){
       $select= $this->getnews();
        return view('admin.newcontent.add',compact('select'));
    }
    public function getnews(){
 
        $data=$this->news->all();
        $recusive=new Recusive($data);
        $select=$recusive->categoryRecure();
        return $select;
    }
    public function store(Request $request){
        $file=$request->feature_image_path;
        $filename=$file->getClientOriginalName();
        $filenameHash=str_random(20).'.'.$file->getClientOriginalExtension();
        $path=$request->file('feature_image_path')->storeAs('public/news/' . auth()->id(), $filenameHash);
        $data=[
            
            'url'=>Storage::url($path)

        ];
        $arr=[
            'name'=>$request->name,
            'content'=>$request->content,
            'slug'=>str_slug($request->name),
            'new_id'=>$request->new,
            'descript'=>$request->descript,

        ];
        if(!empty($data)){
            $arr['image']=$data['url'];
        }
   
        $this->newcontent->create($arr);
        return redirect()->to('admin/newscontent');
    }
    public function edit(){
        
    }
    public function delete(){
        
    }
}
