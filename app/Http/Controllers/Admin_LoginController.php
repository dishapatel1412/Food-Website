<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminModelel;

class Admin_LoginController extends Controller
{
    public function loginPage()
    {
        return view('admin_login');
    }

    public function login_admin(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );

        $admin = AdminModel::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::login($admin);
            return redirect('/admin');
        }
        return back()->withErrors(['email' => 'Invalid Email', 'password' => 'Invalid Password']);
    }
}
