<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
</head>

<body style="font-family: 'Cairo', sans-serif">

    <div class="wrapper">
        <!--=================================preloader -->

        <div id="pre-loader">
            <img src="https://extension.harvard.edu/wp-content/uploads/sites/8/2020/10/computer-programming.jpg"
                alt="">
        </div>
        <!--=================================preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================Main content -->
        <!-- main-content -->
        <div class="content-wrapper">

            @yield('content')
            <!--=================================wrapper -->
            <!--=================================footer -->

            @include('layouts.footer')
        </div>

        <!-- main content wrapper end-->
    </div>
    <!--=================================footer -->

    @include('layouts.footer-scripts')

</body>

</html>
