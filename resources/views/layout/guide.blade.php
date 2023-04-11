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
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets/images/favicon-cii.svg') }}">
</head>

<body>
    <!-- Header starts -->
    <header>
        <div class="container-fluid px-0">
            <div class="banner-top hidden fade" id="banner-top">
                <div class="container container-bnr">
                    <p class="banner-p">
                        We use cookies to improve your experience on DMarket as described in
                        our Privacy Policy. By continue using this website, you give us consent
                        to the use of cookies.
                    </p>
                    <a href="#" class="btn-green  button-1" id="agree">Agree</a>
                </div>
            </div>

            <!-- Banner starts -->
            <div class="bg-blue">
                <nav id="navbar_top" class="navbar">
                    <div class="container-fluid">
                        <div class="header-left">

                            <div class="d-flex justify-content-around d-md-none d-sm-block">
                                <img src="{{ url('assets/images/goback-mark.svg') }}" class="img-fluid" alt="goback" />
                                <a href="/" class="go-back ps-2"> GO BACK</a>
                            </div>

                            <a class="navbar-brand effect-shine" href="/"> MDAE </a>

                            <a class="d-md-none d-sm-block" data-toggle="modal" data-target="#basicModal"><img src="{{ url('assets/images/different_currencies.svg') }}" class="img-fluid" alt="currency" /></a>

                            <form class="w-100 display" action="{{ route('dashboard-search') }}" method="POST">
                                @csrf
                                <div class="search-div">
                                    <input type="text" class="searchTerm" name="top_page_search" id="dashboard_game_name" placeholder="What are you looking for?" value="{{request()->get('top_page_search')}}" />
                                    <button type="submit" class="searchButton">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div id="navbarNav" class="display">
                            <ul class="navbar-nav">
                                <li class="nav-item menu menu1">
                                    <div class="d-flex justify-content-around">
                                        <img src="{{ url('assets/images/different_currencies.svg') }}" class="img-fluid w-40 pe-2" alt="currency" />
                                        <a class="nav-link" href="#" data-toggle="modal" data-target="#basicModal">{{Auth::user() ? Auth::user()->base_currency : Session::get('base_currency')}}</a>
                                    </div>
                                </li>
                                <li class="nav-item menu menu1">
                                    <div class="d-flex align-self-center">
                                        <a class="nav-link align-self-center" href="{{ route('notifications') }}">NOTIFICATION</a>
                                        @if(Auth::user() && Auth::user()->unreadNotifications()->count() > 9)
                                        <p class="text-light bg-danger rounded-circle w-100 px-1">{{Auth::user()->unreadNotifications()->count()}}</p>
                                        @elseif(Auth::user() && Auth::user()->unreadNotifications()->count() > 0)
                                        <p class="text-light bg-danger rounded-circle w-100 px-2">{{Auth::user()->unreadNotifications()->count()}}</p>
                                        @endif
                                    </div>
                                </li>
                                @if(!Auth::user())
                                <li class="nav-item menu menu1">
                                    <a class="nav-link" href="{{ route('login') }}">Sign in</a>
                                </li>
                                @endif
                                <li class="nav-item dropdown">
                                    @if(Auth::user())
                                    <a class="nav-link" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        @else
                                        <a class="nav-link" href="{{ route('login') }}">
                                            @endif
                                            <img src="{{ url ('assets/images/settings.svg') }}" class="img-fluid" alt="settings" />
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                @if(Auth::user())
                                                <a href="{{ route('profile-page', ['id' => Auth::id()] ) }}">
                                                    <div class="d-flex justify-content-between align-items-center mx-3">
                                                        <div class="d-flex py-3">
                                                            @if(Auth::user() && Auth::user()->profile_picture != null)
                                                            <img src="{{ url('storage/uploads/' . Auth::user()->profile_picture) }}" class="align-self-center img-fluid dropdown-profile-img-w me-2" alt="games" />
                                                            @else
                                                            <img src="{{ url('assets/images/default-profile-picture.png') }}" class="align-self-center img-fluid dropdown-profile-img me-2" alt="games" />
                                                            @endif

                                                            <div class="d-flex flex-column">
                                                                @if(Auth::user() && Auth::user()->display_name != null)
                                                                <p class="text-start name pb-1">{{Auth::user()->display_name}}</p>
                                                                @else
                                                                <p class="text-start name pb-1">{{Auth::user()->first_name . ' ' . Auth::user()->last_name}}</p>
                                                                @endif
                                                                <div class="d-flex justify-content-around align-items-center">
                                                                    @for ($i = 1; $i
                                                                    <= Auth::user()->user_rating; $i++) <img src="{{ url('assets/images/rating-2.png') }}" class="img-fluid" alt="rating" />
                                                                        @endfor
                                                                        @for ($j = 1; $j
                                                                        <= ( 5 - Auth::user()->user_rating); $j++) <img src="{{ url('assets/images/rating-gray.png') }}" class="img-fluid" alt="rating" />
                                                                            @endfor
                                                                            <span class="rating-top">{{showUserRatingPercentage(Auth::id())}}% ({{Auth::user()->total_ratings}})</span>
                                                                </div>
                                                                <div class="d-flex justify-content-around align-items-center">
                                                                    @if(Auth::user()->document_verification == 'VERIFIED')
                                                                    <img src="{{ url('assets/images/identity-mark.png') }}" class="img-fluid" alt="games" />
                                                                    <p class="identity mb-0">Identity confirmed</p>
                                                                    @else
                                                                    <img src="{{ url('assets/images/cancel.svg') }}" class="img-fluid" alt="games" />
                                                                    <p class="identity mb-0">Identity not confirmed</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <img src="{{ url('assets/images/goback-mark.svg') }}" class="img-fluid rotate" alt="goback" />
                                                    </div>
                                                    <hr />
                                                </a>
                                                @endif
                                            </li>
                                            <li>
                                                <a href="{{ route('view-my-page') }}" class="drop-menu">
                                                    <div class="d-flex justify-content-between mx-3">
                                                        My Page
                                                        <img src="{{ url('assets/images/goback-mark.svg') }}" class="img-fluid rotate" alt="goback" />
                                                    </div>
                                                </a>
                                                <hr>
                                            </li>
                                            <li>
                                                <a href="{{ route('currently-on-display') }}" class="drop-menu">
                                                    <div class="d-flex justify-content-between mx-3">
                                                        Currently on display
                                                        <img src="{{ url('assets/images/goback-mark.svg') }}" class="img-fluid rotate" alt="goback" />
                                                    </div>
                                                </a>
                                                <hr>
                                            </li>
                                            <li>
                                                <a href="{{ route('view-interested-products') }}" class="drop-menu">
                                                    <div class="d-flex justify-content-between mx-3">
                                                        Interested Items
                                                        <img src="{{ url('assets/images/goback-mark.svg') }}" class="img-fluid rotate" alt="goback" />
                                                    </div>
                                                </a>
                                                <hr>
                                            </li>

                                            @if(Auth::user() && Auth::user()->user_type == 'admin')
                                            <li>
                                                <a href="{{ route('add-game') }}" class="drop-menu">
                                                    <div class="d-flex justify-content-between mx-3">
                                                        Add Game
                                                        <img src="{{ url('assets/images/goback-mark.svg') }}" class="img-fluid rotate" alt="goback" />
                                                    </div>
                                                </a>
                                                <hr>
                                            </li>
                                            @endif

                                            @if(Auth::user())
                                            <li><a href="{{ route('logout') }}" class="ms-3 drop-menu green">Sign Out</a></li>
                                            @endif
                                        </ul>
                                </li>
                                <li class="nav-item sell-li">
                                    <a class="nav-link btn-green sell-btn button-1" href="{{route('add-product')}}">SELL</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- Menu starts -->
                <div class="container container-menu menu menu-1">
                    <ul class="navbar-nav">
                        <li class="nav-item sp-nav-item">
                            <a class="nav-link line-h {{ Route::is('all-games') ? 'active' : '' }}" href="{{ route('all-games') }}">GAMES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link line-h {{ Route::is('view-my-page') ? 'active' : '' }}" href="{{ route('view-my-page') }}">MY PAGE</a>
                        </li>
                    </ul>
                </div>
                <!-- Menu ends -->

                <hr />
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
                        <h4 class="form-p w-500" id="myModalLabel">Currency Setting</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('change-base-currency') }}" method="POST">
                        <div class="modal-body">
                            <label class="form-p w-500 pb-2">Select Your Currency</label>
                            <div class="form-group">
                                @csrf
                                <label for="exampleFormControlSelect1" class="d-none">Select</label>
                                <select class="select-bank form-p w-500 w-100 text-dark" name="base_currency" id="exampleFormControlSelect1">
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
                            <button type="submit" class="nav-link btn-green button-1 w-100 border-0">Apply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal ends --}}

    <!-- Blue section starts -->
    <div class="container-fluid px-0 bg-blue">
        <div class="container pt-4 pb-2">
            <ul class="breadcrumb menu menu1">
                <li class="breadcrumb-item"><a href="/">TOP</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user-guide') }}">User guide</a></li>
            </ul>
        </div>

        <hr class="w-100">

        <!-- User guide  starts -->
        <div class="container pmypage user-guide">
            <div class="d-flex f-column justify-content-center align-items-center bg-black mb-5 py-5">
                <p class="form-label text-white mb-0 pe-3">Userguide search</p>
                <div class="search-div w-40">
                    <input type="text" class="searchTerm" placeholder="What are you looking for?" />
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>

            <div class="row">

                @yield('main-container')

            </div>
        </div>
        <!-- User guide ends -->
    </div>
    <!-- Blue section ends -->

    <!-- Footer starts -->
    @include('parts/footer.blade.php')
    <!-- Footer ends -->


    {{-- Page proofer starts --}}
  
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