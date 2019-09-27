<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DocenteLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:docente')->except('logout');
    }

    public function showLoginForm()
    {
        return view('docente.docente-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (Auth::guard('docente')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->route('docente.home')->with('doc_login_successful', 'Inició sesion como DOCENTE!');
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('docente')->logout();
        return redirect('/');
    }
}
