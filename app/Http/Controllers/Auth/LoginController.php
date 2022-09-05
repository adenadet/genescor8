<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

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
  
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
        {
            if (Auth::user()->hasRole('Staffs')){
                return redirect()->route('staffs');
            }
            else if (Auth::user()->hasRole('Consultants')){
                return redirect()->route('consultants');
            }
            else if (Auth::user()->hasRole('Agency')){
                return redirect()->route('agency');
            }
            else{
                return redirect()->route('app');
            }
        }
        else{
            return redirect()->route('login')->with('error','Email-Address And Password Are Wrong.');
        }
          
    }
}
