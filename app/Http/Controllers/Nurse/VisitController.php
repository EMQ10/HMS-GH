<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Models\Patient; 
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateVisitRequest;
use App\Models\VisitType;
use App\Models\Employee;
use App\Models\PaymentType;

class VisitController extends Controller
{
    public function choice(){

        $hospitalName = session()->get('hospitalName');
        return view('Nurse.visit_choice', compact('hospitalName'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitalName = session()->get('hospitalName');
        $nurse_id  = Employee::where('user_id', Auth::id())->value('id');
        $department_id = User::where('id', $nurse_id)->value('department_id');

        $visits = Visit::where('department_id',$department_id)
                        ->with('patient')
                        ->with('paymentType')
                        ->with('visitType')
                        ->with('doctor')
                        ->orderBy('created_at','DESC')
                        ->paginate(3);
    

        // dd($visits);

        return view('Nurse.visits', compact('hospitalName','visits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nurse_id  = Employee::where('user_id', Auth::id())->value('id');
        $hospital_id = session()->get('hospitalID');
        $hospitalName = session()->get('hospitalName');
        $department_id = User::where('id', $nurse_id  )->value('department_id');
        $visitTypes = VisitType::all();
        $paymentTypes = PaymentType::all();
        $doctors =  User::where('role_id', Role::IS_DOCTOR)
                        ->where('department_id', $department_id) // <===== SHOULD BE UNCOMMENTED TO BE ACCURATE AND CORRECT 
                        ->whereHas('employee', function ($query) use ($hospital_id) {
                        $query->where('employees.hospital_id', $hospital_id); })
                        ->whereNotNull('last_seen')
                        ->with('employee')
                        ->get();

        // foreach($doctors as $doctor){
        //     dd($doctor->id);
        // }
       
        return view('Nurse.create_visit', compact('hospitalName','hospital_id','department_id','nurse_id','visitTypes','paymentTypes','doctors'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVisitRequest $request)
    {
        if($request->validated()){

            // $hospitalID = session()->get('hospitalID');
            $visit = new Visit();
  
            $patientRegistrationNumber = $request->get('patient_reg_number');
            $patientId = Patient::where('registration_number', $patientRegistrationNumber)->value('id');
            if($patientId == null){
                return redirect()->route('nurse.visit.create')
            ->with('mismatch', 'Incorrect Patient ID Number, please try again.');
            }

            $visit->patient_id = $patientId;
            $visit->hospital_id = $request->get('hospital');
            $visit->department_id = $request->get('department');
            $visit->nurse_id = $request->get('nurse');
            $visit->visit_type_id = $request->get('visit_type');
            $visit->payment_type_id = $request->get('payment_type');
            $visit->doctor_id = $request->get('doctor');
            $visit->receipt_number = $request->get('receipt_number') ?? null;
            $visit->status = 'pending';
            
            $visit->save();
  
            return redirect()->route('nurse.visit.index')
            ->with('success', 'Visit created successfully.');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit)
    {

        // $hospitalName = session()->get('hospitalName');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function edit($visit_id)
    {
        $nurse_id  = Employee::where('user_id', Auth::id())->value('id');
        $hospital_id = session()->get('hospitalID');
        $hospitalName = session()->get('hospitalName');
        $department_id = User::where('id', $nurse_id  )->value('department_id');
        $visitTypes = VisitType::all();
        $paymentTypes = PaymentType::all();
        $doctors =  User::where('role_id', Role::IS_DOCTOR)
                        ->whereHas('employee', function ($query) use ($hospital_id) {
                        $query->where('employees.hospital_id', $hospital_id); })
                        ->whereNotNull('last_seen')
                        ->with('employee')
                        ->get();
        
        $visit = Visit::where('id',$visit_id)
                        ->with('patient')
                        ->with('paymentType')
                        ->with('visitType')
                        ->with('doctor')
                        ->get();
                        
        
        // foreach($doctors as $doctor){
        //     dd($doctor->id);
        // }
       
        return view('Nurse.edit_visit', compact('visit','hospitalName','hospital_id','department_id','nurse_id','visitTypes','paymentTypes','doctors'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function update(CreateVisitRequest $request, $visit)
    {
        if($request->validated()){

            // $hospitalID = session()->get('hospitalID');
            $visit = Visit::findOrFail($visit);
           
            $patientRegistrationNumber = $request->get('patient_reg_number');
            $patientId = Patient::where('registration_number', $patientRegistrationNumber)->value('id');
            if($patientId == null){
                return redirect()->route('nurse.visit.edit',$visit)
            ->with('mismatch', 'Incorrect Patient ID Number, please try again.');
            }

            // dd($visit);

            $visit->update([
                'patient_id' => $patientId,
                'hospital_id'=> $request->get('hospital'),
                'department_id' => $request->get('department'),
                'nurse_id' => $request->get('nurse'),
                'visit_type_id' => $request->get('visit_type'),
                'payment_type_id' => $request->get('payment_type'),
                'doctor_id' => $request->get('doctor'),
                'receipt_number' => $request->get('receipt_number') ?? null,
            ]);
  
            $visit->save();
  
            return redirect()->route('nurse.visit.index')
            ->with('success', 'Visit Edited successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visit)
    {
        //
    }
}
