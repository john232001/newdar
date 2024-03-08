<?php

namespace App\Http\Controllers\admin;

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

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();

        $currentdate = date('F j, Y');

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
        $templateProcessor->setValue('maro', strtoupper($maro->officer_name));
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('date', $currentdate);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.1' . '-' . $fileName . '.docx');

        $formIdentifier = 'form_1';

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

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();

        
        $formIdentifier = 'form_2';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.2.docx');
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
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
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

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();

        $currentdate = date('F j, Y');

        $formIdentifier = 'form_3';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.3.docx');
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
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('date', $currentdate);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.3' . '-' . $fileName . '.docx');
        return response()->download('Form No.3' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform4($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*','municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();


        $currentdate = date('F j, Y');

        $formIdentifier = 'form_4';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.4.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('date', $currentdate);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.4' . '-' . $fileName . '.docx');
        return response()->download('Form No.4' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform5($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*','municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();


        $currentdate = date('F j, Y');

        $formIdentifier = 'form_5';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.5.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('date', $currentdate);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.5' . '-' . $fileName . '.docx');
        return response()->download('Form No.5' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform6($id)
    {
        $data = DB::table('landholdings')
            ->leftjoin('asps','landholdings.id', '=', 'asps.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*','municipalities.muni_name','barangays.brgy_names','asps.aspNo')
            ->where('landholdings.id', $id)
            ->first();

        $formIdentifier = 'form_6';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.6.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('aspNo', $data->aspNo);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.6' . '-' . $fileName . '.docx');
        return response()->download('Form No.6' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform7($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*','municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();

        $currentdate = date('F j, Y');

        $formIdentifier = 'form_7';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.7.docx');
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('date', $currentdate);
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.7' . '-' . $fileName . '.docx');
        return response()->download('Form No.7' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform8($id)
    {
        $data = DB::table('landholdings')
            ->leftjoin('asps','landholdings.id', '=', 'asps.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*','municipalities.muni_name','barangays.brgy_names','asps.aspNo')
            ->where('landholdings.id', $id)
            ->first();

        $formIdentifier = 'form_8';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.8.docx');
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('aspNo', $data->aspNo);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.8' . '-' . $fileName . '.docx');
        return response()->download('Form No.8' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform9($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*','municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();

        $formIdentifier = 'form_9';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.9.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        $templateProcessor->setValue('middlename', $data->middlename);
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.9' . '-' . $fileName . '.docx');
        return response()->download('Form No.9' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
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

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();

        $currentdate = date('F j, Y');

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.10.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('phase', $data->phase);
        $templateProcessor->setValue('maro', strtoupper($maro->officer_name));
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('date', $currentdate);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.10' . '-' . $fileName . '.docx');

        $formIdentifier = 'form_10';

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
        
        $paro = DB::table('officers')->where('officers.position_id', 2)->first();

        $currentdate = date('F j, Y');

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.11.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('maro', strtoupper($maro->officer_name));
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('date', $currentdate);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.11' . '-' . $fileName . '.docx');

        $formIdentifier = 'form_11';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        return response()->download('Form No.11' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform12A($id)
    {  
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*','municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();
        
        $paro = DB::table('officers')->where('officers.position_id', 2)->first();

        $currentdate = date('F j, Y');

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.12A.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('date', $currentdate);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.12A' . '-' . $fileName . '.docx');

        $formIdentifier = 'form_12A';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        return response()->download('Form No.12A' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform13A($id)
    {  
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*','municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();
        
        $paro = DB::table('officers')->where('officers.position_id', 2)->first();

        $currentdate = date('F j, Y');

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.13A.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('date', $currentdate);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.13A' . '-' . $fileName . '.docx');

        $formIdentifier = 'form_13A';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        return response()->download('Form No.13A' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform14($id)
    {  
        $data = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*','municipalities.muni_name','barangays.brgy_names', 'officers.officer_name')
            ->where('landholdings.id', $id)
            ->first();
        
        $paro = DB::table('officers')->where('officers.position_id', 2)->first();

        $currentdate = date('F j, Y');

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.14.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('maro', strtoupper($data->officer_name));
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('date', $currentdate);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.14' . '-' . $fileName . '.docx');

        $formIdentifier = 'form_14';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        return response()->download('Form No.14' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform15($id)
    {  
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*','municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();
        
        $paro = DB::table('officers')->where('officers.position_id', 2)->first();

        $currentdate = date('F j, Y');

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.15.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('date', $currentdate);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.15' . '-' . $fileName . '.docx');

        $formIdentifier = 'form_15';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        return response()->download('Form No.15' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform16($id)
    {  
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*','municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.16.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
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
        $templateProcessor->saveAs('Form No.16' . '-' . $fileName . '.docx');

        $formIdentifier = 'form_16';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        return response()->download('Form No.16' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
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
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
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

        $formIdentifier = 'form_17';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        return response()->download('Form No.17' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    
    public function generateform37($id)
    {
        $data = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'officers.officer_name','municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)->first();

        $formIdentifier = 'form_37';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $currentdate = date('F j, Y');

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.37.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('date', $currentdate);
        $templateProcessor->setValue('maro', strtoupper($data->officer_name));
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

        $formIdentifier = 'form_42';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.42.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('maro', strtoupper($data->officer_name));
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

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();

        $formIdentifier = 'form_45A';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );
        $currentdate = date('F j, Y');

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.45A.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('date', $currentdate);
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
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

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();
        
        $carpo = DB::table('officers')->where('officers.position_id', 3)->first();

        $formIdentifier = 'form_46';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.46.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
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
        $templateProcessor->setValue('maro', strtoupper ($maro->officer_name));
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('carpo', strtoupper($carpo->officer_name));
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

        $formIdentifier = 'form_47';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.47.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
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
        $values = [];

        foreach ($getarbs as $arbs) {
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

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();
        $manager = DB::table('officers')->where('officers.position_id', 5)->first();
        $ceo = DB::table('officers')->where('officers.position_id', 4)->first();

        $gettotalArea = DB::table('lots')
            ->where('lots.landholding_id', $id)
            ->where('lots.lotType_id', 1)
            ->sum('lotArea');
        $lotnumbers = DB::table('lots')->select('lotNo')->where('lots.landholding_id', $id)->get();
        
        
        $lotNos = [];
        foreach ($lotnumbers as $lotnumber) {
            $lotNos[] = $lotnumber->lotNo;
        }
    
        $formIdentifier = 'form_49';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $lotNoString = implode(', ', $lotNos);
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.49.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename','');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $lotNoString);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('manager', strtoupper($manager->officer_name));
        $templateProcessor->setValue('ceo', strtoupper($ceo->officer_name));
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

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();

        $gettotalArea = DB::table('lots')
            ->where('lots.landholding_id', $id)
            ->where('lots.lotType_id', 1)
            ->sum('lotArea');
        
        $lotnumbers = DB::table('lots')->select('lotNo')->where('lots.landholding_id', $id)->get();
        
        $lotNos = [];
        foreach ($lotnumbers as $lotnumber) {
            $lotNos[] = $lotnumber->lotNo;
        }
        
        $formIdentifier = 'form_51';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $currentdate = date('F j, Y');

        $lotNoString = implode(', ', $lotNos);
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.51.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $lotNoString);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('totalcarpArea', $gettotalArea);
        $templateProcessor->setValue('date', $currentdate);
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

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();

        $gettotalArea = DB::table('lots')
        ->where('lots.landholding_id', $id)
        ->where('lots.lotType_id', 1)
        ->sum('lotArea');

        $formIdentifier = 'form_52A';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $currentdate = date('F j, Y');
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.52A.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('modeOfAcquisition', $data->modeOfAcquisition);
        $templateProcessor->setValue('gettotalArea', $gettotalArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('date', $currentdate);
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

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();

        $formIdentifier = 'form_52B';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $currentdate = date('F j, Y');
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.52B.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('date', $currentdate);
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.52B' . '-' . $fileName . '.docx');
        return response()->download('Form No.52B' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform53($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();
        
        $formIdentifier = 'form_53';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.53.docx');
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('paro', $paro->officer_name);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.53' . '-' . $fileName . '.docx');
        return response()->download('Form No.53' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform54($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();
        $manager = DB::table('officers')->where('officers.position_id', 5)->first();
        $ceo = DB::table('officers')->where('officers.position_id', 4)->first();
        
        
        $gettotalArea = DB::table('lots')
            ->where('lots.landholding_id', $id)
            ->where('lots.lotType_id', 1)
            ->sum('lotArea');
        
        $formIdentifier = 'form_54';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );
        $currentdate = date('F j, Y');
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.54.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
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
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('manager', strtoupper($manager->officer_name));
        $templateProcessor->setValue('ceo', strtoupper($ceo->officer_name));
        $templateProcessor->setValue('date', $currentdate);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.54' . '-' . $fileName . '.docx');
        return response()->download('Form No.54' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform57($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();

        $rod = DB::table('officers')->where('officers.position_id', 6)->first();

        $gettotalArea = DB::table('lots')
            ->where('lots.landholding_id', $id)
            ->where('lots.lotType_id', 1)
            ->sum('lotArea');
        
        $formIdentifier = 'form_57'; 

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $currentdate = date('F j, Y');
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.57.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('gettotalArea', $gettotalArea);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('rod', strtoupper($rod->officer_name));
        $templateProcessor->setValue('date', $currentdate);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.57' . '-' . $fileName . '.docx');
        return response()->download('Form No.57' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform58($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();
        $manager = DB::table('officers')->where('officers.position_id', 5)->first();
        $ceo = DB::table('officers')->where('officers.position_id', 6)->first();

        $gettotalArea = DB::table('lots')
            ->where('lots.landholding_id', $id)
            ->where('lots.lotType_id', 1)
            ->sum('lotArea');
        
        $formIdentifier = 'form_58';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $currentdate = date('F j, Y');
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.58.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
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
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('manager', strtoupper($manager->officer_name));
        $templateProcessor->setValue('ceo', strtoupper($ceo->officer_name));
        $templateProcessor->setValue('date', $currentdate);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.58' . '-' . $fileName . '.docx');
        return response()->download('Form No.58' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform59($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();
        
        $gettotalArea = DB::table('lots')
            ->where('lots.landholding_id', $id)
            ->where('lots.lotType_id', 1)
            ->sum('lotArea');
        
        $formIdentifier = 'form_59';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );
        $currentdate = date('F j, Y ');
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.59.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
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
        $templateProcessor->setValue('date', $currentdate);
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.59' . '-' . $fileName . '.docx');
        return response()->download('Form No.59' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform60($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();

        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();
        
        $gettotalArea = DB::table('lots')
            ->where('lots.landholding_id', $id)
            ->where('lots.lotType_id', 1)
            ->sum('lotArea');
        
        $formIdentifier = 'form_60';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $currentdate = date('F j, Y');
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.60.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
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
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('maro', strtoupper($maro->officer_name));
        $templateProcessor->setValue('date', $currentdate);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.60' . '-' . $fileName . '.docx');
        return response()->download('Form No.60' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform61($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();

        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        $formIdentifier = 'form_61';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $currentdate = date('F j, Y');
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.61.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyNo', $data->surveyNo);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('maro', strtoupper($maro->officer_name));
        $templateProcessor->setValue('date', $currentdate);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.61' . '-' . $fileName . '.docx');
        return response()->download('Form No.61' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform62($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();

        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        $paro = DB::table('officers')->where('officers.position_id', 2)->first();
        
        $carpo = DB::table('officers')->where('officers.position_id', 3)->first();
        
        $formIdentifier = 'form_62';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );
        $currentdate = date('F j, Y');
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.62.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('maro', strtoupper($maro->officer_name));
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('carpo', strtoupper($carpo->officer_name));
        $templateProcessor->setValue('date', $currentdate);

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.62' . '-' . $fileName . '.docx');
        return response()->download('Form No.62' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform63($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();

        $formIdentifier = 'form_63';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );
        $currentdate = date('F j, Y');
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.63.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('date', $currentdate);
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

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();
        $rod = DB::table('officers')->where('officers.position_id', 6)->first();
        
        $formIdentifier = 'form_64';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );
        $currentdate = date('F j, Y');
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.64.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
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
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('rod', strtoupper($rod->officer_name));
        $templateProcessor->setValue('date', $currentdate);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.64' . '-' . $fileName . '.docx');
        return response()->download('Form No.64' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform65($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();
        
        $rod = DB::table('officers')->where('officers.position_id', 6)->first();
        $manager = DB::table('officers')->where('officers.position_id', 5)->first();
        
        $formIdentifier = 'form_65';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );
        $currentdate = date('F j, Y');
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.65.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        $templateProcessor->setValue('middlename', $data->middlename);
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('date', $currentdate);
        $templateProcessor->setValue('manager', strtoupper($manager->officer_name));
        $templateProcessor->setValue('rod', strtoupper($rod->officer_name));
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

        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();
        
        $formIdentifier = 'form_66';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.66.docx');
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
        $templateProcessor->setValue('maro', strtoupper($maro->officer_name));
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
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

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();

        $formIdentifier = 'form_67';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );
        $currentdate = date('F j, Y');
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.67.docx');
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('maro', strtoupper($maro->officer_name));
        $templateProcessor->setValue('date', $currentdate);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.67' . '-' . $fileName . '.docx');
        return response()->download('Form No.67' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform68A($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();
        
        $formIdentifier = 'form_68A';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );
        $currentdate = date('m-d-Y');
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.68A.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('date', $currentdate);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.68A' . '-' . $fileName . '.docx');
        return response()->download('Form No.68A' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform68B($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();
        
        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        $formIdentifier = 'form_68B';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.68B.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        $templateProcessor->setValue('middlename', $data->middlename);
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('maro', strtoupper($maro->officer_name));

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.68B' . '-' . $fileName . '.docx');
        return response()->download('Form No.68B' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform68($id)
    {
        $data = DB::table('landholdings')->where('landholdings.id', $id)->first();

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();
        
        $formIdentifier = 'form_68';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/FormNo.68.docx');
        $templateProcessor->setValue('familyname', $data->familyname);
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));

        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.68' . '-' . $fileName . '.docx');
        return response()->download('Form No.68' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateform69($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->where('landholdings.id', $id)
            ->first();

        $paro = DB::table('officers')->where('officers.position_id', 2)->first();
        
        $formIdentifier = 'form_69';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $currentdate = date('F j, Y');
        $templateProcessor = new TemplateProcessor('Form-template/FormNo.69.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);
        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $templateProcessor->setValue('date', $currentdate);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Form No.69' . '-' . $fileName . '.docx');
        return response()->download('Form No.69' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateawardform1($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->where('landholdings.id', $id)
            ->first();

        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        $formIdentifier = 'Awardform_1';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/AwardNo.1.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);

        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }

        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('maro', strtoupper($maro->officer_name));
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Award Form No.1' . '-' . $fileName . '.docx');
        return response()->download('Award Form No.1' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateawardform2($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->where('landholdings.id', $id)
            ->first();

        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        $formIdentifier = 'Awardform_2';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $currentdate = date('F j, Y');
        $templateProcessor = new TemplateProcessor('Form-template/AwardNo.2.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);

        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('date', $currentdate);
        $templateProcessor->setValue('maro', strtoupper($maro->officer_name));
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Award Form No.2' . '-' . $fileName . '.docx');
        return response()->download('Award Form No.2' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateawardform3($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->where('landholdings.id', $id)
            ->first();

        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        $formIdentifier = 'Awardform_3';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/AwardNo.3.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);

        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('maro', strtoupper($maro->officer_name));
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Award Form No.3' . '-' . $fileName . '.docx');
        return response()->download('Award Form No.3' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateawardform4($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->where('landholdings.id', $id)
            ->first();

        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        $paro = DB::table('officers')->where('officers.position_id', 2)->first();
        
        $formIdentifier = 'Awardform_4';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/AwardNo.4.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);

        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('taxNo', $data->taxNo);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('maro', strtoupper($maro->officer_name));
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Award Form No.4' . '-' . $fileName . '.docx');
        return response()->download('Award Form No.4' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateawardform5($id)
    {
        $data = DB::table('landholdings')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->where('landholdings.id', $id)
            ->first();

        $maro = DB::table('landholdings')
            ->join('officers', 'officers.id', '=', 'landholdings.maro_id')
            ->select('landholdings.*', 'officers.officer_name')
            ->where('landholdings.id', $id)->first();
        
        $paro = DB::table('officers')->where('officers.position_id', 2)->first();
        
        $formIdentifier = 'Awardform_5';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $currentdate = date('F j, Y');
        $templateProcessor = new TemplateProcessor('Form-template/AwardNo.5.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);

        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('date', $currentdate);
        $templateProcessor->setValue('maro', strtoupper($maro->officer_name));
        $templateProcessor->setValue('paro', strtoupper($paro->officer_name));
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Award Form No.5' . '-' . $fileName . '.docx');
        return response()->download('Award Form No.5' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateawardform6($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('asps', 'landholdings.id', '=', 'asps.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->where('landholdings.id', $id)
            ->first();

        $formIdentifier = 'Awardform_6';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/AwardNo.6.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);

        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $templateProcessor->setValue('lotNo', $data->lotNo);
        $templateProcessor->setValue('aspNo', $data->aspNo);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Award Form No.6' . '-' . $fileName . '.docx');
        return response()->download('Award Form No.6' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
    public function generateawardform7($id)
    {
        $data = DB::table('landholdings')
            ->leftJoin('valuations', 'landholdings.id', '=', 'valuations.landholding_id')
            ->join('municipalities','municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays','barangays.id', '=', 'landholdings.barangay_id')
            ->where('landholdings.id', $id)
            ->first();

        
        $formIdentifier = 'Awardform_7';

        GenerateLog::updateOrCreate(
            ['landholding_id' => $id, 'form_identifier' => $formIdentifier],
            ['generation_date' => now()]
        );

        $templateProcessor = new TemplateProcessor('Form-template/AwardNo.7.docx');
        $templateProcessor->setValue('firstname', $data->firstname);
        $templateProcessor->setValue('familyname', $data->familyname);

        if ($data->middlename !== null) {
            $firstLetter = substr($data->middlename, 0, 1);
            $templateProcessor->setValue('middlename', $firstLetter . '.');
        }else {
            $templateProcessor->setValue('middlename', '');
        }
        $templateProcessor->setValue('municipality', $data->muni_name);
        $templateProcessor->setValue('barangay', $data->brgy_names);
        $templateProcessor->setValue('octNo', $data->octNo);
        $templateProcessor->setValue('surveyArea', $data->surveyArea);
        $fileName = $data->familyname;
        $templateProcessor->saveAs('Award Form No.7' . '-' . $fileName . '.docx');
        return response()->download('Award Form No.7' . '-' . $fileName . '.docx')->deleteFileAfterSend(true);
    }
}
