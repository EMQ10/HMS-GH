
@extends('layouts.master')

@section('title')
    <title>Consultation - Health Care</title>
@endsection

@section('pageContent')
      
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-title">Consultation Page</h4>
        </div>
    </div>
    <div class="row">
        <div class="container mt-3">
            <div class="row text-center mb-5" >

                <div class="col-md-12 mb-5 d-flex align-items-center " style="background-color:#fff; font-size:19px; height:60px; border-radius:15px;  border-style:groove;  ">
                    <div class="col-md-3">
                        {{ 'ID No: '. $visit->patient->registration_number }} 
                    </div>
                    <div class="col-md-3">
                        {{ 'Name: '.$visit->patient->first_name }} {{ $visit->patient->middle_name ?? "" }} {{ $visit->patient->last_name }} 
                    </div>
                    <div class="col-md-3">
                        {{ 'Age: '.$age.' Years Old' }} 
                    </div>
                    <div class="col-md-3">
                        {{ 'Gender: '.$visit->patient->gender }} 
                    </div>
                    {{-- &nbsp; &nbsp;   &nbsp; &nbsp; 
                    {{  }} &nbsp; &nbsp; {{  }}  --}}
                </div>

                <div class="col-md-3"> <button style="font-size:20px;" id="records" class="btn btn-outline-warning">Past medical records</button> </div>

                <div class="col-md-3"> <button style="font-size:20px;" id="vital" class="btn btn-outline-primary">Today's Vitals</button> </div>
                
                <div class="col-md-3"> 
                    <button style="font-size:20px;" id="consult" class="btn  btn-outline-success">
                        @if( !empty($consultation))
                            Update Consultation record
                        @endif
                        @empty($consultation)
                            Consultation Form
                        @endempty 
                    
                    </button> 
                </div>            
            
                
                <div class="col-md-3">  
                    <form action="{{ route('doctor.consultation.end', $visit) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button onclick="return confirm('After confirming, you would not be able to alter this consultation record. Are you sure you want to End it ?');" type="submit" style="font-size:20px;" id="consult" class="btn btn-outline-danger">End Consultation</button>  
                    </form>
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

        </div>

        

        <div class="col-lg-8 offset-lg-2" >
            @include('Doctor.past_records')
            @include('Doctor.today_vitals')
            @include('Doctor.consultation_form')
        </div>

    </div>
</div>
    
@endsection

@section('extraScripts')
    <script type="text/javascript">
        $(document).ready(function () {    

            // $('#vital_div').hide();
            // $('#consult_div').hide();
            $('#records').click(function () {
                $('#records_div').fadeToggle('slow');
            });
            
            $('#vital').click(function () {
                $('#vital_div').fadeToggle('slow');
            });
                    
            $('#consult').click(function () {
                $('#consult_div').animate({height:'toggle'});
            });
            
        });
    </script>
@endsection




    





















