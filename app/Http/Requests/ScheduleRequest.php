<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            'user_id' => 'required',
            'date' => 'required',
            'P' => 'nullable',
            'C' => 'nullable',
            'FB' => 'nullable',
            'SB' => 'nullable',
            'TB' => 'nullable',
            'SS' => 'nullable',
            'LF' => 'nullable',
            'CF' => 'nullable',
            'RF' => 'nullable',
            'member' => 'required',
        ];
    }
}
