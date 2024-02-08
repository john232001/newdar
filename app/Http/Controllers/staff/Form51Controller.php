<?php

namespace App\Http\Controllers\staff;

use App\Models\GenerateLog;
use App\Models\GeneratedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Http\Request;

class Form51Controller extends Controller
{
    public function selectform51($id)
    {
        $landholdings = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*','municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)->get();

        $generateform = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_51')->get();
        return view('staff.form.form51', compact('landholdings','generateform'));
    }
    public function generateform($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*','municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();
        $paro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.paro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        $gettotalArea = DB::table('lots')
            ->where('lots.landholding_id', $id)
            ->where('lots.lotType_id', 1)
            ->sum('lotArea');
        $lotnumbers = DB::table('lots')->select('lotNo')->where('lots.landholding_id', $id)->get();

        $lotNos = [];
        foreach ($lotnumbers as $lotnumber) {
            $lotNos[] = $lotnumber->lotNo;
        }
        
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_51'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $lotNoString = implode(', ', $lotNos);
        $templateProcessor = new TemplateProcessor('form-template/FormNo.49.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        $templateProcessor->setValue('middlename', $data->middlename);
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $lotNoString);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('paro', $paro->officer_name);
        $templateProcessor->setValue('totalcarpArea', $gettotalArea);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.49' . '-' . $fileName . '.docx');
        return response()->download('Form No.49' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function uploadForm51($id)
    {
        $landholdings = DB::table('landholdings')->where('landholdings.id', $id)->get();
        $displayUploadForm = DB::table('generated_files')
                                ->join('landholdings', 'landholdings.id', '=', 'generated_files.landholding_id')
                                ->select('generated_files.*')
                                ->where('generated_files.landholding_id', $id)
                                ->where('generated_files.formNo', 51)
                                ->get();
        return view('staff.uploadform.form51',compact('landholdings','displayUploadForm'));
    }
    public function filedownload($id)
    {
        $generatedFile = GeneratedFile::findOrFail($id);
        if ($generatedFile->uploadfile) {
            $filePath = public_path("uploads/GeneratedFile/{$generatedFile->uploadfile}");
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'No Document Found!');
        }
    }
}
