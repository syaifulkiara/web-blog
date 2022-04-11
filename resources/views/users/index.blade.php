@extends('layouts.back')

@section('subtitle')
Profile
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-4">
            <div class="border-bottom text-center pb-4">
              <img src="{{asset(Auth::user()->avatar)}}" alt="profile" class="img-lg rounded-circle mb-3"/>
              <div class="mb-3">
                <h3>{{Auth::user()->name}}</h3>
              </div>
            </div>
            <div class="py-4">
              <p class="clearfix">
                <span class="float-left">
                  Status
                </span>
                <span class="float-right text-muted">
                  Active
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Phone
                </span>
                <span class="float-right text-muted">
                  006 3435 22
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Mail
                </span>
                <span class="float-right text-muted">
                  {{Auth::user()->email}}
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Facebook
                </span>
                <span class="float-right text-muted">
                  <a href="#">{{Auth::user()->name}}</a>
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Twitter
                </span>
                <span class="float-right text-muted">
                  <a href="#">{{Auth::user()->name}}</a>
                </span>
              </p>
            </div>
            <button class="btn btn-primary btn-block mb-2">Edit</button>
          </div>
          <div class="col-lg-8">
            <div class="mt-4 py-2 border-top border-bottom">
              <ul class="nav profile-navbar">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="ti-user"></i>
                    Info
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="#">
                    <i class="ti-receipt"></i>
                    Feed
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="ti-calendar"></i>
                    Agenda
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="ti-clip"></i>
                    Resume
                  </a>
                </li>
              </ul>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection