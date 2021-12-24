
@extends('layouts.master')

@section('title')
    <title>Visits - Health Care</title>
@endsection

@section('pageContent')

<div class="content">
    <div class="row mb-3">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Visits</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="{{ route('nurse.visit.create') }}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Create Visit</a>
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
          
    
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-border table-striped custom-table datatable mb-0">
                    <thead>
                        <tr class="text-center">
                            <th>Visit Created on</th>
                            <th>Patient ID Number</th>
                            <th>Patient Name</th>
                            <th>Visit Type</th>
                            <th>Created by Nurse </th>
                            {{-- <th>Patient's Past Vitals</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($visits as $visit)
                            <tr class="text-center">
                                <td>{{ $visit->created_at }}</td>
                                <td>{{ $visit->patient->registration_number }}</td>
                                <td>{{ $visit->patient->first_name }} {{ $visit->patient->middle_name ?? "" }} {{ $visit->patient->last_name }}</td>
                                <td>{{ $visit->visitType->type }}</td>
                                <td>{{ $visit->nurse->first_name }} {{ $visit->nurse->middle_name ?? "" }} {{ $visit->nurse->last_name }}</td>
                                
                                <td style="font-size:19px;">
                                    <a class="btn btn-success" href="{{route('doctor.consultation.initiate', $visit )}}">
                                        Take up
                                    </a>
                                </td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div style="color:rgb(68, 235, 124); font-size:30px; font-weight:bold;" class="text-center">
                                        No patients awaiting
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

   




















