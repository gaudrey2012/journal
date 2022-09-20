<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<!-- Mirrored from pixelwibes.com/template/e-learn/html/dist/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 09:12:07 GMT -->
    <head>
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>{{env('APP_NAME', 'journal en ligne')}} </title>

        <!-- plugin css file  -->
        <script src="https://kit.fontawesome.com/17747e5e58.js" crossorigin="anonymous"></script>
        
        <!-- project css file  -->
        <link rel="stylesheet" href="{{ asset("css/e-learn.style.min.css") }}">
        @livewireStyles
        @stack('css')
                
    </head>
    <body>
        <div id="elearn-layout" class="theme-purple">
            <!-- sidebar -->
            <div class="sidebar px-4 py-4 py-md-4 sidebar-mini me-0">
                <div class="d-flex flex-column h-100">
                    <a href="{{ route('home') }}" class="mb-0 brand-icon">
                        <span class="logo-text">Journal</span>
                    </a>
                    <!-- Menu: main ul -->
                    <ul class="menu-list flex-grow-1 mt-3">
                        <li><a class="m-link active" href="{{ route('home') }}"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
                        <li><a class="m-link" href="{{ route('actualite.index') }}"><i class="fa fa-newspaper-o"></i> <span>Actualites</span></a></li>
                        <li><a class="m-link" href="{{ route('categorie.index') }}"><i class="fa fa-list-alt"></i> <span>Categories</span></a></li>
                        @if (Auth::user()->role === 'ADMIN')
                            <li><a class="m-link" href="{{ route('user.index') }}"><i class="fa fa-user"></i> <span>Utilisateurs</span></a></li>
                        @endif
                        <li><a class="m-link" href="chat.html"><i class="fa fa-trash"></i> <span>Corbeille</span></a></li>
                    </ul>
                    <!-- Theme: Switch Theme -->
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-center justify-content-center">
                            <div class="form-check form-switch theme-switch">
                                <input class="form-check-input" type="checkbox" id="theme-switch">
                                <label class="form-check-label" for="theme-switch">Enable Dark Mode!</label>
                            </div>
                        </li>
                        <li class="d-flex align-items-center justify-content-center">
                            <div class="form-check form-switch theme-rtl">
                                <input class="form-check-input" type="checkbox" id="theme-rtl">
                                <label class="form-check-label" for="theme-rtl">Enable RTL Mode!</label>
                            </div>
                        </li>
                    </ul>
                    <!-- Menu: menu collepce btn -->
                    <button type="button" class="btn btn-link sidebar-mini-btn text-light">
                        <span class="ms-2"><i class="fa fa-arrow-right"></i></span>
                    </button>
                </div>
            </div>

            <!-- main body area -->
            <div class="main px-lg-4 px-md-4">

                <!-- Body: Header -->
                <div class="header">
                    <nav class="navbar py-4">
                        <div class="container-xxl">
            
                            <!-- header rightbar icon -->
                            <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                                
                                    
                                <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                                    <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                                        <div class="u-info me-2">
                                            <p class="mb-0 text-end line-height-sm ">
                                                <span class="font-weight-bold">
                                                    @if (Auth::user())
                                                        {{ Auth::user()->name }}
                                                    @endif
                                                </span></p>
                                            <small>Profil Utilisateur</small>
                                        </div>
                                        
                                    </a>
                                    <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                                        <div class="card border-0 w280">
                                            <div class="card-body pb-0">
                                                <div class="d-flex py-1">
                                                
                                                    <div class="flex-fill ms-3">
                                                        <p class="mb-0">
                                                            <span class="font-weight-bold">
                                                                @if (Auth::user())
                                                                    {{ Auth::user()->name }}
                                                                @endif
                                                            </span>
                                                        </p>
                                                        <small class="">
                                                            @if (Auth::user())
                                                                {{ Auth::user()->email }}
                                                            @endif
                                                        </small>
                                                        
                                                    </div>
                                                    <div><hr class="dropdown-divider border-dark"></div>
                                                    <small class="">
                                                        @if (Auth::user())
                                                            <p>{{ Auth::user()->role }}</p>
                                                        @endif
                                                    </small>
                                                </div>
                                                <div><hr class="dropdown-divider border-dark"></div>
                                            </div>
                                            <div class="list-group m-2 ">
                                            
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="list-group-item list-group-item-action border-0 "><i class="fa fa-sign-out fs-6 me-3"></i>Deconnexion</button>
                                                </form>
                                                <div><hr class="dropdown-divider border-dark"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <!-- menu toggler -->
                            <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
                                <span class="fa fa-bars"></span>
                            </button>
            
                            <!-- main menu Search-->
                            <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                                <div class="input-group flex-nowrap input-group-lg">
                                    <button type="button" class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></button>
                                    <input type="search" class="form-control" placeholder="Search" aria-label="search" aria-describedby="addon-wrapping">
                                    <button type="button" class="input-group-text add-member-top" id="addon-wrappingone" data-bs-toggle="modal" data-bs-target="#addUser"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
            
                        </div>
                    </nav>
                </div>

                <!-- Body: Body -->
                    @yield('content')

        <!-- Jquery Core Js -->
        <script src="{{ asset("js/libscripts.bundle.js") }}"></script>

        <!-- Plugin Js-->
        <script src="{{ asset("js/owl.carousel.min.js") }}"></script>
        <script src="{{ asset("js/apexcharts.bundle.js") }}"></script> 

        <!-- Jquery Page Js -->
        <script src="{{ asset("js/template.js") }}"></script>
        <script src="{{ asset("js/elearn-index.js") }}"></script>
        @livewireScripts
        @stack('js')
    </body>

    <!-- Mirrored from pixelwibes.com/template/e-learn/html/dist/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 09:12:36 GMT -->
    </html>