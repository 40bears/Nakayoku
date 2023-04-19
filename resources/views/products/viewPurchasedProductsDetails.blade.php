@extends('layout.main')
@section('title', 'Purchase Product Details | CII')
@section('main-container')

<!-- Blue section starts -->
<div class="container-fluid px-0 bg-lgreen padt-6">

  {{-- Container starts --}}
  <div class="container pb-5">

    <div class="row py-5">

      <div class="bg-deal mb-5">
        @if($transaction->payment_status == 1)
        <div class="d-flex justify-content-start align-items-center py-3">
          <i class="fa-solid fa-circle-check icon-s ps-3 pink"></i>
          <h4 class="s-head ps-2 mb-0 pink">This deal has been succuessfully closed</h4>
        </div>
        @else
        <div class="d-flex justify-content-start align-items-center py-3">
          <i class="fa-solid fa-clock-rotate-left icon-s ps-3 red-1"></i>
          <h4 class="s-head ps-2 mb-0 red-1">Your deal is still pending...</h4>
        </div>
          @endif
      </div>

      {{-- Left side starts --}}
      <div class="col-12 col-md-12 col-lg-8">
        <div class="purchased-products-user-details-div">
          <div class="d-flex flex-column">
            <div class="d-flex justify-content-start align-items-center">
              <div>
                @if(Auth::user() && Auth::user()->profile_picture != null)
                <img src="{{ url('storage/uploads/' . Auth::user()->profile_picture) }}" class="align-self-center img-fluid dropdown-profile-img me-5" alt="games" />
                @else
                <img src="{{ url('assets/images/default-profile-picture.png') }}" class="align-self-center img-fluid profile-img me-5" alt="games" />
                @endif
              </div>
              <div>
                <div class="d-flex">
                  <div>
                    @if(Auth::user() && Auth::user()->display_name != null)
                    <p class="mb-0 purchased-products-user-name">{{Auth::user()->display_name}}</p>
                    @else
                    <p class="mb-0 purchased-products-user-name">{{Auth::user()->first_name}}</p>
                    @endif
                  </div>
                  <div>
                    @if(Auth::user()->document_verification == 'VERIFIED')
                    <img src="{{ url('assets/images/r-icon.svg') }}" class="img-fluid mb-3" alt="games" />
                    @else
                    <img src="{{ url('assets/images/x-icon.svg') }}" class="img-fluid mb-3" alt="games" />
                    @endif
                  </div>
                </div>
                <div>
                  <p class="mb-0 purchased-products-name">{{$transaction->products->name}}</p>
                </div>
              </div>
            </div>
            <div>
              <p class="mb-0 purchased-products-user-intro">{{Auth::user()->introduction}}</p>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="col-md-6 col-sm-12 py-5">

        <div class="mb-3">
          @if($transaction->products->image != null)
          <img src="{{ Storage::exists('public/uploads/' . $transaction->products->image) ? url('storage/uploads/' . $transaction->products->image) : url('storage/uploads/' . $transaction->products->games->image) }}" class="img-fluid" alt="games" />
          @else
          <img src="{{ url('assets/images/default-product.jpeg') }}" class="img-fluid" alt="games" />
          @endif
          <div class="mt-3">
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
      </div> -->
      {{-- Left side ends --}}
      {{-- Right side starts --}}
      <div class="col-12 col-md-12 col-lg-4 padt-mb-3">
        <div class="purchased-products-item-details-div">
          <div class="purchased-products-item-img">
            @if($transaction->products->image != null)
            <img src="{{ Storage::exists('public/uploads/' . $transaction->products->image) ? url('storage/uploads/' . $transaction->products->image) : url('storage/uploads/' . $transaction->products->games->image) }}" class="img-fluid" alt="games" />
            @else
            <img src="{{ url('assets/images/default-product.jpeg') }}" class="img-fluid" alt="games" />
            @endif
          </div>
          <div>
            <p class="purchased-products-game-name"> {{$transaction->games->name}} {{Str::upper($transaction->products->product_type)}}</p>
            <p class="purchased-products-amount">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($transaction->amount))}}</p>
          </div>
          <div>
            <div>
              <p class="purchased-products-item-details-heading">Purchase Details</p>
            </div>
            <div>
              <p class="purchased-products-game-name">Payment</p>
              <div class="purchased-products-payment-amount-div">
                {{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($transaction->amount))}}
              </div>
            </div>
            <div>
              <p class="purchased-products-game-name">Case ID</p>
              <div class="purchased-products-payment-amount-div d-flex justify-content-between align-items-center">
                <p id="transactionId" class="mb-0">{{$transaction->id}}</p>                
                <i class="fa-solid fa-copy"></i>
              </div>
              <div class="d-flex justify-content-end px-2 py2">
                <h5 id="copied" class="pt-1 text-light hide">Copied</h5>
              </div>  
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="col-md-6 col-sm-12 ps-5 py-5 common-space">
        <h4 class="pur-head pb-4">Seller Information</h4>
        <div class="profile-div">
          <div class="d-flex align-items-start justify-content-start">
              <div class="d-flex justify-content-start">
                  @if(Auth::user() && Auth::user()->profile_picture != null)
                  <img src="{{ url('storage/uploads/' . Auth::user()->profile_picture) }}" class="align-self-center img-fluid dropdown-profile-img me-5" alt="games" />
                  @else
                  <img src="{{ url('assets/images/default-profile-picture.png') }}" class="align-self-center img-fluid profile-img me-5" alt="games" />
                  @endif
              </div>
              <div>
                  <div class="d-flex justify-content-space pt-2">
                      <div class="me-2">
                          @if(Auth::user() && Auth::user()->display_name != null)
                          <p class="mb-0 signup-p text-capitalize">{{Auth::user()->display_name}}</p>
                          @else
                          <p class="mb-0 signup-p text-capitalize">{{Auth::user()->first_name}}</p>
                          @endif
                      </div>
                      <div>
                          @if(Auth::user()->document_verification == 'VERIFIED')
                          <img src="{{ url('assets/images/r-icon.svg') }}" class="img-fluid mb-3" alt="games" />
                          @else
                          <img src="{{ url('assets/images/x-icon.svg') }}" class="img-fluid mb-3" alt="games" />
                          @endif
                      </div>
                  </div>
                  <div class="d-flex justify-content-space pt-1">
                    @for ($i = 1; $i
                    <= Auth::user()->user_rating; $i++) <i class="fa-solid fa-star pink pe-2"></i> 
                        @endfor
                        @for ($j = 1; $j
                        <= ( 5 - Auth::user()->user_rating); $j++) <i class="fa-solid fa-star gray pe-2"></i> 
                            @endfor
                            <a class="signup-lbl">{{showUserRatingPercentage(Auth::id())}}% ({{Auth::user()->total_ratings}})</a>
                  </div>
                  <div class="pt-1">
                    @if(Auth::user()->document_verification == 'VERIFIED')
                    {{-- <img src="{{ url('assets/images/identity-confirm.svg') }}" class="img-fluid" alt="games" /> --}}
                    <p class="profile-p mb-0">Identity Confirmed</p>
                    @else
                    {{-- <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid me-2" alt="games" /> --}}
                    <p class="profile-p mb-0">Identity Not Confirmed</p>
                    @endif
                </div>
              </div>
          </div>
          {{-- <div class="d-flex justify-content-center align-items-center">
              @if(Auth::user()->document_verification == 'VERIFIED')
              <img src="{{ url('assets/images/identity-confirm.svg') }}" class="img-fluid" alt="games" />
              <p class="profile-p mb-0">Identity Confirmed</p>
              @else
              <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid me-2" alt="games" />
              <p class="profile-p mb-0">Identity Not Confirmed</p>
              @endif
          </div> --}}
      </div> -->
      {{-- Right side ends --}}
    </div>

    </div>

  </div>
  {{-- Container ends --}}

</div>
{{-- Blue section ends --}}

@endsection