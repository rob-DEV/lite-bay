<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    //
    public function listItem(Request $request) {

        $this->validate($request, [
            'item_title' => 'required|min:5|max:30',
            'item_condition' => 'required|max:5',
            'item_price' => 'required|max:10',
            'item_details' => 'required|min:10|max:9999',
            'item_postage_service' => 'required|max:50',
            'item_postage_price' => 'required|max:10'
        ]);


        $user = Auth::user();

        $itemForSale = new Item();
        $uid = str_random(60);
        $itemForSale->uid = $uid;

        $itemForSale->title = $request['item_title'];

        //condition n - 0 u - 1
        $cond = 0;
        if($request['condition'] == "New")
            $cond = 0;
        elseif ($request['condition'] == "Used")
            $cond = 1;

        $itemForSale->condition = $cond;
        $itemForSale->details = $request['item_details'];
        $itemForSale->category = "Test";

        //$itemForSale->category = $request['item_title'];
        //$itemForSale->category = $request['item_title'];

        $itemForSale->price = $request['item_price'];
        $itemForSale->post_price = $request['item_postage_price'];
        $itemForSale->post_service = $request['item_postage_service'];

        $user->items_for_sale()->save($itemForSale);

        return response()->json(200);

    }
}
