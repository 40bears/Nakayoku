@extends('layout.main')
@section('title', 'Store Password | GLOBAL CARPATICA SL')
@section('main-container')

<!-- Sign up starts -->
<div class="container-fluid px-0 bg-lgreen padt-5">
    <div class="container psignup form-container">
        <div class="d-flex flex-column align-items-center">
            <h3 class="signup-h3 pb-5">Sign Up</h3>
            <form action="{{ route('store-password') }}" method="POST">
                @csrf
                <input type="hidden" name="document_type" value="{{Session::get('document_type')}}">
                <input type="hidden" name="document" value="{{Session::get('document')}}">
                <input type="hidden" name="document_two" value="{{Session::get('document_two')}}">
                <input type="hidden" name="residence_certificate" value="{{Session::get('residence_certificate')}}">
                <div class="pb-4 d-flex flex-column">
                    <label class="finish pb-4 text-center">Finish Signing Up</label>
                    <div class="d-flex flex-column form-input">
                        <span class="signup-lbl pb-3">First Name</span>
                        <input type="text" class="signup-input" id="firstName" name="first_name" placeholder="First Name" />
                    </div>
                    @if($errors->has('first_name'))
                    <div class="d-flex align-items-center">
                        <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                        <p class="error-p">{{$errors->first('first_name')}}</p>
                    </div>
                    @endif

                    <div class="d-flex flex-column form-input mt-4">
                        <span class="signup-lbl pb-3">Last Name</span>
                        <input type="text" class="signup-input" id="lastName" name="last_name" placeholder="Last Name" />
                    </div>
                    @if($errors->has('last_name'))
                    <div class="d-flex align-items-center">
                        <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                        <p class="error-p">{{$errors->first('last_name')}}</p>
                    </div>
                    @endif

                    <p class="text-p my-4">
                        (Make sure it matches the name on your government issued ID and
                        bank account.)
                    </p>
                    <div class="d-flex flex-column form-input">
                        <span class="signup-lbl pb-3">Date of Birth</span>
                        <input type="date" class="signup-input" id="date" name="dob" placeholder="Date of birth" />
                    </div>
                    @if($errors->has('dob'))
                    <div class="d-flex align-items-center">
                        <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                        <p class="error-p">{{$errors->first('dob')}}</p>
                    </div>
                    @endif

                    <p class="text-p my-4">
                        (To sign up, you need to be at least 13. Your birthday won’t be
                        shared with other people who use GLOBAL CARPATICA SL)
                    </p>

                    <div class="d-flex flex-column form-input">
                        <span class="signup-lbl pb-3">Email</span>
                        <input type="email" class="signup-input" id="email" name="email" value="{{Session::get('email')}}" placeholder="newemailaddress2022@gmail.com" />
                    </div>
                    @if($errors->has('email'))
                    <div class="d-flex align-items-center">
                        <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                        <p class="error-p">{{$errors->first('email')}}</p>
                    </div>
                    @endif

                    <label class="signup-lbl pb-3 mt-4">Current Password</label>
                    <div class="d-flex flex-column form-input">
                        <input type="password" class="signup-input" id="password" name="password" placeholder="********" />
                    </div>
                    @if($errors->has('password'))
                    <div class="d-flex align-items-center">
                        <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                        <p class="error-p">{{$errors->first('password')}}</p>
                    </div>
                    @endif
                    <p class="text-p my-4">
                        By selecting Agree and countinue, I agree to GLOBAL CARPATICA SL
                        <a href="{{ route('terms-and-conditions') }}" class="terms-a">Terms of Conditions</a> and acknowledge the
                        <a href="{{ route('privacy-policy') }}" class="terms-a">Privacy Policy</a>.
                    </p>
                </div>

                <div class="d-flex flex-column align-items-center pt-4">
                    <input type="submit" class="signup-btn w-100" id="signup2" name="signup2" value="SUBMIT" />
                    <a class="signup-a pt-3" href="{{ route('login') }}">Already have an account ?</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Sign up ends -->
@endsection