@extends('layout.user')
@section('title', 'Drafts | CII')
@section('main-container')

<!-- Right side starts -->

<div class="col-md-9 col-sm-12 ps-5 common-space">
    <h3 class="signup-h3 pb-5 text-center">Sell Drafts</h3>

    @if (\Session::has('success'))

    <!-- Modal starts-->
    <div class="container">
        <div class="modal fade" id="basicModal3" tabindex="-1" role="dialog" aria-labelledby="basicModal3" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content py-2">
                    <div class="modal-header position-absolute w-100 pt-2">
                        <img src="{{ url('assets/images/withdraw-icon.svg') }}" class="img-fluid" alt="withdraw">
                    </div>
                    <div class="modal-body mt-5">
                        <h4 class="sure-p1 pb-3 border-0 text-center pt-2">{{ \Session::get('success') }}</h4>
                        <p class="sure-p2 text-center form-p mb-0 pt-0">You can check your <a class="show d-inline" href="{{ route('view-draft-products') }}">sell draft</a> product on My Page.</p>
                    </div>
                    <div class="modal-footer border-0 d-flex flex-row flex-nowrap">
                        <a href="{{ route('view-product-details', ['id' => \Session::get('new_product_id'), 'product_name' => 'detail'] ) }}" class=" modal-button-1 signup-btn cancel-bg text-center w-50 ">Check Product</a>
                        <a href="{{ route('add-product') }}" class="nav-link signup-btn text-center w-50 border-0">Add New Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal ends --}}
    <script>
        setTimeout(function() {
            $("#basicModal3").modal('show');
        }, 1000);

        setTimeout(function() {
            $("#close-modal").on('click', function() {
                $("#basicModal3").modal('hide');
            })
        }, 1000);
    </script>
    @endif

    <div class="menu menu-1 pt-4">
        <ul class="navbar-nav scroll">
            <li class="nav-item">
                <a class="nav-link menu-blk" href="{{ route('view-purchased-products') }}">Currently on display</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk" href="{{ route('view-sold-products') }}">Sold items history</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active menu-blk" href="{{ route('view-draft-products') }}">Sell drafts</a>
            </li>
        </ul>
    </div>
    <hr />
    <!-- Product list component starts -->
    <div class="row py-4">
    @foreach ($products as $product)

    @if($product->status == 'draft')
    <div class="col-md-4 col-sm-12 mb-4 sp-mb">
        <div class="white-box">
            <a href="{{ route('view-product-details', [ 'product_name' => makeURL($product->name), 'id' => $product->id] ) }}">
                 @if($product->image != null)
                <img src="{{ url('storage/uploads/' . $product->games->image ) }}" class="img-fluid sell-product-image" alt="product" />
                 @else
                <img src="{{ url('assets/images/default-product.jpeg') }}" class="img-fluid sell-product-image" alt="product" />
                 @endif
                 <h3 class="menu-h3 pt-3">{{Str::upper($product->games->name)}} </h3>
                 <h3 class="menu-h3 text-capitalize">{{$product->product_type}}</h3>
                 <p class="price mb-0">Price</p>
                 <h6 class="price-num">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($product->price))}} M</h6>
            </a>
        </div>    
    </div>
    {{-- <div id="productlist">
        <a href="{{ route('view-product-details', [ 'product_name' => makeURL($product->name), 'id' => $product->id] ) }}">
            <div class="d-flex flex-row justify-content-between border-nav py-4">
                <div class="d-flex flex-row justify-content-around">
                    <div class="pe-4">
                        @if($product->image != null)
                        <img src="{{ url('storage/uploads/' . $product->games->image ) }}" class="img-fluid sell-product-image" alt="product" />
                        @else
                        <img src="{{ url('assets/images/default-product.jpeg') }}" class="img-fluid sell-product-image" alt="product" />
                        @endif
                    </div>
                    <div>
                        <div>
                            <p class="form-label mb-0">{{Str::upper($product->games->name)}} {{Str::upper($product->product_type)}}</p>
                            <p class="currency-p pb-0 mb-0">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($product->price))}} / M</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{ url('assets/images/right-arrow.png') }}" class="img-fluid" alt="arrow" />
                </div>
            </div>
        </a>

    </div> --}}
    @endif

    @endforeach
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