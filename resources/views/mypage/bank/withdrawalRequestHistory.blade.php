@extends('layout.user')
@section('title', 'Transfer Request History | CII')
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
    <hr class="pb-1" />

    <div>
        @foreach($withdrawalRequests as $withdrawalRequest)
        <div class="d-flex align-items-center justify-content-between pb-3 pt-4">
            <p class="signup-lbl mb-0">{{$withdrawalRequest->created_at->format('Y/M/d')}}</p>
            <div class="d-flex align-items-center">
                <p class="signup-lbl mb-0">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($withdrawalRequest->amount))}}</p>
                @if($withdrawalRequest->withdraw_status == 1)
                <span class="tag-green">Paid</span>
                @else
                <span class="tag-red">Pending</span>
                @endif
            </div>
        </div>
        <hr class="drop-hr" />
        @endforeach
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