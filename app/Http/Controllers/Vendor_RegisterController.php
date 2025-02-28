<?php

namespace App\Http\Controllers;

use App\Models\VendorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Vendor_RegisterController extends Controller
{
    public function vendor() {
        return view('vendor_register');
    }

    public function register_vendor(Request $request) {
        $request->validate([
            'owner_name' => 'required',
            'restaurant_name' => 'required',
            'mobile_number' => 'required',
            'email' => 'required',
            'password' => 'required',
            'conf_vendor_password' => 'required',
            'state' => 'required',
            'city' => 'required',
            'gst_number' => 'required'
        ]);

        $vendor = new VendorModel;
        $vendor->owner_name = $request->owner_name;
        $vendor->restaurant_name = $request->restaurant_name;
        $vendor->mobile_number = $request->mobile_number;
        $vendor->email = $request->email;
        $vendor->password = Hash::make($request->password);
        $vendor->state = $request->state;
        $vendor->city = $request->city;
        $vendor->gst_number = $request->gst_number;
        $vendor->save();
        return redirect('/vendor-login');
    }
}
