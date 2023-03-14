@extends('layout.main')
@section('title', 'All Games | CII')
@section('main-container')

<div class="container-fluid px-0 bg-lgreen padt-5">
    <div class="container pt-4">
        <ul class="breadcrumb menu menu1">
            <li class="breadcrumb-item"><a href="/">TOP</a></li>
            <li class="breadcrumb-item"><a href="{{ route('all-games') }}">ALL GAMES</a></li>
        </ul>
        <div class="d-flex justify-content-center align-items-center py-5">
            <h2 class="games-h2">ALL GAMES</h2>
          </div>
    </div>

    <!-- Inner menu starts -->
    <div class="container menu">
        <ul class="navbar-nav border-nav scroll">
            @foreach($devices as $device)
            @if(count($device->games) != null)
            <li class="nav-item {{str_contains(url()->current(), $device->name) ? 'active' : ''}}">
                <a class="game-nav" href="{{ route('all-games-by-device', [ 'device' => $device->name ] ) }}">{{Str::upper($device->name)}}</a>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
    <!-- Inner menu ends -->
    <!-- All games starts -->
    <div class="container py-5">
        <div class="row pt-3">
            @if(count($games) == 0)
            <h3 class="games-h2">No Available Games</h3>
            @endif
            @foreach ($games as $game)
            <div class="col-md-3 col-sm-12 space pb-4">
                <a href="{{ route('view-products', [ 'id' => $game->id ] ) }}">
                    @if(!empty($game->image))
                    <img src="{{ url('storage/uploads/' . $game->image ) }}" class="img-fluid top-image" alt="games" />
                    @else
                    <img src="{{ url('assets/images/default-game-new.jpeg') }}" class="img-fluid top-image" alt="games" />
                    @endif
                    <p class="top-game mb-0 pt-3">{{ $game->name }} </p>
                    <p class="top-item mb-0">{{ $game->products->count() }} items</p>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <!-- All games ends -->

    <!-- Pagination starts -->
    <div class="d-flex justify-content-center">
        {{$games->links('partials.pagination')}}
    </div>
    <!-- Pagination ends -->

</div>
@endsection