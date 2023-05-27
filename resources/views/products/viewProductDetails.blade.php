@extends('layout.main')
@section('title', $product->name . ' | GLOBAL CARPATICA SL')
@section('main-container')


<!-- Blue section starts -->
<div class="container-fluid px-0 bg-lgreen">
    <div class="container padt-6 padt-mb-8">
        <ul class="breadcrumb menu menu1">
            <li class="breadcrumb-item"><a href="/">TOP</a></li>
            <li class="breadcrumb-item"><a href="{{ route('all-games') }}">ALL GAMES</a></li>
            <li class="breadcrumb-item"><a href="{{ route('view-products', [ 'id' => $product->game_id ] ) }}">{{Str::upper($product->games->name)}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('view-product-details', [ 'id' => $product->game_id, 'product_name' => $product->name ] ) }}">{{Str::upper($product->product_type)}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile-page', [ 'id' => $product->user_id ] ) }}">{{Str::upper($product->user->first_name)}}</a></li>
        </ul>
    </div>

    <!-- All games starts -->
    <div class="container py-lg-5">

        @if($product->product_type == 'currency')
        <!-- Buying details starts for currency-->
        <div class="row pt-5">

             <!-- Left side starts -->
            <div class="col-md-5 col-sm-12">
                <div class="d-flex flex-row justify-content-start pb-3 px-3">
                    {{-- <div class="">
                        @if($product->user->profile_picture != null)
                        <img src="{{ url('storage/uploads/' . $product->image ) }}" class="img-fluid profile-image-w" alt="games" />
                        <!-- <img src="{{ url('storage/uploads/2023/Mar/6402ca5f396ca.png' ) }}" class="img-fluid profile-image-w" alt="games" /> -->
                        @else
                        <img src="{{ url('assets/images/default-profile-picture.png') }}" class="img-fluid profile-image" alt="games" />
                        @endif
                    </div> --}}

                    <div class="d-flex flex-column">
                        <div class="w-25">
                            @if($product->user->profile_picture != null)
                            <img src="{{ url('storage/uploads/' . $product->user->profile_picture ) }}" class="img-fluid profile-image-w" alt="games" />
                            @else
                            <img src="{{ url('assets/images/default-profile-picture.png') }}" class="img-fluid profile-image" alt="games" />
                            @endif
                        </div>
                        <div class="d-flex flex-column justify-content-center mt-3">
                            <div class="d-flex justify-content-start align-items-start">
                                <a href="{{ route('profile-page', [ 'id' => $product->user->id ] ) }}" class="detail-a detail-p buy-item-user-name">{{Str::upper($product->user->first_name)}}</a>
                                <img src="{{ url('assets/images/r-icon.svg') }}" class="img-fluid ms-2" alt="games" />
                            </div>
                        </div>
                        @if($product->user->introduction != null)
                        <div class="mt-3 vector-image-text">
                            <p>{{{$product->user->introduction}}}</p>
                        </div>
                        @else
                        <div class="mt-3 vector-image-text">
                            <p>{{{$product->name}}}</p>
                        </div>
                        @endif
                        <div class="d-flex flex-column justify-content-between">

                            <div class="d-flex mt-3">
                                <div class="vector-image-border" >
                                    <img class="w-80" src="{{ url('assets/images/delivery-time.svg') }}" alt="vector-image">
                                </div>
                                <div class="d-flex flex-row justify-content-start align-items-center ms-2">
                                    <p class="mb-0 vector-image-text">Average delivery time</p>
                                    <p class="mb-0 vector-image-text ms-4">{{$product->delivery_time}}</p>
                                </div>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="vector-image-border" >
                                    <img class="w-80" src="{{ url('assets/images/guarantee-icon.svg') }}" alt="vector-image">
                                </div>
                                <div class="d-flex flex-row justify-content-start align-items-center ms-2">
                                    <p class="mb-0 vector-image-text">100% Secure Payments Guarantee</p>
                                </div>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="vector-image-border" >
                                    <img class="w-80" src="{{ url('assets/images/device-icon.svg') }}" alt="vector-image">
                                </div>
                                <div class="d-flex flex-row justify-content-start align-items-center ms-2">
                                    <p class="mb-0 vector-image-text">Device</p>
                                    <p class="mb-0 vector-image-text ms-4">{{Str::title($product->games->devices->name)}}</p>
                                </div>
                            </div>
                            <div class="d-flex mt-3 ">
                                <div class="vector-image-border">
                                    <img class="w-80" src="{{ url('assets/images/instock-icon.svg') }}" alt="vector-image">
                                </div>
                                <div class="d-flex ms-2">
                                    <p class="mb-0 vector-image-text">In Stock</p>
                                    <p class="mb-0 vector-image-text ms-4">{{$product->stock_quantity}}</p>
                                </div>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="vector-image-border" >
                                    <img class="w-80" src="{{ url('assets/images/min-icon.svg') }}" alt="vector-image">
                                </div>
                                <div class="d-flex flex-row justify-content-start align-items-center ms-2">
                                    <p class="mb-0 vector-image-text">Min Quantity</p>
                                    <p class="mb-0 vector-image-text ms-4">{{Str::title($product->min_quantity)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Left side ends -->

            <!-- Middle side starts -->
            <div class="col-md-4 col-sm-12 d-flex flex-column justify-content-end">
                <div class="product-details-seller-section product-details-seller-section-2">
                    @if($product->image != null)
                    <img src="{{ Storage::exists('public/uploads/' . $product->image) ? url('storage/uploads/' . $product->image) : url('storage/uploads/' . $product->games->image) }}" class="img-fluid profile-image-w" alt="games" />
                    @else
                    <img src="{{ url('assets/images/default-game-new.jpeg') }}" class="img-fluid profile-image w-50" alt="games" />
                    @endif
                </div>
                <div class="product-details-seller-section-2-description">
                    <p class="buy-page-product-name product-details-seller-section">{{$product->description}}</p>
                </div>
            </div>
            <!-- Middle side ends -->

            <!-- Right side starts -->
            <div class="col-md-3 col-sm-12 white-box white-box-border bank-wh d-flex justify-content-center align-items-center h-100 align-self-end">
                <form style="color: wheat;" action="{{ route('buy-product-confirmation', [ 'id' => $product->id ] ) }}">
                    @csrf
                    <div class="d-flex flex-row justify-content-between pt-3 pb-1">
                        <p class="detail-p text-dark mb-0 align-self-center">Price</p>
                        <input type="hidden" value="{{showConvertedPrice($product->price)}}" id="pricePerItem" name="">
                        <p class="detail-p3"> <span class="detail-p3 item-price">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($product->price))}} </span></p>
                    </div>

                    <div class="d-flex flex-column align-items-end invisible" style="height:0;">
                        <p id="value" class="box-p2">0 M</p>
                    </div>

                    <div class="d-flex justify-content-between pb-4">
                        <button type="button" class="btn decrease vector-image-border buy-item-input">
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </button>
                        <input type="number" class="value mx-2 w-75 vector-image-border buy-item-input text-center" placeholder="0" value="0" min="1">
                        <input type="hidden" name="quantity" id="hidden-quantity">
                        <button type="button" class="btn increase vector-image-border buy-item-input">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                    </div>
                    @if($errors->has('error'))
                    <div class="d-flex align-items-center pb-4">
                        <img src="{{ url('assets/images/cancel-mark.png') }}" class="img-fluid pe-2" alt="settings" />
                        <p class="error-p w-75">{{$errors->first('error')}}</p>
                    </div>
                    @endif
                    @if($product->user_id == Auth::id())
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="signup-btn me-2 w-50 d-flex justify-content-center" href="{{ route('edit-product', [ 'id' => $product->id ] ) }}">
                            EDIT
                        </a>
                        @if($product->status == 'published')
                        <a class="signup-btn ms-2 w-50 d-flex justify-content-center" href="{{ route('update-product-status', [ 'id' => $product->id ] ) }}">
                            DRAFT
                        </a>
                        @else
                        <a class="signup-btn ms-2 w-50 d-flex justify-content-center" href="{{ route('update-product-status', [ 'id' => $product->id ] ) }}">
                            PUBLISH
                        </a>
                        @endif
                    </div>
                    @else
                    <button class="signup-btn w-100">
                        BUY
                    </button>
                    @endif

                    <div class="d-flex align-items-center mt-4 ">
                        @if($interestedItem == null)
                        <div class="favourites-button-div">
                            <i class="fa-regular fa-heart pink heart-w heart-2"></i>
                            <a href="{{ route('add-interested-products', [ 'id' => $product->id ] ) }}" class="add-to-fav-text mb-0 ps-2">
                                Add to Favourite
                            </a>
                        </div>
                        @else
                        <div class="favourites-button-div">
                            <i class="fa-solid fa-heart pink heart-w heart-1"></i>
                            <a href="{{ route('delete-interested-products', [ 'id' => $product->id ] ) }}" class="add-to-fav-text mb-0 ps-2">
                                Remove from Favourite
                            </a>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
            <!-- Right side ends -->
        </div>
        <!-- Buying details ends for currency-->

        <!-- Buying details starts for account-->
        @elseif($product->product_type == 'account')
  
        <div class="row pt-5">
            <!-- Left side starts -->
            <div class="col-md-5 col-sm-12">
            <div class="d-flex flex-row justify-content-start pb-3 px-3">
                    <div class="d-flex flex-column product-details-seller-section">
                        <div class="w-25">
                            @if($product->user->profile_picture != null)
                            <img src="{{ url('storage/uploads/' . $product->user->profile_picture ) }}" class="img-fluid profile-image-w" alt="games" />
                            @else
                            <img src="{{ url('assets/images/default-profile-picture.png') }}" class="img-fluid profile-image" alt="games" />
                            @endif
                        </div>
                        <div class="d-flex flex-column justify-content-center mt-3">
                            <div class="d-flex justify-content-start align-items-center">
                                <a href="{{ route('profile-page', [ 'id' => $product->user->id ] ) }}" class="detail-a detail-p buy-item-user-name">{{Str::upper($product->user->first_name)}}</a>
                                <img src="{{ url('assets/images/r-icon.svg') }}" class="img-fluid mb-4 ms-2" alt="games" />
                            </div>
                        </div>
                        @if($product->user->introduction != null)
                        <div class="mt-3 vector-image-text">
                            <p>{{{$product->user->introduction}}}</p>
                        </div>
                        @else
                        <div class="mt-3 vector-image-text">
                            <p>{{{$product->name}}}</p>
                        </div>
                        @endif
                        <div class="d-flex flex-column justify-content-between">

                            <div class="d-flex mt-3">
                                <div class="vector-image-border" >
                                    <img class="w-80" src="{{ url('assets/images/delivery-time.svg') }}" alt="vector-image">
                                </div>
                                <div class="d-flex flex-row justify-content-start align-items-center ms-2">
                                    <p class="mb-0 vector-image-text">Average delivery time</p>
                                    <p class="mb-0 vector-image-text ms-4">{{$product->delivery_time}}</p>
                                </div>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="vector-image-border" >
                                    <img class="w-80" src="{{ url('assets/images/guarantee-icon.svg') }}" alt="vector-image">
                                </div>
                                <div class="d-flex flex-row justify-content-start align-items-center ms-2">
                                    <p class="mb-0 vector-image-text">100% Secure Payments Guarantee</p>
                                </div>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="vector-image-border" >
                                    <img class="w-80" src="{{ url('assets/images/device-icon.svg') }}" alt="vector-image">
                                </div>
                                <div class="d-flex flex-row justify-content-start align-items-center ms-2">
                                    <p class="mb-0 vector-image-text">Device</p>
                                    <p class="mb-0 vector-image-text ms-4">{{Str::title($product->games->devices->name)}}</p>
                                </div>
                            </div>
                            <div class="d-flex mt-3 ">
                                <div class="vector-image-border">
                                    <img class="w-80" src="{{ url('assets/images/instock-icon.svg') }}" alt="vector-image">
                                </div>
                                <div class="d-flex ms-2">
                                    <p class="mb-0 vector-image-text">In Stock</p>
                                    <p class="mb-0 vector-image-text ms-4">{{$product->stock_quantity}}</p>
                                </div>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="vector-image-border" >
                                    <img class="w-80" src="{{ url('assets/images/min-icon.svg') }}" alt="vector-image">
                                </div>
                                <div class="d-flex flex-row justify-content-start align-items-center ms-2">
                                    <p class="mb-0 vector-image-text">Min Quantity</p>
                                    <p class="mb-0 vector-image-text ms-4">{{Str::title($product->min_quantity)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </div>  
            <!-- Left side ends -->

            <!-- Middle section starts -->
            <div class="col-md-4 col-sm-12 d-flex flex-column justify-content-end">
                <div class="product-details-seller-section product-details-seller-section-2">
                    @if($product->image != null)
                    <img src="{{ Storage::exists('public/uploads/' . $product->image) ? url('storage/uploads/' . $product->image) : url('storage/uploads/' . $product->games->image) }}" class="img-fluid profile-image-w" alt="games" />
                    @else
                    <img src="{{ url('assets/images/default-profile-picture.png') }}" class="img-fluid profile-image w-50" alt="games" />
                    @endif
                </div>
                <div class="product-details-seller-section-2-description">
                    <p class="buy-page-product-name product-details-seller-section">{{$product->name}}</p>
                </div>
            </div>
            <!-- Middle section ends -->

            <!-- Right side starts -->

            <div class="col-md-3 col-sm-12 white-box white-box-border bank-wh d-flex justify-content-center align-items-center h-100 align-self-end">
                <form style="color: wheat;" class="w-100" action="{{ route('buy-product-confirmation', [ 'id' => $product->id ] ) }}">
                    @csrf
                    <div class="d-flex flex-row justify-content-between  pt-3 pb-2">
                        <p class=" buy-item-price-text align-self-center mb-0">Price</p>
                        <input type="hidden" value="{{showConvertedPrice($product->price)}}" id="pricePerItem" name="">
                        <p class="detail-p3 item-price"><span>{{showCurrencySymbol()}}</span> {{formatPrice(showConvertedPrice($product->price))}}</p>
                    </div>

                    @if($product->user_id == Auth::id())
                    <div class="d-flex justify-content-between align-items-center mt-5">
                        <a class="signup-btn me-2 w-50 d-flex justify-content-center" href="{{ route('edit-product', [ 'id' => $product->id ] ) }}">
                            EDIT
                        </a>
                        @if($product->status == 'published')
                        <a class="signup-btn ms-2 w-50 d-flex justify-content-center" href="{{ route('update-product-status', [ 'id' => $product->id ] ) }}">
                            DRAFT
                        </a>
                        @else
                        <a class="signup-btn ms-2 w-50 d-flex justify-content-center" href="{{ route('update-product-status', [ 'id' => $product->id ] ) }}">
                            PUBLISH
                        </a>
                        @endif
                    </div>
                    @else
                    <button class="signup-btn w-100 mt-5">
                        BUY
                    </button>
                    @endif

                    <div class="d-flex align-items-center mt-4 ">
                        @if($interestedItem == null)
                        <div class="favourites-button-div">
                            <i class="fa-regular fa-heart pink heart-w heart-2"></i>
                            <a href="{{ route('add-interested-products', [ 'id' => $product->id ] ) }}" class="add-to-fav-text mb-0 ps-2">
                                Add to Favourite
                            </a>
                        </div>
                        @else
                        <div class="favourites-button-div">
                            <i class="fa-solid fa-heart pink heart-w heart-1"></i>
                            <a href="{{ route('delete-interested-products', [ 'id' => $product->id ] ) }}" class="add-to-fav-text mb-0 ps-2">
                                Remove from Favourite
                            </a>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
            <!-- Right side ends -->
        </div>
        <!-- Buying details ends for account-->

        @else
        <!-- Buying details starts for items-->
        <div class="row pt-5">
            <!-- Left side starts -->
            <div class="col-md-5 col-sm-12">
                <div class="d-flex flex-row justify-content-start pb-3 px-3">
                    {{-- <div class="">
                        @if($product->user->profile_picture != null)
                        <img src="{{ url('storage/uploads/' . $product->image ) }}" class="img-fluid profile-image-w" style="height:100%;" alt="games" />
                        @else
                        <img src="{{ url('assets/images/default-profile-picture.png') }}" class="img-fluid profile-image" alt="games" />
                        @endif
                    </div> --}}

                    <div class="d-flex flex-column">
                        <div class="w-25">
                            @if($product->user->profile_picture != null)
                            <img src="{{ url('storage/uploads/' . $product->user->profile_picture ) }}" class="img-fluid profile-image-w" alt="games" />
                            @else
                            <img src="{{ url('assets/images/default-profile-picture.png') }}" class="img-fluid profile-image" alt="games" />
                            @endif
                        </div>
                        <div class="d-flex flex-column justify-content-center mt-3">
                            <div class="d-flex justify-content-start align-items-center">
                                <a href="{{ route('profile-page', [ 'id' => $product->user->id ] ) }}" class="detail-a detail-p buy-item-user-name">{{Str::upper($product->user->first_name)}}</a>
                                <img src="{{ url('assets/images/r-icon.svg') }}" class="img-fluid mb-4 ms-1" alt="games" />
                            </div>
                        </div>
                        @if($product->user->introduction != null)
                        <div class="mt-3 vector-image-text">
                            <p>{{{$product->user->introduction}}}</p>
                        </div>
                        @else
                        <div class="mt-3 vector-image-text">
                            <p>{{{$product->name}}}</p>
                        </div>
                        @endif
                        <div class="d-flex flex-column justify-content-between">

                            <div class="d-flex mt-3">
                                <div class="vector-image-border" >
                                    <img class="w-80" src="{{ url('assets/images/delivery-time.svg') }}" alt="vector-image">
                                </div>
                                <div class="d-flex flex-row justify-content-start align-items-center ms-2">
                                    <p class="mb-0 vector-image-text">Average delivery time</p>
                                    <p class="mb-0 vector-image-text ms-4">{{$product->delivery_time}}</p>
                                </div>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="vector-image-border" >
                                    <img class="w-80" src="{{ url('assets/images/guarantee-icon.svg') }}" alt="vector-image">
                                </div>
                                <div class="d-flex flex-row justify-content-start align-items-center ms-2">
                                    <p class="mb-0 vector-image-text">100% Secure Payments Guarantee</p>
                                </div>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="vector-image-border" >
                                    <img class="w-80" src="{{ url('assets/images/device-icon.svg') }}" alt="vector-image">
                                </div>
                                <div class="d-flex flex-row justify-content-start align-items-center ms-2">
                                    <p class="mb-0 vector-image-text">Device</p>
                                    <p class="mb-0 vector-image-text ms-4">{{Str::title($product->games->devices->name)}}</p>
                                </div>
                            </div>
                            <div class="d-flex mt-3 ">
                                <div class="vector-image-border">
                                    <img class="w-80" src="{{ url('assets/images/instock-icon.svg') }}" alt="vector-image">
                                </div>
                                <div class="d-flex ms-2">
                                    <p class="mb-0 vector-image-text">In Stock</p>
                                    <p class="mb-0 vector-image-text ms-4">{{$product->stock_quantity}}</p>
                                </div>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="vector-image-border" >
                                    <img class="w-80" src="{{ url('assets/images/min-icon.svg') }}" alt="vector-image">
                                </div>
                                <div class="d-flex flex-row justify-content-start align-items-center ms-2">
                                    <p class="mb-0 vector-image-text">Min Quantity</p>
                                    <p class="mb-0 vector-image-text ms-4">{{Str::title($product->min_quantity)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Left side ends -->

            <!-- Middle div starts -->
            <div class="col-md-4 col-sm-12 d-flex flex-column justify-content-end">
                <div class="product-details-seller-section product-details-seller-section-2">
                    @if($product->image != null)
                    <img src="{{ Storage::exists('public/uploads/' . $product->image) ? url('storage/uploads/' . $product->image) : url('storage/uploads/' . $product->games->image) }}" class="img-fluid profile-image-w" alt="games" />
                    @else
                    <img src="{{ url('assets/images/default-product.jpeg') }}" class="img-fluid profile-image w-50" alt="games" />
                    @endif
                </div>
                <div class="product-details-seller-section-2-description">
                    <p class="buy-page-product-name product-details-seller-section">{{$product->name}}</p>
                </div>
            </div>
            <!-- Middle div ends -->

            <!-- Right side starts -->

            <div class="col-md-3 col-sm-12  white-box bank-wh d-flex justify-content-center align-items-center h-100 align-self-end">
                <form style="color: wheat;" action="{{ route('buy-product-confirmation', [ 'id' => $product->id ] ) }}">
                    @csrf
                    <div class="d-flex flex-row justify-content-between pt-3 pb-1">
                        <p class="detail-p text-dark align-self-center mb-0">Price</p>
                        <input type="hidden" value="{{showConvertedPrice($product->price)}}" id="pricePerItem" name="">
                        <p class="detail-p3 item-price">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($product->price))}}</p>
                    </div>

                    <div class="d-flex flex-column align-items-end mb-4">
                        <p id="totalPrice" class="box-p2" hidden>0</p>
                        <p id="value" class="box-p2" hidden>0 M</p>
                    </div>

                    <div class="d-flex justify-content-between pb-4">
                        <button type="button" class="btn decrease vector-image-border buy-item-input">
                            <i class="fa fa-minus " aria-hidden="true"></i>
                        </button>
                        <input type="number" class="value mx-4 w-75 vector-image-border buy-item-input text-center" placeholder="0" value="0" min="1">
                        <input type="hidden" name="quantity" id="hidden-quantity">
                        <button type="button" class="btn increase vector-image-border buy-item-input">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                    </div>
                    @if($product->user_id == Auth::id())
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="signup-btn me-2 w-50 d-flex justify-content-center" href="{{ route('edit-product', [ 'id' => $product->id ] ) }}">
                            EDIT
                        </a>
                        @if($product->status == 'published')
                        <a class="signup-btn ms-2 w-50 d-flex justify-content-center" href="{{ route('update-product-status', [ 'id' => $product->id ] ) }}">
                            DRAFT
                        </a>
                        @else
                        <a class="signup-btn ms-2 w-50 d-flex justify-content-center" href="{{ route('update-product-status', [ 'id' => $product->id ] ) }}">
                            PUBLISH
                        </a>
                        @endif
                    </div>
                    @else
                    <button class="signup-btn w-100">
                        BUY
                    </button>
                    @endif
                    @if($errors->has('error'))
                    <div class="d-flex align-items-center pb-4">
                        <img src="{{ url('assets/images/cancel-mark.png') }}" class="img-fluid pe-2" alt="settings" />
                        <p class="error-p w-75">{{$errors->first('error')}}</p>
                    </div>
                    @endif

                    <div class="d-flex align-items-center mt-4 ">
                        @if($interestedItem == null)
                        <div class="favourites-button-div">
                            <i class="fa-regular fa-heart pink heart-w heart-2"></i>
                            <a href="{{ route('add-interested-products', [ 'id' => $product->id ] ) }}" class="add-to-fav-text mb-0 ps-2">
                                Add to Favourite
                            </a>
                        </div>
                        @else
                        <div class="favourites-button-div">
                            <i class="fa-solid fa-heart pink heart-w heart-1"></i>
                            <a href="{{ route('delete-interested-products', [ 'id' => $product->id ] ) }}" class="add-to-fav-text mb-0 ps-2">
                                Remove from Favourite
                            </a>
                        </div>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Right side ends -->
        </div>
        <!-- Buying details ends for items-->
        @endif

        <div class="my-4">
            @if(count($allProducts) > 1)
            <div class="border-nav pb-2 pt-5">
                <p class="detail-p text-center other-sellers-text">Other Sellers ({{count($allProducts)}})</p>
            </div>
            <div class="row py-4">
            @foreach($allProducts as $item)
            @if($item->id != $product->id)
            <!-- First row starts -->    
                <div class="col-lg-3 col-md-4 col-sm-12 sp-mb mb-4">
                    <div class="white-box">
                        <a class="w-15" href="{{ route('view-product-details', [ 'product_name' => makeURL($product->name), 'id' => $product->id] ) }}">
                            @if($item->image != null)
                            <img src="{{ !Storage::exists('public/uploads/' . $product->image) ? url('storage/uploads/' . $product->games->image) : url('storage/uploads/' . $item->image ) }}" class="img-fluid " alt="product" />
                            @else
                            <img src="{{ url('assets/images/default-product.jpeg') }}" class="img-fluid " alt="product" />
                            @endif
                            @if(empty($product->description))
                            <p class="detail-p display mt-3">{{Str::limit($product->name, 80, $end='.......')}}</p>
                            <p class="detail-p d-md-none d-sm-block">{{Str::limit($product->name, 25, $end='.......')}}</p>
                            @else
                            <p class="detail-p display mt-3">{{Str::limit($product->description, 80, $end='.......')}}</p>
                            <p class="detail-p d-md-none d-sm-block">{{Str::limit($product->description, 25, $end='.......')}}</p>
                            @endif
                            <div class="d-flex">
                                <div class="">
                                    @if($product->user->profile_picture != null)
                                    <img src="{{ url('storage/uploads/' . $product->user->profile_picture ) }}" class="img-fluid profile-image-w" alt="games" />
                                    @else
                                    <img src="{{ url('assets/images/default-profile-picture.png') }}" class="img-fluid profile-image" alt="games" />
                                    @endif
                                </div>
                                <div class="d-flex flex-column justify-content-center ms-4">
                                    <div>
                                        <a href="{{ route('profile-page', [ 'id' => $product->user->id ] ) }}" class="detail-a detail-p">{{$product->user->first_name}}</a>
                                        <img src="{{ url('assets/images/r-icon.svg') }}" class="img-fluid" alt="games" />
                                    </div>
                                    <div class="d-flex justify-content-between pt-1 align-items-center">
                                        <span class="detail-p text-dark">{{showUserRatingPercentage($product->user->id)}}% ({{$product->user->total_ratings}})</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mt-3">
                                <div class="mr-15">
                                    <p class="detail-head">Instock</p>
                                    <p class="detail-para">{{$product->stock_quantity}} M</p>
                                </div>
                                <div class="mr-15">
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
            <!-- First row ends -->
            @endif
            @endforeach
            <div class="d-flex justify-content-center">
                {{--{{$item->appends(request()->query())->links('partials.pagination')}}--}}
            </div>
            @endif
        </div>

    </div>
 </div>
@endsection