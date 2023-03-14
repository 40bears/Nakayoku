@extends('layout.main')
@section('title', 'Not Found | MDAE')
@section('main-container')

<!-- Contact us thanks starts -->
<div class="container-fluid px-0 bg-blue">
    <div class="container pt-4">
        <ul class="breadcrumb menu menu1">
            <li class="breadcrumb-item"><a href="/">TOP</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user-guide') }}">User Guide</a></li>
        </ul>
    </div>
    <div class="container d-flex flex-column justify-content-center align-items-center pmypage">
        <h3 class="border-0 pb-5">Sorry</h3>

        <label class="form-label pb-2">The page you are looking for doesnot exist.</label>
        <p class="thank-p mb-4 w-50 pt-3 text-center">
            Please go back and try again
        </p>
        <div class="d-flex flex-column align-items-center">
            <a class="show font-pswd pt-3" id="back" class="hide" href="{{ route('user-guide') }}">Go back</a>
        </div>
    </div>
</div>
<!-- Contact us thanks ends -->

@endsection