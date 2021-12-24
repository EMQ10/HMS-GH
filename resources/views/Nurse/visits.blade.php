
@extends('layouts.master')

@section('title')
    <title>Visits - Health Care</title>
@endsection

@section('pageContent')

<div class="content">
    <div class="row">
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
                            <th>Visit Date & Time</th>
                            <th>Patient Name</th>
                            <th>Visit Type</th>
                            <th>Payment Type</th>
                            <th>Receipt Number</th>
                            <th>Assigned Doctor</th>
                            <th>Take vitals</th>
                            <th>Patient's Past Vitals</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($visits as $visit)
                           
                            <tr class="text-center">
                                <td>{{ $visit->created_at }}</td>
                                <td>{{ $visit->patient->first_name }} {{ $visit->patient->middle_name ?? "" }} {{ $visit->patient->last_name }}</td>
                                <td>{{ $visit->visitType->type }}</td>
                                <td>{{ $visit->paymentType->name}}</td>
                                <td>{{ $visit->receipt_number }}</td>
                                <td>Dr. {{ $visit->doctor->first_name }} {{ $visit->doctor->middle_name ?? "" }} {{ $visit->doctor->last_name }}</td>
                                <td>
                                    @if ( $visit->vital == null )
                                        <a href="{{ route('nurse.vitals.save', $visit) }}"><i class="fa fa-stethoscope fa-3x" aria-hidden="true"></i></a>
                                    @else
                                        <h4 style="color:rgb(177, 86, 86)">Vitals Already Taken</h4>
                                    @endif
                                </td>
                                @if (!$visit->vital)
                                   
                                <td style="font-size:19px;"> <h3>Take vitals first</h3></td>

                                @else
                                    <td style="font-size:19px;"><a href="{{route('nurse.vitals.patient',$visit->patient )}}">View</a></td>

                                @endif

                                
                                @if ($visit->vital)
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                    
                                                <a class="dropdown-item" href="{{ route('nurse.vitals.edit', $visit->vital) }}"><i class="fa fa-magic"></i> Edit this taken vitals</a>
                                            </div>
                                        </div>
                                    </td>
                                @endif

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div style="color:red; font-size:30px; font-weight:bold;" class="text-center">
                                        No visits yet
                                    </div>
                                </td>
                            </tr>
                            
                        @endforelse
                        
                        
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
   
</div>
<div class="ml-5">
    {{ $visits->links() }}  
</div>
@endsection

   




















