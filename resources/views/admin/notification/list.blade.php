@extends('layout.user')
@section('title', 'Notification Portal | Nakayoku')
@section('main-container')

<!-- Right side starts -->

<div class="col-md-9 col-sm-12 ps-5 common-space pleft">

    <div class="container sp-100 w-80">
        <div class="d-flex flex-column justify-content-start align-items-start">
            <h3 class="pb-3 signup-h3">Notification Portal</h3>   
         
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <h6 class="m-0">{!! \Session::get('success') !!}</h6>
            </div>
            @endif

    <form action="{{ route('send-notifications') }}" method="POST" class="w-100">
        @csrf
        <div class="radiobuttons d-flex flex-column mt-5 mb-3">
            <div class="pb-3">
                <label class="select-lbl">Please select Users</label>
            </div>
            <div class="d-flex">
                <div class="rdio-primary radio-inline d-flex justify-content-center ">
                    <input name="radio" class="user_radio" value="selected" id="noti-user-sel" type="radio" checked>
                    <label class="ps-3 noti-lbl" for="noti-user-sel">Selected Users</label>
                </div>
                <div class="rdio-primary radio-inline d-flex justify-content-center ps-5">
                    <input name="radio" class="user_radio" value="all" id="noti-user-all" type="radio" >
                    <label class="ps-3 noti-lbl" for="noti-user-all">All Users</label>
                </div>
            </div>
            <input name="selected_users" value="" id="selected_users" type="hidden"/>
        </div>

        <!-- Search -->
        <div class="py-4 d-flex flex-column " id="user-selection">
            <label class="signup-lbl pb-2 ">Search users</label>
            <input type="text" class="signup-input bg-white" name="user_emails" id="user_search" placeholder="Enter user emails" />
            <p class="error-p">{{$errors->first('selected_users')}}</p>
        </div>

        <!-- Message -->
        <div class=" d-flex flex-column">
            <label class="signup-lbl pb-2 pt-4">Message</label>
            <textarea class="signup-input h-100" id="notification_content" name="notification_content" rows="5" cols="" placeholder="Please enter the notification content..."></textarea>
            @if($errors->has('notification_content'))
            <div class="d-flex align-items-center">
                <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('notification_content')}}</p>
            </div>
            @endif
        </div>

        <!-- link -->
        <div class="py-4 d-flex flex-column" id="user-selection">
            <label class="signup-lbl pb-2 pt-4">Link (Optional)</label>
            <input type="text" class="signup-input" name="link" id="link" placeholder="Enter link here" />
        </div>


        <div class="d-flex mt-5 justify-content-center">
            <input type="submit" class="signup-btn w-50 mb-4" id="submit" name="submit" value="Submit" />
        </div>
    </form>

    </div>
    </div>

    <div>

    </div>
</div>
<!-- Right side ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection
