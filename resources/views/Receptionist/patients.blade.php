
@extends('layouts.master')

@section('title')
    <title>Patients - Health Care</title>
@endsection

@section('pageContent')

<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Patients</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="{{ route('receptionist.patients.create') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Patient</a>
        </div>
    </div>

    @if ($message = session()->get('success'))
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-3">
                    <div class="alert alert-success text-center">
                        <h3>{{ $message }}</h3>
                    </div>
                </div>
            </div>
        </div>
    @endif

    
        <form action="{{ route('receptionist.patients.index') }}" method="post">
            <div class="row filter-row">
                
                @csrf
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <label class="focus-label">Patient Registration Number</label>
                        <input type="text" name="patient_registration_number" class="form-control floating">
                    </div>
                </div>
                {{-- <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <label class="focus-label">Patient first name</label>
                        <input type="text" name="patient_first_name" class="form-control floating">
                    </div>
                </div>
        
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <label class="focus-label">Patient Occupation</label>
                        <input type="text" name="patient_occupation" class="form-control floating">
                    </div>
                </div> --}}
                
                <div class="col-sm-6 col-md-3">
                    <input type='submit' class="btn btn-success submit-btn" value="Search">
                </div>
        
            </div>
     </form>
          
    
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-border table-striped custom-table datatable mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date of birth</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>ID Number</th>
                            <th>Email</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($patients as $patient)

                        @php
                            $gender = $patient->gender == "M" ? "Male" : "Female";
                        @endphp
                            <tr>
                                <td>{{ $patient->first_name }} {{ $patient->middle_name ?? "" }} {{ $patient->last_name }}</td>
                                <td>{{ $patient->dob }}</td>
                                <td>{{ $gender }}</td>
                                <td>{{ $patient->address }}</td>
                                <td>{{ $patient->phone_number }}</td>
                                <td>{{ $patient->registration_number }}</td>
                                <td>{{ $patient->email ?? "N/A" }}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('receptionist.patients.edit', $patient->registration_number ) }}"><i class="fa fa-magic"></i> Edit</a>
                                            <a class="dropdown-item" href="{{ url('receptionist/patient/'.$patient->registration_number ) }}"><i class="fa fa-id-card"></i> Generate card</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div style="color:red; font-size:30px; font-weight:bold;" class="text-center">
                                        NO patients registered yet
                                    </div>
                                </td>
                            </tr>
                            
                        @endforelse
                        
                        
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
    {{-- {{ dd($patients->links())}} --}}
</div>
      
@endsection

   




















