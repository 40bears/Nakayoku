@extends('layout.user')
@section('title', 'All Games | Nakayoku')
@section('main-container')

<!-- Right side starts -->

<div class="col-md-9 col-sm-12 ps-5 common-space pleft">
    <h3 class="pb-5 signup-h3">Game List</h3>

    <div class="d-flex justify-content-between pb-5">
        <form action="{{ route('view-games-post') }}" method="POST" class="w-50">
            <div class="d-flex align-items-center">
                <div class="search-div-2">
                    @csrf
                    <input type="text" name="search" class="searchTerm-2" placeholder="Search" value="{{request()->search}}" />
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search white-2"></i>
                    </button>
                </div>
                <a class="signup-a green mx-3" href="{{ route('view-games') }}">clear</a>
            </div>
        </form>
        <a class="nav-link view d-flex justify-content-center align-items-center" href="{{route('add-game')}}">
            <i class="fa-solid fa-circle-plus me-2"></i>
            ADD GAME
        </a>
    </div>

    <!-- Product list component starts -->
    @if(count($games) != null)
    {{-- <div class="row py-4"> --}}
    @foreach($games as $game)
    <div id="productlist pt-5">
        <a href="{{ route('view-products', [  'id' => $game->id] ) }}">
            <div class="d-flex justify-content-center justify-content-md-start border-nav ps-4 py-4">
                <div class="d-flex flex-column flex-md-row justify-content-around">
                    <div class="pe-4">
                        @if($game->image)
                        <img src="{{ url('storage/uploads/' . $game->image) }}" class="img-fluid admin-games-list top-image" alt="games" />
                        @else
                        <img src="{{ url('assets/images/default-game-new.jpeg') }}" class="img-fluid admin-games-list top-image" alt="games" />
                        @endif
                    </div>
                    <div class="d-flex flex-column justify-content-between align-items-start">
                        <div>
                            <p class="select-lbl mb-3">{{Str::upper($game->name)}}</p>
                            <div class="d-flex align-items-center">
                                <p class="products mb-2 me-5">{{count($game->products)}} Products</p>
                                 <p class="pur-date mb-2">{{$game->updated_at->format('Y/M/d')}}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <a class="game-edit-btn me-3" href="{{ route('edit-game', [ 'id' => $game->id ] ) }}">EDIT</a>
                            @if($game->status == 'PUBLISHED')
                            @if(count($game->products) == 0)
                            <a class="game-edit-delete-btn" href="{{ route('delete-game', [ 'id' => $game->id ] ) }}" onclick="return confirm('Are you sure you want to delete this?')">DELETE</a>
                            @else
                            <a class="game-edit-delete-btn" href="{{ route('update-game-status', [ 'id' => $game->id ] ) }}" onclick="return confirm('You can not delete the game as it have items attached to it. Do you want to put it in draft instead?')">DELETE</a>
                            @endif
                            @else
                            <a class="game-edit-btn" href="{{ route('update-game-status', [ 'id' => $game->id ] ) }}" onclick="return confirm('Are you sure you want to publish this?')">PUBLISH</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    {{-- <div class="col-md-4 col-sm-12 sp-mb">
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
    </div> --}}
    @endforeach
    {{-- </div> --}}
    @else
    <div class="text-center mt-4">
        <h3 class="text-light">No Results</h3>
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