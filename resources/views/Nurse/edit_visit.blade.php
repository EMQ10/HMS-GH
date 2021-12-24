
@extends('layouts.master')

@section('title')
    <title>Edit Visit - Health Care</title>
@endsection

@section('pageContent')
      
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Edit Visit</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            @foreach ($visit as $visit)
                @php
                    $visit = $visit;
                @endphp  
            @endforeach
            {{-- @php
                dd($visit->id);
            @endphp --}}
            <div class="col-sm-8 offset-2 text-center">
                @if(session()->has('status'))
                    <div class="alert alert-danger"> {{ session()->get('status') }}  </div>
                @endif
                @if(session()->has('mismatch'))
                    <div class="alert alert-danger"> {{ session()->get('mismatch') }}  </div>
                @endif
            </div>

            <form action="{{ route('nurse.visit.update', $visit->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-5 border p-3">
  
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Patient ID Number <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="patient_reg_number" value="{{ $visit->patient->registration_number }}">
                        </div>
                        @error('patient_reg_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                     @enderror <br>
                    </div>
                    
                        <input class="form-control" type="hidden"  name="hospital" value="{{ $hospital_id }}">
                        <input class="form-control" type="hidden"  name="department" value="{{ $department_id }}">
                        <input class="form-control" type="hidden"  name="nurse" value="{{ $nurse_id }}">
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Visit Type <span class="text-danger">*</span> </label>
                            <select class="select" name="visit_type" >
                                @foreach ($visitTypes as $visitType)
                                    <option value="{{ $visitType->id }}">{{ $visitType->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('visit_type')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Payment Type <span class="text-danger">*</span> </label>
                            <select class="select" name="payment_type" >
                                @foreach ($paymentTypes as $paymentType)
                                    <option value="{{ $paymentType->id }}">{{ $paymentType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('payment_type')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>

                    {{-- @foreach($doctors as $doctor)
                        @php
                            dd($doctor->employee->first_name);
                        @endphp
                    @endforeach --}}

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Online Doctors List <span class="text-danger">*</span> </label>
                            <select class="select" name="doctor" >
                                <option value="">Select Doctor</option>
                                @foreach($doctors as $doctor)
                                    @if(Cache::has('user-is-online-' . $doctor->id))
                                        <option value="{{ $doctor->employee->id }}">
                                            Dr. {{ $doctor->employee->first_name }} {{ $doctor->employee->middle_name ?? "" }} {{ $doctor->employee->last_name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        @error('doctor')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Receipt Number <span class="text-danger">*</span> </label>
                            <input class="form-control" type="text"  name="receipt_number" value="{{ $visit->receipt_number }}">
                        </div>
                        @error('receipt_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>

                </div>
                
                <div class="m-t-20 text-center mb-4">
                    <button class="btn btn-primary submit-btn">Edit visit</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection




    





















