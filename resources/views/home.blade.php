@extends('layouts.app')
@section('content')
<div class="loader" style="position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;background: url({{asset('/images/admin/loader.gif')}}) 50% 50% no-repeat #f9f9f9;
opacity: 1;"></div>
        <div class="main-panel">
            <div class="content-wrapper">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{Session::get('success')}}</strong>
                    </div>

                @endif
                {{ Session::forget('success')}}

                <div class="page-header">
                    <h3 class="page-title">
                        Dashboard
                    </h3>
                </div>
                <div class="row grid-margin">
                    <div class="col-12">
                        <div class="card card-statistics">
                            <div class="card-body">
                                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-lg fa fa-images mr-2"></i>
                                            <a href="{{route('slider')}}" class="dashboard_text">Sliders</a>
                                        </p>
                                        <h2>{{$total_slider}}</h2>
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                                             <a href="{{route('about-dubai-category')}}" class="dashboard_text">Category</a>
                                        </p>
                                        <h2>{{$total_category}}</h2>
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                                            <a href="{{route('about-dubai-subcategory')}}" class="dashboard_text">Sub Category</a>
                                        </p>
                                        <h2>{{$total_subcategory}}</h2>
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fas fa-check-circle mr-2"></i>
                                            <a href="{{route('local-restaurants')}}" class="dashboard_text">Restauransts</a>
                                        </p>
                                        <h2>{{$total_restaurant}}</h2>
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fas fa-chart-line mr-2"></i>
                                            <a href="{{route('reviews')}}" class="dashboard_text">Reviews</a>
                                        </p>
                                        <h2>{{$total_review}}</h2>
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fa fa-wrench menu-icon mr-2"></i>
                                            <a href="{{route('ourservices')}}" class="dashboard_text">Our Service</a>
                                        </p>
                                        <h2>{{$total_service}}</h2>
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fa fa-box menu-icon mr-2"></i>
                                            <a href="{{route('packages')}}" class="dashboard_text"> Packges</a>
                                        </p>
                                        <h2>{{$total_package}}</h2>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

