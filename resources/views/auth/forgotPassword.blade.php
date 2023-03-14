@extends('layout.main')
@section('title', 'Signup | CII')
@section('main-container')


<div class="container-fluid px-0 bg-lgreen padt-5" >
    <div class="container psignup">
        <div class="d-flex flex-column align-items-center">
            <h3 class="signup-h3 pb-5">Forgot Your Password</h3>
            <div class="signup-box w-40">
                <form action="{{ route('forgot-password-post') }}" method="POST">
                    @csrf
                    <div class="d-flex flex-column">
                        <label class="signup-lbl py-3">Please Enter Email</label>
                        <input type="email" placeholder="Enter Your Email" class="signup-input" name="email" id="email">
                        @if(Session::has('msg'))
                        <div class="d-flex align-items-center">
                            <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                            <p class="error-p">{{ Session('msg') }}</p>
                        </div>
                        @endif
                        <div class="d-flex flex-column align-items-center pt-4">
                            <input type="submit" class="signup-btn w-100" id="signup" name="signup" value="Countinue">
                            <a class="signup-a pt-3" href="{{ route('login') }}">Already have an account?</a>
                        </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container-fluid px-0 bg-blue plogin">
    <div class="container form-container d-flex flex-column justify-content-center align-items-center">
        <h3 class="border-0">Forgot Your Password</h3>
        <form action="{{ route('forgot-password-post') }}" method="POST">
            @csrf
            <div class="pb-4 d-flex flex-column">
                <label class="form-label pb-2">Please enter Email</label>
                <div class="d-flex flex-column form-input w-input">
                    <span class="small-lbl">Email</span>
                    <input type="email" class="input-text" name="email" id="email" placeholder="Email" />
                </div>
                @if(Session::has('msg'))
                <div class="d-flex align-items-center">
                    <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                    <p class="error-p">{{ Session('msg') }}</p>
                </div>
                @endif
            </div>

            <div class="d-flex flex-column align-items-center">
                <input type="submit" class="nav-link w-input btn-blue button-1" id="signup" name="signup" value="Countinue" />

                <a class="show font-pswd pt-3" href="{{ route('login') }}">Already have account ?</a>
            </div>
        </form>
    </div>
</div> --}}

@endsection