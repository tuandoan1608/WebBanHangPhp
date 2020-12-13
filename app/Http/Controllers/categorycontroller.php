<?php

namespace App\Http\Controllers;
use Illuminate\Routing\UrlGenerator;
use App\Component\Recusive;
use App\category;
use App\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class categorycontroller extends Controller
{
    private $listmn;
    private $menu;
    private $htmlSelect;
    public function __construct(category $listmn,menu $menu)
    {
     
        $this->category = $listmn;
        $this->menu=$menu;
    }
    public function index()
    {
        $listmn = $this->category->paginate(10);
        return view('admin.category.index', compact('listmn'));
    }
    public  function loadSelect()
    {
        $option=$this->getcategory();
       
        return view('admin.category.add', compact('option'));
    }
    public function getcategory()
    {
        $data=$this->category->all();
        $Recusive= new Recusive($data);

        $option = $Recusive->categoryRecure();
        return $option;
    
    }
   

    function getd($parentId, $id =0, $text = '')
    {
        $data=$this->category->all();

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

        

        $this->category->create([
            'name'=>$request->name,
            'link'=>Str::slug($request->name),
            'parentID'=>$request->parent_id,
            
            'status'=>$request->status
        ]);
        return redirect()->route('category.index');
    }
    public function edit($id)
    {
        $menu=$this->category->find($id);
       $option=$this->getd($menu->parentID);
      
        return view('admin.category.edit',compact('menu','option'));
    }


    public function update($id,Request $request)
    {
        $this->category->find($id)->update([
            'name'=>$request->name,
            'link'=>Str::slug($request->name),
            'parentID'=>$request->parent_id,
            'status'=>$request->status
        ]);
        return redirect('admin/category'.'?page='.$request->page);
    }

    public function updates(Request $request)
    {   
        $url= url()->previous();
        $this->category->find($request->id)->update([
           
            'status'=>$request->status
        ]);
           
        return redirect($url);
    }
    public function delete($id)
    {
        try{
            $this->category->find($id)->delete();
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
