@extends('layout.main')
@section('title', 'Contact Us | Nakayoku')
@section('main-container')

<!-- Contact section starts -->
<div class="container-fluid px-0 bg-lgreen padt-6">
  
     <div class="container psignup">
        <div class="d-flex flex-column align-items-center">
            <h3 class="signup-h3 pb-5">Contact Form</h3>
    <div class="d-flex justify-content-center align-items-start w-80 main-box bg-contact">
            <div class="d-flex flex-column justify-content-center align-items-center left-box w-50 bg-transparent px-0 sp-padb">
                <p class="sign-txt mt-4 invisible sp-contact"><span class="span-1">Connecting Gamers Worldwide:</span> A One-Stop Platform for <span class="span-2">Gaming Communities, Content, and Commerce</span></p>
                <lottie-player src="https://lottie.host/52e0ef35-6652-4407-95e0-08ac62db8e8e/wXEWGgmKzU.json" background="transparent" speed="1"  loop autoplay></lottie-player>
            </div>
            <div class="d-flex flex-column justify-content-start right-box w-50 contact-bg-right">
       
                    <div class="signup-box w-100 contact-bg-right">
                        <form action="{{ route('submit-contact-post') }}" method="POST">
                            @csrf
                            <div class="pb-4 d-flex flex-column">
                                <div class="d-flex flex-column form-input mb-4">
                                    <span class="signup-lbl pb-3">First Name</span>
                                    <input type="text" class="signup-input contact_field input-bg-blk contact-form-common-class form-first-name" name="first_name" id="firstName" placeholder="Enter Your First Name" value="{{Auth::user() ? Auth::user()->first_name : ''}}" />
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
                                    <input type="text" class="signup-input contact_field input-bg-blk contact-form-common-class form-last-name" name="last_name" id="lastName" placeholder="Enter Your Last Name" value="{{Auth::user() ? Auth::user()->last_name : ''}}" />
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
                                    <input type="email" class="signup-input contact_field input-bg-blk contact-form-common-class form-email" name="email" id="email" placeholder="Enter Your Email" value="{{Auth::user() ? Auth::user()->email : ''}}" />
                                    <span class="input-text contact_label hide"></span>
                                </div>
                                @if($errors->has('email'))
                                    <div class="d-flex align-items-center mb-4">
                                        <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                                        <p class="error-p">{{$errors->first('email')}}</p>
                                    </div>
                                @endif

                                <label class="signup-lbl py-3">Write Your Inquiry</label>
                                
                                <textarea class="signup-input h-100 contact_field input-bg-blk contact-form-common-class form-inquiry" id="introduction" name="inquiry" rows="15" cols="50" placeholder="Please Write Your Enquiry..." required></textarea>
                                <span class="input-text contact_label hide"></span>
                                @if($errors->has('inquiry'))
                                    <div class="d-flex align-items-center mb-4">
                                        <img src="{{ url('assets/images/cross-red-new.svg') }}" class="img-fluid pe-2" alt="settings" />
                                        <p class="error-p">{{$errors->first('inquiry')}}</p>
                                    </div>
                                @endif
                                <p class="text-p mb-4 pt-5">
                                    By selecting Agree and countinue, I agree to GLOBAL CARPATICA SL
                                    <a href="{{ route('terms-and-conditions') }}" class="terms-a">Terms of Conditions</a> and acknowledge the
                                    <a href="{{ route('privacy-policy') }}" class="terms-a">Privacy Policy</a>.
                                </p>
                            </div>

                            <div class="d-flex flex-column align-items-center">
                                <input type="button" class="signup-btn w-100 contact-confirm-button disabled" id="confirm" name="confirm" value="CONFIRM" disabled />
                                <input type="submit" id="submit" class="signup-btn w-100 hide" class="nav-link btn-blue hide button-1 w-100" id="submit" name="submit" value="SUBMIT" />
                                <a class="signup-a pt-3 hide" id="back">Go back and edit</a>
                            </div>
                        </form>
                    </div>
            </div>
    </div>
        </div>
     </div>
</div>
<!-- Contact section ends -->

@endsection