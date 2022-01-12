@extends('layouts.app')
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
                <h3 class="page-title">
                    Edit Our Services
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashobard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Our Services</li>
                    </ol>
                </nav>
          </div>

          <div class="row">
                <div class="col-md-12  grid-margin stretch-card">
                <div class="card">
                    <form class="forms-sample" method="POST" action="{{route('update-ourservices')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title">Edit Our Services</h4>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="service_title">Title <span class="required_class">*</span></label>
                                        <input type="text" name="service_title" class="form-control" id="service_title" value="{{$edit_service->service_title}}">
                                        <input type="hidden" name="service_id" class="form-control" id="service_id" value="{{$edit_service->id}}">
                                        @error('service_title')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="d-block">Upload Image <span class="required_class">* (Upload Image minimum 1800 X 800)</span></label>
                                        <label for="service_image" class="btn btn-info btn-rounded">Upload Image </label>
                                        <input type="file" name="service_image" class="image @error('service_image') is-invalid @enderror d-none" id="service_image" require>
                                        <input type="hidden" name="old_serviceimage" class="form-control" id="old_serviceimage" value="{{$edit_service->service_image}}">
                                        @error('service_image')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <img src="{{asset('ourservice_image/').'/'.$edit_service->service_image}}" alt="service image" height="100">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="description">Description <span class="required_class">*</span></label>
                                        <textarea class="ckeditor form-control" name="description">{{$edit_service->description}}</textarea>
                                        @error('description')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <a href="{{route('ourservices')}}" class="btn btn-light">Cancel</a>
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
