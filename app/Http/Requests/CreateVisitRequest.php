<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVisitRequest extends FormRequest
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
        return [
            'patient_reg_number' => 'required | string',
            'hospital' => 'required',
            'department' => 'required',
            'nurse' => 'required',
            'visit_type' => 'required',
            'payment_type' => 'required',
            'doctor' => 'required',
            'receipt_number' => 'required'
        ];
    }
}
