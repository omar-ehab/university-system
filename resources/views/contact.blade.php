@extends('layouts.app')
@section('content')
    <section class="breadcrumb_area">
        <div class="breadcrumb_top">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb_title section-padding">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb_bottom">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb_nav">
                        <div class="col-sm-5">
                            <h2>Contact Us</h2>
                        </div>
                        <div class="col-sm-7">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li>Contact Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="map_location_area">
        <div class="google_map">
            <div id="map_area"></div>
            <div class="map_caption">
                <h2>How To Reach Us</h2>
                <div class="row contact_info">
                    <div class="col-sm-4">
                        <ul>
                            <li><i class="pe-7s-map-marker"></i>09 university</li>
                            <li>Design Street</li>
                            <li>Australia</li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <ul>
                            <li><i class="pe-7s-call"></i><a href="tel:+123-456-789-001">+123 456 789 001</a></li>
                            <li><i class="pe-7s-print"></i><a href="tel:+123-456-789-001">+123 456 789 001</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <ul>
                            <li><i class="pe-7s-mail"></i><a href="mailto:Info@university.com">Info@university.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="#"><i class="fa fa-chevron-right"></i>Get The Direction</a>
            </div>
        </div>
    </section>

    <section class="send_us_email_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-offset-6 col-sm-6 fix_p">
                    <div class="send_email">
                        <div class="section-padding">
                            <h2>Send Us An Email</h2>
                            <div class="email_form">
                                <form action="{{ route('home') }}">
                                    <div class="col-md-6 fix_p_r">
                                        <label>Your Name <span>*</span></label>
                                        <input type="text">
                                    </div>
                                    <div class="col-md-6 fix_p_r">
                                        <label>Your E-Mail <span>*</span></label>
                                        <input type="text">
                                    </div>
                                    <div class="col-md-6 fix_p_r">
                                        <label>Phone Number</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-md-6 fix_p_r">
                                        <label>Subject</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-md-12 fix_p_r">
                                        <label>Message</label>
                                        <textarea name="" cols="30" rows="10"></textarea>
                                        <input type="submit" value="Send Message"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
