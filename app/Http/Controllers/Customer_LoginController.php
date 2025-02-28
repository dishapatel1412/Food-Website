<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Customer_LoginController extends Controller
{
    public function loginPage() {
        return view('customer_login');
    }

    public function login_customer(Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('customers')->attempt($credentials)) {
            $customer = Auth::guard('customers')->user()->name;
            return view('customer_dashboard',compact('customer'));
        }
        return back()->withErrors(['email' => 'Invalid Email', 'password' => 'Invalid Password']);
    }

    public function logout_customer(Request $request) {
        Auth::guard('customers')->logout();
        return redirect('/');
    }
}
