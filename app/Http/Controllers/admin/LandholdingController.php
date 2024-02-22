<?php

namespace App\Http\Controllers\admin;

use App\Models\Landholding;
use App\Models\GeneratedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class LandholdingController extends Controller
{
    public function index()
    {
        $landholdings = DB::table('landholdings')
            ->join('municipalities', 'municipalities.id', '=', 'landholdings.municipality_id')
            ->join('barangays', 'barangays.id', '=', 'landholdings.barangay_id')
            ->select('landholdings.*', 'municipalities.muni_name','barangays.brgy_names')
            ->get();
        $barangays = DB::table('barangays')->orderBy('brgy_names', 'asc')->get();
        $municipalities = DB::table('municipalities')->get();
        $maro = DB::table('officers')->where('officers.position_id', 1)->get();
        $paro = DB::table('officers')->where('officers.position_id', 2)->get();
        return view('admin.landholding.index', compact('landholdings', 'maro', 'paro', 'municipalities','barangays'));
    }
    public function store(Request $request)
    {
        try{
            $request->validate([
                'lhid' => 'required',
                'firstname' => 'required',
                'familyname' => 'required',
                'municipality_id' => 'required',
                'barangay_id' => 'required',
                'octNo' => 'required',
                'surveyArea' => 'required',
                'surveyNo' => 'required',
                'lotNo' => 'required',
                'maro_id' => 'required',
                'paro_id' => 'required'
            ], [
                'municipality_id' => 'The municipality field is required',
                'barangay_id' => 'The barangay field is required',
                'maro_id.required' => 'The maro field is required.',
                'paro_id.required' => 'The paro field is required.'
            ]);

            // Check if title file is present
            if ($request->hasFile('title')) {
                $title = $request->file('title');
                $TitleDoc = $title->getClientOriginalName();
                $title->move(public_path('uploads/Title'), $TitleDoc);
            } else {
                // Handle the case when title file is not provided
                $TitleDoc = null; // or any other default value
            }

            // Check if taxDocuments file is present
            if ($request->hasFile('taxDocuments')) {
                $tax = $request->file('taxDocuments');
                $TaxDoc = $tax->getClientOriginalName();
                $tax->move(public_path('uploads/TaxDeclaration'), $TaxDoc);
            } else {
                // Handle the case when taxDocuments file is not provided
                $TaxDoc = null; // or any other default value
            }

            // Insert file path into the database using Query Builder
            $data = DB::table('landholdings')->insert([
                'lhid' => $request->lhid,
                'firstname' => $request->firstname,
                'familyname' => $request->familyname,
                'middlename' => $request->middlename,
                'municipality_id' => $request->municipality_id,
                'barangay_id' => $request->barangay_id,
                'octNo' => $request->octNo,
                'lotNo' => $request->lotNo,
                'surveyNo' => $request->surveyNo,
                'surveyArea' => $request->surveyArea,
                'taxNo' => $request->taxNo,
                'maro_id' => $request->maro_id,
                'paro_id' => $request->paro_id,
                'modeOfAcquisition' => $request->modeOfAcquisition,
                'coverableArea' => $request->coverableArea,
                'carpableArea' => $request->carpableArea,
                'noncarpableArea' => $request->noncarpableArea,
                'retainedArea' => $request->retainedArea,
                'distributeArea' => $request->distributeArea,
                'landsize' => $request->landsize,
                'majorCrops' => $request->majorCrops,
                'phase' => $request->phase,
                'upals' => $request->upals,
                'yearAdded' => $request->yearAdded,
                'pipeline' => $request->pipeline,
                'targetyear' => $request->targetyear,
                'projectedDelivery' => $request->projectedDelivery,
                'title' => $TitleDoc,
                'taxDocuments' => $TaxDoc,
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
            return redirect()->back()->with('success', 'Added successfully.');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Failed to insert data!!! ' . $e->getMessage());
        }

    }
    public function update(Request $request, $id)
    {
        $landholding = Landholding::findOrFail($id);

        $landholding->update([
            'lhid' => $request->lhid,
            'firstname' => $request->firstname,
            'familyname' => $request->familyname,
            'middlename' => $request->middlename,
            'municipality_id' => $request->municipality_id,
            'barangay_id' => $request->barangay_id,
            'octNo' => $request->octNo,
            'lotNo' => $request->lotNo,
            'surveyNo' => $request->surveyNo,
            'surveyArea' => $request->surveyArea,
            'taxNo' => $request->taxNo,
            'modeOfAcquisition' => $request->modeOfAcquisition,
            'coverableArea' => $request->coverableArea,
            'carpableArea' => $request->carpableArea,
            'noncarpableArea' => $request->noncarpableArea,
            'retainedArea' => $request->retainedArea,
            'distributeArea' => $request->distributeArea,
            'landsize' => $request->landsize,
            'majorCrops' => $request->majorCrops,
            'phase' => $request->phase,
            'upals' => $request->upals,
            'yearAdded' => $request->yearAdded,
            'pipeline' => $request->pipeline,
            'targetyear' => $request->targetyear,
            'projectedDelivery' => $request->projectedDelivery,
            'maro_id' => $request->maro_id,
            'paro_id' => $request->paro_id,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ]);

        // Check if a new title file is uploaded
        if ($request->hasFile('title')) {
            // Get the full path to the existing title file
            $titleFilePath = public_path('uploads/Title/' . $landholding->title);

            // If the existing title file exists, delete it
            if (File::exists($titleFilePath)) {
                File::delete($titleFilePath);
            }

            // Get the original name of the uploaded title file
            $newTitleFileName = $request->file('title')->getClientOriginalName();

            // Move the uploaded title file to the `uploads/Title` directory
            $request->file('title')->move('uploads/Title', $newTitleFileName);

            $landholding->update(['title' => $newTitleFileName]);
        }

        // Check if a new taxDocuments file is uploaded
        if ($request->hasFile('taxDocuments')) {
            // Get the full path to the existing taxDocuments file
            $taxDocumentsFilePath = public_path('uploads/TaxDeclaration/' . $landholding->taxDocuments);

            // If the existing taxDocuments file exists, delete it
            if (File::exists($taxDocumentsFilePath)) {
                File::delete($taxDocumentsFilePath);
            }

            // Get the original name of the uploaded taxDocuments file
            $newTaxDocumentsFileName = $request->file('taxDocuments')->getClientOriginalName();

            // Move the uploaded taxDocuments file to the `uploads/TaxDeclaration` directory
            $request->file('taxDocuments')->move('uploads/TaxDeclaration', $newTaxDocumentsFileName);

            $landholding->update(['taxDocuments' => $newTaxDocumentsFileName]);
        }
        return redirect()->back()->with('success', 'Updated successfully');
    }
    public function delete($id)
    {
        $landholding = Landholding::findOrFail($id);

        // Delete related generated file
        $generatedFile = DB::table('generated_files')->where('landholding_id', $id)->first();

        if ($generatedFile) {
            $generatedfilePath = public_path('uploads/GeneratedFile/' . $generatedFile->uploadfile);

            if (File::exists($generatedfilePath)) {
                File::delete($generatedfilePath);
                Storage::delete(storage_path('app/public/uploads/Title/' . $generatedFile->uploadfile));
            }

            // Delete the record from the database
            DB::table('generated_files')->where('landholding_id', $id)->delete();
        }
        $titlefilePath = public_path('uploads/Title/' . $landholding->title);
        $taxfilePath = public_path('uploads/TaxDeclaration/' . $landholding->taxDocuments);

        if (File::exists($titlefilePath)) {
            File::delete($titlefilePath);
            Storage::delete(storage_path('app/public/uploads/Title/' . $landholding->title));
        }

        if (File::exists($taxfilePath)) {
            File::delete($taxfilePath);
            Storage::delete(storage_path('app/public/uploads/Title/' . $landholding->taxDocuments));
        }

        DB::table('lots')->where('landholding_id', $id)->delete();
        DB::table('asps')->where('landholding_id', $id)->delete();
        DB::table('arbs')->where('landholding_id', $id)->delete();
        DB::table('valuations')->where('landholding_id', $id)->delete();
        DB::table('awardtitles')->where('landholding_id', $id)->delete();

        $landholding->delete();
        

        return redirect()->back()->with('error', 'Deleted successfully');
    }
    public function uploadedfile($id){
        $data = DB::table('landholdings')->where('landholdings.id', $id)->get();
        return view('admin.landholding.view_documents', compact('data'));
    }
    public function downloadtitle($id)
    {
        $landholding = Landholding::findOrFail($id);
        if ($landholding->title) {
            $filePath = public_path("uploads/title/{$landholding->title}");
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'No Document Found!');
        }
    }
    public function downloadtaxDec($id)
    {
        $landholding = Landholding::findOrFail($id);
        if ($landholding->taxDocuments) {
            $filePath = public_path("uploads/TaxDeclaration/{$landholding->taxDocuments}");
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'No Document Found!');
        }
    }
    public function show($id)
    {
        $landholdings = DB::table('landholdings')->where('landholdings.id', $id)->get();

        $arb = DB::table('arbs')
            ->join('landholdings', 'landholdings.id', '=', 'arbs.landholding_id')
            ->join('categories', 'categories.id', '=', 'arbs.gender_id')
            ->join('categories AS op', 'op.id', '=', 'arbs.ownership_id')
            ->select('arbs.*', 'categories.gender', 'op.ownership')
            ->where('arbs.landholding_id', $id)
            ->get();
        $lots = DB::table('lots')
            ->join('landholdings', 'landholdings.id', '=', 'lots.landholding_id')
            ->join('arbs', 'arbs.id', '=', 'lots.arb_name')
            ->join('categories', 'categories.id', '=', 'lots.lotType_id')
            ->select('lots.*', 'categories.lotType', 'arbs.fname','arbs.lname')
            ->where('lots.landholding_id', $id)
            ->get();

        $asp = DB::table('asps')
            ->join('landholdings', 'landholdings.id', '=', 'asps.landholding_id')
            ->select('asps.*')
            ->where('asps.landholding_id', $id)
            ->get();
        $awardtitle = DB::table('awardtitles')
            ->join('landholdings', 'landholdings.id', '=', 'awardtitles.landholding_id')
            ->join('lots', 'lots.id', '=', 'awardtitles.lotNumber_id')
            ->join('categories', 'categories.id', '=', 'awardtitles.awardType_id')
            ->select('awardtitles.*', 'categories.awardType', 'lots.lotNo')
            ->where('awardtitles.landholding_id', $id)
            ->get();
        
        $valuation = DB::table('valuations')
            ->join('landholdings', 'landholdings.id', '=', 'valuations.landholding_id')
            ->join('lots', 'lots.id', '=', 'valuations.lotNumber_id')
            ->select('valuations.*', 'lots.lotNo')
            ->where('valuations.landholding_id', $id)
            ->get();

        $approvedform = DB::table('generated_files')
            ->join('landholdings', 'landholdings.id', '=', 'generated_files.landholding_id')
            ->select('generated_files.*')
            ->where('generated_files.landholding_id', $id )
            ->get();
        
        $generateform1 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_1')->get();
        $generateform2 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_2')->get();
        $generateform3 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_3')->get();
        $generateform10 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_10')->get();
        $generateform11 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_11')->get();
        $generateform17 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_17')->get();
        $generateform18 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_18')->get();
        $generateform20 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_20')->get();
        $generateform37 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_37')->get();
        $generateform42 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_42')->get();
        $generateform45A = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_45A')->get();
        $generateform46 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_46')->get();
        $generateform47 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_47')->get();
        $generateform49 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_49')->get();
        $generateform51 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_51')->get();
        $generateform52A = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_52A')->get();
        $generateform52B = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_52B')->get();
        $generateform53 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_53')->get();
        $generateform54 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_54')->get();
        $generateform57 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_57')->get();
        $generateform58 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_58')->get();
        $generateform59 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_59')->get();
        $generateform60 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_60')->get();
        $generateform61 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_61')->get();
        $generateform62 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_62')->get();
        $generateform63 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_63')->get();
        $generateform64 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_64')->get();
        $generateform65 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_65')->get();
        $generateform66 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_66')->get();
        $generateform67 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_67')->get();
        $generateform68 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_68')->get();
        $generateform68A = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_68A')->get();
        $generateform68B = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_68B')->get();
        $generateform69 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_69')->get();
        //get only the value 'Carpable' in ID
        $lotNumber = DB::table('lots')->where('lots.landholding_id', $id)->where('lots.lotType_id', 1)->get();

        //get only the value of lot number where the lot type is Carpable in ID of landholding
        $lotno = DB::table('lots')->where('lots.landholding_id', $id)->where('lots.lotType_id', 1)->get();

        $arbname = DB::table('arbs')->where('arbs.landholding_id', $id)->get();
        
        $categories = DB::table('categories')->get();
        return view('admin.landholding.view', compact('landholdings', 'arb','categories','lots','arbname','asp','awardtitle', 'lotNumber','lotno', 'valuation','approvedform',
                                                      'generateform1','generateform2','generateform3','generateform10','generateform11','generateform17','generateform18','generateform20','generateform37',
                                                      'generateform42','generateform45A','generateform46','generateform47','generateform49','generateform51','generateform52A',
                                                      'generateform52B','generateform53','generateform54','generateform57','generateform58','generateform59','generateform60','generateform61',
                                                       'generateform62','generateform63','generateform64','generateform65','generateform66','generateform67','generateform68','generateform68A',
                                                    'generateform68B','generateform69'));
    }
}
