@extends('layouts.app')
@section('content')
    <section class="breadcrumb_area">
        <div class="breadcrumb_top">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb_title section-padding">
                        <h2>Latest News</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb_bottom">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb_nav">
                        <div class="col-sm-5">
                            <h2>Latest News</h2>
                        </div>
                        <div class="col-sm-7">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li>Latest News</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="latest_news_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="single_blog_post_box">
                        <div class="blog_post_photo">
                            <img src="{{ asset('website/img/latest_news_post_1.jpg') }}" alt="">
                            <div class="blog_post_date_caption">
                                <span>08 Apr</span>
                            </div>
                        </div>
                        <div class="blog_post_txt">
                            <div class="blog_post_heading">
                                <h2><a href="{{ route('single-post') }}">your way in the world today takes everything
                                        you've
                                        got</a></h2>
                                <p>Posted By : Admin</p>
                            </div>
                            <div class="blog_post_content">
                                <p>Buck Rogers to Earth five-hundred years later. Now were up in the big leagues
                                    getting' our turn at bat. The movie star the professor and Mary Ann here on
                                    Gilligans Isle. So get a witch's shawl on a broomstick you can crawl on. Were gonna
                                    pay a call on the Addams Family." The mate was a mighty sailin' man the Skipper
                                    brave and sure. </p>
                                <ul>
                                    <li><i class="pe-7s-comment"></i>11 Comments</li>
                                    <li><i class="pe-7s-like"></i>13 Likes</li>
                                    <li><i class="pe-7s-look"></i>19 Viewers</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single_blog_post_box">
                        <div class="blog_post_photo">
                            <img src="{{ asset('website/img/latest_news_post_2.jpg') }}" alt="">
                            <div class="blog_post_date_caption">
                                <span>08 Apr</span>
                            </div>
                        </div>
                        <div class="blog_post_txt">
                            <div class="blog_post_heading">
                                <h2><a href="{{ route('single-post') }}">A shadowy flight into the dangerous world of a
                                        man who
                                        does not exist</a></h2>
                                <p>Posted By : Admin</p>
                            </div>
                            <div class="blog_post_content">
                                <p>Doin' it our way. Nothin's gonna turn us back now. Straight ahead and on the track
                                    now. We're gonna make our dreams come true. Just two good ol' boys Wouldn't change
                                    if they could. Fightin' the system like a true modern day Robin Hood. Doin' it our
                                    way. Nothin's gonna turn us back now. Straight ahead and on the track now. We're
                                    gonna make our dreams come true. </p>
                                <ul>
                                    <li><i class="pe-7s-comment"></i>31 Comments</li>
                                    <li><i class="pe-7s-like"></i>9 Likes</li>
                                    <li><i class="pe-7s-look"></i>20 Viewers</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single_blog_post_box">
                        <div class="blog_post_photo">
                            <img src="{{ asset('website/img/latest_news_post_3.jpg') }}" alt="">
                            <div class="blog_post_date_caption">
                                <span>08 Apr</span>
                            </div>
                        </div>
                        <div class="blog_post_txt">
                            <div class="blog_post_heading">
                                <h2><a href="{{ route('single-post') }}">Its like a kind of torture to have to watch the
                                        show</a>
                                </h2>
                                <p>Posted By : Admin</p>
                            </div>
                            <div class="blog_post_content">
                                <p> It's time to play the music. It's time to light the lights. It's time to meet the
                                    Muppets on the Muppet Show tonight? Wouldn't you like to get away. Sometimes you
                                    want to go where everybody knows your name. And they're always glad you came. Now
                                    were up in the big leagues getting' our turn at bat. They're creepy and they're
                                    kooky mysterious and spooky.</p>
                                <ul>
                                    <li><i class="pe-7s-comment"></i>23 Comments</li>
                                    <li><i class="pe-7s-like"></i>56 Likes</li>
                                    <li><i class="pe-7s-look"></i>61 Viewers</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single_blog_post_box">
                        <div class="blog_post_photo">
                            <img src="{{ asset('website/img/latest_news_post_4.jpg') }}" alt="">
                            <div class="blog_post_date_caption">
                                <span>08 Apr</span>
                            </div>
                        </div>
                        <div class="blog_post_txt">
                            <div class="blog_post_heading">
                                <h2><a href="{{ route('single-post') }}">we know Flipper lives in a world full of wonder
                                        flying</a></h2>
                                <p>Posted By : Admin</p>
                            </div>
                            <div class="blog_post_content">
                                <p>The ship set ground on the shore of this uncharted desert isle with Gilligan the
                                    Skipper too the millionaire and his wife! Fleeing from the Cylon tyranny the last
                                    Battlestar – Galactica - leads a rag-tag fugitive fleet on a lonely quest - a
                                    shining planet known as Earth. The ship set ground on the shore of this uncharted
                                    desert isle with Gilligan the Skipper too the millionaire.</p>
                                <ul>
                                    <li><i class="pe-7s-comment"></i>12 Comments</li>
                                    <li><i class="pe-7s-like"></i>19 Likes</li>
                                    <li><i class="pe-7s-look"></i>23 Viewers</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single_blog_post_box">
                        <div class="blog_post_photo">
                            <img src="{{ asset('website/img/latest_news_post_5.jpg') }}" alt="">
                            <div class="blog_post_date_caption">
                                <span>08 Apr</span>
                            </div>
                        </div>
                        <div class="blog_post_txt">
                            <div class="blog_post_heading">
                                <h2><a href="{{ route('single-post') }}">maximum security stockade to the Los Angeles
                                        underground</a></h2>
                                <p>Posted By : Admin</p>
                            </div>
                            <div class="blog_post_content">
                                <p>These days are all share them with me oh baby. Got kind of tired packin' and
                                    unpackin' - town to town and up and down the dial! So join us here each week my
                                    friends you're sure to get a smile from seven stranded castaways here on Gilligans
                                    Isle. we might as well say... Would you be mine? Could you be mine? Won't you be my
                                    neighbor.</p>
                                <ul>
                                    <li><i class="pe-7s-comment"></i>12 Comments</li>
                                    <li><i class="pe-7s-like"></i>20 Likes</li>
                                    <li><i class="pe-7s-look"></i>45 Viewers</li>
                                </ul>
                            </div>
                        </div>
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
