<div class="mt-4 text-center container" id="records_div" style="display: none;" >
    <h1> <button disabled style="font-size:30px;" id="records" class="btn btn-outline-dark" >Past records list</button> </h1>
    <hr>
   @foreach ($visits as $visit)
        <div class="row mt-3 mb-5">
            <div class="col-md-6 mb-2"><h4> <b><u>Visit date & Time:</u></b> </h4>
               <h4  class="mt-3"> {{ $visit->created_at }}</h4> 

               @php
                    $location = $visit->doctor->hospital->location;
               @endphp

               <div class="mt-5"><h4> <b style="color:rgb(24, 82, 206);">Treated by:</b> Dr. {{  $visit->doctor->first_name }} {{ $visit->doctor->middle ?? "" }} {{ $visit->doctor->last_name }}  </h4> </div>
            <div class="mt-1"><h4> <b style="color:rgb(24, 82, 206);">Hospital Name:</b> {{ $visit->doctor->hospital->name. " ($location)" }} </h4> </div>
            {{-- {{  ($visit->doctor->hospital->name.' Hospital') }}  --}}
            </div>
            <div class="col-md-6">
                <h3><u>Vitals</u></h3>
               <div class="row">
                <div class="col-md-6">
                    <h4 class="mt-3"> <b>Temperature:</b>  {{ $visit->vital->temperature }}</h4>
                    <h4 class="mt-3"> <b>Bp Systolic:</b>  {{ $visit->vital->bp_systolic }}</h4>
                    <h4 class="mt-3"> <b>Bp Diastolic:</b>  {{ $visit->vital->bp_diastolic }}</h4>
                </div>
                <div class="col-md-6">
                    <h4 class="mt-3"><b>Weight:</b>   {{ $visit->vital->weight }}</h4>
                    <h4 class="mt-3"><b> Height:</b>  {{ $visit->vital->height }}</h4>
                    <h4 class="mt-3"> <b>Heart Rate:</b>  {{ $visit->vital->heart_rate }}</h4>
                </div>
               </div>
            </div>    
        </div>

        


        @if (!empty($visit->consultation))

            <div class="row mb-4">
                <div class="col-md-4">  <h4><b>Complaints:</b> {{ $visit->consultation->complaints }} </h4> </div>
                <div class="col-md-4"><h4> <b>Lab Request:</b> {{ $visit->consultation->lab }} </h4> </div>
                <div class="col-md-4"><h4> <b style="color:rgb(24, 82, 206);">Diagnosis:</b> {{ $visit->consultation->diagnosis }} </h4></div>
            </div>

            <div class="row">
                <div class="col-md-6"> <h4><b>Prescription:</b> {{ $visit->consultation->prescription }} </h4> </div>
                <div class="col-md-6"><h4> <b>Advice:</b> {{ $visit->consultation->advice }} </h4> </div>
            </div> 
            
        @else
            <h2 style="color:rgb(170, 71, 71)">No consultation data found for this visit.</h2>
        @endif

        <hr>   
   @endforeach

</div>