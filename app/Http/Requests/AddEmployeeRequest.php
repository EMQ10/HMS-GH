<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Employee;
use Illuminate\Validation\Rule;

class AddEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $employeeId = (int)$this->segment(4);
        $userId = Employee::where('id',$employeeId)->value('user_id');
        // dd($userId);
        $rules = [
            'username' => [
                'required', 'string',
                Rule::unique('users', 'username')->ignore($userId)
            ],
            'email' => [    
                'required', 'email',
                Rule::unique('users', 'email')->ignore($userId)
            ],

            'role' => 'required',  
            'department' => "required_if:role,2,3",
            'first_name' => 'required',
            'last_name' => 'required',
            'educational_level' => 'required | string', 
            'marital_status' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required'
           
        ];


        if ($this->getMethod() == 'POST') {
            $minBirthDate = now()->subYears(18);
            

            $rules += [
                'password' => 'required|confirmed',
                'nationality'=> 'required',
                'dob' => 'required|before_or_equal:'.$minBirthDate,
                'gender' => 'required | in:F,M',
            ];
        }
        if ($this->getMethod() == 'PUT') {
            $rules += [
                'password' => 'confirmed',
            ];
        }

        return $rules;

    }
}
