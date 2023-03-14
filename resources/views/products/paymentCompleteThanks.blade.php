@extends('layout.main')
@section('title', 'Payment Complete | CII')
@section('main-container')

<!-- Thankyou starts -->
<div class="container-fluid px-0 bg-lgreen padt-5">
    <div class="container d-flex flex-column justify-content-center align-items-center pmypage padt-5">
        <div class="signup-box thanks-w text-center">
            <img src="{{ url('assets/images/success-img.svg') }}" class="img-fluid" alt="success" />
            <h3 class="thanks-head py-3">Thank you !</h3>

            <p class="thank-para mb-4 pt-3 text-center">
                Thank you, for successfully completing the payment.<br>
                Please wait, You will be notified via email once the payment is verified.
            </p>
        </div>
    </div>
</div>
<!-- Thankyou ends -->

@endsection