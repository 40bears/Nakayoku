@extends('layout.user')
@section('title', 'Interested Products | GLOBAL CARPATICA SL')
@section('main-container')

<!-- Right side starts -->

<div class="col-md-9 col-sm-12 ps-5 common-space padt-5">
    <h3 class="pb-5 signup-h3">Interested Items</h3>

    <!-- Product list component starts -->
    <div class="row py-4">
    @if($user->interestedProducts->count() > 0)
    @foreach($user->interestedProducts as $products)
    <div class="col-lg-4 col-md-6 col-sm-12 sp-mb">
        <div class="white-box">
            <a href="{{ route('view-product-details', [ 'product_name' => makeURL($products->name), 'id' => $products->id] ) }}">
                            @if($products->image != null)
                            <img src="{{ url('storage/uploads/' . $products->image ) }}" class="img-fluid sell-product-image" alt="product" />
                            @else
                            <img src="{{ url('assets/images/default-product.jpeg') }}" class="img-fluid sell-product-image" alt="product" />
                            @endif
                            <h3 class="menu-h3 pt-3">{{Str::upper($products->games->name)}} </h3>
                            <h3 class="menu-h3 text-capitalize">{{$products->product_type}}</h3>
                            <p class="price mb-0">Price</p>
                            <h6 class="price-num">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($products->price))}}</h6>
                            <p class="pur-date pb-0 mb-0">{{$products->updated_at->format('Y/m/d H:i')}}</p>
            </a>
        </div>
    </div>
    @endforeach
    @else
    <br><br>
    <h3 class="pt-5 text-light text-center">There are no items in the wishlist.</h3>
    @endif
    </div>
    <!-- Product list component ends -->
</div>
<!-- Right side ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection