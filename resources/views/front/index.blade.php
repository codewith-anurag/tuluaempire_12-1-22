@extends('front.layouts.app')
@section('content')
<!--====== SLIDER PART START ======-->
<section>
    <div class="row w-100-hidden m-0" style="height:650px;">
    <div class="col-xl-9 p-0">
        <section class="slider-active sliderpaddi" id="slider-part">
            @foreach ( $slider as $slider_list )
            <div class="single-slider bg_cover pt-150" style="background-image:  url({{asset('slider_images/'.$slider_list->slider_image)}}); height: 650px;" data-overlay="4">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9">
                            
                        </div>
                    </div>
                    <!-- row -->
                </div>
                <!-- container -->
            </div>
            <!-- single slider -->
            @endforeach
        </section>
    </div>
    <div class="col-xl-3 p-0">
        <img class="bg-slider mobileres" src="{{asset('front/img/bg-slider02.jpg')}}" style="padding:0px 15px;">
    </div>
    <!-- single slider -->
</section>
<!--====== SLIDER PART ENDS ======-->
<!--====== ABOUT PART START ======-->
<section id="about-part" class="pt-65">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-40 whyus" style="text-align: center;">
                    <h2> Why Us </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="icon-block-entry col-xs-12 col-sm-6 col-md-3 clear-sm-2 clear-md-4">
                <div class="icon-block style-5">
                    <img class="icon-img" src="{{asset('front/img/m_icon_1.png')}}" alt="">                   
                    <h5 class="icon-title color-dark-2">happy clients</h5>                    
                </div>
            </div>
            <div class="icon-block-entry col-xs-12 col-sm-6 col-md-3 clear-sm-2 clear-md-4">
                <div class="icon-block style-5">
                    <img class="icon-img" src="{{asset('front/img/m_icon_2.png')}}" alt="">
                    <h5 class="icon-title color-dark-2">amazing tour</h5>                    
                </div>
            </div>
            <div class="icon-block-entry col-xs-12 col-sm-6 col-md-3 clear-sm-2 clear-md-4">
                <div class="icon-block style-5">
                    <img class="icon-img" src="{{asset('front/img/m_icon_3.png')}}" alt="">
                    <h5 class="icon-title color-dark-2">support cases</h5>                    
                </div>
            </div>
            <div class="icon-block-entry col-xs-12 col-sm-6 col-md-3 clear-sm-2 clear-md-4">
                <div class="icon-block style-5">
                    <img class="icon-img" src="{{asset('front/img/m_icon_4.png')}}" alt="">
                    <h5 class="icon-title color-dark-2">in bussines</h5>                    
                </div>
            </div>
            <div class="icon-block-entry col-xs-12 col-sm-6 col-md-3 cclear-sm-2 clear-md-4">
                <div class="icon-block style-5">
                    <img class="icon-img" src="{{asset('front/img/m_icon_5.png')}}" alt="">
                    <h5 class="icon-title color-dark-2">Handpicked Hotels</h5>                    
                </div>
            </div>
            <div class="icon-block-entry col-xs-12 col-sm-6 col-md-3 clear-sm-2 clear-md-4">
                <div class="icon-block style-5">
                    <img class="icon-img" src="{{asset('front/img/m_icon_6.png')}}" alt="">
                    <h5 class="icon-title color-dark-2">Private Guide</h5>                    
                </div>
            </div>
            <div class="icon-block-entry col-xs-12 col-sm-6 col-md-3 clear-sm-2 clear-md-4">
                <div class="icon-block style-5">
                    <img class="icon-img" src="{{asset('front/img/m_icon_7.png')}}" alt="">
                    <h5 class="icon-title color-dark-2">Location Manager</h5>                    
                </div>
            </div>
            <div class="icon-block-entry col-xs-12 col-sm-6 col-md-3 clear-sm-2 clear-md-4">
                <div class="icon-block style-5">
                    <img class="icon-img" src="{{asset('front/img/m_icon_8.png')}}" alt="">
                    <h5 class="icon-title color-dark-2">Best Travel Agent</h5>                    
                </div>
            </div>
        </div>
    </div>
</section>
<section id="course-part" class="pt-115 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-11">
                <div class="section-title">
                    <!-- <h5> BEAUTIFUL TRIPS </h5> -->
                    <h2 class=""> Things to Know About Dubai </h2>
                    <br>
                    <p class="text-justify">Dubai is the most populous city in the United Arab Emirates (UAE). Established in the 18th century as a small
                        fishing village, the city grew rapidly in the early 21st century into a cosmopolitan metropolis with a focus on
                        tourism and hospitality. Dubai is one of the world's most popular tourist destinations with the second most
                        five-star hotels in the world, and the tallest building in the world, the Burj Khalifa.
                    </p>
                </div>
            </div>
        </div>
        <div class="row course-slied mt-50">
            @foreach ($aboutdubai as $aboutdubai_list)
                <div class="col-lg-4">
                    <div class="singel-course">
                        <div class="thum">
                            <div class="image">
                                <img src="{{asset('category_image/'.$aboutdubai_list->category_image)}}" alt="Course">
                            </div>
                        </div>
                        <div class="cont">
                            <a href="{{route('subcategory',$aboutdubai_list->category_slug)}}">
                                <h4> {{ $aboutdubai_list->title }} </h4>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--====== COURSE PART ENDS ======-->
<!--====== TEASTIMONIAL PART START ======-->
<section>
    <div class="whatpeoplesay">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-5">
                    <div class="p-top40 p-btm40 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                        <div class="customer-feedback">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-title mb-3 text-center mt-5">
                                            <h5>Reviews</h5>
                                            <h2>What they say</h2>
                                        </div>
                                        <!-- section title -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 m-0-auto ">
                                        <div class="owl-carousel feedback-slider">
                                            @foreach ($review as $review_list)
                                                <!-- slider item -->
                                                <div class="feedback-slider-item">
                                                    <img src="{{asset('review_image/'.$review_list->review_image)}}" class="center-block img-circle" alt="Customer Feedback">
                                                    <h3 class="customer-name">{{$review_list->name}}</h3>
                                                    <p style="text-align: justify;"> {!! $review_list->description !!}</p>
                                                    <span class="light-bg customer-rating" data-rating="{{$review_list->ratting}}">
                                                        {{$review_list->ratting}}
                                                    <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                                <!-- /slider item -->
                                            @endforeach
                                        </div>
                                        <!-- /End feedback-slider -->
                                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="fa fa-long-arrow-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-long-arrow-right"></i></button></div>
                                        <!-- side thumbnail -->
                                        <div class="feedback-slider-thumb hidden-xs">
                                            @foreach ($review as $review_list)
                                                <div class="thumb-prev">
                                                    <span>
                                                    <img src="{{asset('review_image/'.$review_list->review_image)}}" alt="Customer Feedback">
                                                    </span>
                                                    <span class="light-bg customer-rating">
                                                        {{$review_list->ratting}}
                                                    <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                            @endforeach
                                            @foreach ($review as $review_list)
                                            <div class="thumb-next">
                                                <span>
                                                <img src="{{asset('review_image/'.$review_list->review_image)}}" alt="Customer Feedback">
                                                </span>
                                                <span class="light-bg customer-rating">
                                                    {{$review_list->ratting}}
                                                <i class="fa fa-star"></i>
                                                </span>
                                            </div>
                                        @endforeach
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>            
        </div>        
    </div>    
</section>

<section class="pt-10 pb-10">
    <div class="">
        <div class="container">
            <div class="row">
                <div class="icon-block-entry col-xs-12 col-sm-6 col-md-4">
                    <div class="foot_logo">
                        <img src="{{asset('front/img/cl_logo_1.png')}}" alt="Logo">
                    </div>
                </div>
                <div class="icon-block-entry col-xs-12 col-sm-6 col-md-4">
                    <div class="foot_logo">
                        <img src="{{asset('front/img/cl_logo_2.png')}}" alt="Logo">
                    </div>
                </div>
                <div class="icon-block-entry col-xs-12 col-sm-6 col-md-4">
                    <div class="foot_logo">
                        <img src="{{asset('front/img/cl_logo_3.png')}}" alt="Logo">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="icon-block-entry col-xs-12 col-sm-6 col-md-2"></div>
                <div class="icon-block-entry col-xs-12 col-sm-6 col-md-4">
                    <div class="foot_logo">
                        <img src="{{asset('front/img/cl_logo_4.png')}}" alt="Logo">
                    </div>
                </div>
                <div class="icon-block-entry col-xs-12 col-sm-6 col-md-4">
                    <div class="foot_logo">
                        <img src="{{asset('front/img/cl_logo_5.png')}}" alt="Logo">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="icon-block-entry col-xs-12 col-sm-6 col-md-4">
                    <div class="foot_logo">
                        <img src="{{asset('front/img/cl_logo_6.png')}}" alt="Logo">
                    </div>
                </div>
                <div class="icon-block-entry col-xs-12 col-sm-6 col-md-4">
                    <div class="foot_logo">
                        <img src="{{asset('front/img/cl_logo_7.png')}}" alt="Logo">
                    </div>
                </div>
                <div class="icon-block-entry col-xs-12 col-sm-6 col-md-4">
                    <div class="foot_logo">
                        <img src="{{asset('front/img/cl_logo_8.png')}}" alt="Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== PATNAR LOGO PART ENDS ======-->
<div class="hidden-xs wave__footer">
    <div class="wave__ft"></div>
</div>
@endsection
