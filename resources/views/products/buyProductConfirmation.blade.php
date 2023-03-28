@extends('layout.main')
@section('title', $product->name . ' | CII')
@section('main-container')

<div class="container-fluid px-0 bg-lgreen">

    <!-- Buy  starts -->
    <div class="container pmypage padt-6 padt-mb-8">
        <img src="{{ url('assets/images/goback-mark.svg') }}" class="img-fluid" alt="goback" />
        <a href="{{ route('view-product-details', [ 'id' => $product->games->id, 'product_name' => makeURL($product->name) ] ) }}" class="go-back ps-3"> GO BACK</a>

        <!-- Buying details starts -->
        <div class="row pt-5">

        <div class="col-md-12 col-sm-12">
            <h4 class="buy-confirmation-page-heading py-lg-4 py-md-4 py-sm-5">Confirmation of purchase details</h4>
        </div>

        <div class="col-md-4 col-sm-12 pt-md-4">
            <div>
                @if($product->image != null)
                <img src="{{ url('storage/uploads/' . $product->games->image ) }}" class="img-fluid w-100" alt="games" />
                @else
                <img src="{{ url('assets/images/default-product.jpeg') }}" class="img-fluid w-100" alt="games" />
                @endif
            </div>
            <div>

            </div>
        </div>
        <div class="col-md-8 col-sm-12 pt-md-4 ps-lg-5 ps-sm-2 pt-4">
            <form action="{{ route('buy-product', [ 'id' => $product->id, 'selectedBank' => $selectedFelisBank->id ] ) }}" method="POST">
            @csrf
                <div class="w-75 w-mb-100 mb-3">
                    <p class="buy-confirmation-product-details mb-0">Price</p>
                    <p class="buy-confirmation-product-values mb-0"><span>{{showCurrencySymbol()}}</span> {{formatPrice($price)}} </p>
                </div>
                <div class="w-75 w-mb-100 mb-3">
                    <p class="buy-confirmation-product-details mb-0">Payment</p>
                    <p class="buy-confirmation-product-values mb-0"><span>{{showCurrencySymbol()}}</span> {{formatPrice($price)}} </p>
                </div>

                @if(request()->has('quantity'))
                <div class="w-75 w-mb-100 mb-3">
                    <p class="buy-confirmation-product-details mb-0">Quantity</p>
                    <p class="buy-confirmation-product-values mb-0">{{request()->get('quantity')}}</p>
                </div>
                @endif
                <input type="hidden" min="0" name="quantity" id="" value="{{$price / showConvertedPrice($product->price)}}" />

                <p class="text-p mb-4 w-75 w-mb-100">
                    By selecting Agree and countinue, I agree to CLASS INNOVATION INTERNATIONAL
                    <a href="{{ route('terms-and-conditions') }}" class="terms-a">Terms of Conditions</a> and acknowledge the
                    <a href="{{ route('privacy-policy') }}" class="terms-a">Privacy Policy</a>.
                </p>
                <div class="d-flex justify-content-center w-75 w-mb-100">
                    <button type="submit" class="text-center signup-btn d-flex justify-content-center align-items-center w-50 w-mb-100">
                        Buy / Get confirm mail
                    </button>
                </div>
            </form>
        </div>

            <!-- Left side starts -->
            <!-- <div class="col-md-7 col-sm-12"> -->

                <!-- Purchase details  starts -->
                <!-- <hr class="drop-hr">
                <div class="d-flex flex-row justify-content-start px-3 pt-4">
                    <div class="pe-3">
                        @if($product->image != null)
                        <img src="{{ url('storage/uploads/' . $product->games->image ) }}" class="img-fluid product-img" alt="games" />
                        @else
                        <img src="{{ url('assets/images/default-product.jpeg') }}" class="img-fluid product-img" alt="games" />
                        @endif
                    </div>

                    <div class="d-flex flex-column justify-content-start">
                        <p class="buy-p mb-0"> {{Str::upper($product->games->name)}} {{Str::upper($product->product_type)}}</p>
                        <p class="box-p2 mb-0 pt-2"><span>{{showCurrencySymbol()}}</span> {{Auth::user()->base_currency == 'JPY' ? formatPrice(intVal($price)) : formatPrice($price)}} </p>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-start px-3 pb-4">
                    <div class="invisible pe-3">
                        <img src="{{ url('storage/uploads/' . $product->games->image ) }}" class="img-fluid product-img" alt="games" />
                    </div>
                    <div>
                        <a href="{{ route('profile-page', [ 'id' => $product->user_id ] ) }}" class="detail-a detail-p">{{$product->user->first_name}}</a>
                        <img src="{{ url('assets/images/check-mark.png') }}" class="img-fluid" alt="games" />
                    </div>
                </div>
                <hr class="drop-hr"> -->
                <!-- Purchase details ends -->

                <!-- Hidden Bank details starts for future use -->
                <!-- <h4 class="pt-5 pb-2">Choose Payment address</h4>
                <p class="buy-p">Payment can be made by bank transfer from any bank in the US.</p>

                <p class="form-label pt-4 pb-2">Bank</p>

                <form action="{{route('buy-product-confirmation', [ 'id' => $product->id ])}}" method="POST" id="changeBankForm">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" class="d-none">Select</label>
                        <select class="select-bank buy-p w-100 minimal-1 changeBankSelect" id="exampleFormControlSelect1" name="felis_bank">
                            @foreach ($felisBankAccounts as $felisBankAccount)
                            <option value="{{$felisBankAccount->id}}" {{$felisBankAccount->id == $selectedFelisBank->id ? 'selected' : ''}}>{{$felisBankAccount->bank_name}} -- {{$felisBankAccount->account_number}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>

                <div class="d-flex flex-row justify-content-between border-nav pb-3 pt-5 px-3">
                    <p class="detail-p mb-0">Bank name</p>
                    <p class="detail-p mb-0">{{$selectedFelisBank->bank_name}}</p>
                </div>

                <div class="d-flex flex-row justify-content-between border-nav py-3 px-3">
                    <p class="detail-p mb-0">SWIFT Code</p>
                    <p class="detail-p mb-0">{{$selectedFelisBank->swift_code}} </p>
                </div>

                <div class="d-flex flex-row justify-content-between border-nav py-3 px-3">
                    <p class="detail-p mb-0">Branch Name</p>
                    <p class="detail-p mb-0">{{$selectedFelisBank->branch_name}}</p>
                </div>

                <div class="d-flex flex-row justify-content-between border-nav py-3 px-3">
                    <p class="detail-p mb-0">Account Type</p>
                    <p class="detail-p mb-0">{{$selectedFelisBank->account_type}}</p>
                </div>

                <div class="d-flex flex-row justify-content-between border-nav py-3 px-3">
                    <p class="detail-p mb-0">Branch Number</p>
                    <p class="detail-p mb-0">{{$selectedFelisBank->branch_code}}</p>
                </div>

                <div class="d-flex flex-row justify-content-between border-nav py-3 px-3">
                    <p class="detail-p mb-0">Account No</p>
                    <p class="detail-p mb-0">{{$selectedFelisBank->account_number}}</p>
                </div>

                <div class="d-flex flex-row justify-content-between border-nav py-3 px-3">
                    <p class="detail-p mb-0">Account Name</p>
                    <p class="detail-p mb-0">{{$selectedFelisBank->account_name}}</p>
                </div> -->
                <!-- Bank details ends -->
            <!-- </div> -->

            <!-- Left side ends -->

            <!-- Right side starts -->
            <!-- <div class="col-md-5 col-sm-12 ps-5 common-space">
                <form action="{{ route('buy-product', [ 'id' => $product->id, 'selectedBank' => $selectedFelisBank->id ] ) }}" method="POST">
                    @csrf
                    <div class="border-box">
                        <div class="d-flex flex-row justify-content-between align-items-center  py-3">
                            <p class="signup-lbl mb-0">Price</p>
                            <p class="pur-amount mb-0"><span>{{showCurrencySymbol()}}</span> {{formatPrice($price)}} </p>
                        </div>

                        <hr class="drop-hr">

                        <div class="d-flex flex-row justify-content-between align-items-center py-3">
                            <p class="signup-lbl mb-0">Payment</p>
                            <p class="pur-amount mb-0"><span>{{showCurrencySymbol()}}</span> {{formatPrice($price)}} </p>
                        </div>

                        @if(request()->has('quantity'))
                        <hr class="drop-hr">
                        <div class="d-flex flex-row justify-content-between align-items-center py-3">
                            <p class="signup-lbl mb-0">Quantity</p>
                            <p class="pur-amount mb-0">{{request()->get('quantity')}}</p>
                        </div>
                        @endif
                    </div>

                    <input type="hidden" min="0" name="quantity" id="" value="{{$price / showConvertedPrice($product->price)}}" />

                    <p class="text-p mb-4 pt-5">
                        By selecting Agree and countinue, I agree to CLASS INNOVATION INTERNATIONAL
                        <a href="{{ route('terms-and-conditions') }}" class="terms-a">Terms of Conditions</a> and acknowledge the
                        <a href="{{ route('privacy-policy') }}" class="terms-a">Privacy Policy</a>.
                    </p>
                    <button type="submit" class="signup-btn w-100 d-flex justify-content-center align-items-center">
                        Buy / Get confirm mail
                    </button>
                </form>

            </div> -->
            <!-- Right side ends -->

        </div>
        <!-- Buying details ends -->


    </div>
    <!-- Buy ends -->

</div>

@endsection