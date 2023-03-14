@extends('layout.user')
@section('title', 'Identity Verification | CII')
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

    <!-- Identity Verification starts -->
    <div class="container d-flex flex-column justify-content-center align-items-center pt-5">
        <form action="{{ route('identity-verification-document', [ 'id' => Auth::id() ] ) }}">
            <div class="pb-4 d-flex flex-column align-items-center">

                <div class="d-flex justify-content-start w-input py-4">
                    @if(!Auth::user()->document && Auth::user()->document_verification === 'NOT_VERIFIED')
                    <img src="{{ url('assets/images/x-icon.svg') }}" class="img-fluid pe-2" alt="cross" />
                    <p class="big-lbl mb-0">Not Verified</p>
                    @elseif(Auth::user()->document && Auth::user()->document_verification === 'NOT_VERIFIED')
                    <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="cross" />
                    <p class="big-lbl mb-0">Pending Approval</p>
                    @else
                    <img src="{{ url('assets/images/r-icon.svg') }}" class="img-fluid pe-2" alt="right" />
                    <p class="big-lbl mb-0">Verified</p>
                    @endif
                </div>

            </div>

            <div class="d-flex flex-column align-items-center pt-3">
                <input type="submit" class="signup-btn w-100" id="update" name="update" value="Proceed Identity Verification" />
            </div>
        </form>
    </div>
    <!-- Identity Verification ends -->
</div>
<!-- Right side ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection