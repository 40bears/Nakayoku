@extends('layout.main')
@section('title', 'About Us | CII')
@section('main-container')

<!-- Blue section starts -->
<div class="container-fluid px-0 bg-lgreen">
    <div class="container padt-6">
        <ul class="breadcrumb menu menu1">
            <li class="breadcrumb-item"><a href="/">TOP</a></li>
            <li class="breadcrumb-item"><a href="{{ route('about-us') }}">About Us</a></li>
        </ul>
    </div>

    <!-- My page starts -->
    <div class="container padt-3">
        <div class="row">
            <!-- Left side starts -->
            {{-- <div class="col-md-3 col-sm-12">
                <h5 class="border-nav pb-3 mb-0">Website Info </h5>
                <ul class="ps-0 left-menu">
                    <a href="{{ route('about-us') }}" class="">
                        <li class="border-nav ps-3 py-3 current-page">
                            About Us
                        </li>
                    </a>
                    <a href="{{ route('terms-and-conditions') }}">
                        <li class="border-nav ps-3 py-3">
                            Terms & Conditions
                        </li>
                    </a>
                    <a href="{{ route('privacy-policy') }}">
                        <li class="border-nav ps-3 py-3">
                            Privacy Policy
                        </li>
                    </a>
                </ul>
            </div> --}}
            <!-- Left side ends -->

            <!-- Right side starts -->

            <div class="col-md-12">
                <h3 class="pb-5 signup-h3 text-center">Website Info</h3>
                <div class="menu menu-1 pt-3">
                    <ul class="navbar-nav sp-scroll">
                        <li class="nav-item">
                            <a class="nav-link menu-blk active" href="{{ route('about-us') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-blk" href="{{ route('terms-and-conditions') }}">Terms & Conditions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-blk" href="{{ route('privacy-policy') }}">Privacy Policy</a>
                        </li>
                    </ul>
                </div>
                <hr />

                <div class="d-flex align-items-start justify-content-center py-5 sp-column">
                        <div class="col-md-6 col-sp-12">
                            <img src="{{ url('assets/images/about-1.jpg') }}" class="img-fluid">
                        </div>

                        <div class="col-md-6 col-sp-12 info-pl">
                            <h2 class="story-head">Story</h2>
                            <p class="about-p">
                                “It’s not our goals that unite us, but the things we do to achieve them. Because although our training grounds and end goals might be different, sweat is our sport. And we’re a team of individuals who know that to go further, we go together. <br><br>

                                Our legacy began in 2012, from a garage in Birmingham, UK with nothing but a sewing machine, a screen-printer and ambitions we had no right to hold. Today, we create the tools that help everyone become their personal best: the clothing you’ll sweat in, the content you’ll find inspiration in and the community you’ll become your best in. <br><br>

                                Our Gymshark family of employees, athletes and followers is now over 10 million strong, with a total social media following of over 18 million and customers in over 230 countries across our 14 online stores. Our employee family is growing too, with over 900 employees across offices in five regions, including Solihull, UK (just outside our hometown) and Denver, Colorado.”
                            </p>
                        </div>
                </div>

                <div class="d-flex align-items-start justify-content-center py-5 sp-column">
                    <div class="col-md-6 col-sp-12 info-pr">
                        <h3 class="story-head-2">Info</h3>
                        <p class="about-p">
                            "We are a leading provider of virtual item trading services for the Japanese gaming community. Our mission is to make it easy for players to buy, sell, and trade their favorite in-game items and currency for real-world money. With a focus on security, reliability, and fair pricing, we have built a reputation as the trusted destination for all your gaming needs. Whether you're a seasoned player or just starting out, we have the expertise and resources to help you achieve your goals. Join us today and experience the best in game item trading!"
                        </p>
                    </div>
                    <div class="col-md-6 col-sp-12 info">
                        <img src="{{ url('assets/images/about-4.png') }}" class="img-fluid">
                    </div>
                 </div>

                 
                <div class="d-flex align-items-start justify-content-center py-5 sp-column">
                    <div class="col-md-6 col-sp-12">
                        <img src="{{ url('assets/images/about-2.jpg') }}" class="img-fluid">
                    </div>

                    <div class="col-md-6 col-sp-12 info-pl">
                        <h2 class="story-head-2">Everybody will get what they wants </h2>
                        <p class="about-p">
                            "Person in charge for this website is  <br>
                             <span class="top-game">Producer SASAKI-sanr-sasaki@physis-rs.com</span>. We are a leading provider of virtual item trading services for the Japanese gaming community. Our mission is to make it easy for players to buy, sell, and trade their favorite in-game items and currency for real-world money. With a focus on security, reliability, and fair pricing, we have built a reputation as the trusted destination for all your gaming needs. Whether you're a seasoned player or just starting out, we have the expertise and resources to help you achieve your goals. Join us today and experience the best in game item trading!"
                        </p>
                    </div>
                 </div>

                 <div class="d-flex flex-column pb-5">
                    <div class="col-md-6 col-sp-12">
                        <h2 class="story-head-2">Join Our Community</h2>
                        <div class="d-flex pt-3 justify-content-between ">
                            <p class="story-p me-5">For any enquiry</p>
                            <a class="story-a green"  href="{{route('contact')}}">Click here</a>
                        </div>
                    </div>
                 </div>

            </div>
            <!-- Right side ends -->
        </div>
    </div>
    <!-- My page ends -->
</div>
<!-- Blue section ends -->

@endsection