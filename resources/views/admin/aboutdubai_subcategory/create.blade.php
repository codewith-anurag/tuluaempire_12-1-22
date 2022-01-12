@extends('layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="page-header">
            <h3 class="page-title">
                Create Sub Category
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Sub Category</li>
                </ol>
            </nav>
        </div>
        <form class="forms-sample" method="POST" action="{{route('store-aboutdubai-subcategory')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12  grid-margin stretch-card">
                <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Create Sub Category</h4>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Category <span class="required_class">* </span></label>
                                                <select class="form-control" name="category" id="category_id">
                                                    <option selected="selected" value=""> Select Category </option>
                                                    @if(!empty($category))
                                                        @foreach($category as $category_value)
                                                            <option value="{{$category_value->id}}"> {{$category_value->title}} </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            @error('category')
                                                <div class="input_error">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Template <span class="required_class">*</span></label>
                                                    <select class="form-control" name="template" id="template">
                                                        <option selected="selected" value=""> Select Template </option>
                                                            <option value="simple">Template 1</option>
                                                            <option value="localresturant">Template 2</option>
                                                    </select>
                                                @error('template')
                                                    <div class="input_error">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row simpale_category hide_show_localresturant">
                <div class="col-md-12  grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Create Simple Sub Category</h4>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Title <span class="required_class">*</span></label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}">
                                        @error('title')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="d-block">Upload Image <span class="required_class">* (Upload Image minimum 1800 X 800)</span></label>
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
                                        <label for="exampleInputUsername1">Description <span class="required_class">*</span></label>
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
                            <a href="{{route('about-dubai-category')}}" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row localresturants hide_show_localresturant">
                <div class="col-md-12  grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Create Local Resturant</h4>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Title <span class="required_class">*</span></label>
                                            <input type="text" name="resturant_title" class="form-control" id="resturant_title" value="{{old('title')}}">
                                            @error('resturant_title')
                                                <div class="input_error">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Arabic Title <span class="required_class">*</span></label>
                                            <input type="text" name="resturant_arabic_title" class="form-control" id="resturant_arabic_title" value="{{old('title')}}">
                                            @error('resturant_arabic_title')
                                                <div class="input_error">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="d-block">Upload Image <span class="required_class">* (Upload Image minimum 6000 X 6000)</span></label>
                                            <label for="resturant_image" class="btn btn-info btn-rounded">Upload Image </label>
                                            <input type="file" name="resturant_image" class="image @error('resturant_image') is-invalid @enderror d-none" id="resturant_image" >
                                            @error('resturant_image')
                                                <div class="input_error">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Food Type <span class="required_class">*</span></label>
                                            <select class="form-control" name="resturant_food_type" id="resturant_food_type">
                                                <option value="">Select Food Type </option>
                                                <option value="1">Pure Veg </option>
                                                <option value="2">Pure NonVeg </option>
                                            </select>
                                            @error('resturant_food_type')
                                                <div class="input_error">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Ratting <span class="required_class">*</span></label>
                                            <select class="form-control" name="resturant_ratting" id="resturant_ratting">
                                                <option value="">Select Ratting </option>
                                                    @for ($i=1; $i<6; $i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor

                                            </select>
                                            @error('resturant_ratting')
                                                <div class="input_error">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Speciality  <span class="required_class">*</span></label>
                                            <input type="text" name="resturant_speciality" class="form-control" id="resturant_speciality " value="{{old('resturant_speciality')}}">
                                            @error('resturant_speciality')
                                                <div class="input_error">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Area <span class="required_class">*</span></label>
                                            <input type="text" name="resturant_area" class="form-control" id="resturant_area" value="{{old('resturant_area')}}">
                                            @error('resturant_area')
                                                <div class="input_error">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Avg Cost pp <span class="required_class">*</span></label>
                                            <input  type="number" name="resturant_avg_cost_pp" min=1 class="form-control" id="resturant_avg_cost_pp" value="{{old('resturant_avg_cost_pp')}}"/>
                                            @error('resturant_avg_cost_pp')
                                                <div class="input_error">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Lunch/Dinner  <span class="required_class">*</span></label>
                                            <div class="form-check">
                                                <label for="resturant_lunch" class="form-check-label">  Lunch <input type="checkbox" name="resturant_lunch_or_dinner[]" class="form-check-input" id="resturant_lunch_or_dinner" value="lunch"></label>
                                                @error('resturant_lunch_or_dinner')
                                                    <div class="input_error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-check">
                                                <label for="resturant_dinner" class="form-check-label">  Dinner <input type="checkbox" name="resturant_lunch_or_dinner[]" class="form-check-input" id="resturant_lunch_or_dinner" value="dinner"></label>
                                                @error('resturant_lunch_or_dinner')
                                                    <div class="input_error">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{route('about-dubai-subcategory')}}" class="btn btn-light">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });

        $("#template").on("change",function() {
            var template = $("#template").val();
            console.log(template);
            if(template == "localresturant"){
                $(".localresturants").removeClass("hide_show_localresturant");
                $(".simpale_category").addClass("hide_show_localresturant");
            }else{
                $(".simpale_category").removeClass("hide_show_localresturant");
                $(".localresturants").addClass("hide_show_localresturant");

            }

        })
    </script>
@endsection
