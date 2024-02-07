<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visi;

class VisiAPI extends Controller
{
    public function all(){
        $visi = visi::latest()->first();

        return response()->json([
        'is_success'=>true,
        'data'=>$visi,
        'status'=>200,
        'message'=>'data berhasil ditemukan']);
    }
    public function show(Request $request){
        $visi = visi::find($request->id);

        return response()->json(['is_success'=>true,
        'data'=>$visi,
        'status'=>200,
        'message'=>'data berhasil ditemukan']);
    }

    public function save(Request $request){
        $visi = visi::create([
            'deskripsi' => $request->deskripsi,

        ]);
        if($visi){
            return response()->json(['is_success'=>true,
            'data'=>$visi,
            'status'=>200,
            'message'=>'data berhasil dibuat']);
        }
        return response()->json(['is_success'=>true,
        'data'=>$visi,
        'status'=>500,
        'message'=>'kesalahan server atau data tidak lengkap']);
    }

    public function update(Request $request){
        $attributeUpdate = ['deskripsi'];
        $visi = visi::find($request->id);
        if($visi){
            foreach($attributeUpdate as $atribut){
                if($request->has($atribut)){
                    $visi->$atribut = $request->input($atribut);
                }
            }
            $visi->save();
            return response()->json(['is_success'=>true,
            'data'=>$visi,
            'status'=>200,
            'message'=>'data berhasil diedit']);
        }
        return response()->json(['is_success'=>true,
        'data'=>$visi,
        'status'=>500,
        'message'=>'kesalahan server atau data tidak lengkap']);
    }
    public function delete(Request $request){
        $visi = visi::find($request->id);
        if($visi){
            $visi->delete();
            return response()->json(['is_success'=>true,
           
            'status'=>200,
            'message'=>'data berhasil dihapus']);
        }
        return response()->json(['is_success'=>true,
        
        'status'=>500,
        'message'=>'kesalahan server atau data tidak benar']);
        
    }

}
