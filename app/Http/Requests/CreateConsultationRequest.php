<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Consultation;

class CreateConsultationRequest extends FormRequest
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
        
        // $visitId = (int) substr(url()->previous(), -1);
        // // dd($visitId);
     
        // $consultationId = Consultation::where('visit_id',$visitId)->value('visit_id');
        
        $rules = [
            
            'complaints' => 'required|max:65530',
            'lab' => 'max:65530',
            'diagnosis' => 'max:65530',
            'prescription' => 'max:65530',
            'advice' => 'max:65530'
        ];

        if ($this->getMethod() == 'POST') {
            $rules += [
                'visit_id' =>  [
                    'required',
                    Rule::unique('consultations', 'visit_id')
                ],
                'vital_id' => 'required',
            ];
        }

        return $rules;
    }
}
