@extends('layouts.app')
@section('content')
    <section class="breadcrumb_area">
        <div class="breadcrumb_top">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb_title section-padding">
                        <h2>Courses</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb_bottom">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb_nav">
                        <div class="col-sm-5">
                            <h2>Courses</h2>
                        </div>
                        <div class="col-sm-7">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li>Courses</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our_courses_area section-padding course-page">
        <div class="container">
            <div class="row all_our_courses">
                <div class="col-md-4 col-sm-6">
                    <div class="single_our_course">
                        <div class="sing_course_thumb">
                            <img src="{{ asset('website/img/single_course_thumb_1.png') }}" alt="">
                        </div>
                        <div class="sing_course_txt">
                            <img src="{{ asset('website/img/icon_course_1.png') }}" alt="" class="course_icon">
                            <h2>Political Science</h2>
                            <p>Till the one day when the lady met this fellow and they knew it was much more than a
                                hunch. It's time to put on makeup.</p>
                            <a href="#">Apply now <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single_our_course">
                        <div class="sing_course_thumb">
                            <img src="{{ asset('website/img/single_course_thumb_2.png') }}" alt="">
                        </div>
                        <div class="sing_course_txt">
                            <img src="{{ asset('website/img/icon_course_2.png') }}" alt="" class="course_icon">
                            <h2>literature</h2>
                            <p>Till the one day when the lady met this fellow and they knew it was much more than a
                                hunch. It's time to put on makeup.</p>
                            <a href="#">Apply now <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single_our_course">
                        <div class="sing_course_thumb">
                            <img src="{{ asset('website/img/single_course_thumb_3.png') }}" alt="">
                        </div>
                        <div class="sing_course_txt">
                            <img src="{{ asset('website/img/icon_course_3.png') }}" alt="" class="course_icon">
                            <h2>advance mathematics</h2>
                            <p>Till the one day when the lady met this fellow and they knew it was much more than a
                                hunch. It's time to put on makeup.</p>
                            <a href="#">Apply now <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single_our_course">
                        <div class="sing_course_thumb">
                            <img src="{{ asset('website/img/single_course_thumb_4.png') }}" alt="">
                        </div>
                        <div class="sing_course_txt">
                            <img src="{{ asset('website/img/icon_course_4.png') }}" alt="" class="course_icon">
                            <h2>micro biology</h2>
                            <p>Till the one day when the lady met this fellow and they knew it was much more than a
                                hunch. It's time to put on makeup.</p>
                            <a href="#">Apply now <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single_our_course">
                        <div class="sing_course_thumb">
                            <img src="{{ asset('website/img/single_course_thumb_5.png') }}" alt="">
                        </div>
                        <div class="sing_course_txt">
                            <img src="{{ asset('website/img/icon_course_5.png') }}" alt="" class="course_icon">
                            <h2>global economic</h2>
                            <p>Till the one day when the lady met this fellow and they knew it was much more than a
                                hunch. It's time to put on makeup.</p>
                            <a href="#">Apply now <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single_our_course">
                        <div class="sing_course_thumb">
                            <img src="{{ asset('website/img/single_course_thumb_6.png') }}" alt="">
                        </div>
                        <div class="sing_course_txt">
                            <img src="{{ asset('website/img/icon_course_6.png') }}" alt="" class="course_icon">
                            <h2>computer science</h2>
                            <p>Till the one day when the lady met this fellow and they knew it was much more than a
                                hunch. It's time to put on makeup.</p>
                            <a href="#">Apply now <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="view_all_course">
                    <a href="#" class="rm_btn">view all courses</a>
                </div>
            </div>
            <div class="row">
                <div class="call_to_action2">
                    <div class="col-md-offset-1 col-md-2 col-sm-2">
                        <div class="call2action2_photo">
                            <img src="{{ asset('website/img/call2action2_photo.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="call2action_apply">
                            <h2>Applying to our university</h2>
                            <p>Access all the information you need.</p>
                            <h3><a href="#">Check out your options</a></h3>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 fix_p_r">
                        <div class="call2action_help">
                            <h2>Need Help ?</h2>
                            <p>Our student advisors are
                                here to help you</p>
                            <a href="#">+01 234 568 669</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
