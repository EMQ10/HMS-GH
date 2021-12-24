<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitalName = session()->get('hospitalName');
        $doctorId  = Employee::where('user_id', Auth::id())->value('id');
        $department_id = User::where('id', Auth::id())->value('department_id');

        $visits = Visit::whereHas('vital')
                        ->where('department_id',$department_id)
                        ->where('doctor_id',$doctorId)
                        ->where('status','pending')
                        ->with('patient')
                        ->with('nurse')
                        ->with('visitType')
                        ->get();

        // dd($doctorId);

        return view('Doctor.visits', compact('hospitalName','visits'));
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit)
    {
        //
    }

    
}
