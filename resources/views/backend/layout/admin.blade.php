<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard | qbytAdmin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/backend')}}/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/backend')}}/css/vendor/bootstrap-4.3.1/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/backend')}}/css/main.css">
    <style>
    </style>
    <meta name="theme-color" content="#fafafa">
</head>

<body class="position-relative">
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <div class="container-fluid px-0" id='app'>
        <!-- The side bar -->
        <div class="side-bar side-bar-lg-active" data-theme="purple">
            <!-- Brand details -->
            <div class="side-menu-brand d-flex flex-column justify-content-center align-items-center clear mt-3">
                <img src="{{asset('assets/backend')}}/img/QbyteIcon.png" alt="bran_name" class="brand-img">
                <a href="#" class="brand-name mt-2 ml-2 font-weight-bold">QBAdminUI</a>
            </div>
            <!-- Side bar menu -->
            <div class="the_menu mt-5">
                <!-- Heading -->
                <div class="side-menu-heading d-flex">
                    <h6 class=" font-weight-bold pb-2 mx-3"> Mr Admin </h6>
                    <a href="#" class="font-weight-bold ml-auto px-3">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>

                <!-- Menu item -->
                <div id="accordion">
                    <ul class="side-menu p-0 m-0 mt-3">
                        <li class="side-menu-item px-3">
                            <router-link :to="{path:'/home'}" class="w-100 py-3 pl-4">Dashboard</router-link>
                        </li>
                        <li class="side-menu-item px-3">
                            <router-link to="/post-list" class="w-100 py-3 pl-4">Post</router-link>
                        </li>
                        {{-- category  --}}
                        <li class="side-menu-item px-3">
                            <router-link :to="{path:'/category'}" class="w-100 py-3 pl-4">Category</router-link>
                        </li>
                        <!-- Sub menu parent -->
                        <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent"
                                data-toggle="collapse" data-target="#sub_menu_1" aria-expanded="false"
                                aria-controls="sub_menu_1">Basic UI Elements</a></li>
                        <!-- Sub menu -->
                        <div id="sub_menu_1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <ul class="side-sub-menu p-0">
                                <li class="side-sub-menu-item px-3">
                                    <a href="" class="w-100 pl-4 text-light">Post</a>
                                </li>
                            </ul>
                        </div>


                    </ul>
                </div>
            </div>
        </div>

        <!-- Main section -->
        <main class="bg-light main-full-body">


            <!-- The navbar -->
            <nav class="navbar navbar-expand navbar-light bg-light py-3">
                <p class="navbar-brand mb-0 pb-0">
                    <span></span>
                    <span></span>
                    <span></span>
                </p>
                <!-- Navbar search section -->
                <div class="navb-search ml-5 d-none d-md-block">
                    <form action="#" method="POST">
                        <div class="input-group search-round">
                            <input type="text" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn border" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Navbar right menu section -->
                <div class="navb-menu ml-auto d-flex flex-row">

                    <!-- Profile action dropdown -->
                    <div class="dropdown dropdown-arow-none d-contents text-center mx-2">
                        <!-- Icon -->
                        <a href="#" class="w-100 dropdown-toggle text-muted" data-toggle="dropdown"><img
                                src="{{asset('assets/backend')}}/img/profile.jpg" alt="profile"
                                class="profile-avatar"></a>
                        <!-- Dropdown Menu -->
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-max-height">
                            <!-- Menu items -->
                            <a href="#" class="dropdown-item disabled small"><i class="far fa-user mr-1"></i>
                                {{Auth::user()->name}}</a>
                            <a href="#" class="dropdown-item text-secondary-light">Account setting</a>
                            <a href="#" class="dropdown-item text-secondary-light">Billing history</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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


            <!--Page Body part -->
            <div class="page-body p-4 text-dark">
                <div class="page-heading border-bottom d-flex flex-row">
                    <h5 class="font-weight-normal">Version 1</h5>
                    <small class="mt-2 ml-2">Dashboard</small>
                </div>
                <template-main></template-main>
            </div>
        </main>
        <!-- Footer section -->
        <footer class="footer-full-body p-4 d-flex flex-row justify-content-between text-secondary">
            <p>&copy; Copyright. <a href="https://qbytesoft.com" target="_Blank">Qbytesoft</a></p>
            <p>Version 1.0.0</p>
        </footer>
    </div>


    <script src="{{asset('assets/backend')}}/js/vendor/bootstrap-4.3.1/modernizr-3.7.1.min.js"></script>
    <script src="{{asset('assets/backend')}}/js/vendor/jquery-3.3.1/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{asset('assets/backend')}}/js/vendor/popper-js/popper1.14.7.js"></script>
    <script src="{{asset('assets/backend')}}/js/vendor/bootstrap-4.3.1/bootstrap.min.js"></script>
    <script src="{{asset('assets/backend')}}/js/plugins scripts/echart_drw.js"></script>
    <script src="{{asset('assets/backend')}}/js/plugins.js"></script>
    <script src="{{asset('js')}}/app.js"></script>
    <script src="{{asset('assets/backend')}}/js/main.js"></script>
</body>

</html>