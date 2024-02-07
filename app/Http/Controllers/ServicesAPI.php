<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\services;

class ServicesAPI extends Controller
{
    public function all(){
        $services = services::all();

        return response()->json([
        'is_success'=>true,
        'data'=>$services,
        'status'=>200,
        'message'=>'data berhasil ditemukan']);
    }
    public function show(Request $request){
        $services = services::find($request->id);

        return response()->json(['is_success'=>true,
        'data'=>$services,
        'status'=>200,
        'message'=>'data berhasil ditemukan']);
    }

    public function save(Request $request){
        $services = services::create([
            'nama'=> $request->nama,
            'tags' => json_encode(explode(',', $request->tags)),

        ]);
        if($services){
            return response()->json(['is_success'=>true,
            'data'=>$services,
            'status'=>200,
            'message'=>'data berhasil dibuat']);
        }
        return response()->json(['is_success'=>true,
        'data'=>$services,
        'status'=>500,
        'message'=>'kesalahan server atau data tidak lengkap']);
    }

    public function update(Request $request){
        $attributeUpdate = ['nama', 'tags'];
        $services = services::find($request->id);
        
        if($services){
            foreach($attributeUpdate as $atribut){
                if($request->has($atribut)){
                    if($atribut == "tags"){
                        $services->$atribut = json_encode(explode(',', $request->input($atribut)));
                    } else {
                        $services->$atribut = $request->input($atribut);
                    }
                }
            }
    
            // Save the updated services
            $services->save();
            
            // Return a response or redirect as needed
            return response()->json([
                'is_success' => true,
                'message' => 'Data berhasil diupdate',
                'data' => $services,
                'status' => 200,
            ]);
        }
        
        // Handle the case where services with the provided ID is not found
        return response()->json([
            'is_success' => false,
            'message' => 'Data tidak ditemukan',
            'status' => 404,
        ]);
    }
    
    public function delete(Request $request){
        $services = services::find($request->id);
        if($services){
            $services->delete();
            return response()->json(['is_success'=>true,
           
            'status'=>200,
            'message'=>'data berhasil dihapus']);
        }
        return response()->json(['is_success'=>true,
        
        'status'=>500,
        'message'=>'kesalahan server atau data tidak benar']);
        
    }

}
