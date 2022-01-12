@extends('layouts.app')
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
                <h3 class="page-title">
                    Edit Category
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashobard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                    </ol>
                </nav>
          </div>

            <div class="row">
                <div class="col-md-12  grid-margin stretch-card">
                <div class="card">
                    <form class="forms-sample" method="POST" action="{{route('update-aboutdubai-category')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title">Edit Category</h4>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Title <span class="required_class">*</span></label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{$edit_category->title}}">
                                        <input type="hidden" name="category_id"  id="category_id" value="{{$edit_category->id}}">
                                        @error('title')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <img src='{{asset("category_image/".$edit_category->category_image)}}' alt=""  height="100">
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="d-block">Upload Image <span class="required_class">* (Upload Image minimum 360 X 251)</span></label>
                                        <label for="image" class="btn btn-info btn-rounded">Upload Image </label>
                                        <input type="file" name="image" class="image @error('image') is-invalid @enderror d-none" id="image" require>
                                        <input type="hidden" name="old_image"  id="old_image" value="{{$edit_category->category_image}}">
                                        @error('image')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <a href="{{route('about-dubai-category')}}" class="btn btn-light">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</div>
@endsection
