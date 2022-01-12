@extends('front.layouts.app')
@section('content')
<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('front/img/page-banner-1.jpg')}}"></section>
    <section id="about-page" class="pt-70 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title mt-50">
                        <h5 style="font-size:40px; text-align: center; text-transform: uppercase;">Our Story</h5>
                        <br>
                        
                    </div> <!-- section title -->
                    <div class="about-cont">
                        <p class="text-center">Tulua Empire Pvt Ltd. launched its operations in December 2020. It is newly formed Destination Management Company, Managed by 2 Young & Extremely Enthusiast Entrepreneur. They are extremely passionate about making their clients holiday as their best holiday they have ever Experienced</p>
                        <p class="text-center">These Young Entrepreneurs Understand the latest travel trends and desires to turn Itineraries into Successful travel plan with their innovative Ideas.</p>
                        <p class="text-center font-italic"> Tulua Empire Pvt Ltd. reflects the perfect blend of international and local knowledge. Right from travel planning to amazing activities which includes Culture & Attractions, Water & Theme Parks, Adventure & Water Activities, Premium Activities, ticketing services, hotel bookings, UAE visit visa, Travel Insurance. Tulua Empire Pvt Ltd. is headed towards redefining the role of Travel & Destination Management Company. </p>
                    </div>
                    <div class="row">
                     <div class="col-md-6">
                        <img src="{{asset('front/img/sig_1.png')}}">
                     </div>
                     <div class="col-md-6">
                        <img src="{{asset('front/img/sig.png')}}">
                     </div>
                    </div>
                </div> 
                <div class="col-lg-6">
                    <div class="about-image mt-50">
                        <img src="{{asset('front/img/about-3_1.jpg')}}" alt="About">
                    </div> 
                </div>
                
            </div> 
            <div class="about-items pt-60">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="about-singel-items mt-30" style="text-align: center;">
                            <!-- <span>01</span> -->
                            <h4>Values</h4>
                            <p class="font-italic">   <span style="font-size:40px; color: #000;"> " </span>  As a Destination Management Company, Our Aim is to provide High Quality Services with Innovative Ad-ons <span style="font-size:40px; color: #000;"> " </span> </p>
                        </div> <!-- about singel -->
                    </div>
                </div> <!-- row -->
            </div> <!-- about items -->
        </div> <!-- container -->
    </section>
   <section class="pt-65" style="background-color: #f8992d;">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
                  <img src="{{asset('front/img/about_back.jpg')}}">
            </div>
         </div>
         </div>
   </section>
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
               <h5 class="icon-title color-dark-2">Hand Picked Hotels</h5>               
            </div>
         </div>
         <div class="icon-block-entry col-xs-12 col-sm-6 col-md-3 clear-sm-2 clear-md-4">
            <div class="icon-block style-5">
               <img class="icon-img" src="{{asset('front/img/m_icon_4.png')}}" alt="">
               <h5 class="icon-title color-dark-2"> Customized Tours</h5>               
            </div>
         </div>
         <div class="icon-block-entry col-xs-12 col-sm-6 col-md-3 cclear-sm-2 clear-md-4">
            <div class="icon-block style-5">
               <img class="icon-img" src="{{asset('front/img/m_icon_5.png')}}" alt="">
               <h5 class="icon-title color-dark-2"> Private Guide</h5>               
            </div>
         </div>
         <div class="icon-block-entry col-xs-12 col-sm-6 col-md-3 clear-sm-2 clear-md-4">
            <div class="icon-block style-5">
               <img class="icon-img" src="{{asset('front/img/m_icon_6.png')}}" alt="">
               <h5 class="icon-title color-dark-2"> Location Manager</h5>               
            </div>
         </div>
         <div class="icon-block-entry col-xs-12 col-sm-6 col-md-3 clear-sm-2 clear-md-4">
            <div class="icon-block style-5">
               <img class="icon-img" src="{{asset('front/img/m_icon_7.png')}}" alt="">
               <h5 class="icon-title color-dark-2"> Best Deals</h5>               
            </div>
         </div>
         <div class="icon-block-entry col-xs-12 col-sm-6 col-md-3 clear-sm-2 clear-md-4">
            <div class="icon-block style-5">
               <img class="icon-img" src="{{asset('front/img/m_icon_8.png')}}" alt="">
               <h5 class="icon-title color-dark-2"> Best Services</h5>               
            </div>
         </div>
      </div>
   </div>
</section>
<div class="hidden-xs wave__footer">
   <div class="wave__ft"></div>
</div>
@endsection
