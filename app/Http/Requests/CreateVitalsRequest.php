<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVitalsRequest extends FormRequest
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
            'visit_id' => 'required',
            'temperature' => 'required',
            'heart_rate' => 'required',
            'bp_diastolic' => 'required',
            'bp_systolic' => 'required',
            'height' => 'required',
            'weight' => 'required',
        ];
    }
}
