<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\misi;

class MisiAPI extends Controller
{
     
     public function all(){
        $misi = misi::all();

        return response()->json([
        'is_success'=>true,
        'data'=>$misi,
        'status'=>200,
        'message'=>'data berhasil ditemukan']);
    }
    public function show(Request $request){
        $misi = misi::find($request->id);

        return response()->json(['is_success'=>true,
        'data'=>$misi,
        'status'=>200,
        'message'=>'data berhasil ditemukan']);
    }

    public function save(Request $request){
        $misi = misi::create([
            'deskripsi' => $request->deskripsi,

        ]);
        if($misi){
            return response()->json(['is_success'=>true,
            'data'=>$misi,
            'status'=>200,
            'message'=>'data berhasil dibuat']);
        }
        return response()->json(['is_success'=>true,
        'data'=>$misi,
        'status'=>500,
        'message'=>'kesalahan server atau data tidak lengkap']);
    }

    public function update(Request $request){
        $attributeUpdate = ['deskripsi'];
        $misi = misi::find($request->id);
        if($misi){
            foreach($attributeUpdate as $atribut){
                if($request->has($atribut)){
                    $misi->$atribut = $request->input($atribut);
                }
            }
            $misi->save();
            return response()->json(['is_success'=>true,
            'data'=>$misi,
            'status'=>200,
            'message'=>'data berhasil diedit']);
        }
        return response()->json(['is_success'=>true,
        'data'=>$misi,
        'status'=>500,
        'message'=>'kesalahan server atau data tidak lengkap']);
    }
    public function delete(Request $request){
        $misi = misi::find($request->id);
        if($misi){
            $misi->delete();
            return response()->json(['is_success'=>true,
           
            'status'=>200,
            'message'=>'data berhasil dihapus']);
        }
        return response()->json(['is_success'=>true,
        
        'status'=>500,
        'message'=>'kesalahan server atau data tidak benar']);
        
    }

}
