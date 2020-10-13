<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dore jQuery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('/')}}font/iconsmind/style.css" />
    <link rel="stylesheet" href="{{asset('/')}}font/simple-line-icons/css/simple-line-icons.css" />

    <link rel="stylesheet" href="{{asset('/')}}css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}css/vendor/fullcalendar.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}css/vendor/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}css/vendor/datatables.responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}css/vendor/select2.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}css/vendor/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}css/vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{asset('/')}}css/vendor/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}css/vendor/bootstrap-stars.css" />
    <link rel="stylesheet" href="{{asset('/')}}css/vendor/nouislider.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}css/vendor/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
</head>

<body id="app-container" class="menu-default show-spinner">
    <nav class="navbar fixed-top">
        <div class="d-flex align-items-center navbar-left">
            <a href="#" class="menu-button d-none d-md-block">
                <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                    <rect x="0.48" y="0.5" width="7" height="1" />
                    <rect x="0.48" y="7.5" width="7" height="1" />
                    <rect x="0.48" y="15.5" width="7" height="1" />
                </svg>
                <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                    <rect x="1.56" y="0.5" width="16" height="1" />
                    <rect x="1.56" y="7.5" width="16" height="1" />
                    <rect x="1.56" y="15.5" width="16" height="1" />
                </svg>
            </a>

            <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                    <rect x="0.5" y="0.5" width="25" height="1" />
                    <rect x="0.5" y="7.5" width="25" height="1" />
                    <rect x="0.5" y="15.5" width="25" height="1" />
                </svg>
            </a>

            <div class="search" data-search-path="Layouts.Search.html?q=">
                <input placeholder="Search...">
                <span class="search-icon">
                    <i class="simple-icon-magnifier"></i>
                </span>
            </div>
        </div>


        <a class="navbar-logo" href="Dashboard.Default.html">
            <span class="logo d-none d-xs-block"></span>
            <span class="logo-mobile d-block d-xs-none"></span>
        </a>

        <div class="navbar-right">
            <div class="header-icons d-inline-block align-middle">
                <div class="position-relative d-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="notificationButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="simple-icon-bell"></i>
                        <span class="count">3</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3 scroll position-absolute" id="notificationDropdown">

                        <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                            <a href="#">
                                <img src="{{asset('/')}}img/profile-pic-l-2.jpg" alt="Notification Image" class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                            </a>
                            <div class="pl-3 pr-2">
                                <a href="#">
                                    <p class="font-weight-medium mb-1">Joisse Kaycee just sent a new comment!</p>
                                    <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                </a>
                            </div>
                        </div>

                        <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                            <a href="#">
                                <img src="{{asset('/')}}img/notification-thumb.jpg" alt="Notification Image" class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                            </a>
                            <div class="pl-3 pr-2">
                                <a href="#">
                                    <p class="font-weight-medium mb-1">1 item is out of stock!</p>
                                    <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                </a>
                            </div>
                        </div>


                        <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                            <a href="#">
                                <img src="{{asset('/')}}img/notification-thumb-2.jpg" alt="Notification Image" class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                            </a>
                            <div class="pl-3 pr-2">
                                <a href="#">
                                    <p class="font-weight-medium mb-1">New order received! It is total $147,20.</p>
                                    <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                </a>
                            </div>
                        </div>

                        <div class="d-flex flex-row mb-3 pb-3 ">
                            <a href="#">
                                <img src="{{asset('/')}}img/notification-thumb-3.jpg" alt="Notification Image" class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                            </a>
                            <div class="pl-3 pr-2">
                                <a href="#">
                                    <p class="font-weight-medium mb-1">3 items just added to wish list by a user!</p>
                                    <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                    <i class="simple-icon-size-fullscreen"></i>
                    <i class="simple-icon-size-actual"></i>
                </button>

            </div>

            <div class="user d-inline-block">
                <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="name">{{ Auth::user()->name }}</span>
                    <span>
                        <img alt="Profile Picture" src="https://api.adorable.io/avatars/70/{{Auth::user()->email}}" />
                    </span>
                </button>

                <div class="dropdown-menu dropdown-menu-right mt-3">
                    <a class="dropdown-item" href="#">Account</a>
                    <a class="dropdown-item" href="#">Features</a>
                    <a class="dropdown-item" href="#">History</a>
                    <a class="dropdown-item" href="#">Support</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="sidebar">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">
                    <li class="active">
                        <a href="#dashboard">
                            <i class="iconsmind-Shop-4"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="data">
                            <i class="iconsmind-Shop-4"></i>
                            <span>Data</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="sub-menu">
            <div class="scroll">
                <ul class="list-unstyled" data-link="dashboard">
                    <li class="active">
                        <a href="Dashboard.Default.html">
                            <i class="simple-icon-rocket"></i> Default
                        </a>
                    </li>
                    <li>
                        <a href="Dashboard.Analytics.html">
                            <i class="simple-icon-pie-chart"></i>Analytics
                        </a>
                    </li>
                    <li>
                        <a href="Dashboard.Ecommerce.html">
                            <i class="simple-icon-basket-loaded"></i> Ecommerce
                        </a>
                    </li>
                    <li>
                        <a href="Dashboard.Content.html">
                            <i class="simple-icon-doc"></i> Content
                        </a>
                    </li>
                </ul>


                <ul class="list-unstyled" data-link="data">
                    <li class="active">
                        <a href="{{route('product.index')}}">
                            <i class="simple-icon-rocket"></i> Product
                        </a>
                    </li>
                    <li>
                        <a href="{{route('categories.index')}}">
                            <i class="simple-icon-pie-chart"></i> Categories
                        </a>
                    </li>
                    <li>
                        <a href="Dashboard.Ecommerce.html">
                            <i class="simple-icon-basket-loaded"></i> Pesanan
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <main>
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    {{-- <script src="{{asset('/')}}js/vendor/jquery-3.3.1.min.js"></script> --}}
    <script src="{{asset('/')}}js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/')}}js/vendor/Chart.bundle.min.js"></script>
    <script src="{{asset('/')}}js/vendor/chartjs-plugin-datalabels.js"></script>
    <script src="{{asset('/')}}js/vendor/moment.min.js"></script>
    <script src="{{asset('/')}}js/vendor/fullcalendar.min.js"></script>
    <script src="{{asset('/')}}js/vendor/datatables.min.js"></script>
    <script src="{{asset('/')}}js/vendor/perfect-scrollbar.min.js"></script>
    <script src="{{asset('/')}}js/vendor/bootstrap-tagsinput.min.js"></script>
    <script src="{{asset('/')}}js/vendor/owl.carousel.min.js"></script>
    <script src="{{asset('/')}}js/vendor/progressbar.min.js"></script>
    <script src="{{asset('/')}}js/vendor/jquery.barrating.min.js"></script>
    <script src="{{asset('/')}}js/vendor/select2.full.js"></script>
    <script src="{{asset('/')}}js/vendor/nouislider.min.js"></script>
    <script src="{{asset('/')}}js/vendor/bootstrap-datepicker.js"></script>
    <script src="{{asset('/')}}js/vendor/Sortable.js"></script>
    <script src="{{asset('/')}}js/vendor/mousetrap.min.js"></script>
    <script src="{{asset('/')}}js/dore.script.js"></script>
    <script src="{{asset('/')}}js/scripts.js"></script>
    <script>
        $("#datatables").DataTable({
            searching: false,
            bLengthChange: false,
            info: false,
            paging: false
        });
    </script>
    @yield('js')
</body>

</html>
