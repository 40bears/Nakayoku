@extends('layout.user')
@section('title', 'Password Details | CII')
@section('main-container')

<!-- Right side starts -->

<div class="col-md-9 col-sm-12 ps-5 common-space">
    <h3 class="pb-5 signup-h3 text-center">User Setting</h3>
    <div class="menu menu-1 pt-4">
        <ul class="navbar-nav scroll">
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('notifications') ? 'active' : '' }}" href="{{ route('notifications') }}">Notification</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('view-password-details') ? 'active' : '' }}" href="{{ route('view-password-details') }}">Email and password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('view-bank-details') ? 'active' : '' }}" href="{{ route('view-bank-details') }}">Bank info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('view-personal-info') ? 'active' : '' }}" href="{{ route('view-personal-info') }}">Personal info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-blk {{ Route::is('identity-verification') ? 'active' : '' }}" href="{{ route('identity-verification') }}">Identity Verification</a>
            </li>
        </ul>
    </div>
    <hr class="pb-5" />

    <!-- User profile starts -->
    <div class="container w-50 pt-5">
        <div class="d-flex flex-column align-items-center">
        @if(Session::has('successMsg'))
            <div class="d-flex align-items-start py-3 bg-s mb-5 w-100">
                <i class="fa-solid fa-circle-check icon-s ps-3"></i>
                <h4 class="s-head ps-2 mb-0 rating-game">{{ Session('successMsg') }}</h4>
            </div>
        @endif
        <form action="{{ route('update-password-details') }}" method="POST">
            @csrf
            <div class=" d-flex flex-column form-input">
                <label class="signup-lbl pb-2 align-self-start">Email address</label>
                <!-- Disabled input box to show -->
                <input type="email" class="signup-input" id="email" placeholder="current_sample@gmail.com" value="{{ Auth::user()->email }}" disabled/>

                <!-- Hidden input box for the value for controller -->
                <input type="hidden" class="signup-input" id="email" placeholder="current_sample@gmail.com" name="email" value="{{ Auth::user()->email }}"/>
            </div>
            @if($errors->has('email'))
            <div class="d-flex align-items-center">
                <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('email')}}</p>
            </div>
            @endif

            <div class="d-flex flex-column align-items-center">
                <p class="select-game pt-3">(Please be sure to check the “Prohibited Activities and Items to be Exhibited. Also, please agree to the Merchant Agreement and Privacy Policy before clicking the “submit button.”)</p>
            </div>

            <div class="d-flex flex-column">
                <label class="signup-lbl align-self-start pb-2">Current Password</label>
                <input type="password" class="signup-input" name="old_password" id="currentPassword" />
            </div>
            @if($errors->has('old_password'))
            <div class="d-flex align-items-center">
                <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('old_password')}}</p>
            </div>
            @endif

            <div class="pb-1 pt-4 d-flex flex-column">
                <label class="signup-lbl pb-2 align-self-start">New password</label>
                <input type="password" class="signup-input" name="new_password" id="newPassword" />
            </div>
            @if($errors->has('new_password'))
            <div class="d-flex align-items-center">
                <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('new_password')}}</p>
            </div>
            @endif

            <div class="d-flex flex-column align-items-center">
                <p class="select-game pt-1">(Password strength: weak
                    , Can’t contain your name or email address , At least 8 characters , Contain a number or symbol)</p>
            </div>

            <div class="d-flex flex-column">
                <label class="signup-lbl pb-2 align-self-start">New password confirmation</label>
                <input type="password" class="signup-input" name="confirm_password" id="newPasswordConfirm" />
            </div>
            @if($errors->has('confirm_password'))
            <div class="d-flex align-items-center">
                <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                <p class="error-p">{{$errors->first('confirm_password')}}</p>
            </div>
            @endif

            <div class="pt-4 d-flex flex-column">
                <p class="select-game py-2">If you wish to set a password, please enter all of the above.</p>
            </div>

            <div class="d-flex flex-column align-items-center">
                <input type="submit" class="signup-btn w-100" id="change" name="change" value="Update" />
            </div>
        </form>
        </div>
    </div>
    <!-- User profile ends -->
</div>
<!-- Right side ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection