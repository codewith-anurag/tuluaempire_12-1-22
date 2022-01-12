@extends('layouts.app')
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                Edit Package
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Package</li>
                </ol>
            </nav>
          </div>

          <div class="row">
            <div class="col-md-12  grid-margin stretch-card">
              <div class="card">
                <form class="forms-sample" method="POST" action="{{route('update-packages')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Edit Package</h4>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="package_title">Title <span class="required_class">*</span></label>
                                        <input type="text" name="package_title" class="form-control" id="package_title" value="{{$edit_packages->package_title}}">
                                        <input type="hidden" name="package_id" class="form-control" id="package_id" value="{{$edit_packages->id}}">
                                        @error('package_title')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group" style="">
                                        <label for="tour_overview[]">Tour Overview <span class="required_class">*</span></label>
                                        </br>
                                            <?php $tour_overview = explode(",",$edit_packages->tour_overview); ?>
                                            Hotel       <input type="checkbox" name="tour_overview[]" class="checkbox-inline" id="tour_overview" value="hotel" {{in_array('hotel',$tour_overview) ? 'checked'  : ''}} style="margin-left: 5px">
                                            Meal        <input type="checkbox" name="tour_overview[]" class="checkbox-inline" id="tour_overview" value="meal" {{in_array('meal',$tour_overview) ? 'checked'  : ''}} style="margin-left: 5px">
                                            Sightseeing <input type="checkbox" name="tour_overview[]" class="checkbox-inline" id="tour_overview" value="sightseeing" {{in_array('sightseeing',$tour_overview) ? 'checked'  : ''}} style="margin-left: 5px">
                                            Transport   <input type="checkbox" name="tour_overview[]" class="checkbox-inline" id="tour_overview" value="transport" {{in_array('transport',$tour_overview) ? 'checked'  : ''}} style="margin-left: 5px">
                                        @error('tour_overview[]')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="tour_highligts">Tour Highligts <span class="required_class">*</span></label>
                                        <textarea class="ckeditor form-control" name="tour_highligts" id="tour_highligts">{{$edit_packages->tour_highligts}}</textarea>
                                        @error('tour_highligts')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="inclusion">Inclusion <span class="required_class">*</span></label>
                                        <textarea class="ckeditor form-control" name="inclusion" id="inclusion">{{$edit_packages->inclusion}}</textarea>
                                        @error('inclusion')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exclusion">Exclusion  <span class="required_class">*</span></label>
                                        <textarea class="ckeditor form-control" name="exclusion">{{$edit_packages->exclusion}}</textarea>
                                        @error('exclusion')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{route('packages')}}" class="btn btn-light">Cancel</a>
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
