<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\portfolio;

class portfolioAPI extends Controller
{
    public function all(){
        $portfolio = portfolio::all();

        return response()->json(['is_success'=>true,
        'data'=>$portfolio,
        'status'=>200,
        'message'=>'data berhasil ditemukan']);
    }
    
    public function show(Request $request){
        $portfolio = portfolio::find($request->id);

        return response()->json(['is_success'=>true,
        'data'=>$portfolio,
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
        $portfolio = portfolio::create([
            'title'=>$request->title,
            'foto_project'=> $this->handleFileUpload($request, 'foto_project'),
            'start' => $request->start,
            'end'=> $request->end,
            'price' => $request->price,
            'status'=>$request->status]);
        if($portfolio){
            return response()->json(['is_success'=>true,
            'data'=>$portfolio,
            'status'=>200,
            'message'=>'data berhasil dibuat']);
        }
        return response()->json(['is_success'=>true,
        'data'=>$portfolio,
        'status'=>500,
        'message'=>'kesalahan server atau data tidak lengkap']);
    }

    public function update(Request $request)
{
    $attributeUpdate = ['title', 'foto_project', 'start', 'end','price','status'];
    $portfolio = Portfolio::find($request->id);

    if ($portfolio) {
        // Retrieve the path of the existing file
        $existingFilePath = storage_path('app/public/uploads/' . $portfolio->foto_project);

        foreach ($attributeUpdate as $atribut) {
            if ($request->has($atribut)) {
                if ($atribut == 'foto_project') {
                    // Delete the existing file
                    if (file_exists($existingFilePath)) {
                        unlink($existingFilePath);
                    }

                    // Handle the file upload
                    $portfolio->$atribut = $this->handleFileUpload($request, $atribut);
                } else {
                    $portfolio->$atribut = $request->input($atribut);
                }
            }
        }

        $portfolio->save();

        return response()->json([
            'is_success' => true,
            'data' => $portfolio,
            'status' => 200,
            'message' => 'Data berhasil diedit'
        ]);
    }

    return response()->json([
        'is_success' => false,
        'data' => $portfolio,
        'status' => 404,
        'message' => 'Data tidak ditemukan'
    ]);
}

    public function delete(Request $request)
{
    $portfolio = Portfolio::find($request->id);

    if ($portfolio) {
        // Get the file path from the model
        $filePath = storage_path('app/public/uploads/' . $portfolio->foto_project);

        // Check if the file exists before attempting to delete it
        if (file_exists($filePath)) {
            // Delete the file from storage
            unlink($filePath);
        }

        // Delete the model
        $portfolio->delete();

        return response()->json([
            'is_success' => true,
            'status' => 200,
            'message' => 'Data berhasil dihapus'
        ]);
    }

    return response()->json([
        'is_success' => false,
        'status' => 404,
        'message' => 'Data tidak ditemukan'
    ]);
}

}
