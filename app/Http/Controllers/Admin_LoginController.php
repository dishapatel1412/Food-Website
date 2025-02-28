<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin_LoginController extends Controller
{
    public function loginPage() {
        return view('admin_login');
    }

    public function login_admin(Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt($credentials)) {
            return view('admin_dashboard');
        }
        return back()->withErrors(['email' => 'Invalid Email', 'password' => 'Invalid Password']);
    }

    public function logout_admin(Request $request) {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
