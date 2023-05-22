@extends('layout.user')
@section('title', 'Sold Products History | GLOBAL CARPATICA SL')
@section('main-container')



<!-- Right side starts -->

<div class="col-md-9 col-sm-12 ps-5 common-space padt-5">
    <h3 class="pb-5 signup-h3">Sold Items History</h3>

    <!-- Product list component starts -->
    <div id="productlist2">
        @if(count($transactions) == 0)
        <br><br>
        <h3 class="pt-5 signin-h3 text-center">There are no sales till date.</h3>
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
                <a href="{{ route('view-product-details', [ 'product_name' => makeURL($transaction->products->name), 'id' => $transaction->products->id] ) }}">
                                @if($transaction->products->image != null)
                                <img src="{{ url('storage/uploads/' . $transaction->games->image ) }}" class="img-fluid sell-product-image" alt="product" />
                                @else
                                <img src="{{ url('assets/images/default-product.jpeg') }}" class="img-fluid sell-product-image" alt="product" />
                                @endif
                                    <h3 class="menu-h3 pt-3">{{Str::upper($transaction->games->name)}} </h3>
                                    <h3 class="menu-h3 text-capitalize">{{$transaction->products->product_type}}</h3>
                                    <p class="price mb-0">Price</p>
                                    <h6 class="price-num">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($transaction->products->price))}} M</h6>
                                    <p class="pur-date pb-0 mb-0">{{$transaction->updated_at->format('Y/m/d H:i')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <div class="d-flex align-items-center">
                                        <p class="form-label mb-0">{{Str::upper($transaction->games->name)}} {{Str::upper($transaction->products->product_type)}}</p>
                                        @if($transaction->payment_status == 1)
                                        <span class="tag-green">Paid</span>
                                        @else
                                        <span class="tag-red">Pending</span>
                                        @endif
                                    </div>
                                    <p class="currency-p pb-0 mb-0">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($transaction->products->price))}} / M</p>
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
    </div>
        @endif
        <div class="d-flex justify-content-center">
            {{$transactions->links('partials.pagination')}}
        </div>
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