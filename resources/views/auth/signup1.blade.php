@extends('layout.main')
@section('title', 'Signup | Nakayoku')
@section('main-container')

<!-- Sign up starts -->
<div class="container-fluid px-0 bg-lgreen padt-5">
    <div class="container psignup signup-img" style="background-image: url('{{ asset('assets/images/signup-img.png')}}');">
        <div class="d-flex flex-column align-items-center">
            <h3 class="signup-h3 pb-4">Sign up</h3>
            <p class="signup-p">For better experience please sign up</p>
            <h2 class="signup-h2 pb-5">Join be part of our vastly growing marketplace</h2>
            <div class="signup-box">
                <h4 class="signup-h4">Welcome to Nakayoku</h4>
                <form action="{{ route('signup1-post') }}" method="POST">
                    @csrf
                    <div class="d-flex flex-column">
                        <label class="signup-lbl py-3">Email ID</label>
                        <input type="email" placeholder="Enter Your Email" class="signup-input" name="email" id="email">
                        @if($errors->has('email'))
                        <div class="d-flex align-items-center pt-4">
                            <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                            <p class="error-p">{{$errors->first('email')}}</p>
                        </div>
                        @endif
                    </div>

                    <div class="d-flex flex-column align-items-center pt-4">
                        <input type="submit" class="signup-btn w-100" id="signup" name="signup" value="CONTINUE" />
                        <a class="signup-a pt-3" href="{{ route('login') }}">Already have an account ?</a>
                    </div>
                </form>
            </div>
        </div>  
    </div>
    <div class="blend-bg"></div>
</div>
<!-- Sign up ends -->
@endsection