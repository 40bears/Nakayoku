@extends('layout.main')
@section('title', 'About Us | GLOBAL CARPATICA SL')
@section('main-container')

<!-- Main section starts -->
<div class="container-fluid padt-6 px-0">
    <div class="tree-img">
    <div class="container">
        <h3 class="pb-5 signup-h3 text-center">Website Info</h3>
        <div class="menu menu-1 pt-3 pb-5">
            <ul class="navbar-nav sp-scroll d-flex justify-content-center">
                <li class="nav-item">   
                    <a class="nav-link active menu-blk" href="{{ route('about-us') }}"><i class="fa-solid fa-id-card white me-3"></i> About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-blk" href="{{ route('terms-and-conditions') }}"><img src="{{ url('assets/images/terms-pink-icon.svg') }}" class="img-fluid me-3" alt="terms" /> Terms & Conditions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  menu-blk" href="{{ route('privacy-policy') }}"><i class="fa-solid fa-shield-heart pink me-3"></i> Privacy Policy</a>
                </li>
            </ul>
        </div>
        <div class="pt-5">
            <h2 class="story-head text-center">Everybody will get what they wants </h2>
            <p class="about-p">
                "We are a leading provider of virtual item trading services for the Japanese gaming community. Our mission is to make it easy for players to buy, sell, and trade their favorite in-game items and currency for real-world money. With a focus on security, reliability, and fair pricing, we have built a reputation as the trusted destination for all your gaming needs. Whether you're a seasoned player or just starting out, we have the expertise and resources to help you achieve your goals. Join us today and experience the best in game item trading!"
            </p>

         </div>
         <div class="pt-5">
            <h2 class="story-head text-center">Info</h2>
            <p class="about-p">
                "We are a leading provider of virtual item trading services for the Japanese gaming community. Our mission is to make it easy for players to buy, sell, and trade their favorite in-game items and currency for real-world money. With a focus on security, reliability, and fair pricing, we have built a reputation as the trusted destination for all your gaming needs. Whether you're a seasoned player or just starting out, we have the expertise and resources to help you achieve your goals. Join us today and experience the best in game item trading!"
            </p>
         </div>
    </div>
    </div>

    {{-- <div class="row py-5 px-5">
        <div class="col-md-4 col-sm-12">
            <img src="{{ url('assets/images/about-face-3.png') }}" class="img-fluid border-r" alt="terms" />
        </div>
        <div class="col-md-4 col-sm-12 sp-pad-3">
            <img src="{{ url('assets/images/about-face-2.png') }}" class="img-fluid border-r" alt="terms" />
        </div>
        <div class="col-md-4 col-sm-12">
            <img src="{{ url('assets/images/about-face-1.png') }}" class="img-fluid border-r" alt="terms" />
        </div>
    </div> --}}

    <div class="cloud-img pt-5">
        <div class="container">
            <h2 class="story-head text-center">Story</h2>
            <p class="about-p">
                Once upon a time, in the early 2010s, two 16-year-old avid gamers in Japan named Takashi and Yuki noticed a lucrative opportunity within their passion for online gaming. They realized there was substantial demand among fellow gamers for ways to earn money while playing games. They also noticed that there were no companies specifically catering to this unique market. As a result, they decided to team up and start their own company that would provide such opportunities. <br><br>

They began their venture by playing popular online games and developing strategies to profit from them. They then shared these strategies and services through online gaming communities and via social media platforms. Word of mouth quickly spread about their novel methods, and their online platform became a hub for gamers looking to monetize their hobby. <br><br>

As their reputation grew, Takashi and Yuki began creating guides and tutorials for more games, further increasing their influence within the gaming community. They also hired fellow gamers to assist with strategy development and customer service, catering to the burgeoning demand. <br><br>

Eventually, their venture transformed into one of the most respected platforms in Japan for gamers seeking to profit from their pastime. They earned a reputation for their in-depth game knowledge, effective money-making strategies, and exceptional customer service. This story illustrates how a love for online gaming and a keen sense of business opportunity can lead to a successful entrepreneurial venture. <br><br>

            </p>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 col-sp-12">
                <h2 class="story-head">Join Our Community</h2>
                <div class="d-flex pt-3 justify-content-between ">
                    <p class="story-p me-5">For any enquiry</p>
                    <a class="story-a"  href="{{route('contact')}}">Click here</a>
                </div>
                <hr>
            </div>
        </div>
    </div>    
</div>

<!-- Main section ends -->

@endsection