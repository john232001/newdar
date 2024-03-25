<?php

namespace App\Http\Controllers\admin;

use App\Models\GeneratedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ApprovedFormController extends Controller
{
    public function store(Request $request){
        try{

            $request->validate([
                'uploadfile' => 'required',
                'formNo' => 'required',
                'date_upload' => 'required'
            ]);

             // Store the file
            $file = $request->file('uploadfile');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('uploads/ApprovedForm'), $fileName);

            $data = DB::table('generated_files')->insert([
                'landholding_id' => $request->landholding_id,
                'uploadfile' => $fileName,
                'formNo' => $request->formNo,
                'date_upload' => $request->date_upload,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'File uploaded successfully.');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Failed to insert data!!! ' . $e->getMessage());
        }
    }
    public function update(Request $request, $id){

        $generatedFile = GeneratedFile::findOrFail($id);

        $generatedFile->update([
            'formNo' => $request->formNo,
            'date_upload' => $request->date_upload,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);

        // Check if a new file is uploaded
        if ($request->hasFile('uploadfile')) {

            // Get the full path to the existing file
            $filePath = public_path('uploads/ApprovedForm/' . $generatedFile->uploadfile);

            // If the existing file exists, delete it
            if (File::exists($filePath)) {
                File::delete($filePath);
                Storage::delete(storage_path('app/public/uploads/ApprovedForm/' . $generatedFile->uploadfile));
            }

            // Get the original name of the uploaded file
            $newFileName = $request->file('uploadfile')->getClientOriginalName();

            // Move the uploaded file to the `uploads/ApprovedForm` directory
            $request->file('uploadfile')->move('uploads/ApprovedForm', $newFileName);

            $generatedFile->update(['uploadfile' => $newFileName]);
        }
        return redirect()->back()->with('success', 'Updated successfully');
    }
    public function delete($id)
    {
        // Retrieve file information from the database
        $fileInfo = DB::table('generated_files')->where('id', $id)->first();

        if (!$fileInfo) {
            return redirect()->back()->with('error', 'File not found.');
        }

        // Delete the file from the storage
        $filePath = public_path('uploads/ApprovedForm') . '/' . $fileInfo->uploadfile;
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        // Delete the record from the database
        DB::table('generated_files')->where('id', $id)->delete();

        return redirect()->back()->with('error', 'File deleted successfully.');
    }
    public function filedownload($id)
    {
        $generatedFile = GeneratedFile::findOrFail($id);
        if ($generatedFile->uploadfile) {
            $filePath = public_path("uploads/ApprovedForm/{$generatedFile->uploadfile}");
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'No Document Found!');
        }
    }
}
