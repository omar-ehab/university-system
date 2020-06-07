@extends('layouts.app')
@section('content')
    <section class="breadcrumb_area">
        <div class="breadcrumb_top">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb_title section-padding">
                        <h2>Events Details</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb_bottom">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb_nav">
                        <div class="col-sm-5">
                            <h2>Events Details</h2>
                        </div>
                        <div class="col-sm-7">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li>Events Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="single_event_post_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="single_event_post_box">
                        <div class="blog_event_photo">
                            <img src="{{ asset('website/img/latest_news_post_1.jpg') }}" alt="">
                            <div class="event_post_info">
                                <ul>
                                    <li><i class="fa fa-calendar"></i>June 21, 2015</li>
                                    <li><i class="pe-7s-clock"></i>11:00 AM - 4:00 PM</li>
                                    <li><i class="pe-7s-map-marker"></i>Sydney, Australia</li>
                                </ul>
                            </div>
                        </div>
                        <div class="event_post_txt">
                            <div class="event_post_content">
                                <h2>Well the first thing you know ol' Jeds a millionaire</h2>
                                <p>Since we're together They're creepy and they're kooky mysterious and spooky. They're
                                    all together ooky the Addams Family! Well we're movin' on up to the east side. To a
                                    deluxe apartment in the sky. The ship set ground on the shore of this uncharted
                                    desert isle with Gilligan the Skipper too the millionaire and his wife. black gold;
                                    So lets make the most of this beautiful day. Since we're together.</p>
                                <p>That this group would somehow form a family that's the way we all became the Brady
                                    Bunch. Well the first thing you know ol' Jeds a millionaire.</p>
                                <blockquote>Beats all you've ever saw been in trouble with the law since the day they
                                    was born. I have always wanted to have a neighbor just like you. I've always wanted
                                    to live in a neighborhood with you. Goodbye gray sky hello blue. There's nothing can
                                    hold me when I hold you.
                                </blockquote>
                            </div>
                            <div class="event_post_footer">
                                <ul>
                                    <li><a href="#">View the calendar</a></li>
                                    <li><a href="#">join the event</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="event_location">
                        <h2>Event Location</h2>
                        <div id="event-map"></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-7">
                    <aside>
                        <div class="right_sidebar">
                            <div class="all_right_widgets">
                                <div class="sing_right_widget">
                                    <div class="sing_right_widg_content">
                                        <form action="#">
                                            <input type="text" placeholder="Search">
                                            <input type="submit" value="">
                                        </form>
                                    </div>
                                </div>
                                <div class="sing_right_widget">
                                    <h2>Latest News</h2>
                                    <div class="sing_right_widg_content">
                                        <ul class="lat_news_right">
                                            <li>
                                                <img src="{{ asset('website/img/right_lat_news_1.jpg') }}" alt="">
                                                <div class="lat_news_right_con">
                                                    <h3><a href="{{ route('single-post') }}">Mister we could use a man
                                                            like
                                                            Herbert</a></h3>
                                                    <h4>April 19, 2015</h4>
                                                </div>
                                            </li>
                                            <li>
                                                <img src="{{ asset('website/img/right_lat_news_2.jpg') }}" alt="">
                                                <div class="lat_news_right_con">
                                                    <h3><a href="{{ route('single-post') }}">e know Flipper lives in a
                                                            world full
                                                            of wonder</a></h3>
                                                    <h4>April 12, 2015</h4>
                                                </div>
                                            </li>
                                            <li>
                                                <img src="{{ asset('website/img/right_lat_news_3.jpg') }}" alt="">
                                                <div class="lat_news_right_con">
                                                    <h3><a href="{{ route('single-post') }}">very best to make the
                                                            others
                                                            comfortable</a></h3>
                                                    <h4>April 12, 2015</h4>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sing_right_widget">
                                    <h2>Upcoming Events</h2>
                                    <div class="sing_right_widg_content">
                                        <div class="upcoming_events_right fix_m_r">
                                            <div class="col-sm-4 col-xs-6 fix_p_l">
                                                <img src="{{ asset('website/img/right_upcoming_event_1.jpg') }}" alt="">
                                            </div>
                                            <div class="col-sm-4 col-xs-6 fix_p_l">
                                                <img src="{{ asset('website/img/right_upcoming_event_2.jpg') }}" alt="">
                                            </div>
                                            <div class="col-sm-4 col-xs-6 fix_p_l">
                                                <img src="{{ asset('website/img/right_upcoming_event_3.jpg') }}" alt="">
                                            </div>
                                            <div class="col-sm-4 col-xs-6 fix_p_l">
                                                <img src="{{ asset('website/img/right_upcoming_event_4.jpg') }}" alt="">
                                            </div>
                                            <div class="col-sm-4 col-xs-6 fix_p_l">
                                                <img src="{{ asset('website/img/right_upcoming_event_5.jpg') }}" alt="">
                                            </div>
                                            <div class="col-sm-4 col-xs-6 fix_p_l">
                                                <img src="{{ asset('website/img/right_upcoming_event_6.jpg') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sing_right_widget">
                                    <h2>Connect With Us</h2>
                                    <div class="sing_right_widg_content">
                                        <div class="social_share_logo_right fix_m_r">
                                            <div class="col-md-4 col-sm-4 fix_p_l">
                                                <div class="single_social_share">
                                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                                    <span class="counter">5169</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 fix_p_l">
                                                <div class="single_social_share">
                                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                                    <span class="counter">3210</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 fix_p_l">
                                                <div class="single_social_share">
                                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                                    <span class="counter">2012</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sing_right_widget">
                                    <h2>Categories</h2>
                                    <div class="sing_right_widg_content">
                                        <ul class="category_right">
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Architecture (23)</a></li>
                                            <li class="current-cat"><a href="#"><i class="fa fa-angle-right"></i>Biology
                                                    (16)</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Chemistry (09)</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Computer Science (05)</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>English Lit (15)</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Psychology (11)</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sing_right_widget">
                                    <h2>Popular Tags</h2>
                                    <div class="sing_right_widg_content">
                                        <ul class="popular_tag_right">
                                            <li><a href="#">Amazing</a></li>
                                            <li><a href="#">Clean</a></li>
                                            <li><a href="#">Multipurpose</a></li>
                                            <li><a href="#">Envato</a></li>
                                            <li><a href="#">Responsiveness</a></li>
                                            <li><a href="#">IOS</a></li>
                                            <li><a href="#">Creative</a></li>
                                            <li><a href="#">Twitter</a></li>
                                            <li><a href="#">Wordpress</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
