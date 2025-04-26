<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\Order;
use App\Models\FoodItems;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RazorpayController extends Controller
{
    public function store(Request $request)
{
    if (Auth::guard('customers')->check()) {
        $request->validate([
            'razorpay_payment_id' => 'required|string',
            'total_amount' => 'required|numeric',
            'items' => 'required|json',
        ]);

        $totalCost = $request->input('total_amount');
        $api = new \Razorpay\Api\Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
        $payment = $api->payment->fetch($request->razorpay_payment_id);
        $payment->capture([
            'amount' => $totalCost * 100,
        ]);

        $checkout = new Payment();
        $checkout->name = Auth::guard('customers')->user()->name;
        $checkout->email = Auth::guard('customers')->user()->email;
        $checkout->amount = $totalCost;
        $checkout->razorpay_payment_id = $request->razorpay_payment_id;
        $checkout->order_id = $payment->id;
        $checkout->status = 1;
        $checkout->save();

        $customerId = Auth::guard('customers')->id();

        $items = json_decode($request->items, true);
        // foreach ($items as $item) {
        //     if (!isset($item['item_id']) || !isset($item['quantity'])) {
        //         continue;
        //     }

        //     $foodItem = FoodItems::find($item['item_id']);
        //     if (!$foodItem || $item['quantity'] < 1) {
        //         continue;
        //     }

        //     $totalAmount = $foodItem->price * $item['quantity'];

        //     Order::create([
        //         'customer_id' => $customerId,
        //         'item_id' => $foodItem->item_id,
        //         'vendor_id' => $foodItem->vendor_id,
        //         'quantity' => $item['quantity'],
        //         'total_amount' => $totalAmount,
        //         'order_status' => 'Pending',
        //         'order_date' => now(),
        //     ]);
        // }

        // Group items by vendor
        $itemsByVendor = [];
        foreach ($items as $item) {
            $foodItem = FoodItems::find($item['item_id']);
            if (!$foodItem || $item['quantity'] < 1) {
                continue;
            }

            $itemsByVendor[$foodItem->vendor_id][] = [
                'foodItem' => $foodItem,
                'quantity' => $item['quantity']
            ];
        }

        // Now create order records per vendor
        foreach ($itemsByVendor as $vendorId => $vendorItems) {
            foreach ($vendorItems as $vendorItem) {
                $foodItem = $vendorItem['foodItem'];
                $quantity = $vendorItem['quantity'];
                $totalAmount = $foodItem->price * $quantity;

                Order::create([
                'customer_id' => $customerId,
                'item_id' => $foodItem->item_id,
                'vendor_id' => $vendorId,
                'quantity' => $quantity,
                'total_amount' => $totalAmount,
                'order_status' => 'Pending',
                'order_date' => now(),
            ]);
        }
    }
    return redirect()->route('order_now')->with('success', 'Payment and order placed successfully!');
    }
    return redirect()->route('customer_login')->withErrors(['error' => 'Please login to complete the payment']);
}

}
