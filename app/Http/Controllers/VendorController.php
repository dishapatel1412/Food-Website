<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use App\Models\FoodItems;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VendorController extends Controller
{
    public function registerVendor()
    {
        return view('vendor_register');
    }

    public function validateVendor(Request $request)
    {
        $vendorData = $request->validate([
            'owner_name' => 'required',
            'restaurant_name' => 'required',
            'mobile_number' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'state' => 'required',
            'city' => 'required',
            'gst_number' => 'required'
        ]);

        $vendorData['is_approved'] = 'pending';

        $vendor = Vendor::create($vendorData);

        if ($vendor) {
            return redirect()->route('vendor_login')->with('registration_pending', 'Your request has been sent to admin for approval. Please try again after sometime.');
        }
    }

    public function loginVendor()
    {
        return view('vendor_login');
    }

    public function loginValidate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $vendor = Vendor::where('email', $request->email)->first();

        if($credentials) {
            if($vendor->is_approved =='approved') {
                if (Auth::guard('vendors')->attempt($credentials)) {
                    return redirect()->route('vendor_dashboard');
                }
            } elseif ($vendor->is_approved == 'pending') {
                return back()->withErrors('registration_pending', 'Your request has been sent to admin for approval. Please try again after sometime.');
            } else {
                return back()->withErrors('registration_rejected', 'Your request has been rejected by admin. Please contact admin for more details.');
            }
        } else {
            return back()->withErrors(['email' => 'Invalid Email', 'password' => 'Invalid Password']);
        }
    }

    public function dashboardVendor()
    {
        if (Auth::guard('vendors')->check()) {
            return view('vendor_dashboard');
        } else {
            return redirect()->route('vendor_login');
        }
    }

    public function display_items()
    {
        if (Auth::guard('vendors')->check()) {
            $vendorId = Auth::guard('vendors')->id();
            $vendor = Vendor::select("restaurant_name", "city")->where("vendor_id", $vendorId)->first();
            $foodItems = FoodItems::where('vendor_id', $vendorId)->get();
            return view('vendor_dashboard', [
                'items' => $foodItems,
                'vendor' => $vendor,
                'activeTab' => 'myProfile'
            ]);
        } else {
            return redirect()->route('vendor_login');
        }
    }

    public function view_orders()
    {
        if (Auth::guard('vendors')->check()) {
            $vendorId = Auth::guard('vendors')->id();
            $orders = DB::table('orders')
                ->join('customers', 'orders.customer_id', '=', 'customers.customer_id')
                ->join('fooditems', 'orders.item_id', '=', 'fooditems.item_id')
                ->where('orders.vendor_id', $vendorId)
                ->select('orders.*', 'customers.name as customer_name', 'fooditems.name as food_item_name')->get();
            return view('vendor_dashboard', [
                'orders' => $orders,
                'activeTab' => 'viewOrders'
            ]);
        } else {
            return redirect()->route('vendor_login');
        }
    }

    public function updateOrderStatus(Request $request, $orderId)
    {
        $newStatus = $request->input('status');
        $status = DB::table('orders')->where('order_id', $orderId)->update(['order_status' => $newStatus]);
        if ($status > 0) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function past_orders()
    {
        if (Auth::guard('vendors')->check()) {
            $vendorId = Auth::guard('vendors')->id();
            $orders = DB::table('orders')
                ->join('customers', 'orders.customer_id', '=', 'customers.customer_id')
                ->join('fooditems', 'orders.item_id', '=', 'fooditems.item_id')
                ->where('orders.vendor_id', $vendorId)
                ->where('orders.order_status', 'delivered')
                ->select('orders.*', 'customers.name as customer_name', 'fooditems.name as food_item_name')
                ->get();

            return view('vendor_dashboard', [
                'pastOrders' => $orders,
                'activeTab' => 'pastOrders'
            ]);
        } else {
            return redirect()->route('vendor_login');
        }
    }

    public function getState()
    {
        $states = DB::table('states')->orderBy('state_name', 'asc')->get();
        $data['states'] = $states;
        return view('vendor_register', $data);
    }

    public function fetchCities($state_id)
    {
        $cities = DB::table('cities')->where('state_id', $state_id)->get();
        return response()->json(['cities' => $cities]);
    }

    public function logoutVendor()
    {
        Auth::guard('vendors')->logout();
        return redirect()->route('vendor_login');
    }
}
