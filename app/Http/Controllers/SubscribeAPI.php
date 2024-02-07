<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subscribe;
use Illuminate\Support\Facades\Mail;

class SubscribeAPI extends Controller
{
    public function all(){
        $subscribe = subscribe::all();

        return response()->json([
        'is_success'=>true,
        'data'=>$subscribe,
        'status'=>200,
        'message'=>'data berhasil ditemukan']);
    }
    public function show(Request $request){
        $subscribe = subscribe::find($request->id);

        return response()->json(['is_success'=>true,
        'data'=>$subscribe,
        'status'=>200,
        'message'=>'data berhasil ditemukan']);
    }

     

    public function save(Request $request){
        $subscribe = subscribe::create([
            'nama'=>$request->nama,
            'email'=> $request->email,
            'phone'=>$request->phone,
            'kategori'=>$request->kategori,
            'rumah_tinggal'=>$request->rumah_tinggal,
            'komersial'=>$request->komersial,
            'luas'=>$request->luas,
            'city'=>$request->city,
            ]);
        if($subscribe){
            return response()->json(['is_success'=>true,
            'data'=>$subscribe,
            'status'=>200,
            'message'=>'data berhasil dibuat']);
        }
        return response()->json(['is_success'=>true,
        'data'=>$subscribe,
        'status'=>500,
        'message'=>'kesalahan server atau data tidak lengkap']);
    }

    public function update(Request $request){
        $attributeUpdate = ['nama','email','phone',
        'kategori','rumah_tinggal','komersial','luas','city'];
        $subscribe = subscribe::find($request->id);
        if($subscribe){
            foreach($attributeUpdate as $atribut){
                if($request->has($atribut)){
                    $subscribe->$atribut = $request->input($atribut);
                                  
                }
            }
            $subscribe->save();
            return response()->json(['is_success'=>true,
            'data'=>$subscribe,
            'status'=>200,
            'message'=>'data berhasil diedit']);
        }
        return response()->json(['is_success'=>true,
        'data'=>$subscribe,
        'status'=>500,
        'message'=>'kesalahan server atau data tidak lengkap']);
    }
    public function delete(Request $request){
        $subscribe = subscribe::find($request->id);
        if($subscribe){
            $subscribe->delete();
            return response()->json(['is_success'=>true,
           
            'status'=>200,
            'message'=>'data berhasil dihapus']);
        }
        return response()->json(['is_success'=>true,
        
        'status'=>500,
        'message'=>'kesalahan server atau data tidak benar']);
        
    }
}
