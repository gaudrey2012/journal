<!doctype html>
<html class="no-js" lang="en" dir="ltr">


<!-- Mirrored from pixelwibes.com/template/e-learn/html/dist/ui-elements/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 09:17:26 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>{{env('APP_NAME', 'journal en ligne')}}</title>
    <link rel="icon" href="../favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset("css/e-learn.style.min.css")}}">
</head>

<body>

<div id="elearn-layout" class="theme-black">

    <!-- main body area -->
    <div class="main p-2 py-3 p-xl-5 ">
        
        <!-- Body: Body -->
        <div class="body d-flex p-0 p-xl-5">
            <div class="container-xxl">

                <div class="row g-0">
                    <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                        <div style="max-width: 25rem;">
                            <div class="text-center mb-5">
                                
                            </div>
                            <div class="mb-5">
                                <h2 class="color-900 text-center">Cloud-Based E-Learning Platform</h2>
                            </div>
                            <!-- Image block -->
                            
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                        <div class="w-100 p-4 p-md-5 card border-0 bg-dark text-light" style="max-width: 32rem;">
                            <!-- Form -->
                                @yield('content')
                            <!-- End Form -->
                            
                        </div>
                    </div>
                </div> <!-- End Row -->
                
            </div>
        </div>

    </div>

</div>

<!-- Jquery Core Js -->
<script src="../assets/bundles/libscripts.bundle.js"></script>

</body>

<!-- Mirrored from pixelwibes.com/template/e-learn/html/dist/ui-elements/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 09:17:29 GMT -->
</html>