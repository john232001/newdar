<?php

namespace App\Http\Controllers\staff;

use App\Models\GenerateLog;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Http\Request;

class Form3Controller extends Controller
{
    public function selectform3($id)
    {
        $landholdings = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*','municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)->get();

        $generateform = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_3')->get();
        return view('staff.form.form3', compact('landholdings','generateform'));
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

        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_3'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.3.docx');
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
        $templateProcessor->setValue('phase', $data->phase);
        $templateProcessor->setValue('paro', $paro->officer_name);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.3' . '-' . $fileName . '.docx');
        return response()->download('Form No.3' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
}
