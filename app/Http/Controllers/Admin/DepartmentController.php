<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AddDepartmentRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitalID = session()->get('hospitalID');
        $hospitalName = session()->get('hospitalName');

        $departments = Department::where('hospital_id', $hospitalID)->paginate(3);
        return view('Admin.departments', compact('hospitalName','departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospitalName = session()->get('hospitalName');
        return view('Admin.add_department', compact('hospitalName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddDepartmentRequest $request)
    {
        if($request->validated()){
            $hospitalID = session()->get('hospitalID');
            $department = new Department();
       
            $department->name = $request->get('departmentName');
            $department->hospital_id = $hospitalID;
            $department->status = $request->get('status');
        
            $department->save();
                    
            return redirect()->route('admin.departments.index')
            ->with('success', 'Department created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $hospitalName = session()->get('hospitalName');
        return view('Admin.edit_department', compact('department', 'hospitalName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddDepartmentRequest $request,Department $department)
    {
        // using AddDepartmentRequest instead of creating
        //  a new one because the rules are the same

        if($request->validated()){
            $hospitalID = session()->get('hospitalID');
            
            $department->update([
                'name' => $request->get('departmentName'),
                'hospital_id' => $hospitalID,
                'status' => $request->get('status'),
            ]);
        
            $department->save();
                    
            return redirect()->route('admin.departments.index')
            ->with('success', 'Department updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
         // DO NOT want to delete a dept 

        // $department->delete();
        // return redirect()->route('admin.departments.index')
        // ->with('success', 'department deleted successfully');
    }
}
