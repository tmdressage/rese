<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'reserve_date' => ['required', 'after:today'],
            'reserve_time' => ['required'],
            'reserve_number' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'reserve_date.required' => '! 予約日付が設定されていません。',
            'reserve_date.after' => '! 予約日付を明日以降の日付で設定してください。',
            'reserve_time.required' => '! 予約時間が設定されていません。',
            'reserve_number.required' => '! 予約人数が設定されていません。',
        ];
    }
}
