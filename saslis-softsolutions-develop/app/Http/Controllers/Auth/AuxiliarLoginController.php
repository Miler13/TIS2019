<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuxiliarLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:auxiliar')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auxiliar.auxiliar-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (Auth::guard('auxiliar')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->route('auxiliar.home')->with('aux_login_successful', 'Inició sesion como AUXILIAR!');
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('auxiliar')->logout();
        return redirect('/');
    }
}
