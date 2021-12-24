<?php

namespace App\Http\Controllers\Nurse;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hospital;

class NurseController extends Controller
{
    public function index(){
        // $hospitalID = session()->get('hospitalID');
        // $hos = Hospital::where('id', $hospitalID)->get();
        // foreach($hos as $hos){
        //     $hospitalName = $hos->name;
        // }
        $hospitalName = session()->get('hospitalName');
        return view('Nurse.index', compact('hospitalName'));
    }
}
