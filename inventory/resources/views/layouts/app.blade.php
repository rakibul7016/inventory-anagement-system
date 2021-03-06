
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{ asset('images/favicon_1.ico') }}">

        <title>Ariyen Supper Complex</title>

        <!-- Base Css Files -->
        <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- Font Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="{{ asset('admin/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href="{{ asset ('admin/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('admin/css/material-design-iconic-font.min.css ')}}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{asset('admin/css/animate.css')  }}" rel="stylesheet" />


        <!-- sweet alerts -->
        <link href="{{ asset('admin/assets/sweet-alert/sweet-alert.min.css') }}" rel="stylesheet">

        <!-- DataTables -->
        <link href="{{ asset('admin/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">

        <!-- Custom Files -->
        <link href="{{ asset('admin/css/helper.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" type="text/css" />

        <script src="{{ asset('admin/js/modernizr.min.js') }}"></script>

    </head>


    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link href="{{ asset('admin/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">
        <!-- Authentication Links -->
        @guest
        @else
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><i class="md md-terrain"></i> <span>Moltran
                            </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar"
                                        placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light"
                                        data-toggle="dropdown" aria-expanded="true">
                                        <i class="md md-notifications"></i> <span
                                            class="badge badge-xs badge-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notification</li>
                                        <li class="list-group">
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left">
                                                        <em class="fa fa-user-plus fa-2x text-info"></em>
                                                    </div>
                                                    <div class="media-body clearfix">
                                                        <div class="media-heading">New user registered</div>
                                                        <p class="m-0">
                                                            <small>You have 10 unread messages</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left">
                                                        <em class="fa fa-diamond fa-2x text-primary"></em>
                                                    </div>
                                                    <div class="media-body clearfix">
                                                        <div class="media-heading">New settings</div>
                                                        <p class="m-0">
                                                            <small>There are new settings available</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left">
                                                        <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                    </div>
                                                    <div class="media-body clearfix">
                                                        <div class="media-heading">Updates</div>
                                                        <p class="m-0">
                                                            <small>There are
                                                                <span class="text-primary">2</span> new updates
                                                                available</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- last list item -->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <small>See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i
                                            class="md md-crop-free"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i
                                            class="md md-chat"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown"
                                        aria-expanded="true"><img src="{{ asset('admin/images/avatar-1.jpg') }}"
                                            alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a>
                                        </li>
                                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a>
                                        </li>
                                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a>
                                        </li>
                                        <li><a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                                                          document.getElementById('logout-form').submit();"><i
                                                    class="md md-settings-power"></i> Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="{{ asset('admin/images/users/avatar-1.jpg') }}" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">John
                                    Doe <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div
                                                class="ripple-wrapper"></div></a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                      document.getElementById('logout-form').submit();">
                                            <i class="md md-settings-power"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>

                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="index.html" class="waves-effect active"><i class="md md-home"></i><span>
                                        Dashboard </span></a>
                            </li>
                            <li>
                                <a href="{{ route('pos') }}" class="waves-effect"><i
                                    class="fa fa-user"></i><span>Pos
                                </span><span class="pull-right"><i class="md md-add"></i></span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-user"></i><span>Employees
                                    </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.employee') }}">Add employee</a></li>
                                    <li><a href="{{ route('all.employee') }}">All employee</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="calendar.html" class="waves-effect"><i class="md md-event"></i><span>
                                        Calendar </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Customer
                                    </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.customer') }}">Add Customer</a></li>
                                    <li><a href="{{ route('all.customer') }}">All customer</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-invert-colors-on"></i><span>
                                        Suppliers </span><span class="pull-right"><i
                                            class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.supplier') }}">Add Supplier</a></li>
                                    <li><a href="{{ route('all.supplier') }}">All Supplier</a></li>

                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-invert-colors-on"></i><span>
                                        Salary(EMP) </span><span class="pull-right"><i
                                            class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.advanceSalary') }}">Add Advance Salary</a></li>
                                    <li><a href="">All Advance Salary</a></li>
                                    <li><a href="{{ route('all.paysalary') }}">pay Salary</a></li>
                                    <li><a href="">Last Salary</a></li>

                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-invert-colors-on"></i><span>
                                        Catagories </span><span class="pull-right"><i
                                            class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.catagories') }}">Add catagories</a></li>
                                    <li><a href="{{ route('all.catagories') }}">All catagories</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-invert-colors-on"></i><span>
                                        Products </span><span class="pull-right"><i
                                            class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.product') }}">Add Product <i
                                                class="ri-product-hunt-fill"></i></a></li>
                                    <li><a href="{{ route('all.product') }}">All product</a></li>
                                    <li><a href="{{ route('import.product') }}">Import Product</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-invert-colors-on"></i><span>
                                        Attendance </span><span class="pull-right"><i
                                            class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('take.attendance') }}">Take Attendance <i
                                                class="ri-product-hunt-fill"></i></a></li>
                                    <li><a href="{{ route('all.attendance') }}">All Attendance</a></li>
                                </ul>
                            </li>



                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->
        @endguest
    </div>
    <main class="py-4">
        @yield('content')
    </main>
    </div>
    <script>
        @if(Session::has('messege'))
            var type="{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':
            toster.info("{{ Session::get('messege') }}");
            break;
            case 'success':
            toster.success("{{ Session::get('messege') }}");
            break;
            case 'warning':
            toster.warning("{{ Session::get('messege') }}");
            break;
            case 'error':
            toster.error("{{ Session::get('messege') }}");
            break;

            }
        @endif
    </script>

    <script src="{{ asset('admin/js/modernizr.min.js') }}"></script>

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('admin/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.min.js')  }}"></script>
    <script src="{{ asset('admin/js/waves.js') }}"></script>
    <script src="{{ asset('admin/js/wow.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('admin/assets/chat/moment-2.2.1.js') }}"></script>
    <script src="{{ asset('admin/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{asset('admin/assets/jquery-detectmobile/detect.js')  }}"></script>
    <script src="{{ asset('admin/assets/fastclick/fastclick.js') }}"></script>
    <script src="{{ asset('admin/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('admin/assets/jquery-blockui/jquery.blockUI.js') }}"></script>

    <!-- sweet alerts -->
    <script src="{{asset(' admin/assets/sweet-alert/sweet-alert.min.js') }}"></script>
    <script src="{{ asset('admin/assets/sweet-alert/sweet-alert.init.js') }}"></script>

    <!-- Counter-up -->
    <script src="{{ asset('admin/assets/counterup/waypoints.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('admin/js/jquery.app.js') }}"></script>

    <!-- Dashboard -->
    <script src="{{ asset('admin/js/jquery.dashboard.js') }}"></script>

    <script type="text/javascript">
        /* ==============================================
        Counter Up
        =============================================== */
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });
        });
    </script>
    <script src="{{ asset('admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/datatables/dataTables.bootstrap.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        } );
    </script>



</body>

</html>
