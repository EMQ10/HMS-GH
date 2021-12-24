<?php

namespace App\Http\Controllers\Receptionist;

use Illuminate\Http\Request;
use App\Http\Requests\AddPatientRequest;
use  App\Http\Controllers\Controller;
use App\Models\Patient;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate_card(Patient $patient){

        $hospitalName = session()->get('hospitalName');
        $current = Carbon::now();
        // dd($current);

        // $pdf = Facade::loadView('Receptionist.patient_card', compact('patient','hospitalName','current'))->setOptions(['defaultFont' => 'sans-serif']);
        // return $pdf->stream();

        return view('Receptionist.patient_card', compact('hospitalName','patient','current'));
    }


    public function index(Request $request)
    {
        $hospitalName = session()->get('hospitalName');

        if($reg=$request->patient_registration_number){
            $patients = Patient::where('registration_number', $request->patient_registration_number)->get();
        }else{
            $patients = Patient::latest()->paginate(5);
        }
        

        // $patients = Patient::where('first_name', 'LIKE', '%' .$request->patient_first_name. '%')
        // ->orWhere('occupation', 'LIKE', '%' .$request->patient_occupation. '%')
        // ->orWhere('registration_number', $request->patient_registration_number)
        // ->orWhere('id', '>' , 0)
        // ->paginate(5);

        return view('Receptionist.patients', compact('hospitalName','patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $code = "P-".rand(0,9855)."-".rand(0,9784)."-".rand(0,7580);
        $hospitalName = session()->get('hospitalName');
        return view('Receptionist.add_patient', compact('hospitalName','code'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPatientRequest  $request)
    {
        if($request->validated()){

            // $hospitalID = session()->get('hospitalID');
            $patient = new Patient();
  
            $patient->first_name = $request->get('first_name');
            $patient->middle_name = $request->get('middle_name') ?? null;
            $patient->last_name = $request->get('last_name');
            $patient->gender = $request->get('gender');
            $patient->occupation = $request->get('occupation');
            $patient->email = $request->get('email') ?? null;
            $patient->marital_status = $request->get('marital_status');
            $patient->dob = $request->get('dob');
            $patient->phone_number = $request->get('phone') ?? null;
            $patient->emergency_number = $request->get('emergency_phone_num') ?? null;
            $patient->address = $request->get('address');
            $patient->registration_number = $request->get('reg_number');
            $patient->nationality = $request->get('nationality');
            $patient->save();
  
            return redirect()->route('receptionist.patients.index')
            ->with('success', 'Patient record saved successfully.');
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
    public function edit(Patient $patient)
    {
        $hospitalName = session()->get('hospitalName');
        return view('Receptionist.edit_patient', compact('hospitalName','patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddPatientRequest $request, Patient $patient)
    {
        if($request->validated()){

            $toBeUpdated = [
                'first_name' => $request->get('first_name'),
                'middle_name'=> $request->get('middle_name') ?? null,
                'last_name' => $request->get('last_name'),
                'occupation' => $request->get('occupation'),
                'email' => $request->get('email') ?? null,
                'marital_status' => $request->get('marital_status'),
                'phone_number' => $request->get('phone') ?? null,
                'emergency_number' => $request->get('emergency_phone_num') ?? null,
                'address' => $request->get('address'),
                'registration_number' => $request->get('reg_number'),
            ];

            if(!empty($request->input('gender'))){
                $toBeUpdated += ['gender' => $request->get('gender')];
            }
            if(!empty($request->input('dob'))){
                $toBeUpdated += ['dob' => $request->get('dob')];
            }
            if(!empty($request->input('nationality '))){
                $toBeUpdated += ['nationality ' => $request->get('nationality ')];
            }

            $patient->update($toBeUpdated);

            $patient->save();
  
            return redirect()->route('receptionist.patients.index')
            ->with('success', 'Patient record updated successfully.');
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
}
