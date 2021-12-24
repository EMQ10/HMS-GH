
@extends('layouts.master')

@section('title')
    <title>Home - Health Care</title>
@endsection

@section('pageContent')

<div class="text-center">
    @if (session()->has('welcome'))      
       <div style="width:50%; margin-left:25%; ">
           <div class="alert alert-info alert-dismissible fade show" role="alert">
               <h4 class="alert-heading">{{ session()->get('welcome')}}</h4>
               <p> Lovely to see you again </p>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>        
       </div>
   @endif
</div>
      
    @include('Nurse.pageContent')
                                  
@endsection


