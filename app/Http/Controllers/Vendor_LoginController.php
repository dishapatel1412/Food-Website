<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\VendorModel;

class Vendor_LoginController extends Controller
{
    public function loginPage() {
        return view('vendor_login');
    }

    public function login_vendor(Request $request) {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );

        $vendor = VendorModel::where('email', $request->email)->first();

        if ($vendor && Hash::check($request->password, $vendor->password)) {
            Auth::login($vendor);
            return redirect('/vendor');
        }
        return back()->withErrors(['email' => 'Invalid Credentials']);
    }
}
