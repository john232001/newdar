<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function index()
    {

        $users = DB::table('users')
            ->join('roles', 'roles.id', '=', 'users.type')
            ->select('users.*', 'roles.role_type')
            ->latest('last_seen')
            ->get();
        $roles = DB::table('roles')->get();
        return view('admin.user_accounts.index', compact('users', 'roles'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'type' => 'required'
            ], [
                'type.required' => 'The role field is required.',
            ]);

            DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => $request->type,
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
        $users_update = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        DB::table('users')->where('id', $id)->update($users_update);
        return redirect()->back()->with('success', 'Updated successfully');
    }
    public function delete($id)
    {
        DB::table('users')->where('users.id', $id)->delete();
        return redirect()->back()->with('error', 'Deleted successfully');
    }
}
