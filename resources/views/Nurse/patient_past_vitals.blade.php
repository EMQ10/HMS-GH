
@extends('layouts.master')

@section('title')
    <title>Patient Past Vitals - Health Care</title>
@endsection

@section('pageContent')

<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3  ">
            <h4 class="page-title">Past Vitals</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="{{ route('nurse.visit.create') }}" class="btn btn btn-success btn-rounded float-right"><i class="fa fa-plus"></i> Create Visit</a>
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

{{--     
    <form action="{{ route('receptionist.patients.index') }}" method="post">
        <div class="row filter-row">
            
            @csrf
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <label class="focus-label">Patient Registration Number</label>
                    <input type="text" name="patient_registration_number" class="form-control floating">
                </div>
            </div>
 
            <div class="col-sm-6 col-md-3">
                <input type='submit' class="btn btn-success submit-btn" value="Search">
            </div>
    
        </div>
    </form> --}}
          
    <div class="row text-center"> 
        <div class="col-md-4 offset-4 align-items-baseline d-flex"> 
            
            <h3 style="font-weight: bold;"> Patient: &nbsp;  &nbsp;  &nbsp; </h3>      
                <marquee behavior="slide" direction="left">
                    <span style="color:rgb(0, 0, 0); font-size:25px; font-weight: bold;"> 
                        {{ $patient->first_name }} {{ $patient->middle_name ?? "" }} {{ $patient->last_name .',' }} {{ $age.'Years Old' }}
                    </span>
                </marquee> 
        </div>
               
    </div>

    <div class="row">
        <div class="col-md-12">
            
            <div class="table-responsive">
                <table class="table table-border table-striped custom-table datatable mb-0">
                    <thead>
                        
                        
                        <tr class="text-center">
                            <th>Temperature</th>
                            <th>Height</th>
                            <th>Weight</th>
                            <th>BP. Systolic</th>
                            <th>BP. Diastolic</th>
                            <th>Heart Rate</th>
                            <th>Date and Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @forelse ($patient->visits as $visit)

                           

                            <tr class="text-center">
                                <td>{{ $visit->vital->temperature }}</td>
                                <td>{{ $visit->vital->height }} </td>
                                <td>{{ $visit->vital->weight }}</td>
                                <td>{{ $visit->vital->bp_systolic }}</td>
                                <td>{{ $visit->vital->bp_diastolic }}</td>
                                <td>{{ $visit->vital->heart_rate }}</td>
                                <td>{{ $visit->vital->created_at }}</td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div style="color:red; font-size:30px; font-weight:bold;" class="text-center">
                                        No Past vitals for this patient yet
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

   




















