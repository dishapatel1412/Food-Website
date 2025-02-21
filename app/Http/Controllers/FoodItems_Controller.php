<?php

namespace App\Http\Controllers;

use App\Models\FoodItemsModel;
use Illuminate\Http\Request;

class FoodItems_Controller extends Controller
{
    public function add_items(Request $request) {
        $request->validate(
            [
                'imageUpload' => 'required',
                'food-name' => 'required',
                'food-price' => 'required'
            ]
        );

        if ($request->hasFile('imageUpload')) {
            $imagePath = $request->file('imageUpload')->store('food_images', 'public');
        } else {
            $imagePath = null;
        }

        $fooditem = new FoodItemsModel();
        $fooditem->image_path = $imagePath;
        $fooditem->name = $request['food-name'];
        $fooditem->price = $request['food-price'];

        $fooditem->save();
        return redirect('/my-profile');
    }

    public function display_items() {
        $fooditems = \App\Models\FoodItemsModel::all();
        return view('vendor',['data'=>$fooditems]);
    }
}
