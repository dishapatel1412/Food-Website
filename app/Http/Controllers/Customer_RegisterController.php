<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Customer_RegisterController extends Controller
{
    public function customer() {
        return view('customer_register');
    }

    public function register_customer(Request $request) {
        $request->validate(
            [
                'email' => 'required',
                'name' => 'required',
                'mobile_number' => 'required',
                'password' => 'required'
            ]
        );

        $customer = new CustomerModel;
        $customer->email = $request['email'];
        $customer->name = $request['name'];
        $customer->mobile_number = $request['mobile_number'];
        $customer->password = Hash::make($request->input('password'));

        $customer->save();
        return redirect('/customer-login');
    }
}
