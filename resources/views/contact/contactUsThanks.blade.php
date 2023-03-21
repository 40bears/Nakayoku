@extends('layout.main')
@section('title', 'Contact Us | Nakayoku')
@section('main-container')

<!-- Contact us thanks starts -->
<div class="container-fluid px-0 bg-lgreen padt-5">

    <div class="container d-flex flex-column justify-content-center align-items-center pmypage padt-5">
        <div class="signup-box thanks-w text-center">
            <img src="{{ url('assets/images/success-img.svg') }}" class="img-fluid" alt="success" />
            <h3 class="thanks-head py-3">Thank you so much</h3>

            <label class="thanks-para pb-2 text-center">Our team will contact you shortly with more information</label>
            <p class="thank-para mb-4 pt-3 text-center">
                You will receive a message from us to confirm your e-mail address. One
                of our sales managers will get back to you as soon as possible.
            </p>
        </div>
    </div>
</div>
<!-- Contact us thanks ends -->

@endsection