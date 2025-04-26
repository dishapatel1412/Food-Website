<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendor;
use App\Models\Customer;
use App\Models\City;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        return view('admin_login');
    }

    public function validateAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin_dashboard');
        } else {
            return back()->withErrors(['email' => 'Invalid Email', 'password' => 'Invalid Password']);
        }
    }

    public function dashboardAdmin()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin_dashboard');
        } else {
            return redirect()->route('admin_login');
        }
    }

    public function viewVendors()
    {
        if (Auth::guard('admin')->check()) {
            $allVendors = Vendor::all();
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

    public function viewCustomers()
    {
        if (Auth::guard('admin')->check()) {
            $allCustomers = Customer::all();
            return view('admin_dashboard', [
                'customers' => $allCustomers,
                'activeTab' => 'viewCustomers'
            ]);
        } else {
            return redirect()->route('admin_login');
        }
    }

    // public function selectCityForm()
    // {
    //     $cities = City::all();
    //     return view('admin_dashboard', [
    //         'cities' => $cities,
    //         'activeTab' => 'salesReport'
    //     ]);
    // }

    // public function selectReportType(Request $request)
    // {
    //     $request->validate([
    //         'city' => 'required|string'
    //     ]);
    //     $city = $request->city;
    //     return view('admin_dashboard', compact('city'));
    // }

    // public function generateReport(Request $request)
    // {
    //     $request->validate([
    //         'city' => 'required|string',
    //         'report_type' => 'required|in:weekly,monthly',
    //     ]);

    //     if ($request->report_type === 'weekly') {
    //         $start = date('Y-m-d 00:00:00', strtotime('monday this week'));
    //         $end = date('Y-m-d 23:59:59', strtotime('sunday this week'));
    //     } else {
    //         $start = date('Y-m-01 00:00:00');
    //         $end = date('Y-m-t 23:59:59');
    //     }

    //     $sales = DB::table('orders')
    //         ->join('vendors', 'orders.vendor_id', '=', 'vendors.vendor_id')
    //         ->where('orders.order_status', 1)
    //         ->where('vendors.city', $request->city)
    //         ->whereBetween('orders.order_date', [$start, $end])
    //         ->selectRaw('orders.order_date, vendors.city, COUNT(*) as total_orders, SUM(orders.total_amount) as total_sales')
    //         ->groupBy('order_date', 'vendors.city')
    //         ->orderByDesc('order_date')
    //         ->get();
    //     return view('admin_dashboard', [
    //         'sales' => $sales,
    //         'city' => $request->city,
    //         'report_type' => $request->report_type,
    //         'activeTab' => 'salesReport'
    //     ]);
    // }

    public function salesReport(Request $request)
    {
        $cities = City::all();
        $city = $request->input('city');
        $reportType = $request->input('report_type');
        $sales = [];

        if ($city && $reportType) {
            $request->validate([
                'city' => 'required|string',
                'report_type' => 'required|in:weekly,monthly',
            ]);

            if ($reportType === 'weekly') {
                $start = date('Y-m-d 00:00:00', strtotime('monday this week'));
                $end = date('Y-m-d 23:59:59', strtotime('sunday this week'));
            } else {
                $start = date('Y-m-01 00:00:00');
                $end = date('Y-m-t 23:59:59');
            }

            $sales = DB::table('orders')
                ->join('vendors', 'orders.vendor_id', '=', 'vendors.vendor_id')
                ->where('orders.order_status', 1)
                ->where('vendors.city', $city)
                ->whereBetween('orders.order_date', [$start, $end])
                ->selectRaw('orders.order_date, vendors.city, COUNT(*) as total_orders, SUM(orders.total_amount) as total_sales')
                ->groupBy('orders.order_date', 'vendors.city')
                ->orderByDesc('orders.order_date')
                ->get();
        }
        return view('admin_dashboard', [
            'cities' => $cities,
            'city' => $city,
            'report_type' => $reportType,
            'sales' => $sales,
            'activeTab' => 'salesReport',
        ]);
    }

    public function logoutAdmin()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }
}
