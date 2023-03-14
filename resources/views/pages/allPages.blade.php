@extends('layout.user')
@section('title', 'Pages | CII')
@section('main-container')

<!-- Right side starts -->

<div class="col-md-9 col-sm-12 ps-5 common-space">
    <h3 class="pb-5 signup-h3 text-center">Admin Section</h3>
    <div class="menu menu-1 pt-4">
        <ul class="navbar-nav scroll">
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('notification-mmt') ? 'active' : '' }}" href="{{ route('notification-mmt') }}">Notification Portal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('view-games') ? 'active' : '' }}" href="{{ route('view-games') }}">Game List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('id-approvals') ? 'active' : '' }}" href="{{ route('id-approvals') }}">Id Approvals</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('cii-bank-accounts') || Route::is('edit-cii-bank-account') || Route::is('add-cii-bank-account') ? 'active' : '' }}" href="{{ route('cii-bank-accounts') }}">CII Bank Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('transactions-management') ? 'active' : '' }}" href="{{ route('transactions-management') }}">Transactions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('withdraw-requests-management') ? 'active' : '' }}" href="{{ route('withdraw-requests-management') }}">Withdraw Requests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('view-pages') ? 'active' : '' }}" href="{{ route('view-pages') }}">User Guide Pages</a>
            </li>
        </ul> 
    </div>
    <hr class="pb-5" />

    <div class="d-flex justify-content-between align-items-center py-4 px-4 bank-wh mb-5">
        <h3 class="bank-h3">User guide pages</h3>
        <a class="nav-link view  bank-w" href="{{route('add-page-view')}}">
            <i class="fa-solid fa-circle-plus me-2"></i>
            Add page
        </a>
    </div>

    <hr class="drop-hr"/>

    <div>
        @if(count($pages) != 0)
        @foreach ($pages as $page)
        <div class="row">
            <div class="d-flex align-items-center justify-content-between pb-3 pt-4">
                <a class="col-md-6" href="{{ route('view-page', [ 'category' => $page->categories->name, 'page' => $page->title ] ) }}">
                    <p class="min-p mb-0 text-start text-decoration-underline">{{$page->categories->name}}/{{Str::title($page->title)}}</p>
                </a>
                <p class="min-p mb-0 col-md-2 text-center">{{$page->status}}</p>
                <div class="d-flex col-md-4 ms-2 ml-1 align-items-start">
                    <a href="{{ route('edit-page', [ 'id' => $page->id ] ) }}" class="nav-link view-2 me-3">EDIT</a>
                    <a href="{{ route('delete-page', [ 'id' => $page->id ] ) }}" class="nav-link view sell" onclick="return confirm('Are you sure you want to delete this?')">DELETE</a>
                </div>
            </div>
        </div>
        <hr class="drop-hr">
        @endforeach
        @else
        <div class="text-center">
            <h3 class="py-5 border-0">No Pages Added</h3>
        </div>
        <hr>
        @endif

    </div>
    <div class="d-flex justify-content-center">
        {{$pages->links('partials.pagination')}}
    </div>
</div>
<!-- Right side ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection