@extends('layout.user')
@section('title', 'Sales and Deposits | CII')
@section('main-container')

<!-- Right side starts -->
<div class="col-md-9 col-sm-12 ps-5 request-pad padt-5">
    <h3 class="pb-5 signup-h3">Sales And Deposit</h3>

    <div class=" align-items-start justify-content-start d-flex flex-column">

        <div class="sales-box mt-5 text-center">
            <div class="d-flex justify-content-center align-items-start mb-2">
                <img src="{{ url('assets/images/transfer-icon.svg') }}" class="img-fluid w-transfer" alt="transfer-icon">
                <div class="d-flex flex-column justify-content-center align-items-start ms-5">
                    <p class="finish">Balance</p>
                    <p class="dollar-p mt-1">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice(Auth::user()->balance))}}</p>
                    <a class="nav-link view-2 w-100 text-capitalize mt-3" href="{{ route('withdrawal-request') }}">Withdraw request</a>
                </div>
            </div>    
        </div>
    </div>

    <!-- Product list component starts -->
    @if(count($transactions) == 0)
    <br><br>
    <h3 class="pb-5 border-0 signin-h3">There are no sales till date.</h3>
    @else
    <div class="row py-4">
    @foreach($transactions as $transaction)
    <div class="col-md-4 col-sm-12 sp-mb mb-4">
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