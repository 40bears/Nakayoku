@extends('layout.main')
@section('title', 'Dashboard | CII')
@section('main-container')

      @if(Route::is('dashboard'))

      <div class="container-fluid px-0 sp-dash bg-lgreen" >
        @foreach($devices as $device)
        @if(count($device->games) != null)
        <!-- PC games starts -->
        <div class="container py-5">
          <div class="d-flex justify-content-between align-items-center">
            <h3 class="top-h3">{{Str::upper($device->name)}}</h3>
            <a class="view effect" href="{{ route('all-games-by-device', [ 'device' => $device->name ] ) }}">VIEW ALL</a>
          </div>
          <div class="row pt-3">
            @foreach ($device->games->take(8) as $game)
            @if($game->status == 'PUBLISHED')
            <div class="col-md-3 col-sm-12 space pb-4">
              <a href="{{ route('view-products', [ 'id' => $game->id ] ) }}">
                @if(!empty($game->image))
                <img src="{{ url('storage/uploads/' . $game->image ) }}" class="img-fluid top-image" alt="games" />
                @else
                <img src="{{ url('assets/images/default-game-new.jpeg') }}" class="img-fluid top-image" alt="games" />
                @endif
                <p class="top-game mb-0 pt-3">{{ $game->name }}</p>
                <p class="top-item mb-0">{{ $game->products->count() }} items</p>
             </a>
             </div>
             @endif
             @endforeach 
          </div>
        </div>
        @endif
        @endforeach
        <!-- PC games ends -->
        
      </div>

@else
<div class="container-fluid px-0 bg-lgreen">
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
</div>
@endif
</div>
</div>

@endsection