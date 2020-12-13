<?php

namespace App\Http\Controllers;

use App\traits\uploadfile;
use App\slide;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Storage;

class slideController extends Controller
{
    private $slide;
    public function __construct(slide $slide)
    {
        $this->slide = $slide;
    }
    public function index()
    {
        $data = $this->slide->paginate(10);
     
        return view('admin.slide.index', compact('data'));
    }
    public function create()
    {

        return view('admin.slide.add');
    }
    public function insert(Request $request)
    {
        $file = $request->imgSlide;
        $filename = $file->getClientOriginalName();
        $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
        $path = $request->file('imgSlide')->storeAs('public/slide/' . auth()->id(), $fileNameHash);
        $ar = [
            'file_name' => $filename,
            'url' => Storage::url($path)
        ];

        $this->slide->create([
            'image' => $ar['url'],
            'descript' => $request->txtDescript,
            'title' => $request->txtTitle,
            'status' => $request->rdoStatus
        ]);
        return redirect()->route('slide.index');
    }
    public function edit($id)
    {
        $data = $this->slide->find($id);
        return view('admin.slide.sua', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $file = $request->imgSlide;
        if (!empty($file)) {
            $filename = $file->getClientOriginalName();
            $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
            $path = $request->file('imgSlide')->storeAs('public/slide/' . auth()->id(), $fileNameHash);
            $ar = [
                'file_name' => $filename,
                'url' => Storage::url($path)
            ];
            $this->slide->find($id)->update([
                'image' => $ar['url'],
                'descript' => $request->txtDescript,
                'title' => $request->txtTitle,
                'status' => $request->rdoStatus
            ]);
        } else {
            $this->slide->find($id)->update([
                // 'image'=>$ar['url'],
                'descript' => $request->txtDescript,
                'title' => $request->txtTitle,
                'status' => $request->rdoStatus
            ]);
        }
        return redirect('admin/slide'.'?page='.$request->page);
    }
    public function updates(Request $request)
    {   
        $url= url()->previous();
        $this->slide->find($request->id)->update([
           
            'status'=>$request->status
        ]);
           
        return redirect($url);
    }
    public function delete($id)
    {
        try{
            $this->slide->find($id)->delete();
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
