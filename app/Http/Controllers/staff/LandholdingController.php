<?php

namespace App\Http\Controllers\staff;

use App\Models\Landholding;
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
        $barangays = DB::table('barangays')->get();
        $municipalities = DB::table('municipalities')->get();
        $maro = DB::table('officers')->where('officers.position_id', 1)->get();
        $paro = DB::table('officers')->where('officers.position_id', 2)->get();
        return view('staff.landholding.index', compact('landholdings', 'maro', 'paro', 'municipalities','barangays'));
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
        
        $generateform1 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_1')->get();
        $generateform2 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_2')->get();
        $generateform3 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_3')->get();
        $generateform18 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_18')->get();
        $generateform20 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_20')->get();
        $generateform37 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_37')->get();
        $generateform42 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_42')->get();
        $generateform46 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_46')->get();
        $generateform47 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_47')->get();
        $generateform49 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_49')->get();
        $generateform51 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_51')->get();
        $generateform52B = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_52B')->get();
        $generateform53 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_53')->get();
        $generateform54 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_54')->get();
        //get only the value 'Carpable' in ID
        $lotNumber = DB::table('lots')->where('lots.landholding_id', $id)->where('lots.lotType_id', 1)->get();

        //get only the value of lot number where the lot type is Carpable in ID of landholding
        $lotno = DB::table('lots')->where('lots.landholding_id', $id)->where('lots.lotType_id', 1)->get();

        $arbname = DB::table('arbs')->where('arbs.landholding_id', $id)->get();
        
        $categories = DB::table('categories')->get();
        return view('staff.landholding.view', compact('landholdings', 'arb','categories','lots','arbname','asp','awardtitle', 'lotNumber','lotno', 'valuation',
                                                    'generateform1','generateform2','generateform3','generateform18','generateform20','generateform37','generateform42',
                                                    'generateform46','generateform47','generateform49','generateform51','generateform52B','generateform53','generateform54'));
    }
}
