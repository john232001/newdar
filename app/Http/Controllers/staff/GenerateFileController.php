<?php

namespace App\Http\Controllers\staff;

use App\Models\GenerateLog;
use App\Models\GeneratedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Http\Request;

class GenerateFileController extends Controller
{
    public function generateform1($id)
    {  
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*','municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();
    
        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        $paro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.paro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.1.docx');
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
        $templateProcessor->setValue('maro', $maro->officer_name);
        $templateProcessor->setValue('paro', $paro->officer_name);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.1' . '-' . $fileName . '.docx');

        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_1'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        return response()->download('Form No.1' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform2($id)
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

        
        $formIdentifier = 'form_2';

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.2.docx');
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
        $templateProcessor->setValue('paro', $paro->officer_name);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.2' . '-' . $fileName . '.docx');
        return response()->download('Form No.2' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform3($id)
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

        $formIdentifier = 'form_3';

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
    public function generateform10($id)
    {  
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*','municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();
    
        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();

        $paro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.paro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.10.docx');
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
        $templateProcessor->setValue('maro', $maro->officer_name);
        $templateProcessor->setValue('paro', $paro->officer_name);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.10' . '-' . $fileName . '.docx');

        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_10'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        return response()->download('Form No.10' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform11($id)
    {  
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*','municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();
    
        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        $paro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.paro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.11.docx');
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
        $templateProcessor->setValue('maro', $maro->officer_name);
        $templateProcessor->setValue('paro', $paro->officer_name);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.11' . '-' . $fileName . '.docx');

        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_11'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        return response()->download('Form No.11' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform17($id)
    {  
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*','municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();
        
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.17.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        // Check if middlename is not null
        if ($data->middlename !== null) {
            // Get the first letter of the middle name
            $firstLetter = substr($data->middlename, 0, 1);
            // Set the value of the 'middlename' placeholder to the first letter
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            // Handle the case where middlename is null
            // You can set a default value or handle it as needed
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.17' . '-' . $fileName . '.docx');

        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_17'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        return response()->download('Form No.17' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform18($id)
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
        $formIdentifier = 'form_18'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.18.docx');
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
        $templateProcessor->setValue('paro', $paro->officer_name);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.18' . '-' . $fileName . '.docx');
        return response()->download('Form No.18' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform20($id)
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
        $formIdentifier = 'form_20'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.20.docx');
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
        $templateProcessor->setValue('paro', $paro->officer_name);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.20' . '-' . $fileName . '.docx');
        return response()->download('Form No.20' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform37($id)
    {
        $data = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'officers.officer_name','municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)->first();

        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_37'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.37.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        // Check if middlename is not null
        if ($data->middlename !== null) {
            // Get the first letter of the middle name
            $firstLetter = substr($data->middlename, 0, 1);
            // Set the value of the 'middlename' placeholder to the first letter
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            // Handle the case where middlename is null
            // You can set a default value or handle it as needed
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('maro', $data->officer_name);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.37' . '-' . $fileName . '.docx');
        return response()->download('Form No.37' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform42($id)
    {
        $data = DB::table('landholdings')
        ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
        ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
        ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
        ->select('landholdings.*', 'officers.officer_name','municipalities.muni_name','barangays.brgy_names')
        ->where('landholdings.id', $id)->first();

        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_42'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.42.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        // Check if middlename is not null
        if ($data->middlename !== null) {
            // Get the first letter of the middle name
            $firstLetter = substr($data->middlename, 0, 1);
            // Set the value of the 'middlename' placeholder to the first letter
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            // Handle the case where middlename is null
            // You can set a default value or handle it as needed
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('maro', $data->officer_name);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.42' . '-' . $fileName . '.docx');
        return response()->download('Form No.42' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform45A($id)
    {
        $data = DB::table('landholdings')
        ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
        ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
        ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
        ->select('landholdings.*', 'officers.officer_name','municipalities.muni_name','barangays.brgy_names')
        ->where('landholdings.id', $id)->first();

        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_45A'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.45A.docx');
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
        $templateProcessor->setValue('maro', $data->officer_name);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.45A' . '-' . $fileName . '.docx');
        return response()->download('Form No.45A' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform46($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('asps', 'landholdings.id', '=', 'asps.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names','asps.aspNo')
            ->where('landholdings.id', $id)
            ->first();
        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        $paro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.paro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();

        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_46'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.46.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        // Check if middlename is not null
        if ($data->middlename !== null) {
            // Get the first letter of the middle name
            $firstLetter = substr($data->middlename, 0, 1);
            // Set the value of the 'middlename' placeholder to the first letter
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            // Handle the case where middlename is null
            // You can set a default value or handle it as needed
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('aspNo', $data->aspNo);
        $templateProcessor->setValue('maro', $maro->officer_name);
        $templateProcessor->setValue('paro', $paro->officer_name);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.46' . '-' . $fileName . '.docx');
        return response()->download('Form No.46' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform47($id)
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
        // Check if middlename is not null
        if ($data->middlename !== null) {
            // Get the first letter of the middle name
            $firstLetter = substr($data->middlename, 0, 1);
            // Set the value of the 'middlename' placeholder to the first letter
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            // Handle the case where middlename is null
            // You can set a default value or handle it as needed
            $templateProcessor->setValue('middlename', '');
        }
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
    public function generateform49($id)
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
        $formIdentifier = 'form_49'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $lotNoString = implode(', ', $lotNos);
        $templateProcessor = new TemplateProcessor('form-template/FormNo.49.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        // Check if middlename is not null
        if ($data->middlename !== null) {
            // Get the first letter of the middle name
            $firstLetter = substr($data->middlename, 0, 1);
            // Set the value of the 'middlename' placeholder to the first letter
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            // Handle the case where middlename is null
            // You can set a default value or handle it as needed
            $templateProcessor->setValue('middlename','');
        }
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
    public function generateform51($id)
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
        $templateProcessor = new TemplateProcessor('form-template/FormNo.51.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        // Check if middlename is not null
        if ($data->middlename !== null) {
            // Get the first letter of the middle name
            $firstLetter = substr($data->middlename, 0, 1);
            // Set the value of the 'middlename' placeholder to the first letter
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            // Handle the case where middlename is null
            // You can set a default value or handle it as needed
            $templateProcessor->setValue('middlename', '');
        }
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
        $templateProcessor->saveAs('Form No.51' . '-' . $fileName . '.docx');
        return response()->download('Form No.51' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform52A($id)
    {
        $data = DB::table('landholdings')
        ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
        ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
        ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
        ->select('landholdings.*', 'officers.officer_name','municipalities.muni_name','barangays.brgy_names')
        ->where('landholdings.id', $id)->first();

        $paro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.paro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();

        $gettotalArea = DB::table('lots')
        ->where('lots.landholding_id', $id)
        ->where('lots.lotType_id', 1)
        ->sum('lotArea');

        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_52A'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.52A.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        $templateProcessor->setValue('middlename', $data->middlename);
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('modeOfAcquisition', $data->modeOfAcquisition);
        $templateProcessor->setValue('gettotalArea', $gettotalArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('paro', $paro->officer_name);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.52A' . '-' . $fileName . '.docx');
        return response()->download('Form No.52A' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform52B($id)
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
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_52B'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.52B.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        // Check if middlename is not null
        if ($data->middlename !== null) {
            // Get the first letter of the middle name
            $firstLetter = substr($data->middlename, 0, 1);
            // Set the value of the 'middlename' placeholder to the first letter
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            // Handle the case where middlename is null
            // You can set a default value or handle it as needed
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('gettotalArea', $gettotalArea);
        $templateProcessor->setValue('paro', $paro->officer_name);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.52B' . '-' . $fileName . '.docx');
        return response()->download('Form No.52B' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform53($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('valuations', 'landholdings.id', '=', 'valuations.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names','valuations.amount')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.paro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_53'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.53.docx');
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('paro', $paro->officer_name);
        $templateProcessor->setValue('amount', $data->amount);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.53' . '-' . $fileName . '.docx');
        return response()->download('Form No.53' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform54($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('valuations', 'landholdings.id', '=', 'valuations.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names','valuations.amount')
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
        
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_54'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.54.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        // Check if middlename is not null
        if ($data->middlename !== null) {
            // Get the first letter of the middle name
            $firstLetter = substr($data->middlename, 0, 1);
            // Set the value of the 'middlename' placeholder to the first letter
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            // Handle the case where middlename is null
            // You can set a default value or handle it as needed
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('gettotalArea', $gettotalArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('amount', $data->amount);
        $templateProcessor->setValue('paro', $paro->officer_name);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.54' . '-' . $fileName . '.docx');
        return response()->download('Form No.54' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform57($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('valuations', 'landholdings.id', '=', 'valuations.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names','valuations.amount')
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
        
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_57'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.57.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        // Check if middlename is not null
        if ($data->middlename !== null) {
            // Get the first letter of the middle name
            $firstLetter = substr($data->middlename, 0, 1);
            // Set the value of the 'middlename' placeholder to the first letter
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            // Handle the case where middlename is null
            // You can set a default value or handle it as needed
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('gettotalArea', $gettotalArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('amount', $data->amount);
        $templateProcessor->setValue('paro', $paro->officer_name);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.57' . '-' . $fileName . '.docx');
        return response()->download('Form No.57' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform58($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('valuations', 'landholdings.id', '=', 'valuations.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names','valuations.amount')
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
        
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_58'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.58.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        $templateProcessor->setValue('middlename', $data->middlename);
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('gettotalArea', $gettotalArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('paro', $paro->officer_name);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.58' . '-' . $fileName . '.docx');
        return response()->download('Form No.58' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform59($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('valuations', 'landholdings.id', '=', 'valuations.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names','valuations.amount')
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
        
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_59'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.59.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        $templateProcessor->setValue('middlename', $data->middlename);
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('gettotalArea', $gettotalArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('paro', $paro->officer_name);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.59' . '-' . $fileName . '.docx');
        return response()->download('Form No.59' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform60($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('valuations', 'landholdings.id', '=', 'valuations.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names','valuations.amount')
            ->where('landholdings.id', $id)
            ->first();

        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();

        $paro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.paro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        $gettotalArea = DB::table('lots')
            ->where('lots.landholding_id', $id)
            ->where('lots.lotType_id', 1)
            ->sum('lotArea');
        
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_60'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.60.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        $templateProcessor->setValue('middlename', $data->middlename);
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('gettotalArea', $gettotalArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('amount', $data->amount);
        $templateProcessor->setValue('paro', $paro->officer_name);
        $templateProcessor->setValue('maro', $maro->officer_name);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.60' . '-' . $fileName . '.docx');
        return response()->download('Form No.60' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform61($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('valuations', 'landholdings.id', '=', 'valuations.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names','valuations.amount')
            ->where('landholdings.id', $id)
            ->first();

        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_61'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.61.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        // Check if middlename is not null
        if ($data->middlename !== null) {
            // Get the first letter of the middle name
            $firstLetter = substr($data->middlename, 0, 1);
            // Set the value of the 'middlename' placeholder to the first letter
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            // Handle the case where middlename is null
            // You can set a default value or handle it as needed
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('amount', $data->amount);
        $templateProcessor->setValue('maro', $maro->officer_name);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.61' . '-' . $fileName . '.docx');
        return response()->download('Form No.61' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform62($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('valuations', 'landholdings.id', '=', 'valuations.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names','valuations.amount')
            ->where('landholdings.id', $id)
            ->first();

        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        $paro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.paro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_62'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.62.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        // Check if middlename is not null
        if ($data->middlename !== null) {
            // Get the first letter of the middle name
            $firstLetter = substr($data->middlename, 0, 1);
            // Set the value of the 'middlename' placeholder to the first letter
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            // Handle the case where middlename is null
            // You can set a default value or handle it as needed
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('amount', $data->amount);
        $templateProcessor->setValue('maro', $maro->officer_name);
        $templateProcessor->setValue('paro', $paro->officer_name);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.62' . '-' . $fileName . '.docx');
        return response()->download('Form No.62' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform63($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('valuations', 'landholdings.id', '=', 'valuations.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names','valuations.amount')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.paro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_63'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.63.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        // Check if middlename is not null
        if ($data->middlename !== null) {
            // Get the first letter of the middle name
            $firstLetter = substr($data->middlename, 0, 1);
            // Set the value of the 'middlename' placeholder to the first letter
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            // Handle the case where middlename is null
            // You can set a default value or handle it as needed
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('amount', $data->amount);
        $templateProcessor->setValue('paro', $paro->officer_name);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.63' . '-' . $fileName . '.docx');
        return response()->download('Form No.63' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform64($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('valuations', 'landholdings.id', '=', 'valuations.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names','valuations.amount')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.paro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_64'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.64.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        // Check if middlename is not null
        if ($data->middlename !== null) {
            // Get the first letter of the middle name
            $firstLetter = substr($data->middlename, 0, 1);
            // Set the value of the 'middlename' placeholder to the first letter
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            // Handle the case where middlename is null
            // You can set a default value or handle it as needed
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('amount', $data->amount);
        $templateProcessor->setValue('paro', $paro->officer_name);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.64' . '-' . $fileName . '.docx');
        return response()->download('Form No.64' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform65($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('valuations', 'landholdings.id', '=', 'valuations.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names','valuations.amount')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.paro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_65'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.65.docx');
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
        $templateProcessor->setValue('amount', $data->amount);
        $templateProcessor->setValue('paro', $paro->officer_name);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.65' . '-' . $fileName . '.docx');
        return response()->download('Form No.65' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform66($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('valuations', 'landholdings.id', '=', 'valuations.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names','valuations.amount')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.paro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_66'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.66.docx');
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
        $templateProcessor->setValue('amount', $data->amount);
        $templateProcessor->setValue('paro', $paro->officer_name);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.66' . '-' . $fileName . '.docx');
        return response()->download('Form No.66' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform67($id)
    {
        $data = DB::table('landholdings')
            ->where('landholdings.id', $id)
            ->first();

        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();

        $paro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.paro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_67'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.67.docx');
        $templateProcessor->setValue('paro', $paro->officer_name);
        $templateProcessor->setValue('maro', $maro->officer_name);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.67' . '-' . $fileName . '.docx');
        return response()->download('Form No.67' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform68A($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('valuations', 'landholdings.id', '=', 'valuations.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names','valuations.amount')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.paro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_68A'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.68.docx');
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
        $templateProcessor->setValue('amount', $data->amount);
        $templateProcessor->setValue('paro', $paro->officer_name);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.68' . '-' . $fileName . '.docx');
        return response()->download('Form No.68' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform68B($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('valuations', 'landholdings.id', '=', 'valuations.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names','valuations.amount')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.paro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_68B'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.68B.docx');
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
        $templateProcessor->setValue('amount', $data->amount);
        $templateProcessor->setValue('paro', $paro->officer_name);
        $templateProcessor->setValue('maro', $maro->officer_name);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.68B' . '-' . $fileName . '.docx');
        return response()->download('Form No.68B' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform68($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('valuations', 'landholdings.id', '=', 'valuations.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names','valuations.amount')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.paro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_68'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.68.docx');
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
        $templateProcessor->setValue('amount', $data->amount);
        $templateProcessor->setValue('paro', $paro->officer_name);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.68' . '-' . $fileName . '.docx');
        return response()->download('Form No.68' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform69($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('valuations', 'landholdings.id', '=', 'valuations.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.paro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        // Assuming you have a variable $formIdentifier containing a unique identifier for each form
        $formIdentifier = 'form_69'; // Replace this with your actual form identifier

        // Update or create a log record with a unique identifier for each form
        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('form-template/FormNo.69.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        // Check if middlename is not null
        if ($data->middlename !== null) {
            // Get the first letter of the middle name
            $firstLetter = substr($data->middlename, 0, 1);
            // Set the value of the 'middlename' placeholder to the first letter
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            // Handle the case where middlename is null
            // You can set a default value or handle it as needed
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('paro', $paro->officer_name);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.69' . '-' . $fileName . '.docx');
        return response()->download('Form No.69' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
}
