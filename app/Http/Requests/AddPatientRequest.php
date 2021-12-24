<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Patient;
use Carbon\Carbon;


class AddPatientRequest extends FormRequest
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
        $regNum = $this->segment(4);
    
        $patientId = Patient::where('registration_number',$regNum)->value('id');

        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',       
            'occupation' => 'required | string',
            'marital_status' => 'required',
            'email' => [    
                Rule::unique('patients', 'email')->ignore($patientId)
            ],  
            'address' => 'required',
                   
        ];

        if(!empty($this->input('email'))){
            $rules['email'] += ['email'];
        }

        if($this->getMethod() == 'POST'){
            $minBirthDate = now();
            $rules += [
                'nationality'=> 'required',
                'dob' => 'required|before_or_equal:'.$minBirthDate,
                'gender' => 'required | in:F,M',
            ];
        }elseif($this->getMethod() == 'PUT'){
            $rules += [
                'gender' => 'in:F,M',
            ];
        }

        return $rules;
    }
}
