<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Http\Requests\AddHospitalRequest;


class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $hospitalID = session()->get('hospitalID');
        $hospitalName = session()->get('hospitalName');
       
        
        $hospitals = Hospital::paginate(10);

     
        return view('Super-Admin.hospitals', compact('hospitalName','hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospitalName = session()->get('hospitalName');
        return view('Super-Admin.add_hospital', compact('hospitalName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddHospitalRequest $request)
    {
        if($request->validated()){
            // $hospitalID = session()->get('hospitalID');
            $hospital = new Hospital();
       
            $hospital->name = $request->get('hospital_name');
            $hospital->location = $request->get('hospital_location');
        
            $hospital->save();
                    
            return redirect()->route('superadmin.hospitals.index')
            ->with('success', 'Hospital successfully Added.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        $hospitalName = session()->get('hospitalName');
        return view('Super-Admin.edit_hospital', compact('hospital', 'hospitalName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(AddHospitalRequest $request, Hospital $hospital)
    {
        if($request->validated()){
            
            $hospital->update([
                'name' => $request->get('hospital_name'),
                'location' => $request->get('hospital_location'),
            ]);
        
            $hospital->save();
                    
            return redirect()->route('superadmin.hospitals.index')
            ->with('success', 'Hospital updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        //
    }
}
