<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AddEmployeeRequest;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Department;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index(){
        $hospitalID = session()->get('hospitalID');
        $hospitalName = session()->get('hospitalName');
       
        // $employees = Employee::where('hospital_id', $hospitalID)
        //              ->with('user')
        //              ->get();
        
        $employees = User::whereHas('employee', function ($query) use ($hospitalID) {
                        $query->where('employees.hospital_id', $hospitalID); })
                    ->with('role')
                    ->with('employee')
                    ->get();

        // dd($employees);


        $roles = Role::get(['id','name']);
        // dd($roles);
        return view('Admin.employees', compact('hospitalName','roles','employees'));
    }


    public function create(){
        $hospitalID = session()->get('hospitalID');
        $departments = Department::where('hospital_id', $hospitalID)->get(['id','name']);
        $hospitalName = session()->get('hospitalName');
        return view('Admin.add_employee', compact('hospitalName','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddEmployeeRequest $request)
    {
        if($request->validated()){

            $hospitalID = session()->get('hospitalID');
            $user = new User();
       
            $user->username = $request->get('username');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->role_id = $request->get('role');
            $user->status = $request->get('status');
            $user->department_id = $request->get('department') ?? null ;

            if($user->save()){

                $employee = new Employee();

                if ($request->hasFile('image')) {

                    $image = $request->file('image');
                    // $name = str_slug($request->name).'.'.$image->getClientOriginalExtension();
                    $fileName = time().'-'.rand(0,898556).'.'.$image->extension(); 
                    // $destinationPath = public_path('/uploads/articles');
                    $image->move('storage/Employees', $fileName);
                }else{
                    $fileName = "blank.png";
                }
                $employee->image = $fileName;
                
                $user_id = User::max('id');

                $employee->user_id = $user_id;
                $employee->hospital_id = $hospitalID;
                $employee->first_name = $request->get('first_name');
                $employee->middle_name = $request->get('middle_name') ?? null;
                $employee->last_name = $request->get('last_name');
                $employee->gender = $request->get('gender');
                $employee->educational_level = $request->get('educational_level');
                $employee->marital_status = $request->get('marital_status');
                $employee->dob = $request->get('dob');
                $employee->phone_number = $request->get('phone');
                $employee->emergency_number = $request->get('emergency_phone_num') ?? null;
                $employee->address = $request->get('address');
                $employee->nationality = $request->get('nationality');
                $employee->save();

            }
            
                    
            return redirect()->route('admin.employees.index')
            ->with('success', 'Employee created successfully.');
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
    public function edit(Employee $employee)
    {
        $hospitalName = session()->get('hospitalName');
        $hospitalID = session()->get('hospitalID');
        $departments = Department::where('hospital_id', $hospitalID)->get(['id','name']);
        return view('Admin.edit_employee', compact('employee', 'hospitalName','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddEmployeeRequest $request,Employee $employee)
    {
        
        if($request->validated()){

            $hospitalID = session()->get('hospitalID');
            $user = User::where('id', $employee->user_id)->first();

            // dd($user);

            
            $userArrayToUpdate = [
                'username' =>  $request->get('username'),
                'email' => $request->get('email'),
                'role_id' => $request->get('role'),
                'status' => $request->get('status'),
                'department_id' => $request->get('department') ?? null,  

            ];
            
            if(empty($request->input('password'))){
                $userArrayToUpdate += ['password' => $user->password];      
            }else{               
                $userArrayToUpdate += ['password' => Hash::make($request->get('password'))]; 
            }

            $user->update($userArrayToUpdate);  

            if($user->save()) {

                if ($request->hasFile('image')) {

                    $image = $request->file('image');
                    // $name = str_slug($request->name).'.'.$image->getClientOriginalExtension();
                    $fileName = time().'-'.rand(0,898556).'.'.$image->extension(); 
                    // $destinationPath = public_path('/uploads/articles');
                    $image->move('storage/Employees', $fileName);
                }elseif($employee->image != null){
                    $fileName = $employee->image; 
                }else{
                    $fileName = "blank.png";
                }

                $employeeArrayToUpdate = [
                    'hospital_id' => $hospitalID,
                    'first_name' => $request->get('first_name'),
                    'middle_name' => $request->get('middle_name')  ?? null,
                    'last_name' => $request->get('last_name'),
                    'educational_level' => $request->get('educational_level'),
                    'marital_status' => $request->get('marital_status'),
                    'phone_number' => $request->get('phone'),
                    'emergency_number' => $request->get('emergency_phone_num') ?? null,
                    'address' => $request->get('address'),
                    'image' => $fileName

                ];

                if($request->has('gender')){
                    $employeeArrayToUpdate += ['gender' => $request->get('gender')]; 
                }
                if($request->has('dob')){
                    $employeeArrayToUpdate += ['dob' => $request->get('dob')]; 
                }
                if($request->has('nationality')){
                    $employeeArrayToUpdate += ['nationality' => $request->get('nationality')]; 
                }

                $employee->update($employeeArrayToUpdate);

                $employee->save();

            }
            
                    
            return redirect()->route('admin.employees.index')
            ->with('success', 'Employee Updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Department $department)
    // {
    //     $department->delete();
    //     return redirect()->route('admin.departments.index')
    //     ->with('success', 'department deleted successfully');
    // }

}
