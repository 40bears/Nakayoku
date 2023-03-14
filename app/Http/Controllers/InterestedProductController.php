<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class InterestedProductController extends Controller
{
    public function addInterestedProducts($id)
    {
        $user = User::where('id', Auth::id())->first();
        $product = Product::where('id', $id)->first();
        $user->interestedProducts()->syncWithoutDetaching($product->id);
        $user->load('interestedProducts');
        return redirect()->back();
    }

    public function deleteInterestedProducts($id)
    {
        $user = User::where('id', Auth::id())->first();
        $product = Product::where('id', $id)->first();
        $user->interestedProducts()->toggle($product->id);
        return redirect()->back();
    }

    public function viewInterestedProducts()
    {
        $user = User::where('id', Auth::id())->with('interestedProducts')->first();
        $data = compact('user');
        return view('interestedProducts.interested_products')->with($data);
    }
}
