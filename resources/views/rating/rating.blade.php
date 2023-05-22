@extends('layout.main')
@section('title', 'Rating | GLOBAL CARPATICA SL')
@section('main-container')


{{-- Rating starts --}}

<div class="container-fluid px-0 bg-lgreen py-5">

    <div class="container padt-6 pb-5 bank-info">

        <h3 class="signup-h3">Rate Deal</h3>

        <form action="{{ route('rate-purchase-post') }}" method="POST">
            @csrf

            <div class="row py-5">
                <div class="col-md-6 col-sm-12">
                    <div>
                        @if($transaction->products->image != null)
                        <img src="{{ url('storage/uploads/' . $transaction->products->image) }}" class="img-fluid product-image" alt="games" />
                        @else
                        <img src="{{ url('assets/images/default-product.jpeg') }}" class="img-fluid" alt="games" />
                        @endif
                        <div class="pt-4">
                            <p class="rating-game mb-0">GRAND THEFT AUTO V Currency</p>
                            <p class="rating-amount mb-0 mt-2" id="textLabel">{{ Auth::user() ? Auth::user()->base_currency : Session::get('base_currency') }} {{$transaction->amount}}</p>
                            <div class="d-flex mt-2 justigy-content-start align-items-start">
                                 <p class="rating-un">{{Str::title($transaction->seller->display_name)}}</p>
                                 <img src="{{ url('assets/images/r-icon.svg') }}" class="img-fluid ms-1" alt="check mark" />
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="">
                            <h5 class="mb-0 product-name">Payment</h5>
                            <hr class="drop-hr mt-3" />
                            <p class="detail-p mb-0 mt-3 ms-3" id="textLabel">{{ Auth::user() ? Auth::user()->base_currency : Session::get('base_currency') }} {{$transaction->amount}}</p>
                            <hr class="drop-hr mt-3" />

                            <h5 class="mb-0 mt-3 product-name">Case ID</h5>
                            <hr class="drop-hr mt-3" />
                            <p class="detail-p mb-0 ms-3 mt-3" id="textLabel">{{$transaction->id}}</p>
                            <hr class="drop-hr mt-3" />

                            <div class="d-flex justify-content-center align-items-center py-4">
                                <i class="fa-solid fa-star yellow-star me-1"></i>
                                <i class="fa-solid fa-star gray-star me-1"></i>
                                <i class="fa-solid fa-star gray-star me-1"></i>
                                <i class="fa-solid fa-star gray-star me-1"></i>
                                <i class="fa-solid fa-star gray-star me-1"></i>
                            </div>
            
            
                            <div class="d-flex justify-content-center py-4">
                                <input type="hidden" value="1" class="rating-count-hidden pe-2" name="rating_count">
                                <input type="number" value="1" class="rating-count" name="rating_count" disabled>
                                <input type="hidden" value="{{$transaction->id}}" class="r" name="transaction_id">
                                <h4 class="align-self-center pt-3 mb-0 rating-star">star</h4>
                            </div>

                        <input type="submit" class="signup-btn w-100" id="update" name="update" value="CONTINUE" />
                    </div>
                </div>
            </div>

        </form>
    </div>

</div>
{{-- Rating ends --}}

@endsection