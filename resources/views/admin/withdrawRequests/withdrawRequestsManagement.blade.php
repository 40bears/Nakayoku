@extends('layout.main')
@section('title', 'Withdraw Requests Management | CII')
@section('main-container')

<div class="container-fluid px-0 bg-lgreen">
    <div class="container padt-6">
        <ul class="breadcrumb menu menu1">
            <li class="breadcrumb-item"><a href="/">TOP</a></li>
            <li class="breadcrumb-item"><a href="{{ route('view-my-page') }}">My Page</a></li>
            <li class="breadcrumb-item"><a href="{{ route('withdraw-requests-management') }}">Withdraw Requests Management</a></li>
        </ul>
    </div>

<div class="container">
        <h3 class="pb-5 signup-h3 text-center py-5">Admin Section</h3>
        <h2 class="success-h4 text-left">WITHDRAW REQUESTS MANAGEMENT</h2>
    <div class="py-5">
        <div class="row ">
            <div class="d-flex align-items-center justify-content-start pb-3 pt-3  ms-sm-0 transaction-div">
                <p class="mb-0 withdraw-heading-1 ipad-none">Request Date</p>
                <!-- <p class="mb-0 withdraw-heading-1 display">購入日<br><span class="withdraw-heading-2">Approved Date</span></p> -->
                <p class="mb-0 withdraw-heading-1 bl">User ID</p>
                <p class="mb-0 withdraw-heading-1 display ipad-none bl" style="width: 13%;">Email</p>
                <p class="mb-0 withdraw-heading-1 bl">Total Amount</p>
                <p class="mb-0 withdraw-heading-1 bl">Bank Name</p>
                <p class="mb-0 withdraw-heading-1 display bl">Branch</p>
                <p class="mb-0 withdraw-heading-1 bl">Brach Num</p>
                <p class="mb-0 withdraw-heading-1 display bl">Account Type</p>
                <p class="mb-0 withdraw-heading-1 bl">Account Num</p>
                <p class="mb-0 withdraw-heading-1 text-right bl">Withdraw Status</p>
            </div>
        </div>
        @foreach($withdrawRequests as $withdrawRequest)
        <div class="row">
            <div class="d-flex align-items-center justify-content-start pb-3 pt-4  ms-sm-0 bg-white">
                <p class="mb-0 withdraw-data-1 ipad-none">{{$withdrawRequest->created_at->format('Y/m/d')}}</p>
                <!-- <p class="mb-0 withdraw-data-1 display">{{$withdrawRequest->created_at->format('Y/M/d')}}</p> -->
                <p class="mb-0 withdraw-data-1">{{$withdrawRequest->users->display_name ? $withdrawRequest->users->display_name : ($withdrawRequest->first_name . $withdrawRequest->last_name) }}</p>
                <p class="mb-0 withdraw-data-1 display ipad-none" style="width: 15%;">{{$withdrawRequest->users->email}}</p>
                <p class="mb-0 withdraw-data-1 ">{{showCurrencySymbol()}}{{formatPrice(showConvertedPrice($withdrawRequest->amount))}}</p>
                <p class="mb-0 withdraw-data-1">{{$withdrawRequest->users->bankDetails?->bank_name}}</p>
                <p class="mb-0 withdraw-data-1 display">{{$withdrawRequest->users->bankDetails?->branch_name}}</p>
                <p class="mb-0 withdraw-data-1 ">{{$withdrawRequest->users->bankDetails?->branch_code}}</p>
                <p class="mb-0 withdraw-data-1 display">{{$withdrawRequest->users->bankDetails?->account_type}}</p>
                <p class="mb-0 withdraw-data-1 ">{{$withdrawRequest->users->bankDetails?->account_number}}</p>
                @if($withdrawRequest->withdraw_status == 1)
                <p class="mb-0 transaction-approve-btn withdraw-data-1 ps-2 terms-a">Approved</p>
                @else
                <form action="{{ route('update-withdraw-requests-status', [ 'id' => $withdrawRequest->id ] ) }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link view-2 ">Approve</button>
                </form>
                @endif
            </div>
            <hr class="drop-hr">
        </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{$withdrawRequests->links('partials.pagination')}}
        </div>
        {{-- <hr> --}}
    </div>
    </div>
</div>
    @endsection