@extends('layout.main')
@section('title', 'Store Password | Nakayoku')
@section('main-container')

<!-- Sign up starts -->
<div class="container-fluid px-0 bg-lgreen padt-5">
    <div class="container form-container psignup">
        <div class="d-flex flex-column align-items-center">
            <h3 class="signup-h3 pb-5">Enter New Password</h3>
            <div class="signup-box w-100">
                <form action="{{ route('change-password') }}" method="POST">
                    @csrf
                    <div class="pb-4 d-flex flex-column">
                        <label class="finish pb-4">Finish Changing Your Password</label>

                        <input type="hidden" class="input-text" id="password" name="email" value="{{$email}}" />

                        <label class="signup-lbl pb-2">New Password</label>
                        <div class="d-flex flex-column form-input mb-4">
                            <input type="password" class="signup-input" id="password" name="password" placeholder="********" />
                        </div>

                        <label class="signup-lbl pb-2">Confirm New Password</label>
                        <div class="d-flex flex-column form-input mb-4">
                            <input type="password" class="signup-input" id="password" name="confirm_password" placeholder="********" />
                        </div>

                        <div class="d-flex align-items-center">
                            <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                            <p class="error-p">Password strength: weak</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                            <p class="error-p">Can’t contain your name or email address</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                            <p class="error-p">At least 8 characters</p>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                            <p class="error-p">Contains a number or symbol</p>
                        </div>
                        <p class="text-p mb-4">
                            By selecting Agree and countinue, I agree to GLOBAL CARPATICA SL
                            <a href="{{ route('terms-and-conditions') }}" class="terms-a">Terms of Service</a>,
                            </a>
                            and acknowledge the
                            <a href="{{ route('privacy-policy') }}" class="terms-a">Privacy Policy</a>.
                        </p>
                    </div>

                    <div class="d-flex flex-column align-items-center">
                        <input type="submit" class="signup-btn w-100" id="signup2" name="signup2" value="CONTINUE" />
                        <a class="signup-a pt-3" href="{{ route('login') }}">Already have account ?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Sign up ends -->
@endsection