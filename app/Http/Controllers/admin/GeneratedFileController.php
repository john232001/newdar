<?php

namespace App\Http\Controllers\admin;

use App\Models\GeneratedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class GeneratedFileController extends Controller
{
    public function store(Request $request){

        // Store the file
        $file = $request->file('uploadfile');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('uploads/GeneratedFile'), $fileName);

        // Insert file path into the database using Query Builder
        DB::table('generated_files')->insert([
            'landholding_id' => $request->landholding_id,
            'uploadfile' => $fileName,
            'formNo' => $request->formNo,
            'date_upload' => $request->date_upload,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
    public function delete($id)
    {
        $generatedFile = GeneratedFile::findOrFail($id);

        $filePath = public_path('uploads/GeneratedFile/' . $generatedFile->uploadfile);

        if (File::exists($filePath)) {
            File::delete($filePath);
            Storage::delete(storage_path('app/public/uploads/GeneratedFile/' . $generatedFile->uploadfile));
        }
        
        $generatedFile->delete();

        return redirect()->back()->with('error', 'Deleted successfully');
    }
}
