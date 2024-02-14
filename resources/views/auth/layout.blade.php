<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<!-- Mirrored from themesbrand.com/velzon/html/default/auth-signup-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Nov 2022 16:41:56 GMT -->
<head>

    <meta charset="utf-8" />
    <title>TALENDEK | {{$title?? ""}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Talent portfolio resume contact" name="description" />
    <meta content="Stephane ASSOCLE" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin/images/favicon.ico')}}">

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <!-- Layout config Js -->
    {{-- <script src="{{asset('mdb/css/mdb.dark.min.css')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('mdb/css/mdb.dark.rtl.csss')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('mdb/css/mdb.min.css')}}" rel="stylesheet" type="text/css" /> --}}
    
    
</head>

<body class="bg-secondary">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white mb-5" style="border-radius: 1rem;">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    
    {{-- <script src="{{asset('admin/js/jquery.min.js')}}"></script> --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js" ></script>
    @stack('scripts')
    
</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/auth-signup-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Nov 2022 16:41:58 GMT -->
</html>