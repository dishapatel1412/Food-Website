<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Vendor_LoginController extends Controller
{
    public function loginPage() {
        return view('vendor_login');
    }

    public function login_vendor(Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('vendors')->attempt($credentials)) {
            $vendor = Auth::guard('vendors')->user();
            return view('vendor_dashboard',compact('vendor'));
            return redirect('/vendor');
        }
        return back()->withErrors(['email' => 'Invalid Email', 'password' => 'Invalid Password']);
    }

    public function logout_vendor(Request $request) {
        Auth::guard('vendors')->logout();
        return redirect('/vendor');
    }
}
