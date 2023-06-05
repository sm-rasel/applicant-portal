<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>Applicant Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Ecommerce Project" name="description" />
    <meta content="S.M. Arifuzzaman" name="author" />
    <meta content="{{ csrf_token() }}" name="csrf_token">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">

    @include('partials.style')

</head>

<body data-sidebar="dark">
<!-- Begin page -->
<div id="layout-wrapper">

    <div class="container">
        <div class="page-content">
            <div class="container-fluid">
                @yield('main_content')
            </div>
            <!-- container-fluid -->
        </div>
    </div>
    <!-- end main content-->
</div>
 @include('partials.script')
</body>

</html>
