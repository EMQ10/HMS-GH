<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
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
        $hospitalLocation = Hospital::where('id', $hospitalID)->value('location');

        // $doctors = Employee::whereRelation('roles', 'role_id', Role::IS_DOCTOR)
        //             ->whereHas('hospitals', function ($query) use ($hospitalID) {
        //                 $query->where('hospitals.id', $hospitalID); })
        //             ->with('departments')->get();

        $doctors = User::where('role_id', Role::IS_DOCTOR)
                    ->whereHas('employee', function ($query) use ($hospitalID) {
                        $query->where('employees.hospital_id', $hospitalID); })
                    ->with('department')
                    ->with('employee')
                    ->get();

        return view('Super-Admin.doctors', compact('hospitalName','doctors','hospitalLocation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
