@extends('layout.user')
@section('title', 'Purchase History | GLOBAL CARPATICA SL')
@section('main-container')

<!-- Right side starts -->

<div class="col-md-9 col-sm-12 ps-5 common-space">
    <div class="container padt-5">
    <h3 class="pb-5 signup-h3">Purchased Items</h3>

    <!-- Product list component starts -->
    @if(count($transactions) == 0 )
    <br><br>
    <h3 class="pb-5 border-0 signin-h3 text-center">There are no purchases till date.</h3>
    @else
    <div class="row py-4">
    @foreach($transactions as $transaction)
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4 sp-mb">
        <div class="white-box">
            @if($transaction->payment_status == 1)
            <span class="tag-green">Paid</span>
            @else
            <span class="tag-red">Pending</span>
            @endif
        <a href="{{ route('view-purchased-products-details', [  'id' => $transaction->id] ) }}">
                        @if($transaction->products->image != null)
                        <img src="{{ url('storage/uploads/' . $transaction->games->image ) }}" class="img-fluid sell-product-image" alt="product" />
                        @else
                        <img src="{{ url('assets/images/default-product.jpeg') }}" class="img-fluid sell-product-image" alt="product" />
                        @endif
                        <h3 class="menu-h3 pt-3">{{Str::upper($transaction->games->name)}} </h3>
                        <h3 class="menu-h3 text-capitalize">{{$transaction->products->product_type}}</h3>
                        <p class="price mb-0">Price</p>
                        <h6 class="price-num">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($transaction->products->price))}}</h6>
                        <p class="pur-date pb-0 mb-0">{{$transaction->updated_at->format('Y/m/d H:i')}}</p>
        </a>
    </div>
    </div>
    @endforeach
    </div>
    @endif
    <!-- Product list component ends -->
    <div class="d-flex justify-content-center">
        {{$transactions->links('partials.pagination')}}
    </div>
    </div>
</div>
<!-- Right side ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection