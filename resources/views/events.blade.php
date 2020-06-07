@extends('layouts.app')
@section('content')
    <section class="breadcrumb_area">
        <div class="breadcrumb_top">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb_title section-padding">
                        <h2>Events</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb_bottom">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb_nav">
                        <div class="col-sm-5">
                            <h2>Events</h2>
                        </div>
                        <div class="col-sm-7">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li>Events</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="upcoming_events_area section-padding">
        <div class="container">
            <div class="row">
                <div class="all_events_box">
                    <div class="col-md-3 col-sm-6">
                        <div class="single_events_box">
                            <img src="{{ asset('website/img/upcoimg_events_1.jpg') }}" alt="">
                            <div class="sing_event_caption">
                                <div class="event_date">
                                    <span>12 May</span>
                                </div>
                                <div class="event_time">
                                    <span>10:00 AM</span>
                                </div>
                                <a href="{{ route('single-event') }}">I never thought I could feel so free flying
                                    away</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_events_box">
                            <img src="{{ asset('website/img/upcoimg_events_2.jpg') }}" alt="">
                            <div class="sing_event_caption">
                                <div class="event_date">
                                    <span>12 May</span>
                                </div>
                                <div class="event_time">
                                    <span>12:00 PM</span>
                                </div>
                                <a href="{{ route('single-event') }}">That this group some how form a
                                    family</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_events_box">
                            <img src="{{ asset('website/img/upcoimg_events_3.jpg') }}" alt="">
                            <div class="sing_event_caption">
                                <div class="event_date">
                                    <span>25 June</span>
                                </div>
                                <div class="event_time">
                                    <span>3:00 PM</span>
                                </div>
                                <a href="{{ route('single-event') }}">Courage of the fearless crew the
                                    Milost</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_events_box">
                            <img src="{{ asset('website/img/upcoimg_events_4.jpg') }}" alt="">
                            <div class="sing_event_caption">
                                <div class="event_date">
                                    <span>13 July</span>
                                </div>
                                <div class="event_time">
                                    <span>11:00 AM</span>
                                </div>
                                <a href="{{ route('single-event') }}">So join us here each week my friends you're
                                    sure</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_events_box">
                            <img src="{{ asset('website/img/upcoimg_events_5.jpg') }}" alt="">
                            <div class="sing_event_caption">
                                <div class="event_date">
                                    <span>19 July</span>
                                </div>
                                <div class="event_time">
                                    <span>11:00 AM</span>
                                </div>
                                <a href="{{ route('single-event') }}">The ship set ground on the shore of this
                                    uncharted</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_events_box">
                            <img src="{{ asset('website/img/upcoimg_events_6.jpg') }}" alt="">
                            <div class="sing_event_caption">
                                <div class="event_date">
                                    <span>26 July</span>
                                </div>
                                <div class="event_time">
                                    <span>4:00 PM</span>
                                </div>
                                <a href="{{ route('single-event') }}">World today takes every thing you've got</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_events_box">
                            <img src="{{ asset('website/img/upcoimg_events_7.jpg') }}" alt="">
                            <div class="sing_event_caption">
                                <div class="event_date">
                                    <span>10 Aug</span>
                                </div>
                                <div class="event_time">
                                    <span>3:00 PM</span>
                                </div>
                                <a href="{{ route('single-event') }}">Here's the story of a man named Brady who was
                                    busy</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_events_box">
                            <img src="{{ asset('website/img/upcoimg_events_8.jpg') }}" alt="">
                            <div class="sing_event_caption">
                                <div class="event_date">
                                    <span>28 Aug</span>
                                </div>
                                <div class="event_time">
                                    <span>11:00 AM</span>
                                </div>
                                <a href="{{ route('single-event') }}">Government they survive as soldiers of fortune</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_events_box">
                            <img src="{{ asset('website/img/upcoimg_events_9.jpg') }}" alt="">
                            <div class="sing_event_caption">
                                <div class="event_date">
                                    <span>19 Sep</span>
                                </div>
                                <div class="event_time">
                                    <span>12:00 PM</span>
                                </div>
                                <a href="{{ route('single-event') }}">Makin their way the only way they know how</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_events_box">
                            <img src="{{ asset('website/img/upcoimg_events_10.jpg') }}" alt="">
                            <div class="sing_event_caption">
                                <div class="event_date">
                                    <span>26 Sep</span>
                                </div>
                                <div class="event_time">
                                    <span>10:00 AM</span>
                                </div>
                                <a href="{{ route('single-event') }}">Make the others able in their tropic island</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_events_box">
                            <img src="{{ asset('website/img/upcoimg_events_11.jpg') }}" alt="">
                            <div class="sing_event_caption">
                                <div class="event_date">
                                    <span>05 Oct</span>
                                </div>
                                <div class="event_time">
                                    <span>11:00 AM</span>
                                </div>
                                <a href="{{ route('single-event') }}">Tale of our castaways they're here for me</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single_events_box">
                            <img src="{{ asset('website/img/upcoimg_events_12.jpg') }}" alt="">
                            <div class="sing_event_caption">
                                <div class="event_date">
                                    <span>12 Nov</span>
                                </div>
                                <div class="event_time">
                                    <span>9:00 AM</span>
                                </div>
                                <a href="{{ route('single-event') }}">Girls were girls and men were men</a>
                            </div>
                        </div>
                    </div>
                    <div class="all_events_link">
                        <a href="{{ route('events') }}">View The Calendar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
