@extends('layout.main')
@section('title', 'Dashboard | CII')
@section('main-container')

      @if(Route::is('dashboard') || Route::is('dashboard-by-product-type'))

      <!-- Ambalika's code starts -->
      <div id="main-open-container" onclick="closeMenu()" class="container-fluid px-0 main-open-container">
      <div class=" container py-4 top-heading-container" style="margin-top: 10rem">
          <h5 class="top-heading sp-pad6">Discover The Ultimate</h5>
          <h1 class="top-sub-heading">Gaming Marketplace</h1>
      </div>

      <!-- Hero section -->
      <div class="d-flex  hero-section hide-in-mob">
        <div class="col w-16 animate__animated animate__slow animate__slideInUp">

            <div class="row hero-card">
              <a href="javascript:void(0)">
                <img src="{{ url('assets/images/TopPageImages/WorldCraft.jpg') }}" class="size-md hero-img" alt="game-image">
                <div class="img-overlay-left">
                </div>
              </a>
            </div>

            <div class="row hero-card card1">
              <a href="javascript:void(0)">
                <img src="{{ url('assets/images/TopPageImages/ApexLegends.jpg') }}" class="size-md hero-img" alt="game-image">
                <div class="img-overlay-left-second">
                </div>
              </a>
            </div>

        </div>

        <div class="col-8 my-3">
          <!-- searchbar -->
          <!-- <form class="d-flex w-100 display" action="{{ route('dashboard-search') }}" method="POST">
            @csrf
            <input type="text" class="search-text-box searchTerm" autocomplete="off" name="top_page_search" id="dashboard_game_name" placeholder="What are you looking for?" value="{{request()->get('top_page_search')}}">
            <button type="submit" class="searchButton">
                <i class="fa-solid fa-magnifying-glass icon txt-blk"></i>
            </button>
          </form> -->
          <div class="searchbar-main">
            <div class="d-flex justify-content-center">
              <div class="searchbar">
                <div class="py-1 mx-4 my-2">
                <form class="d-flex w-100 display" action="{{ route('dashboard-search') }}" method="POST">
                  @csrf
                  <i class="fa-solid fa-magnifying-glass search-icon"></i>
                  <input class="search-placeholder search-input" placeholder="Search games, items, currency & Account" autocomplete="off" name="top_page_search" id="dashboard_game_name" value="{{request()->get('top_page_search')}}"> 
                </form>
                </div>
              </div>  
            </div>
          </div>

          <div class="row">

            <div class="col hero-card w-16 card1 animate__animated animate__slow animate__slideInUp	">
              <a href="javascript:void(0)">
                <img src="{{ url('assets/images/TopPageImages/GrandTheft.jpg') }}" class="size-md hero-img" alt="game-image">
                <div class="img-overlay">
                </div></a>
            </div>
            <div class="col hero-card w-16 card2 animate__animated animate__slow animate__slideInUp">
              <a href="javascript:void(0)">
              <img src="{{ url('assets/images/TopPageImages/Dota 2.png') }}" class="size-md hero-img" alt="game-image">
                <div class="img-overlay">
                </div></a>
            </div>
            <div class="col hero-card hide-hero-card w-16 animate__animated animate__slow animate__slideInUp">
              <a href="javascript:void(0)">
              <img src="{{ url('assets/images/TopPageImages/Fallout76.jpg') }}" class="size-md hero-img" alt="game-image">
                <div class="img-overlay">
                </div></a>
            </div>
            <div class="col hero-card w-16 card4 animate__animated animate__slow animate__slideInUp">
              <a href="javascript:void(0)">
              <img src="{{ url('assets/images/TopPageImages/Freefire.png') }}" class="size-md hero-img" alt="game-image">
                <div class="img-overlay">
                </div></a>
            </div>

          </div>

        </div>
        
        <div class="col w-16 card5 animate__animated animate__slow animate__slideInUp">
          <div class="hero-card" data-aos="fade-up">
            <a href="javascript:void(0)">
            <img src="{{ url('assets/images/TopPageImages/ClassicRoyale.jpg') }}" class="size-md hero-img" alt="game-image">
              <div class="">
              </div></a>
          </div>

          <div class="hero-card card1" data-aos="fade-up">
            <a href="javascript:void(0)">
            <img src="{{ url('assets/images/TopPageImages/BlackDessert.jpg') }}" class="size-md hero-img" alt="game-image">
              <div class="">
              </div></a>
          </div>
      </div>
      </div>


      <!-- SP View for HERO SECTION -->

      <div class="hide-in-pc">
        <div class="p-3 d-flex justify-content-center">
          <div class="searchbar-main">
            <div class="d-flex justify-content-center">
              <div class="searchbar">
                <div class="py-1 mx-4 my-2">
                  <i class="fa-solid fa-magnifying-glass search-icon"></i>
                  <input class="search-placeholder search-input" placeholder="Search games, items, currency & Account"> 
                </div>
              </div>  
            </div>
          </div>
        </div>

        <div class="hero-section-mobile">

          <div class="row d-flex">
            <div class="hero-card-mobile mb-5 mx-1 col animate__animated animate__slower animate__slideInUp">
              <img src="{{ url('assets/images/TopPageImages/BlackDessert.jpg') }}" class="size-md my-2 hero-img" alt="game-image">
            </div>
            <div class="hero-card-mobile mt-4 col mx-1  animate__animated animate__slideInUp">
              <img src="{{ url('assets/images/TopPageImages/ApexLegends.jpg') }}" class="size-md my-2 hero-img" alt="game-image">
            </div>
            <div class="hero-card-mobile mt-5 col mx-1  animate__animated animate__slideInUp">
              <img src="{{ url('assets/images/TopPageImages/ClassicRoyale.jpg') }}" class="size-md my-2 hero-img" alt="game-image">
            </div>
            <div class="hero-card-mobile mt-3 col mx-1  animate__animated animate__slideInUp">
              <img src="{{ url('assets/images/TopPageImages/WorldCraft.jpg') }}" class="size-md my-2 hero-img" alt="game-image">
            </div>
            <div class="hero-card-mobile mb-4 col mx-1  animate__animated animate__slideInUp">
              <img src="{{ url('assets/images/TopPageImages/Freefire.png') }}" class="size-md my-2 hero-img" alt="game-image">
            </div>
          </div>

        </div>
      </div>


      <!-- Company Table -->

      <div class=" company-table">
        <div class="container heading-container">
          <h2 class="table-heading">Trending Sells</h2>
          <a class="see-all" href="{{ route('all-games') }}">See All</a>  
        </div>

        <div class="container d-flex justify-content-center">
          <div class="table-main-container">
            
            @foreach($transactions as $transaction)
            <div class="table-main table-row row text-decoration-none">
              <div class="d-flex align-items-center w-25 col-4">
                @if($transaction->seller->profile_picture != null)
                <img src="{{ url('storage/uploads/' . $transaction->seller->profile_picture ) }}" class="  pe-1 size-md " alt="profile-image">
                @else
                <img src="{{ url('assets/images/TopPageImages/duck.png') }}" class="  pe-1 size-md" alt="profile-image">
                @endif
                <div class="mx-2">{{$transaction->seller->first_name}}</div>
              </div>
              <div class="col-6 desc-card-mobile">
                <p class="company-sell-time">15 hours ago</p>
                <p class="company-detail">{{$transaction->products->name}}</p>
              </div>
              <!-- <a class="view-details col-3 pe-4 text-decoration-none" href="javascript:void(0)">View Details</a> -->
              <a class="view-details col-3 pe-4 text-decoration-none" href="{{ route('view-product-details', [ 'product_name' => makeURL($transaction->products->name), 'id' => $transaction->products->id] ) }}">View Details</a>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <!-- Popular Collections -->
      <div id="popular-collection">
          <!-- header section of carousal -->
            <div class="container py-5" >
              <div class="d-flex pt-5 game-cards">
                <form action="">
                  
                </form>
                <h2 class="carousal-heading">Popular Collections</h2>
                <div class="time-dropdown">
                  <select name="Last 24 hours" id="cars" class="dropdown">
                    <option value="Last 12 hours">Last 12 hours</option>
                    <option value="Last 8 hours">Last 8 hours</option>
                    <option value="Last 6 hours">Last 6 hours</option>
                  </select>
                </div>
                <div class="carousal-nav mx-1 row tab" >
                  <a href="/" class="d-flex justify-content-center align-items-center col tablinks {{ Route::is('dashboard') ? 'isActive' : '' }}" id="defaultOpen">
                    Show all
                  </a>
                  <!-- <button class="col tablinks" id="tablinks" onclick="viewCollections(this)"> -->
                    <a href="{{ route('dashboard-by-product-type', ['product_type' => 'item'] ) }}" class="d-flex justify-content-evenly align-items-center col tablinks {{ str_contains(url()->current(), 'item') ? 'isActive' : '' }}" id="tablinks">
                      <img src="{{ url('assets/images/TopPageImages/itemsIcon.svg') }}" alt="items" loading="lazy">
                      Items
                    </a>
                  <!-- </button> -->
                  <a href="{{ route('dashboard-by-product-type', ['product_type' => 'account'] ) }}" class="d-flex justify-content-evenly align-items-center col tablinks {{ str_contains(url()->current(), 'account') ? 'isActive' : '' }}" id="tablinks">
                    <img src="{{ url('assets/images/TopPageImages/accountIcon.svg') }}" alt="account" loading="lazy">
                    Account
                  </a>
                  <a href="{{ route('dashboard-by-product-type', ['product_type' => 'currency'] ) }}" class="d-flex justify-content-evenly align-items-center col tablinks {{ str_contains(url()->current(), 'currency') ? 'isActive' : '' }}" id="tablinks">
                    <img src="{{ url('assets/images/TopPageImages/currencyIcon.svg') }}" alt="currency" loading="lazy">
                    Currency
                  </a>
                </div>  

              </div>
            
              <!-- body section -->
              <div class="row py-4">

                <!-- 1st container -->
                <div class="game-container col mx-3 d-flex flex-column justify-content-around">
                  @foreach($popularProducts1 as $item)
                  <a class="text-decoration-none" href="{{ route('view-product-details', [ 'product_name' => makeURL($item->name), 'id' => $item->id] ) }}">
                    <div class="d-flex p-2 row justify-content-between">
                      <div class="d-flex col-8 pe-5">
                        <div>
                          <!-- <img src="{{ url('assets/images/TopPageImages/GameImg3.png') }}" class="  pe-1 size-md m-1 game-image" alt="profile-image"> -->
                          @if($item->games->image != null)
                          <img src="{{ url('storage/uploads/' . $item->games->image ) }}" class="  pe-1 size-md m-1 game-image" alt="profile-image">
                          @else
                          <img src="{{ url('assets/images/default-profile-picture.png') }}" class="pe-1 size-md m-1 game-image" alt="games" />
                          @endif
                        </div>
                        <div class="color-white align-self-center col-10">
                          <span class="game-box-title">{{Str::limit($item->name, 50, $end='.......')}}</span>
                          <img src="{{ url('assets/images/TopPageImages/Checkmark.svg') }}" class="checkmark">
                          <div class="game-box-subheading d-flex pl-0">
                            <span class="mr-3">{{$item->stock_quantity}}</span>
                            <span class="mr-3">105.75</span>
                          </div>
                        </div>
                      </div>
                      <p class=" game-price col-4 d-flex justify-content-center" >{{showCurrencySymbol()}} {{Str::limit(formatPrice(showConvertedPrice($item->price)), 8, $end='.....')}}</p>
                    </div>  
                  </a>
                  @endforeach
                </div>

                <!-- container 2 -->
                <div class="game-container col mx-3 d-flex flex-column justify-content-around">
                  @foreach($popularProducts2 as $item)
                  <a class="text-decoration-none" href="{{ route('view-product-details', [ 'product_name' => makeURL($item->name), 'id' => $item->id] ) }}">
                    <div class="d-flex p-2 row justify-content-between">
                      <div class="d-flex col-8 pe-5">
                        <div>
                          @if($item->games->image != null)
                          <img src="{{ url('storage/uploads/' . $item->games->image ) }}" class="  pe-1 size-md m-1 game-image" alt="profile-image">
                          @else
                          <img src="{{ url('assets/images/default-profile-picture.png') }}" class="pe-1 size-md m-1 game-image" alt="games" />
                          @endif
                        </div>
                        <div class="color-white align-self-center col-10">
                          <span class="game-box-title">{{Str::limit($item->name, 50, $end='.......')}}</span>
                          <img src="{{ url('assets/images/TopPageImages/Checkmark.svg') }}" class="checkmark">
                          <div class="game-box-subheading d-flex pl-0">
                            <span class="mr-3">{{$item->stock_quantity}}</span>
                            <span class="mr-3">105.75</span>
                          </div>
                        </div>
                      </div>
                      <p class=" game-price col-4 d-flex justify-content-center" >{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($item->price))}}</p>
                    </div>  
                  </a>
                  @endforeach
                </div>

                <!-- container 3 -->
                <div class="game-container col mx-3 d-flex flex-column justify-content-around">
                  @foreach($popularProducts3 as $item)
                  <a class="text-decoration-none" href="{{ route('view-product-details', [ 'product_name' => makeURL($item->name), 'id' => $item->id] ) }}">
                    <div class="d-flex p-2 row justify-content-between">
                      <div class="d-flex col-8 pe-5">
                        <div>
                          @if($item->games->image != null)
                          <img src="{{ url('storage/uploads/' . $item->games->image ) }}" class="  pe-1 size-md m-1 game-image" alt="profile-image">
                          @else
                          <img src="{{ url('assets/images/default-profile-picture.png') }}" class="pe-1 size-md m-1 game-image" alt="games" />
                          @endif
                        </div>
                        <div class="color-white align-self-center col-10">
                          <span class="game-box-title">{{Str::limit($item->name, 50, $end='.......')}}</span>
                          <img src="{{ url('assets/images/TopPageImages/Checkmark.svg') }}" class="checkmark">
                          <div class="game-box-subheading d-flex pl-0">
                            <span class="mr-3">{{$item->stock_quantity}}</span>
                            <span class="mr-3">105.75</span>
                          </div>
                        </div>
                      </div>
                      <p class=" game-price col-4 d-flex justify-content-center" >{{showCurrencySymbol()}} {{formatPrice(showConvertedPrice($item->price))}}</p>
                    </div>  
                  </a>
                  @endforeach
                </div>
              </div>
            </div>    
        <div></div>
      </div>
      <!-- Popular Collections -->

      <div class="container mb-5">
          <h2 class="carousal-heading py-2">Popular Collections</h2>
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

        <!-- Choose by categories  -->
        
        <h2 class="carousal-heading py-2 mt-4">Choose by categories</h2>
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
        </div>
      <!-- Ambalika's code ends -->
        
      </div>

@else
<!-- <div class="container-fluid px-0 bg-lgreen">
  <div class="container py-5">

      <div class="row pt-3">
          @if(count($games) > 0)
          @foreach($devices as $device)

          @if(count($device->games) > 0)
          <h3 class="top-h3">{{Str::upper($device->name)}}</h3>
          @foreach($device->games as $game)
          <div class="col-md-3 col-sm-12 space pb-4">

              <a href="{{ route('view-products', [ 'id' => $game->id ] ) }}">
                  @if(!empty($game->image))
                  <img src="{{ url('storage/uploads/' . $game->image ) }}" class="img-fluid top-image" alt="games" />
                  @else
                  <img src="{{ url('assets/images/default-game-new.jpeg') }}" class="img-fluid top-image" alt="games" />
                  @endif
              </a>
              <p class="detail-p text-center mt-4">({{Str::upper($game->name)}} - {{Str::upper($game->devices->name)}})</p>
          </div>
          @endforeach
          @endif


          @endforeach
          @else
          <div class="d-flex justify-content-center py-5 border-tb margin-t bg-lgreen">
              <h3 class="pb-2 border-0">There are no matching results.</h3>
          </div>
          @endif
      </div>
  </div>
</div> -->
@endif
</div>
</div>

@endsection