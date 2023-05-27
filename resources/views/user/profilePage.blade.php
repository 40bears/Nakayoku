@extends('layout.main')
@section('title', 'Profile Page | GLOBAL CARPATICA SL')
@section('main-container')

<!-- Profile page section starts -->
<div class="container-fluid px-0 bg-lgreen padt-6">


       {{-- First section starts --}}
       <div class="container py-5">
        <h2 class="games-head text-center pb-5">Display</h2>
        <div class="d-flex  flex-column justify-content-start align-items-center mypage-div w-100 border-0">
            <div class="d-flex py-3">
                @if($user->profile_picture != null)
                <img src="{{ url('storage/uploads/' . $user->profile_picture) }}" class="img-fluid  my-profile-image upload-profile-pic mypage-img" alt="profile" />
                @else
                <img src="{{ url('assets/images/default-profile-picture.png') }}" class="img-fluid  upload-profile-pic mypage-img" alt="profile" />
                @endif

                <div class="d-flex flex-column justify-content-start align-items-start ms-5">
                    @if(Auth::user()->display_name != null)
                    <h5 class="text-capitalize pt-2 signup-p">{{Auth::user()->display_name}}</h5>
                    @else
                    <h5 class="pt-2 signup-p">{{Auth::user()->first_name . ' ' . Auth::user()->last_name}}</h5>
                    @endif
                    <div class="d-flex justify-content-center align-items-center pt-1 pb-2">
                        @if(Auth::user()->document_verification == 'VERIFIED')  
                        <p class="profile-p1 mb-0 text-capitalize">Identity Confirmed</p>
                        <img src="{{ url('assets/images/r-icon.svg') }}" class="img-fluid mb-3 ms-1" alt="games" />
                        @else
                        <p class="profile-p1 mb-0 text-capitalize">Identity Not Confirmed</p>
                        <img src="{{ url('assets/images/x-icon.svg') }}" class="img-fluid mb-3 ms-1" alt="games" />
                        @endif
                    </div>
                    <div class="d-flex justify-content-center align-items-center ">
                        @for ($i = 1; $i
                        <= Auth::user()->user_rating; $i++) <i class="fa-solid fa-star pink pe-2"></i> 
                            @endfor
                            @for ($j = 1; $j
                            <= ( 5 - Auth::user()->user_rating); $j++) <i class="fa-solid fa-star gray pe-2"></i> 
                                @endfor
                                <a class="signup-lbl">{{showUserRatingPercentage(Auth::id())}}% ({{Auth::user()->total_ratings}})</a>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <p class="min-p lh-sm text-justify">{{$user->introduction}}
                </p>
            </div>

        </div>
    </div>
    {{-- First section ends --}}

      {{-- Second section starts --}}
      <div class="container">

        <div class="d-flex justify-content-between align-items-start profile-page sp-column">
            <div class="carousal-nav ms-1 row tab sp-f-100">
                <a class="{{ Route::is('profile-page', [ 'id' => $user->id ]) ? 'isActive' : '' }} filter" href="{{ route('profile-page', [ 'id' => $user->id ]) }}">Show all</a>
                <a class=" {{str_contains(url()->current(), 'item') ? 'active' : ''}} filter justify-content-evenly" href="{{ route('profile-page-product-type', [ 'id' => $user->id, 'type' => 'item' ] ) }}">
                    <img src="{{ url('assets/images/item-icon.svg') }}" class="img-fluid" alt="items" /> Items
                </a>
                <a class=" {{str_contains(url()->current(), 'account') ? 'active' : ''}} filter justify-content-evenly" href="{{ route('profile-page-product-type', [ 'id' => $user->id, 'type' => 'account' ] ) }}">
                    <img src="{{ url('assets/images/account-icon.svg') }}" class="img-fluid" alt="account" /> Account
                </a>
                <a class=" {{str_contains(url()->current(), 'currency') ? 'active' : ''}} filter justify-content-evenly" href="{{ route('profile-page-product-type', [ 'id' => $user->id, 'type' => 'currency' ] ) }}">
                    <img src="{{ url('assets/images/currency-icon.svg') }}" class="img-fluid" alt="games" /> Currency
                </a>
            </div>

            <div class="sp-space">
                <form action="{{ route('profile-page-search-products', [ 'id' => $user->id ] ) }}" method="POST" id="profile-page-form">
                    @csrf
                    <div class="search-div-2">
                        <input type="text" class="searchTerm-2" name="search" id="profile-page-search" placeholder="Search" value="{{request()->get('search')}}" />
                        <button type="submit" class="searchButton">
                            <i class="fa fa-search white-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <hr class="w-100 mt-3">
    </div>
    {{-- Second section ends --}}

      {{-- Third section starts --}}

      <div class="container py-5 product">
        <div class="row pb-5 d-flex">
            @if(count($products) != null)
            @foreach($products as $product)
            <div class="col-md-3 col-sm-12 d-flex space justify-content-center mb-5">
                <div class="white-box">
                <a href="{{ route('view-product-details', [ 'product_name' => makeURL($product->name), 'id' => $product->id] ) }}">
                    @if($product->image != null)
                    <img src="{{ url('storage/uploads/' . $product->image ) }}" class="img-fluid sell-product-image" alt="products" />
                    @else
                    <img src="{{ url('assets/images/default-product.jpeg' ) }}" class="img-fluid sell-product-image" alt="products" />
                    @endif
                    <p class="pt-3 product-name">{{Str::upper($product->name)}} </p>
                </a>
                </div>
            </div>
            @endforeach
            @else
            <h3 class="pb-5 border-0 text-center">No matching products.</h3>
            @endif

        </div>

        <div class="d-flex justify-content-center align-items-center text-center">
            @if(request()->has('search'))
            <a class="load-more w-40 signup-btn hide">Load More</a>
            @else
            @if(request()->has('more'))
            <a class="load-more w-40 signup-btn" href="{{ route('profile-page', [ 'id' => $user->id ] ) }}">Load Less</a>
            @else
            <a class="load-more w-40 signup-btn" href="{{ url()->current() . '?' . http_build_query(['more' => true]) }}">Load More</a>
            @endif
            @endif
        </div>

    </div>

    {{-- Third section ends --}}



    <!-- Profile page  section ends -->


    @endsection
