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
    <header class="shadow-header bg-lgreen">
        <div class="container-fluid px-0">

                    <!-- Banner starts -->
                    <div class="">
                        <nav id="navbar_top" class="navbar">
                            <div class="container header sp-pad">
                                <div class="header-left">

                                     {{-- sp menu starts--}}
                                     <div class="menu-outer">
                                        <span class="line first"></span>
                                        <span class="line second"></span>
                                        <span class="line third"></span>
                                        <span class="m-name m-close msb">back</span>
                                    </div>
                                    {{-- sp menu ends --}}

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
                                                    <a class="nav-link" data-toggle="modal" data-target="#basicModal">
                                                        <img src="{{ url('assets/images/currency.svg') }}" class="img-fluid pe-2" alt="currency">
                                                        {{Auth::user() ? Auth::user()->base_currency : Session::get('base_currency')}}
                                                    </a>
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
                                                                                <= Auth::user()->user_rating; $i++) <i class="fa-solid fa-star pink pe-1"></i> 
                                                                                    @endfor
                                                                                    @for ($j = 1; $j
                                                                                    <= ( 5 - Auth::user()->user_rating); $j++) <i class="fa-solid fa-star gray pe-1"></i> 
                                                                                        @endfor
                                                                                        <span class="rating-top">{{showUserRatingPercentage(Auth::id())}}% ({{Auth::user()->total_ratings}})</span>
                                                                            </div>
                                                                            <div class="d-flex justify-content-start align-items-center pt-1">
                                                                                @if(Auth::user()->document_verification == 'VERIFIED')
                                                                                <img src="{{ url('assets/images/r-icon.svg') }}" class="img-fluid me-2" alt="games" />
                                                                                <p class="identity mb-0">Identity Confirmed</p>
                                                                                @else
                                                                                <img src="{{ url('assets/images/x-icon.svg') }}" class="img-fluid me-2" alt="games" />
                                                                                <p class="identity mb-0">Identity Not Confirmed</p>
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
                                                                    <div class="d-flex menu-w">
                                                                        <img src="{{ url('assets/images/page-icon.svg') }}" class="img-fluid me-3 w-11">
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
                                                                    <div class="d-flex menu-w">
                                                                        <img src="{{ url('assets/images/tv-icon.svg') }}" class="img-fluid me-3 w-11">
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
                                                                    <div class="d-flex menu-w">
                                                                        <img src="{{ url('assets/images/interested-items.svg') }}" class="img-fluid me-3 w-11">
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
                                                                    <div class="d-flex menu-w">
                                                                        <img src="{{ url('assets/images/add-game.svg') }}" class="img-fluid me-3 w-11">
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
                                                                <div class="d-flex menu-w">
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
                                            <a class="nav-link view" href="{{ route('login') }}">SIGN IN</a>
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

      {{-- sp menu open starts --}}
      <div class="menu-area">
        <div class="menu-container">
          <nav class="pt-3 sp-nav">
            <ul>
              <li>
                <a class="navbar-menus nav-link" href="/">
                  <i class="fa-solid fa-house pe-4"></i>Home
                </a></li>
              <li>
                <a class="navbar-menus nav-link" data-toggle="modal" data-target="#basicModal">
                    <img src="{{ url('assets/images/currency.svg') }}" class="img-fluid pe-4" alt="currency">
                    {{Auth::user() ? Auth::user()->base_currency : Session::get('base_currency')}}
                </a>
                </li>
                {{-- <li><a class="navbar-menus nav-link" href="#">Settings</a></li> --}}
                <li>
                    <a class="navbar-menus nav-link" href="{{ route('notifications') }}">
                        <i class="fa-solid fa-message pe-4"></i>Notifications
                    </a>
                </li>
                <hr class="pb-4">
                <li>
                    <a class="navbar-menus nav-link" href="{{ route('all-games') }}">
                        <img src="{{ url('assets/images/game-icon.svg') }}" alt="game" class="pe-4">Games
                    </a>
                </li>
                <li>
                    <a class="navbar-menus nav-link" href="{{ route('view-my-page') }}">
                        <i class="fa-regular fa-user pe-4"></i>My Page
                    </a>
                </li>
                <hr class="pb-4">
                @if(!Auth::user())
                <li>
                    <a class="navbar-menus nav-link" href="{{ route('login') }}">
                        <img src="{{ url('assets/images/signin-icon.svg') }}" alt="signin" class="pe-4">Sign In
                    </a>
                </li>
                @else
                <li>
                    <a class="navbar-menus nav-link" href="{{ route('logout') }}">
                        <img src="{{ url('assets/images/signin-icon.svg') }}" alt="signout" class="pe-4">Sign Out
                    </a>
                </li>
                @endif
            </ul>
          </nav>
        </div>
      </div>
    {{-- sp menu open ends --}}

    <!-- Blue section starts -->
    <div class="container-fluid px-0 bg-lgreen padt-6">

        <!-- User guide  starts -->
        <div class="container pmypage user-guide pt-5">

            <div class="row">

                <!-- Left side starts -->
                <div class="col-md-3 col-sm-12 pleft">
                    <div id="guideleftmenu">
                        @foreach($categories as $category)
                        @if(count($category->pages) != 0)
                        <div class="d-flex align-items-center justify-contant-center menu-div mb-2">
                            <i class="fa-brands fa-wpbeginner white mb-0"></i>
                            <h3 class=" ps-3 mb-0 menu-h3">{{$category->name}}</h3>
                        </div>
                        <ul class="ps-0 left-menu">
                            @foreach($category->pages as $page)
                            @if($page->status == 'PUBLISHED')
                            <a href="{{ route('view-page', [ 'category' => $category->name, 'page' => $page->title ] ) }}">
                                <li class="ps-5 py-2">
                                    {{Str::title(str_replace('-', ' ', $page->title))}}
                                </li>
                            </a>
                            @endif
                            @endforeach
                        </ul>
                        @endif
                        @endforeach
                    </div>
                </div>
                <!-- Left side ends -->

                <!-- Right side starts -->
                <div class="col-md-9 col-sm-12 ps-5 request-pad padt-5">
                    <h3 class="pb-5 signup-h3">User Guide</h3>

                    <div class="d-flex f-column justify-content-between align-items-center bg-guide my-5 py-5 px-5">
                        <h3 class="bank-h3 mb-0">User-guide search</h3>
                        <div class="search-div search-w">
                            <input type="text" class="searchTerm" placeholder="What are you looking for?" />
                            <button type="submit" class="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>

                    <div>
                        <h3 class="py-5 border-0 lh-base text-center s-head">Please click one of the links to check pages</h3>
                    </div>
                </div>
                <!-- Right side ends -->
            </div>
        </div>
        <!-- User guide ends -->
    </div>
    <!-- Blue section ends -->

    <!-- Footer starts -->
    @include('layout.parts.footer')
    <!-- Footer ends -->

    {{-- Page proofer starts --}}
       <script type="text/javascript">
        (function (d, t) {
        var pp = d.createElement(t), s = d.getElementsByTagName(t)[0];
        pp.src = '//app.pageproofer.com/embed/ef059085-7ee9-598f-9742-f0245924ede6';
        pp.type = 'text/javascript';
        pp.async = true;
        s.parentNode.insertBefore(pp, s);
        })(document, 'script');
        </script>
    {{-- Page proofer ends --}}

    <!-- Javascript Section -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ url('assets/js/index.js') }}"></script>

    <!-- Autocomplete Prediction starts -->
    <script>
        var path = "{{ url('autocomplete-search') }}";
        $("#guide_game_search").typeahead({
            source: function(query, process) {
                return $.get(
                    path, {
                        query: query,
                    },
                    function(data) {
                        $(data).each(function(index, value) {
                            $("#game_id").val(value.id);
                        });
                        return process(data);
                    }
                );
            },
        });
    </script>
    <!-- Autocomplete Prediction ends -->

</body>

</html>