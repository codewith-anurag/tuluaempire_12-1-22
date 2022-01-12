@extends('layouts.app')
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                Edit Sub Category
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Sub Category</li>
                </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-md-12  grid-margin stretch-card">
              <div class="card">
                <form class="forms-sample" method="POST" action="{{route('update-aboutdubai-subcategory')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Edit Sub Category</h4>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Category <span class="required_class">*</span></label>
                                            <select class="form-control" name="category" id="category_id">
                                                <option selected="selected" value=""> Select Category </option>
                                                @if(!empty($category))
                                                    @foreach($category as $category_value)
                                                        @if($edit_subcategory->category_id == $category_value->id)
                                                            <option value="{{$category_value->id}}" selected="selected"> {{$category_value->title}} </option>
                                                        @else
                                                            <option value="{{$category_value->id}}"> {{$category_value->title}} </option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                            <input type="hidden" name="subcategory_id"  id="subcategory_id" value="{{$edit_subcategory->id}}">
                                        @error('category')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Title <span class="required_class">*</span></label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{$edit_subcategory->title}}">
                                        @error('title')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Images <span class="required_class">* (Upload Image minimum 1800 X 800)</span></label>
                                    <input type="file" name="image" class="image @error('image') is-invalid @enderror" id="image" require>
                                    <input type="hidden" name="old_image"  id="old_image" value="{{$edit_subcategory->subcategory_image}}">
                                        @error('image')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <img src="{{asset("subcategory_image/".$edit_subcategory->subcategory_image)}}" height="100"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Description <span class="required_class">*</span></label>
                                    <textarea class="ckeditor form-control" name="description">{{$edit_subcategory->description}}</textarea>
                                    @error('description')
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
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
    @endsection
