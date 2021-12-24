
@extends('layouts.master')

@section('title')
    <title>Edit Vitals - Health Care</title>
@endsection

@section('pageContent')
      
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Edit Vitals</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="col-sm-8 offset-2 text-center">
                @if(session()->has('status'))
                    <div class="alert alert-danger"> {{ session()->get('status') }}  </div>
                @endif
                @if(session()->has('mismatch'))
                    <div class="alert alert-danger"> {{ session()->get('mismatch') }}  </div>
                @endif
            </div>
          {{-- @php
                dd($visit )
          @endphp --}}
            <form action="{{ route('nurse.vitals.update', $vital ) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-5 border p-3">
                      
                    <input class="form-control" type="hidden"  name="visit_id" value="{{ $vital->visit->id }}">
                     
                    <div class="col-sm-6">
                        <label>Temperature <span class="text-danger">*</span> </label>
                        <input class="form-control" type="text"  name="temperature"  value="{{ $vital->temperature }}">
                        @error('temperature')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>
                    <div class="col-sm-6">
                        <label>Heart Rate<span class="text-danger">*</span> </label>
                        <input class="form-control" type="text"  name="heart_rate" value="{{ $vital->heart_rate }}">
                        @error('heart_rate')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>
                
                    <div class="col-sm-6">
                        <label>Blood Pressure <b>(Diastolic)</b> <span class="text-danger">*</span> </label>
                        <input class="form-control" type="text"  name="bp_diastolic" value="{{ $vital->bp_diastolic }}">
                        @error('bp_diastolic')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>
                    <div class="col-sm-6">
                        <label>Blood Pressure <b>(Systolic)</b> <span class="text-danger">*</span> </label>
                        <input class="form-control" type="text"  name="bp_systolic" value="{{ $vital->bp_systolic }}">
                        @error('bp_systolic')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>
                    <div class="col-sm-6">
                        <label>Height <span class="text-danger">*</span> </label>
                        <input class="form-control" type="text"  name="height" value="{{ $vital->height }}">
                        @error('height')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>
                    <div class="col-sm-6">
                        <label>Weight <span class="text-danger">*</span> </label>
                        <input class="form-control" type="text"  name="weight" value="{{ $vital->weight }}">
                        @error('weight')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>

                </div>
                
                <div class="m-t-20 text-center mb-4">
                    <button class="btn btn-success submit-btn">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection




    





















