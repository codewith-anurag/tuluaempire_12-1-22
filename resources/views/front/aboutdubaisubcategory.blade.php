@extends('front.layouts.app')
@section('content')
<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('front/img/page-banner-1.jpg')}})"></section>

<section id="service1" class="pt-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>   {{$category_title}}   </h2>
            </div>
        </div>
    </div>
</section>

@foreach ($subcategory as $subcategory_list)
    <section id="service1" class="pt-50 pb-50 gray-bg">
        <div class="container">
            <div class="events-area">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="events-left">
                            <h3> {{$subcategory_list->title}} </h3>
                            <img src="{{asset('subcategory_image/'.$subcategory_list->subcategory_image)}}" alt="Event">
                                {!! $subcategory_list->description !!}                           
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
