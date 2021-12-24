<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\Vital;
use App\Models\Visit;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\CreateVitalsRequest;
use Carbon\Carbon;

class VitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Patient $patient)
    {
        // dd($patient->vitals);
        
        
        $age = Carbon::parse($patient->dob)->diff(Carbon::now())->y;
        // dd($patient->dob);

        $hospitalName = session()->get('hospitalName');
        return view('Nurse.patient_past_vitals', compact('hospitalName','patient','age'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Visit $visit)
    {
        $visit = $visit->id;
        $hospitalName = session()->get('hospitalName');

        return view('Nurse.take_vitals', compact('hospitalName','visit'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVitalsRequest $request)
    {
        if($request->validated()){

            // $hospitalID = session()->get('hospitalID');
            $vital = new Vital();

            $vital->visit_id = $request->get('visit_id');
            $vital->temperature = $request->get('temperature');
            $vital->heart_rate = $request->get('heart_rate');
            $vital->bp_diastolic = $request->get('bp_diastolic');
            $vital->bp_systolic = $request->get('bp_systolic');
            $vital->height = $request->get('height');
            $vital->weight = $request->get('weight');
            
            $vital->save();
  
            return redirect()->route('nurse.visit.index')
            ->with('success', 'Vitals Saved Successfully.');
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vital  $vital
     * @return \Illuminate\Http\Response
     */
    public function show(Vital $vital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vital  $vital
     * @return \Illuminate\Http\Response
     */
    public function edit(Vital $vital)
    {
        $hospitalName = session()->get('hospitalName');
        return view('Nurse.edit_vitals', compact('hospitalName', 'vital'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vital  $vital
     * @return \Illuminate\Http\Response
     */
    public function update(CreateVitalsRequest $request, Vital $vital)
    {
        if($request->validated()){

            $vital->update([
                'visit_id' => $request->get('visit_id'),
                'temperature'=> $request->get('temperature'),
                'heart_rate' =>  $request->get('heart_rate'),
                'bp_diastolic' => $request->get('bp_diastolic'),
                'bp_systolic' => $request->get('bp_systolic'),
                'height' => $request->get('height'),
                'weight' => $request->get('weight'),
            ]);
  
            $vital->save();

            return redirect()->route('nurse.visit.index')
            ->with('success', 'Vitals Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vital  $vital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vital $vital)
    {
        //
    }
}
