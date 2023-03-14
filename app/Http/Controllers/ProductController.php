<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\FelisBankAccount;
use App\Models\Game;
use App\Models\InterestedItem;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function viewProducts($id, Request $request)
    {
        $game = Game::where('id', $id)->firstOrFail();
        $devices = Device::with(['games' => function ($q) use ($game) {
            $q->where('name', 'LIKE', '%' . $game->name . '%');
        }])->get();

        $products = Product::where('game_id', $id)->where('status', 'published');
        if (request()->has('min_price') && !empty(request()->get('min_price'))) {
            $minPrice = (float)str_replace(',', '', request()->get('min_price'));
            $products = $products->where('price', '>=', showConvertedPriceToUsd($minPrice));
        }
        if (request()->has('max_price') && !empty(request()->get('max_price'))) {
            $maxPrice = (float)str_replace(',', '', request()->get('max_price'));
            $products = $products->where('price', '<=', showConvertedPriceToUsd($maxPrice));
        }
        $products = $products->inRandomOrder()->paginate(10);
        $accounts = Product::where(['product_type' => 'account', 'game_id' => $id])->count();
        $currencies = Product::where(['product_type' => 'currency', 'game_id' => $id])->count();
        $items = Product::where(['product_type' => 'item', 'game_id' => $id])->count();

        // $products->load('user');

        $data = compact('products', 'game', 'devices', 'accounts', 'currencies', 'items');
        return view('products.viewProducts')->with($data);
    }

    public function viewProductsType($id, $type)
    {
        $game = Game::where('id', $id)->first();
        $products = Product::where(['product_type' => $type, 'game_id' => $id]);
        if (request()->has('min_price') && !empty(request()->get('min_price'))) {
            $minPrice = (float)str_replace(',', '', request()->get('min_price'));
            $products = $products->where('price', '>=', showConvertedPriceToUsd($minPrice));
        }
        if (request()->has('max_price') && !empty(request()->get('max_price'))) {
            $maxPrice = (float)str_replace(',', '', request()->get('max_price'));
            $products = $products->where('price', '<=', showConvertedPriceToUsd($maxPrice));
        }
        $products = $products->inRandomOrder()->paginate(10);
        $accounts = Product::where(['product_type' => 'account', 'game_id' => $id])->get()->count();
        $currencies = Product::where(['product_type' => 'currency', 'game_id' => $id])->get()->count();
        $items = Product::where(['product_type' => 'item', 'game_id' => $id])->get()->count();
        $devices = Device::with(['games' => function ($q) use ($game) {
            $q->where('name', $game->name);
        }])->get();

        // $products->load('user');

        $data = compact('products', 'game', 'devices', 'accounts', 'currencies', 'items');
        return view('products.viewProducts')->with($data);
    }

    public function viewProductsSearch($id, Request $request)
    {
        $game = Game::where('id', $id)->firstOrFail();
        $search = $request['search_product'];
        $devices = Device::with(['games' => function ($q) use ($game) {
            $q->where('name', 'LIKE', '%' . $game->name . '%');
        }])->get();
        if (request()->has('min')) {
            $products = Product::where('game_id', $id)->where('name', 'LIKE', '%' . $request['search_product'] . '%')
                ->orwhere('product_type', 'LIKE', '%' . $request['search_product'] . '%')
                ->orwhere('description', 'LIKE', '%' . $request['search_product'] . '%');
            if (request()->has('min_price') && !empty(request()->get('min_price'))) {
                $products = $products->where('price', '>=', showConvertedPriceToUsd(request()->get('min_price')));
            }
            if (request()->has('max_price') && !empty(request()->get('max_price'))) {
                $products = $products->where('price', '<=', showConvertedPriceToUsd(request()->get('max_price')));
            }
            $products = $products->orderBy('price')->paginate(10);
        } else {
            if ($request['search_product']) {
                $products = Product::where('game_id', $id)->where('name', 'LIKE', '%' . $request['search_product'] . '%')
                    ->orwhere('product_type', 'LIKE', '%' . $request['search_product'] . '%')
                    ->orwhere('description', 'LIKE', '%' . $request['search_product'] . '%')
                    ->paginate(10);
            } else {
                return redirect()->route('view-products', ['id' => $id]);
            }
        }
        $accounts = Product::where(['product_type' => 'account', 'game_id' => $id])->get()->count();
        $currencies = Product::where(['product_type' => 'currency', 'game_id' => $id])->get()->count();
        $items = Product::where(['product_type' => 'item', 'game_id' => $id])->get()->count();
        $products->load('user');

        $data = compact('products', 'game', 'devices', 'accounts', 'currencies', 'items');
        return view('products.viewProducts')->with($data);
    }

    public function viewProductDetails(Request $request)
    {
        $product = Product::where('id', $request['id'])->with('user', 'games')->first();
        $games = Game::where('id', $product->game_id)->with('devices')->first();
        $allProducts = Product::where('name', $product->name)->with('user')->paginate(6);
        $interestedItem = InterestedItem::where(['user_id' => Auth::id(), 'product_id' => $product->id])->first();
        $data = compact('product', 'allProducts', 'games', 'interestedItem');
        if (!Auth::user()) {
            Session::put('previous_route', $request->path());
        }
        return view('products.viewProductDetails')->with($data);
    }

    public function addProduct(Request $request)
    {
        if ($request->isMethod('get')) {
            $games = Game::with('devices')->get();
            $data = compact('games');
            return view('products.addProduct')->with($data);
        } else {
            $request->validate([
                'name' => 'required',
                'product_type' => 'required|not_in:Please Select',
                'game_id' => 'required',
                'price' => 'required',
                'stock_quantity' => 'required',
                'delivery_time' => 'required',
                'min_quantity' => 'required',
            ]);

            $product = new Product();
            $product->name = $request['name'];
            if (!empty($request->file('image'))) {
                $product_image = Carbon::now()->format('Y') . '/' . Carbon::now()->format('M') . '/' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('uploads', $product_image, 'public');

                $product->image = $product_image;
            } else {
                $product->image = null;
            }
            $product->product_type = $request['product_type'];

            $product->game_id = $request['game_id'];
            $product->price = showConvertedPriceToUsd($request['price']);
            $product->stock_quantity = $request['stock_quantity'];
            $product->description = $request['description'];
            $product->delivery_time = $request['delivery_time'];
            $product->min_quantity = $request['min_quantity'];
            $product->description = $request['description'];
            $product->user_id = Auth::id();
            $product->save();

            return redirect()->route('currently-on-display')->with(['success' => 'Product added successfully', 'new_product_id' => $product->id]);
        }
    }

    public function viewDraftProducts()
    {
        $products = Product::where('user_id', Auth::id())->with('games')->get();
        $data = compact('products');
        return view('products.viewDraftProducts')->with($data);
    }

    public function addProductDraft(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'product_type' => 'required|not_in:Please Select',
            'game_id' => 'required',
            'price' => 'required',
            'stock_quantity' => 'required',
            'delivery_time' => 'required',
            'min_quantity' => 'required',
        ]);

        $product = new Product();
        $product->name = $request['name'];
        if (!empty($request->file('image'))) {
            $product_image = Carbon::now()->format('Y') . '/' . Carbon::now()->format('M') . '/' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads', $product_image, 'public');

            $product->image = $product_image;
        } else {
            $product->image = null;
        }
        $product->status = 'draft';
        $product->product_type = $request['product_type'];
        $product->game_id = $request['game_id'];
        $product->price = $request['price'];
        $product->stock_quantity = $request['stock_quantity'];
        $product->description = $request['description'];
        $product->delivery_time = $request['delivery_time'];
        $product->min_quantity = $request['min_quantity'];
        $product->description = $request['description'];
        $product->user_id = Auth::id();
        $product->save();

        return redirect()->route('view-draft-products')->with(['success' => 'Product added successfully to draft', 'new_product_id' => $product->id]);
    }

    public function buyProduct(Request $request, $id)
    {
        $product = Product::where('id', $id)->with('games')->first();
        $buyer = User::where('id', Auth::id())->first();
        $seller = User::where('id', $product->user_id)->first();

        $selectedFelisBank = FelisBankAccount::where('default_product', $product->product_type)->first();
        if (!$selectedFelisBank) {
            $selectedFelisBank = FelisBankAccount::first();
        }

        if ($request['quantity'] <= $product->stock_quantity) {
            $transaction = new Transaction();
            $transaction->buyer_user_id = Auth::id();
            $transaction->product_id = $product->id;
            $transaction->game_id = $product->game_id;
            $transaction->seller_user_id = $product->user_id;
            $transaction->quantity = $request['quantity'];
            $transaction->amount = $product->price * $request['quantity'];
            $transaction->save();

            $product->stock_quantity = $product->stock_quantity - $request['quantity'];
            $product->save();

            // $buyer->balance = $buyer->balance - $product->price * $request['quantity'];
            // $buyer->save();

            $seller->balance = $seller->balance + $product->price * $request['quantity'];
            $seller->save();

            $base_currency = Auth::user()->base_currency;
            $amount = formatPrice(showConvertedPrice($transaction->amount));
            $unit_price = formatPrice(showConvertedPrice($product->price));
            $games = $product->games;
            $data = [
                "order_id" => "$transaction->id",
                "product_name" => "$product->name",
                "game_name" => "$games->name",
                "amount" => "$amount",
                "unit_price" => "$unit_price",
                "quantity" => "$transaction->quantity",
                "bank_name" => "$selectedFelisBank->bank_name",
                "japanese_bank_name" => "$selectedFelisBank->japanese_bank_name",
                "swift_code" => "$selectedFelisBank->swift_code",
                "branch_name" => "$selectedFelisBank->branch_name",
                "japanese_branch_name" => "$selectedFelisBank->japanese_branch_name",
                "account_type" => "$selectedFelisBank->account_type",
                "branch_code" => "$selectedFelisBank->branch_code",
                "account_number" => "$selectedFelisBank->account_number",
                "account_name" => "$selectedFelisBank->account_name",
                "japanese_account_name" => "$selectedFelisBank->japanese_account_name",
                "base_currency" => "$base_currency",
            ];

            $user['to'] = Auth::user()->email;
            Mail::send('products.purchaseConfirmationMail', $data, function ($messages) use ($user) {
                $messages->to($user['to']);
                $messages->subject('Purchase Confirmation Mail');
            });
        }

        return redirect()->route('buy-product-thanks');
    }


    public function buyProductConfirmation(Request $request, $id)
    {
        $felisBankAccounts = FelisBankAccount::get();
        if ($request['felis_bank']) {
            $selectedFelisBank = FelisBankAccount::where('id', $request['felis_bank'])->first();
        } else {
            $selectedFelisBank = FelisBankAccount::first();
        }
        $base_currency_unit_price = convertCurrency();
        $product = Product::where('id', $id)->with('games', 'user')->first();
        if ($product->product_type == 'account') {
            $price = $product->price * $base_currency_unit_price;
        } else {
            if ($request['quantity'] <= $product->stock_quantity && $request['quantity'] >= $product->min_quantity) {
                $price = ($product->price * $base_currency_unit_price) * $request['quantity'];
            } else {
                if ($request['quantity'] > $product->stock_quantity) {
                    return redirect()->back()->withErrors(['error' => 'Asked quantity is not available.']);
                } elseif ($request['quantity'] < $product->min_quantity) {
                    return redirect()->back()->withErrors(['error' => 'Please enter atleast the minimum quantity.']);
                }
            }
        }
        $data = compact('product', 'price', 'base_currency_unit_price', 'felisBankAccounts', 'selectedFelisBank');
        return view('products.buyProductConfirmation')->with($data);
    }

    public function buyProductThanks()
    {
        return view('products.purchaseThanks');
    }

    public function viewPurchasedProducts()
    {
        $transactions = Transaction::where('buyer_user_id', Auth::id())->with('products', 'games')->paginate(10);
        $data = compact('transactions');
        return view('products.viewPurchasedProducts')->with($data);
    }

    public function viewPurchasedProductDetails($id)
    {
        $transaction = Transaction::where('id', $id)->with('products', 'games', 'seller')->first();
        $data = compact('transaction');
        return view('products.viewPurchasedProductsDetails')->with($data);
    }

    public function currentlyOnDisplay()
    {
        $products = Product::where('user_id', Auth::id())->with('games')->orderBy('updated_at', 'desc')->paginate(10);
        // $products->load('games');
        $data = compact('products');
        return view('products.currentlyOnDisplay')->with($data);
    }

    public function editProduct($id, Request $request)
    {
        if ($request->isMethod('get')) {
            $product = Product::where('id', $id)->with('games')->first();
            $games = Game::get();
            $data = compact('product', 'games');
            return view('products.addProduct')->with($data);
        } else {
            $request->validate([
                'name' => 'required',
                'product_type' => 'required|not_in:Please Select',
                'game_id' => 'required',
                'price' => 'required',
                'stock_quantity' => 'required',
                'delivery_time' => 'required',
                'min_quantity' => 'required',
            ]);

            $product = Product::where('id', $id)->with('games')->first();
            $product->name = $request['name'];
            if (!empty($request->file('image'))) {
                $product_image = Carbon::now()->format('Y') . '/' . Carbon::now()->format('M') . '/' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('uploads', $product_image, 'public');

                $product->image = $product_image;
            } else {
                $product->image = null;
            }
            $product->status = 'published';
            $product->product_type = $request['product_type'];
            $product->game_id = $request['game_id'];
            $product->price = showConvertedPriceToUsd($request['price']);
            $product->stock_quantity = $request['stock_quantity'];
            $product->description = $request['description'];
            $product->delivery_time = $request['delivery_time'];
            $product->min_quantity = $request['min_quantity'];
            $product->description = $request['description'];
            $product->user_id = Auth::id();
            $product->save();

            return redirect()->route('currently-on-display')->with(['success' => 'Product updated successfully', 'new_product_id' => $product->id]);
        }
    }

    public function updateProductStatus($id)
    {
        $product = Product::where('id', $id)->first();
        if ($product->status == 'published') {
            $product->status = 'draft';
            $product->save();

            return redirect()->route('view-draft-products')->with(['success' => 'Product updated successfully.', 'new_product_id' => $id]);
        } else {
            $product->status = 'published';
            $product->save();

            return redirect()->route('currently-on-display')->with(['success' => 'Product updated successfully.', 'new_product_id' => $id]);
        }
    }

    public function viewSoldProducts()
    {
        $transactions = Transaction::where('seller_user_id', Auth::id())->with('products', 'games')->paginate(10);
        $data = compact('transactions');
        return view('products.viewSoldProducts')->with($data);
    }

    public function salesAndDeposits()
    {
        $transactions = Transaction::where('seller_user_id', Auth::id())->with('products', 'games')->paginate(10);
        $data = compact('transactions');
        return view('products.salesAndDeposits')->with($data);
    }

    public function viewRatingPage(Request $request)
    {
        if ($request->isMethod('get')) {
            $transaction = Transaction::where('id', $request->get('transaction'))->with('games', 'products', 'seller')->first();
            $data = compact('transaction');
            return view('rating.rating')->with($data);
        } else {
            $transaction = Transaction::where('id', $request['transaction_id'])->with('seller')->first();
            $transaction->deal_rating = $request['rating_count'];
            $transaction->save();
            $user = User::where('id', $transaction->seller->id)->first();
            if ($user) {
                if ($user->total_ratings == 0) {
                    $user->user_rating = ($user->user_rating + $request['rating_count']);
                } else {
                    $user->user_rating = ($user->user_rating + $request['rating_count']) / 2;
                }
                $user->total_ratings = $user->total_ratings + 1;
                $user->save();
            }
            return redirect()->route('dashboard');
        }
    }
}
