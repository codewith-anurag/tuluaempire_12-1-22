@extends('layouts.app')
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                Create Sub Package
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('packages')}}">Packages</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('subpackages',request()->segment(count(request()->segments())))}}">Sub Packages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Sub Package</li>
                </ol>
            </nav>
          </div>

          <div class="row">
            <div class="col-md-12  grid-margin stretch-card">
              <div class="card">
                <form class="forms-sample" method="POST" action="{{route('store-subpackages')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Create Sub Package</h4>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="package_title">Title <span class="required_class">*</span></label>
                                        <input type="text" name="subpackage_title" class="form-control" id="subpackage_title" value="{{old('subpackage_title')}}">
                                        <input type="hidden" name="package_id" value="{{$package_id}}" class="form-control">
                                        @error('subpackage_title')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="d-block"> Upload Image (Create Slider) <span class="required_class">* (Upload Image minimum 378 X 523)</span></label>
                                        <label for="imageFile" class="btn btn-info btn-rounded">Upload Image </label>
                                        <input type="file" name="imageFile[]" multiple class="image @error('imageFile') is-invalid @enderror d-none" id="imageFile" require>
                                        @error('imageFile')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="description">Description <span class="required_class">*</span></label>
                                        <textarea class="ckeditor form-control" name="description" id="description"></textarea>
                                        @error('description')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror
                                    </div>
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
