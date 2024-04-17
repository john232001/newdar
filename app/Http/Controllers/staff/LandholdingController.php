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
            ->select('landholdings.*', 'municipalities.muni_name', 'barangays.brgy_names')
            ->orderBy('landholdings.id')
            ->paginate(10);

        $barangays = DB::table('barangays')->get();
        $municipalities = DB::table('municipalities')->get();
        $maro = DB::table('officers')->where('officers.position_id', 1)->get();
        $paro = DB::table('officers')->where('officers.position_id', 2)->get();
        return view('staff.landholding.index', compact('landholdings', 'maro', 'paro', 'municipalities','barangays'));
    }
    public function search(Request $request)
    {
        $search = $request->search;

            if(empty($search)){

                $landholdings = DB::table('landholdings')
                    ->join('municipalities', 'municipalities.id', '=', 'landholdings.municipality_id')
                    ->join('barangays', 'barangays.id', '=', 'landholdings.barangay_id')
                    ->select('landholdings.*', 'municipalities.muni_name', 'barangays.brgy_names')
                    ->orderBy('landholdings.id')
                    ->paginate(10);

                $barangays = DB::table('barangays')->orderBy('brgy_names', 'asc')->get();
                $municipalities = DB::table('municipalities')->get();
                $maro = DB::table('officers')->where('officers.position_id', 1)->get();
                $paro = DB::table('officers')->where('officers.position_id', 2)->get();
                $carpo = DB::table('officers')->where('officers.position_id', 3)->get();
                $ceo = DB::table('officers')->where('officers.position_id', 4)->get();
                $manager = DB::table('officers')->where('officers.position_id', 5)->get();
                $rod = DB::table('officers')->where('officers.position_id', 6)->get();
                
                return view('staff.landholding.index', compact('landholdings', 'maro', 'paro','carpo','ceo','manager','rod', 'municipalities','barangays'));
            }
            else{

                $result = DB::table('landholdings')
                ->join('municipalities', 'municipalities.id', '=', 'landholdings.municipality_id')
                ->join('barangays', 'barangays.id', '=', 'landholdings.barangay_id')
                ->select('landholdings.*', 'municipalities.muni_name', 'barangays.brgy_names')
                ->where('firstname', 'LIKE', '%'.$search.'%')
                ->orwhere('lhid', 'LIKE', '%'.$search.'%')
                ->get();
            }

            $barangays = DB::table('barangays')->orderBy('brgy_names', 'asc')->get();
            $municipalities = DB::table('municipalities')->get();
            $maro = DB::table('officers')->where('officers.position_id', 1)->get();
            $paro = DB::table('officers')->where('officers.position_id', 2)->get();
            $carpo = DB::table('officers')->where('officers.position_id', 3)->get();
            $ceo = DB::table('officers')->where('officers.position_id', 4)->get();
            $manager = DB::table('officers')->where('officers.position_id', 5)->get();
            $rod = DB::table('officers')->where('officers.position_id', 6)->get();
            
            return view('staff.landholding.search', compact('result', 'maro', 'paro','carpo','ceo','manager','rod', 'municipalities','barangays'));
       
    }
    public function uploadedfile($id){
        $data = DB::table('landholdings')->where('landholdings.id', $id)->get();
        return view('staff.landholding.view_documents', compact('data'));
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
            $generateform1A = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_1A')->get();
            $generateform2 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_2')->get();
            $generateform3 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_3')->get();
            $generateform4 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_4')->get();
            $generateform5 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_5')->get();
            $generateform6 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_6')->get();
            $generateform7 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_7')->get();
            $generateform8 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_8')->get();
            $generateform9 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_9')->get();
            $generateform10 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_10')->get();
            $generateform11 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_11')->get();
            $generateform12A = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_12A')->get();
            $generateform13A = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_13A')->get();
            $generateform14 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_14')->get();
            $generateform15 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_15')->get();
            $generateform16 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_16')->get();
            $generateform17 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_17')->get();
            $generateform18 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_18')->get();
            $generateform18A = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_18A')->get();
            $generateform19 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_19')->get();
            $generateform20 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_20')->get();
            $generateform21 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_21')->get();
            $generateform22 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_22')->get();
            $generateform23 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_23')->get();
            $generateform24 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_24')->get();
            $generateform25 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_25')->get();
            $generateform26 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_26')->get();
            $generateform27 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_27')->get();
            $generateform28 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_28')->get();
            $generateform29 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_29')->get();
            $generateform30 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_30')->get();
            $generateform31 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_31')->get();
            $generateform32 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_32')->get();
            $generateform33 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_33')->get();
            $generateform34 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_34')->get();
            $generateform35 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_35')->get();
            $generateform36 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_36')->get();
            $generateform37 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_37')->get();
            $generateform37A = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_37A')->get();
            $generateform38 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_38')->get();
            $generateform39 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_39')->get();
            $generateform40 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_40')->get();
            $generateform41 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_41')->get();
            $generateform42 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_42')->get();
            $generateform43 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_43')->get();
            $generateform44 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_44')->get();
            $generateform45 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_45')->get();
            $generateform45A = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_45A')->get();
            $generateform46 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_46')->get();
            $generateform47 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_47')->get();
            $generateform48 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_48')->get();
            $generateform49 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_49')->get();
            $generateform50 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_50')->get();
            $generateform51 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_51')->get();
            $generateform52A = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_52A')->get();
            $generateform52B = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_52B')->get();
            $generateform53 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_53')->get();
            $generateform54 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_54')->get();
            $generateform55 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'form_55')->get();
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
            $generateawardform1 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'Awardform_1')->get();
            $generateawardform2 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'Awardform_2')->get();
            $generateawardform3 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'Awardform_3')->get();
            $generateawardform4 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'Awardform_4')->get();
            $generateawardform5 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'Awardform_5')->get();
            $generateawardform6 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'Awardform_6')->get();
            $generateawardform7 = DB::table('generate_logs')->where('generate_logs.landholding_id', $id)->where('generate_logs.form_identifier', 'Awardform_7')->get();

        //get only the value 'Carpable' lot
        $lotNumber = DB::table('lots')->where('lots.landholding_id', $id)->where('lots.lotType_id', 1)->get();

        //get only the value of lot number where the lot type is Carpable
        $lotno = DB::table('lots')->where('lots.landholding_id', $id)->where('lots.lotType_id', 1)->get();

        $arbname = DB::table('arbs')->where('arbs.landholding_id', $id)->get();
        
        $categories = DB::table('categories')->get();
        return view('staff.landholding.view', compact('landholdings', 'arb','categories','lots','arbname','asp','awardtitle', 'lotNumber','lotno', 'valuation','approvedform',
                                                      'generateform1','generateform1A','generateform2','generateform3','generateform4','generateform5','generateform6',
                                                      'generateform7','generateform8','generateform9','generateform10','generateform11','generateform12A','generateform13A',
                                                      'generateform14','generateform15','generateform16','generateform17','generateform18','generateform18A','generateform19',
                                                      'generateform20','generateform21','generateform22','generateform23','generateform24','generateform25','generateform26',
                                                      'generateform27','generateform28','generateform29','generateform30','generateform31','generateform32','generateform33',
                                                      'generateform34','generateform35','generateform36','generateform37','generateform37A','generateform38','generateform39',
                                                      'generateform40','generateform41','generateform42','generateform43','generateform44','generateform45','generateform45A',
                                                      'generateform46','generateform47','generateform48','generateform49','generateform50','generateform51','generateform52A',
                                                      'generateform52B','generateform53','generateform54','generateform55','generateform57','generateform58','generateform59',
                                                      'generateform60','generateform61','generateform62','generateform63','generateform64','generateform65','generateform66',
                                                      'generateform67','generateform68','generateform68A','generateform68B','generateform69','generateawardform1','generateawardform2',
                                                      'generateawardform3','generateawardform4','generateawardform5','generateawardform6','generateawardform7'));
    }
}
