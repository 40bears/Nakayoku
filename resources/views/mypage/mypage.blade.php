@extends('layout.user')
@section('title', 'My Page | CII')
@section('main-container')

<!-- Right side starts -->

<div class="col-md-9 col-sm-12 ps-5 align-items-center justify-content-center d-flex flex-column common-space padt-6 sp-mt">
    <div class="d-flex flex-column justify-content-center align-items-center mypage-div">
        @if(Auth::user()->profile_picture != null)
        <img src="{{ url('storage/uploads/' . Auth::user()->profile_picture) }}" class="img-fluid my-profile-image upload-profile-pic mypage-img" alt="games" />
        @else
        <img src="{{ url('assets/images/default-profile-mypage.png') }}" class="img-fluid upload-profile-pic mypage-img" alt="games" />
        @endif
        <a class="request-a remove-profile-pic py-2 text-danger align-self-end">
            <i class="fa-regular fa-trash-can"></i>
        </a>
        @if(Auth::user()->display_name != null)
        <h5 class="text-center  text-capitalize pt-2 signup-p">{{Auth::user()->display_name}}</h5>
        @else
        <h5 class="text-center pt-2 signup-p">{{Auth::user()->first_name . ' ' . Auth::user()->last_name}}</h5>
        @endif
        <div class="d-flex justify-content-center align-items-center pt-1 pb-2">
            @if(Auth::user()->document_verification == 'VERIFIED')
            <img src="{{ url('assets/images/r-icon.svg') }}" class="img-fluid" alt="games" />
            <p class="profile-p mb-0 ps-2 text-capitalize">Identity confirmed</p>
            @else
            <img src="{{ url('assets/images/x-icon.svg') }}" class="img-fluid" alt="games" />
            <p class="profile-p mb-0 ps-2 text-capitalize">Identity not confirmed</p>
            @endif
        </div>
        <div class="d-flex justify-content-center align-items-center ">
            @for ($i = 1; $i
            <= Auth::user()->user_rating; $i++) <img src="{{ url('assets/images/rating.png') }}" class="img-fluid pe-2" alt="rating" />
                @endfor
                @for ($j = 1; $j
                <= ( 5 - Auth::user()->user_rating); $j++) <img src="{{ url('assets/images/rating2.pn') }}g" class="img-fluid pe-2" alt="rating" />
                    @endfor
                    <a class="signup-lbl">{{showUserRatingPercentage(Auth::id())}}% ({{Auth::user()->total_ratings}})</a>
        </div>
    </div>

    <div class="container sp-100 w-80 pt-5">
        <div class="d-flex flex-column justify-content-center align-items-start">

    <div class="w-100">
        <hr class="drop-hr" />
        <p class="signup-p pt-4">Balance (including sales proceeds)</p>
        <div class="d-flex pt-4 pb-3">
            <p class="head-h3 pe-2 mb-0">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice(Auth::user()->balance))}}-</p>
            <div class="d-flex align-items-center">
                <a class="req-a" href="{{ route('withdrawal-request') }}">withdrawal request</a>
            </div>
        </div>
        <hr class="drop-hr" />
    </div>
    <div class="pt-5 w-100">
        <form action="{{ route('update-my-page') }}" method="POST" enctype="multipart/form-data" class="w-100">
            @csrf
            <input type="file" name="image" id="inputProfilePic" value="">
            <div class="pb-4 d-flex flex-column">
                <label class="signup-lbl pb-2">Your display name</label>
                <input type="text" class="signup-input  text-capitalize" id="displayName" name="display_name" placeholder="Your display name" value="{{Auth::user()->display_name}}" />
            </div>

            <div class="pb-5 d-flex flex-column">
                <label class="signup-lbl pb-2">Introduction of you</label>
                <textarea class="signup-input h-100" id="introduction" name="introduction" rows="15" cols="50">{{Auth::user()->introduction}}</textarea>
            </div>

            <div class="d-flex flex-column align-items-center">
                <input type="submit" class="signup-btn w-50" id="update" name="update" value="Update" />
            </div>
        </form>
    </div>

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