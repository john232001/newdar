<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AwardtitleController extends Controller
{
    public function store(Request $request)
    {
        try{
            $request->validate([
                'lotNumber_id' => 'required',
                'awardType_id' => 'required',
                'fbOrcname' => 'required',
                'serialNo' => 'required',
            ], [
                'lotNumber_id.required' => 'The lot number field is required.',
                'awardType_id.required' => 'The award type field is required.',
                'fbOrcname.required' => 'The fb/collective name field is required.',
                'serialNo.required' => 'The CLOA serial number field is required.',
            ]);
    
            DB::table('awardtitles')->insert([
                'landholding_id' => $request->landholding_id,
                'lotNumber_id' => $request->lotNumber_id,
                'awardType_id' => $request->awardType_id,
                'fbOrcname' => $request->fbOrcname,
                'serialNo' => $request->serialNo,
                'genDate' => $request->genDate,
                'epebNo' => $request->epebNo,
                'epebDate' => $request->epebDate,
                'registerDate' => $request->registerDate,
                'awardtitleNo' => $request->awardtitleNo,
                'distributeDate' => $request->distributeDate,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
    
            return redirect()->back()->with('success', 'Added successfully');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Failed to insert data' . $e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        $dataupdate = [
            'lotNumber_id' => $request->lotNumber_id,
            'awardType_id' => $request->awardType_id,
            'fbOrcname' => $request->fbOrcname,
            'serialNo' => $request->serialNo,
            'genDate' => $request->genDate,
            'epebNo' => $request->epebNo,
            'epebDate' => $request->epebDate,
            'registerDate' => $request->registerDate,
            'awardtitleNo' => $request->awardtitleNo,
            'distributeDate' => $request->distributeDate,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        DB::table('awardtitles')->where('id', $id)->update($dataupdate);
        return redirect()->back()->with('success', 'Updated successfully');
    }
    public function delete($id)
    {
        DB::table('awardtitles')->where('awardtitles.id', $id)->delete();
        return redirect()->back()->with('error', 'Deleted successfully');
    }
}
