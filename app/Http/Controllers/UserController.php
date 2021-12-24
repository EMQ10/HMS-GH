<?php

namespace App\Http\Controllers;

use App\Actions\LoginAction;
use App\Http\Requests\LoginRequest;
use App\Models\Role;
use App\Models\Hospital;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
// use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function getHospitalName(){
        $hospitalID = session()->get('hospitalID');
        $hospitalName = Hospital::where('id', $hospitalID)->pluck('name');
        foreach($hospitalName as $hospitalName){
            $hospitalName = $hospitalName;
        }
        return $hospitalName;
    }

    // public function back(){
    //     return back();
    // }

    public function login(LoginRequest $request, LoginAction $action) 
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        //     ]);


        $action->handle($request);
        
        if(!Auth::check()){
            return redirect("login")->with('status', 'Your credentials do not match our records, please try again');
        }
        
        $user = Auth::user();

        $userId = Auth::id();
        $employee = Employee::where('user_id', $userId)->get();

        foreach ($employee as $employee){
            $employee = $employee;
        }

        // dd($employee);
        $roleID = $user->role_id;
        $hospitalID = $action->hospital($user);
  
        $welcome = $action->welcome($employee, $roleID, $user);
        $action->storeSession($request, 'roleID', $roleID); 
        $action->storeSession($request, 'hospitalID', $hospitalID); 
        $action->storeSession($request, 'employeeRecord', $employee); 

        $hospitalName = $this->getHospitalName();
        $action->storeSession($request, 'hospitalName', $hospitalName);

        $roleName = Role::where('id', $roleID)->first()->name;
        if($roleName == "Super Admin"){
            $roleName = "SuperAdmin";
        }
        $roleName = strtolower($roleName);
        $path = $roleName.'/';
        return redirect($path)->with('welcome', $welcome);  
    
        

    }

    public function chosen(LoginAction $action, $id, Request $req){
        $chosenHopitalID = $id;
        $user = Auth::user();
        // $welcome = $action->welcome($user,Role::IS_DOCTOR);
        $action->storeSession($req, 'roleID', $user->role_id);
        $action->storeSession($req, 'hospitalID', $chosenHopitalID); 
        $hospitalName = $this->getHospitalName();
        $action->storeSession($req, 'hospitalName', $hospitalName);
        // return redirect('doctor')->with('welcome',$welcome);
    }    

    public function logout(Request $request){
    //     header("cache-Control: no-store, no-cache, must-revalidate");
    //     header("cache-Control: post-check=0, pre-check=0", false);
    //     header("Pragma: no-cache");
    //     header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    //     Session::flush();
    //     $request->session()->regenerate();
    // Session::flash('succ_message', 'Logged out Successfully');
    // // return redirect('signin');

        if($request->user() && Cache::has('user-is-online-'.$request->user()->id)){
            Cache::forget('user-is-online-'.$request->user()->id);
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}