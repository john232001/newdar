<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ArbController extends Controller
{
    public function store(Request $request)
    {
        try{
            $request->validate([
                'fname' => 'required',
                'lname' => 'required',
                'datebirth' => 'required',
                'gender_id' => 'required',
                'address' => 'required',
                'ownership_id' => 'required',
                'dateOfOath' => 'required',
            ], [
                'fname.required' => 'The first name field is required',
                'lname.required' => 'The last name field is required',
                'datebirth.required' => 'The date birth field is required',
                'gender_id.required' => 'The gender field is required',
                'ownership_id.required' => 'The ownership preference field is required',
                'dateOfOath.required' => 'The date of oathtaking field is required',
            ]);
    
            DB::table('arbs')->insert([
                'landholding_id' => $request->landholding_id,
                'fname' => $request->fname,
                'lname' => $request->lname,
                'mname' => $request->mname,
                'extension' => $request->extension,
                'spousename' => $request->spousename,
                'datebirth' => $request->datebirth,
                'gender_id' => $request->gender_id,
                'address' => $request->address,
                'ownership_id' => $request->ownership_id,
                'dateOfOath' => $request->dateOfOath,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
    
            return redirect()->back()->with('success', 'Added successfully');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Failed to insert data!!!' . $e->getMessage());
        }
        
    }
    public function update(Request $request, $id)
    {
        $dataupdate = [
            'fname' => $request->fname,
            'lname' => $request->lname,
            'mname' => $request->mname,
            'extension' => $request->extension,
            'spousename' => $request->spousename,
            'datebirth' => $request->datebirth,
            'gender_id' => $request->gender_id,
            'address' => $request->address,
            'ownership_id' => $request->ownership_id,
            'dateOfOath' => $request->dateOfOath,
        ];

        DB::table('arbs')->where('id', $id)->update($dataupdate);
        return redirect()->back()->with('success', 'Updated successfully');
    }
    public function delete($id)
    {
        DB::table('arbs')->where('arbs.id', $id)->delete();
        return redirect()->back()->with('error', 'Deleted successfully');
    }
}
