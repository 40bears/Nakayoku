@extends('layout.main')
@section('title', $game->name . ' | CII')
@section('main-container')

<!-- Blue section starts -->
<div class="container-fluid px-0 bg-lgreen">
    <div class="container padt-6">
        <ul class="breadcrumb menu menu1">
            <li class="breadcrumb-item"><a href="/">TOP</a></li>
            <li class="breadcrumb-item"><a href="{{ route('all-games') }}">ALL GAMES</a></li>
            <li class="breadcrumb-item"><a href="{{ route('view-products', [ 'id' => $game->id ] ) }}">{{Str::upper($game->name)}}</a></li>
        </ul>
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
        <div class="col-md-3 col-sm-12">
        <div class="d-flex flex-column pb-5 justify-content-start f-column">

            <!-- Checkbox starts -->
            <div>
                <p class="keyword-p">ALL</p>
                <ul class="ps-0 left-menu">
                    <a href="{{ route('view-products-type', [ 'id' => $game->id , 'type' =>  'account'] ) }}">
                        <li class="border-nav border-t ps-3 py-2 {{str_contains(url()->current(), 'account') ? 'current-page' : ''}}">
                            <div class="d-flex justify-content-between"> 
                               ACCOUNT  <span>({{$accounts}})</span>
                            </div>
                        </li>
                    </a>
                    <a href="{{ route('view-products-type', [ 'id' => $game->id , 'type' =>  'currency'] ) }}">
                        <li class="border-nav ps-3 py-2 {{str_contains(url()->current(), 'currency') ? 'current-page' : ''}}">
                            <div class="d-flex justify-content-between"> 
                                CURRENCY  <span class="ps-2">({{$currencies}})</span>
                            </div>
                        </li>
                    </a>
                    <a href="{{ route('view-products-type', [ 'id' => $game->id , 'type' =>  'item'] ) }}">
                        <li class="border-nav ps-3 py-2 {{str_contains(url()->current(), 'item') ? 'current-page' : ''}}">
                            <div class="d-flex justify-content-between"> 
                                ITEM  <span class="ps-5">({{$items}})</span>
                            </div>
                        </li>
                    </a>
                </ul>
                {{-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="account">
                    <div class="d-flex justify-content-between">
                        <label class="form-check-label big-lbl" for="account">
                        ACCOUNT 
                        </label>
                        <span class="text-p">({{$accounts}})</span>
                    </div>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="currency">
                    <div class="d-flex justify-content-between">
                        <label class="form-check-label big-lbl" for="currency">
                        CURRENCY 
                        </label>
                        <span class="text-p">({{$currencies}})</span>
                    </div>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="item">
                    <div class="d-flex justify-content-between">
                        <label class="form-check-label big-lbl" for="item">
                        ITEM 
                        </label>
                        <span class="text-p">({{$items}})</span>
                    </div>
                  </div> --}}
            </div>    
             <!-- Checkbox ends -->

            <div class="p-right">
                <p class="keyword-p pt-3">Keyword filters</p>
                <form action="{{ route('view-products-search', [ 'id' => $game->id ] ) }}">

                    <div class="search-div">
                        <input type="text" class="searchTerm" name="search_product" placeholder="GRAND THEFT AUTO V" value="{{ request()->get('search_product')  }}" />
                        <button type="submit" class="searchButton">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class=" width-100 padding-tb">
                <p class="keyword-p pt-4">Price Range Filters</p>

                @if(str_contains(url()->current(), 'account'))
                <form action="{{ route('view-products-type', [ 'id' => $game->id, 'type' => 'account', 'min' => request()->min_price, 'max' => request()->max_price ] ) }}" id="price-filters-form">
                    @elseif(str_contains(url()->current(), 'item'))
                    <form action="{{ route('view-products-type', [ 'id' => $game->id, 'type' => 'item', 'min' => request()->min_price, 'max' => request()->max_price ] ) }}" id="price-filters-form">
                        @elseif(str_contains(url()->current(), 'currency'))
                        <form action="{{ route('view-products-type', [ 'id' => $game->id, 'type' => 'currency', 'min' => request()->min_price, 'max' => request()->max_price ] ) }}" id="price-filters-form">
                            @else
                            <form action="{{ route('view-products', [ 'id' => $game->id, 'min' => request()->min_price, 'max' => request()->max_price ] ) }}" id="price-filters-form">
                                @endif
                                <div id="rangeSlider" class="range-slider d-flex justify-content-start align-items-center">
                                    {{-- <div class="range-group">
                                        @if(Auth::user())
                                        @if(Auth::user()->base_currency != 'JPY')
                                        <input class="range-input price-slider min-price-slider" value="{{request()->has('min_price') ? str_replace(',','',request()->get('min_price')) : 0}}" min="1" max="50000" step="1" type="range" />
                                        <input class="range-input price-slider max-price-slider" value="{{request()->has('max_price') ? str_replace(',','',request()->get('max_price')) : 50000}}" min="1" max="50000" step="1" type="range" />
                                        @else
                                        <input class="range-input price-slider min-price-slider" value="{{request()->has('min_price') ? str_replace(',','',request()->get('min_price')) : 0}}" min="1" max="5000000" step="1" type="range" />
                                        <input class="range-input price-slider max-price-slider" value="{{request()->has('max_price') ? str_replace(',','',request()->get('max_price')) : 5000000}}" min="1" max="5000000" step="1" type="range" />
                                        @endif
                                        @else
                                        @if(Session::get('base_currency') != 'JPY')
                                        <input class="range-input price-slider min-price-slider" value="{{request()->has('min_price') ? str_replace(',','',request()->get('min_price')) : 0}}" min="1" max="50000" step="1" type="range" />
                                        <input class="range-input price-slider max-price-slider" value="{{request()->has('max_price') ? str_replace(',','',request()->get('max_price')) : 50000}}" min="1" max="50000" step="1" type="range" />
                                        @else
                                        <input class="range-input price-slider min-price-slider" value="{{request()->has('min_price') ? str_replace(',','',request()->get('min_price')) : 0}}" min="1" max="5000000" step="1" type="range" />
                                        <input class="range-input price-slider max-price-slider" value="{{request()->has('max_price') ? str_replace(',','',request()->get('max_price')) : 5000000}}" min="1" max="5000000" step="1" type="range" />
                                        @endif
                                        @endif
                                    </div> --}}
                                    <div class="number-group d-flex justify-content-between ">
                                        <!-- <input class="number-input price-input-1 w-price min-price price-slider" name="min_price" type="number" value="{{request()->has('min_price') ? request()->get('min_price') : ''}}" min="0" max="1000" placeholder="min" /> -->
                                        <input class="number-input price-input-1  min-price price-slider format-with-comma w-40" name="min_price" type="text" value="{{request()->has('min_price') ? request()->get('min_price') : ''}}" placeholder="min" />
                                        {{-- to --}}
                                        <input class="number-input price-input-1  max-price price-slider format-with-comma w-40" name="max_price" type="text" value="{{request()->has('max_price') ? request()->get('max_price') : ''}}" min="0" max="50000" placeholder="max" />
                                    </div>

                                </div>
                            </form>
            </div>

            <div>
                <p class="keyword-p pt-4">Platform</p>
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" class="d-none">Select</label>
                        <form action="">
                            <select class="minimal select-platform change_platform w-100" id="exampleFormControlSelect1" name="change_platform">
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
                    </div>
                </form>
            </div>
            <div class="d-flex pt-4">
                <a class="w-100 go" id="search-filter-btn">GO</a>
            </div>
        </div>
        <!-- Price filter ends -->

        </div>

        <div class="col-md-9 col-sm-12 ps-5 common-space pt-0">
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
        <div class="col-md-4 col-sm-12 sp-mb mb-4">
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
        <div class="col-md-4 col-sm-12 sp-mb mb-4">
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
                                <img src="{{ url('assets/images/check-mark.png') }}" class="img-fluid" alt="games" />
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
        <div class="col-md-4 col-sm-12 sp-mb mb-4">
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