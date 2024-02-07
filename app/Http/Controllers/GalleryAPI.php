<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;

class GalleryAPI extends Controller
{
    public function all(){
        $gallery = gallery::all();

        return response()->json([
        'is_success'=>true,
        'data'=>$gallery,
        'status'=>200,
        'message'=>'data berhasil ditemukan']);
    }
    public function show(Request $request){
        $gallery = gallery::find($request->id);

        return response()->json(['is_success'=>true,
        'data'=>$gallery,
        'status'=>200,
        'message'=>'data berhasil ditemukan']);
    }

     
    function handleFileUpload($request, $attribute)
    {
        if ($request->hasFile($attribute)) {
            $file = $request->file($attribute);
    
            // Modify the filename
            $modifiedFilename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
    
            // Store the file with the modified filename
            $path = $file->storeAs('uploads', $modifiedFilename, 'public');
    
            // Return the modified filename to be saved in the model
            return $modifiedFilename;
        }
    
        // If no file is uploaded, return the existing value or null, depending on your logic
        return $request->$attribute;
    }

    public function save(Request $request){
        $gallery = gallery::create([
            'file'=> $this->handleFileUpload($request, 'file'),
            'type' => $request->type]);
        if($gallery){
            return response()->json(['is_success'=>true,
            'data'=>$gallery,
            'status'=>200,
            'message'=>'data berhasil dibuat']);
        }
        return response()->json(['is_success'=>true,
        'data'=>$gallery,
        'status'=>500,
        'message'=>'kesalahan server atau data tidak lengkap']);
    }

    public function update(Request $request){
        $attributeUpdate = ['file','type'];
        $gallery = gallery::find($request->id);
        if($gallery){
            foreach($attributeUpdate as $atribut){
                if($request->has($atribut)){
                    if ($atribut == 'file'){
                        $gallery->$atribut = $this->handleFileUpload($request, $atribut);
                    }else{
                        $gallery->$atribut = $request->input($atribut);
                    }
                    
                }
            }
            $gallery->save();
            return response()->json(['is_success'=>true,
            'data'=>$gallery,
            'status'=>200,
            'message'=>'data berhasil diedit']);
        }
        return response()->json(['is_success'=>true,
        'data'=>$gallery,
        'status'=>500,
        'message'=>'kesalahan server atau data tidak lengkap']);
    }
    public function delete(Request $request){
        $gallery = gallery::find($request->id);
        if($gallery){
            $gallery->delete();
            return response()->json(['is_success'=>true,
           
            'status'=>200,
            'message'=>'data berhasil dihapus']);
        }
        return response()->json(['is_success'=>true,
        
        'status'=>500,
        'message'=>'kesalahan server atau data tidak benar']);
        
    }
}
