<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <base href="/">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShopRunner </title>
    @yield("before_css")
    @include("layouts.nhanvien.head")
    @yield("after_css")
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    {{--                                     <a href="index.html" class="site_title"><i class="fa fa-paw"></i>  <span>ShopRunner</span></a>--}}
                    <a href="index.html" class="site_title"><img src="images/favicon.ico" width="50px" height="50px">
                        <span>ShopRunner</span></a>
                </div>
                <div class="clearfix"></div>
                <br/>
                @include("layouts.nhanvien.leftMenu")
            </div>
        </div>
        @include("layouts.nhanvien.topNav")
        <section class="content">
            @yield("main")
        </section>
    </div>
</div>
@yield("before_js")
@include("layouts.nhanvien.script")
@yield("after_js")
</body>
</html>
