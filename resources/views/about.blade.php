@extends('layouts.app')
@section('content')

    <section class="breadcrumb_area">
        <div class="breadcrumb_top">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb_title section-padding">
                        <h2>About us</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb_bottom">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb_nav">
                        <div class="col-sm-5">
                            <h2>About Us</h2>
                        </div>
                        <div class="col-sm-7">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li>About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our_degrees_area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 section-padding od_bg1">
                    <div class="our_degrees_txt">
                        <h2>Welcome To Our University</h2>
                        <p>when the odds are against him and their dangers work to do. You bet your life Speed Racer he
                            will see it through. Well we're movin' on up to the east side. To a deluxe apartment in the
                            sky. So this is the tale of our castaways</p>
                    </div>
                </div>
                <div class="col-md-6 section-padding od_bg2">
                    <div class="our_degrees_item">
                        <div class="single_our_degree">
                            <div class="col-sm-3">
                                <div class="sing_degree_icon">
                                    <img src="{{ asset('website/img/icon_our_degree_1.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-sm-9 fix_p">
                                <div class="sing_degree_txt">
                                    <h2>Associate’s Degree</h2>
                                    <p>You would see the biggest gift would be from me and the card attached would say
                                        thank you for being a friend.</p>
                                </div>
                            </div>
                        </div>
                        <div class="single_our_degree">
                            <div class="col-sm-3">
                                <div class="sing_degree_icon">
                                    <img src="{{ asset('website/img/icon_our_degree_2.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-sm-9 fix_p">
                                <div class="sing_degree_txt">
                                    <h2>Bachelor’s Degree</h2>
                                    <p>On your mark get set and go now. Got a dream and we just know now we're gonna
                                        make our dream come true. </p>
                                </div>
                            </div>
                        </div>
                        <div class="single_our_degree">
                            <div class="col-sm-3">
                                <div class="sing_degree_icon">
                                    <img src="{{ asset('website/img/icon_our_degree_3.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-sm-9 fix_p">
                                <div class="sing_degree_txt">
                                    <h2>Master’s Degree</h2>
                                    <p>Just sit right back and you'll hear a tale a tale of a fateful trip that started
                                        from this tropic port aboard this tiny ship.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why_choose_us_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="why_choose_us_photo">
                        <img src="{{ asset('website/img/why_choose_us_photo.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="why_choose_us_txt">
                        <h1>Why Choose Us ?</h1>
                        <p>The ship set ground on the shore of this uncharted desert isle with Gilligan the Skipper too
                            the millionaire and his wife. These days are all Happy and Free. These days are all share
                            them with me.</p>
                        <p>It's time to put on makeup. It's time to dress up right. It's time to raise the curtain on
                            the Muppet Show tonight. </p>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="single_why_choose">
                                    <div class="single_why_choose_icon">
                                        <img src="{{ asset('website/img/icon_why_choose_1.png') }}" alt="">
                                    </div>
                                    <h3>Experienced Faculty</h3>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="single_why_choose">
                                    <div class="single_why_choose_icon">
                                        <img src="{{ asset('website/img/icon_why_choose_2.png') }}" alt="">
                                    </div>
                                    <h3>Popular Courses</h3>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="single_why_choose">
                                    <div class="single_why_choose_icon">
                                        <img src="{{ asset('website/img/icon_why_choose_3.png') }}" alt="">
                                    </div>
                                    <h3>Guaranteed Career</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="priciples_and_practices_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section_heading">
                        <h1>Our Principles & Practices</h1>
                        <p>Why we are unique from others</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="all_practice_box">
                    <div class="col-md-4 col-sm-6">
                        <div class="sing_practice_box">
                            <div class="sing_prac_content">
                                <img src="{{ asset('website/img/icon_practice_1.png') }}" alt="">
                                <h2>Not For Profit</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="sing_practice_box">
                            <div class="sing_prac_content">
                                <img src="{{ asset('website/img/icon_practice_2.png') }}" alt="">
                                <h2>Course Structure</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-0 col-md-4 col-sm-6 col-sm-offset-3">
                        <div class="sing_practice_box">
                            <div class="sing_prac_content">
                                <img src="{{ asset('website/img/icon_practice_3.png') }}" alt="">
                                <h2>Test Preparation</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="call_to_action_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-6 col-sm-8">
                    <div class="call2action_txt">
                        <h2>Do You Want To Join With US !</h2>
                        <p>Makin their way the only way they know how. That's just a little bit
                            more than the law will allow.</p>
                    </div>
                </div>
                <div class="col-md-offset-2 col-md-2 col-sm-4">
                    <div class="call2action_btn">
                        <a href="#" class="rm_btn">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our_faculties_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section_heading">
                        <h1>Our Great Faculties</h1>
                        <p>Well experienced staffs</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="all_our_faculties">
                    <div class="col-md-3 col-sm-6">
                        <div class="single_our_facult">
                            <div class="sing_our_facult_photo">
                                <img src="{{ asset('website/img/our_faculties_1.jpg') }}" alt="">
                            </div>
                            <div class="sing_our_facult_txt">
                                <h3>John Vettori</h3>
                                <p>Founder & Principle</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_our_facult">
                            <div class="sing_our_facult_photo">
                                <img src="{{ asset('website/img/our_faculties_2.jpg') }}" alt="">
                            </div>
                            <div class="sing_our_facult_txt">
                                <h3>Lucy martin</h3>
                                <p>Vice Principle</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_our_facult">
                            <div class="sing_our_facult_photo">
                                <img src="{{ asset('website/img/our_faculties_3.jpg') }}" alt="">
                            </div>
                            <div class="sing_our_facult_txt">
                                <h3>Chris evans</h3>
                                <p>Mathematics Professor</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_our_facult">
                            <div class="sing_our_facult_photo">
                                <img src="{{ asset('website/img/our_faculties_4.jpg') }}" alt="">
                            </div>
                            <div class="sing_our_facult_txt">
                                <h3>Lucy martin</h3>
                                <p>Biology Professor</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section_heading">
                        <h1>What Our Students Say</h1>
                        <p>Testimonials from students</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="all_testimonial">
                        <div class="single_testi_slider">
                            <div class="testi_student_photo">
                                <img src="{{ asset('website/img/test_slider_1.jpg') }}" alt="">
                                <i class="fa fa-quote-right"></i>
                            </div>
                            <div class="testi_studient_txt">
                                <p>when the odds are against him and their dangers work to do. The Love Boat soon will
                                    be making
                                    another run. The Love Boat promises something for everyone</p>
                                <h3><span>Jesicca Mathews   |</span> Business Management</h3>
                            </div>
                        </div>
                        <div class="single_testi_slider">
                            <div class="testi_student_photo">
                                <img src="{{ asset('website/img/test_slider_1.jpg') }}" alt="">
                                <i class="fa fa-quote-right"></i>
                            </div>
                            <div class="testi_studient_txt">
                                <p>when the odds are against him and their dangers work to do. The Love Boat soon will
                                    be making
                                    another run. The Love Boat promises something for everyone</p>
                                <h3><span>Jesicca Mathews   |</span> Business Management</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testi_slider_nav">
            <i class="fa fa-angle-left testi_prev"></i>
            <i class="fa fa-angle-right testi_next"></i>
        </div>
    </section>
@endsection

