
@extends('layouts.master')

@section('title')
    <title>Hospitals - Health Care</title>
@endsection

@section('pageContent')
      
<div class="content" style="font-size:22px;">
    <div class="row">
        <div class="col-sm-5 col-5">
            <h4 class="page-title">Hospitals</h4>
        </div>
        <div class="col-sm-7 col-7 text-right m-b-30">
            <a href="{{ route('superadmin.hospitals.create') }}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add a Hospital</a>
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

    <div class="row  mb-3">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0 datatable text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hospital Name</th>
                            <th>Hospital Location</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i =0;
                        @endphp
                       
                        @forelse ($hospitals as $hospital)
                        {{-- @php
                            
                            $class = $department->status == 1 ? "custom-badge status-green" : "custom-badge status-red" ;
                            $status = $class == "custom-badge status-green" ? 'Active' : 'Inactive';
                        @endphp --}}
                       
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $hospital->name }}</td>
                                <td>{{ $hospital->location }}</span></td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('superadmin.hospitals.edit', $hospital->id) }}"><i class="fa fa-magic"></i> Edit</a>
                                              
                                            {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_hospital_{{ $hospital->id }}"><i class="fa fa-trash"></i> Delete</a>                                        --}}
                                        </div>
                                    </div>
                                </td>
                            </tr> 
                            
                            {{-- <div id="delete_hospital_{{ $hospital->id }}" class="modal fade delete-modal" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content ">
                                        <div class="modal-body text-center ">
                                            <img src="{{ asset('storage/img/sent.png') }}" alt="" width="50" height="46">
                                            <h3>Are you sure you want to delete "{{ $hospital->name }}" ?</h3>
                                            <div class="m-t-20 d-flex justify-content-center"> 
                                                <a href="#" class="btn btn-white mr-3" data-dismiss="modal">Close</a>

                                                <form action="{{ route('superadmin.hospitals.destroy', $hospital->id) }}" method="POST">  
                                                    @csrf
                                                    @method('DELETE')  
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        @empty
                         <tr>
                             <td colspan="3">
                                <h4>Empty</h4>
                             </td>
                             
                         </tr>

                        @endforelse
                        
                        {{-- <tr>
                            <td>2</td>
                            <td>Neurology</td>
                            <td><span class="custom-badge status-red">Inactive</span></td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="edit-department.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_department"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
               
            </div>
        </div>
        
    </div>
    {{ $hospitals->links()}}
</div>


                     
@endsection

{{-- @section('extraScripts')
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
@endsection --}}







    
