<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecruitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->path() == 'home/recruit_store') {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category' => 'required',
            'game_day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ];
    }

    public function messages() {
        return [
            'category.required' => '募集カテゴリを選択して下さい。',
            'game_day.required' => '試合日程を入力して下さい。',
            'start_time.required' => '試合開始時間を入力して下さい。',
            'end_time.required' => '試合終了時間を入力して下さい。',
        ];
    }
}
