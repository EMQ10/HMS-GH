<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ Hospital, User, Role };

class NurseController extends Controller
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

        $nurses = User::where('role_id', Role::IS_NURSE)
                    ->whereHas('employee', function ($query) use ($hospitalID) {
                        $query->where('employees.hospital_id', $hospitalID); })
                    ->with('department')
                    ->with('employee')
                    ->get();

        return view('Admin.nurses', compact('hospitalName','nurses','hospitalLocation'));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
