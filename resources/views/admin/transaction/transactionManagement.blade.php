@extends('layout.main')
@section('title', 'Transaction Management | CII')
@section('main-container')

<div class="container-fluid px-0  bg-lgreen">
    <div class="container padt-6">
        <ul class="breadcrumb menu menu1">
            <li class="breadcrumb-item"><a href="/">TOP</a></li>
            <li class="breadcrumb-item"><a href="{{ route('view-my-page') }}">My Page</a></li>
            <li class="breadcrumb-item"><a href="{{ route('transactions-management') }}">Transaction Management</a></li>
        </ul>
    </div>

    <div class="container">
    <h3 class="pb-5 signup-h3 text-center py-5">Admin Section</h3>

    <h2 class="success-h4 text-left">TRANSACTIONS MANAGEMENT</h2>

    <div class="py-5">
        <div class="row">
            <div class="d-flex align-items-center justify-content-start pb-3 pt-3 transaction-div">
                <p class="mb-0 transaction-heading-1 display ">Request Date</p>
                <p class="mb-0 transaction-heading-1 display ipad-none bl">User ID</p>
                <p class="mb-0 transaction-heading-1 bl" style="width: 15%;">Email</p>
                <p class="mb-0 transaction-heading-1 display ipad-none bl">Game</p>
                <p class="mb-0 transaction-heading-1 display ipad-none bl">Purchased Items</p>
                <p class="mb-0 transaction-heading-1 text-align-center-ipad ps-3 bl">Total Price</p>
                <p class="mb-0 transaction-heading-1 text-align-center-ipad text-align-center-sp bl">Unit</p>
                <p class="mb-0 transaction-heading-1 text-right bl">Money Status</p>
            </div>
            @foreach($transactions as $transaction)
            <div class="d-flex align-items-center justify-content-start pb-3 pt-4 bg-white">
                <p class="mb-0 transaction-data-1 display ">{{$transaction->created_at->format('Y/m/d')}}</p>
                <p class="mb-0 transaction-data-1 display ipad-none">{{$transaction->buyer->display_name ? $transaction->buyer->display_name : ($transaction->first_name . $transaction->last_name) }}</p>
                <p class="mb-0 transaction-data-1" style="width: 15%;">{{$transaction->buyer->email}}</p>
                <p class="mb-0 transaction-data-1 display ipad-none">{{$transaction->games->name}}</p>
                <p class="mb-0 transaction-data-1 display ipad-none">{{$transaction->products->name}}</p>
                <p class="mb-0 transaction-data-1 text-align-center-ipad ps-3">{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($transaction->amount))}}</p>
                <p class="mb-0 transaction-data-1 text-align-center-ipad text-align-center-sp">{{$transaction->quantity}}</p>
                <p class="mb-0 transaction-data-1" hidden>{{$transaction->id}}</p>
                @if($transaction->payment_status == 1)
                <p class="mb-0 mx-auto transaction-data-1 terms-a">Approved</p>
                @else
                <form action="{{ route('update-transaction-status', [ 'id' => $transaction->id ] ) }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link view-2 ">Approve</button>
                </form>
                @endif
                <!-- <select name="" id="" class="changeStatus">
                    <option value="0" {{$transaction->payment_status == 0 ? 'selected' : '' }}>未入金</option>
                    <option value="1" {{$transaction->payment_status == 1 ? 'selected' : '' }}>入金</option>
                </select> -->
            </div>
            <hr class="drop-hr">
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{$transactions->links('partials.pagination')}}
        </div>
    </div>
    </div>

    @endsection