
@extends('layouts.master')

@section('title')
    <title>Employees - Health Care</title>
@endsection

@section('pageContent')
      
<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Employee</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="{{ route('admin.employees.create') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Employee</a>
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

    <div class="row filter-row">
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <label class="focus-label">Employee ID</label>
                <input type="text" class="form-control floating">
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <label class="focus-label">Employee Name</label>
                <input type="text" class="form-control floating">
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus select-focus">
                <label class="focus-label">Role</label>
                <select class="select floating">
                    <option>Select Role</option>
                    {{-- @foreach ($roles as $roles) --}}
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    {{-- @endforeach --}}
                  
                </select>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#" class="btn btn-success btn-block"> Search </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table ">
                    <thead>
                        <tr>
                            <th style="min-width:200px;">Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th style="min-width: 110px;">Join Date</th>
                            <th>Role</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            @php
                                $image = $employee->employee->image;
                            @endphp
                            <tr>
                                <td>
                                    <img width="28" height="28" src="{{ asset("/storage/Employees/$image") }}" class="rounded-circle" alt=""> 
                                    <h2>{{ $employee->employee->first_name }} {{ $employee->employee->middle_name ?? '' }} {{ $employee->employee->last_name }} </h2>
                                </td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->employee->phone_number }}</td>
                                <td>{{ $employee->employee->created_at }}</td>
                                <td>
                                    <span class="custom-badge status-green">{{ $employee->role->name }}</span>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('admin.employees.edit', $employee->employee->id) }}"><i class="fa fa-magic"></i> Edit</a>
                                            {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a> --}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
               
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
           
                                  
@endsection




