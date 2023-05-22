@extends('layout.user')
@section('title', 'Currently on Display | GLOBAL CARPATICA SL')
@section('main-container')

<!-- Right side starts -->

<div class="col-md-9 col-sm-12 ps-5 common-space padt-5">
    <h3 class="signup-h3 pb-5">Currently On Display</h3>

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
                        <p class="sure-p2 text-center form-p mb-0 pt-0">You can check your <a class="show d-inline sure-p2" href="{{ route('currently-on-display') }}">currently on display</a> product on My Page.</p>
                    </div>
                    <div class="modal-footer border-0 d-flex flex-row flex-nowrap">
                        <a href="{{ route('view-product-details', ['id' => \Session::get('new_product_id'), 'product_name' => 'detail'] ) }}" class=" modal-button-1 view text-center w-50 ">Check Product</a>
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

    <!-- Product list component starts -->
    @if(count($products) == 0)
    <br><br>
    <h3 class="pb-5 signin-h3 text-center">There are no products displayed.</h3>
    @else

     <div class="row py-4">
    @foreach($products as $product)
    @if($product->status == 'published')

            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 sp-mb">
                <div class="white-box">
                    <a href="{{ route('view-product-details', [ 'product_name' => makeURL($product->name), 'id' => $product->id] ) }}">
                         @if($product->image != null)
                         <img src="{{ !Storage::exists('public/uploads/' . $product->image) ? url('storage/uploads/' . $product->games->image) : url('storage/uploads/' . $product->image ) }}" class="img-fluid sell-product-image" alt="product" />
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
    @endif
    <!-- Product list component ends -->
    <div class="d-flex justify-content-center">
        {{$products->links('partials.pagination')}}
    </div>
</div>
<!-- Right side ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection