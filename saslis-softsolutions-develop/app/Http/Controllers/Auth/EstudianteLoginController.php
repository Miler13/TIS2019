<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EstudianteLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:estudiante')->except('logout');
    }

    public function showLoginForm()
    {
        return view('estudiante.estudiante-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (Auth::guard('estudiante')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->route('estudiante.home')->with('est_login_successful', 'Inició sesion como ESTUDIANTE!');
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('estudiante')->logout();
        return redirect('/');
    }
}
