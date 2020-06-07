@extends('layouts.app')
@section('content')
    <section class="breadcrumb_area">
        <div class="breadcrumb_top">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb_title section-padding">
                        <h2>Alumni</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb_bottom">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb_nav">
                        <div class="col-sm-5">
                            <h2>Alumni</h2>
                        </div>
                        <div class="col-sm-7">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li>Alumni</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="stay_connected_area">
        <div class="container">
            <div class="stay_con_border">
                <div class="stay_connect">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="stay_con_photo">
                                <img src="{{ asset('website/img/stay_connect.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="stay_con_txt">
                                <h2>Stay Connected</h2>
                                <p>You would see the biggest gift would be from me and the card attached would say thank
                                    you for being a friend. So this is the tale of our castaways they're here for a long
                                    long time.</p>
                                <p>Love life's sweetest reward Let it flow it floats back to you. They were four men
                                    living all together yet they were all alone. </p>
                                <a href="#" class="rm_btn">join our community</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="alumni_info_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section_heading">
                        <h1>Information About Alumni</h1>
                        <p>Check out the details of alumni</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="all_alumni_item">
                    <div class="col-sm-6">
                        <div class="single_alumni_box">
                            <div class="col-sm-4 fix_p_l">
                                <div class="sing_alumni_photo">
                                    <img src="{{ asset('website/img/alumni_photo_1.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-8 fix_p_l">
                                <div class="sing_alumni_txt">
                                    <h2>Our Alumni</h2>
                                    <p>No one you see is smarter than he. Didn't need no welfare states. Everybody
                                        pulled his weight. Gee our old Lasalle ran great. </p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="single_alumni_box">
                            <div class="col-sm-4 fix_p_l">
                                <div class="sing_alumni_photo">
                                    <img src="{{ asset('website/img/alumni_photo_2.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-8 fix_p_l">
                                <div class="sing_alumni_txt">
                                    <h2>Awards</h2>
                                    <p>Well we're movin' on up to the east side. To a deluxe apartment in the sky. Baby
                                        if you've ever wondered wondered whatever became of me. </p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="single_alumni_box">
                            <div class="col-sm-4 fix_p_l">
                                <div class="sing_alumni_photo">
                                    <img src="{{ asset('website/img/alumni_photo_3.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-8 fix_p_l">
                                <div class="sing_alumni_txt">
                                    <h2>Events</h2>
                                    <p>Groovin' all week with you! He's gainin' on you so you better look alive. He busy
                                        revin' up his Powerful The mate was a mighty sailin' man.</p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="single_alumni_box">
                            <div class="col-sm-4 fix_p_l">
                                <div class="sing_alumni_photo">
                                    <img src="{{ asset('website/img/alumni_photo_4.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-8 fix_p_l">
                                <div class="sing_alumni_txt">
                                    <h2>Benefits & Services</h2>
                                    <p>To a deluxe apartment in the sky? Well we're movin' on up to the east side to a
                                        deluxe apartment in the sky these Happy Days are yours crawl on.</p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="alumni_carousel">
        <div class="all_alumni_carousel_item">
            <div class="single_alumni_caro_photo">
                <img src="{{ asset('website/img/alumni_carousel_photo_1.jpg') }}" alt="">
            </div>
            <div class="single_alumni_caro_photo">
                <img src="{{ asset('website/img/alumni_carousel_photo_2.jpg') }}" alt="">
            </div>
            <div class="single_alumni_caro_photo">
                <img src="{{ asset('website/img/alumni_carousel_photo_3.jpg') }}" alt="">
            </div>
            <div class="single_alumni_caro_photo">
                <img src="{{ asset('website/img/alumni_carousel_photo_4.jpg') }}" alt="">
            </div>
            <div class="single_alumni_caro_photo">
                <img src="{{ asset('website/img/alumni_carousel_photo_5.jpg') }}" alt="">
            </div>
        </div>
    </section>

    <section class="latest_blog_post_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section_heading">
                        <h1>Latest From Our Blog</h1>
                        <p>Check our latest updates</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="all_latest_blog_post">
                    <div class="col-md-4 col-sm-6">
                        <div class="single_blog_post_box">
                            <div class="blog_post_photo">
                                <img src="{{ asset('website/img/latest_blog_post_4.jpg') }}" alt="">
                                <div class="blog_post_date_caption">
                                    <span>08 Apr</span>
                                </div>
                            </div>
                            <div class="blog_post_txt">
                                <div class="blog_post_heading">
                                    <h2><a href="{{ route('single-post') }}">Love life's sweetest reward Let it</a></h2>
                                    <p>Posted By : Admin</p>
                                </div>
                                <div class="blog_post_content">
                                    <p>A man is born he's a man of means. Then along come two they got nothin' but their
                                        jeans. Just two good ol' boys </p>
                                    <ul>
                                        <li><i class="pe-7s-comment"></i>7 Comments</li>
                                        <li><i class="pe-7s-like"></i>10 Likes</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="single_blog_post_box">
                            <div class="blog_post_photo">
                                <img src="{{ asset('website/img/latest_blog_post_5.jpg') }}" alt="">
                                <div class="blog_post_date_caption">
                                    <span>08 Apr</span>
                                </div>
                            </div>
                            <div class="blog_post_txt">
                                <div class="blog_post_heading">
                                    <h2><a href="{{ route('single-post') }}">fateful trip that started tropic</a></h2>
                                    <p>Posted By : Admin</p>
                                </div>
                                <div class="blog_post_content">
                                    <p>Movin' on up to the east side. We finally got a piece of the pie. We're gonna do
                                        it. On your mark get set and go now.</p>
                                    <ul>
                                        <li><i class="pe-7s-comment"></i>7 Comments</li>
                                        <li><i class="pe-7s-like"></i>20 Likes</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-0 col-md-4 col-sm-6 col-sm-offset-3">
                        <div class="single_blog_post_box">
                            <div class="blog_post_photo">
                                <img src="{{ asset('website/img/latest_blog_post_6.jpg') }}" alt="">
                                <div class="blog_post_date_caption">
                                    <span>08 Apr</span>
                                </div>
                            </div>
                            <div class="blog_post_txt">
                                <div class="blog_post_heading">
                                    <h2><a href="{{ route('single-post') }}">Rockin' and rollin' all week long</a></h2>
                                    <p>Posted By : Admin</p>
                                </div>
                                <div class="blog_post_content">
                                    <p>where people come to see ‘em. They really are a scream the Addams Family. The
                                        Love Boat soon will be making another run. </p>
                                    <ul>
                                        <li><i class="pe-7s-comment"></i>11 Comments</li>
                                        <li><i class="pe-7s-like"></i>15 Likes</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
