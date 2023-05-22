@extends('layout.user')
@section('title', 'Transfer Request History | GLOBAL CARPATICA SL')
@section('main-container')

<!-- Right side starts -->

<div class="col-md-9 col-sm-12 ps-5 request-pad padt-5">
    <h3 class="pb-5 signup-h3">Request History</h3>

    <div>
        <div class="d-flex align-items-center justify-content-between ">
            <p class="thanks-para">Date</p>
            <p class="thanks-para">Price</p>
        </div>
        @if($withdrawalRequests->count() > 0)
        @foreach($withdrawalRequests as $withdrawalRequest)
        <div class="d-flex align-items-center justify-content-between pb-3 pt-4">
            <p class="big-lbl mb-0">{{$withdrawalRequest->created_at->format('Y/M/d')}}</p>
            <div class="d-flex align-items-center">
                <p class="big-lbl mb-0">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($withdrawalRequest->amount))}}</p>
                @if($withdrawalRequest->withdraw_status == 1)
                <span class="tag-green">Paid</span>
                @else
                <span class="tag-red">Pending</span>
                @endif
            </div>
        </div>
        <hr class="drop-hr" />
        @endforeach
        @else
        <br><br>
        <h3 class="pt-5 text-light">There is no withdrawal history.</h3>
        @endif
    </div>
    <div class="d-flex justify-content-center">
        {{$withdrawalRequests->links('partials.pagination')}}
    </div>
</div>
<!-- Right side ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection