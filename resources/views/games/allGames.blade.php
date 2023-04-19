@extends('layout.main')
@section('title', 'All Games | CII')
@section('main-container')

<header class="padt-5 hide-on-sp">
    <img class="w-100 all-games-heading" src="{{ url('assets/images/allGamesHeader.png') }}" alt="">
</header>
<header class="padt-5 hide-in-pc">
    <img class="w-100 all-games-heading" src="{{ url('assets/images/all-games-mobile.png') }}" alt="">
</header>

<div class="container-fluid px-0 bg-lgreen padt-5">

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

</div>
@endsection