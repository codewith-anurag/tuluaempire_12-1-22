@extends('layouts.app')

@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> Contact Settings </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('contactssetting')}}">Contact Setting </a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Settings</li>
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
                <form class="forms-sample" method="POST" action="{{route('update_contactsetting')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Contact Settings</h4>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Branch Name</label>
                                        <input type="text"   name="barnch_name" class="form-control" id="barnch_name" value="{{$edit_contact_setting->barnch_name}}">
                                        <input type="hidden"   name="id" class="form-control" id="id" value="{{$edit_contact_setting->id}}">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Address</label>
                                        <textarea name="address" id="address" cols="5" rows="5" class="form-control">{{$edit_contact_setting->address}}</textarea>

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Phone</label>
                                        <input type="text"   maxlength="12" name="phone1" class="form-control" id="phone1" value="{{$edit_contact_setting->phone1}}">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Secondory Phone</label>
                                        <input type="text"   name="phone2" class="form-control" id="phone2"  value="{{$edit_contact_setting->phone2}}">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Email</label>
                                        <input type="email"   name="email" class="form-control" id="email" value="{{$edit_contact_setting->email}}">

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
