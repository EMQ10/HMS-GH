<?php

namespace App\Http\Controllers\Admin;

 

use App\Models\Hospital;
use App\Models\Role; 
use App\Models\Employee; 
use App\Models\User; 
use App\Models\Patient;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;



use Illuminate\Support\Facades\DB;

class AdminController extends  Controller
{
    

    public function index(){

        // if(!session()->get('user')['role_id']){
        //     return redirect('logout');
        // }
        $hospitalID = session()->get('hospitalID');
        // $hos = Hospital::where('id', $hospitalID)->withCount('nurses')->get();
        // $numOfDoctors = Employee::whereRelation('role', 'role_id', Role::IS_DOCTOR)
        //                 ->whereHas('hospital', function ($query) use ($hospitalID) {
        //                     $query->where('hospitals.id', $hospitalID); })
        //                 ->count();

        $numOfDoctors = User::where('role_id', Role::IS_DOCTOR)
                        ->whereHas('employee', function ($query) use ($hospitalID) {
                            $query->where('employees.hospital_id', $hospitalID); })
                        ->count();
        // dd($numOfDoctors);

        // foreach($hos as $hos){
        //     $numOfNurses  = $hos->nurses_count;
        // }

        // $numOfNurses = Employee::whereRelation('roles', 'role_id', Role::IS_NURSE)
        //                 ->whereHas('hospitals', function ($query) use ($hospitalID) {
        //                     $query->where('hospitals.id', $hospitalID); })
        //                 ->count();
        $numOfNurses = User::where('role_id', Role::IS_NURSE)
                        ->whereHas('employee', function ($query) use ($hospitalID) {
                            $query->where('employees.hospital_id', $hospitalID); })
                        ->count();
        // dd($numOfNurses);
        
        // $numOfReceptionists  = Employee::whereRelation('roles', 'role_id', Role::IS_RECEPTIONIST)
        //                         ->whereHas('hospitals', function ($query) use ($hospitalID) {
        //                             $query->where('hospitals.id', $hospitalID); })
        //                         ->count();

        $numOfReceptionists = User::where('role_id', Role::IS_RECEPTIONIST)
            ->whereHas('employee', function ($query) use ($hospitalID) {
                $query->where('employees.hospital_id', $hospitalID); })
            ->count();

            $numOfPatients = Patient::count();

        // 

        $hospitalName = session()->get('hospitalName');
    
        return view('Admin.index', compact('numOfDoctors','numOfNurses','numOfReceptionists','hospitalName','numOfPatients'));
    }

  
}
