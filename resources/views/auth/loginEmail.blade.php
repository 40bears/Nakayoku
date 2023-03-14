@extends('layout.main')
@section('title', 'Login | MDAE')
@section('main-container')

<div class="container-fluid px-0 bg-blue plogin">
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <h3 class="border-0">Sign In</h3>
        @if(Session::has('msg'))
        <p class="error-p">{{ Session('msg') }}</p>
        @endif
        <form action="{{ route('login-password') }}">
            <div class="pb-4 d-flex flex-column">
                <label class="form-label pb-2">ID</label>
                <div class="d-flex flex-column form-input w-input">
                    <span class="small-lbl">Email ID</span>
                    <input type="text" class="input-text" id="displayName" name="email" placeholder="Enter Your Email" />
                </div>
                @if($errors->has('email'))
                <div class="d-flex align-items-center">
                    <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                    <p class="error-p">{{$errors->first('email')}}</p>
                </div>
                @endif
            </div>

            <div class="d-flex flex-column align-items-center">
                <input type="submit" class="nav-link btn-blue btn-green w-input button-1" id="signin" name="signin" value="Sign In" />

                <a class="show font-pswd pt-3" href="{{ route('forgot-password') }}">Forgot your password?</a>
                <a class="show font-pswd pt-3" href="{{ route('signup1') }}">Don't have an account? Register Here</a>
            </div>
        </form>
    </div>
</div>
@endsection