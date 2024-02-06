<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AspController extends Controller
{
    public function store(Request $request)
    {
        try{
            $request->validate([
                'aspNo' => 'required',
                'aspDate' => 'required',
                'aspArea' => 'required',
            ], [
                'aspNo.required' => 'The asp number field is required.',
                'aspDate.required' => 'The asp date approved field is required.',
                'aspArea.required' => 'The asp area field is required.',
            ]);
    
            DB::table('asps')->insert([
                'landholding_id' => $request->landholding_id,
                'aspNo' => $request->aspNo,
                'aspDate' => $request->aspDate,
                'aspArea' => $request->aspArea,
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
            'aspNo' => $request->aspNo,
            'aspDate' => $request->aspDate,
            'aspArea' => $request->aspArea,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        DB::table('asps')->where('id', $id)->update($dataupdate);
        return redirect()->back()->with('success', 'Updated successfully');
    }
    public function delete($id)
    {
        DB::table('asps')->where('asps.id', $id)->delete();
        return redirect()->back()->with('error', 'Deleted successfully');
    }
}
