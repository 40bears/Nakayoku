@extends('layout.main')
@section('title', 'Login | GLOBAL CARPATICA SL')
@section('main-container')

<div class="container-fluid px-0 bg-lgreen padt-5 position-relative" >
    <div class="container psignup">
        <div class="d-flex flex-column align-items-center">
            <h3 class="signup-h3 pb-5">Sign in</h3>
            @if(Session::has('successMsg'))
            <div class="d-flex align-items-start py-3 bg-s mb-5">
                <i class="fa-solid fa-circle-check icon-s ps-3"></i>
                <h4 class="s-head ps-2 mb-0">{{ Session('successMsg') }}</h4>
            </div>
            @endif

            <div class="d-flex justify-content-center align-items-start w-80 main-box">
                <div class="d-flex flex-column justify-content-start left-box">
                    {{-- <a href="/"> <img src="{{ url('assets/images/logo-long-green.svg') }}"></a> --}}
                    <p class="sign-txt mt-4"><span class="span-1">Connecting Gamers Worldwide:</span> A One-Stop Platform for <span class="span-2">Gaming Communities, Content, and Commerce</span></p>
                    <img src="{{ url('assets/images/login-img.png') }}" class="img-fluid">
                </div>
                <div class="d-flex flex-column justify-content-start right-box">
                    <h4 class="signin-h3 text-center">Welcome Back! </h4>
                    @if(Session::has('msg'))
                    <p class="error-p">{{ Session('msg') }}</p>
                    @endif
                    <form action="{{ route('login-post') }}" method="POST">
                        @csrf
                        <div class="d-flex flex-column">
                            <label class="signup-lbl py-3">Email ID</label>
                            <input type="text" placeholder="Enter Your Email" class="signup-input" id="displayName" name="email">
                            @if($errors->has('email'))
                            <div class="d-flex align-items-center">
                                <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                                <p class="error-p">{{$errors->first('email')}}</p>
                            </div>
                            @endif
                            <label class="signup-lbl py-3">Password</label>
                            <input type="password" placeholder="Enter Your Password" class="signup-input" id="password" name="password">
                            @if($errors->has('password'))
                            <div class="d-flex align-items-center">
                                <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                                <p class="error-p">{{$errors->first('password')}}</p>
                            </div>
                            @endif
                            <a class="signup-a pt-2 gry-color text-decoration-none" href="{{ route('forgot-password') }}">Forget password?</a>
                            <div class="d-flex flex-column align-items-center pt-4">
                                <input type="submit" class="signup-btn w-100" id="signin" name="signin" value="Sign in">
                                <a class="signup-a pt-3" href="{{ route('signup1') }}">Don't have an account? Register Here</a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="blend-bg"></div>
</div>
{{-- 
<div class="container-fluid px-0 bg-blue plogin">
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <h3 class="border-0">Sign In</h3>
        @if(Session::has('msg'))
        <p class="error-p">{{ Session('msg') }}</p>
        @endif
        <form action="{{ route('login-post') }}" method="POST">
            @csrf
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

            <div class="pb-5 d-flex flex-column">
                <label class="form-label pb-2">Password</label>
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
</div> --}}
@endsection