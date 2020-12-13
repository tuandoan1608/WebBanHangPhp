<?php

namespace App\Http\Controllers;

use Illuminate\Routing\UrlGenerator;
use App\Component\Recusive;
use App\category;
use App\traits\uploadfile;
use Illuminate\Http\Request;
use App\product;
use Illuminate\Support\Str;
use App\productImgage;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    public $pro;
    private $list;
    private $htmlSelect = '';
    private $product;
    public function __construct(product $pro, category $list, productImgage $product)
    {
        $this->product = $pro;
        $this->category = $list;
        $this->productImgage = $product;
    }
    public function index()
    {

        $data = $this->product->paginate(15);
        
        return view('admin.product.index', compact("data"));
    }
    public function add()
    {
        $select = $this->getcategory();
        return view('admin.product.add', compact('select'));
    }
    public function getcategory()
    {
        $data = $this->category->all();
        $Recusive = new Recusive($data);

        $option = $Recusive->categoryRecure();
        return $option;
    }
    function getd($parentId, $id = 0, $text = '')
    {
        $data = $this->category->all();

        foreach ($data as $value) {
            if ($value['parentID'] == $id) {
                if (!empty($parentId) && $parentId == $value['id']) {
                    $this->htmlSelect .= "<option selected value='"  . $value['id'] .  "'>" . $text . $value['name'] . "</option>";
                } else {
                    $this->htmlSelect .= "<option value='"  . $value['id'] .  "'>" . $text . $value['name'] . "</option>";

                    $this->getd($parentId, $value['id'], $text . '--');
                }
            }
        }
        return $this->htmlSelect;
    }
    public function edit($id)
    {
        $data = $this->product->find($id);
        $selectcategory = $this->getd($data->categoryID);


        $users = productImgage::where(function ($query) use ($id) {
            $query->select('productID')
                ->from('product_images')
                ->where('productID', $id);
        })->get();

        return view('admin.product.edit', compact('data', 'selectcategory', 'users'));
    }
    public function update(Request $request, $id)
    {
        //data product
        $file = $request->feature_image_path;
       if(!empty($file)){
        $filename = $file->getClientOriginalName();
        $fileNameHash =Str::random(20) . '.' . $file->getClientOriginalExtension();
        $path = $request->file('feature_image_path')->storeAs('public/produc/' . auth()->id(), $fileNameHash);
        $data = [
            'file_name' => $filename,
            'file_url' => Storage::url($path)
        ];
        $arrdata = [
            'name' => $request->name,
            'metatitle' => Str::slug($request->name),
            'categoryID' => $request->category_id,
            'brand' => $request->brand,
            'code' => Str::random(8),
            'price' => $request->price,
            'detail' => $request->Description,
        ];
        if(!empty($request->discount)){
            $promotionPrice=(100-$request->discount)/100 *$request->price;
            $arrdata['discount']=$request->discount;
            $arrdata['promotionPrice']=$promotionPrice;

         
        }
        if (!empty($data)) {
            $arrdata['image'] = $data['file_url'];
        }
       }else{       
        $arrdata = [
            'name' => $request->name,
            'metatitle' => Str::slug($request->name),
            'categoryID' => $request->category_id,
            'brand' => $request->brand,
            'code' => Str::random(8),
            'price' => $request->price,
            'detail' => $request->Description,
        ];
       }
        $this->product->find($request->id)->update($arrdata);
        if (!empty($request->image_path)) {
            $this->productImgage->where('productID', $id)->delete();
            foreach ($request->image_path as $image_item) {
                //data image product
                $filenames = $image_item->getClientOriginalName();
                $fileNameHashs = Str::random(20) . '.' . $image_item->getClientOriginalExtension();
                $paths = $image_item->storeAs('public/produc/' . auth()->id(), $fileNameHashs);
                $datas = [
                    'file_name' => $filenames,
                    'file_url' => Storage::url($paths)
                ];
                productImgage::create([
                    'image' => $datas['file_url'],
                    'productID' => $request->id,
                ]);
            }
        }  
        return redirect('admin/product' . '?page=' . $request->page);
    }
    public function store(Request $request)
    {
        //data product
        $file = $request->feature_image_path;
        $filename = $file->getClientOriginalName();
        $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $path = $request->file('feature_image_path')->storeAs('public/produc/' . auth()->id(), $fileNameHash);
        $data = [
            'file_name' => $filename,
            'file_url' => Storage::url($path)
        ];
        
        $arrdata = [
            'name' => $request->name,
            'keyword'=>$request->keyword,
          
            'decription'=>$request->desript,
            'metatitle' => Str::slug($request->name),
            'categoryID' => $request->category_id,
            'brand' => $request->brand,
            'code' => Str::random(8),
            'price' => $request->price,
            'detail' => $request->Description,
        ];
        if(!empty($request->discount)){
            $promotionPrice=(100-$request->discount)/100 *$request->price;
            $arrdata['discount']=$request->discount;
            $arrdata['promotionPrice']=$promotionPrice;

         
        }
        if (!empty($data)) {
            $arrdata['image'] = $data['file_url'];
        }
        $product =  $this->product->create($arrdata);
        foreach ($request->image_path as $image_item) {
            //data image product
            $filenames = $image_item->getClientOriginalName();
            $fileNameHashs = Str::random(20) . '.' . $image_item->getClientOriginalExtension();
            $paths = $image_item->storeAs('public/produc/' . auth()->id(), $fileNameHashs);
            $datas = [
                'file_name' => $filenames,
                'file_url' => Storage::url($paths)
            ];
            productImgage::create([
                'image' => $datas['file_url'],
                'productID' => $product->id,
            ]);
        }
        return redirect()->route('product.index');
    }
    public function delete($id)
    {
        try {
            $this->product->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'code' => 500,
                'message' => 'faile'
            ]);
        }
    }
}
