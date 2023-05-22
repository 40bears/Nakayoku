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
                "Person in charge for this website is                                                                                             
                Producer SASAKI-sanr-sasaki@physis-rs.com We are a leading provider of virtual item trading services for the Japanese gaming community. Our mission is to make it easy for players to buy, sell, and trade their favorite in-game items and currency for real-world money. With a focus on security, reliability, and fair pricing, we have built a reputation as the trusted destination for all your gaming needs. Whether you're a seasoned player or just starting out, we have the expertise and resources to help you achieve your goals. Join us today and experience the best in game item trading!"
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

    <div class="row py-5 px-5">
        <div class="col-md-4 col-sm-12">
            <img src="{{ url('assets/images/about-face-3.png') }}" class="img-fluid border-r" alt="terms" />
        </div>
        <div class="col-md-4 col-sm-12 sp-pad-3">
            <img src="{{ url('assets/images/about-face-2.png') }}" class="img-fluid border-r" alt="terms" />
        </div>
        <div class="col-md-4 col-sm-12">
            <img src="{{ url('assets/images/about-face-1.png') }}" class="img-fluid border-r" alt="terms" />
        </div>
    </div>

    <div class="cloud-img">
        <div class="container">
            <h2 class="story-head text-center">Story</h2>
            <p class="about-p">
                Once upon a time, in the early 1980s, two avid gamers in Japan named Takashi and Yuki realized that there was a huge demand for rare and collectible game items among their fellow gamers. They also noticed that there were no dedicated stores or companies catering to this niche market. Thus, they decided to team up and start their own trading company specializing in rare and vintage game items. <br><br>
They began their business by acquiring a small collection of rare game cartridges and other gaming memorabilia. They then set up shop in a small storefront in Akihabara, a district in Tokyo known for its electronics and gaming shops. They started advertising their items through gaming magazines and word of mouth, and soon enough, their small store became a hub for collectors and enthusiasts alike. <br><br>
As their reputation grew, Takashi and Yuki expanded their inventory and began importing rare items from overseas. They also hired more staff to help with the growing demand. Eventually, their company became one of the most respected game item trading companies in Japan, with a reputation for quality items and excellent customer service. And that's how a passion for gaming turned into a successful business venture.
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