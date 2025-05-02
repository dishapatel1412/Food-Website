<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\FoodItems;
use App\Models\Vendor;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.item_id' => 'required|exists:fooditems,item_id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $customerId = Auth::guard('customers')->id();
        $paymentId = $request->input('payment_id');

        foreach ($request->input('items') as $itemData) {
            $itemId = $itemData['item_id'];
            $quantity = $itemData['quantity'];

            $foodItem = FoodItems::find($itemId);

            if (!$foodItem) {
                return response()->json(['error' => "Food item with ID {$itemId} not found"], 404);
            }

            $totalAmount = $foodItem->price * $quantity;

            Order::create([
                'customer_id' => $customerId,
                'item_id' => $itemId,
                'vendor_id' => $foodItem->vendor_id,
                'payment_id' => $paymentId,
                'quantity' => $quantity,
                'total_amount' => $totalAmount,
                'order_status' => 'pending',
                'order_date' => now(),
            ]);
        }

        return response()->json(['message' => 'Order placed successfully']);
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->order_status = $request->input('status');
            $order->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Order not found.'], 404);
    }
}
