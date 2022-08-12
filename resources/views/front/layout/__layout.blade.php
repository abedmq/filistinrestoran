<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{settings('title')}}</title>


    @include('front.layout.meta')

    <link rel="shortcut icon" type="image/x-icon" href="{{settings('icon',settings('logo'))}}">
    <base href="{{url('')}}">
    <!-- all css here -->
    <link rel="stylesheet" href="front/css/bootstrap.min.css">
    <link rel="stylesheet" href="front/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="front/css/icons.css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{--    <link rel="stylesheet" href="front/css/plugins.css">--}}
    <link rel="stylesheet" href="front/css/style.css">
    <link rel="stylesheet" href="front/css/responsive.css">
    <script src="front/js/vendor/modernizr-3.11.7.min.js"></script>
</head>
<body>
<!-- header start -->
<header class="header-area transparent-bar header-black">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-5 col-sm-4">
                <div class="logo">
                    <a href="{{url('')}}">
                        <img alt="" height="80px" src="{{settings('logo')}}">
                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-7 col-sm-8 relative">
                <div class="menu-search-bundle">
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li class="top-hover"><a href="{{url('')}}">الرئيسية </a>
                                </li>
                                <li><a href="{{url('')}}#menu">المنيو</a></li>
                                <li><a href="{{url('')}}#address">العنوان</a></li>
                                <li><a href="{{get_whatsapp_url()}}">تواصل معنا</a></li>

                            </ul>
                        </nav>
                    </div>
                    {{--                    <div class="search-wrap">--}}
                    {{--                        <button class="search-toggle">--}}
                    {{--                            <i class="fa fa-search"></i>--}}
                    {{--                        </button>--}}
                    {{--                        <div class="search">--}}
                    {{--                            <form action="#">--}}
                    {{--                                <input type="search" placeholder="Search here">--}}
                    {{--                                <button type="submit">--}}
                    {{--                                    Search--}}
                    {{--                                </button>--}}
                    {{--                            </form>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
            <div class="mobile-menu-area d-md-block d-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            <li class="top-hover"><a href="{{url('')}}">الرئيسية </a>
                            </li>
                            <li><a href="{{url('')}}#menu">المنيو</a></li>
                            <li><a href="{{url('')}}#address">العنوان</a></li>
                            <li><a href="{{get_whatsapp_url()}}" target="_blank">تواصل معنا</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="breadcrumb-area bg-img ptb-80" style="background-image:url({{settings('share_photo')}});">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>مطعم فلسطين</h3>
            <ul>
                <li class="active">قائمة الوجبات</li>
            </ul>
        </div>
    </div>
</div>
@yield('content')
{{--<div class="brand-logo-area ptb-100">--}}
{{--    <div class="container">--}}
{{--        <div class="brand-logo-active owl-carousel">--}}
{{--            <div class="single-brand-logo">--}}
{{--                <img alt="" src="assets/img/brand-logo/1.png">--}}
{{--            </div>--}}
{{--            <div class="single-brand-logo">--}}
{{--                <img alt="" src="assets/img/brand-logo/2.png">--}}
{{--            </div>--}}
{{--            <div class="single-brand-logo">--}}
{{--                <img alt="" src="assets/img/brand-logo/3.png">--}}
{{--            </div>--}}
{{--            <div class="single-brand-logo">--}}
{{--                <img alt="" src="assets/img/brand-logo/4.png">--}}
{{--            </div>--}}
{{--            <div class="single-brand-logo">--}}
{{--                <img alt="" src="assets/img/brand-logo/5.png">--}}
{{--            </div>--}}
{{--            <div class="single-brand-logo">--}}
{{--                <img alt="" src="assets/img/brand-logo/2.png">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<footer class="footer-area">
    <div class="footer-area-top black-bg pt-95 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-30">
                            <h4>من نحن</h4>
                        </div>
                        <div class="footer-about">
                            <p> {!! settings('about_us_ar') !!}</p>
                            @if(settings('address'))
                                <p>{!! settings('address') !!}</p>
                                @endif
                            @if(settings('map_address'))
                                <div class="footer-map">
                                    <a href="{{settings('map_address')}}"><i class="ion-ios-location-outline"></i>
                                        العنوان على الخريطة</a>
                                </div>
                            @endif
                        </div>
                        <div class="social-icon">
                            <ul>
                                {!! get_social('facebook') !!}
                                {!! get_social('twitter') !!}
                                {!! get_social('instagram') !!}
                                {!! get_social('youtube') !!}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-30">
                            <h4>تواصل معنا</h4>
                        </div>
                        <div class="footer-cont-info">
                            <div class="single-footer-cont-info">
                                <div class="cont-info-icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="cont-info-content">
                                    <p>{{settings('address')}}</p>
                                </div>
                            </div>
                            <div class="single-footer-cont-info">
                                <div class="cont-info-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="cont-info-content">
                                    @if(settings('mobile'))
                                        <p>{{settings('mobile')}}</p>
                                    @endif
                                    <p>{{settings('whatsapp')}}</p>
                                </div>
                            </div>
                            <div class="single-footer-cont-info">
                                <div class="cont-info-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="cont-info-content">
                                    <a href="mailto:{{settings('email')}}">{{settings('email')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-30">
                            <h4>اوقات العمل</h4>
                        </div>
                        <div class="open-time pr-30">
                            {!! settings('open_time') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom black-bg-2 pb-25 pt-25">
        <div class="container">
            <div class="copyright text-center">
                <p>{!! settings('copyright') !!}</p>
            </div>
        </div>
    </div>
</footer>


<!-- all js here -->
<script src="front/js/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="front/js/bootstrap.min.js"></script>
<script src="front/js/owl.carousel.min.js"></script>
<script src="front/js/main.js"></script>
@stack('scripts')
</body>
</html>
