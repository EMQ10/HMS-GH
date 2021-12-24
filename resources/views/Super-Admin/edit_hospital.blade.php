
@extends('layouts.master')

@section('title')
    <title>Edit Hospital - Health Care</title>
@endsection

@section('pageContent')
      

    <div class="row mt-5">
        <div class="col-md-10 offset-md-1">
            <h4 class="page-title">Edit Hospital</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 border offset-lg-3" style="border-radius:10px; font-size:17px;" >
            <form action="{{ route('superadmin.hospitals.update',$hospital) }}" method="POST" >
                @csrf
                @method('PUT')
                <div class="form-group col-md-12 mt-5">
                    <label>Hospital Name</label>
                    <input class="form-control" type="text" name="hospital_name" value="{{ $hospital->name }}">
                     <p style="color:red;" class="mb-3">
                        The word "Hospital" will be appended to the name field value. 
                        So please don't make it part of the hospital's name.
                     </p>

                    @error('hospital_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>
                </div>

                <div class="form-group col-md-12">
                    <label>Hospital Location</label>
                    <input class="form-control" type="text" name="hospital_location" value="{{ $hospital->location }}">
                
                  @error('hospital_location')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>
                </div>
                
                <div class="mb-4 text-center">
                    <input type='submit' class="btn btn-primary submit-btn" value="Edit Hospital">
                </div>
            </form>
        </div>
    </div>


            
@endsection

@section('extraScripts')
<script src="assets/js/jquery.slimscroll.js"></script>
@endsection







    


