@extends('front.layouts.app')
@section('content')
<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('front/img/page-banner-1.jpg')}})"></section>
    <section id="service1" class="pt-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2> {{$category_title}} </h2>
                </div>
            </div>
        </div>
    </section>
    <section id="blog-page" class="pt-50 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                @foreach ($localresturant_data as $localresturant_list)
                    <div class="col-md-6">
                        <div class="singel-publication mt-30">
                            <div class="restaurant-left">
                                <div class="hero">
                                    <img src="{{asset('resturant_image/'.$localresturant_list->resturant_image)}}" alt="">
                                </div>
                                <div class="name">
                                    <h6>{{$localresturant_list->resturant_title}} - {{$localresturant_list->resturant_arabic_title}}</h6>
                                    <span>{{($localresturant_list->resturant_food_type == 1) ? 'Pure Veg' : 'Pure NonVeg'}}</span>
                                    <br>
                                    <i class="fa fa-star"></i><span style="margin-left: 10px;">{{$localresturant_list->resturant_ratting}}</span>
                                </div>
                                <div class="description">
                                    <ul>
                                        <li><label><b>Speciality :</b></label><span>&nbsp;{{$localresturant_list->resturant_ratting}}</span></li>
                                        <li><label><b>Area :</b></label><span>&nbsp;{{$localresturant_list->resturant_area}}</span></li>
                                        <li><label><b>Avg Cost pp :</b></label><span>&nbsp;{{$localresturant_list->resturant_avg_cost_pp}}</span></li>
                                    </ul>
                                    <p class="font-green">{{$localresturant_list->resturant_lunch_or_dinner}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
<div class="hidden-xs wave__footer">
    <div class="wave__ft1"></div>
</div>
@endsection
