@extends('layouts.master')

@section('title')
    <title>Patient Card - Health Care</title>
@endsection

@section('extraHeadStuff')
  <style>
    
    /* user<?php include(public_path().'/css/app.css');?> */

body {
    background-color: #f9f9fa
}

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
    margin-bottom: 30px
}

.m-r-0 {
    margin-right: 0px
}

.m-l-0 {
    margin-left: 0px
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px
}

.bg-c-lite-green {
    background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263)
}

.user-profile {
    padding: 20px 0
}

.card-block {
    padding: 1.25rem
}

.m-b-25 {
    margin-bottom: 25px
}

.img-radius {
    border-radius: 5px
}

h6 {
    font-size: 14px
}

.card .card-block p {
    line-height: 25px
}

@media only screen and (min-width: 1400px) {
    p {
        font-size: 14px
    }
}

.card-block {
    padding: 1.25rem
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.m-b-20 {
    margin-bottom: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.card .card-block p {
    line-height: 25px
}

.m-b-10 {
    margin-bottom: 10px
}

.text-muted {
    color: #247acf !important
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.f-w-600 {
    font-weight: 600
}

.m-b-20 {
    margin-bottom: 20px
}

.m-t-40 {
    margin-top: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.m-b-10 {
    margin-bottom: 10px
}

.m-t-40 {
    margin-top: 20px
}

.user-card-full .social-link li {
    display: inline-block
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out
}
  </style>
@endsection

@section('pageContent')
      
<div class="page-content page-container" id="page-content">
  <div class="padding">
      <div class="row container d-flex justify-content-center">
          <div class="col-xl-6 col-md-12">
              <div class="card user-card-full">
                  <div class="row m-l-0 m-r-0">
                    @php
                    $gender = $patient->gender == "M" ? "Male" : "Female";
                    
                        @endphp

                      <div class="col-sm-4 user-profile" style="background-color:white; ">
                          <div class="card-block text-center">
                              <h6 class="f-w-600" style="font-size:20px;">{{ $hospitalName }}</h6>
                              <p style="font-size:19px; color:rgb(44, 201, 109);" >Hospital</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                              <div class="mt-4"> <img style="height:150px;" src="{{ asset('storage/img/logo-dark.png') }}" class="img-radius" alt=""> </div>

                            </div>
                      </div>
                      <div class="col-sm-8" >
                                                
                          <div class="card-block" style="height:335px; width:350px; background-image: url({{ url('storage/img/medical_card_bg.jpg') }})">
                              <h6 class="mb-3 p-b-5 b-b-default f-w-600 text-center text-white"  style="font-size:18px;">Health Care</h6>
                              <div class="row">
                                <div class="col-sm-12">
                                    <p class="m-b-10 f-w-600 text-white">ID Number:
                                        <span class="f-w-1200 text-bold p-1 rounded text-center bg-light" style="color:rgb(2, 1, 1); font-size:25px;">{{ $patient->registration_number }}</span>
                                    </p>
                                    
                                </div> 
                              </div>
                              <div class="row">
                                  <div class="col-sm-12">
                                    <p class="m-b-10 f-w-600 pl-1  bg-white rounded" style="font-size:19px; color:rgb(2, 1, 1);">First Name: &nbsp;
                                        <span class="f-w-400" style="font-size:19px; color:rgb(2, 1, 1);">{{ $patient->first_name }}</span>
                                    </p> 
                                  </div>

                                  @if ($patient->middle_name)
                                  <div class="col-sm-12">
                                    <p class="m-b-10 f-w-600 pl-1  bg-white rounded" style="font-size:19px; color:rgb(2, 1, 1);">Middle Name: &nbsp;
                                        <span class="f-w-400" style="font-size:19px; color:rgb(2, 1, 1);">{{ $patient->middle_name }}</span>
                                    </p> 
                                  </div>
                                  @endif
                                  <div class="col-sm-12">
                                    <p class="m-b-10 f-w-600 pl-1  bg-white rounded" style="font-size:19px; color:rgb(2, 1, 1);">Last Name: &nbsp;
                                        <span class="f-w-400" style="font-size:19px; color:rgb(2, 1, 1);">{{ $patient->last_name }}</span>
                                    </p> 
                                  </div>

                                  {{-- <div class="col-sm-12">
                                    <p class="m-b-10 f-w-600 text-white" style="font-size:14px;">Last Name</p>
                                    <h6 class="f-w-400"  style="color:rgb(2, 1, 1); font-size:19px;" >{{ $patient->last_name}}</h6>
                                  </div> --}}
                                  <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600 pl-1  bg-white rounded" style="font-size:14px; color:rgb(2, 1, 1);">Date of birth: &nbsp;
                                        <span class="f-w-400" style="font-size:19px; color:rgb(2, 1, 1);">{{ $patient->dob }}</span>
                                    </p> 
                                  </div>
                                  <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600 pl-1  bg-white rounded" style="font-size:14px; color:rgb(2, 1, 1);">Gender: &nbsp;
                                        <span class="f-w-400" style="font-size:19px; color:rgb(2, 1, 1);">{{ $gender }}</span>
                                    </p> 
                                  </div>
                                  
                                  <div class="col-sm-12" style="position: fixed; padding-top:5.5cm;">
                                    <p class="m-b-10 f-w-600 pl-1  rounded" style="font-size:14px; color:rgb(2, 1, 1);">Date of Issue : &nbsp;
                                        <span class="f-w-400" style="color:black;">{{ \Carbon\Carbon::parse( $current )->toDayDateTimeString() }}</span>
                                    </p> 
                                  </div>
                              </div>  
                              
                              
                             
                          </div>
                          
                          
                      </div>
                      
                  </div>
                  
              </div>
              <div class="col-sm-3">
                <button class="btn btn-success" onclick="window.print();">Print Card</button>
              </div>
          </div>
          
      </div>
      
  </div>
</div>
           
                                  
@endsection




