@extends('front.layouts.app')
@section('content')
<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('front/img/page-banner-1.jpg')}})"> </section>
    @foreach ($ourservices as $ourservices_list)
        <section id="{{$ourservices_list->service_slug}}" class="pt-120 pb-50 gray-bg">
            <div class="container">
                <div class="events-area">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="events-left">
                                <h3> {{$ourservices_list->service_title}} </h3>
                                <img src="{{asset('ourservice_image/'.$ourservices_list->service_image)}}" alt="Event">                                
                                {!! $ourservices_list->description !!}
                            </div>
                        </div>

                    </div> 
                </div>
            </div>
        </section>
    @endforeach    
<div class="hidden-xs wave__footer">
    <div class="wave__ft1"></div>
</div>
@endsection
