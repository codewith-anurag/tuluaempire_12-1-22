@extends('layouts.app')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      Profile
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="text-center pb-4">
                        <div>
                            <h3>{{Auth::user()->name}}</h3>
                        </div>
                    </div>
                </div>
            </div>
          <div class="row">
            <div class="col-lg-12">
                <div class="border-bottom text-center pb-4">
                    <img src="{{asset('images/admin/logo.png')}}" class="img-lg rounded-circle mb-3" alt="logo"/>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
