@extends('layouts.app')
@section('content')
    <section class="key_to_success_area">
        <div class="container">
            <div class="row">
                <div class="key_to_success">
                    <div class="col-md-7">
                        <div class="key2seccess_txt">
                            <h2>Education is the key to
                                your success</h2>
                            <p>Love exciting and new. Come aboard were expecting you. Love life's sweetest reward Let it
                                flow it floats back to you. Texas tea. A man is born he's a man of means you knew. </p>
                            <a href="#" class="rm_btn">Learn more</a>
                            <a href="#" class="rm_btn">apply now</a>
                        </div>
                    </div>
                    <div class="col-md-5 hidden-sm hidden-xs">
                        <div class="key2seccess_photo">
                            <img src="{{ asset('website/img/header_bottom_photo.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our_courses_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section_heading">
                        <h1>Courses In Our University</h1>
                        <p>Check our main courses and coachings</p>
                    </div>
                </div>
            </div>
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
                                hunch.
                                It's time to put on makeup.</p>
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
                                hunch.
                                It's time to put on makeup.</p>
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
                                hunch.
                                It's time to put on makeup.</p>
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
                                hunch.
                                It's time to put on makeup.</p>
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
                                hunch.
                                It's time to put on makeup.</p>
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
                                hunch.
                                It's time to put on makeup.</p>
                            <a href="#">Apply now <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="search_courses_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section_heading">
                        <h1>Search For Courses</h1>
                        <p>Fill the fields to seek for courses</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="course_search">
                        <form action="{{ route('home') }}">
                            <select name="">
                                <option value="">Category</option>
                                <option value="">Political Science</option>
                                <option value="">Literature</option>
                                <option value="">Advance Mathematics</option>
                                <option value="">Micro Biology</option>
                                <option value="">Global Economic</option>
                                <option value="">Computer Science</option>
                            </select>
                            <select name="">
                                <option value="">Duration</option>
                                <option value="">3 Yr</option>
                                <option value="">4 Yr</option>
                            </select>
                            <select name="">
                                <option value="">Level</option>
                                <option value="">Bachelor's Degree</option>
                                <option value="">Master’s Degree</option>
                            </select>
                            <select name="">
                                <option value="">Location</option>
                                <option value="">Texas</option>
                                <option value="">New York</option>
                            </select>
                            <input type="text" placeholder="Keywords">
                            <input type="submit" value="Search">
                        </form>
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
                            the
                            millionaire and his wife. These days are all Happy and Free. These days are all share them
                            with
                            me.</p>
                        <p>It's time to put on makeup. It's time to dress up right. It's time to raise the curtain on
                            the
                            Muppet Show tonight. </p>
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

    <section class="latest_courses_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section_heading">
                        <h1>Latest Courses</h1>
                        <p>Check our featured courses</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="all_latest_course">
                    <div class="single_latest_courses">
                        <div class="sing_lat_course_photo">
                            <img src="{{ asset('website/img/latest_course_1.jpg') }}" alt="">
                        </div>
                        <div class="sing_lat_course_txt">
                            <h3>LITERATURE</h3>
                            <h2>Social courses</h2>
                            <p>Here's the story of a lovely lady who was bringing up three very lovely girls.</p>
                            <ul>
                                <li><i class="fa fa-calendar"></i>Course duration : <span>3 Yr</span></li>
                                <li><i class="fa fa-graduation-cap"></i>Degree Level : <span>Master’s Degree</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="single_latest_courses">
                        <div class="sing_lat_course_photo">
                            <img src="{{ asset('website/img/latest_course_2.jpg') }}" alt="">
                        </div>
                        <div class="sing_lat_course_txt">
                            <h3>management</h3>
                            <h2>Banking courses</h2>
                            <p>Here's the story of a lovely lady who was bringing up three very lovely girls.</p>
                            <ul>
                                <li><i class="fa fa-calendar"></i>Course duration : <span>3 Yr</span></li>
                                <li><i class="fa fa-graduation-cap"></i>Degree Level : <span>Master’s Degree</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="single_latest_courses">
                        <div class="sing_lat_course_photo">
                            <img src="{{ asset('website/img/latest_course_3.jpg') }}" alt="">
                        </div>
                        <div class="sing_lat_course_txt">
                            <h3>art</h3>
                            <h2>Dance courses</h2>
                            <p>Here's the story of a lovely lady who was bringing up three very lovely girls.</p>
                            <ul>
                                <li><i class="fa fa-calendar"></i>Course duration : <span>3 Yr</span></li>
                                <li><i class="fa fa-graduation-cap"></i>Degree Level : <span>Master’s Degree</span></li>
                            </ul>
                        </div>
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
                                    be
                                    making
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
                                    be
                                    making
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

    <section class="our_partners section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section_heading">
                        <h1>Our Trusted Partners</h1>
                        <p>Check our partners</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="all_partners">
                    <div class="single_partner">
                        <a href="#"><img src="{{ asset('website/img/partners_logo_1.jpg') }}" alt=""></a>
                    </div>
                    <div class="single_partner">
                        <a href="#"><img src="{{ asset('website/img/partners_logo_2.jpg') }}" alt=""></a>
                    </div>
                    <div class="single_partner">
                        <a href="#"><img src="{{ asset('website/img/partners_logo_3.jpg') }}" alt=""></a>
                    </div>
                    <div class="single_partner">
                        <a href="#"><img src="{{ asset('website/img/partners_logo_4.jpg') }}" alt=""></a>
                    </div>
                    <div class="single_partner">
                        <a href="#"><img src="{{ asset('website/img/partners_logo_5.jpg') }}" alt=""></a>
                    </div>
                    <div class="single_partner">
                        <a href="#"><img src="{{ asset('website/img/partners_logo_6.jpg') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
