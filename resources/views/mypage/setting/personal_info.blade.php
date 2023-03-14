@extends('layout.user')
@section('title', 'Personal Information | CII')
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

    <!-- Bank info starts -->
    <div class="container">
        <div class="d-flex flex-column align-items-center">
        <form action="{{ route('update-personal-info') }}" method="POST">
            @csrf
            <div class="pb-4 d-flex flex-column align-items-start">
                <label class="signup-lbl">Personal info</label>

                <p class="signup-lbl mb-0 pt-5 pb-3">Name</p>
                <div class="d-flex justify-content-between bg-bank w-input px-2 py-3">
                        <p class="min-p mb-0 pe-4" id="textLabel">{{ Auth::user()->first_name }}</p>
                        <input type="text" name="first_name" class="bank-input hide" id="textUpdate" value="{{ Auth::user()->first_name != null ? Auth::user()->first_name : '--' }}"/>
                        <a style="cursor: pointer;" id="edit" class="min-p show pe-2">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                </div>

                <p class="signup-lbl mb-0 pt-5 pb-3">Date of Birth</p>
                <div class="d-flex justify-content-between bg-bank w-input px-2 py-3">
                        <p class="min-p mb-0 pe-4" id="textLabel">{{ Auth::user()->DOB != null ? Auth::user()->DOB : '--' }}</p>
                        <input type="date" name="dob" class="bank-input hide " id="textUpdate" value="{{ Auth::user()->DOB != null ? Auth::user()->DOB : '--' }}" />
                        <a style="cursor: pointer;" id="edit" class="min-p show pe-2">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                </div>

                <p class="signup-lbl mb-0 pt-5 pb-3">Phone</p>
                <div class="d-flex justify-content-between bg-bank w-input px-2 py-3">
                        <p class="min-p mb-0 pe-4" id="textLabel">{{ Auth::user()->phone != null ? Auth::user()->phone : '--' }}</p>
                        <input type="number" name="phone" class="bank-input hide " id="textUpdate" value="{{ Auth::user()->phone != null ? Auth::user()->phone : '--' }}" />
                        <a style="cursor: pointer;" id="edit" class="min-p show pe-2">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                </div>

            </div>

            <div class="d-flex flex-column  pt-3">
                <input type="submit" class="signup-btn w-100" id="update" name="update" value="Update" />
            </div>
        </form>
        </div>
    </div>
    <!-- Bank info ends -->
</div>
<!-- Right side ends -->
</div>
</div>
<!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection