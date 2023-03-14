@extends('layout.main')
@section('title', 'Login | MDAE')
@section('main-container')

<div class="container-fluid px-0 bg-blue plogin">
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <h3 class="border-0">Sign In</h3>
        @if(Session::has('msg'))
        <p class="error-p">{{ Session('msg') }}</p>
        @endif
        <form action="{{ route('login-post') }}" method="POST">
            @csrf
            <div class="pb-5 d-flex flex-column align-items-center">
                <div class="d-flex justify-content-center align-items-center my-5 email-div">
                    <img src="{{ url('assets/images/email-logo.svg') }}" class="img-fluid pe-2" alt="email" />
                    <input type="text" name="email" id="" value="{{$email}}" class="email-readonly text-center" readonly>
                </div>
                <label class="form-label pb-2 align-self-start">Password</label>
                <div class="d-flex flex-column form-input w-input">
                    <span class="small-lbl">Password</span>
                    <input type="password" class="input-text" id="password" name="password" placeholder="********" />
                </div>
                @if($errors->has('password'))
                <div class="d-flex align-items-center">
                    <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid pe-2" alt="settings" />
                    <p class="error-p">{{$errors->first('password')}}</p>
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