@extends('layout.user')
@section('title', 'Notification | Nakayoku')
@section('main-container')

<!-- Notification section starts -->
<div class="col-md-9 col-sm-12 ps-5 common-space pt-4">
  <h3 class="py-5 signup-h3 text-center">Notification</h3>

    @if(count($notifications))

    @foreach($notifications as $notification)
    @if(!empty($notification->data['link'])) <a href="{{ $notification->data['link'] }}"> @endif
      <div class="d-flex flex-row justify-content-between border-not py-4">
        <div class="w-100 flex-column">
          <p class="signup-lbl mb-0 pe-5">{{ $notification->data['msg'] }}</p>
          <p class="usd pb-0 mb-0 pt-2 text-lowercase">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</p>
        </div>
        @if(!empty($notification->data['link']))
        <div class="d-flex justify-content-center align-items-center">
          <img src="{{ url('assets/images/right-arrow.png') }}" class="img-fluid w-50" alt="games" />
        </div>
        @endif
      </div>
      @if(!empty($notification->data['link']))
    </a> @endif

    @endforeach

    @else
    <div class=" border-nav pb-5">
        <p class="notification-p my-5 text-center">No notifications yet.</p>
    </div>

    @endif

  </div>
{{-- </div> --}}
<!-- Notification section ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection