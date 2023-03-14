@extends('layout.user')
@section('title', 'Sales and Deposits | CII')
@section('main-container')

<!-- Right side starts -->
<div class="col-md-9 col-sm-12 ps-5 common-space">
    <h3 class="pb-5 signup-h3 text-center">Money Management</h3>

    <div class="menu menu-1 pt-4">
        <ul class="navbar-nav scroll">
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('sales-and-deposits') ? 'active' : '' }}" href="{{ route('sales-and-deposits') }}">Sales and deposit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('withdrawal-request') ? 'active' : '' }}" href="{{ route('withdrawal-request') }}">Transfer request</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('withdrawal-request-history') ? 'active' : '' }}" href="{{ route('withdrawal-request-history') }}">Request history</a>
            </li>
        </ul>
    </div>
    <hr />

    <div class=" align-items-center justify-content-center d-flex flex-column">

        <div class="sales-box mt-5 text-center">
            <div class="d-flex justify-content-center align-items-start mb-2">
                <img src="{{ url('assets/images/bal-icon.svg') }}" class="img-fluid" alt="balance-icon">
                <div class="d-flex flex-column justify-content-center align-items-start ms-3">
                    <p class="finish">Balance</p>
                    <p class="dollar-p mt-1">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice(Auth::user()->balance))}}</p>
                </div>
            </div>    

            <a class="nav-link view-2 w-100 text-capitalize" href="{{ route('withdrawal-request') }}">Withdraw request</a>
        </div>
    </div>

    <!-- Product list component starts -->
    @if(count($transactions) == 0)
    <br><br>
    <h3 class="pb-5 border-0">There are no sales till date.</h3>
    @else
    <div class="row py-4">
    @foreach($transactions as $transaction)
    <div class="col-md-4 col-sm-12 sp-mb">
        <div class="white-box">
            <a href="{{ route('view-product-details', [ 'product_name' => makeURL($transaction->products->name), 'id' => $transaction->products->id] ) }}">
                            @if($transaction->products->image != null)
                            <img src="{{ url('storage/uploads/' . $transaction->games->image ) }}" class="img-fluid sell-product-image" alt="product" />
                            @else
                            <img src="{{ url('assets/images/default-product.jpeg') }}" class="img-fluid sell-product-image" alt="product" />
                            @endif
                            <h3 class="menu-h3 pt-3">{{Str::upper($transaction->games->name)}}</h3>
                            <h3 class="menu-h3 text-capitalize">{{$transaction->products->product_type}}</h3>
                            <p class="price mb-0">Price</p>
                            <h6 class="price-num">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($transaction->products->price))}} M</h6>
                            <p class="pur-date pb-0 mb-0">{{$transaction->updated_at->format('Y/m/d H:i')}}</p>

            </a>
        </div>
    </div>

    {{-- <div id="productlist2">
        <div id="productlist">
            <a href="{{ route('view-product-details', [ 'product_name' => makeURL($transaction->products->name), 'id' => $transaction->products->id] ) }}">
                <div class="d-flex flex-row justify-content-between border-nav py-4">
                    <div class="d-flex flex-row justify-content-around">
                        <div class="pe-4">
                            @if($transaction->products->image != null)
                            <img src="{{ url('storage/uploads/' . $transaction->games->image ) }}" class="img-fluid sell-product-image" alt="product" />
                            @else
                            <img src="{{ url('assets/images/default-product.jpeg') }}" class="img-fluid sell-product-image" alt="product" />
                            @endif
                        </div>
                        <div>
                            <div>
                                <p class="form-label mb-0">{{Str::upper($transaction->games->name)}} {{Str::upper($transaction->products->product_type)}}</p>
                                <p class="currency-p pb-0 mb-0">{{showCurrencySymbol()}}{{formatPrice(showConvertedPrice($transaction->products->price))}} / M</p>
                                <!-- <p class="product-date pb-0 mb-0">2021/05/10 16:57</p> -->
                                <p class="product-date pb-0 mb-0">{{$transaction->updated_at->format('Y/m/d H:i')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ url('assets/images/right-arrow.png') }}" class="img-fluid" alt="games" />
                    </div>
                </div>
            </a>
        </div>
    </div> --}}
    @endforeach
    @endif
    <!-- Product list component ends -->
    <div class="d-flex justify-content-center">
        {{$transactions->links('partials.pagination')}}
    </div>
</div>
<!-- Right side ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection