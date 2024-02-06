<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    public function index()
    {
        $officers = DB::table('officers')
            ->join('positions', 'positions.id', '=', 'officers.position_id')
            ->select('officers.*', 'positions.position_type')
            ->get();
        $positions = DB::table('positions')->get();
        return view('admin.officers.index', compact('positions', 'officers'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'officer_name' => 'required',
                'position_id' => 'required'
            ], [
                'officer_name.required' => 'The officer name field is required.',
                'position_id.required' => 'The position field is required.',
            ]);

            DB::table('officers')->insert([
                'officer_name' => $request->officer_name,
                'position_id' => $request->position_id,
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            return redirect()->back()->with('success', 'Added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to insert data: ' . $e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        $officer_update = [
            'officer_name' => $request->officer_name,
            'position_id' => $request->role_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        DB::table('officers')->where('id', $id)->update($officer_update);
        return redirect()->back()->with('success', 'Updated successfully');
    }
    public function delete($id)
    {
        DB::table('officers')->where('officers.id', $id)->delete();
        return redirect()->back()->with('error', 'Deleted successfully');
    }
}
