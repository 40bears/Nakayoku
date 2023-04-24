@extends('layout.main')
@section('title', $game->name . ' | CII')
@section('main-container')

<!-- Blue section starts -->
<div class="container-fluid px-0 bg-lgreen">
    <div class="container padt-6">
        {{-- <ul class="breadcrumb menu menu1">
            <li class="breadcrumb-item"><a href="/">TOP</a></li>
            <li class="breadcrumb-item"><a href="{{ route('all-games') }}">ALL GAMES</a></li>
            <li class="breadcrumb-item"><a href="{{ route('view-products', [ 'id' => $game->id ] ) }}">{{Str::upper($game->name)}}</a></li>
        </ul> --}}
        <h2 class="games-head text-center py-5">{{$game->name}}</h2>
        {{-- <p class="detail-p text-center">({{Str::upper($game->devices->name)}})</p> --}}
    </div>
    <!-- Inner menu starts -->
    {{-- <div class="container menu menu-1">
        <ul class="navbar-nav border-nav">
            <li class="nav-item {{str_contains(url()->current(), 'account') ? 'active' : ''}}">
                <a class="nav-link txt-blk" href="{{ route('view-products-type', [ 'id' => $game->id , 'type' =>  'account'] ) }}">ACCOUNT <br />
                    <span>({{$accounts}})</span></a>
            </li>
            <li class="nav-item {{str_contains(url()->current(), 'currency') ? 'active' : ''}}">
                <a class="nav-link txt-blk" href="{{ route('view-products-type', [ 'id' => $game->id , 'type' =>  'currency'] ) }}">CURRENCY<br />
                    <span>({{$currencies}})</span></a>
            </li>
            <li class="nav-item {{str_contains(url()->current(), 'item') ? 'active' : ''}}">
                <a class="nav-link txt-blk" href="{{ route('view-products-type', [ 'id' => $game->id , 'type' =>  'item'] ) }}">ITEMS <br />
                    <span>({{$items}})</span></a>
            </li>
        </ul>
    </div> --}}
    <!-- Inner menu ends -->

    <!-- All games starts -->
    <div class="container py-5">
        <div class="row">

        <!-- Price filter starts -->
        <div class="col-md-12 col-sm-12">
        <div class="product-details-filters-div f-column">

            <!-- Checkbox starts -->
            <div class="d-flex justify-content-center align-items-center">
                <ul class="ps-0 left-menu d-flex justify-content-center align-items-center mb-0">
                    <div class="carousal-nav mx-1 row tab" >
                        <a href="{{ route('view-products', [ 'id' => $game->id ]) }}" class="d-flex justify-content-center align-items-center col tablinks {{ Route::is('view-products') ? 'isActive' : '' }}" id="defaultOpen">
                                Show all
                        </a>
                        <a href="{{ route('view-products-type', [ 'id' => $game->id , 'type' =>  'item'] ) }}" class="d-flex justify-content-evenly align-items-center col tablinks {{ str_contains(url()->current(), 'item') ? 'isActive' : '' }}" id="tablinks">
                            <img src="{{ url('assets/images/TopPageImages/itemsIcon.svg') }}" alt="items" loading="lazy">
                            Items
                        </a>
                        <!-- </button> -->
                        <a href="{{ route('view-products-type', [ 'id' => $game->id , 'type' =>  'account'] ) }}" class="d-flex justify-content-evenly align-items-center col tablinks {{ str_contains(url()->current(), 'account') ? 'isActive' : '' }}" id="tablinks">
                            <img src="{{ url('assets/images/TopPageImages/accountIcon.svg') }}" alt="account" loading="lazy">
                            Account
                        </a>
                        <a href="{{ route('view-products-type', [ 'id' => $game->id , 'type' =>  'currency'] ) }}" class="d-flex justify-content-evenly align-items-center col tablinks {{ str_contains(url()->current(), 'currency') ? 'isActive' : '' }}" id="tablinks">
                            <img src="{{ url('assets/images/TopPageImages/currencyIcon.svg') }}" alt="currency" loading="lazy">
                            Currency
                        </a>
                    </div>
                </ul>
            </div>    
             <!-- Checkbox ends -->

            <div class="p-right d-flex flex-column flex-md-row pt-4 pt-lg-0 filters-right-section">
                <form action="{{ route('view-products-search', [ 'id' => $game->id ] ) }}">

                    <div class="search-div w-100">
                        <input type="text" class="searchTerm" name="search_product" placeholder="GRAND THEFT AUTO V" value="{{ request()->get('search_product')  }}" />
                        <button type="submit" class="searchButton">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
                <form action="" class="time-dropdown product-details-filter w-50 ">
                    <select class="dropdown minimal select-platform change_platform w-100 pt-0" id="exampleFormControlSelect1" name="change_platform">
                        <option>Change Platform</option>
                        @foreach($devices as $device)
                        @if(count($device->games) != 0)
                        @foreach($device->games as $game)
                        <option value="{{$game->id}}">{{Str::upper($device->name)}}</option>
                        @endforeach
                        @endif
                        @endforeach
                    </select>
                </form>

                {{-- <div class="d-flex"> --}}
                    {{-- <a class="w-100 go" id="search-filter-btn">GO</a> --}}
                    <!-- <a href="" class="d-flex justify-content-center align-items-center col tablinks isActive" id="defaultOpen">GO</a> -->
                {{-- </div> --}}
            </div>
            
        </div>
        <!-- Price filter ends -->

        </div>

        <div class="col-md-12 col-sm-12 common-space pt-0">
            <div class="d-flex pb-2">
                @if(!empty(request()->get('min_price')))
                <div class="properties d-flex justify-content-around align-items-center me-4 min-filter">
                    <p class="range-p mb-0">MIN {{formatPrice(request()->get('min_price'))}}</p>
                    <a href="{{ route('view-products', [ 'id' => $game->id, 'min_price' => '', 'max_price' => request()->get('max_price') ] ) }}" class="properties-p">&#9587;</a>
                </div>
                @endif
    
                @if(!empty(request()->get('max_price')))
                <div class="properties d-flex justify-content-around align-items-center me-4 max-filter">
                    <p class="range-p mb-0">MAX {{formatPrice(request()->get('max_price'))}}</p>
                    <a href="{{ route('view-products', [ 'id' => $game->id, 'min_price' => request()->get('min_price') , 'max_price' => '' ] ) }}" class="properties-p">&#9587;</a>
                </div>
                @endif
    
                @if(!empty(request()->get('min_price')) || !empty(request()->get('max_price')))
                <div class="d-flex justify-content-around align-items-center ms-2">
                    <a href="{{ route('view-products', ['id' => $game->id] ) }}" class="text-decoration-underline text-white">
                        <p class="sure-p2 text-capitalize mb-0">Clear all</p>
                    </a>
                    {{-- <p class="properties-p ms-2 mb-0">&#9587;</p> --}}
                    <i class="fa-solid fa-circle-xmark ms-2"></i>
    
                </div>
                @endif
            </div>
            @if(!empty(request()->get('min_price')) || !empty(request()->get('max_price')))
            <hr class="drop-hr">
            @endif
        <!-- Product listing starts -->
        @if(count($products) === 0)

        <div class="text-center border-tb py-5">
            <h3 class="border-0">No items found.</h3><br>
            <p class="detail-p"> Please change the filters or item type.</p>
        </div>

        @else
        <div class="row py-4">
        @foreach ($products as $product)
        @if($product->product_type === 'account')
        <div class="col-md-3 col-sm-12 sp-mb mb-4">
            <div class="white-box">
                <a href="{{ route('view-product-details', [ 'product_name' => makeURL($product->name), 'id' => $product->id] ) }}">
                            @if($game->image != null)
                            <img src="{{ url('storage/uploads/' . $game->image ) }}" class="img-fluid sell-product-image" alt="product" />
                            @else
                            <img src="{{ url('assets/images/default-product.jpeg') }}" class="img-fluid sell-product-image" alt="product" />
                            @endif
                            @if(empty($product->description))
                            <p class="detail-p display">{{Str::limit($product->name, 80, $end='.......')}}</p>
                            <p class="detail-p d-md-none d-sm-block">{{Str::limit($product->name, 25, $end='.......')}}</p>
                            @else
                            <p class="detail-p display">{{Str::limit($product->description, 80, $end='.......')}}</p>
                            <p class="detail-p d-md-none d-sm-block">{{Str::limit($product->description, 25, $end='.......')}}</p>
                            @endif
                            <div class="d-flex justify-content-around">
                                <div>
                                    <p class="detail-head">Instock</p>
                                    <p class="detail-para">{{$product->stock_quantity}} M</p>
                                </div>
                                <div>
                                    <p class="detail-head">Min qty.</p>
                                    <p class="detail-para">{{$product->min_quantity ? $product->min_quantity . 'M' : '--'}}</p>
                                </div>
                                <div>
                                    <p class="detail-head">Delivery time</p>
                                    <p class="detail-para">{{$product->delivery_time ? $product->delivery_time . ' min' : '--'}}</p>
                                </div>
                            </div>
                        <p class="price mb-0">Price</p>
                        <p class="price-num mb-0">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($product->price))}}</p>
                </a>
            </div>
        </div>
        @elseif($product->product_type === 'currency')
        <div class="col-md-3 col-sm-12 sp-mb mb-4">
            <div class="white-box">
                <a href="{{ route('view-product-details', [ 'product_name' => makeURL($product->name), 'id' => $product->id] ) }}">
                    @if($product->image != null)
                    <img src="{{ url('storage/uploads/' . $product->image ) }}" class="img-fluid sell-product-image mb-2" alt="user_profile_picture" />
                    @else
                    <img src="{{ url('storage/uploads/' . $game->image )  }}" class="img-fluid sell-product-image mb-2" alt="user_profile_picture" />
                    @endif
                    <div class="d-flex justify-content-start">
                        <div class="currency-profile-pic">
                            @if($product->user->profile_picture != null)
                            <img src="{{ url('storage/uploads/' . $product->user->profile_picture ) }}" class="img-fluid profile-image-w" alt="games" />
                            @else
                            <img src="{{ url('assets/images/default-profile-picture.png') }}" class="img-fluid profile-image" alt="games" />
                            @endif
                        </div>
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <div class="d-flex justify-content-start">
                                <form>
                                    <button formaction="{{ route('profile-page', ['id' => $product->user->id]) }}" class="detail-para currency-profile-page-button"> {{$product->user->first_name}}</button>
                                </form>
                                <img src="{{ url('assets/images/r-icon.svg') }}" class="img-fluid" alt="games" />
                            </div>
                            <div class="d-flex justify-content-between pt-1 align-items-center">
                                <span class="detail-p text-dark">{{showUserRatingPercentage($product->user->id)}}% ({{$product->user->total_ratings}})</span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-2">
                        <div>
                            <p class="detail-head">Instock</p>
                            <p class="detail-para">{{$product->stock_quantity}} M</p>
                        </div>
                        <div>
                            <p class="detail-head">Min qty.</p>
                            <p class="detail-para">{{$product->min_quantity ? $product->min_quantity . 'M' : '--'}}</p>
                        </div>
                        <div>
                            <p class="detail-head">Delivery time</p>
                            <p class="detail-para">{{$product->delivery_time ? $product->delivery_time . ' min' : '--'}}</p>
                        </div>
                    </div>
                    <p class="price mb-0">Price</p>
                    <p class="price-num mb-0"><span>{{showCurrencySymbol()}}</span> {{formatPrice(showConvertedPrice($product->price))}} / M</p>
                </a>
            </div>
        </div>
        @else
        <div class="col-md-3 col-sm-12 sp-mb mb-4">
            <div class="white-box">
                <a href="{{ route('view-product-details', [ 'product_name' => makeURL($product->name), 'id' => $product->id] ) }}">
                            @if($game->image != null)
                            <img src="{{ url('storage/uploads/' . $game->image ) }}" class="img-fluid sell-product-image" alt="product" />
                            @else
                            <img src="{{ url('assets/images/default-product.jpeg') }}" class="img-fluid sell-product-image" alt="product" />
                            @endif
                            @if(empty($product->description))
                            <p class="detail-p display pt-2">{{Str::limit($product->name, 80, $end='.......')}}</p>
                            <p class="detail-p d-md-none d-sm-block pt-2">{{Str::limit($product->name, 25, $end='.......')}}</p>
                            @else
                            <p class="detail-p display pt-2">{{Str::limit($product->description, 80, $end='.......')}}</p>
                            <p class="detail-p d-md-none d-sm-block pt-2">{{Str::limit($product->description, 25, $end='.......')}}</p>
                            @endif

                        <div class="d-flex justify-content-around">
                            <div>
                                <p class="detail-head">Instock</p>
                                <p class="detail-para">{{$product->stock_quantity}} M</p>
                            </div>
                            <div>
                                <p class="detail-head">Min qty.</p>
                                <p class="detail-para">{{$product->min_quantity ? $product->min_quantity . 'M' : '--'}}</p>
                            </div>
                            <div>
                                <p class="detail-head">Delivery time</p>
                                <p class="detail-para">{{$product->delivery_time ? $product->delivery_time . ' min' : '--'}}</p>
                            </div>
                        </div>
                        <p class="price mb-0">Price</p>
                        <p class="price-num mb-0"><span>{{showCurrencySymbol()}} </span>{{formatPrice(showConvertedPrice($product->price))}} <span class="unit">/ Unit</span></p>
                </a>
            </div>
        </div>
        @endif
        @endforeach
        </div>
        <!-- Product listing ends -->
        <div class="d-flex justify-content-center">
            {{$products->appends(request()->query())->links('partials.pagination')}}
        </div>
        @endif

    </div>
        </div>
    </div>
    <!-- All games ends -->

</div>
<!-- Blue section ends -->

@endsection