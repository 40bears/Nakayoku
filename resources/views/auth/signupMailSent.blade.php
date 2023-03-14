@extends('layout.main')
@section('title', 'Verification Mail | CII')
@section('main-container')

<!-- Thankyou starts -->
<div class="container-fluid px-0 bg-lgreen padt-5">
    <div class="container pt-4">
        <img src="{{ url('assets/images/goback-mark.svg') }}" class="img-fluid" alt="goback" />
        <a href="/" class="go-back ps-3"> GO BACK</a>
    </div>
    <div class="container d-flex flex-column justify-content-center align-items-center psignup">
        <h4 class="success-h4">Verification Mail has been successfully sent !</h4>
        <p class="thank-p mb-4 w-50 pt-4">
            Please check your email and click on the verification link provided in the mail to proceed.
        </p>
    </div>
</div>
<!-- Thankyou ends -->

@endsection