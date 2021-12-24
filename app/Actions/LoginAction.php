<?php

namespace App\Actions;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\Employee;
// use App\Models\Hospital;
use App\Models\Department;
use App\Models\Role;
// use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginAction {
   
    public function handle(LoginRequest $request) 
    {     
        
        $field_type = filter_var($request->input('usernameOrEmail'), FILTER_VALIDATE_EMAIL ) 
        ? 'email' 
        : 'username';

        $request->merge([
            $field_type => $request->input('usernameOrEmail')
        ]);
       
        
        if(Auth::attempt($request->only($field_type, 'password'))){
            
            $request->session()->regenerate();      
        }
    }

    public function storeSession(Request $req, $key, $value){
        $req->session()->put($key, $value);
    }

    
    public function welcome(Employee $employee,$roleID,User $user){

        switch ($roleID) {
            case Role::IS_ADMIN:
                $rankTitle = '(Admin)';
            break;

            case Role::IS_DOCTOR :
                $rankTitle = '(Doctor)';
            break;

            case Role::IS_NURSE :
                $rankTitle = '(Nurse)';
            break;

            case Role::IS_RECEPTIONIST :
                $rankTitle = '(Receptionist)';
            break;

            case Role::IS_SUPER_ADMIN :
                $rankTitle = '(SUPER ADMIN)';
            break;

            default:
                return redirect('logout');
            break;
        }

        $data = Employee::where('id', $employee->id)->get(['gender']);

        $username = $user->username;
        
        foreach($data as $data){
            $titleOfCivility= $data["gender"] == 'M' ? 'Mr.' : 'Ms.';
        }
        
        // if($roleID == Role::IS_DOCTOR){
        //     $civility = 'Dr.';
        // }else{
        //     $civility = $titleOfCivility ?? '';
        // }
        
        $civility =  $roleID == Role::IS_DOCTOR ?  'Dr.' :  $titleOfCivility ?? '';
        return $welcome = "Welcome $civility $username $rankTitle";
    }

    public function hospital(User $user){

        return Employee::where('user_id',$user->id)->first()->hospital_id; 
    }

    // public function userType($roleID){
    //     switch ($roleID) {
    //         case Role::IS_ADMIN:
    //             $routeName = 'admin';
    //         break;

    //         case Role::IS_DOCTOR :
    //             $routeName = 'doctor';
    //         break;

    //         case Role::IS_NURSE :
    //             $routeName = 'nurse';
    //         break;

    //         case Role::IS_RECEPTIONIST :
    //             $routeName = 'receptionist';
    //         break;

    //         default:
    //             return redirect('logout');
    //         break;
    //     }

    //     return $routeName; 
    // }
    
}


    // function storeSession(Request $request, $key, $value){
    //     $request->session()->put($key, $value);
    // }

    // function getSession(Request $request, $key){
    //     if($request->session()->has($key)){
    //        echo $request->session()->get($key);
    //     }
    // }

    // function eraseSession(Request $request, $key){  
    //     $request->session()->forget($key);
    // }