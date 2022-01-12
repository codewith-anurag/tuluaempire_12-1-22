@extends('front.layouts.app')
@section('content')
<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('front/img/page-banner-1.jpg')}})"></section>
@foreach ($premium_activity as $premium_activity_list)
<section id="{{$premium_activity_list->premiumactivity_slug}}" class="pt-120 pb-50 gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="singel-course mt-30">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <div class="thum">
                                <div class="image">
                                    <img src="{{asset('premiumactivity_image/'.$premium_activity_list->image)}}" alt="Course">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="cont">
                                <a href="#">
                                    <h4>{{$premium_activity_list->premiumactivity_title}}</h4>
                                </a>
                                <div class="course-teacher">
                                    {!! $premium_activity_list->description !!}
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>                
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</section>
@endforeach

<div class="hidden-xs wave__footer">
    <div class="wave__ft1"></div>
</div>
@endsection
