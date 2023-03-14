@extends('layout.main')
@section('title', 'Contact Us | CII')
@section('main-container')

<!-- Contact section starts -->
<div class="container-fluid px-0 bg-lgreen">
    <div class="container padt-6">
        <ul class="breadcrumb menu menu1">
            <li class="breadcrumb-item"><a href="/">TOP</a></li>
            <li class="breadcrumb-item"><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </div>
    <div class="container form-container d-flex flex-column justify-content-center align-items-center pcontact">
        <h3 class="signup-h3 pb-5">Contact Form</h3>
        <div class="signup-box">
            <form action="{{ route('submit-contact-post') }}" method="POST">
                @csrf
                <div class="pb-4 d-flex flex-column">
                    <div class="d-flex flex-column form-input mb-4">
                        <span class="signup-lbl pb-3">First Name</span>
                        <input type="text" class="signup-input contact_field" name="first_name" id="firstName" placeholder="Enter Your First Name" value="{{Auth::user() ? Auth::user()->first_name : ''}}" />
                        <span class="input-text contact_label hide"></span>
                    </div>
                    @if($errors->has('first_name'))
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                            <p class="error-p">{{$errors->first('first_name')}}</p>
                        </div>
                    @endif
                    <div class="d-flex flex-column form-input mb-4">
                        <span class="signup-lbl pb-3">Last Name</span>
                        <input type="text" class="signup-input contact_field" name="last_name" id="lastName" placeholder="Enter Your Last Name" value="{{Auth::user() ? Auth::user()->last_name : ''}}" />
                        <span class="input-text contact_label hide"></span>
                    </div>
                    @if($errors->has('last_name'))
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                            <p class="error-p">{{$errors->first('last_name')}}</p>
                        </div>
                    @endif
                    <div class="d-flex flex-column form-input mb-4">
                        <span class="signup-lbl pb-3">Email</span>
                        <input type="email" class="signup-input contact_field" name="email" id="email" placeholder="Enter Your Email" value="{{Auth::user() ? Auth::user()->email : ''}}" />
                        <span class="input-text contact_label hide"></span>
                    </div>
                    @if($errors->has('email'))
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                            <p class="error-p">{{$errors->first('email')}}</p>
                        </div>
                    @endif

                    <label class="signup-lbl py-3">Write your inquiry</label>
                    
                    <textarea class="signup-input h-100 contact_field" id="introduction" name="inquiry" rows="15" cols="50" placeholder="Please write your enquiry..." required></textarea>
                    <span class="input-text contact_label hide"></span>
                    @if($errors->has('inquiry'))
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                            <p class="error-p">{{$errors->first('inquiry')}}</p>
                        </div>
                    @endif
                    <p class="text-p mb-4 pt-5">
                        By selecting Agree and countinue, I agree to CLASS INNOVATION INTERNATIONAL
                        <a href="{{ route('terms-and-conditions') }}" class="terms-a">Terms of Conditions</a> and acknowledge the
                        <a href="{{ route('privacy-policy') }}" class="terms-a">Privacy Policy</a>.
                    </p>
                </div>

                <div class="d-flex flex-column align-items-center">
                    <input type="button" class="signup-btn w-100" id="confirm" name="confirm" value="Confirm" />
                    <input type="submit" id="submit" class="signup-btn w-100 hide" class="nav-link btn-blue hide button-1 w-100" id="submit" name="submit" value="Submit" />
                    <a class="signup-a pt-3" id="back" class="hide">Go back and edit</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Contact section ends -->

@endsection