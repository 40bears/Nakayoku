@extends('layout.main')
@section('title', 'Purchase Product Details | CII')
@section('main-container')

<!-- Blue section starts -->
<div class="container-fluid px-0 bg-lgreen">
  <div class="container padt-6">
    <ul class="breadcrumb menu menu1">
      <li class="breadcrumb-item"><a href="/">TOP</a></li>
      <li class="breadcrumb-item"><a href="{{ route('view-my-page') }}">My Page</a></li>
      <li class="breadcrumb-item"><a href="{{ route('view-purchased-products') }}">Purchased items</a></li>
      <li class="breadcrumb-item"><a href="{{ route('view-purchased-products-details', [  'id' => $transaction->id] ) }}">{{$transaction->id}}</a></li>
    </ul>
  </div>

  {{-- Container starts --}}
  <div class="container pb-5">

    <div class="row py-5">

      <div class="bg-deal mb-5">
        @if($transaction->payment_status == 1)
        <div class="d-flex align-items-start py-3 bg-s">
          <i class="fa-solid fa-circle-check icon-s ps-3"></i>
          <h4 class="s-head ps-2 mb-0">This deal has been succuessfully closed</h4>
        </div>
        @else
        <div class="d-flex align-items-start py-3 bg-p">
          <i class="fa-solid fa-clock-rotate-left icon-s ps-3"></i>
          <h4 class="s-head ps-2 mb-0">Your deal is still pending...</h4>
        </div>
          @endif
      </div>

      {{-- Left side starts --}}
      <div class="col-md-6 col-sm-12 py-5">

        <div class="position-relative mb-5">
          @if($transaction->products->image != null)
          <img src="{{ url('storage/uploads/' . $transaction->products->image) }}" class="img-fluid" alt="games" />
          @else
          <img src="{{ url('assets/images/default-product.jpeg') }}" class="img-fluid" alt="games" />
          @endif
          <div class="rating-div pb-4">
              <p class="rating-game mb-0">{{Str::upper($transaction->games->name)}} {{Str::upper($transaction->products->product_type)}}</p>
              <p class="rating-amount mb-0 mt-2" id="textLabel">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($transaction->amount))}}</p>
          </div>
       </div>

        {{-- <div class="d-flex flex-row justify-content-start py-4">
          <div class="pe-3">
            @if($transaction->products->image != null)
            <img src="{{ url('storage/uploads/' . $transaction->games->image) }}" class="img-fluid product-image-3" alt="games" />
            @else
            <img src="{{ url('assets/images/default-product.jpeg') }}" class="img-fluid img-fluid product-image-3" alt="games" />
            @endif
          </div>

          <div class="d-flex flex-column justify-content-start">
            <p class="buy-p mb-0"> {{Str::upper($transaction->games->name)}} {{Str::upper($transaction->products->product_type)}}</p>
            <p class="box-p2 mb-0 pt-2">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($transaction->amount))}}</p>
          </div>
        </div> --}}
        <h4 class="pur-head py-4">Purchase details</h4>

          <p class="signup-lbl mb-0">Payment</p>
          <hr class="drop-hr mb-3 mt-2" />
          <p class="pur-amount mb-0 ms-3">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($transaction->amount))}}</p>
          <hr class="drop-hr mt-3" />

          <p class="signup-lbl mb-0 pt-4 pb-2">Case ID</p>
          <div class="d-flex justify-content-between signup-input bg-white">
            <p class="pur-amount mb-0" id="transactionId">{{$transaction->id}}</p>
            <i class="fa-solid fa-copy"></i>
          </div>

        <div class="d-flex justify-content-end px-2 py2">
          <h5 id="copied" class="pt-1 hide">Copied</h5>
        </div>
      </div>
      {{-- Left side ends --}}

      {{-- Right side starts --}}
      <div class="col-md-6 col-sm-12 ps-5 py-5 common-space">
        <h4 class="pur-head pb-4">Seller Information</h4>
        <div class="profile-div wd-50">
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

        {{-- <div class="d-flex flex-row justify-content-between py-4">
          <div class="d-flex flex-row justify-content-around">
            <div class="pe-4">
              @if($transaction->seller->profile_picture != null)
              <img src="{{ url('storage/uploads/' . $transaction->seller->profile_picture) }}" class="img-fluid product-image-3" alt="games" />
              @else
              <img src="{{ url('assets/images/default-game.png') }}" class="img-fluid img-fluid product-image-3" alt="games" />
              @endif
            </div>
            <div>
              <div>
                <a href="#" class="detail-a detail-p">{{$transaction->seller->display_name ? $transaction->seller->display_name : $transaction->seller->first_name}}</a>
                <img src="{{ url('assets/images/check-mark.png') }}" class="img-fluid" alt="check mark" />
              </div>
              <div class="d-flex justify-content-start pt-1 align-items-center">
                <img src="{{ url('assets/images/star-mark.png') }}" class="img-fluid pe-2" alt="star mark" />
                <span class="detail-p">{{showUserRatingPercentage($transaction->seller->id)}}% ({{$transaction->seller->total_ratings}})</span>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
      {{-- Right side ends --}}

    </div>

  </div>
  {{-- Container ends --}}

</div>
{{-- Blue section ends --}}

@endsection