@extends('layouts.app')
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> General Settings </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">General Settings</li>
                </ol>
            </nav>
          </div>

          <div class="row">
              <div class="col-lg-6">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
              </div>
            <div class="col-md-12  grid-margin stretch-card">
              <div class="card">
                <form class="forms-sample" method="POST" action="{{route('store_generalsetting')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">General Settings</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Welcome Message</label>
                                        <input type="text"   name="welcome_msg" class="form-control" id="welcome_msg" value="{{$setings_data->welcome_msg}}">
                                        <input type="hidden" name="settingid" id="id" value="{{$setings_data->id}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Whats App Number</label>
                                        <input type="text"  minlength="1" max="14" maxlength="14" name="whatsapp_number" class="form-control" id="whatsapp_number" value="{{$setings_data->whatsapp_number}}">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Phone Number</label>
                                        <input type="text"  minlength="1" max="14" maxlength="14" name="phone" class="form-control" id="phone" value="{{$setings_data->phone}}">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Mobile Number</label>
                                        <input type="text"  minlength="1" max="14" maxlength="14" name="mobile" class="form-control" id="mobile" value="{{$setings_data->mobile}}">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Email</label>
                                        <input type="email"   name="email" class="form-control" id="email" value="{{$setings_data->email}}">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Facebook Url</label>
                                        <input type="text"   name="facebook" class="form-control" id="facebook" value="{{$setings_data->facebook}}">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Twitter Url</label>
                                        <input type="text"   name="twitter" class="form-control" id="twitter" value="{{$setings_data->twitter}}">

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">LinkdIn Url</label>
                                        <input type="text"   name="linkdin" class="form-control" id="linkdin" value="{{$setings_data->linkdin}}">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Instagram Url</label>
                                        <input type="text"   name="instagram" class="form-control" id="instagram" value="{{$setings_data->instagram}}">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Youtube Url</label>
                                        <input type="text"  name="youtube" class="form-control" id="youtube" value="{{$setings_data->youtube}}">

                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
    @endsection
