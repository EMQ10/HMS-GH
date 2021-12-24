<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\Consultation;
use App\Http\Requests\CreateConsultationRequest;
use  Carbon\Carbon;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Visit $visit)
    {
        $hospitalName = session()->get('hospitalName');

        // dd($visit->id);

        // $consultationId = Consultation::where('visit_id', $visit)->value('id');
        $consultation = Consultation::where('visit_id', $visit->id)->first();

        if($consultation){
            $action = route('doctor.consultation.update',$consultation);
        }else{
            $action = route('doctor.consultation.store');
            // dd($action );
            $consultation = "";
        }

        $visits = Visit::where('patient_id', $visit->patient->id)
                        ->with('consultation')
                        ->with('doctor')
                        ->get();

        // dd($visits);
        
    
        $age = Carbon::parse($visit->patient->dob)->diff(Carbon::now())->y;

        // $ageInMonths = now()->diffInMonths(Carbon::parse($birthday));
        
        return view('Doctor.create_consultation', compact('hospitalName','visit','visits','action','age','consultation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateConsultationRequest $request)
    {
        if($request->validated()){

            // $hospitalID = session()->get('hospitalID');
            $consultation = new Consultation();
  
            $consultation->visit_id = $request->get('visit_id');
            $consultation->vital_id = $request->get('vital_id');
            $consultation->complaints = $request->get('complaints');
            $consultation->diagnosis = $request->get('diagnosis') ?? null;
            $consultation->advice = $request->get('advice') ?? null;
            $consultation->lab = $request->get('lab') ?? null;
            $consultation->prescription = $request->get('prescription') ?? null;
            
            $consultation->save();
  
            return redirect()->route('doctor.consultation.initiate', $consultation->visit_id)
            ->with('success', 'Consultation data saved successfully.');
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
    public function update(CreateConsultationRequest $request,Consultation $consultation)
    {
        if($request->validated()){

            $toBeUpdated = [
           
                'complaints' => $request->get('complaints'),
                'lab' => $request->get('lab')  ?? null,
                'diagnosis' => $request->get('diagnosis') ?? null,
                'prescription' => $request->get('prescription') ?? null,
                'advice' => $request->get('advice')  ?? null
            ];

            $consultation->update($toBeUpdated);

            $consultation->save();
  
            return back()->with('success', 'Consultation record updated successfully.');
        }
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

    public function end(Visit $visit){

        // dd($visit->id);
        Visit::where('id', $visit->id)->update(['status' => 'done']);
        
        return redirect()->route('doctor.visits.index')
                         ->with('success', 'Consultation ended successfully, Good Job.');

    }
}
