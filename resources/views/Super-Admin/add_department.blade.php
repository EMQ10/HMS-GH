
@extends('layouts.master')

@section('title')
    <title>Add Department - Health Care</title>
@endsection

@section('pageContent')
      

    <div class="row mt-5">
        <div class="col-lg-6 offset-lg-3">
            <h4 class="page-title">Add Department</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <form action="{{ route('superadmin.departments.store') }}" method="POST" >
                @csrf
                <div class="form-group">
                    <label>Department Name</label>
                    <input class="form-control" type="text" name="departmentName" required>
                </div>
                
                <div class="form-group">
                    <label class="display-block">Department Status</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="product_active" value="1" checked>
                        <label class="form-check-label" for="product_active">
                        Active
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="product_inactive" value="0">
                        <label class="form-check-label" for="product_inactive">
                        Inactive
                        </label>
                    </div>
                </div>
                <div class="m-t-20 text-center">
                    <input type='submit' class="btn btn-primary submit-btn" value="Create Department">
                </div>
            </form>
        </div>
    </div>


            
@endsection

@section('extraScripts')
<script src="assets/js/jquery.slimscroll.js"></script>
@endsection







    


