@extends('front.layouts.app')
@section('content')
<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('front/img/page-banner-1.jpg')}})"></section>

<section id="service1" class="pt-120 gray-bg">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center">   {{$title}}   </h2>
        </div>
    </div>
</div>
</section>
<div class="hidden-xs wave__footer">
        <div class="wave__ft1"></div>
</div>
@endsection
