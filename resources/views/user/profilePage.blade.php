@extends('layout.main')
@section('title', 'Profile Page | CII')
@section('main-container')

<!-- Profile page section starts -->
<div class="container-fluid px-0 bg-lgreen padt-6">
    <div class="container pt-4">
        <ul class="breadcrumb menu menu1 pb-5">
            <li class="breadcrumb-item"><a href="/">TOP</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile-page', [ 'id' => $user->id ] ) }}">{{$user->display_name ? $user->display_name : $user->first_name . ' ' . $user->last_name}}</a></li>
        </ul>
        <h2 class="games-head text-center">Display</h2>
    </div>

    {{-- First section starts --}}
    <div class="container py-5">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <div class="d-flex flex-column pb-5 justify-content-start f-column">
                    <div class="profile-div">
                        <div class="d-flex align-items-center justify-content-center">
                            <div>
                                @if(Auth::user() && Auth::user()->profile_picture != null)
                                <img src="{{ url('storage/uploads/' . Auth::user()->profile_picture) }}" class="align-self-center img-fluid dropdown-profile-img me-2" alt="games" />
                                @else
                                <img src="{{ url('assets/images/default-profile-picture.png') }}" class="align-self-center img-fluid profile-img me-2" alt="games" />
                                @endif
                            </div>
                            <div>
                                <div class="d-flex justify-content-between">
                                    <div class="me-2">
                                        @if(Auth::user() && Auth::user()->display_name != null)
                                        <p class="mb-0">{{Auth::user()->display_name}}</p>
                                        @else
                                        <p class="mb-0">{{Auth::user()->first_name}}</p>
                                        @endif
                                    </div>
                                    <div>
                                        @if(Auth::user()->document_verification == 'VERIFIED')
                                        <img src="{{ url('assets/images/identity-confirm.svg') }}" class="img-fluid" alt="games" />
                                        @else
                                        <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid me-2" alt="games" />
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex justify-content-space pt-3">
                                    <img src="{{ url('assets/images/star-solid-green.svg') }}" class="img-fluid me-2" alt="rating" />
                                     <span class="">{{showUserRatingPercentage(Auth::id())}}% ({{Auth::user()->total_ratings}})</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center pt-4">
                            @if(Auth::user()->document_verification == 'VERIFIED')
                            <img src="{{ url('assets/images/identity-confirm.svg') }}" class="img-fluid" alt="games" />
                            <p class="profile-p mb-0">Identity confirmed</p>
                            @else
                            <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid me-2" alt="games" />
                            <p class="profile-p mb-0">Identity not confirmed</p>
                            @endif
                        </div>
                    </div>

                    <p class="keyword-p pt-4">ALL</p>
                    <ul class="ps-0 left-menu">
                        <a href="{{ route('profile-page-product-type', [ 'id' => $user->id , 'type' =>  'account'] ) }}">
                            <li class="border-nav border-t ps-3 py-2 {{str_contains(url()->current(), 'account') ? 'current-page' : ''}}">
                                <div class="d-flex justify-content-between"> 
                                   ACCOUNT 
                                    <span>({{$accounts}})</span>
                                </div>
                            </li>
                        </a>
                        <a href="{{ route('profile-page-product-type', [ 'id' => $user->id , 'type' =>  'currency'] ) }}">
                            <li class="border-nav ps-3 py-2 {{str_contains(url()->current(), 'currency') ? 'current-page' : ''}}">
                                <div class="d-flex justify-content-between"> 
                                    CURRENCY 
                                     <span class="ps-2">({{$currencies}})</span>
                                </div>
                            </li>
                        </a>
                        <a href="{{ route('profile-page-product-type', [ 'id' => $user->id , 'type' =>  'item'] ) }}">
                            <li class="border-nav ps-3 py-2 {{str_contains(url()->current(), 'item') ? 'current-page' : ''}}">
                                <div class="d-flex justify-content-between"> 
                                    ITEM  
                                    <span class="ps-5">({{$items}})</span>
                                </div>
                            </li>
                        </a>
                    </ul>

                    {{-- <div class="d-flex flex-column justify-content-center align-items-center mx-3">
                        <div class="d-flex py-3">
                            @if($user->profile_picture != null)
                            <img src="{{ url('storage/uploads/' . $user->profile_picture) }}" class="img-fluid profile-image-w me-3" alt="profile" />
                            @else
                            <img src="{{ url('assets/images/default-profile-picture.png') }}" class="img-fluid profile-image me-3" alt="profile" />
                            @endif

                            <div class="d-flex flex-column">
                                <div class="d-flex">
                                    <a href="{{ route('profile-page', [ 'id' => $user->id ] ) }}" class="detail-a detail-p">{{$user->display_name ? $user->display_name : $user->first_name . ' ' . $user->last_name}}</a>
                                    <img src="{{ url('assets/images/check-mark.png') }}" class="img-fluid ps-2" alt="games" />
                                </div>
                                <div class="d-flex justify-content-around align-items-center">
                                    @for ($i=1; $i <=$user->user_rating; $i++) <img src="{{ url('assets/images/rating-2.png') }}" class="img-fluid" alt="rating" />
                                        @endfor
                                        @for ($j = 1; $j
                                        <= ( 5 - $user->user_rating); $j++) <img src="{{ url('assets/images/rating-gray.png') }}" class="img-fluid" alt="rating" />
                                            @endfor
                                            <a class="rating-top">{{showUserRatingPercentage($user->id)}}% ({{$user->total_ratings}})</a>
                                </div>
                                <div class="d-flex justify-content-start align-items-center mt-1">
                                    @if($user->document_verification == 'VERIFIED')
                                    <img src="{{ url('assets/images/identity-mark.png') }}" class="img-fluid" alt="games" />
                                    <p class="identity mb-0 ms-2">Identity confirmed</p>
                                    @else
                                    <img src="{{ url('assets/images/cancel-mark.png') }}" class="img-fluid" alt="games" />
                                    <p class="identity mb-0 ms-2">Identity not confirmed</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <p class="min-p lh-sm text-justify">{{$user->introduction}}
                            </p>
                        </div>

                    </div> --}}
                </div>
            </div>

            <div class="col-md-9 col-sm-12 ps-5 common-space pt-0">
                {{-- Filter starts --}}
                <div class="container pb-5">
                    <p class="keyword-p pb-2"> Game Name Filters </p>
                    <form action="{{ route('profile-page-search-products', [ 'id' => $user->id ] ) }}" method="POST" id="profile-page-form" class="w-75">
                        @csrf
                        <div class="search-div">
                            <input type="text" class="searchTerm" name="search" id="profile-page-search" placeholder="GRAND THEFT AUTO V" value="{{request()->get('search')}}" />
                            <button type="submit" class="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                {{-- Filter ends --}}

                {{-- Game starts --}}
                <div class="container pb-5 product">
                    <div class="row py-4 d-flex">
                        @if(count($products) != null)
                        @foreach($products as $product)
                        <div class="col-md-4 col-sm-12 sp-mb">
                            <div class="white-box">
                                <a href="{{ route('view-product-details', [ 'product_name' => makeURL($product->name), 'id' => $product->id] ) }}">
                                    @if($product->image != null)
                                    <img src="{{ url('storage/uploads/' . $product->image ) }}" class="img-fluid sell-product-image" alt="games" />
                                    @else
                                    <img src="{{ url('assets/images/default-product.jpeg' ) }}" class="img-fluid sell-product-image" alt="games" />
                                    @endif
                                    <p class="pt-3">{{Str::upper($product->name)}} </p>
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
                        <a class=" wd-50 signup-btn hide">Load More</a>
                        @else
                        @if(request()->has('more'))
                        <a class=" wd-50 signup-btn" href="{{ route('profile-page', [ 'id' => $user->id ] ) }}">Load Less</a>
                        @else
                        <a class=" wd-50 signup-btn" href="{{ url()->current() . '?' . http_build_query(['more' => true]) }}">Load More</a>
                        @endif
                        @endif
                    </div>
            
                </div>
                {{-- Game ends --}}
            </div>

        </div>
    </div>
    {{-- First section ends --}}

    {{-- Second section starts --}}
    {{-- <div class="container d-flex flex-column justify-content-center align-items-center">
        <p class="buy-text">DISPLAY</p>

        <div class="menu menu-1 pt-3">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{str_contains(url()->current(), 'currency') ? 'active' : ''}}" href="{{ route('profile-page-product-type', [ 'id' => $user->id, 'type' => 'currency' ] ) }}">CURRENCY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{str_contains(url()->current(), 'account') ? 'active' : ''}}" href="{{ route('profile-page-product-type', [ 'id' => $user->id, 'type' => 'account' ] ) }}">ACCOUNT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{str_contains(url()->current(), 'item') ? 'active' : ''}}" href="{{ route('profile-page-product-type', [ 'id' => $user->id, 'type' => 'item' ] ) }}">ITEMS</a>
                </li>
            </ul>
        </div>
        <hr class="w-100">
    </div> --}}
    {{-- Second section ends --}}

    {{-- Third section starts --}}
    {{-- <div class="container form-container py-5">
        <p class="keyword-p pb-2"> Game Name Filters </p>
        <form action="{{ route('profile-page-search-products', [ 'id' => $user->id ] ) }}" method="POST" id="profile-page-form">
            @csrf
            <div class="search-div">
                <input type="text" class="searchTerm" name="search" id="profile-page-search" placeholder="GRAND THEFT AUTO V" value="{{request()->get('search')}}" />
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div> --}}
    {{-- Third section ends --}}

    {{-- Fourth section starts --}}

    {{-- <div class="container py-5 product">
        <div class="row pb-5 d-flex">
            @if(count($products) != null)
            @foreach($products as $product)
            <div class="col-md-3 col-sm-12 d-flex space justify-content-center">
                <a href="{{ route('view-product-details', [ 'product_name' => makeURL($product->name), 'id' => $product->id] ) }}">
                    @if($product->image != null)
                    <img src="{{ url('storage/uploads/' . $product->image ) }}" class="img-fluid zoom product-image-2" alt="games" />
                    @else
                    <img src="{{ url('assets/images/default-product.jpeg' ) }}" class="img-fluid zoom product-image-2" alt="games" />
                    @endif
                    <p class="pt-3">{{Str::upper($product->name)}} </p>
                </a>
            </div>
            @endforeach
            @else
            <h3 class="pb-5 border-0 text-center">No matching products.</h3>
            @endif

        </div>

        <div class="d-flex justify-content-center align-items-center text-center">
            @if(request()->has('search'))
            <a class="load-more w-40 button-1 hide">Load More</a>
            @else
            @if(request()->has('more'))
            <a class="load-more w-40 button-1" href="{{ route('profile-page', [ 'id' => $user->id ] ) }}">Load Less</a>
            @else
            <a class="load-more w-40 button-1" href="{{ url()->current() . '?' . http_build_query(['more' => true]) }}">Load More</a>
            @endif
            @endif
        </div>

    </div> --}}

    {{-- Fourth section ends --}}

    <!-- Profile page  section ends -->


    @endsection
