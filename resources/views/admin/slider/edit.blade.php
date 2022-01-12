@extends('layouts.app')
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                Edit Slider
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Slider</li>
                </ol>
            </nav>
          </div>

          <div class="row">
            <div class="col-md-12  grid-margin stretch-card">
              <div class="card">
                <form class="forms-sample" method="POST" action="{{route('update-slider')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Edit Slider</h4>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Title </label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{$edit_slider->title}}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <img src='{{asset("slider_images/".$edit_slider->slider_image)}}' alt=""  height="100">
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="d-block">Upload Image <span class="required_class">* (Upload Image minimum 1800 X 1006)</span></label>
                                    <label for="image" class="btn btn-info btn-rounded">Upload Image </label>
                                    <input type="file"  name="image" class="image @error('image') is-invalid @enderror d-none" id="image" require>
                                    <input type="hidden" name="old_image"  id="image" value="{{$edit_slider->slider_image}}">
                                    <input type="hidden" name="slider_id"  id="slider_id" value="{{$edit_slider->id}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{route('slider')}}" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
    @endsection
