<?php

namespace App\traits;
use Illuminate\Support\Facades\Storage;
trait uploadfile
{
    public function uploadfileimage($request,$filename,$folder){
       if($request->hastFile($filename)){
        $file=$request->$filename;
        $filename=$file->getClientOriginalName();
        $fileNameHash=str_random(20).'.'.$file->getClientOriginalExtension();
        $path = $request->file('feature_image_path')->storeAs('public/'.$folder.'/'.auth()->id(),$fileNameHash);
        $data=[
            'file_name'=>$filename,
            'file_url'=>Storage::url($path)
        ];
        return $data;
       }
       return null;
    }
}
?>