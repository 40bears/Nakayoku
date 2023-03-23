<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets/images/favicon-nakayoku.svg') }}">
</head>

<body>
    <!-- Header starts -->
    <header class="shadow-header bg-blk">
        <div class="container-fluid px-0">
            {{-- <div class="banner-top hidden fade" id="banner-top">
                <div class="container container-bnr">
                    <p class="banner-p">
                        We use cookies to improve your experience on DMarket as described in
                        our Privacy Policy. By continue using this website, you give us consent
                        to the use of cookies.
                    </p>
                    <a class="btn-green  button-1" id="agree">Agree</a>
                </div>
            </div> --}}

                    <!-- Banner starts -->
                    <div class="">
                        <nav id="navbar_top" class="navbar">
                            <div class="container header sp-pad">
                                <div class="header-left">
                                    <a href="/"> <img src="{{ url('assets/images/Nakayoku-logo.svg') }}" alt="logo"></a>    
                                    <a class="nav-link view-2 d-md-none d-sm-block" href="{{route('add-product')}}">SELL</a>
                                    <div id="navbarNav" class="display">
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link  {{ Route::is('all-games') ? 'active' : '' }}" href="{{ route('all-games') }}">GAMES</a>
                                            </li>
                                            @if(Auth::user())
                                            <li class="nav-item">
                                                <a class="nav-link  {{ Route::is('view-my-page') ? 'active' : '' }}" href="{{ route('view-my-page') }}">MY PAGE</a>
                                            </li>
                                            @endif
                                            <li class="nav-item menu menu1">
                                                <div class="d-flex justify-content-around">
                                                    <img src="{{ url('assets/images/currency.svg') }}" class="img-fluid pe-2" alt="currency">
                                                    <a class="nav-link" data-toggle="modal" data-target="#basicModal">{{Auth::user() ? Auth::user()->base_currency : Session::get('base_currency')}}</a>
                                                </div>
                                            </li>
                                            <li class="nav-item dropdown">
                                                @if(Auth::user())
                                                <a class="nav-link" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    @else
                                                    <a class="nav-link" href="{{ route('login') }}">
                                                        @endif
                                                        <img src="{{ url('assets/images/setting.svg') }}" class="img-fluid pe-2" alt="setting">
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class="bg-blk-dark border-radius">
                                                            @if(Auth::user())
                                                            <a href="{{ route('profile-page', [ 'id' => Auth::id()] ) }}">
                                                                <div class="d-flex justify-content-between align-items-center mx-3">
                                                                    <div class="d-flex py-3">
                                                                        @if(Auth::user() && Auth::user()->profile_picture != null)
                                                                        <img src="{{ url('storage/uploads/' . Auth::user()->profile_picture) }}" class="align-self-center img-fluid dropdown-profile-img me-2" alt="games" />
                                                                        @else
                                                                        <img src="{{ url('assets/images/profile-new.svg') }}" class="align-self-center img-fluid dropdown-profile-img me-2" alt="games" />
                                                                        @endif
    
                                                                        <div class="d-flex flex-column ps-2">
                                                                            @if(Auth::user() && Auth::user()->display_name != null)
                                                                            <p class="text-start name pb-1">{{Auth::user()->display_name}}</p>
                                                                            @else
                                                                            <p class="text-start name pb-1">{{Auth::user()->first_name . ' ' . Auth::user()->last_name}}</p>
                                                                            @endif
                                                                            <div class="d-flex justify-content-around align-items-center">
                                                                                @for ($i = 1; $i
                                                                                <= Auth::user()->user_rating; $i++) <img src="{{ url('assets/images/star-solid-green.svg') }}" class="img-fluid" alt="rating" />
                                                                                    @endfor
                                                                                    @for ($j = 1; $j
                                                                                    <= ( 5 - Auth::user()->user_rating); $j++) <img src="{{ url('assets/images/rating-gray.png') }}" class="img-fluid" alt="rating" />
                                                                                        @endfor
                                                                                        <span class="rating-top">{{showUserRatingPercentage(Auth::id())}}% ({{Auth::user()->total_ratings}})</span>
                                                                            </div>
                                                                            <div class="d-flex justify-content-around align-items-center">
                                                                                @if(Auth::user()->document_verification == 'VERIFIED')
                                                                                <img src="{{ url('assets/images/identity-confirm.svg') }}" class="img-fluid" alt="games" />
                                                                                <p class="identity mb-0">Identity confirmed</p>
                                                                                @else
                                                                                <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid me-2" alt="games" />
                                                                                <p class="identity mb-0">Identity not confirmed</p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <img src="{{ url('assets/images/white-arrow.svg') }}" class="img-fluid" alt="goback" />
                                                                </div>
                                                                {{-- <hr /> --}}
                                                            </a>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('view-my-page') }}" class="drop-menu">
                                                                <div class="d-flex justify-content-between me-3 ms-4">
                                                                    <div class="d-flex">
                                                                        <img src="{{ url('assets/images/page-icon.svg') }}" class="img-fluid me-3">
                                                                        My Page
                                                                    </div>
                                                                    <img src="{{ url('assets/images/white-arrow.svg') }}" class="img-fluid" alt="goback" />
                                                                </div>
                                                            </a>
                                                            <hr class="drop-hr">
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('currently-on-display') }}" class="drop-menu">
                                                                <div class="d-flex justify-content-between me-3 ms-4">
                                                                    <div class="d-flex">
                                                                        <img src="{{ url('assets/images/tv-icon.svg') }}" class="img-fluid me-3">
                                                                        Currently on display
                                                                    </div>
                                                                    <img src="{{ url('assets/images/white-arrow.svg') }}" class="img-fluid" alt="goback" />
                                                                </div>
                                                            </a>
                                                            <hr class="drop-hr">
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('view-interested-products') }}" class="drop-menu">
                                                                <div class="d-flex justify-content-between me-3 ms-4">
                                                                    <div class="d-flex">
                                                                        <img src="{{ url('assets/images/interested-items.svg') }}" class="img-fluid me-3">
                                                                        Interested Items
                                                                    </div>
                                                                    <img src="{{ url('assets/images/white-arrow.svg') }}" class="img-fluid" alt="goback" />
                                                                </div>
                                                            </a>
                                                            <hr class="drop-hr">
                                                        </li>
    
                                                        @if(Auth::user() && Auth::user()->user_type == 'admin')
                                                        <li>
                                                            <a href="{{ route('add-game') }}" class="drop-menu">
                                                                <div class="d-flex justify-content-between me-3 ms-4">
                                                                    <div class="d-flex">
                                                                        <img src="{{ url('assets/images/add-game.svg') }}" class="img-fluid me-3">
                                                                        Add Game
                                                                    </div>
                                                                    <img src="{{ url('assets/images/white-arrow.svg') }}" class="img-fluid" alt="goback" />
                                                                </div>
                                                            </a>
                                                            <hr class="drop-hr">
                                                        </li>
                                                        @endif
    
                                                        @if(Auth::user())
                                                        <li>
                                                            <a href="{{ route('logout') }}" class="drop-menu">
                                                                <div class="d-flex">
                                                                    <img src="{{ url('assets/images/sign-out.svg') }}" class="img-fluid me-3 ms-4">
                                                                    Sign Out
                                                                </div>
                                                            </a>
                                                        </li>
                                                        @endif
                                                    </ul>
                                            </li>
                                            <li class="nav-item menu menu1">
                                                <div class="d-flex align-self-center">
                                                    <a class="nav-link align-self-center" href="{{ route('notifications') }}">
                                                        <img src="{{ url('assets/images/message.svg') }}" class="img-fluid" alt="notification">
                                                    </a>
                                                    @if(Auth::user() && Auth::user()->unreadNotifications()->count() > 9)
                                                    <p class="text-light bg-danger rounded-circle px-1">{{Auth::user()->unreadNotifications()->count()}}</p>
                                                    @elseif(Auth::user() && Auth::user()->unreadNotifications()->count() > 0)
                                                    <p class="text-light bg-danger rounded-circle w-100 px-2">{{Auth::user()->unreadNotifications()->count()}}</p>
                                                    @endif
                                                </div>
                                            </li>
                                            {{-- <li class="nav-item">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="fa-solid fa-magnifying-glass white icon"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-2" aria-labelledby="dropdownMenuLink2">
                                                    <div class="d-flex search-box-div">
                                                        <form class="d-flex w-100 display" action="{{ route('dashboard-search') }}" method="POST">
                                                            @csrf
                                                            <input type="text" class="search-text-box searchTerm" autocomplete="off" name="top_page_search" id="dashboard_game_name" placeholder="What are you looking for?" value="{{request()->get('top_page_search')}}">
                                                            <button type="submit" class="searchButton">
                                                                <i class="fa-solid fa-magnifying-glass icon txt-blk"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </ul>
                                            </li> --}}
                                        </ul>
                                    </div>

                                    {{-- <a class="d-md-none d-sm-block" data-toggle="modal" data-target="#basicModal"><img src="{{ url('assets/images/currency-blk.svg') }}" class="img-fluid" alt="currency" /></a> --}}
                                </div>
    
                                <div id="navbarNav" class="display">
                                    <ul class="navbar-nav">
                                       
                                        @if(!Auth::user())
                                        <li class="nav-item menu menu1">
                                            <a class="nav-link view" href="{{ route('login') }}">Sign in</a>
                                        </li>
                                        @endif
                                       
                                        <li class="nav-item sell-li">
                                            <a class="nav-link view-2" href="{{route('add-product')}}">SELL</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                    </div>
                    <!-- Banner ends -->

        </div>
    </header>
    <!-- Header ends -->

    <!-- Modal starts-->
    <div class="container">
        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="form-p w-500" id="myModalLabel">CURRENCY SETTING</h4>
                    </div>
                    <form action="{{ route('change-base-currency') }}" method="POST">
                        <div class="modal-body">
                            <label class="form-p w-500 pb-2">Select your currency</label>
                            <div class="form-group">
                                @csrf
                                <label for="exampleFormControlSelect1" class="d-none">Select</label>
                                <select class="select-bank form-p w-100" name="base_currency" id="exampleFormControlSelect1">
                                    @foreach($currency as $key => $value)
                                    @if(Auth::user())
                                    <option value="{{$key}}" {{$key == Auth::user()->base_currency ? 'selected' : ''}}>{{$key}} {{($key == 'USD' ? '$' : ($key == 'EUR' ? '€' : ($key == 'JPY' ? '¥' : '')))  }}</option>
                                    @else
                                    <option value="{{$key}}" {{$key == Session::get('base_currency') ? 'selected' : ''}}>{{$key}} {{($key == 'USD' ? '$' : ($key == 'EUR' ? '€' : ($key == 'JPY' ? '¥' : '')))  }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" class="signup-btn w-100 border-0">APPLY</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal ends --}}

    <!-- Blue section starts -->
    <div class="container-fluid px-0 bg-lgreen">
        <div class="container padt-6">
            {{-- <ul class="breadcrumb menu menu1">
                <li class="breadcrumb-item"><a href="/">TOP</a></li>
                <li class="breadcrumb-item"><a href="{{ route('view-my-page') }}">MyPage</a></li>
                @if(Route::is('view-purchased-products'))
                <li class="breadcrumb-item"><a href="{{ route('view-purchased-products') }}">Purchased Products</a></li>
                @elseif(Route::is('view-draft-products'))
                <li class="breadcrumb-item"><a href="{{ route('view-draft-products') }}">Sell Drafts</a></li>
                @elseif(Route::is('view-interested-products'))
                <li class="breadcrumb-item"><a href="{{ route('view-interested-products') }}">Interested Products</a></li>
                @elseif(Route::is('sales-and-deposits'))
                <li class="breadcrumb-item"><a href="{{ route('sales-and-deposits') }}">Sales and Deposits</a></li>
                @elseif(Route::is('withdrawal-request'))
                <li class="breadcrumb-item"><a href="{{ route('withdrawal-request') }}">Withdrawal Request</a></li>
                @elseif(Route::is('withdrawal-request-history'))
                <li class="breadcrumb-item"><a href="{{ route('withdrawal-request') }}">Withdrawal Request</a></li>
                <li class="breadcrumb-item"><a href="{{ route('withdrawal-request-history') }}">Withdrawal Request History</a></li>
                @elseif(Route::is('view-password-details'))
                <li class="breadcrumb-item"><a href="{{ route('view-password-details') }}">User Profile</a></li>
                <li class="breadcrumb-item"><a href="{{ route('view-password-details') }}">Email and Password</a></li>
                @elseif(Route::is('view-bank-details'))
                <li class="breadcrumb-item"><a href="{{ route('view-password-details') }}">User Profile</a></li>
                <li class="breadcrumb-item"><a href="{{ route('view-bank-details') }}">Bank Info</a></li>
                @elseif(Route::is('view-personal-info'))
                <li class="breadcrumb-item"><a href="{{ route('view-password-details') }}">User Profile</a></li>
                <li class="breadcrumb-item"><a href="{{ route('view-personal-info') }}">Personal Info</a></li>
                @elseif(Route::is('identity-verification'))
                <li class="breadcrumb-item"><a href="{{ route('view-password-details') }}">User Profile</a></li>
                <li class="breadcrumb-item"><a href="{{ route('identity-verification') }}">Identity Verification</a></li>
                @elseif(Route::is('notifications'))
                <li class="breadcrumb-item"><a href="{{ route('notifications') }}">Notification</a></li>
                @endif
            </ul> --}}
        </div>

        <!-- My page starts -->
        <div class="container pmypage">
            <div class="row">
                <!-- Left side starts -->
                <div class="col-md-3 col-sm-12 display pleft">
                    <div id="leftmenu">


                        @if(Auth::user()->user_type == 'admin')
                        <!-- Fifth line starts -->
                        <div class="d-flex align-items-center justify-contant-center menu-div mb-2">
                             <i class="fa-solid fa-user mb-0 white"></i>
                             <h3 class="menu-h3 mb-0 ps-3">Admin Section</h3>
                        </div>
                        <ul class="ps-0 left-menu">
                            <a href="{{ route('notification-mmt') }}">
                                <li class="ps-5 py-2 {{ Route::is('notification-mmt') ? 'current-page' : '' }}">
                                    Notification Portal
                                </li>
                            </a>
                            <a href="{{ route('view-games') }}">
                                <li class="ps-5 py-2 {{ Route::is('view-games') || Route::is('view-games-post') ? 'current-page' : '' }}">
                                    Game List
                                </li>
                            </a>
                            <a href="{{ route('id-approvals') }}">
                                <li class="ps-5 py-2 {{ Route::is('id-approvals') ? 'current-page' : '' }}">
                                    ID Approvals
                                </li>
                            </a>
                            <a href="{{ route('cii-bank-accounts') }}">
                                <li class="ps-5 py-2 {{ Route::is('cii-bank-accounts') || Route::is('edit-cii-bank-account') || Route::is('add-cii-bank-account') ? 'current-page' : '' }}">
                                    CII Bank Details
                                </li>
                            </a>
                            <a href="{{ route('transactions-management') }}">
                                <li class="ps-5 py-2 {{ Route::is('transactions-management') ? 'current-page' : '' }}">
                                    Transactions
                                </li>
                            </a>
                            <a href="{{ route('withdraw-requests-management') }}">
                                <li class="left-menu-lh ps-5 py-2 {{ Route::is('withdraw-requests-management') ? 'current-page' : '' }}">
                                    Withdraw Requests
                                </li>
                            </a>
                            <a href="{{ route('view-pages') }}">
                                <li class="ps-5 py-2 {{ Route::is('view-pages') ? 'current-page' : '' }}">
                                    User Guide Pages
                                </li>
                            </a>
                        </ul>
                        <!-- Fifth line ends -->
                        @endif

                        <!-- First line starts -->
                        <div class="d-flex align-items-center justify-contant-center menu-div mb-2">
                            <i class="fa-solid fa-user mb-0 white"></i>
                            <h3 class="menu-h3 mb-0 ps-3">Sell Items</h3>
                       </div>
                        <ul class="ps-0 left-menu">
                            <a href="{{ route('currently-on-display') }}" class="">
                                <li class="ps-5 py-2 {{ Route::is('currently-on-display') ? 'current-page' : '' }}">
                                    Currently on display
                                </li>
                            </a>
                            <a href="{{ route('view-sold-products') }}" class="">
                                <li class="ps-5 py-2 {{ Route::is('view-sold-products') ? 'current-page' : '' }}">
                                    Sold items history
                                </li>
                            </a>
                            <a href="{{ route('view-draft-products') }}">
                                <li class="ps-5 py-2 {{ Route::is('view-draft-products') ? 'current-page' : '' }}">
                                    Sell Drafts
                                </li>
                            </a>
                        </ul>

                        <!-- First line ends -->

                        <!-- Second line starts -->
                        <div class="d-flex align-items-center justify-contant-center menu-div mb-2">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <h3 class="menu-h3 mb-0 ps-3">Purchased Items</h3>
                       </div>
                        <ul class="ps-0 left-menu">
                            <a href="{{ route('view-purchased-products') }}">
                                <li class="ps-5 py-2 {{ Route::is('view-purchased-products') ? 'current-page' : '' }}">
                                    Purchased Items
                                </li>
                            </a>
                            <a href="{{ route('view-interested-products') }}">
                                <li class="ps-5 py-2 {{ Route::is('view-interested-products') ? 'current-page' : '' }}">
                                    Interested items
                                </li>
                            </a>

                        </ul>
                        <!-- Second line ends -->

                        <!-- Third line starts -->
                        <div class="d-flex align-items-center justify-contant-center menu-div mb-2">
                            <i class="fa-solid fa-money-check-dollar"></i>
                            <h3 class="menu-h3 mb-0 ps-3">Money Management</h3>
                       </div>
                        <ul class="ps-0 left-menu">
                            <a href="{{ route('sales-and-deposits') }}">
                                <li class="ps-5 py-2 {{ Route::is('sales-and-deposits') ? 'current-page' : '' }}">
                                    Sales and Deposit
                                </li>
                            </a>
                            <a href="{{ route('withdrawal-request') }}">
                                <li class="ps-5 py-2 {{ Route::is('withdrawal-request') ? 'current-page' : '' }}">
                                    Transfer Request
                                </li>
                            </a>
                            <a href="{{ route('withdrawal-request-history') }}">
                                <li class="ps-5 py-2 {{ Route::is('withdrawal-request-history') ? 'current-page' : '' }}">
                                    Request History
                                </li>
                            </a>
                        </ul>
                        <!-- Third line ends -->

                        <!-- Fourth line starts -->
                        <div class="d-flex align-items-center justify-contant-center menu-div mb-2">
                            <i class="fa-solid fa-gears"></i>
                            <h3 class="menu-h3 mb-0 ps-3">User Setting</h3>
                       </div>
                        <ul class="ps-0 left-menu">
                            <a href="{{ route('notifications') }}">
                                <li class="ps-5 py-2 {{ Route::is('notifications') ? 'current-page' : '' }}">
                                    Notification
                                </li>
                            </a>
                            <a href="{{ route('view-password-details') }}">
                                <li class="ps-5 py-2 {{ Route::is('view-password-details') ? 'current-page' : '' }}">
                                    Email and Password
                                </li>
                            </a>
                            <a href="{{ route('view-bank-details') }}">
                                <li class="ps-5 py-2 {{ Route::is('view-bank-details') ? 'current-page' : '' }}">
                                    Bank Info
                                </li>
                            </a>
                            <a href="{{ route('view-personal-info') }}">
                                <li class="ps-5 py-2 {{ Route::is('view-personal-info') ? 'current-page' : '' }}">
                                    Personal Info
                                </li>
                            </a>
                            <a href="{{ route('identity-verification') }}">
                                <li class="ps-5 py-2 {{ Route::is('identity-verification') ? 'current-page' : '' }}">
                                    Identity Verification
                                </li>
                            </a>
                        </ul>
                        <!-- Fourth line ends -->


                    </div>
                </div>
                <!-- Left side ends -->

                {{-- Left side starts for sp --}}
                <div class="col-md-3 col-sm-12 d-md-none d-sm-block sp-dash">
                    <div class="accordion" id="accordionExample">
                        @if(Auth::user()->user_type == 'admin')
                        <div class="accordion-item">
                            <h2 class="accordion-header py-1" id="headingThree">
                                <div class="d-flex align-items-center justify-contant-center menu-div mb-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                                   <i class="fa-solid fa-user mb-0 white"></i>
                                    <h3 class="menu-h3 mb-0 ps-3">Admin Section</h3>
                                </button>
                                </div>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="ps-0 left-menu">
                                        <a href="{{ route('notification-mmt') }}">
                                            <li class="ps-3 py-2 {{ Route::is('notification-mmt') ? 'current-page' : '' }}">
                                                Notification Portal
                                            </li>
                                        </a>
                                        <a href="{{ route('view-games') }}">
                                            <li class="ps-3 py-2 {{ Route::is('view-games') || Route::is('view-games-post') ? 'current-page' : '' }}">
                                                Games
                                            </li>
                                        </a>
                                        <a href="{{ route('id-approvals') }}">
                                            <li class="ps-3 py-2 {{ Route::is('id-approvals') ? 'current-page' : '' }}">
                                                ID Approvals
                                            </li>
                                        </a>
                                        <a href="{{ route('cii-bank-accounts') }}">
                                            <li class="ps-3 py-2 {{ Route::is('cii-bank-accounts') || Route::is('edit-cii-bank-account') || Route::is('add-cii-bank-account') ? 'current-page' : '' }}">
                                                CII Bank Details
                                            </li>
                                        </a>
                                        <a href="{{ route('transactions-management') }}">
                                            <li class="ps-3 py-2 {{ Route::is('transactions-management') ? 'current-page' : '' }}">
                                                Transactions
                                            </li>
                                        </a>
                                        <a href="{{ route('withdraw-requests-management') }}">
                                            <li class="ps-3 py-2 {{ Route::is('withdraw-requests-management') ? 'current-page' : '' }}">
                                                Withdraw Requests
                                            </li>
                                        </a>
                                        <a href="{{ route('view-pages') }}">
                                            <li class="ps-3 py-2 {{ Route::is('view-pages') ? 'current-page' : '' }}">
                                                User Guide Pages
                                            </li>
                                        </a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="accordion-item">
                            <h2 class="accordion-header py-1" id="headingOne">
                                <div class="d-flex align-items-center justify-contant-center menu-div mb-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="fa-solid fa-user mb-0 white"></i>
                                    <h3 class="menu-h3 mb-0 ps-3">Sell Items</h3>
                                </button>
                                </div>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="ps-0 left-menu">
                                        <a href="{{ route('currently-on-display') }}" class="">
                                            <li class="ps-3 py-2 {{ Route::is('currently-on-display') ? 'current-page' : '' }}">
                                                Currently on display
                                            </li>
                                        </a>
                                        <a href="{{ route('view-sold-products') }}" class="">
                                            <li class="ps-3 py-2 {{ Route::is('view-sold-products') ? 'current-page' : '' }}">
                                                Sold items history
                                            </li>
                                        </a>
                                        <a href="{{ route('view-draft-products') }}">
                                            <li class="ps-3 py-2 {{ Route::is('view-draft-products') ? 'current-page' : '' }}">
                                                Sell Drafts
                                            </li>
                                        </a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header py-1" id="headingTwo">
                                <div class="d-flex align-items-center justify-contant-center menu-div mb-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fa-solid fa-cart-shopping white"></i>
                                    <h3 class="menu-h3 mb-0 ps-3">Purchased Items</h3>
                                </button>
                                </div>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="ps-0 left-menu">
                                        <a href="{{ route('view-purchased-products') }}">
                                            <li class="ps-3 py-2 {{ Route::is('view-purchased-products') ? 'current-page' : '' }}">
                                                Purchased Items
                                            </li>
                                        </a>
                                        <a href="{{ route('view-interested-products') }}">
                                            <li class="ps-3 py-2 {{ Route::is('view-interested-products') ? 'current-page' : '' }}">
                                                Interested items
                                            </li>
                                        </a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header py-1" id="headingThree">
                                <div class="d-flex align-items-center justify-contant-center menu-div mb-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="fa-solid fa-money-check-dollar white"></i>
                                    <h3 class="menu-h3 mb-0 ps-3">Money Management</h3>
                                </button>
                                </div>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="ps-0 left-menu">
                                        <a href="{{ route('sales-and-deposits') }}">
                                            <li class="ps-3 py-2 {{ Route::is('sales-and-deposits') ? 'current-page' : '' }}">
                                                Sales and Deposit
                                            </li>
                                        </a>
                                        <a href="{{ route('withdrawal-request') }}">
                                            <li class="ps-3 py-2 {{ Route::is('withdrawal-request') ? 'current-page' : '' }}">
                                                Transfer Request
                                            </li>
                                        </a>
                                        <a href="{{ route('withdrawal-request-history') }}">
                                            <li class="ps-3 py-2 {{ Route::is('withdrawal-request-history') ? 'current-page' : '' }}">
                                                Request History
                                            </li>
                                        </a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header py-1" id="headingThree">
                                <div class="d-flex align-items-center justify-contant-center menu-div mb-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="fa-solid fa-gears white"></i>
                                    <h3 class="menu-h3 mb-0 ps-3">User Setting</h3>
                                </button>
                                </div>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="ps-0 left-menu">
                                        <a href="{{ route('notifications') }}">
                                            <li class="ps-3 py-2 {{ Route::is('notifications') ? 'current-page' : '' }}">
                                                Notification
                                            </li>
                                        </a>
                                        <a href="{{ route('view-password-details') }}">
                                            <li class="ps-3 py-2 {{ Route::is('view-password-details') ? 'current-page' : '' }}">
                                                Email and Password
                                            </li>
                                        </a>
                                        <a href="{{ route('view-bank-details') }}">
                                            <li class="ps-3 py-2 {{ Route::is('view-bank-details') ? 'current-page' : '' }}">
                                                Bank Info
                                            </li>
                                        </a>
                                        <a href="{{ route('view-personal-info') }}">
                                            <li class="ps-3 py-2 {{ Route::is('view-personal-info') ? 'current-page' : '' }}">
                                                Personal Info
                                            </li>
                                        </a>
                                        <a href="{{ route('identity-verification') }}">
                                            <li class="ps-3 py-2 {{ Route::is('identity-verification') ? 'current-page' : '' }}">
                                                Identity Verification
                                            </li>
                                        </a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Left side ends for sp --}}

                @yield('main-container')

                <!-- Footer starts -->
                @include('layout.parts.footer')
                <!-- Footer ends -->

                <!-- Fixed bottom menu starts -->
                <div id="bottom-fix">
                    <div class="d-flex justify-content-around align-items-center mt-1">
                        <a href="/">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <i class="fa-solid fa-house c-green"></i>
                                <p class="bottom-menu">Top</p>
                            </div>
                        </a>
                        <a href="{{route('add-product')}}">
                            <div class="d-flex flex-column align-items-center  justify-content-center">
                                <i class="fa-solid fa-gamepad c-green"></i>
                                <p class="bottom-menu">Sell</p>
                            </div>
                        </a>
                        <a href="{{ route('notifications') }}">
                            <div class="d-flex flex-column align-items-center  justify-content-center">
                                <i class="fa-solid fa-bell c-green"></i>
                                <p class="bottom-menu">Notification</p>
                            </div>
                        </a>
                        <a href="#" class="bottom-a">
                            <div class="d-flex flex-column align-items-center  justify-content-center">
                                <i class="fa-solid fa-bars c-green"></i>
                                <p class="bottom-menu">Menu</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="dropdown-bottom d-none">
                    <ul class="dropdown-content">
                        <li class="bg-green border-radius">
                            @if(Auth::user())
                            <a href="{{ route('profile-page', ['id' => Auth::id()] ) }}" class="p-0">
                                <div class="d-flex justify-content-between align-items-center mx-3">
                                    <div class="d-flex py-3">
                                        @if(Auth::user() && Auth::user()->profile_picture != null)
                                        <img src="{{ url('storage/uploads/' . Auth::user()->profile_picture) }}" class="align-self-center img-fluid dropdown-profile-img-w me-2" alt="games" />
                                        @else
                                        <img src="{{ url('assets/images/profile-new.svg') }}" class="align-self-center img-fluid dropdown-profile-img me-2" alt="games" />
                                        @endif

                                        <div class="d-flex flex-column ps-2">
                                            @if(Auth::user() && Auth::user()->display_name != null)
                                            <p class="text-start name pb-1">{{Auth::user()->display_name}}</p>
                                            @else
                                            <p class="text-start name pb-1">{{Auth::user()->first_name . ' ' . Auth::user()->last_name}}</p>
                                            @endif
                                            <div class="d-flex justify-content-around align-items-center">
                                                @for ($i = 1; $i
                                                <= Auth::user()->user_rating; $i++) <img src="{{ url('assets/images/star-solid-green.svg') }}" class="img-fluid" alt="rating" />
                                                    @endfor
                                                    @for ($j = 1; $j
                                                    <= ( 5 - Auth::user()->user_rating); $j++) <img src="{{ url('assets/images/rating-gray.png') }}" class="img-fluid" alt="rating" />
                                                        @endfor
                                                        <span class="rating-top">{{showUserRatingPercentage(Auth::id())}}% ({{Auth::user()->total_ratings}})</span>
                                            </div>
                                            <div class="d-flex justify-content-around align-items-center">
                                                @if(Auth::user()->document_verification == 'VERIFIED')
                                                <img src="{{ url('assets/images/identity-confirm.svg') }}" class="img-fluid me-2" alt="games" />
                                                <p class="identity mb-0">Identity confirmed</p>
                                                @else
                                                <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid me-2" alt="games" />
                                                <p class="identity mb-0">Identity not confirmed</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{ url('assets/images/white-arrow.svg') }}" class="img-fluid" alt="goback" />
                                </div>
                                {{-- <hr /> --}}
                            </a>
                            @endif
                        </li>
                        <li>
                            <a href="{{ route('view-my-page') }}" class="drop-menu">
                                <div class="d-flex justify-content-between me-1 ms-2">
                                    <div class="d-flex">
                                        <img src="{{ url('assets/images/page-icon.svg') }}" class="img-fluid me-3">
                                        My Page
                                    </div>
                                    <img src="{{ url('assets/images/green-arrow.svg') }}" class="img-fluid" alt="goback" />
                                </div>
                            </a>
                            <hr class="drop-hr">
                        </li>
                        <li>
                            <a href="{{ route('currently-on-display') }}" class="drop-menu">
                                <div class="d-flex justify-content-between me-1 ms-2">
                                    <div class="d-flex">
                                        <img src="{{ url('assets/images/tv-icon.svg') }}" class="img-fluid me-3">
                                        Currently on display
                                    </div>
                                    <img src="{{ url('assets/images/green-arrow.svg') }}" class="img-fluid" alt="goback" />
                                </div>
                            </a>
                            <hr class="drop-hr">
                        </li>
                        <li>
                            <a href="{{ route('view-interested-products') }}" class="drop-menu">
                                <div class="d-flex justify-content-between me-1 ms-2">
                                    <div class="d-flex">
                                        <img src="{{ url('assets/images/interested-items.svg') }}" class="img-fluid me-3">
                                        Interested Items
                                    </div>
                                    <img src="{{ url('assets/images/green-arrow.svg') }}" class="img-fluid" alt="goback" />
                                </div>
                            </a>
                            <hr class="drop-hr">
                        </li>

                        @if(Auth::user() && Auth::user()->user_type == 'admin')
                        <li>
                            <a href="{{ route('add-game') }}" class="drop-menu">
                                <div class="d-flex justify-content-between me-1 ms-2">
                                    <div class="d-flex">
                                        <img src="{{ url('assets/images/add-game.svg') }}" class="img-fluid me-3">
                                        Add Game
                                    </div>
                                    <img src="{{ url('assets/images/green-arrow.svg') }}" class="img-fluid" alt="goback" />
                                </div>
                            </a>
                            <hr class="drop-hr">
                        </li>
                        @endif

                        @if(Auth::user())
                        <li>
                            <a href="{{ route('logout') }}" class="drop-menu green">
                                <div class="d-flex">
                                    <img src="{{ url('assets/images/sign-out.svg') }}" class="img-fluid me-3 ms-2">
                                    Sign Out
                                </div>
                            </a>
                        </li>
                        @else
                        <li>
                            <a class="green" href="{{ route('login') }}">
                                <div class="d-flex">
                                    <img src="{{ url('assets/images/sign-out.svg') }}" class="img-fluid me-3 ms-2">
                                    Sign in
                                </div>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- Fixed bottom menu ends -->

                <!-- Javascript Section -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
                <script src="{{ url('assets/js/index.js') }}"></script>


                <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
                <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
                <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />


                <!-- Pageproofer section starts-->
            
                <!-- Pageproofer section ends-->

                <!-- Autocomplete Prediction starts -->
                <script>

                </script>
                <!-- Autocomplete Prediction ends -->

                <!-- Autocomplete Prediction starts -->
                <script>
                    // var path = "{{ url('autocomplete-search-users') }}";
                    // $("#user_emails").typeahead({
                    //     source:
                    //     source2: function(query, process) {
                    //         return $.get(
                    //             path, {
                    //                 emails: query,
                    //             },
                    //             function(data) {
                    //                 $(data).each(function(index, value) {
                    //                     console.log(value);
                    //                 });
                    //                 return process(data);
                    //             }
                    //         );
                    //     },
                    // });
                </script>
                <!-- Autocomplete Prediction ends -->

</body>

</html>