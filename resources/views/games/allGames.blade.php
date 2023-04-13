@extends('layout.main')
@section('title', 'All Games | CII')
@section('main-container')

<header class="padt-5">
    <img class="w-100 all-games-heading" src="{{ url('assets/images/allGamesHeader.png') }}" alt="">
</header>

<div class="container-fluid px-0 bg-lgreen padt-5">
    <!-- <div class="container pt-4">
        <ul class="breadcrumb menu menu1">
            <li class="breadcrumb-item"><a href="/">TOP</a></li>
            <li class="breadcrumb-item"><a href="{{ route('all-games') }}">ALL GAMES</a></li>
        </ul>
        <div class="d-flex justify-content-center align-items-center py-5">
            <h2 class="games-h2">ALL GAMES</h2>
          </div>
    </div> -->

    <div class="container">
        <div class="d-flex flex-column flex-md-row">
            <h2 class="carousal-heading me-3">Popular Collections</h2>
            <div class="carousal-nav mx-1 row tab mb-3 overflow-scroll" >
                <a href="{{ route('all-games') }}" class="d-flex justify-content-center align-items-center col tablinks {{ Route::is('all-games') ? 'isActive' : '' }}" id="defaultOpen">
                Show all
                </a>
                <a href="{{ route('all-games-by-device', [ 'device' => 'pc' ] ) }}" class="d-flex justify-content-evenly align-items-center col tablinks {{ str_contains(url()->current(), 'pc') ? 'isActive' : '' }}" id="tablinks">
                    <img src="{{ url('assets/images/TopPageImages/itemsIcon.svg') }}" alt="items" loading="lazy">
                    PC
                </a>
                <a href="{{ route('all-games-by-device', [ 'device' => 'ps4' ] ) }}" class="d-flex justify-content-evenly align-items-center col tablinks {{ str_contains(url()->current(), 'ps4') ? 'isActive' : '' }}" id="tablinks">
                <img src="{{ url('assets/images/TopPageImages/accountIcon.svg') }}" alt="account" loading="lazy">
                    PS4
                </a>
                <a href="{{ route('all-games-by-device', [ 'device' => 'smartphone' ] ) }}" class="d-flex justify-content-evenly align-items-center col tablinks {{ str_contains(url()->current(), 'smartphone') ? 'isActive' : '' }}" id="tablinks">
                <img src="{{ url('assets/images/TopPageImages/currencyIcon.svg') }}" alt="currency" loading="lazy">
                    SMARTPHONE
                </a>
                <a href="{{ route('all-games-by-device', [ 'device' => 'ps5' ] ) }}" class="d-flex justify-content-evenly align-items-center col tablinks {{ str_contains(url()->current(), 'ps5') ? 'isActive' : '' }}" id="tablinks">
                <img src="{{ url('assets/images/TopPageImages/currencyIcon.svg') }}" alt="currency" loading="lazy">
                    PS5
                </a>
            </div>  
        </div>
    </div>

    <!-- Inner menu starts -->
    <!-- <div class="container menu">
        <ul class="navbar-nav border-nav scroll">
            @foreach($devices as $device)
            @if(count($device->games) != null)
            <li class="nav-item {{str_contains(url()->current(), $device->name) ? 'active' : ''}}">
                <a class="game-nav" href="{{ route('all-games-by-device', [ 'device' => $device->name ] ) }}">{{Str::upper($device->name)}}</a>
            </li>
            @endif
            @endforeach
        </ul>
    </div> -->
    <!-- Inner menu ends -->

    <div class="container mb-5">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner slider d-flex" row>
            @foreach($games as $game)
            <a href="{{ route('view-products', [ 'id' => $game->id ] ) }}">
              <div class="carousel-item carousal-data col">
                <img src="{{ url('storage/uploads/' . $game->image ) }}" class=" carousal-data-img" alt="game-image" loading="lazy">
                <p class="carousal-title ">{{ $game->name }}</p>
                <p class="carousal-subheading">{{ $game->products->count() }} Items</p>
              </div>
            </a>
            @endforeach
            </div>
          </div>

        
        
        <h2 class="carousal-heading py-2 mt-4">Exclusive Games</h2>
          <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner slider d-flex" row>
            @foreach($categories as $category)
            <a href="{{ route('view-products', [ 'id' => $category->games[0]->id ] ) }}">
              <div class="carousel-item carousal-data col">
                <img src="{{ url('storage/uploads/' . $category->games[0]->image ) }}" class=" carousal-data-img" alt="game-image" loading="lazy">
                <p class="carousal-title ">{{ $category->games[0]->name }}</p>
                <p class="carousal-subheading">{{ Str::title($category->name) }}</p>
              </div>
            </a>
            @endforeach
            </div>
          </div>

          <h2 class="carousal-heading py-2 mt-4">Recently Added</h2>
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner slider d-flex" row>
            @foreach($games->sortBy('created_at') as $game)
            <a href="{{ route('view-products', [ 'id' => $game->id ] ) }}">
              <div class="carousel-item carousal-data col">
                <img src="{{ url('storage/uploads/' . $game->image ) }}" class=" carousal-data-img" alt="game-image" loading="lazy">
                <p class="carousal-title ">{{ $game->name }}</p>
                <p class="carousal-subheading">{{ $game->products->count() }} Items</p>
              </div>
            </a>
            @endforeach
            </div>
          </div>


        </div>

    <!-- All games starts -->
    <!-- <div class="container py-5">
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
    </div> -->
    <!-- All games ends -->

    

</div>
@endsection