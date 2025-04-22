<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendor;
use App\Models\Customer;

class AdminController extends Controller
{
    public function loginAdmin() {
        return view('admin_login');
    }

    public function validateAdmin(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin_dashboard');
        } else {
            return back()->withErrors(['email' => 'Invalid Email', 'password' => 'Invalid Password']);
        }
    }

    public function dashboardAdmin() {
        if(Auth::guard('admin')->check()) {
            return view('admin_dashboard');
        } else {
            return redirect()->route('admin_login');
        }
    }

    public function viewVendors() {
        if(Auth::guard('admin')->check()) {
            $allVendors = Vendor::all();
            // $allVendors = Vendor::paginate(10);
            return view('admin_dashboard', [
                'vendors' => $allVendors,
                'activeTab' => 'viewVendors'
            ]);
        } else {
            return redirect()->route('admin_login');
        }
    }

    public function approveVendor($vendorId)
    {
        if (Auth::guard('admin')->check()) {
            $vendor = Vendor::findOrFail($vendorId);
            $vendor->is_approved = 'approved';
            $vendor->save();

            return redirect()->route('view_vendors')->with('success', 'Vendor approved successfully.');
        } else {
            return redirect()->route('admin_login');
        }
    }

    public function rejectVendor($vendorId)
    {
        if (Auth::guard('admin')->check()) {
            $vendor = Vendor::findOrFail($vendorId);
            $vendor->is_approved = 'rejected';
            $vendor->save();

            return redirect()->route('view_vendors')->with('success', 'Vendor rejected successfully.');
        } else {
            return redirect()->route('admin_login');
        }
    }

    public function viewCustomers() {
        if(Auth::guard('admin')->check()) {
            $allCustomers = Customer::all();
            return view('admin_dashboard', [
                'customers' => $allCustomers,
                'activeTab' => 'viewCustomers'
            ]);
        } else {
            return redirect()->route('admin_login');
        }
    }

    public function logoutAdmin() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }
}
