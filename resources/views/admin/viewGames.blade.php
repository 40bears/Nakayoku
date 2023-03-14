@extends('layout.user')
@section('title', 'All Games | CII')
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
                <a class="nav-link menu-blk {{ Route::is('view-pages') ? 'active' : '' }}" href="{{ route('view-pages') }}">USer Guide Pages</a>
            </li>
        </ul> 
    </div>
    <hr class="pb-5" />

    <div class="d-flex justify-content-between">
        <form action="{{ route('view-games-post') }}" method="POST" class="w-50">
            <div class="d-flex align-items-center">
                <div class="search-div-2">
                    @csrf
                    <input type="text" name="search" class="searchTerm-2" placeholder="Search" value="{{request()->search}}" />
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <a class="signup-a green mx-3" href="{{ route('view-games') }}">clear</a>
            </div>
        </form>
        <a class="nav-link view  game-w" href="{{route('add-game')}}">
            <i class="fa-solid fa-circle-plus me-2"></i>
            ADD GAME
        </a>
    </div>

    <!-- Product list component starts -->
    @if(count($games) != null)
    <div class="row py-4">
    @foreach($games as $game)
    <div class="col-md-4 col-sm-12 sp-mb">
        <div class="white-box">
        <a href="{{ route('view-products', [  'id' => $game->id] ) }}">
                        @if($game->image)
                        <img src="{{ url('storage/uploads/' . $game->image) }}" class="img-fluid admin-games-list top-image" alt="games" />
                        @else
                        <img src="{{ url('assets/images/default-game-new.jpeg') }}" class="img-fluid admin-games-list top-image" alt="games" />
                        @endif
                            <h3 class="menu-h3 pt-3">{{Str::upper($game->name)}}</h3>
                            <p class="products mb-2">{{count($game->products)}} Products</p>
                            <p class="pur-date">{{$game->updated_at->format('Y/M/d')}}</p>
                          
                <div class="d-flex justify-content-between align-items-center pt-2">
                    <a class="nav-link view-2" href="{{ route('edit-game', [ 'id' => $game->id ] ) }}">EDIT</a>
                    @if($game->status == 'PUBLISHED')
                    @if(count($game->products) == 0)
                    <a class="nav-link view sell" href="{{ route('delete-game', [ 'id' => $game->id ] ) }}" onclick="return confirm('Are you sure you want to delete this?')">DELETE</a>
                    @else
                    <a class="nav-link view sell" href="{{ route('update-game-status', [ 'id' => $game->id ] ) }}" onclick="return confirm('You can not delete the game as it have items attached to it. Do you want to put it in draft instead?')">DELETE</a>
                    @endif
                    @else
                    <a class="nav-link view-2" href="{{ route('update-game-status', [ 'id' => $game->id ] ) }}" onclick="return confirm('Are you sure you want to publish this?')">PUBLISH</a>
                    @endif
                </div>
        </a>
        </div>
    </div>
    @endforeach
    </div>
    @else
    <div class="text-center mt-4">
        <h3>No Results</h3>
    </div>
    @endif
    <!-- Product list component ends -->
    @if(Route::is('view-games'))
    <div class="text-center mt-5 d-flex justify-content-center">
        {{$games->links('partials.pagination')}}
    </div>
    @endif
</div>
<!-- Right side ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection