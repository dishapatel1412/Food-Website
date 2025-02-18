<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\CustomerModel;

class Customer_LoginController extends Controller
{
    public function loginPage()
    {
        return view('customer_login');
    }

    public function login_customer(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );

        $customer = CustomerModel::where('email', $request->email)->first();

        if ($customer && Hash::check($request->password, $customer->password)) {
            Auth::login($customer);
            return redirect('/');
        }
        return back()->withErrors(['email' => 'Invalid Credentials']);
    }
}
