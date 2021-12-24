@extends('layouts.master')

@section('title')
    <title>Edit Patient - Health Care</title>
@endsection

@section('pageContent')
      
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Edit Patient</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{ route('receptionist.patients.update',$patient) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-5 border p-3">

                    @if(session()->has('status'))
                         <div class="alert alert-danger"> {{ session()->get('status') }}  </div>
                    @endif

                      
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>First Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="first_name" value="{{ $patient->first_name }}">
                        </div>
                        @error('first_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror <br>
                    </div>
                    

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input class="form-control" type="text"  name="middle_name" value="{{ $patient->middle_name }}">
                        </div>
                    </div>
                    @error('middle_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>  

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Last Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text"  name="last_name" value="{{ $patient->last_name }}">
                        </div>
                        @error('last_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>
                  

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="select" name="gender" >
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
                            <label>Date of birth</label>
                            <input class="form-control" type="date" name="dob" value="{{ $patient->dob }}">
                        </div>
                        @error('dob')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Occupation <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="occupation"  value="{{ $patient->occupation }}">
                        </div>
                        @error('occupation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>
                   
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" value="{{ $patient->email }}">
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                         @enderror <br>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone </label>
                            <input class="form-control" type="text" name="phone"  value="{{ $patient->phone_number }}">
                        </div>
                        @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>
                    

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Emergency Phone number(Next of kin)</label>
                            <input class="form-control" type="text" name="emergency_phone_num"  value="{{ $patient->emergency_number }}">
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Address <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="address" value="{{ $patient->address }}">
                        </div>
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Registration Number <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="reg_number" value="{{ $patient->registration_number    }}" readonly>
                        </div>
                    </div>
                    

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nationality </label>
                            <input class="form-control" type="text" name="nationality" value="{{ $patient->nationality }}">
                        </div>
                        @error('nationality')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>
                    

                    
                    
    
                </div>
                
                <div class="m-t-20 text-center mb-4">
                    <button class="btn btn-success submit-btn">Update Patient</button>
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







    





















