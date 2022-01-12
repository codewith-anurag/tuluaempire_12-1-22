@extends('layouts.app')
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                Edit Sub Package Slider
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('packages')}}">Packages</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('subpackages',request()->segment(count(request()->segments())))}}">Sub Packages</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('subpackages-slider',request()->segment(count(request()->segments())))}}">Sub Packages Slider</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Sub Package Slider</li>
                </ol>
            </nav>
          </div>

          <div class="row">
            <div class="col-md-12  grid-margin stretch-card">
              <div class="card">
                <form class="forms-sample" method="POST" action="{{route('update-subpackages-sldier')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Edit Sub Package Slider</h4>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="d-block">Upload Image <span class="required_class">* (Upload Image minimum 378 X 523) </span></label>
                                        <label for="imageFile" class="btn btn-info btn-rounded">Upload Image </label>
                                        <input type="file" name="imageFile" multiple class="image @error('imageFile') is-invalid @enderror d-none" id="imageFile" require>
                                        <input type="hidden" name="old_image" value="{{$edit_subpackages_slider->image}}" class="form-control">
                                        <input type="hidden" name="subpackage_slider_id" value="{{$edit_subpackages_slider->id}}" class="form-control">
                                        <input type="hidden" name="subpackage_id" value="{{$edit_subpackages_slider->subpackage_id}}" class="form-control">
                                        @error('imageFile')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="d-block">Sub Package Slider Image </label>
                                    <img src="{{asset('subpackage_slider_image/').'/'.$edit_subpackages_slider->image}}">

                                </div>
                            </div>

                    </div>
                    <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{route('subpackages',request()->segment(count(request()->segments())))}}" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
        <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.ckeditor').ckeditor();
            });
        </script>
    @endsection
