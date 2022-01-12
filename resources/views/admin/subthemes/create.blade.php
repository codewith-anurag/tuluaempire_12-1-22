@extends('layouts.app')

@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                Create Sub Themes
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('subthemes',collect(request()->segments())->last())}}">Sub Theme</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Sub Themes</li>
                </ol>
            </nav>
          </div>

          <div class="row">
            <div class="col-md-12  grid-margin stretch-card">
              <div class="card">
                <form class="forms-sample" method="POST" action="{{route('store-subthemes')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Create Sub Themes</h4>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}">
                                        <input type="hidden" name="theme_id" class="form-control" value="{{collect(request()->segments())->last()}}"/>
                                        @error('title')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="d-block">Upload Image <span class="required_class">* (Upload Image minimum 782 X 522)</span></label>
                                        <label for="image" class="btn btn-info btn-rounded">Upload Image </label>
                                        <input type="file" name="image" class="image @error('image') is-invalid @enderror d-none" id="image" require>

                                        @error('image')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="description">Description <span class="required_class">*</span></label>
                                        <textarea class="ckeditor form-control" name="description"></textarea>
                                        @error('description')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{route('subthemes',collect(request()->segments())->last())}}" class="btn btn-light">Cancel</a>
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
