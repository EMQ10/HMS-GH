@extends('layouts.master')

@section('title')
    <title>Add Patient - Health Care</title>
@endsection

@section('pageContent')
      
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Patient</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{ route('receptionist.patients.store') }}" method="POST">
                @csrf
                <div class="row mb-5 border p-3">

                    @if(session()->has('status'))
                         <div class="alert alert-danger"> {{ session()->get('status') }}  </div>
                    @endif

                      
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>First Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="first_name" value="{{ old('first_name') }}">
                        </div>
                        @error('first_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror <br>
                    </div>
                    

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input class="form-control" type="text"  name="middle_name" value="{{ old('middle_name') }}">
                        </div>
                    </div>
                    @error('middle_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>  

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Last Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text"  name="last_name" value="{{ old('last_name') }}">
                        </div>
                        @error('last_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>
                  

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Gender <span class="text-danger">*</span> </label>
                            <select class="select" name="gender" value="{{ old('gender') }}">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                        @error('gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>
                  

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Marital Status <span class="text-danger">*</span> </label>
                            <select class="select" name="marital_status">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                            </select>
                        </div>
                        @error('marital_status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>
                    

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Date of birth <span class="text-danger">*</span></label>
                            <input class="form-control" type="date" name="dob" value="{{ old('dob') }}">
                        </div>
                        @error('dob')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Occupation <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="occupation"  value="{{ old('occupation') }}">
                        </div>
                        @error('occupation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>
                   
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                         @enderror <br>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone </label>
                            <input class="form-control" type="text" name="phone"  value="{{ old('phone') }}">
                        </div>
                        @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>
                    

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Emergency Phone number(Next of kin)</label>
                            <input class="form-control" type="text" name="emergency_phone_num"  value="{{ old('emergency_phone_num') }}">
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Address <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="address" value="{{ old('address') }}">
                        </div>
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Registration Number <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="reg_number" value="{{ $code }}" readonly>
                        </div>
                    </div>
                    

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nationality <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="nationality" value="{{ old('nationality') }}">
                        </div>
                        @error('nationality')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>
                    

                    
                    
    
                </div>
                
                <div class="m-t-20 text-center mb-4">
                    <button class="btn btn-primary submit-btn">Create Patient</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection



{{-- @section('extraScripts')

<script>

// $( document ).ready(function() {
//         if( $('#role').val() == 2 || $('#role').val() == 3 ) {
//         alert('hello Doctor or Nurse selected');
//         document.getElementById("departmentDiv").show();
//     }else{
//         document.getElementById("departmentDiv").hide();
//     }
// });

$(document).ready(function(){
    $("#departmentDiv").hide();

    $("#role").change(function(){

        $(this).find("option:selected").each(function(){

            if($(this).val() == 2 || $(this).val() ==3 ){
                $("#departmentDiv").show();

            } else{
                $("#departmentDiv").hide();
            }
        });
    })
}); 
   
</script>

{{-- <script src="assets/js/jquery.slimscroll.js"></script> --}}
{{-- @endsection --}} 







    





















