<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodItems;
use Illuminate\Support\Facades\Auth;

class FoodItemsController extends Controller
{
    public function add_items (Request $request) {
        $data = $request->validate([
            'imageUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foodName' => 'required',
            'foodPrice' => 'required'
        ]);

        $foodItem = new FoodItems();
        if(request()->hasFile('imageUpload')) {
            $file = $request->file('imageUpload');
            $fileName = time() . "img." . $file->getClientOriginalExtension();
            $file->move('images', $fileName);
            $foodItem->image_path = $fileName;
        }

        $foodItem->name = $request->foodName;
        $foodItem->price = $request->foodPrice;
        $foodItem->vendor_id = Auth::guard('vendors')->id();
        $foodItem->save();
        return redirect()->route('display_items')->with('success', 'Item added successfully');
    }

    public function trash($id) {
        $foodItem = FoodItems::find($id);
        if ($foodItem) {
            $foodItem->delete();
            return redirect()->route('display_items')->with('success', 'Item moved to trash');
        } else {
            return redirect()->route('display_items')->with('error', 'Item not found');
        }
    }

    public function getTrashedItems()
    {
        if(Auth::guard('vendors')->check()) {
            $vendorId = Auth::guard('vendors')->id();
            $trashedItems = FoodItems::onlyTrashed()->where('vendor_id', $vendorId)->get();
            return view('vendor_dashboard', [
                'trashedItems' => $trashedItems,
                'activeTab' => 'trashedItems'
            ]);
        } else {
            return redirect()->route('vendor_login');
        }
    }

    public function restore($id) {
        $foodItem = FoodItems::onlyTrashed()->find($id);

        if ($foodItem) {
            $foodItem->restore();
            return redirect()->back()->with('success', 'Item restored successfully.');
        } else {
            return redirect()->back()->with('error', 'Item not found.');
        }
    }

    public function delete($id)
    {
        $foodItem = FoodItems::withTrashed()->find($id);
        if ($foodItem) {
            $foodItem->forceDelete();
            return redirect()->back()->with('success', "Item Permanently deleted");
        } else {
            return redirect()->back()->with('error', "Item not found");
        }
    }
}
