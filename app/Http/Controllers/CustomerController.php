<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\FoodItems;
use App\Models\State;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function registerCustomer()
    {
        return view('customer_register');
    }

    public function validateCustomer(Request $request)
    {
        $customerData = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'mobile_number' => 'required',
            'password' => 'required',
        ]);

        $customer = Customer::create($customerData);

        if ($customer) {
            return redirect()->route('customer_login');
        }
    }

    public function loginCustomer()
    {
        return view('customer_login');
    }

    public function loginValidate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('customers')->attempt($credentials)) {
            return redirect()->route('customer_dashboard');
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid Email', 'password' => 'Invalid Password']);
        }
    }

    public function dashboardCustomer()
    {
        if (Auth::guard('customers')->check()) {
            return view('customer_dashboard');
        } else {
            return redirect()->route('customer_login');
        }
    }

    public function orderNow()
    {
        if (Auth::guard('customers')->check()) {
            $states = DB::table('states')->orderBy('state_name', 'asc')->get();
            return view('order_now', ['states' => $states]);
        } else {
            return redirect()->route('customer_login');
        }
    }

    public function fetchCities($state_id)
    {
        $cities = DB::table('cities')->where('state_id', $state_id)->get();
        return response()->json(['cities' => $cities]);
    }

    public function getRestaurants(Request $request)
    {
        if (Auth::guard('customers')->check()) {
            $city_id = $request->input('city');
            $restaurants = Vendor::where('city', $city_id)->get(['restaurant_name', 'owner_name', 'vendor_id']);
            return response()->json(['restaurants' => $restaurants]);
            // return view('order_now', ['restaurants' => $restaurants]);
        } else {
            return redirect()->route('customer_login');
        }
    }

    public function myOrders()
    {
        if (Auth::guard('customers')->check()) {
            $customerId = Auth::guard('customers')->id();
            $orders = DB::table('orders')
                ->join('fooditems', 'orders.item_id', '=', 'fooditems.item_id')
                ->where('orders.customer_id', $customerId)
                ->select(
                    'orders.*',
                    'fooditems.name as food_name',
                    'fooditems.price as food_price',
                    'orders.order_status as order_status'
                )->get();
            return view('my_orders', ['orders' => $orders]);
        } else {
            return redirect()->route('customer_login');
        }
    }

    public function addToCart($item_id)
    {
        if (Auth::guard('customers')->check()) {
            $customerId = Auth::guard('customers')->id();

            $existingCartItem = DB::table('carts')
                ->where('customer_id', $customerId)
                ->where('item_id', $item_id)
                ->first();

            if ($existingCartItem) {
                DB::table('carts')->where('id', $existingCartItem->id)->update([
                    'quantity' => $existingCartItem->quantity + 1,
                    'updated_at' => now()
                ]);
            } else {
                DB::table('carts')->insert([
                    'customer_id' => $customerId,
                    'item_id' => $item_id,
                    'quantity' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            return redirect()->route('show_cart')->with('success', 'Item added to cart!');
        }

        return redirect()->route('customer_login');
    }

    public function showCart()
    {
        if (Auth::guard('customers')->check()) {
            $customerId = Auth::guard('customers')->id();

            $cartItems = DB::table('carts')
                ->join('fooditems', 'carts.item_id', '=', 'fooditems.item_id')
                ->where('carts.customer_id', $customerId)
                ->select(
                    'carts.id as cart_id',
                    'fooditems.name as food_name',
                    'fooditems.price as food_price',
                    'carts.quantity'
                )->get();

            return view('cart_page', ['cartItems' => $cartItems]);
        }

        return redirect()->route('customer_login');
    }

    public function removeFromCart($id)
    {
        if (Auth::guard('customers')->check()) {
            DB::table('carts')->where('id', $id)->delete();
            return redirect()->route('show_cart')->with('success', 'Item removed from cart!');
        }

        return redirect()->route('customer_login');
    }


    public function cancelOrder($orderId)
    {
        DB::table('orders')->where('order_id', $orderId)->update(['order_status' => 'canceled']);
        DB::table('orders')->where('order_id', $orderId)->delete();
        return redirect()->back()->with('success', 'Order canceled successfully.');
    }

    public function restaurantMenu(Request $request)
    {
        if (Auth::guard('customers')->check()) {
            $restaurantName = $request->input('restaurant_name');
            if ($restaurantName) {
                $vendor = Vendor::where('restaurant_name', $restaurantName)->first();

                if ($vendor) {
                    $vendor_id = $vendor->vendor_id;
                    $foodItems = FoodItems::where('vendor_id', $vendor_id)->get();
                    return response()->json(['foodItems' => $foodItems]);
                } else {
                    return response()->json(['error' => 'Restaurant not found.']);
                }
            } else {
                return response()->json(['error' => 'Restaurant name not provided.']);
            }
        } else {
            return redirect()->route('customer_login');
        }
    }

    public function logoutCustomer()
    {
        Auth::guard('customers')->logout();
        return redirect()->route('customer_login');
    }
}
