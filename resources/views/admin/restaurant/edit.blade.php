@extends('layouts.app')
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                Edit Restaurant
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit  Edit Restaurant</li>
                </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-md-12  grid-margin stretch-card">
              <div class="card">
                <form class="forms-sample" method="POST" action="{{route('update-local-restaurants')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Edit  Edit Restaurant</h4>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Title <span class="required_class">*</span></label>
                                    <input type="text" name="resturant_title" class="form-control" id="resturant_title" value="{{$edit_restaurant->resturant_title}}">
                                    <input type="hidden" name="resturant_id" class="form-control" id="resturant_id" value="{{$edit_restaurant->id}}">
                                    @error('resturant_title')
                                        <div class="input_error">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Arabic Title <span class="required_class">*</span></label>
                                    <input type="text" name="resturant_arabic_title" class="form-control" id="resturant_arabic_title" value="{{$edit_restaurant->resturant_arabic_title}}">
                                    @error('resturant_arabic_title')
                                        <div class="input_error">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="d-block">Upload Image <span class="required_class">* (Upload Image minimum 6000 X 6000)</span></label>
                                    <label for="resturant_image" class="btn btn-info btn-rounded">Upload Image </label>
                                    <img src="{{asset('resturant_image/').'/'.$edit_restaurant->resturant_image}}" height="100" style="margin-left:200px"/>
                                    <input type="hidden" name="resturant_oldimage" class="form-control" id="resturant_oldimage" value="{{$edit_restaurant->resturant_image}}">
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
                                        <option value="1" {{($edit_restaurant->resturant_food_type == "1") ? "selected='selected'" : ''}}>Pure Veg </option>
                                        <option value="2" {{($edit_restaurant->resturant_food_type == "2") ? "selected='selected'" : ''}}>Pure NonVeg </option>
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
                                                <option value="{{$i}}" {{($edit_restaurant->resturant_ratting == $i) ? "selected='selected'" : ''}}>{{$i}}</option>
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
                                    <input type="text" name="resturant_speciality" class="form-control" id="resturant_speciality " value="{{$edit_restaurant->resturant_speciality}}">
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
                                    <input type="text" name="resturant_area" class="form-control" id="resturant_area" value="{{$edit_restaurant->resturant_area}}">
                                    @error('resturant_area')
                                        <div class="input_error">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Avg Cost pp <span class="required_class">*</span></label>
                                    <input  type="number" name="resturant_avg_cost_pp" min=1 class="form-control" id="resturant_avg_cost_pp" value="{{$edit_restaurant->resturant_avg_cost_pp}}"/>
                                    @error('resturant_avg_cost_pp')
                                        <div class="input_error">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Lunch/Dinner  <span class="required_class">*</span></label>
                                        </br>
                                        <?php $lunch_dinner = explode("/",$edit_restaurant->resturant_lunch_or_dinner)?>
                                        Lunch <input type="checkbox" name="resturant_lunch_or_dinner[]" class="checkbox" id="resturant_lunch_or_dinner[]" value="lunch" {{in_array("lunch",$lunch_dinner) ? "checked='checked'" : ''}}>
                                        Dinner <input type="checkbox" name="resturant_lunch_or_dinner[]" class="checkbox" id="resturant_lunch_or_dinner[]" value="dinner" {{in_array("dinner",$lunch_dinner) ? "checked='checked'" : ''}}>
                                    @error('resturant_lunch_or_dinner')
                                        <div class="input_error">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{route('local-restaurants')}}" class="btn btn-light">Cancel</a>
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
