<?php

namespace App\Http\Controllers;
use App\menu;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Http\Request;
use App\Component\Recusive;
class menuController extends Controller
{
    private $menu;
  
    private $htmlSelect;
    public function __construct(menu $menu)
    {
     
        $this->menu = $menu;
    }
    public function index()
    {
        $listmn = $this->menu->paginate(1);
        return view('admin.menulist.index', compact('listmn'));
    }
    public  function loadSelect()
    {
        $option=$this->getMenu();
        return view('admin.menulist.add', compact('option'));
    }
    public function getMenu()
    {
        $data=$this->menu->all();
        $Recusive= new Recusive($data);

        $option = $Recusive->categoryRecure();
        return $option;
    
    }
    
    function getd($parentId, $id =0, $text = '')
    {
        $data=$this->menu->all();

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

      

        $this->menu->create([
            'name'=>$request->name,
            'link'=>str_slug($request->name),
            'parentID'=>$request->parent_id,
            'status'=>$request->status
        ]);
        return redirect()->route('menulist.index');
    }
    public function edit($id)
    {
        $menu=$this->menu->find($id);
       $option=$this->getd($menu->parentID);
      
        return view('admin.menulist.edit',compact('menu','option'));
    }


    public function update($id,Request $request)
    {
        
        $this->menu->find($id)->update([
            'name'=>$request->name,
            'link'=>str_slug($request->name),
            'parentID'=>$request->parent_id,
            'status'=>$request->status
        ]);
        return redirect('admin/menulist'.'?page='.$request->page);
    }
    public function updates(Request $request)
    {   
        $url= url()->previous();
        $this->menu->find($request->id)->update([
           
            'status'=>$request->status
        ]);
           
        return redirect($url);
    }
    public function delete($id)
    {
        try{
            $this->menu->find($id)->delete();
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
