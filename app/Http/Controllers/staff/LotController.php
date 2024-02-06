<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LotController extends Controller
{
    public function store(Request $request)
    {
        try{
            $request->validate([
                'lotNo' => 'required',
                'lotType_id' => 'required',
                'lotArea' => 'required',
                'arb_name' => 'required',
            ],[
                'lotNo.required' => 'The lot number field is required.',
                'lotType_id.required' => 'The lot type field is required.'
            ]);
    
            DB::table('lots')->insert([
                'landholding_id' => $request->landholding_id,
                'arb_name' => $request->arb_name,
                'lotNo' => $request->lotNo,
                'lotType_id' => $request->lotType_id,
                'lotArea' => $request->lotArea,
                'crop' => $request->crop,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
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
            'arb_name' => $request->arb_name,
            'lotNo' => $request->lotNo,
            'lotType_id' => $request->lotType_id,
            'lotArea' => $request->lotArea,
            'crop' => $request->crop,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        DB::table('lots')->where('id', $id)->update($dataupdate);
        return redirect()->back()->with('success', 'Updated successfully');
    }
    public function delete($id)
    {
        DB::table('lots')->where('lots.id', $id)->delete();
        return redirect()->back()->with('error', 'Deleted successfully');
    }
}
