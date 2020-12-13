<?php

namespace App\Http\Controllers;

use App\Component\Recusive;
use Illuminate\Http\Request;
use App\news;
class adminNewController extends Controller
{
    private $news;
  
    private $htmlSelect;
    public function __construct(news $news)
    { 
     
        $this->news = $news;
    }
    public function index()
    {
        $listmn = $this->news->paginate(10);
        return view('admin.content.index', compact('listmn'));
    }
    public  function loadSelect()
    {
        $option=$this->getMenu();
        return view('admin.content.add', compact('option'));
    }
    public function getMenu()
    { 
        $data=$this->news->all();
        $Recusive= new Recusive($data);

        $option = $Recusive->categoryRecure();
        return $option;
    
    }
    
    function getd($parentId, $id =0, $text = '')
    {
        $data=$this->news->all();

        foreach ($data as $value) {
            if ($value['parentID'] == $id) {
                if(!empty($parentId)&& $parentId==$value['id']){
                    $this->htmlSelect .= "<option selected value='"  . $value['id'] .  "'>" . $text . $value['name'] . "</option>";
                }
                $this->htmlSelect .= "<option value='"  . $value['id'] .  "'>" . $text . $value['name'] . "</option>";

                $this->getd($parentId,$value['id'], $text . '--');
            }
        }
        return $this->htmlSelect;
    }

    public function create(Request $request)
    {

      

        $this->news->create([
            'name'=>$request->name,
            'slug'=>str_slug($request->name),
            'parentID'=>$request->parent_id,
            'status'=>$request->status
        ]);
        return redirect()->route('news.index');
    }
    public function edit($id)
    {
        $menu=$this->news->find($id);
       $option=$this->getd($menu->parentID);
      
        return view('admin.content.edit',compact('menu','option'));
    }


    public function update($id,Request $request)
    {
        
        $this->news->find($id)->update([
            'name'=>$request->name,
            'slug'=>str_slug($request->name),
            'parentID'=>$request->parent_id,
            'status'=>$request->status
        ]);
        return redirect('admin/content');
    }
    public function updates(Request $request)
    {   
        $url= url()->previous();
        $this->news->find($request->id)->update([
           
            'status'=>$request->status
        ]);
           
        return redirect($url);
    }
    public function delete($id)
    {
        try{
            $this->news->find($id)->delete();
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
