<?php

namespace App\Http\Controllers\admin;

use App\Models\GenerateLog;
use App\Models\GeneratedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Http\Request;

class Form47Controller extends Controller
{
    public function generateform($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('asps', 'landholdings.id', '=', 'asps.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names','asps.aspNo')
            ->where('landholdings.id', $id)
            ->first();

        $gettotalArea = DB::table('lots')
            ->where('lots.landholding_id', $id)
            ->where('lots.lotType_id', 1)
            ->sum('lotArea');

        $getarbs = DB::table('arbs')
            ->leftJoin('lots', 'arbs.id', '=', 'lots.arb_name')
            ->leftJoin('awardtitles', 'lots.id', '=', 'awardtitles.lotNumber_id')
            ->where('arbs.landholding_id', $id)
            ->get();

        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_47'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.47.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        $templateProcessor->setValue('middlename', $data->middlename);
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('aspNo', $data->aspNo);
        $templateProcessor->setValue('totalcarpArea', $gettotalArea);
        // Prepare an array to hold the modified values
        $values = [];

        // Iterate through each user record
        foreach ($getarbs as $arbs) {
            // Manipulate the data or create a new structure based on your requirements
            $values[] = [
                'fname' => $arbs->fname,
                'lname' => $arbs->lname,
                'mname' => $arbs->mname,
                'spousename' => $arbs->spousename,
                'address' => $arbs->address,
                'lot' => $arbs->lotNo,
                'crop' => $arbs->crop,
                'lotArea' => $arbs->lotArea,
                'serialNo' => $arbs->serialNo,
                'registerDate' => $arbs->registerDate,
                'awardtitleNo' => $arbs->awardtitleNo,
            ];
        }

        // Clone rows and set values for each user in the $values array
        $templateProcessor->cloneRowAndSetValues('fname', $values);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.47' . '-' . $fileName . '.docx');
        return response()->download('Form No.47' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function uploadForm47($id)
    {
        $landholdings = DB::table('landholdings')->where('landholdings.id', $id)->get();
        $displayUploadForm = DB::table('generated_files')
                                ->join('landholdings', 'landholdings.id', '=', 'generated_files.landholding_id')
                                ->select('generated_files.*')
                                ->where('generated_files.landholding_id', $id)
                                ->where('generated_files.formNo', 47)
                                ->get();
        return view('admin.uploadform.form47',compact('landholdings','displayUploadForm'));
    }
    public function addfile(Request $request)
    {
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
    public function deletefile($id)
    {
        // Retrieve file information from the database
        $fileInfo = DB::table('generated_files')->where('id', $id)->first();

        if (!$fileInfo) {
            return redirect()->back()->with('error', 'File not found.');
        }

        // Delete the file from the storage
        $filePath = public_path('uploads/GeneratedFile') . '/' . $fileInfo->uploadfile;
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        // Delete the record from the database
        DB::table('generated_files')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'File deleted successfully.');
    }
    public function updatefile(Request $request, $id)
    {
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
            $filePath = public_path('uploads/GeneratedFile/' . $generatedFile->uploadfile);

            // If the existing file exists, delete it
            if (File::exists($filePath)) {
                File::delete($filePath);
                Storage::delete(storage_path('app/public/uploads/GeneratedFile/' . $generatedFile->uploadfile));
            }

            // Get the original name of the uploaded file
            $newFileName = $request->file('uploadfile')->getClientOriginalName();

            // Move the uploaded file to the `uploads/documents` directory
            $request->file('uploadfile')->move('uploads/GeneratedFile', $newFileName);

            $generatedFile->update(['uploadfile' => $newFileName]);
        }
        return redirect()->back()->with('success', 'Updated successfully');
    }
}
