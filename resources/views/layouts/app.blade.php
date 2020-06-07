<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]>
<html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>
<html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>
<html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>
<html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en"><!--<![endif]-->

@include('layouts._head')
<body>
<div id="preloader">
    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
</div>

<header class="header_area">
    <div class="container">
        <div class="header_content">
            <div class="row">
                <div class="col-md-3 col-sm-2">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('website/img/icon_cap.png') }}"
                                                           alt="">Edu<span>campus</span></a>
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-10 nav_area">
                    <nav class="main_menu">
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="current_page_item"><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About</a></li>
                                <li><a href="{{ route('courses') }}">Courses</a></li>
                                <li><a href="{{ route('events') }}">Events</a></li>
                                <li><a href="{{ route('news') }}">News</a></li>
                                <li><a href="{{ route('alumni') }}">Alumni</a></li>
                                {{--                                <li><a href="{{ route('contact') }}">Contact Us</a></li>--}}
                                <li><a href="{{ route('login') }}">Login</a></li>
                            </ul>
                        </div>
                    </nav>
                    <form action="{{ route('login') }}"
                          class="header_search hidden-xs">
                        <input type="text" placeholder="Search">
                        <input type="submit" value="">
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

@yield('content')

<footer class="footer_area">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="newslatter">
                        <form action="{{ route('home') }}">
                            <input type="email" placeholder="Email Address">
                            <input type="submit" value="">
                        </form>
                        <p>To Recieve Our Updates Via E-mail</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="footer_widgets">
                    <div class="col-md-3 col-sm-6">
                        <div class="single_footer_widget">
                            <h2 class="widget_title">About us</h2>
                            <p>On my way to where the air is sweet. Can you tell me how to get how to get to Sesame
                                Street! The first mate and his Skipper too will do their very best to make the others
                                comfortable </p>
                            <ul class="footer_social">
                                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_footer_widget">
                            <h2 class="widget_title">Latest posts</h2>
                            <ul class="latest_post">
                                <li>
                                    <img src="{{ asset('website/img/latest_post_1.jpg') }}" alt="">
                                    <div class="latest_post_txt">
                                        <h4><a href="#">On your mark get set and go now</a></h4>
                                        <p>April 12, 2015</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="{{ asset('website/img/latest_post_2.jpg') }}" alt="">
                                    <div class="latest_post_txt">
                                        <h4><a href="#">The ship set ground on the shore of this</a></h4>
                                        <p>April 12, 2015</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="{{ asset('website/img/latest_post_3.jpg') }}" alt="">
                                    <div class="latest_post_txt">
                                        <h4><a href="#">This time there's no stopping us from away</a></h4>
                                        <p>April 12, 2015</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_footer_widget">
                            <h2 class="widget_title">latest tweets</h2>
                            <ul class="latest_tweet">
                                <li>Educamus is one of the excellent university template
                                    <a href="#">http://educampus/universitybest/</a>
                                    <span>1 hours ago</span>
                                </li>
                                <li>Educamus is one of the excellent university template
                                    <a href="#">http://educampus/universitybest/</a>
                                    <span>1 hours ago</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_footer_widget">
                            <h2 class="widget_title">contact info</h2>
                            <ul class="footer_contact">
                                <li>09 Design Street,Downtown, Sydney, Australia</li>
                                <li>+01 123 456 78</li>
                                <li>+01 123 456 78</li>
                                <li>Info@educampus.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <p>© 2015 educampus. All rights reserved</p>
                </div>
                <div class="col-sm-8">
                    <nav class="footer_menu">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery Latest version -->
<script src="{{ asset('website/js/vendor/jquery.1.11.1.js') }}"></script>

<!-- Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('website/js/bootstrap.min.js') }}"></script>

<!-- jQuery Counterup and Waypoints -->
<script src="{{ asset('website/js/waypoints.min.js') }}"></script>
<script src="{{ asset('website/js/jquery.counterup.min.js') }}"></script>

<!-- jQuery easing -->
<script src="{{ asset('website/js/jquery.easing.1.3.min.js') }}"></script>

<!-- jQuery owl carousel -->
<script src="{{ asset('website/js/owl.carousel.min.js') }}"></script>

<!-- WOW Animation -->
<script src="{{ asset('website/js/wow.min.js') }}"></script>

<!--Activating WOW Animation only for modern browser-->
<!--[if !IE]><!-->
<script type="text/javascript">new WOW().init();</script>
<!--<![endif]-->

<!--Oh Yes, IE 9+ Supports animation, lets activate for IE 9+-->
<!--[if gte IE 9]>
<script type="text/javascript">new WOW().init();</script>
<![endif]-->

<!--Opacity & Other IE fix for older browser-->
<!--[if lte IE 8]>
            <script type="text/javascript" src="{{ asset('website/js/ie-opacity-polyfill.js') }}"></script>
        <![endif]-->

<!-- jQuery main script -->
<script src="{{ asset('website/js/main.js') }}"></script>
</body>

<!-- Mirrored from premiumlayers.net/demo/html/educampus/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jun 2020 18:33:48 GMT -->
</html>
