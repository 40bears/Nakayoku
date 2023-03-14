<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function viewProfilePage($id)
    {
        $user = User::where('id', $id)->first();
        $accounts = Product::where(['product_type' => 'account', 'user_id' => $id])->count();
        $currencies = Product::where(['product_type' => 'currency', 'user_id' => $id])->count();
        $items = Product::where(['product_type' => 'item', 'user_id' => $id])->count();
        if (request()->has('more')) {
            $products = Product::where('user_id', $id)->get();
        } else {
            $products = Product::where('user_id', $id)->paginate(8);
        }
        $data = compact('user', 'products', 'accounts', 'currencies', 'items');
        return view('user.profilePage')->with($data);
    }

    public function viewProfilePageProductTypes($id, $type)
    {
        $user = User::where('id', $id)->first();
        $accounts = Product::where(['product_type' => 'account', 'user_id' => $id])->count();
        $currencies = Product::where(['product_type' => 'currency', 'user_id' => $id])->count();
        $items = Product::where(['product_type' => 'item', 'user_id' => $id])->count();
        if (request()->has('more')) {
            $products = Product::where(['product_type' => $type, 'user_id' => $id])->get();
        } else {
            $products = Product::where(['product_type' => $type, 'user_id' => $id])->paginate(8);
        }
        $data = compact('user', 'products', 'accounts', 'currencies', 'items');
        return view('user.profilePage')->with($data);
    }

    public function viewProfilePageSearchProducts($id, Request $request)
    {
        $user = User::where('id', $id)->first();
        $accounts = Product::where(['product_type' => 'account', 'user_id' => $id])->count();
        $currencies = Product::where(['product_type' => 'currency', 'user_id' => $id])->count();
        $items = Product::where(['product_type' => 'item', 'user_id' => $id])->count();
        if ($request['search'] != null) {
            $products = Product::where('user_id', $id)->where('name', 'LIKE', '%' . $request['search'] . '%')->get();
            $data = compact('user', 'products', 'accounts', 'currencies', 'items');
            return view('user.profilePage')->with($data);
        } else {
            return redirect()->route('profile-page', ['id' => $id]);
        }
    }
}
