<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>Admin | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Ecommerce Project" name="description" />
    <meta content="S.M. Arifuzzaman" name="author" />
    <meta content="{{ csrf_token() }}" name="csrf_token">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/admin/favicon.ico')}}">

    @include('partials.admin.style')

</head>

<body data-sidebar="dark" data-layout-mode="light">


<!-- Begin page -->
<div id="layout-wrapper">

    @include('partials.admin.header')

    <!-- Left Sidebar Start -->
    @include('partials.admin.left_sidebar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('main_content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        @include('partials.admin.footer')
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    @include('partials.admin.right_sidebar')
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

    @include('partials.admin.script')
    @yield('script_js')
</body>

</html>
