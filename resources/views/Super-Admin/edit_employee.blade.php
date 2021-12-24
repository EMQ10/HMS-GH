@extends('layouts.master')

@section('title')
    <title>Edit Employee - Health Care</title>
@endsection

@section('pageContent')
      
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Edit Employee</h4>
        </div>
    </div>
  
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{ route('superadmin.employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="row mb-5 border p-3">

                    @if(session()->has('status'))
                         <div class="alert alert-danger"> {{ session()->get('status') }}  </div>
                    @endif

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Username <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="username" value="{{ $employee->user->username }}">
                        </div>
                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input class="form-control" type="email" name="email" value="{{ $employee->user->email }}">
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>
                    

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password">
                        </div>
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>

                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input class="form-control" type="password" name="password_confirmation">
                        </div>
                        @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>
                    </div>
                    

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Role</label>
                            <select class="select" name="role" id="role">
                                <option value="">Select Role</option>
                                <option value="1">Admin</option>
                                <option value="2">Doctor</option>
                                <option value="3">Nurse</option>
                                <option value="4">Receptionist</option>
                            </select>
                        </div>
                        @error('role')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>
                    </div> 
                    

                    <div class="col-sm-6" id="departmentDiv">
                        <div class="form-group">
                            <label>Department</label>
                            <select class="select" name="department" >
                                <option value="" >Choose Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        @error('department')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>
                    </div> 
                   
                </div>
                
                <div class="row  border p-3" >
                    <br>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>First Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="first_name" value="{{ $employee->first_name }}">
                        </div>
                        @error('first_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>
                    </div>
                   

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input class="form-control" type="text"  name="middle_name" value="{{ $employee->middle_name }}">
                        </div>
                        @error('middle_name') 
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>
                    </div>
                    

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Last Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text"  name="last_name" value="{{ $employee->last_name }}">
                        </div>
                        @error('last_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>
                    </div>
                    

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Gender <span class="text-danger">*</span> </label>
                            <select class="select" name="gender" value="{{ $employee->gender }}">
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
                            <label>Educational Level <span class="text-danger">*</span></label>
                            <input class="form-control" type="text"  name="educational_level" value="{{ $employee->educational_level }}">
                        </div>
                        @error('educational_level')
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
                            <input class="form-control" type="date" name="dob" value="{{ $employee->dob }}">
                        </div>
                        @error('dob')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>
                    </div>
                   

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="phone"  value="{{ $employee->phone }}">
                        </div>
                        @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>
                    </div>
                    

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Emergency Phone number(Next of kin)</label>
                            <input class="form-control" type="text" name="emergency_phone_num"  value="{{ $employee->emergency_number }}">
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
                            <label>Nationality <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="nationality" value="{{ $employee->nationality }}">
                        </div>
                        @error('nationality')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>
                    </div>
                    

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Image <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" name="image">
                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>
                    </div>
                    
                   
                    <div class="form-group col-sm-6">
                        <label class="display-block">Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="employee_active" value="1" checked>
                            <label class="form-check-label" for="employee_active">
                            Active
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="employee_inactive" value="0">
                            <label class="form-check-label" for="employee_inactive">
                            Inactive
                            </label>
                        </div>
                        @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>
                    </div>
                    
                    
                </div>
                
                <div class="m-t-20 text-center mb-4">
                    <button class="btn btn-primary submit-btn">Update Employee</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection



@section('extraScripts')

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
@endsection







    


