
@extends('layouts.master')

@section('title')
    <title>Visits - Health Care</title>
@endsection

@section('pageContent')
      
<div class="content" style="font-size:22px;">
    <div class="row">
        <div class="col-sm-5 col-5">
            <h4 class="page-title">Visits</h4>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-xs-6 mt-5 mr-5" >
                <a href="{{ route('nurse.visit.create') }}" class="btn btn-primary btn-rounded"  style="font-size:60px;"><i class="fa fa-plus"></i> Create a Visit &nbsp;</a>
            </div>
            <div class="col-xs-6 mt-5">
                <a href="{{ route('nurse.visit.index') }}" class="btn btn-success btn-rounded"  style="font-size:60px;"><i class="fa fa-search"></i> View Visits &nbsp;</a>
            </div>
        </div>
    </div>
    
    

</div>


                     
@endsection









    
