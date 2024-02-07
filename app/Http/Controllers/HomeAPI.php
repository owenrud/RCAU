<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hero;

class HomeAPI extends Controller
{

    // HERO 
    public function all(){
        $hero = hero::latest()->first();

        return response()->json([
        'is_success'=>true,
        'data'=>$hero,
        'status'=>200,
        'message'=>'data berhasil ditemukan']);
    }
    public function show(Request $request){
        $hero = hero::find($request->id);

        return response()->json(['is_success'=>true,
        'data'=>$hero,
        'status'=>200,
        'message'=>'data berhasil ditemukan']);
    }

    public function save(Request $request){
        $hero = hero::create([
            'title'=> $request->title,
            
            'deskripsi' => $request->deskripsi,
            'number_project'=> $request->number_project,
            'housing'=> $request->housing,
            'commercial'=>$request->commercial,
            'government'=>$request->government,
        ]);
        if($hero){
            return response()->json(['is_success'=>true,
            'data'=>$hero,
            'status'=>200,
            'message'=>'data berhasil dibuat']);
        }
        return response()->json(['is_success'=>true,
        'data'=>$hero,
        'status'=>500,
        'message'=>'kesalahan server atau data tidak lengkap']);
    }

    public function update(Request $request){
        $attributeUpdate = ['title','deskripsi','
        number_project','housing','commercial','government'];
        $hero = hero::find($request->id);
        if($hero){
            foreach($attributeUpdate as $atribut){
                if($request->has($atribut)){
                    $hero->$atribut = $request->input($atribut);
                }
            }
            $hero->save();
            return response()->json(['is_success'=>true,
            'data'=>$hero,
            'status'=>200,
            'message'=>'data berhasil diedit']);
        }
        return response()->json(['is_success'=>true,
        'data'=>$hero,
        'status'=>500,
        'message'=>'kesalahan server atau data tidak lengkap']);
    }
    public function delete(Request $request){
        $hero = hero::find($request->id);
        if($hero){
            $hero->delete();
            return response()->json(['is_success'=>true,
           
            'status'=>200,
            'message'=>'data berhasil dihapus']);
        }
        return response()->json(['is_success'=>false,
        
        'status'=>500,
        'message'=>'kesalahan server atau data tidak benar']);
        
    }

 
}
