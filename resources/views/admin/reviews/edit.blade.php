@extends('layouts.app')
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
                <h3 class="page-title">
                    Edit Review
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashobard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Review</li>
                    </ol>
                </nav>
          </div>

          <div class="row">
                <div class="col-md-12  grid-margin stretch-card">
                <div class="card">
                    <form class="forms-sample" method="POST" action="{{route('update-reviews')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title">Edit Review</h4>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Name <span class="required_class">*</span></label>
                                        <input type="text" name="name" class="form-control" id="title" value="{{$edit_review->name}}">
                                        <input type="hidden" name="review_id" class="form-control" id="review_id" value="{{$edit_review->id}}"/>
                                        @error('name')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="d-block">Upload Image <span class="required_class">* (Upload Image minimum 128 X 128)</span></label>
                                        <label for="review_image" class="btn btn-info btn-rounded">Upload Image </label>
                                        <input type="file" name="review_image" class="image @error('image') is-invalid @enderror d-none" id="review_image" require>
                                        <input type="hidden" name="old_review_image" id="old_review_image" value="{{$edit_review->review_image}}"/>
                                        <img src="{{asset('review_image/').'/'.$edit_review->review_image}}" alt="review_image">
                                        @error('review_image')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Ratting <span class="required_class">*</span></label>
                                        <input type="number" name="ratting" class="form-control" id="ratting" value="{{$edit_review->ratting}}">
                                        @error('ratting')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Description <span class="required_class">*</span></label>
                                        <textarea class="ckeditor form-control" name="description">{{$edit_review->description}}</textarea>
                                        @error('description')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <a href="{{route('reviews')}}" class="btn btn-light">Cancel</a>
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
