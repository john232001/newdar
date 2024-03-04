<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ValuationController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'lotNumber_id' => 'required',
                'aocNo' => 'required',
                'claimNo' => 'required',
                'amount' => 'required',
            ], [
                'lotNumber_id.required' => 'The lot number field is required.',
                'aocNo.required' => 'The AOC number field is required.',
                'claimNo.required' => 'The claim number field is required.',
                'amount.required' => 'The amount field is required.',
            ]);

        DB::table('valuations')->insert([
                'landholding_id' => $request->landholding_id,
                'lotNumber_id' => $request->lotNumber_id,
                'aocNo' => $request->aocNo,
                'claimNo' => $request->claimNo,
                'amount' => $request->amount,
                'dateTransmitted' => $request->dateTransmitted,
                'dateofMov' => $request->dateofMov,
                'dateServed' => $request->dateServed,
                'dateofFI' => $request->dateofFI,
                'dateofCF' => $request->dateofCF,
                'transmittalStatus' => $request->transmittalStatus,
                'stateReason' => $request->stateReason,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return redirect()->back()->with('success', 'Added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to insert data!!!' . $e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        $dataupdate = [
            'lotNumber_id' => $request->lotNumber_id,
            'aocNo' => $request->aocNo,
            'claimNo' => $request->claimNo,
            'amount' => $request->amount,
            'dateTransmitted' => $request->dateTransmitted,
            'dateofMov' => $request->dateofMov,
            'dateServed' => $request->dateServed,
            'dateofFI' => $request->dateofFI,
            'dateofCF' => $request->dateofCF,
            'transmittalStatus' => $request->transmittalStatus,
            'stateReason' => $request->stateReason,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        DB::table('valuations')->where('id', $id)->update($dataupdate);
        return redirect()->back()->with('success', 'Updated successfully');
    }
    public function delete($id)
    {
        DB::table('valuations')->where('valuations.id', $id)->delete();
        return redirect()->back()->with('error', 'Deleted successfully');
    }
}
