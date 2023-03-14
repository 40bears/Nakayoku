@extends('layout.user')
@section('title', 'Transfer Request | CII')
@section('main-container')

<!-- Right side starts -->

<div class="col-md-9 col-sm-12 ps-5 common-space">
    <h3 class="pb-5 signup-h3 text-center">Money Management</h3>
    <div class="menu menu-1 pt-4">
        <ul class="navbar-nav scroll">
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('sales-and-deposits') ? 'active' : '' }}" href="{{ route('sales-and-deposits') }}">Sales and deposit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('withdrawal-request') ? 'active' : '' }}" href="{{ route('withdrawal-request') }}">Transfer request</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('withdrawal-request-history') ? 'active' : '' }}" href="{{ route('withdrawal-request-history') }}">Request history</a>
            </li>
        </ul>
    </div>
    <hr />

    <div class=" align-items-center justify-content-center d-flex flex-column mt-5">
        <div class="balance-box form-container">
            <div class="d-flex align-items-start pb-2">
                <p class="finish me-3">Balance</p>
                <p class="dollar-p2 pe-2 mb-0">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice(Auth::user()->balance))}}</p>
            </div>
            <p class="signup-lbl mb-0 pb-4">Price(per unit)</p>
            <form action="{{ route('withdrawal-request-post') }}" method="POST" id="withdraw-request-form">
                @csrf
                <div class="d-flex justify-content-between align-items-center form-input-2 w-request">
                    <span class="big-lbl">{{ Auth::user()->base_currency  }}</span>
                    <input type="number" step="0.01" name="amount" class="input-text text-end flex-grow-1 big-lbl" id="withdrawal-amount" min="0">
                </div>
                @if($errors->has('amount'))
                <div class="d-flex align-items-center">
                    <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                    <p class="error-p">{{$errors->first('amount')}}</p>
                </div>
                @endif
                @if($errors->has('error'))
                <div class="d-flex align-items-center">
                    <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                    <p class="error-p">{{$errors->first('error')}}</p>
                </div>
                @endif
                <p class="min-p pt-3 pb-0">(Minimum transfer is {{showCurrencySymbol()}} {{formatPrice(showConvertedPrice(8))}})</p>
                <hr class="drop-hr" />
                <div class="d-flex justify-content-between align-items-center py-2">
                    <span class="signup-lbl">Transfer fee</span>
                    <p class="price-2 mb-0">{{showCurrencySymbol()}} <span class="big-lbl" id="transfer-fees">{{formatPrice(showConvertedPrice(2))}}</span></p>
                </div>
                <hr class="drop-hr" />
                <div class="d-flex justify-content-between align-items-center py-2">
                    <span class="signup-lbl">Total Transfer Amount</span>
                    <p class="dollar-p2 mb-0">{{showCurrencySymbol()}} <span class="dollar-p1" id="total-withdrawal-amount">{{showConvertedPrice(0)}}</span></p>
                </div>
                <hr class="drop-hr"/>
                <div class="d-flex justify-content-end pt-5">
                    <button type="button" class="signup-btn w-100 d-flex justify-content-center align-items-center" data-toggle="modal" data-target="#basicModal2">
                        Send Request
                    </button>
                    <!-- <input type="submit" class="nav-link btn-blue button-1 w-40" id="submit-withdrawal-request" name="sendRequest" value="Send Request" /> -->
                </div>
                <!-- modal starts -->
                <div class="container">
                    <div class="modal fade" id="basicModal2" tabindex="-1" role="dialog" aria-labelledby="basicModal2" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content py-2">
                                <div class="modal-header position-absolute w-100 pt-2">
                                    <img src="{{ url('assets/images/withdraw-icon.svg') }}" class="img-fluid" alt="withdraw">
                                </div>
                                <div class="modal-body mt-5">
                                    <h4 class="sure-p1 pb-3 border-0 text-center pt-2">Are you sure you want to withdraw this amount?</h4>
                                    <p class="sure-p2 text-center form-p mb-0 pt-0">(Your request will be processed and you will be informed via mail once it is approved by Administration)</p>
                                </div>
                                <div class="modal-footer border-0 d-flex flex-row flex-nowrap">
                                    <a class="withdraw-modal-button-1 signup-btn cancel-bg w-50 text-center" data-dismiss="modal">Cancel</a>
                                    <a id="withdraw-modal-button-2" class="signup-btn w-50 text-center">Confrim</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal ends -->
            </form>
        </div>
    </div>

    {{-- <div class="d-flex align-items-center justify-content-between pt-5 pb-3">
        <p class="mypage-p pt-4">Balance (including sales proceeds)</p>
        <p class="dollar-p pe-2 mb-0">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice(Auth::user()->balance))}}</p>
    </div>
    <hr> --}}

    {{-- <div class="d-flex flex-column align-items-end pt-5">
        <div class="d-flex justify-content-start w-request">
            <p class="form-label mb-0 pb-4">Price(per unit)</p>
        </div>
        <form action="{{ route('withdrawal-request-post') }}" method="POST" id="withdraw-request-form">
            @csrf
            <div class="d-flex justify-content-between align-items-center form-input-2 w-request">
                <span class="big-lbl">{{ Auth::user()->base_currency  }}</span>
                <input type="number" step="0.01" name="amount" class="input-text text-end flex-grow-1" id="withdrawal-amount" min="0">
            </div>
            @if($errors->has('amount'))
            <div class="d-flex align-items-center">
                <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('amount')}}</p>
            </div>
            @endif
            @if($errors->has('error'))
            <div class="d-flex align-items-center">
                <img src="{{ url('assets/images/cancel-mark.png') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p w-75">{{$errors->first('error')}}</p>
            </div>
            @endif
            <p class="min-p pt-4 text-end pb-4">Minimum transfer is {{showCurrencySymbol()}} {{formatPrice(showConvertedPrice(8))}}</p>
            <hr />
            <div class="d-flex justify-content-between align-items-center py-4">
                <span class="form-label">Transfer fee</span>
                <p class="big-lbl">{{showCurrencySymbol()}} <span class="big-lbl" id="transfer-fees">{{formatPrice(showConvertedPrice(2))}}</span></p>
            </div>
            <hr />
            <div class="d-flex justify-content-between align-items-center py-4">
                <span class="form-label">Total Transfer Amount</span>
                <p class="dollar-p1">{{showCurrencySymbol()}} <span class="dollar-p1" id="total-withdrawal-amount">{{showConvertedPrice(0)}}</span></p>
            </div>
            <hr />
            <div class="d-flex justify-content-end pt-5">
                <button type="button" class="nav-link btn-blue button-1 w-40 d-flex justify-content-center align-items-center" data-toggle="modal" data-target="#basicModal2">
                    Send Request
                </button>
                <!-- <input type="submit" class="nav-link btn-blue button-1 w-40" id="submit-withdrawal-request" name="sendRequest" value="Send Request" /> -->
            </div>
            <!-- modal starts -->
            <div class="container">
                <div class="modal fade" id="basicModal2" tabindex="-1" role="dialog" aria-labelledby="basicModal2" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content py-2">
                            <div class="modal-header position-absolute w-100" style="line-height: 50px;">
                                <button style="z-index:9;" id="close-modal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4 class="pb-3 border-0 text-center pt-2" style="line-height: 35px;">Are you sure you want to withdraw this amount?</h4>
                                <p class="text-center form-p mb-0 pt-0">Your request will be processed and you will be informed via mail once it is approved by Administration .</p>
                            </div>
                            <div class="modal-footer border-0 d-flex flex-row flex-nowrap">
                                <a class="withdraw-modal-button-1 btn-green w-50 text-danger" data-dismiss="modal">Cancel</a>
                                <a id="withdraw-modal-button-2" class="nav-link btn-green button-1 w-50 border-0">Confrim</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal ends -->
        </form>
    </div> --}}
</div>
<!-- Right side ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection