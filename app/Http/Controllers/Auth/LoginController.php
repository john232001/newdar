<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {   
        $input = $request->all();
       
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
       
        if(auth()->attempt(array('username' => $input['username'], 'password' => $input['password'])))
        {
            if (auth()->user()->type == 'admin') {
                return redirect()->route('admin.home')->with('success', 'Login Successfully!!');
            }
            else if(auth()->user()->type == 'staff')
            {
                return redirect()->route('staff.home')->with('success', 'Login Successfully!!');
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Invalid Username or Password.');
        }
            
    }
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('login')->with('success', 'Logout Successfully!!');
    }
    
}
