@extends('layout.main')
@section('title', 'Identity | GLOBAL CARPATICA SL')
@section('main-container')

<!-- Rating thanks starts -->
<div class="container-fluid px-0 bg-lgreen padt-6">
    <div class="container pt-4">
        <ul class="breadcrumb menu menu1">
            <li class="breadcrumb-item"><a href="/">TOP</a></li>
            <li class="breadcrumb-item"><a href="{{ route('identity-verification') }}">Identity</a></li>
        </ul>
    </div>
    <div class="container d-flex flex-column justify-content-center align-items-center plogin">
        <h3 class="border-0 pb-5 text-light">Identity Verification Submitted</h3>
    </div>
</div>
<!-- Rating thanks ends -->

@endsection