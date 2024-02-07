<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contactus;

class ContactAPI extends Controller
{
    public function all(){
        $contactus = contactus::all();

        return response()->json([
        'is_success'=>true,
        'data'=>$contactus,
        'status'=>200,
        'message'=>'data berhasil ditemukan']);
    }
    public function show(Request $request){
        $contactus = contactus::find($request->id);

        return response()->json(['is_success'=>true,
        'data'=>$contactus,
        'status'=>200,
        'message'=>'data berhasil ditemukan']);
    }

     

    public function save(Request $request){
        $contactus = contactus::create([
            'title'=>$request->title,
            'deskripsi'=> $request->deskripsi,
            'link' => $request->link]);
        if($contactus){
            return response()->json(['is_success'=>true,
            'data'=>$contactus,
            'link'=>200,
            'message'=>'data berhasil dibuat']);
        }
        return response()->json(['is_success'=>true,
        'data'=>$contactus,
        'link'=>500,
        'message'=>'kesalahan server atau data tidak lengkap']);
    }

    public function update(Request $request){
        $attributeUpdate = ['title','deskripsi','link'];
        $contactus = contactus::find($request->id);
        if($contactus){
            foreach($attributeUpdate as $atribut){
                if($request->has($atribut)){
                    $contactus->$atribut = $request->input($atribut);
                                  
                }
            }
            $contactus->save();
            return response()->json(['is_success'=>true,
            'data'=>$contactus,
            'link'=>200,
            'message'=>'data berhasil diedit']);
        }
        return response()->json(['is_success'=>true,
        'data'=>$contactus,
        'link'=>500,
        'message'=>'kesalahan server atau data tidak lengkap']);
    }
    public function delete(Request $request){
        $contactus = contactus::find($request->id);
        if($contactus){
            $contactus->delete();
            return response()->json(['is_success'=>true,
           
            'link'=>200,
            'message'=>'data berhasil dihapus']);
        }
        return response()->json(['is_success'=>true,
        
        'link'=>500,
        'message'=>'kesalahan server atau data tidak benar']);
        
    }
}
